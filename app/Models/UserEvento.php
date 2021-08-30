<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'id_evento',
    ];
}
