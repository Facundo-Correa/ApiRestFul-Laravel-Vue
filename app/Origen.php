<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
    protected $table = 'origen';
    protected $fillable = ['origen'];

    protected $hidden = [];

    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    //public function oferta(){
    //    return $this->belongsTo('App\Ofertas ');
    //}
}
