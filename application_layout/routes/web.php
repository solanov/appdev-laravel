<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs=[
        [
            'title' => 'This is the title One',
            'body' => 'This is a body text One',
            'active' => 1
        ],
        [
            'title' => 'This is the title Two',
            'body' => 'This is a body text Two',
            'active' => 1
        ],
        [
            'title' => 'This is the title Three',
            'body' => 'This is a body text Three',
            'active' => 0
        ],
        [
            'title' => 'This is the title Four',
            'body' => 'This is a body text Four',
            'active' => 0
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
