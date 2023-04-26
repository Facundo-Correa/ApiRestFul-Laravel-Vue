<?php

namespace App\Http\Controllers;

use App\V2PromoProducto;
use App\V2PromoVista;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class V2PromoVistaController extends Controller
{
    /**
     * devolvemos una coleccion de promos
     */
    public function promos()
    {

        $promos = V2PromoVista::getPromos()
            ->inRandomOrder()
            ->groupBy('id')
            ->get()
            ->map(function ($x) {
                return [
                    "id" => $x->id,
                    "desde" => $x->desde,
                    "hasta" => $x->hasta,
                    "nombre" => $x->nombre,
                    "descripcion" => $x->descripcion,
                    "codigo" => $x->codigo,
                    "precio_total" => $x->precioTotal(),
                ];
            });

        return $this->showAll($promos);
    }

    public function combos()
    {
        $v2promo = V2PromoVista::getCombos()
            ->inRandomOrder()
            ->when(request()->has('limit'), function ($x) {
                $x->limit(request()->limit);
            })
            ->get();
        $res = [];

        if (count($v2promo) > 0) {
            foreach ($v2promo as $r) {

                $object = new Object_();
                $object->id = $r->id;
                $object->desde = $r->desde;
                $object->hasta = $r->hasta;
                $object->nombre = $r->nombre;
                $object->descripcion = $r->descripcion;
                $object->codigo = $r->codigo;
                $object->precio_total = $r->precioTotal();
                $object->productos = $r->productosInCombo();

                $res[] = $object;
            }
        }

        return $this->showMessage($res);
    }
}
