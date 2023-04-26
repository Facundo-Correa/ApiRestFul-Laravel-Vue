<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partes extends Model
{
    protected $fillable = ['parte'];
    
    protected $hidden = [];

    //public function oferta(){
    //    return $this->belongsTo('App\Ofertas ');
    //}
}
