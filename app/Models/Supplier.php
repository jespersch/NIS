<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    use HasFactory;

    protected $fillable = [
        'company',
        'street',
        'housenumber',
        'addition',
        'postalcode',
        'country',
        'city',
        'contact',
        'gender',
        'phonenumber',
        'mail',
    ];

}
