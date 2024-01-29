<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    protected $fillable = [
        'material',
        'unit',
        'length',
        'cost',
        'supplier',
        'status',
        'stock',
    ];

    use HasFactory;
}
