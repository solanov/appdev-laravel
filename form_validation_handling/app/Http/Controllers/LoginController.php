<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function handleLogin(Request $request){
        /* echo $_POST['name'];
        echo "<br>";
        echo $_POST['email'];
        echo "<br>";
        echo $_POST['password']; */
       //dd($request);

        //dd($request->all());
        $request->validate(
            [
                'name' => ['required','alpha'],
                'email' => ['required','email'],
                'password' => ['required','min:6','max:10']
            ],
            // Changing validation default message
            [
                'name.required' => 'Attention: Please Fill up the Username field to continue!',
                'name.alpha' => 'Attention: User name should contain letter only!',
                'email.required' => 'Attention: Please Fill up the Email field to continue!',
                'email.email' => 'Attention: Please use a valid email address to continue!',
                'password.required' => 'Attention: Please Fill up the Password field to continue!',
                'password.min' => 'Attention: Password must be at least 6 characters',
                'password.max' => 'Attention: Password must not exceed 10 characters'
            ]
        );
        return $request;
    }
}
