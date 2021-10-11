<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuesta extends Model
{
    protected $fillable = [
        'pregunta_id',
        'user_id',
        'respuesta',
    ];
    
}
