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
        //inserting or saving data with eloquent
        $employee = new Employee();

        $employee->first_name='John';
        $employee->last_name='Dela Cruz';
        $employee->email='johndelacruz@example.com';
        $employee->phone='0927567890';
        $employee->department=1;
        $employee->salary=50000;
        $employee->hire_date='2023-01-01';
        $employee->status='active';

        $employee->save();

        dd('succeess');

    }
}
