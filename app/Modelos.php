<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $fillable = ['marca_id','modelo'];
    
    protected $hidden = [];

    //public function marca(){
    //    return $this->belongsTo('App\Marcas ');
    //}
}
