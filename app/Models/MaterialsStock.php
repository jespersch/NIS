<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialsStock extends Model
{
    use HasFactory;
    protected $table = 'materialsstock';
    protected $fillable=[
      'material',
      'stock',
      'minstock'
    ];
}
