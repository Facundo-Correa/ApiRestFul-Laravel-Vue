<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsTecnicaArticulos extends Model
{
    //
    protected $table = 'cons_tecnica_articulos';
    protected $fillable = ['id_consulta_tecnica','id_articulo'];

    public function productos(){
        return $this->hasMany(Producto::class,'id_articulo','id');
    }
}
