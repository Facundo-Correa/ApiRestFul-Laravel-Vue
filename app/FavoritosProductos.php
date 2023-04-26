<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritosProductos extends Model
{
    protected $fillable = ['user_id','producto_id','combo_id','cantidad'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function combo()
    {
        return $this->belongsTo(V2PromoVista::class);
    }
}
