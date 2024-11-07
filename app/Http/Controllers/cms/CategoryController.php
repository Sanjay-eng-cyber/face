<?php

namespace App\Http\Controllers\cms;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest();
        $categories = $this->filterResults($request, $categories);
        $categories = $categories->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    protected function filterResults($request, $categories)
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

            $categories = $categories->where('name', 'LIKE', '%' . $search . '%');
        }
        return $categories;
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.show', compact('category'));
    }

    public function create()
    {
        $events = Event::all();
        return view('backend.category.create', compact('events'));
    }

    public function store(Request $request)
    {
        $events = Event::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'event_id' => ['required', Rule::in($events)],
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
            'thumbnail_image' => 'nullable|mimes:jpeg,png,jpg|max:512',
        ]);

        // Create a new Event instance
        $category = new Category();
        $thumbnail_image = request()->file('thumbnail_image');
        $manager = ImageManager::gd();
        if ($thumbnail_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $thumbnail_image->clientExtension();
            $destinationPath = public_path("storage/images/categories");
            $image = $manager->read($thumbnail_image->getRealPath());
            $image->save($destinationPath . '/' . $filename, 90);
            $category->thumbnail_image = $filename;
        }
        $category->name = $request->name;
        $category->cms_user_id = auth()->user()->id;
        $category->slug = Str::slug($request->name);
        $category->visibility = $request->visibility;
        $category->event_id = $request->event_id;
        $category->sharing = $request->sharing;
        if ($category->save()) {
            return redirect()->route('backend.category.index')->with(
                [
                    "message" => "Category Added Successfully",
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
        $category = Category::findOrFail($id);
        $events = Event::all();
        return view('backend.category.edit', compact('category', 'events'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $events = Event::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'event_id' => ['required', Rule::in($events)],
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
            'thumbnail_image' => 'nullable|mimes:jpeg,png,jpg|max:512',
        ]);

        // Create a new Category instance
        $category = Category::findOrFail($id);
        $thumbnail_image = request()->file('thumbnail_image');
        if ($thumbnail_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $thumbnail_image->clientExtension();
            $destinationPath = public_path("storage/images/categories/");
            $manager = ImageManager::gd();
            $image = $manager->read($thumbnail_image->getRealPath());
            optional(Storage::disk('public')->delete('images/categories/' . $category->thumbnail_image));
            $image->save($destinationPath . '/' . $filename, 90);
            $category->thumbnail_image = $filename;
        }
        $category->name = $request->name;
        $category->event_id = $request->event_id;
        $category->cms_user_id = auth()->user()->id;
        $category->slug = Str::slug($request->name);
        $category->visibility = $request->visibility;
        $category->sharing = $request->sharing;
        if ($category->save()) {
            return redirect()->route('backend.category.index')->with(
                [
                    "message" => "Category Update Successfully",
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
        $category = Category::findOrFail($id);
        if ($category->gallery_images()->exists()) {
            return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Gallery Images is present']);
        }
        if ($category->delete() && Storage::disk('public')->delete('images/categories/' . $category->thumbnail_image)) {
            return redirect()->route('backend.category.index')->with(
                [
                    "message" => "Category Deleted Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->route('backend.category.index')->with(
                [
                    "message" => "Something Went Wrong",
                    "alert-type" => "error"
                ]
            );
        }
    }

    public function uploadImagesIndex(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $event = Event::findOrFail($category->event_id);
        // dd($category, $event);
        return view('backend.category.upload-images', compact('category', 'event'));
    }

    public function uploadImages(Request $request, $eventSlug, $categorySlug)
    {
        // dd();
        $event = Event::whereSlug($eventSlug)->firstOrFail();
        $category = Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();

        try {
            $fileWithExt = request()->file('file');
            $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
            $destinationPath = public_path("storage/images/galleries/{$event->slug}/{$category->slug}");
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $manager = ImageManager::gd();
            $image = $manager->read($fileWithExt->getRealPath());
            $image->save($destinationPath . '/' . $filename, 90);

            $res = Http::attach(
                'image_name', // The name of the file field in the request
                file_get_contents($fileWithExt->getRealPath()), // The file's content
                $filename, // The file name
                ['Content-Type' => 'image/jpeg']
            )->post(config('app.python_api_url') . '/inputimg/');

            if ($res->successful()) {
                $data = $res->json();
                $status = $data['status'] ?? null;
                if ($status !== true) {
                    return response()->json(['status' => false, 'message' => 'Something Went Wrong.'], 500);
                }
                $face_encoding = $data['face_encoding'] ?? null;
                $face_locations = $data['face_locations'] ?? null;

                $gallery_image = new GalleryImage();
                $gallery_image->cms_user_id = auth()->user()->id;
                $gallery_image->event_id = $event->id;
                $gallery_image->category_id = $category->id;
                $gallery_image->image_name = $filename;
                $gallery_image->image_url = "images/galleries/{$event->slug}/{$category->slug}/{$filename}";
                $gallery_image->face_encoding = $face_encoding;
                $gallery_image->face_locations = $face_locations;
                if ($gallery_image->save()) {
                    return response()->json([
                        'status' => true,
                        'fileName' => $filename,
                        'id' => $gallery_image->id,
                        'path' => "/storage/images/{$eventSlug}/{$categorySlug}/{$filename}"
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Log::info('Catch Err : ' . $th->getMessage());
        }
        return response()->json(['status' => false, 'message' => 'Something Went Wrong'], 500);
    }

    public function deleteUploadedImage(Request $request, $eventSlug, $categorySlug, $id)
    {
        $event = Event::whereSlug($eventSlug)->firstOrFail();
        $category = Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();
        $gallery_image = GalleryImage::where('event_id', $event->id)->where('category_id', $category->id)->findOrFail($id);
        $filePath = "images/galleries/{$eventSlug}/{$categorySlug}/{$gallery_image->image_name}";

        if ($gallery_image->delete()) {
            Storage::disk('public')->delete($filePath);
            return response()->json(['success' => true, 'message' => 'File deleted successfully.', 'path' => $filePath]);
        } else {
            return response()->json(['success' => false, 'message' => 'File not found.', 'path' => $filePath], 404);
        }
    }

    public function uploadedImagesIndex(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $images = $category->gallery_images()->paginate(10);
        $totalImages = $category->gallery_images()->count();
        // dd($images);
        return view('backend.category.uploaded-images-index', compact('category', 'images', 'totalImages'));
    }

    public function deleteUploadImage($id)
    {
        $gallery_image = GalleryImage::findOrFail($id);
        $event = Event::findOrFail($gallery_image->event_id);
        $category = Category::where('event_id', $event->id)->findOrFail($gallery_image->category_id);
        $filePath = "images/galleries/{$event->slug}/{$category->slug}/{$gallery_image->image_name}";

        if ($gallery_image->delete()) {
            optional(Storage::disk('public')->delete($filePath));
            return redirect()->route('backend.category.uploaded-images-index')->with(toast('Gallery Image Deleted Successfully', 'success'));
        } else {
            return redirect()->route('backend.category.uploaded-images-index')->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function categoryUrl($id)
    {
        $category = Category::findOrFail($id);
        $url = URL::temporarySignedRoute('frontend.category.share.index', now()->addDays(3), ['categorySlug' => $category->slug]);
        return redirect()->route('backend.category.show', $id)->with('shared_url', $url);
    }
}
