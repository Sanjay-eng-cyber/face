<?php

namespace App\Http\Controllers\frontend;

use App\Models\Event;
use App\Models\Upload;
use App\Models\Category;
use App\Models\GuestUpload;
use App\Models\FrontendUser;
use App\Models\GalleryImage;
use App\Models\MatchedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use App\Jobs\StoreGuestUploadedImage;
use App\Events\UploadedImageFaceMatchingRequestedEvent;

class EventController extends Controller
{
    public function show(Request $request, $eventSlug)
    {
        // dd($request);
        // if (!$request->hasValidSignature()) {
        //     abort(401);
        // }
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        $categories = $event->categories()->latest()->paginate(10);
        // dd($event);
        return view('frontend.dynamic.event-share', compact('event', 'categories'));
    }

    public function stepOneForm($eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        // dd($event);
        return view('frontend.events.step-forms.step-form-one', compact('event'));
    }

    public function verifyPin(Request $request)
    {
        $event = Event::whereSlug($request->eventSlug)->firstOrFail();
        // dd($request->pin);
        if ($request->pin && ($event->pin == $request->pin)) {
            return response()->json(['status' => true, 'message' => 'Pin Verified Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Incorrect Pin']);
        }
    }

    public function userFormSubmit(Request $request)
    {
        // dd($request->all());
        $event = Event::whereSlug($request->eventSlug)->firstOrFail();
        // dd($request->pin);
        if ($event->is_pin_protection_required && $event->pin != $request->pin) {
            return response()->json(['status' => false, 'message' => 'Incorrect Pin']);
        }

        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|email|min:8|max:40',
            'mobile_number' => 'required|numeric|digits:10',
            'userImageData' => 'required|string',
            'guestImages' => 'nullable|array|max:20',
            'guestImages.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        // dd($request->guestImages);

        $frontendUser = new FrontendUser();
        $frontendUser->event_id = $event->id;
        $frontendUser->name = $request->name;
        $frontendUser->email = $request->email;
        $frontendUser->phone = $request->mobile_number;

        $imageData = $request->userImageData;
        if (!strpos($imageData, 'data:image/') === 0) {
            return response()->json(['status' => false, 'message' => 'Invalid Image Data']);
        }
        try {
            preg_match('/^data:image\/(\w+);base64,/', $imageData, $type);
            $imageType = $type[1];
            $imageData = substr($imageData, strpos($imageData, ',') + 1);
            $imageData = base64_decode($imageData);
            $manager = ImageManager::gd();
            $filename = date('Ymd-his') . "." . uniqid() . "." . $imageType;
            $destinationPath = public_path("storage/images/uploads/");
            $imageInstance = $manager->read($imageData);
            $imageInstance->save($destinationPath . '/' . $filename, 90);

            $res = Http::attach(
                'image_name', // The name of the file field in the request
                file_get_contents($destinationPath . $filename), // The file's content
                $filename, // The file name
                ['Content-Type' => 'image/jpeg']
            )->post(config('app.python_api_url') . '/inputimg/');

            if ($res->successful()) {
                // dd($res);
                $data = $res->json();
                $status = $data['status'] ?? null;
                if ($status !== true) {
                    return response()->json(['status' => false, 'message' => 'Something Went Wrong.'], 500);
                }
                $face_encoding = $data['face_encoding'] ?? null;
                $face_locations = $data['face_locations'] ?? null;

                $frontendUser->image = $filename;
                $frontendUser->image_url = "images/uploads/{$filename}";
                $frontendUser->face_encoding = $face_encoding;
                $frontendUser->face_locations = $face_locations;

                if ($frontendUser->save()) {
                    foreach ($request->file('guestImages') as $guestImage) {
                        $fileContent = base64_encode(file_get_contents($guestImage->getRealPath()));
                        $fileExt = $guestImage->clientExtension();
                        StoreGuestUploadedImage::dispatch($event, $frontendUser, $fileContent, $fileExt);
                    }
                    UploadedImageFaceMatchingRequestedEvent::dispatch($frontendUser);
                    return response()->json([
                        'status' => true,
                        'user_id' => $frontendUser->id,
                        'event_id' => $frontendUser->event_id,
                        'image' => asset("storage/images/uploads/api/" . $frontendUser->image),
                        // 'path' => "/storage/images/{$eventSlug}/{$categorySlug}/{$filename}"
                        'message' => 'User Registered Successfully.'
                    ]);
                }
            } else {
                Log::info('Python API Image Err');
                return response()->json(['status' => false, 'message' => 'Please try any other images.']);
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Log::info('Catch Err : ' . $th->getMessage());
        }


        return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
    }

    public function guestImageSubmit(Request $request)
    {
        // dd($request->all());
        $event = Event::whereSlug($request->eventSlug)->firstOrFail();
        // dd($request->pin);
        if ($event->is_pin_protection_required && $event->pin != $request->pin) {
            return response()->json(['status' => false, 'message' => 'Incorrect Pin']);
        }

        $request->validate([
            'guest_image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $guestUpload = new GuestUpload();
        $guestUpload->event_id = $event->id;
        $guestUpload->frontend_user_id = 1;

        $imageData = $request->userImageData;
        if (!strpos($imageData, 'data:image/') === 0) {
            return response()->json(['status' => false, 'message' => 'Invalid Image Data']);
        }
        try {
            $guest_image = $request->file('guest_image');
            $manager = ImageManager::gd();
            $filename = date('Ymd-his') . "." . uniqid() . "." . $guest_image->clientExtension();
            $destinationPath = public_path("storage/images/events/guest_images/");

            $imageInstance = $manager->read($guest_image->getRealPath());
            $imageInstance->save($destinationPath . '/' . $filename, 90);

            $res = Http::attach(
                'image_name', // The name of the file field in the request
                file_get_contents($destinationPath . $filename), // The file's content
                $filename, // The file name
                ['Content-Type' => 'image/jpeg']
            )->post(config('app.python_api_url') . '/inputimg/');

            if ($res->successful()) {
                // dd($res);
                $data = $res->json();
                $status = $data['status'] ?? null;
                if ($status !== true) {
                    return response()->json(['status' => false, 'message' => 'Something Went Wrong.'], 500);
                }
                $face_encoding = $data['face_encoding'] ?? null;
                $face_locations = $data['face_locations'] ?? null;

                $guestUpload->image = $filename;
                $guestUpload->image_url = "images/events/guest_images/{$filename}";
                $guestUpload->face_encoding = $face_encoding;
                $guestUpload->face_locations = $face_locations;

                if ($guestUpload->save()) {
                    // UploadedImageFaceMatchingRequestedEvent::dispatch($frontendUser);
                    return response()->json([
                        'status' => true,
                        // 'user_id' => $guestUpload->id,
                        'event_id' => $guestUpload->event_id,
                        // 'image' => asset("storage/images/uploads/api/" . $frontendUser->image),
                        // 'path' => "/storage/images/{$eventSlug}/{$categorySlug}/{$filename}"
                        'message' => 'Guest Image Uploaded Successfully.'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Log::info('Catch Err : ' . $th->getMessage());
        }


        return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
    }

    public function fetchMatchedImages(Request $request)
    {
        // dd($request);
        $event = Event::whereSlug($request->eventSlug)->firstOrFail();
        $frontendUser = FrontendUser::findOrFail($request->user_id);

        $galleryImages = MatchedImage::select(
            'matched_images.frontend_user_id',
            'matched_images.model_id as image_id',
            'gallery_images.image_name',
            'gallery_images.image_url',
            'matched_images.created_at'
        )
            ->join('gallery_images', 'matched_images.model_id', '=', 'gallery_images.id')
            ->where('matched_images.frontend_user_id', $frontendUser->id)
            ->where('matched_images.model_type', GalleryImage::class);

        $guestUploads = MatchedImage::select(
            'matched_images.frontend_user_id',
            'matched_images.model_id as image_id',
            'guest_uploads.image_name',
            'guest_uploads.image_url',
            'matched_images.created_at'
        )
            ->join('guest_uploads', 'matched_images.model_id', '=', 'guest_uploads.id')
            ->where('matched_images.frontend_user_id', $frontendUser->id)
            ->where('matched_images.model_type', GuestUpload::class);

        $images = $galleryImages->union($guestUploads)
            ->orderBy('created_at', 'asc')
            ->paginate(12);

        return response()->json(['status' => true, 'images' => $images]);
    }

    public function stepTwoForm($eventSlug)
    {
        // dd('jdfhsdugf');
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        return view('frontend.events.step-forms.step-form-two', compact('event'));
    }

    public function stepTwoFormSubmit(Request $request, $eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        // dd($event);
        $request->validate([
            'name' => 'nullable|min:3|max:30',
            'phone' => 'nullable|digits:10',
            'email' => 'nullable|min:8|max:30|email:rfc,dns|unique:frontend_users,email',
        ]);

        $frontendUser = new FrontendUser;
        $frontendUser->event_id = $event->id;
        $frontendUser->category_id = 1;
        $frontendUser->name = $request->name;
        $frontendUser->phone = $request->phone;
        $frontendUser->email = $request->email;
        if ($frontendUser->save()) {
            return redirect()->route('frontend.event.step-two-form', ['eventSlug' => $event->slug, session(['frontendUserName' => $frontendUser->name])])->with(toast('User Deatils Uploaded Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function frontendUserImageSubmit(Request $request, $eventSlug)
    {

        // dd($request->all());
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        // dd($event);
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $frontendUser = FrontendUser::where('name', $request->frontend_user_name)->firstOrfail();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = ImageManager::gd();

            $filename = date('Ymd-his') . "." . uniqid() . "." . $image->clientExtension();
            $destinationPath = public_path("storage/images/events/frontend_users/");

            $imageInstance = $manager->read($image->getRealPath());
            $imageInstance->save($destinationPath . '/' . $filename, 90);

            $frontendUser->image = $filename;
        }
        if ($frontendUser->save()) {
            return redirect()->route('frontend.event.step-two-form', $event->slug)->with(toast('Image Uploaded Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function getUserDetails(Request $request)
    {
        // dd($request);
        $user = FrontendUser::find($request->user_id);
        if ($user) {
            return response()->json([
                'status' => true,
                'user_id' => $user->id,
                'event_id' => $user->event_id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image_url' => asset("storage/images/uploads/" . $user->image),
                'message' => 'User Fetched Successfully.'
            ]);
        }
        return response()->json(['status' => false, 'message' => 'No User Found.']);
    }

    public function guestImage(Request $request, $eventSlug)
    {

        // dd($request->all());
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        $frontendUser = FrontendUser::where('name', $request->frontend_user_name)->firstOrfail();
        // dd($event);
        $request->validate([
            'guest_image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $guest_images = $request->file('guest_image');
        $manager = ImageManager::gd();
        if ($guest_images) {
            foreach ($guest_images as $guest_image) {
                $guestImage = new GuestUpload();
                $filename = date('Ymd-his') . "." . uniqid() . "." . $guest_image->clientExtension();
                $destinationPath = public_path("storage/images/events/guest_images/");

                $imageInstance = $manager->read($guest_image->getRealPath());
                $imageInstance->save($destinationPath . '/' . $filename, 90);

                $guestImage->image_name = $filename;
                $guestImage->frontend_user_id = $frontendUser->id;
                $guestImage->event_id = $event->id;
                $guestImage->category_id = 1;
                $guestImage->image_url = asset("storage/images/events/guest_images/" . $filename);
                $guestImage->save();
            }
        }

        if ($guestImage) {
            return redirect()->route('frontend.event.step-two-form', $event->slug)->with(toast('Guest Image Uploaded Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function syncMatchedImages(Request $request)
    {
        // dd($request);
        try {
            $event = Event::whereSlug($request->eventSlug)->firstOrFail();
            $frontendUser = FrontendUser::findOrFail($request->user_id);

            UploadedImageFaceMatchingRequestedEvent::dispatch($frontendUser);
            return response()->json(['status' => true, 'message' => "Images Synced Successfully"]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
        }
    }
}
