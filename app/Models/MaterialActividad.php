<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialActividad extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo','imagen','path','link','descripcion','id_actividad'
    ];
}
