<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //return Employee::all();
        //return Employee::where('department','=','1')->get();
        //return Employee::where('salary','>=','45000')->get();

        return Employee::where('salary','>=','45000')->where('department','=','1')->get();
    }
}
