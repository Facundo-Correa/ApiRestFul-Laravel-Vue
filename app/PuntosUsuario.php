<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntosUsuario extends Model
{
    const FACTOR_PUNTO_PI = 3.141516;
    const FACTOR_PUNTO_PI_1 = 5.0264256;
    const FACTOR_PUNTO_PI_2 = 6.283032;
    const FACTOR_PUNTO_PI_3 = 6.9113352;

    protected $fillable = [
        'user_id',
        'puntos',
        'fecha_hasta',
    ];
}
