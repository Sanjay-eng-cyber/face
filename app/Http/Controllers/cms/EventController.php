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
    public function gsetting(){
        return view('backend.event.general-setting');
    }
    public function index(Request $request)
    {


    $query = Event::query();
    $search = $request->input('search');
    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%");
    }

    $sortOption = $request->input('sort_option');
    if ($sortOption == 'new-old') {
        $query->orderBy('created_at', 'desc'); 
    } elseif ($sortOption == 'old-new') {
        $query->orderBy('created_at', 'asc'); 
    } elseif ($sortOption == 'a-z') {
        $query->orderBy('name', 'asc');
    } elseif ($sortOption == 'z-a') {
        $query->orderBy('name', 'desc');
    }

    $events = $query->paginate(10);
    return view('backend.event.index', compact('events', 'sortOption'));
        

       
        // $events = Event::latest()->paginate(10);
        // return view('backend.event.index', compact('events','sortOption'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        //  dd($event);
        return view('backend.event.show', compact('event'));
    }

    public function create()
    {
        return view('backend.event.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
            'single_image_download' => 'required|in:1,0',
            'bulk_image_download' => 'required|in:1,0',
            'download_size' => 'required|in:original,1600',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'descriptions' => 'required|string|min:3|max:20000',
        ]);

        // Create a new Event instance
        $event = new Event();
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug =  Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->sharing = $request->sharing;
        $event->download_size = $request->download_size;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->descriptions = $request->descriptions;
        if ($event->save()) {
            return redirect()->route('backend.events.index')->with(
                [
                    "message" => "Event Added Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->back()->with([
                "message" => "Something went wrong",
                "alert-type" => "error"
            ]);
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
            'single_image_download' => 'required|in:1,0',
            'bulk_image_download' => 'required|in:1,0',
            'download_size' => 'required|in:original,1600',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'descriptions' => 'required|string|min:3|max:20000',
        ]);

        // Create a new Event instance
        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug =  Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->sharing = $request->sharing;
        $event->download_size = $request->download_size;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->descriptions = $request->descriptions;
        if ($event->save()) {
            return redirect()->route('backend.events.index')->with(
                [
                    "message" => "Event Update Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->back()->with([
                "message" => "Something went wrong",
                "alert-type" => "error"
            ]);
        }
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        if ($event->delete()) {
            return redirect()->route('backend.events.index')->with(
                [
                    "message" => "Event Deleted Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->route('backend.events.index')->with(
                [
                    "message" => "Something Went Wrong",
                    "alert-type" => "error"
                ]
            );
        }
    }

    public function gallery($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.gallery', compact('event'));
    }
}
