<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoPublicidad extends Model
{
    protected $fillable = [
        'nombre',
        ''
    ];

    public function publicidades(){
        return $this->hasMany(Publicidad::class);
    }
}
