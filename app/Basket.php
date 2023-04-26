<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
        'cliente_id',
        'producto_id',
        'combo_id',
        'price',
        'quantity',
    ];

    public function scopeProductos($q) {
        return $q->where('producto_id','!=',null);
    }
    public function scopeCombos($q) {
        return $q->where('combo_id','!=',null);
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
    public function combo() {
        return $this->belongsTo(V2PromoVista::class, 'combo_id', 'id');
    }
    public function cliente() {
        return $this->belongsTo(User::class, 'cliente_id','id');
    }

}
