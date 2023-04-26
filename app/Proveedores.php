<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proveedores extends Model
{
    protected $fillable = ['id','proveedor'];

    protected $hidden = [];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }

}
