<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('app.web_domain'))->group(function () {

    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');
});