<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaTecnica extends Model
{
    protected $table = 'consulta_tecnicas';
    //protected $fillable = [ 'id','id_marca','id_modelo','id_articulo','id_tipo_parte','value'];
    protected $guarded =[];
    //
    public function marcas(){
        return $this->belongsTo(Marcas::class,'id_marca','id' );
    }

    public function modelos(){
        return $this->belongsTo(Modelos::class,'id_modelo','id');
    }

    public function tipo_partes(){
        return $this->belongsTo(ConsultaCodigo::class,'id_tipo_parte','id');
    }

    public function articulos(){
        return $this->hasManyThrough(Producto::class,ConsTecnicaArticulos::class,'id_consulta_tecnica','id','id','id_articulo');

        //return $this->belongsTo(ConsTecnicaArticulos::class,'id_consulta_tecnica','id');
    }

}
