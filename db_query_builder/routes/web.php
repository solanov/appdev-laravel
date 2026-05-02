<?php

use App\Http\Controllers\QueryBuilderContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/querybuilder', [QueryBuilderContoller::class, 'index']);

