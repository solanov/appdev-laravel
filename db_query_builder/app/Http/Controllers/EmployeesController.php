<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class EmployeesController extends Controller
{
    public function index(){
        //return DB::table('employees')->pluck('first_name', 'id');
        $employees = DB::table('employees')
                    ->select('id', 'first_name', 'last_name')->get();
        return $employees;
    }
}
