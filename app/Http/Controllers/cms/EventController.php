<?php

namespace App\Http\Controllers\cms;

use App\Models\Event;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Import the Log facade

class EventController extends Controller
{
    public function gsetting()
    {
        return view('backend.event.general-setting');
    }
    public function index(Request $request)
    {
        // $query = Event::latest();
        // $search = $request->input('search');
        // if ($search) {
        //     $query->where('name', 'LIKE', "%{$search}%");
        // }

        // $sortOption = $request->input('sort_option');
        // if ($sortOption == 'new-old') {
        //     $query->orderBy('created_at', 'desc');
        // } elseif ($sortOption == 'old-new') {
        //     $query->orderBy('created_at', 'asc');
        // } elseif ($sortOption == 'a-z') {
        //     $query->orderBy('name', 'asc');
        // } elseif ($sortOption == 'z-a') {
        //     $query->orderBy('name', 'desc');
        // }

        // $events = $query->paginate(10);
        $events = Event::latest();
        $events = $this->filterResults($request, $events);
        $events = $events->paginate(10);
        return view('backend.event.index', compact('events'));



        // $events = Event::latest()->paginate(10);
        // return view('backend.event.index', compact('events','sortOption'));
    }

    protected function filterResults($request, $events)
    {
        if ($request->q !== '' && !is_null($request->q)) {
            $request->validate([
                'q' => 'nullable|string|min:3|max:40',
            ], [
                'q.min' => 'Name must be at least 3 characters.',
                'q.max' => 'Name may not be greater than 40 characters.',
            ]);
        }

        if ($request !== null && $request->has('q') && $request['q'] !== '') {
            $search = $request['q'];

            $events = $events->where('name', 'LIKE', '%' . $search . '%');
        }
        return $events;
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        return view('backend.event.show', compact('event'));
    }

    public function create()
    {
        return view('backend.event.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:3|max:60',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'sharing' => 'required|in:1,0',
            'visibility' => 'required|in:1,0',
            'single_image_download' => 'required|in:1,0',
            'bulk_image_download' => 'required|in:1,0',
            'download_size' => 'required|in:original,1600',
            'descriptions' => 'nullable|string|min:3|max:20000',
            'cover_image' => 'required|mimes:jpeg,png,jpg|max:512',

        ]);

        // dd($request);
        $fileWithExt = request()->file('cover_image');
        $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
        $destinationPath = public_path("storage/images/events");
        $manager = ImageManager::gd();
        $image = $manager->read($fileWithExt->getRealPath());
        $image->save($destinationPath . '/' . $filename, 90);

        // Create a new Event instance
        $event = new Event();
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->descriptions = $request->descriptions;
        $event->download_size = $request->download_size;
        $event->sharing = $request->sharing;
        $event->visibility = $request->visibility;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->cover_image = $filename;
        if ($event->save()) {
            return redirect()->route('backend.event.index')->with(toast('Event Added Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
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
            'name' => 'required|string|min:3|max:60',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'sharing' => 'required|in:1,0',
            'visibility' => 'required|in:1,0',
            'single_image_download' => 'required|in:1,0',
            'bulk_image_download' => 'required|in:1,0',
            'download_size' => 'required|in:original,1600',
            'descriptions' => 'nullable|string|min:3|max:20000',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg|max:512',

        ]);

        // Create a new Event instance
        $event = Event::findOrFail($id);
        $fileWithExt = request()->file('cover_image');
        if ($fileWithExt) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
            $destinationPath = public_path("storage/images/events");
            $manager = ImageManager::gd();
            $image = $manager->read($fileWithExt->getRealPath());
            optional(Storage::disk('public')->delete('images/events/' . $event->cover_image));
            $image->save($destinationPath . '/' . $filename, 90);
            $event->cover_image = $filename;
        }

        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->sharing = $request->sharing;
        $event->download_size = $request->download_size;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->descriptions = $request->descriptions;
        if ($event->save()) {
            return redirect()->route('backend.event.index')->with(toast('Event Update Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something went wrong', 'error'));
        }
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        if ($event->categories()->exists()) {
            return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Category is present']);
        };
        if ($event->delete() && Storage::disk('public')->delete('images/events/' . $event->cover_image)) {
            return redirect()->route('backend.event.index')->with(
                [
                    "message" => "Event Deleted Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->route('backend.event.index')->with(
                [
                    "message" => "Something Went Wrong",
                    "alert-type" => "error"
                ]
            );
        }
    }

    // public function gallery($id)
    // {
    //     $event = Event::findOrFail($id);
    //     return view('backend.event.gallery', compact('event'));
    // }
}
