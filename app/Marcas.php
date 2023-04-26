<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $fillable = ['marca'];
    
    protected $hidden = [];

    //public function oferta(){
    //    return $this->belongsTo('App\Ofertas ');
    //}
}
