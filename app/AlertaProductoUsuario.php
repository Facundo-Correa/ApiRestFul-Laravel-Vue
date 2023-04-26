<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AlertaProductoUsuario extends Model
{
    //
    protected $fillable = ['user_id','product_id','combo_id'];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class,'product_id','id');
    }
    public function combo(){
        return $this->belongsTo(V2PromoVista::class);
    }

}
