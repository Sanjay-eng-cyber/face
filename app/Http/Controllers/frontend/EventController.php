<?php

namespace App\Http\Controllers\frontend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FrontendUser;

class EventController extends Controller
{
    public function show($eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        $categories = $event->categories()->latest()->paginate(10);
        // dd($categories);
        return view('frontend.events.event-details', compact('event', 'categories'));
    }

    public function stepOneForm($eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        // dd($event);
        return view('frontend.events.step-forms.step-form-one', compact('event'));
    }

    public function verifyPin(Request $request)
    {
        $request->validate([
            'pin1' => 'required|digits:1',
            'pin2' => 'required|digits:1',
            'pin3' => 'required|digits:1',
            'pin4' => 'required|digits:1',
            'pin5' => 'required|digits:1',
            'pin6' => 'required|digits:1',
        ]);

        // Retrieve and concatenate PIN input fields
        $enteredPin = $request->input('pin1') . $request->input('pin2') . $request->input('pin3') .
            $request->input('pin4') . $request->input('pin5') . $request->input('pin6');

        // Query the event table to find a match
        $event = Event::where('pin', $enteredPin)->first();

        if ($event) {
            return redirect()->route('frontend.event.step-two-form', $event->slug)->with(toast('Pin Verified Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Pin Not Correct', 'info'));
        }
    }

    public function stepTwoForm($eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        return view('frontend.events.step-forms.step-form-two', compact('event'));
    }

    public function stepTwoFormSubmit(Request $request, $eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        // dd($event);
        $request->validate([
            'name' => 'required|min:3|max:30',
            'phone' => 'required|digits:10',
            'email' => 'required|min:8|max:30|email:rfc,dns',
        ]);

        $frontendUser = new FrontendUser;
        $frontendUser->event_id = $event->id;
        $frontendUser->category_id = 1;
        $frontendUser->name = $request->name;
        $frontendUser->phone = $request->phone;
        $frontendUser->email = $request->email;
        if ($frontendUser->save()) {
            return redirect()->route('frontend.event.step-two-form', $event->slug)->with(toast('User Deatils Uploaded Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }
}
