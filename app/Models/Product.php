<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'producten';
    protected $primaryKey = 'Naam';
    public $incrementing = false;
    public $timestamps = false;
}
