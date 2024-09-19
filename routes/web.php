<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
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

    Route::post('/upload', function () {
        $file = request()->file('file');

        // Get the original file name
        $originalFileName = $file->getClientOriginalName();

        // Log the original file name
        // Log::info('Uploaded file: ' . $originalFileName);

        return response()->json([
            'status' => true,
            'fileName' => $originalFileName
        ]);
    })->name('upload');

    Route::delete('/delete-upload-image/{eventSlug}/{categorySlug}/{filename}', function () {
        sleep(3);
        // Log::info('EventSlug : ' . request('eventSlug'));
        // Log::info('CategorySlug : ' . request('categorySlug'));
        // Log::info('Delete file Name : ' . request('filename'));
        return true;
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
