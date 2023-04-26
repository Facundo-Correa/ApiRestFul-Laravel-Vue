<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaCodigo extends Model
{
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function ctecnicas(){
        return $this->hasMany(ConsultaTecnica::class);
    }
}
