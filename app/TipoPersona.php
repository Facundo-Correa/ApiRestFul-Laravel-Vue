<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{

    protected $table = 'tipo_persona';

    protected $fillable = ['nombre'];

    protected $hidden = [];

    public function personas(){
        return $this->hasMany('App\Personas');
    }
}
