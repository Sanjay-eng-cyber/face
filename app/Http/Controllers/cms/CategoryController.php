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
use App\Http\Controllers\Controller;
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
        ]);

        // Create a new Event instance
        $event = new Category();
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->event_id = $request->event_id;
        $event->sharing = $request->sharing;
        if ($event->save()) {
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
        ]);

        // Create a new Event instance
        $event = Category::findOrFail($id);
        $event->name = $request->name;
        $event->event_id = $request->event_id;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->sharing = $request->sharing;
        if ($event->save()) {
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
        };
        if ($category->delete()) {
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

        // try {
        $gallery_images = new GalleryImage();
        // if ($request->hasFile('file')) {
        $fileWithExt = request()->file('file');
        $extension = $fileWithExt->clientExtension();
        $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
        $destinationPath = storage_path("images/galleries/{$event->slug}/{$category->slug}/{$filename}");
        if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
            $manager = ImageManager::gd();
            $image = $manager->read($fileWithExt->getRealPath());
            $image->save($destinationPath . $filename, 90);
            $extension = 'image';
        } else {
            Storage::disk('public')->put($destinationPath . '/' . $filename, file_get_contents($fileWithExt));
        }
        return ['filename' => $filename, 'type' => $extension];
        // }

        $gallery_images->cms_user_id =  auth()->user()->id;
        $gallery_images->event_id =  $event->id;
        $gallery_images->category_id =  $category->id;
        $gallery_images->image_name =  $fileWithExt;
        $gallery_images->image_name = $filename;
        $gallery_images->image_url = storage_path("app/public/images/galleries/{$event->slug}/{$category->slug}/{$filename}");
        if ($gallery_images->save()) {
            return response()->json(['success' => true, 'message' => 'File Store successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'File not found.'], 404);
        }
        // $destinationPath = "images/galleries/{$eventSlug}/{$categorySlug}";

        // // Store the file in the defined path using the original file name
        // $file->storeAs($destinationPath, $originalFileName, 'public');


        // call python api - url ->
        // $res = Http::attach(
        //     'file', // The name of the file field in the request
        //     file_get_contents($file->getRealPath()), // The file's content
        //     $originalFileName, // The file name
        //     ['Content-Type' => 'image/jpeg']
        // )->post(config('app.python_api_url') . '/inputimg/', [
        //     'cms_user_id' => auth()->user()->id,
        //     'event_id' => $event->id,
        //     'category_id' => $category->id,
        // ]);
        // Log::info('came here');
        // Log::info($res);
        // if ($res->successful()) {
        //     // Handle the success response
        //     Log::info('came here 2');
        //     return response()->json([
        //         'status' => true,
        //         'fileName' => $originalFileName,
        //         'path' => "/storage/images/{$eventSlug}/{$categorySlug}/{$originalFileName}"
        //     ], 200);
        // }

        // return response()->json([
        //     'status' => true,
        //     'fileName' => $originalFileName,
        //     'path' => "/storage/images/{$eventSlug}/{$categorySlug}/{$originalFileName}"
        // ]);
        // } catch (\Throwable $th) {
        //     Log::info($th->getMessage());
        // }
        // return response()->json(['status' => false, 'message' => 'Something Went Wrong'], 500);
    }

    public function deleteUploadedImage(Request $request, $eventSlug, $categorySlug, $filename)
    {
        $event = Event::whereSlug($eventSlug)->firstOrFail();
        $category = Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();
        $filePath = "images/galleries/{$eventSlug}/{$categorySlug}/{$filename}";

        // Check if the file exists before attempting to delete it
        if (Storage::disk('public')->exists($filePath)) {
            // Delete the file
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
        $gallery_images = GalleryImage::findOrFail($id);
        if ($gallery_images->delete()) {
            return redirect()->route('backend.category.uploaded-images-index')->with(
                [
                    "message" => "gallery Images Deleted Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->route('backend.category.uploaded-images-index')->with(
                [
                    "message" => "Something Went Wrong",
                    "alert-type" => "error"
                ]
            );
        }
    }
}
