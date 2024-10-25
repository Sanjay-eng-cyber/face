<?php

use App\Models\Upload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;

Route::domain(config('app.web_domain'))->group(function () {
    // Route::get('/login', function () {
    //     return view('frontend.login');
    // })->name('login');
    Route::get("/login", 'App\Http\Controllers\frontend\LoginController@loginShow')->name('frontend.login');
    Route::post("/login/submit", 'App\Http\Controllers\frontend\LoginController@login')->name('frontend.login.submit');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/', function () {
            return view('frontend.index');
        })->name('index');

        Route::get('/event-details', function () {
            return view('frontend.event-details');
        })->name('event-details');

        Route::get('/gallery', function () {
            return view('frontend.gallery');
        })->name('gallery');

        Route::get('/test-progress', function () {
            $event = (object) ['slug' => 'Test Event Slug'];
            $category = (object) ['slug' => 'Test Category Slug'];

            return view('frontend.test', compact('event', 'category'));
        })->name('test-progress');

        Route::get('/upload/{eventSlug}/{categorySlug}', 'App\Http\controllers\frontend\UploadController@uploadIndex')->name('upload-index');
        Route::post('/upload/{eventSlug}/{categorySlug}', 'App\Http\controllers\frontend\UploadController@uploadImg')->name('upload-img');
        Route::get('/compare-uploaded-img/{upload_id}', 'App\Http\controllers\frontend\UploadController@compareImg')->name('compare-img');

        Route::get('/logout', 'App\Http\Controllers\frontend\LoginController@logout')->name("frotend.logout");
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
});
