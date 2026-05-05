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
        //updating data
        //$employee = Employee::find(52);
        $employee = Employee::where('id', '=', 52)->first();
        $employee->first_name='John';
        $employee->last_name='Dela Cruz';

        $employee->save();

        dd('success');
    }
}
