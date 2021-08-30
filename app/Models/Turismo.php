<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turismo extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagen','titulo', 'link','descripcion','path'
    ];
}
