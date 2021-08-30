<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo','imagen','path','link','descripcion','id_evento'
    ];
}
