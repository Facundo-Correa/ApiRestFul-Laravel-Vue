<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class V2PromoProducto extends Model
{
    //
    protected $table = 'v2_promo_producto';
    protected $primaryKey = 'id_promo';
    protected $guarded =[];

    public function product(){
        return $this->hasOne(Producto::class,'id','id_producto');
    }
}
