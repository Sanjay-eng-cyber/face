<?php

namespace App\Http\Controllers\cms;

use App\Models\Event;
use App\Mail\ShareEventMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShareEventController extends Controller
{
    public function shareEvent($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        $registerEventUrl = env('CMS_DOMAIN') . '/register-event/' . $event->name;
        $regerterEventqr = QrCode::size(150)->generate($registerEventUrl);
        return view('backend.shareEvents.create', compact('event', 'regerterEventqr', 'registerEventUrl'));
    }

    public function submit(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        $request->validate(
            [
                'email' => 'nullable|max:20',
                'email.*' => 'required|string|email:rfc,dns|min:5|max:40',
                'message' => 'required|string|min:3|max:20000',
                'email_subject' => 'required|string',
            ]
        );

        // if ($validator->fails()) {
        //     return redirect()->back()->with([
        //         "message" => $validator->errors()->first() ?? 'Something Went Wrong',
        //         "alert-type" => "error"
        //     ]);
        // }
        $data = (object) array();
        $data->email = $request->get('email');
        $data->message = $request->get('message');
        $data->email_subject = $request->get('email_subject');
        $data->code = 4526;
        $data->register_event_url = env('CMS_DOMAIN') . '/register-event/' . $event->name;;

        if ($data) {
            foreach ($data->email as $email) {
                Mail::to($email)->send(new ShareEventMail($data));
            }
            return redirect()->back()->with([
                "message" => "Message Sent Successfully",
                "alert-type" => "success"
            ]);
        }
        return redirect()->back()->with([
            "message" => "Something Went Wrong",
            "alert-type" => "error"
        ]);
    }

    public function registerEvent($eventname)
    {
        $event = Event::where('name', $eventname)->firstOrFail();
        return view('backend.shareEvents.register_event', compact('event'));
    }
}
