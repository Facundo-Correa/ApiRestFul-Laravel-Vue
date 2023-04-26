<?php

namespace App\Http\Controllers;

use App\Ofertas;
use App\V2Promos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\V2PromoVista;
use Illuminate\Support\Facades\DB;

class OfertasController extends Controller
{
    public function index()
    {
        $ofertas = V2PromoVista::getOfertas()
            ->inRandomOrder()
            ->when(request()->has('limit'), function ($x) {
                $x->limit(request()->limit);
            })
            ->get()
            ->map(function ($r) {

                return [
                    'id' => $r->id,
                    'desde' => $r->desde,
                    'hasta' => $r->hasta,
                    'nombre' => $r->nombre,
                    'descripcion' => $r->descripcion,
                    'codigo' => $r->codigo,
                    'precio_total' => $r->precioTotal(),
                    'precio_total_sin_desc' => $r->precioTotalSinDesc(),
                    'productos' => $r->productosInCombo(),
                ];
            });

        // $ofertas = Ofertas::where('finaliza', '>=', date('Y-m-d'))
        //     ->inRandomOrder()
        //     ->get()
        //     ->map(function ($r) {
        //         return [
        //             'id' => $r->id,
        //             'desde' => $r->finaliza,
        //             'hasta' => $r->finaliza,
        //             'nombre' => $r->titulo,
        //             'descripcion' => $r->descripcion,
        //             'codigo' => $r->codigo,
        //             'precio_total' => $r->precio,
        //             'precio_total_sin_desc' => ($r->precio * $r->descuento) / 100,
        //             'productos' => $r->productos(),
        //         ];
        //     });
        //
        //     dd($ofertas->ofertaProductos());
        return $this->showMessage($ofertas);
    }


    public function getOfertaByProdID(Request $req)
    {

        if (V2PromoVista::getOfertasByProdID($req->id) != null) {
            $ofertas = V2PromoVista::getOfertasByProdID($req->id)
                ->orderBy('id', 'DESC')
                ->get()
                ->map(function ($r) {
                    return [
                        'id' => $r->id,
                        'desde' => $r->desde,
                        'hasta' => $r->hasta,
                        'nombre' => $r->nombre,
                        'descripcion' => $r->descripcion,
                        'codigo' => $r->codigo,
                        'precio_total' => $r->precioTotal(),
                        'precio_total_sin_desc' => $r->precioTotalSinDesc(),
                        'productos' => $r->productosInCombo(),
                    ];
                })
                ->first();

            return $this->showMessage($ofertas);
        }
    }


    public function ofertas()
    {
        $arrOfertas = [];

        $ofertas = V2PromoVista::getOfertas()
            ->inRandomOrder()
            ->when(request()->has('limit'), function ($x) {
                $x->limit(request()->limit);
            })
            ->get()
            ->map(function ($r) {
                return [
                    'id' => $r->id,
                    'hasta' => $r->hasta,
                    'nombre' => $r->nombre,
                    'descripcion' => $r->descripcion,
                    'precio_total' => $r->precioTotal(),
                    'productos' => $r->productosInCombo()
                ];
            });

        foreach ($ofertas as $oferta) {

            $arrOfertas[] = [
                'id' => $oferta["id"],
                'hasta' => $oferta["hasta"],
                'nombre' => $oferta["nombre"],
                'descripcion' => $oferta["descripcion"],
                'precio' => $oferta["precio_total"],
                'imagen' => ($oferta["productos"] !=null)?$oferta["productos"][0]["image_thumb"]:env('PRODUCT_IMAGE')."1_thumb.png"

            ];
        }

        return $this->showResponse(["data" => $arrOfertas]);
    }

    public function portada(Request $request)
    {

        // Busco la promo a editar
        $portada = [];

        if($request =='undefined')
        {
            $r = V2PromoVista::getOfertas()->get()->last();
            $producto = ($r)?$r->getProducto()->get():null;

        } else {
            //codigo horrible pero no tengo ganas de pensar una mejor solución

            $r = V2Promos::find($request->id);

            $producto = ($r != null)?$r->getProductos():null;
        }
        if(!$producto){
            return $this->showMessage($portada);
        }
        $portada[] = [
            'id' => $r->id,
            'finaliza' => $r->hasta,
            'nombre' => $r->nombre,
            'descripcion' => $r->descripcion,
            'producto' => $producto[0]["nombre"],
            'cantidad' => $producto[0]["cantidad"],
            'precio' => $producto[0]["precio"],
            'descuento' => $r->descuento_gral,
            'imagen' => $producto[0]["image"],
            'imagen_thumb' => $producto[0]["image_thumb"]
        ];






        return $this->showMessage($portada);
    }
}
