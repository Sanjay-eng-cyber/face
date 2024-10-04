<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;
use App\Models\Upload;

Route::domain(config('app.web_domain'))->group(function () {

    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');

    Route::get('/test-progress', function () {
        $event = (object) ['slug' => 'Test Event Slug'];
        $category = (object) ['slug' => 'Test Category Slug'];

        return view('frontend.test', compact('event', 'category'));
    })->name('test-progress');

    Route::get('/upload-img', function () {
        $event = (object) ['slug' => 'Test Event Slug'];
        $category = (object) ['slug' => 'Test Category Slug'];

        return view('frontend.test', compact('event', 'category'));
    })->name('test-progress');

    Route::post('/upload/{eventSlug}/{categorySlug}', function () {
        $eventSlug = request('eventSlug');
        $categorySlug = request('categorySlug');
        $file = request()->file('file');

        $event = App\Models\Event::whereSlug($eventSlug)->firstOrFail();
        $category = App\Models\Category::whereSlug($categorySlug)->where('event_id', $event->id)->firstOrFail();

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

                $gallery_image = new Upload();
                $gallery_image->cms_user_id = auth()->user()->id;
                $gallery_image->event_id = $event->id;
                $gallery_image->category_id = $category->id;
                $gallery_image->image_name = $filename;
                $gallery_image->image_url = "images/uploads/{$event->slug}/{$category->slug}/{$filename}";
                $gallery_image->face_encoding = $face_encoding;
                $gallery_image->face_locations = $face_locations;
                if ($gallery_image->save()) {
                    return response()->json([
                        'status' => true,
                        'fileName' => $filename,
                        'id' => $gallery_image->id,
                        'path' => "/storage/images/uploads/{$eventSlug}/{$categorySlug}/{$filename}"
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Log::info('Catch Err : ' . $th->getMessage());
        }
        return response()->json(['status' => false, 'message' => 'Something Went Wrong'], 500);
    })->name('upload');


    // Route::get('/about-us', function () {
    //     return view('frontend.about-us');
    // })->name('about-us');


    // Route::get('/industries', function () {
    //     return view('frontend.industries.index');
    // })->name('industries');

    // Route::get('/contact-us', function () {
    //     return view('frontend.contact');
    // })->name('contact-us');

    // Route::get('/career', function () {
    //     return view('frontend.career');
    // })->name('career');





    // Route::post('/career/submit/', [CareerController::class, 'career'])->name('career-submit');
    // Route::post('/contact-us/submit/', [ContactFormSubmissionController::class, 'contact'])->name('contact-submit');


    // Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    // Route::get('/product/{category}', [ProductController::class, 'category'])->name('product.category');
    // Route::get('/product/c/{type}', [ProductController::class, 'type'])->name('product.type');
    // Route::get('/products/c/{category}', [ProductController::class, 'allProducts'])->name('product.all-product');
    // Route::get('/product/t/{product}', [ProductController::class, 'show'])->name('product.show');



    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });
});
