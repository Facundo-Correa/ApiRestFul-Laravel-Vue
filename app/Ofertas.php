<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
   
    protected $fillable = ['codigo','imagen','titulo','descripcion','precio','descuento',
                            'vendidas','finaliza','ofertas','portada','pdf'];

    protected $hidden = [];

    protected $appends = [
        'imagesrc',
    ];

    public function ofertaProductos(){
        return $this->hasOne(OfertaProductos::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class,'oferta_productos','ofertas_id','id_producto');
    }

    public function publicidades(){
        return $this->hasMany(Publicidad::class);
    }

    public function getImagesrcAttribute() {

        //defino imagen de producto
        $file =env('PRODUCT_IMAGE').$this->id;
        $src =env('THUMBS_IMAGE')."1_thumb.png";

        //si existe imagen definida por usuario la seteo
        if($this->imagen != '')
            $file =env('BACKEND_IMAGE').$this->imagen;

        //evaluamos que exista fisicamente la imagen
        if (file_exists($file))
            $src = $file;


        return $src;
    }

}