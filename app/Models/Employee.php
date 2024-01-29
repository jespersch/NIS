<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstname',
        'infix',
        'surname',
        'gender',
        'department',
        'function',
        'username',
        'password',
        'employeenumber',
    ];
}
