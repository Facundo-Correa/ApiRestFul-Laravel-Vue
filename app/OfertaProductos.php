<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaProductos extends Model
{
    protected $table = 'oferta_productos';
    protected $fillable = ['oferta_id','producto_id','fecha_oferta','cantidad'];
    
    protected $hidden = [];

    public function oferta(){
        return $this->belongsTo('App\Ofertas');
    }
}
