<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitness extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo', 'descripcion','imagen','path','tipo'
    ];
}
