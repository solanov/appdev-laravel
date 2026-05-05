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
        //deleting data
        //Employee::find(3)->delete();
        //Employee::findOrFail(3)->delete();

        Employee::where('id', '=', 2)->delete();
        dd('success');
    }
}
