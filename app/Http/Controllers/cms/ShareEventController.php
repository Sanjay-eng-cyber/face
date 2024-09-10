<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ShareEventMail;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ShareEventController extends Controller
{
    public function shareEvent($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        return view('backend.shareEvents.create', compact('event'));
    }

    public function submit(Request $request)
    {
        // dd($request);
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
}
