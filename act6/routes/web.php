<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class);

Route::get('tasks/trash/view', [TaskController::class, 'trash'])->name('tasks.trash');
Route::patch('tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
Route::delete('tasks/{id}/force-delete', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');
