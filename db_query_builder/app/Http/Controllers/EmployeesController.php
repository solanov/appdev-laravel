<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class EmployeesController extends Controller
{
    public function index(){
        return DB::table('employees')->first();
    }
}
