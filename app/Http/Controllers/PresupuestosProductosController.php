<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use App\Producto;
use App\Presupuestos;
use App\PresupuestosProductos;
use Illuminate\Support\Facades\Auth;

class PresupuestosProductosController extends Controller
{
    

    public function store(Request $request){
        
        //selecciono la tabla presupuestos, la ordeno descendentemente y traigo 
        //el primer valor de id, que en realidad es el último. Y lo guardo en una variable
        $presupuestos = Presupuestos::select()->orderBy('id', 'desc')->first();

        //creamos un presupuesto producto nuevo
        $presupuestoProductos = PresupuestosProductos::create([
            'presupuesto_id'=>$presupuestos->id,
            'producto_id'=>$request->productoId,
            'precio_producto'=>$request->precio,
            'umq_producto'=>$request->umq,
            'cantidad_producto'=>$request->cantidad,
            'total_producto'=>$request->total,
        ]);

        //guardamos
        $presupuestoProductos->save();
    }

    public function delete(Request $request)
    {
            
        $producto = Producto::findOrFail($request->id);
        $producto->removeFromWishlist();

    }
}
