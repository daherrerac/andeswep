<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelistaEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_panelista','id_evento','organizador'
    ];
}
