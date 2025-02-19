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

    Route::get('/basic-details-two', function () {
        return view('frontend.basic-details-two');
    })->name('basic-details-two');

    Route::get('/basic-details-three', function () {
        return view('frontend.basic-details-three');
    })->name('basic-details-three');

    Route::post("/e/user/details", 'App\Http\Controllers\frontend\EventController@getUserDetails')->name('frontend.user.details');
    Route::get("/e/step-one-form/{eventSlug}", 'App\Http\Controllers\frontend\EventController@stepOneForm')->name('frontend.event.step-one-form');
    Route::post("/e/verify-pin", 'App\Http\Controllers\frontend\EventController@verifyPin')->name('frontend.event.verify-pin');
    Route::get("/e/step-two-form/{eventSlug}", 'App\Http\Controllers\frontend\EventController@stepTwoForm')->name('frontend.event.step-two-form');
    Route::post("/e/step-two-form/submit/{eventSlug}", 'App\Http\Controllers\frontend\EventController@stepTwoFormSubmit')->name('frontend.event.step-two-form.submit');
    Route::post("/e/step-two-form/frontend-user-image/{userName}", 'App\Http\Controllers\frontend\EventController@frontendUserImageSubmit')->name('frontend.event.frontend-user-image.submit');
    Route::post("/e/step-two-form/guest-image/{eventSlug}", 'App\Http\Controllers\frontend\EventController@guestImage')->name('frontend.event.guest-image');


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

    Route::group(['middleware' => 'is_event_active'], function () {

        Route::get('/e/share/{eventSlug}', 'App\Http\Controllers\frontend\EventController@show')->name('frontend.event.share.index');

        Route::prefix('api')->group(function () {

            Route::post('event/verify-pin', 'App\Http\Controllers\frontend\EventController@verifyPin')->name('frontend.event.verify-pin');
            Route::post('event/user-submit', 'App\Http\Controllers\frontend\EventController@userFormSubmit')->name('frontend.event.user-submit');
            Route::post('event/fetch-matched-images', 'App\Http\Controllers\frontend\EventController@fetchMatchedImages')->name('frontend.event.fetch-matched-images');
            Route::post('event/sync-matched-images', 'App\Http\Controllers\frontend\EventController@syncMatchedImages')->name('frontend.event.sync-matched-images');
        });
    });


    Route::get('/c/share/{eventSlug}/{categorySlug}', 'App\Http\Controllers\frontend\CategoryController@show')->name('frontend.category.share.index');
    Route::post('category/user-submit', 'App\Http\Controllers\frontend\CategoryController@userFormSubmit')->name('frontend.category.user-submit');

});
