<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cms\EventController;
use App\Http\Controllers\cms\GalleryController;
use App\Http\Controllers\cms\UploadController;


Route::domain(config('app.cms_domain'))->group(function () {


    require __DIR__ . '/auth.php';

    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', 'App\Http\Controllers\cms\ForgotPasswordController@index')->name('cms.forgotPassword.index');

    // admin auth routes
    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', 'App\Http\Controllers\cms\ChangePasswordController@changePassword')->name('cms.changePassword.index');
        Route::post('/change-password/{id}', 'App\Http\Controllers\cms\ChangePasswordController@passwordChange')->name('cms.password.submit');

        Route::get('/logout', 'App\Http\Controllers\cms\LoginController@logout')->name("cms.logout");

        Route::get('/', 'App\Http\Controllers\cms\StatisticsController@index')->name("cms.statistics.index");

        Route::get('users/', 'App\Http\Controllers\cms\UserController@index')->name('backend.user.index');
        Route::get('/user/show/{id}', 'App\Http\Controllers\cms\UserController@show')->name("backend.user.show");
        Route::get('/user/create', 'App\Http\Controllers\cms\UserController@create')->name("backend.user.create");
        Route::post('/user/store', 'App\Http\Controllers\cms\UserController@store')->name("backend.user.store");
        Route::get('/user/form-1/edit/{id}', 'App\Http\Controllers\cms\UserController@FormOneEdit')->name("backend.user.form-one-edit");
        Route::post('/user/form-1/update/{id}', 'App\Http\Controllers\cms\UserController@FormOneUpdate')->name("backend.user.form-one-update");
        Route::get('/user/form-2/edit/{id}', 'App\Http\Controllers\cms\UserController@FormTwoEdit')->name("backend.user.form-two-edit");
        Route::post('/user/form-2/update/{id}', 'App\Http\Controllers\cms\UserController@FormTwoUpdate')->name("backend.user.form-two-update");
        Route::get('/user/delete/{id}', 'App\Http\Controllers\cms\UserController@destroy')->name("backend.user.delete");

        Route::get('/user/print/{user_id}', 'App\Http\Controllers\cms\UserController@pdf')->name('backend.user.print');

        Route::post('/user/add/subscription/{user_id}', 'App\Http\Controllers\cms\UserController@createSubscription')->name('backend.user.subscription.create');


        Route::get('/events/', [EventController::class, 'index'])->name('backend.events.index');
        Route::get('/event/show/{id}', [EventController::class, 'show'])->name('backend.event.show');
        Route::get('/event/create', [EventController::class, 'create'])->name('backend.event.create');
        Route::post('/event/store', [EventController::class, 'store'])->name('backend.event.store');
        Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('backend.event.edit');
        Route::post('/event/update/{id}', [EventController::class, 'update'])->name('backend.event.update');
        Route::get('/event/delete/{id}', [EventController::class, 'delete'])->name('backend.event.delete');
        Route::get('/event/gallery/{id}', [EventController::class, 'gallery'])->name('backend.event.gallery');


        Route::get('/gallery/index', [GalleryController::class, 'index'])->name('backend.gallery.index');
        Route::post('/gallery/store', [GalleryController::class, 'store'])->name('backend.gallery.store');


        Route::get('/upload', [UploadController::class, 'index'])->name('backend.upload.index');
        Route::post('/upload/store', [UploadController::class, 'store'])->name('backend.upload.store');
        Route::get('/upload/{eventid}', [UploadController::class, 'show'])->name('upload.show');

        Route::get('/share-event/{eventid}', 'App\Http\Controllers\cms\ShareEventController@shareEvent')->name('share.event');

    });
});
