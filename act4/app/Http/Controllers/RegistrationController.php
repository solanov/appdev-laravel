<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index() {
        return view('register');
    }

    public function handleRegistration(RegisterRequest $request) {
        $data = $request->except(['password', 'password_confirmation', '_token']);

        return redirect()->route('summary')->with('submitted_data', $data);
    }

    public function showSummary() {
        if (!session()->has('submitted_data')) {
            return redirect()->route('register');
        }

        return view('summary', ['data' => session('submitted_data')]);
    }
}
