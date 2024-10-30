<?php

namespace App\Http\Controllers\frontend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class EventController extends Controller
{
    public function show($eventSlug)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();
        $categories = $event->categories()->latest()->paginate(10);
        // dd($categories);
        return view('frontend.events.event-details', compact('event', 'categories'));
    }
}
