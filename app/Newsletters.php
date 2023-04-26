<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletters extends Model
{
    protected $fillable = [
        'fecha',
        'asunto',
        'mensaje',
        'perfil',
        'link',
        'created_at'
    ];
}
