<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosSustitucion extends Model
{
    //
    protected $fillable = [
        'id_articulo',
        'id_sustitucion'
    ];
    public function articulo(){
        return $this->belongsTo(Producto::class,'id_articulo','id' );
    }

    public function sustituto(){
        return $this->belongsTo(Producto::class,'id_sustitucion','id' );
    }

}
