<?php

namespace App;
use App\Producto;
use Illuminate\Database\Eloquent\Model;

class PresupuestosProductos extends Model
{

    protected $table = 'presupuestos_productos';

    protected $fillable = [
        'presupuesto_id',
        'producto_id',
        'precio_producto',
        'umq_producto',
        'cantidad_producto',
        'total_producto'
    ];

    public function producto() {
        return $this->hasMany(Producto::class, 'id', 'producto_id');
    }

    public function prod() //no esta en uso
    {
        return $this->hasManyThrough(Producto::class,PresupuestosProductos::class,'presupuesto_id','id','id','producto_id');
    }
}
