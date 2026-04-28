<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/basic', [TestController::class, 'showMessage']);

Route::get('/basic/{name}', [TestController::class, 'showName']);

Route::resource('products', ProductController::class);

Route::get('/welcome', WelcomeController::class);
