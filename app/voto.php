<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voto extends Model
{
    protected $fillable = [
        'pregunta_id',
        'user_id',
        'voto',
    ];
}
