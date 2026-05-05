<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee', [EmployeesController::class, 'index']);

