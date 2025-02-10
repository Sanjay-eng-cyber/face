<?php

namespace App\Http\Controllers\frontend;

use App\Models\Event;
use App\Models\Category;
use App\Models\FrontendUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use App\Events\UploadedImageFaceMatchingRequestedEvent;

class CategoryController extends Controller
{
    public function show(Request $request, $eventSlug, $categorySlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        $category = Category::where('slug', $categorySlug)->where('event_id', $event->id)->firstOrFail();
        // dd($event);
        return view('frontend.dynamic.category-share', compact('event', 'category'));
    }

    public function userFormSubmit(Request $request)
    {
        // dd($request->all());
        $event = Event::whereSlug($request->eventSlug)->firstOrFail();
        $category = Category::whereSlug($request->categorySlug)->firstOrFail();
        // dd($request->pin);
        if (!$request->pin || ($event->pin != $request->pin)) {
            return response()->json(['status' => false, 'message' => 'Incorrect Pin']);
        }

        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|email|min:8|max:40',
            'mobile_number' => 'required|numeric|digits:10',
            'userImageData' => 'required|string'
        ]);

        $frontendUser = new FrontendUser();
        $frontendUser->event_id = $event->id;
        $frontendUser->category_id = $category->id;
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
            )->post(config('app.python_api_url') . '/api/inputimg/');

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
}
