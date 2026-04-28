<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegistrationController::class, 'index'])->name('register');

Route::post('/register', [RegistrationController::class, 'handleRegistration'])->name('register.submit');

Route::get('/summary', [RegistrationController::class, 'showSummary'])->name('summary');
