<?php

namespace App\Http\Controllers\frontend;

use App\Models\Event;
use App\Models\Category;
use App\Models\FrontendUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuestUpload;
use Intervention\Image\ImageManager;

class EventController extends Controller
{
    public function show(Request $request, $eventSlug)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }
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
        $event = Event::whereSlug($request->eventSlug)->firstOrFail();
        // dd($request->pin);
        if (!$request->pin || ($event->pin != $request->pin)) {
            return response()->json(['status' => false, 'message' => 'Incorrect Pin']);
        }

        $request->validate([
            'name' => 'required|string|min:30|max:40',
            'email' => 'required|email|min:8|max:40',
            'mobile' => 'required|numeric|digits:10',
        ]);

        $frontendUser = new FrontendUser();
        $frontendUser->name = $request->name;
        $frontendUser->email = $request->email;
        $frontendUser->phone = $request->mobile;
        if ($frontendUser->save()) {
            return response()->json(['status' => true, 'message' => 'User Registered Successfully.']);
        }
    }

    public function stepTwoForm($eventSlug)
    {
        // dd('jdfhsdugf');
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        return view('frontend.events.step-forms.step-form-two', compact('event'));
    }

    public function stepTwoFormSubmit(Request $request, $eventSlug)
    {
        // dd($request->all());
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
}
