<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('about', function(){
    return "<h1>About Us</h1>";
})->name('about_us');


Route::get('contact', function(){
    return "<h1>Contact Page</h1>";
});

Route::get('contact/{id}', function($id){
    return $id;
})->name('edit_contact');

Route::get('home', function(){
    //return "<a href='".route('about_us')."'> About </a>";
    return "<a href='".route('edit_contact', 1)."'> Edit Contact </a>";
});*/

/*Route Grouping*/

//Route::group(['prefix' => 'user'], function(){
Route::group(['prefix' => 'customer'], function(){
    Route::get('/', function(){
        return "<h1>Customer List</h1>";
    });

    Route::get('/create', function(){
        return "<h1>Customer Create</h1>";
    });

    Route::get('/show', function(){
        return "<h1>Customer Show</h1>";
    });
});

//fallback route


Route::fallback(function(){
    return "Route not Exist";
});



