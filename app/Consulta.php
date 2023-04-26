<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'codigo',
        'valor',
        'tipo_consulta_id'
    ];
}
