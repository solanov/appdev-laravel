<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {

}); */

Route::get('/', [HomeController::class, 'index']);

/* Route::get('/about', function () {

}); */

Route::get('/about', [AboutController::class, 'index']);

/* Route::get('/contact', function () {

}); */

Route::get('/contact', [ContactController::class, 'index']);


// Resource Controller
Route::resource('blog', BlogController::class);


//Single Action Controller
Route::get('/photo', PhotoController::class);
