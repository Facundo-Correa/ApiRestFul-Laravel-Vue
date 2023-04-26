<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimientos extends Model
{
    //
    protected $fillable = [
        'user_id',
        'seccion',
        'acccion',
        'atributo',
        'atributo_valor',
        'referido',
        'descripcion',
        'adicional'
    ];

}
