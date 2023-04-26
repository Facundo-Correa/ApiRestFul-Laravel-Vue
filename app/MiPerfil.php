<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiPerfil extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'pais',
        'provincia',
        'localidad',
        'direccion',
        'empresa',
        'nacimiento',
        'telefono',
        'cuit'
    ];
}
