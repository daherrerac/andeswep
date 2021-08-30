<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    public $table = "actividads";
    protected $fillable = [
        'id_evento','titulo', 'descripcion', 'fecha_inicio','hora_inicio','fecha_fin','hora_fin'
    ];
}
