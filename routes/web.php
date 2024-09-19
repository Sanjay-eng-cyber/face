<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;

Route::domain(config('app.web_domain'))->group(function () {

    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');

    Route::get('/test-progress', function () {
        $event = (object) ['slug' => 'Test Event Slug'];
        $category = (object) ['slug' => 'Test Category Slug'];

        return view('frontend.test', compact('event', 'category'));
    })->name('test-progress');

    Route::post('/upload/{eventSlug}/{categorySlug}', function () {
        try {
            $eventSlug = request('eventSlug');
            $categorySlug = request('categorySlug');
            $file = request()->file('file');
            $originalFileName = $file->getClientOriginalName();

            $destinationPath = "images/galleries/{$eventSlug}/{$categorySlug}";

            // Store the file in the defined path using the original file name
            $file->storeAs($destinationPath, $originalFileName, 'public');

            return response()->json([
                'status' => true,
                'fileName' => $originalFileName,
                'path' => "/storage/images/{$eventSlug}/{$categorySlug}/{$originalFileName}"
            ]);
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return response()->json(['status' => false], 500);
        }
    })->name('upload');

    Route::delete('/delete-upload-image/{eventSlug}/{categorySlug}/{filename}', function () {
        $eventSlug = request('eventSlug');
        $categorySlug = request('categorySlug');
        $filename = request('filename');
        $filePath = "images/galleries/{$eventSlug}/{$categorySlug}/{$filename}";

        // Check if the file exists before attempting to delete it
        if (Storage::disk('public')->exists($filePath)) {
            // Delete the file
            Storage::disk('public')->delete($filePath);
            return response()->json(['success' => true, 'message' => 'File deleted successfully.', 'path' => $filePath]);
        } else {
            return response()->json(['success' => false, 'message' => 'File not found.', 'path' => $filePath], 404);
        }
        // Log::info('EventSlug : ' . request('eventSlug'));
        // Log::info('CategorySlug : ' . request('categorySlug'));
        // Log::info('Delete file Name : ' . request('filename'));
        // return true;
    })->name('delete-upload-image');


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
