<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class EmployeesController extends Controller
{
    public function index(){
        //A. SETUP
        // return '<h1>Hello</h1>';

        //B. RETRIEVING DATA FROM TABLE
        // return DB::table('employees')->get();

        //C. RETRIEVING LIST COLUMN VALUES
        //return DB::table('employees')->pluck('first_name', 'id');
        //$employees = DB::table('employees')
                    //->select('id', 'first_name', 'last_name')->get();
        // return $employees;

        //E. WHERE CONDITION
        //$employees = DB::table('employees')->orderBy('last_name')->orderBy('first_name')->get();
        /* $employees = DB::table('employees')
        ->select('id', 'first_name', 'last_name', 'email','phone','position')
        ->orderBy('last_name', 'asc')
        ->orderBy('first_name', 'asc')
        ->get();
        return $employees; */

        //F. INSERTING
        /* DB::table('employees')->insert([
            'first_name' => 'Luffy',
            'last_name' => 'Monkey',
            'email' => 'monkeydluffy@gmail.com',
            'phone' => '09281234568',
            'position' => 'IT Support',
            'department'=> 'IT',
            'salary' => '65000.00',
            'hire_date' => '2024-06-01',
            'status' => 'active',
        ]);

        dd('success'); */

        //G. UPDATING
        /* DB::table('employees')->where('id', '=', '1')->update([
            'first_name' => 'Zoro',
            'last_name' => 'Roronoa',
            'email' => 'roronoazoro@gmail.com',
            'phone' => '09281234568',
            'position' => 'IT Support',
            'department'=> 'IT',
            'salary' => '65000.00',
            'hire_date' => '2024-06-01',
            'status' => 'active',
        ]);
        dd('success'); */

        //H. DELETE
        /* DB::table('employees')->where('id', '=', '1')->delete();
        dd('success'); */

        //I. JOIN
        /* $employee = DB::table('employees')->join('departments','employees.department', '=', 'departments.id')->select('employees.last_name','employees.first_name','departments.department')->get();
        return $employee; */

        //J. AGGREGATE Methods
        //count()
        //max()
        //min()
        //avg()
        //sum()
        //return DB::table('employees')->avg('salary');
    }
}
