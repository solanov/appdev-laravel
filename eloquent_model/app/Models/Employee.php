<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // protected $table = 'departments';
    //fillable
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'hire_date',
        'status',
        'salary',
        'department'
    ];

    //guarded

    /* protected $guarded = [
        'first_name'
    ]; */

    // protected $guarded = []; // All are mass assignable
}
