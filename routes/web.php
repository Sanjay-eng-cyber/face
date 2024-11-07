<?php

use App\Models\Upload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontend\SocialAuthController;

Route::domain(config('app.web_domain'))->group(function () {
    // Route::get('/login', function () {
    //     return view('frontend.login');
    // })->name('login');
  
    Route::get('/basic-details-one', function () {
        return view('frontend.basic-details-one');
    })->name('basic-details-one');

    Route::get("/login", 'App\Http\Controllers\frontend\LoginController@loginShow')->name('frontend.login');
    Route::post("/login/submit", 'App\Http\Controllers\frontend\LoginController@login')->name('frontend.login.submit');

    Route::get('/forgot-password', 'App\Http\Controllers\frontend\ForgotPasswordController@index')->name('frontend.forgotPassword.index');
    Route::post('forgot-password', 'App\Http\Controllers\Auth\PasswordResetLinkController@store')
        ->name('frontend.password.email');

    Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\NewPasswordController@frontendCreate')
        ->name('frontend.password.reset');
    Route::post('reset-password', 'App\Http\Controllers\Auth\NewPasswordController@store')->name('frontend.password.update');

    // route for google login
    Route::get('login/{provider}', 'App\Http\Controllers\frontend\SocialAuthController@redirectToProvider');
    Route::get('login/{provider}/callback', 'App\Http\Controllers\frontend\SocialAuthController@handleProviderCallback');

    Route::get('/e/share/{eventSlug}', function () {
        return 'True';
    })->name('frontend.event.share.index');

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

        Route::get('/event/{slug}', 'App\Http\controllers\frontend\EventController@show')->name('frontend.event.show');
        Route::get('/gallery/{event_id}/{category_id}', 'App\Http\controllers\frontend\GalleryController@index')->name('frontend.gallery.index');

        Route::get('/upload/{eventSlug}/{categorySlug}', 'App\Http\controllers\frontend\UploadController@uploadIndex')->name('upload-index');
        Route::post('/upload/{eventSlug}/{categorySlug}', 'App\Http\controllers\frontend\UploadController@uploadImg')->name('upload-img');
        Route::get('/compare-uploaded-img/{upload_id}', 'App\Http\controllers\frontend\UploadController@compareImg')->name('compare-img');

        Route::get('/logout', 'App\Http\Controllers\frontend\LoginController@logout')->name("frontend.logout");
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
