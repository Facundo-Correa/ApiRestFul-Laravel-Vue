<?php

namespace App;
use App\PresupuestosProductos;
use Illuminate\Database\Eloquent\Model;

class Presupuestos extends Model
{
    protected $table = 'presupuestos';

    protected $fillable = [
        'usuario_id',
        'nombre_destinatario',
        'email_destinatario',
        'telefono_destinatario',
        'margen_destinatario',
        'estado',
        'fecha'
    ];

    public function presupuestoProducto()
    {
        return $this->hasMany(PresupuestosProductos::class, 'presupuesto_id', 'id')->with('producto');
    }

    public function productoDelPresupuesto()
    {
        return $this->hasMany(PresupuestosProductos::class, 'presupuesto_id','id');
    }
}
