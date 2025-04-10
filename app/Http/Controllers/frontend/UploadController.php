<?php

namespace App\Http\Controllers\frontend;

use App\Events\UploadedImageFaceMatchingRequestedEvent;
use App\Models\Event;
use App\Models\Upload;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Jobs\CompareUploadedImagesForFaceMatching;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{
    public function uploadIndex(Request $request, $eventSlug, $categorySlug)
    {
        $event = Event::whereSlug($eventSlug)->firstOrFail();
        $category = Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();

        return view('frontend.test-upload', compact('event', 'category'));
    }

    public function uploadImg(Request $request, $eventSlug, $categorySlug)
    {
        $event = Event::whereSlug($eventSlug)->firstOrFail();
        $category = Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();

        try {
            $fileWithExt = request()->file('file');
            $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
            $destinationPath = public_path("storage/images/uploads/{$event->slug}/{$category->slug}");
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $manager = ImageManager::gd();
            $image = $manager->read($fileWithExt->getRealPath());
            $image->save($destinationPath . '/' . $filename, 90);

            $res = Http::withHeaders([
                'X-API-TOKEN' => config('app.python_api_token'),
            ])->attach(
                    'image_name', // The name of the file field in the request
                    file_get_contents($fileWithExt->getRealPath()), // The file's content
                    $filename, // The file name
                    ['Content-Type' => 'image/jpeg']
                )->post(config('app.python_api_url') . '/inputimg/');

            // dd($res);
            Log::info('Python API Response : ' . $res->body());
            if ($res->successful()) {
                $data = $res->json();
                $status = $data['status'] ?? null;
                if ($status !== true) {
                    return response()->json(['status' => false, 'message' => 'Something Went Wrong.'], 500);
                }
                $face_encoding = $data['face_encoding'] ?? null;
                $face_locations = $data['face_locations'] ?? null;

                $upload = new Upload();
                $upload->frontend_user_id = 1;
                $upload->event_id = $event->id;
                $upload->category_id = $category->id;
                $upload->image_name = $filename;
                $upload->image_url = "images/uploads/{$event->slug}/{$category->slug}/{$filename}";
                $upload->face_encoding = $face_encoding;
                $upload->face_locations = $face_locations;
                if ($upload->save()) {
                    return response()->json([
                        'status' => true,
                        'fileName' => $filename,
                        'id' => $upload->id,
                        'path' => "/storage/images/uploads/{$eventSlug}/{$categorySlug}/{$filename}"
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Log::info('Catch Err : ' . $th->getMessage());
        }
        return response()->json(['status' => false, 'message' => 'Something Went Wrong'], 500);
    }

    public function compareImg(Request $request, $upload_id)
    {
        $upload = Upload::findOrFail($upload_id);
        $event = Event::findOrFail($upload->event_id);
        $category = Category::where('event_id', $event->id)->findOrFail($upload->category_id);
        // dd($upload, $event, $category);

        // dd($galllery_images);
        UploadedImageFaceMatchingRequestedEvent::dispatch($upload);
        // $gallery_images = GalleryImage::where('event_id', $event->id)->where('category_id', $category->id)->get();
        // foreach ($gallery_images as $gallery_image) {
        //     CompareUploadedImagesForFaceMatching::dispatch($upload, $gallery_image);
        // }

    }
}
