<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showMessage() {
        return "Hello, this is a basic controller!";
    }

    public function showName($name) {
        return "Hello, " . $name . ", this is a basic controller!";
    }
}
