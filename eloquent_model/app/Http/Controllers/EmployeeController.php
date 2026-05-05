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
        /*$employee = Employee::create([
            'first_name' => 'One Fname',
            'last_name' => 'One Lname',
            'email' => 'One email',
            'phone' => 'One phone',
            'position' => 'One position',
            'salary' => 50000,
            'hire_date' => date('Y-m-d'),
            'status' => 'active',
            'department' => 'One department'
        ]); */

        // To update

        /* $employee = Employee::findOrFail(53)->update([
            'first_name' => 'Two Fname',
            'last_name' => 'Two Lname',
            'email' => 'Two email',
            'phone' => 'Two phone',
            'position' => 'Two position',
            'salary' => 60000,
            'hire_date' => date('Y-m-d'),
            'status' => 'active',
            'department' => 'Two department'
        ]); */

        // To update using where
        $employee = Employee::where('department','1')->update([
            'salary' => 60000
        ]);

        dd('success');
    }
}
