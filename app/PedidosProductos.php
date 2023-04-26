<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidosProductos extends Model
{
    protected $fillable = [
        'producto_id',
        'pedido_id',
        'user_id',
        'precio',
        'cantidad',
        'descuento_porcentaje',
        'promo_descripcion',
        'puntos_descontados',
    ];

    protected $hidden = [];

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
    public function pedido(){
        return $this->belongsTo(Pedidos::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
