<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route Parameters
Route::get('/product/{id}', function($id){
    return "Product ID: " . $id;
});

Route::get('/product/{id}/{category}', function($id, $category){
    return "Product ID: " . $id . " Category: " . $category;
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function(){
        return "
        <div>
            |<a href='".route('admin.dashboard')."'>Dashboard</a>|
            <a href='".route('admin.users')."'>Manage Users</a>|
            <a href='".route('admin.reports')."'>View Reports</a>|
        </div>
        ";
    })->name('admin.home');

    Route::get('/dashboard', function(){
        return "<h1>Admin Dashboard</h1>";
    })->name('admin.dashboard');

    Route::get('/users', function(){
        return "<h1>Manage Users</h1>";
    })->name('admin.users');
    Route::get('/reports', function(){
        return "<h1>View Reports</h1>";
    })->name('admin.reports');
});

Route::fallback(function(){
    return "Oops! The page you are looking for does not exist.";
});