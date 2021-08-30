<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdicionalEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_evento', 'info_interes', 'opiniones','materiales','videos','faq'
    ];
}
