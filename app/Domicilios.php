<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilios extends Model
{
    protected $fillable = [
        'direccion',
        'cp',
        'logo',
        'header',
        'latitud',
        'longitud',
        'geolocalizacion_id',
        'persona_id',
        'nombre',
        'descripcion'
    ];

    protected $hidden = [];

    public function geolocalizacion(){
        return $this->belongsTo('App\Geolocalizacion ');//,'personas','persona_id','id');
    }

    public function persona(){
        return $this->belongsTo('App\Personas ');//,'personas','persona_id','id');
    }
}
