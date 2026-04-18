<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('student', function () {
    $name='John Doe';
    $age=21;
    $course='BS Computer Science';
    return view('student', compact('name', 'age', 'course'));
});

Route::get('students', function () {
    $students = [
        ['name' => 'Alice', 'course' => 'IT'],
        ['name' => 'Bob', 'course' => 'CS'],
        ['name' => 'Charlie', 'course' => 'IS']
    ];
    return view('students', compact('students'));
});

Route::get('grades', function () {
    $students = [
        ['name' => 'Alice', 'grade' => '85'],
        ['name' => 'Bob', 'grade' => '55'],
        ['name' => 'Charlie', 'grade' => '92']
    ];
    return view('grades', compact('students'));
});
