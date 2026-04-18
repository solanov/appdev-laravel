<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs=[
        [
            'title' => 'This is the title One',
            'body' => 'This is a body text One'
        ],
        [
            'title' => 'This is the title Two',
            'body' => 'This is a body text Two'
        ],
        [
            'title' => 'This is the title Three',
            'body' => 'This is a body text Three'
        ],
        [
            'title' => 'This is the title Four',
            'body' => 'This is a body text Four'
        ],
    ];
    return view('home', compact('blogs'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
