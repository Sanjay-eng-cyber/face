<?php

namespace App\Http\Controllers\cms;

use App\Models\Event;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'descriptions' => 'nullable|string|min:3|max:20000',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg|max:512',

        ]);

        // dd($request);
        $event = new Event();
        $cover_image = request()->file('cover_image');
        $manager = ImageManager::gd();
        if ($cover_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $cover_image->clientExtension();
            $destinationPath = public_path("storage/images/events");
            $image = $manager->read($cover_image->getRealPath());
            $image->save($destinationPath . '/' . $filename, 90);
            $event->cover_image = $filename;
        }

        // Create a new Event instance
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->descriptions = $request->descriptions;

        if ($event->save()) {
            return redirect()->route('backend.event.step-one-create', ['event_id' => $event->id])->with(toast('Event Added Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function stepOneCreate($event_id)
    {
        $event = Event::findOrFail($event_id); // Find the event by ID
        return view('backend.event.step-one-create', compact('event')); // Pass both event and event_id
    }

    public function StepOneStore(Request $request, $event_id)
    {
        $request->validate([
            'sharing' => 'required|in:1,0',
            'visibility' => 'required|in:1,0',
            'single_image_download' => 'required|in:1,0',
            'bulk_image_download' => 'required|in:1,0',
            'email_registration' => 'nullable|in:1,0',
            'social_sharing_buttons' => 'nullable|in:1,0',
            'print_store' => 'nullable|in:1,0',
            'mobile_field' => 'nullable|in:1,0',
            'guest_upload' => 'nullable|in:1,0',
            'password_protection' => 'nullable|in:1,0',
            'password' => 'nullable|required_if:password_protection,1|string|min:8|max:16',
            'image_share' => 'nullable|in:1,0',
            'watermark' => 'nullable|required_with:watermark_image|in:1,0',
            'watermark_image' => 'nullable|required_if:watermark,1|mimes:jpeg,png,jpg|max:512',
            'rounded_corner' => 'nullable|in:1,0',
            'grid_spacing' => 'nullable|in:small,regular,large',
            'grid_layout' => 'nullable|in:vertical,horizontal',
            'thumbnails' => 'nullable|in:small,regular,large',
            'preview_theme_for_viewers' => 'nullable|in:light mode,dark mode',


        ]);

        $event = Event::findOrFail($event_id);

        $watermark_image = request()->file('watermark_image');
        $manager = ImageManager::gd();
        if ($watermark_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $watermark_image->clientExtension();
            $destinationPath = public_path("storage/images/events/watermark_image/");
            $image = $manager->read($watermark_image->getRealPath());
            optional(Storage::disk('public')->delete('images/events/watermark_image/' . $event->watermark_image));
            $image->save($destinationPath . '/' . $filename, 90);
            $event->watermark_image = $filename;
        }

        // Create a new Event instance
        $event->download_size = $request->download_size;
        $event->sharing = $request->sharing;
        $event->visibility = $request->visibility;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->email_registration = $request->email_registration;
        $event->social_sharing_buttons = $request->social_sharing_buttons;
        $event->print_store = $request->print_store;
        $event->mobile_field = $request->mobile_field;
        $event->guest_upload = $request->guest_upload;
        $event->password_protection = $request->password_protection;
        $event->share_image = $request->image_share;
        $event->watermark = $request->watermark;
        $event->password = $request->password ? Hash::make($request->password) : null;
        $event->rounded_corner = $request->rounded_corner;
        $event->grid_spacing = $request->grid_spacing;
        $event->grid_layout = $request->grid_layout;
        $event->thumbnails = $request->thumbnails;
        $event->preview_theme_for_viewers = $request->preview_theme_for_viewers;


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
        // dd($request->password_protection);
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
            'email_registration' => 'nullable|in:1,0',
            'social_sharing_buttons' => 'nullable|in:1,0',
            'print_store' => 'nullable|in:1,0',
            'mobile_field' => 'nullable|in:1,0',
            'guest_upload' => 'nullable|in:1,0',
            'password_protection' => 'nullable|in:1,0',
            'password' => 'nullable|required_if:password_protection,1|string|min:8|max:16',
            'image_share' => 'nullable|in:1,0',
            'watermark' => 'nullable|required_with:watermark_image|in:1,0',
            'watermark_image' => 'nullable|required_if:watermark,1|mimes:jpeg,png,jpg|max:512',
            'rounded_corner' => 'nullable|in:1,0',
            'grid_spacing' => 'nullable|in:small,regular,large',
            'grid_layout' => 'nullable|in:vertical,horizontal',
            'thumbnails' => 'nullable|in:small,regular,large',
            'preview_theme_for_viewers' => 'nullable|in:light mode,dark mode',

        ]);

        // Create a new Event instance
        $event = Event::findOrFail($id);
        $cover_image = request()->file('cover_image');
        if ($cover_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $cover_image->clientExtension();
            $destinationPath = public_path("storage/images/events/");
            $manager = ImageManager::gd();
            $image = $manager->read($cover_image->getRealPath());
            optional(Storage::disk('public')->delete('images/events/' . $event->cover_image));
            $image->save($destinationPath . '/' . $filename, 90);
            $event->cover_image = $filename;
        }

        $watermark_image = request()->file('watermark_image');
        if ($watermark_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $watermark_image->clientExtension();
            $destinationPath = public_path("storage/images/events/watermark_image/");
            $image = $manager->read($watermark_image->getRealPath());
            optional(Storage::disk('public')->delete('images/events/watermark_image/' . $event->watermark_image));
            $image->save($destinationPath . '/' . $filename, 90);
            $event->watermark_image = $filename;
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
        $event->email_registration = $request->email_registration;
        $event->social_sharing_buttons = $request->social_sharing_buttons;
        $event->print_store = $request->print_store;
        $event->mobile_field = $request->mobile_field;
        $event->guest_upload = $request->guest_upload;
        $event->password_protection = $request->password_protection;
        $event->share_image = $request->image_share;
        $event->watermark = $request->watermark;
        $event->password = $request->password ? Hash::make($request->password) : null;
        $event->rounded_corner = $request->rounded_corner;
        $event->grid_spacing = $request->grid_spacing;
        $event->grid_layout = $request->grid_layout;
        $event->thumbnails = $request->thumbnails;
        $event->preview_theme_for_viewers = $request->preview_theme_for_viewers;
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
        if ($event->delete() && Storage::disk('public')->delete('images/events/' . $event->cover_image) && Storage::disk('public')->delete('images/events/watermark_image/' . $event->watermark_image)) {
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
