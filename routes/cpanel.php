<?php

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\cms\EventController;
use App\Http\Controllers\cms\UploadController;
use App\Http\Controllers\cms\CmsUserController;
use App\Http\Controllers\cms\GalleryController;
use App\Http\Controllers\cms\CategoryController;

Route::domain(config('app.cms_domain'))->group(function () {


    require __DIR__ . '/auth.php';

    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', 'App\Http\Controllers\cms\ForgotPasswordController@index')->name('cms.forgotPassword.index');
    Route::get('/register-event/{eventname}', 'App\Http\Controllers\cms\ShareEventController@registerEvent')->name('register.event');


    // admin auth routes
    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/update-profile', 'App\Http\Controllers\cms\ChangePasswordController@changePassword')->name('cms.changePassword.index');
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

        // Route::group(["middleware" => "cms_user_role:admin"], function () {
        Route::group(["middleware" => "cms_user_role:admin"], function () {
            Route::get('/event/create', [EventController::class, 'create'])->name('backend.event.create');
            Route::post('/event/store', [EventController::class, 'store'])->name('backend.event.store');
            Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('backend.event.edit');
            Route::post('/event/update/{id}', [EventController::class, 'update'])->name('backend.event.update');
            Route::get('/event/delete/{id}', [EventController::class, 'delete'])->name('backend.event.delete');
            Route::post('/generate/event-url/{id}', [EventController::class, 'eventUrl'])->name('backend.event.url');
            Route::get('/frontend-users/{event_id}', [EventController::class, 'frontendUserIndex'])->name('backend.frotend-user.index');
            Route::get('/frontend-users/{event_id}/{frontend_user_id}', [EventController::class, 'frontendUserShow'])->name('backend.frotend-user.show');

            Route::get('/category/create', [CategoryController::class, 'create'])->name('backend.category.create');
            Route::post('/category/store', [CategoryController::class, 'store'])->name('backend.category.store');
            Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('backend.category.edit');
            Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('backend.category.update');
            Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('backend.category.delete');
            Route::get('/category/upload-images/{id}', [CategoryController::class, 'uploadImagesIndex'])->name('backend.category.upload-image-index');
            Route::get('category/uploaded-images/delete/{id}', [CategoryController::class, 'deleteUploadImage'])->name('backend.category.image-upload-delete');
            Route::post('/generate/category-url/{id}', [CategoryController::class, 'categoryUrl'])->name('backend.category.url');

            Route::post('/upload/{eventSlug}/{categorySlug}', [CategoryController::class, 'uploadImages'])->name('backend.category.image-upload');
            Route::delete('/delete-upload-image/{eventSlug}/{categorySlug}/{id}', [CategoryController::class, 'deleteUploadedImage'])->name('backend.category.delete-uploaded-image');

            Route::post('/gallery/store', [GalleryController::class, 'store'])->name('backend.gallery.store');
        });

        Route::get('/events', [EventController::class, 'index'])->name('backend.event.index');
        Route::get('/event/show/{id}', [EventController::class, 'show'])->name('backend.event.show');

        Route::get('/categories', [CategoryController::class, 'index'])->name('backend.category.index');
        Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('backend.category.show');

        Route::get('/category/uploaded-images/{id}', [CategoryController::class, 'uploadedImagesIndex'])->name('backend.category.upload-image-show');

        Route::group(["middleware" => "cms_user_role:super-admin"], function () {
            Route::get('/cms-users', [CmsUserController::class, 'index'])->name('backend.cms-user.index');
            Route::get('/cms-user/show/{id}', [CmsUserController::class, 'show'])->name('backend.cms-user.show');
            Route::get('/cms-user/create', [CmsUserController::class, 'create'])->name('backend.cms-user.create');
            Route::post('/cms-user/store', [CmsUserController::class, 'store'])->name('backend.cms-user.store');
            Route::get('/cms-user/edit/{id}', [CmsUserController::class, 'edit'])->name('backend.cms-user.edit');
            Route::post('/cms-user/update/{id}', [CmsUserController::class, 'update'])->name('backend.cms-user.update');
            Route::get('/cms-user/delete/{id}', [CmsUserController::class, 'delete'])->name('backend.cms-user.delete');
        });
    });
});
