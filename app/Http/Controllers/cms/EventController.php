<?php

namespace App\Http\Controllers\cms;

use App\Models\Event;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        $user = Auth::guard('admin')->user('id');
        $events = Event::latest();
        if ($user->role == 'admin') {
            $events = $events->where('cms_user_id', $user->id);
        }
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
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $event = Event::where('cms_user_id', $user->id)->findOrFail($id);
        } else {
            $event = Event::findOrFail($id);
        }
        $galleryImages = $event->galleryImages;
        $galleryImagesCount = $galleryImages->count();
        $galleryImagesFileSize = round($galleryImages->sum('file_size') / (1024 * 1024), 0);
        // dd($galleryImagesFileSize);
        return view('backend.event.show', compact('event', 'galleryImagesCount', 'galleryImagesFileSize'));
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
            'name' => 'required|string|min:3|max:60|unique:events,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'link_start_date' => 'required|date',
            'link_end_date' => 'required|date|after:link_start_date',
            'link_sharing' => 'nullable|in:1,0',
            'is_pin_protection_required' => 'nullable|in:1,0|required_with:pin',
            'pin' => 'nullable|string|min:4|max:4|required_if:is_pin_protection_required,1',
            'single_image_download' => 'nullable|in:1,0',
            'bulk_image_download' => 'nullable|in:1,0',
            'upload_image_quality' => 'nullable|in:original,compressed',
            'descriptions' => 'nullable|string|min:3|max:20000',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg|max:512',
            'guest_images_upload' => 'nullable|in:1,0',
            'visibility' => 'required|in:1,0',
            'is_watermark_required' => 'nullable|required_with:watermark_image|in:1,0',
            'watermark_image' => 'nullable|required_if:is_watermark_required,1|mimes:jpeg,png,jpg|max:512',
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

        $watermark_image = request()->file('watermark_image');
        if ($watermark_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $watermark_image->clientExtension();
            $destinationPath = public_path("storage/images/events/watermark_image/");
            $image = $manager->read($watermark_image->getRealPath());
            $image->save($destinationPath . '/' . $filename, 90);
            $event->watermark_image = $filename;
        }

        // Create a new Event instance
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->is_pin_protection_required = $request->is_pin_protection_required;
        $event->pin = $request->pin;
        $event->link_sharing = $request->link_sharing;
        $event->upload_image_quality = $request->upload_image_quality;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->link_start_date = $request->link_start_date;
        $event->link_end_date = $request->link_end_date;
        $event->descriptions = $request->descriptions;
        $event->guest_images_upload = $request->guest_images_upload;
        $event->visibility = $request->visibility;
        $event->is_watermark_required = $request->is_watermark_required;

        if ($event->save()) {
            return redirect()->route('backend.event.index')->with(toast('Event Added Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $event = Event::where('cms_user_id', $user->id)->findOrFail($id);
        }

        return view('backend.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        // dd($request);
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:60',
                Rule::unique('events', 'name')->ignore($id),
            ],
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'link_start_date' => 'required|date',
            'link_end_date' => 'required|date|after:link_start_date',
            'link_sharing' => 'nullable|in:1,0',
            'is_pin_protection_required' => 'nullable|in:1,0|required_with:pin',
            'pin' => 'nullable|string|min:4|max:4|required_if:is_pin_protection_required,1',
            'single_image_download' => 'nullable|in:1,0',
            'bulk_image_download' => 'nullable|in:1,0',
            'upload_image_quality' => 'nullable|in:original,compressed',
            'descriptions' => 'nullable|string|min:3|max:20000',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg|max:512',
            'guest_images_upload' => 'nullable|in:1,0',
            'visibility' => 'required|in:1,0',
            'is_watermark_required' => 'nullable|in:1,0',
            'watermark_image' => 'nullable|mimes:jpeg,png,jpg|max:512',

        ]);

        // Create a new Event instance
        // $event = Event::findOrFail($id);
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $event = Event::where('cms_user_id', $user->id)->findOrFail($id);
        }
        $cover_image = request()->file('cover_image');
        $manager = ImageManager::gd();
        if ($cover_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $cover_image->clientExtension();
            $destinationPath = public_path("storage/images/events/");
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
        $event->is_pin_protection_required = $request->is_pin_protection_required;
        $event->pin = $request->pin;
        $event->link_sharing = $request->link_sharing;
        $event->upload_image_quality = $request->upload_image_quality;
        $event->single_image_download = $request->single_image_download;
        $event->bulk_image_download = $request->bulk_image_download;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->link_start_date = $request->link_start_date;
        $event->link_end_date = $request->link_end_date;
        $event->descriptions = $request->descriptions;
        $event->guest_images_upload = $request->guest_images_upload;
        $event->visibility = $request->visibility;
        $event->is_watermark_required = $request->is_watermark_required;
        if ($event->save()) {
            return redirect()->route('backend.event.index')->with(toast('Event Update Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something went wrong', 'error'));
        }
    }

    public function delete($id)
    {
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $event = Event::where('cms_user_id', $user->id)->findOrFail($id);
        }

        // $event = Event::findOrFail($id);
        if ($event->categories()->exists()) {
            return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Category is present']);
        }

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

    public function eventUrl($id)
    {
        $event = Event::findOrFail($id);
        $url = URL::temporarySignedRoute('frontend.event.share.index', now()->addDays(3), ['eventSlug' => $event->slug]);
        return redirect()->route('backend.event.show', $id)->with('shared_url', $url);
    }

    // public function gallery($id)
    // {
    //     $event = Event::findOrFail($id);
    //     return view('backend.event.gallery', compact('event'));
    // }
}
