<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MisPresupuestos extends Model
{
    public function producto() {
        return $this->belongsTo(Producto::class);
    }
    public function presupuesto() {
        return $this->belongsTo(Presupuestos::class);
    }
}
