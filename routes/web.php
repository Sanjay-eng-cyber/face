<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/event', [GalleryController::class, 'event'])->name('events.index');
// Route::post('/event/store', [GalleryController::class, 'eventstore'])->name('events.store');

// //upload image user in db
// Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
// Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');

// //capture or upload image to find right image 
// Route::get('/capture', [GalleryController::class, 'capture'])->name('gallery.capture');
// Route::post('/capture/store', [GalleryController::class, 'capturestore'])->name('capture.store');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';





Route::domain(config('app.web_domain'))->group(function () {

    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');


    Route::get('/about-us', function () {
        return view('frontend.about-us');
    })->name('about-us');


    Route::get('/industries', function () {
        return view('frontend.industries.index');
    })->name('industries');

    Route::get('/contact-us', function () {
        return view('frontend.contact');
    })->name('contact-us');

    Route::get('/career', function () {
        return view('frontend.career');
    })->name('career');





    Route::post('/career/submit/', [CareerController::class, 'career'])->name('career-submit');
    Route::post('/contact-us/submit/', [ContactFormSubmissionController::class, 'contact'])->name('contact-submit');


    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{category}', [ProductController::class, 'category'])->name('product.category');
    Route::get('/product/c/{type}', [ProductController::class, 'type'])->name('product.type');
    Route::get('/products/c/{category}', [ProductController::class, 'allProducts'])->name('product.all-product');
    Route::get('/product/t/{product}', [ProductController::class, 'show'])->name('product.show');



    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
