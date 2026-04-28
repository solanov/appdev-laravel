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
            ]
        );
        return $request;
    }
}
