<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistProductosController extends Controller
{
    public function index()
    {
        $list = Auth::user()->wishlist->map(function($x) {

            if(!$x->combo_id) {
                return [
                    'id' => $x->producto_id,
                    'nombre' => $x->producto->nombre,
                    'precio' => $x->producto->precio_actual,
                    'image_thumb' => $x->producto->image_thumb,
                    'is_combo' => false,
                    'cantidad' => $x->producto->cantidad+1,
                    'umq'=>$x->producto->umq,
                    'um'=>$x->producto->um
                ];
            } else {
                return [
                    'id' => $x->combo_id,
                    'nombre' => $x->combo->nombre,
                    'precio' => $x->combo->precioTotal(),
                    'image_thumb' => null,
                    'is_combo' => true
                ];
            }
        });
        return $this->showAll($list);
    }

    public function store(Request $request)
    {
        if($request->is_combo) {
            Auth::user()->wishlist()->create([
                'combo_id' => $request->id
            ]);
        } else {
            $producto = Producto::findOrFail($request->id);
            $producto->addToWishlist($request->cantidad);
        }
        
        return $this->showMessage('Item agregado a Presupuestos!');
    }

    public function delete(Request $request)
    {
        if($request->is_combo) {
            $combo = Auth::user()->wishlist()->where('combo_id',$request->id)->first();
            if($combo)
                $combo->delete();
        } else {
            $producto = Producto::findOrFail($request->id);
            $producto->removeFromWishlist();
        }

        return $this->showMessage('Item eliminado de Presupuestos!');
    }
}
