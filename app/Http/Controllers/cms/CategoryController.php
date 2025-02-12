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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('admin')->user('id');
        $categories = Category::with('event')->latest();
        if ($user->role == 'admin') {
            $categories = $categories->where('cms_user_id', $user->id);
        }
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
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $category = Category::where('cms_user_id', $user->id)->findOrFail($id);
        } else {
            $category = Category::findOrFail($id);
        }
        return view('backend.category.show', compact('category'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user('id');
        $events = Event::where('cms_user_id', $user->id)->get();
        return view('backend.category.create', compact('events'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user('id');
        $events = Event::where('id', $request->event_id)->where('cms_user_id', $user->id)->firstOrFail();
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'event_id' => 'required',
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg|max:512',
        ]);

        // Create a new Event instance
        $category = new Category();
        $cover_image = request()->file('cover_image');
        $manager = ImageManager::gd();
        if ($cover_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $cover_image->clientExtension();
            $destinationPath = public_path("storage/images/categories");
            $image = $manager->read($cover_image->getRealPath());
            $image->save($destinationPath . '/' . $filename, 90);
            $category->cover_image = $filename;
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
        // $category = Category::findOrFail($id);
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $category = Category::where('cms_user_id', $user->id)->findOrFail($id);
        }
        $user = Auth::guard('admin')->user('id');
        $events = Event::where('cms_user_id', $user->id)->get();
        return view('backend.category.edit', compact('category', 'events'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $user = Auth::guard('admin')->user('id');
        $events = Event::where('id', $request->event_id)->where('cms_user_id', $user->id)->firstOrFail();
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'event_id' => 'required',
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg|max:512',
        ]);

        // Create a new Category instance
        // $category = Category::findOrFail($id);
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $category = Category::where('cms_user_id', $user->id)->findOrFail($id);
        }
        $cover_image = request()->file('cover_image');
        if ($cover_image) {
            $filename = date('Ymd-his') . "." . uniqid() . "." . $cover_image->clientExtension();
            $destinationPath = public_path("storage/images/categories/");
            $manager = ImageManager::gd();
            $image = $manager->read($cover_image->getRealPath());
            optional(Storage::disk('public')->delete('images/categories/' . $category->cover_image));
            $image->save($destinationPath . '/' . $filename, 90);
            $category->cover_image = $filename;
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
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $category = Category::where('cms_user_id', $user->id)->findOrFail($id);
        }
        // $category = Category::findOrFail($id);
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
        $user = Auth::guard('admin')->user('id');
        $category = Category::where('cms_user_id', $user->id)->findOrFail($id);
        $event = Event::findOrFail($category->event_id);
        // dd($category, $event);
        return view('backend.category.upload-images', compact('category', 'event'));
    }

    public function uploadImages(Request $request, $eventSlug, $categorySlug)
    {
        // dd($request);
        $user = Auth::guard('admin')->user('id');
        $event = Event::whereSlug($eventSlug)->firstOrFail();
        $category = Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();
        $galleryImages = GalleryImage::where('cms_user_id', $user->id)->get();

        if ($galleryImages->count() >= $user->max_images_count) {
            // Log::info('exceed');
            return response()->json([
                'status' => false,
                'message' => 'You have exceeded the limit of ' . $user->max_images_count . ' images.'
            ], 500);
        }

        $totalUploadedSize = 0;
        $currentStorageUsage = $galleryImages->sum('file_size') / (1024 * 1024);
        foreach ($request->file('file') as $file) {
            $totalUploadedSize += $file->getSize() / 1024; // Convert bytes to KB
        }
        // Log::info('Corrent storage use', $currentStorageUsage);

        if (($currentStorageUsage + $totalUploadedSize) >= $user->max_storage_limit) {
            // Log::info('exceed of max storage');
            $remainingStorage = $user->max_storage_limit - $currentStorageUsage + $totalUploadedSize;
            return response()->json([
                'status' => false,
                'message' => 'Uploading these files would exceed your maximum storage limit. You have' . $remainingStorage . 'GB remaining.'
            ], 500);
        }

        if (request()->file('file') && request()->file('file')->getSize() / 1024 / 1024 > $user->max_image_size) {
            return response()->json([
                'status' => false,
                'message' => 'The uploaded image exceeds the maximum allowed size of' . $user->max_image_size . ' MB.'
            ], 500);
        }

        try {
            $fileWithExt = request()->file('file');
            $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
            $destinationPath = public_path("storage/images/galleries/{$event->slug}/{$category->slug}");
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $manager = ImageManager::gd();
            $image = $manager->read($fileWithExt->getRealPath());

            if ($event->upload_image_quality == 'compressed') {
                // Log::info('Image is stored in compress quality.');
                $image->resize(1000);
                $image->save($destinationPath . '/' . $filename, 90);
            } else {
                // Log::info('Image is stored in original quality.');
                $image->save($destinationPath . '/' . $filename, 100);
            }

            $res = Http::attach(
                'image_name', // The name of the file field in the request
                file_get_contents($fileWithExt->getRealPath()), // The file's content
                $filename, // The file name
                ['Content-Type' => 'image/jpeg']
            )->post(config('app.python_api_url') . '/api/inputimg/');

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
                $gallery_image->file_size = $fileWithExt->getSize();
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
        return response()->json([
            'status' => false,
            'message' => 'The uploaded image does not appear to contain a valid face. Please upload a proper face image.'
        ], 500);
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
            return redirect()->back()->with(toast('Gallery Image Deleted Successfully', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function categoryUrl($id)
    {
        $category = Category::findOrFail($id);
        $event = Event::findOrFail($category->event_id);
        $url = URL::temporarySignedRoute('frontend.category.share.index', now()->addDays(3), ['eventSlug' => $event->slug, 'categorySlug' => $category->slug]);
        return redirect()->route('backend.category.show', $id)->with('shared_url', $url);
    }
}
