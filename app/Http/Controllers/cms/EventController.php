<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
            // $events = Event::all();
            // dd($events);
        return view('backend.event.index');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id', 
        ]);

        // Create a new Event instance
        $event = new Event();
        $event->name = $request->name;
        $event->user_id = $request->user_id;
        // $event->url = Str::random(10); 
        $event->save();

        // Redirect to the gallery index page with the event ID as a parameter
        return redirect()->route('backend.gallery.index', ['eventId' => $event->id]);
    }

}
