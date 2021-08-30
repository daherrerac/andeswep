<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeginFitness extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'event_id','lat_inicial', 'long_inicial','lat_final', 'long_final'
    ];
}
