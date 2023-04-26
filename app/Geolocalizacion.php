<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geolocalizacion extends Model
{
    protected  $table = 'geolocalizacion';
    protected $fillable = ['parent_id','nombre'];

    protected $hidden = [];

    public function parent(){
        return $this->belongsTo('App\Parents ');
    }

    public function hijos(){
        return self::where('parent_id',$this->id)->get();
    }
}
