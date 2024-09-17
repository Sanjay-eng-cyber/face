<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.web_domain'))->group(function () {

    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');


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
