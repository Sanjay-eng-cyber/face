<?php

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

Route::get('/', function () {
    return view('welcome');
    
});


//upload image user in db
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');

//capture or upload image to find right image 
Route::get('/capture', [GalleryController::class, 'capture'])->name('gallery.capture');
Route::post('/capture/store', [GalleryController::class, 'capturestore'])->name('capture.store');





