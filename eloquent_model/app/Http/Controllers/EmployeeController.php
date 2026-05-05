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
        /* Employee::where('id', 53)->delete();

        dd('success'); */

        return Employee::all();
    }
}
