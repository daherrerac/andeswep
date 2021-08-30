<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panelista extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','profile_picture','path','fb','tw','ig','li','mail','telefono','resumen','hv'
    ];
}
