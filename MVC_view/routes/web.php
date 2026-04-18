<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/gadgets', function(){
    return view('products.gadgets');
});

Route::get('/clothes', function(){
    return view('products.clothes');
});


//Dynamic views by passing data

Route::get('/register', function(){
    $info = 'Please fillup all the required information';
    return view('register', ['info' => $info]);
});
