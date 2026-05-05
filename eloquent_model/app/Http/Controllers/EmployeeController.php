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
        //return $employees = Employee::all();
        //return Employee::find(4);
        //$employee = Employee::find(4);
        //return $employee->first_name.' '.$employee->last_name;

        //return $employee=Employee::find(52);
        //return $employee=Employee::findOrFail(52);

        $employees = Employee::all();

        foreach($employees as $employee){
            echo $employee->first_name.' '.$employee->last_name.'<br>';
        }
    }
}
