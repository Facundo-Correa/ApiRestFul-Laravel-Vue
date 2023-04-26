<?php

namespace App\Http\Controllers;

use App\ArticulosSustitucion;
use App\Producto;
use App\V2PromoProducto;
use App\V2PromoTipoUsuario;
use App\V2PromoUsuario;
use App\V2PromoVista;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        $subquery = V2PromoVista::actives()
            ->criterios()
            ->where('id_tipo_promo', '!=', V2PromoVista::TP_COMBO)
            ->orWhere(function ($q) {
                $q->where('id_tipo_promo', '=', V2PromoVista::TP_COMBO)
                    ->whereRaw('SUBSTR(codigo, 1, 3) = "OFE"');
            })
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('desde', 'desc')
            ->orderBy('id_tipo_entidad', 'asc');

        $productos = Producto::when(request()->has('id'), function ($q) {
            return $q->where('productos.id', request()->id);
        })
            ->when(request()->has('search'), function ($q) {
                return $q->search(request()->search);
            })
            ->when(request()->has('searchCods'), function ($q) {
                $cods = collect(explode(' ', str_replace(',', ' ', request()->searchCods)))
                    ->filter(function ($x) {
                        return $x != null;
                    });

                return $q->whereIn('productos.id', $cods);
            })
            ->when(request()->has('sortBy'), function ($q) {
                return $q->orderBy(
                    'productos.' . request()->sortBy
                );
            })
            ->when(request()->has('sortByDesc'), function ($q) {
                return $q->orderBy(
                    'productos.' . request()->sortByDesc,
                    'desc'
                );
            })
            ->when(request()->has('is_new'), function ($q) {
                $today = Carbon::today();
                return $q->where('productos.vigencia_desde', '>=', $today->subDays(env('PRODUCT_NEW')));
            })
            ->when(request()->has('parte_id'), function ($q) {
                return $q->where('productos.parte_id', request()->parte_id);
            })
            ->when(request()->has('marca_id'), function ($q) {
                return $q->where('productos.marca_id', request()->marca_id);
            })
            ->when(request()->has('modelo_id'), function ($q) {
                return $q->where('productos.modelo_id', request()->modelo_id);
            })
            ->when(request()->has('price_to'), function ($q) {
                if (request()->price_to != '') {
                    return $q->where('productos.precio_actual', "<=", request()->price_to);
                }
            })
            ->when(request()->has('price_from'), function ($q) {
                if (request()->price_from != '') {
                    return $q->where('productos.precio_actual', ">=", request()->price_from);
                }
            })
            ->when(request()->has('partes'), function ($q) {
                if (request()->partes != 'undefined') {
                    return $q->where('productos.parte_id', request()->partes);
                }
            })
            ->when(request()->has('marcas'), function ($q) {
                if (request()->marcas != 'undefined') {
                    return $q->where('productos.marca_id', request()->marcas);
                }
            })
            ->when(request()->has('modelos'), function ($q) {
                if (request()->modelo != 'undefined') {
                    return $q->where('productos.modelo_id', request()->modelos);
                }
            })
            ->when(request()->has('origen'), function ($q) {
                if (request()->origen != 'undefined') {
                    return $q->where('productos.origen_id', request()->origen);
                }
            })
            ->selectRaw('productos.*, 
                v2_PromoVista.id_tipo_promo as promo_tipo, 
                v2_PromoVista.codigo as promo_codigo')
            ->leftJoinSub($subquery, 'v2_PromoVista', function ($join) {
                $join->on('v2_PromoVista.producto', '=', 'productos.id')
                    ->orOn('v2_PromoVista.parte', '=', 'productos.parte_id')
                    ->orOn('v2_PromoVista.marca', '=', 'productos.marca_id')
                    ->orOn('v2_PromoVista.origen', '=', 'productos.origen_id')
                    ->orOn('v2_PromoVista.modelo', '=', 'productos.modelo_id');
            })
            ->get()
            ->load('origen');

        $result = [];

        foreach ($productos->toArray() as $x) {

            // if v2promo producto has $x->id as id_producto, well, then is_promo it's true
            $isOferta = false;
            $precio_actual = $x['precio_actual'];
            if ($offer = V2PromoVista::getOfertasByProdID( $x['id'])->first()) {
                $isOferta = true;
                $precio_actual = $precio_actual - ($precio_actual * $offer->descuento) / 100;
            }
            $result[] = [
                "id" => $x['id'],
                "proveedor_id" => $x['proveedor_id'],
                "parte_id" => $x['parte_id'],
                "marca_id" => $x['marca_id'],
                "modelo_id" => $x['modelo_id'],
                "origen_id" => $x['origen_id'],
                "estado_id" => $x['estado_id'],
                "nombre" => $x['nombre'],
                "um" => $x['um'],
                "umq" => $x['umq'],
                "vigencia_desde" => $x['vigencia_desde'],
                "fecha_activo" => $x['fecha_activo'],
                "precio_actual" => $precio_actual,
                "dolar" => $x['dolar'],
                "destacado" => $x['destacado'],
                "cantidad" => $x['cantidad'],
                "stock" => $x['stock'],
                "descripcion" => $x['descripcion'],
                "porcentaje" => $x['porcentaje'],
                "descuento" => $x['descuento'],
                "puntos" => $x['puntos'],
                "factor" => $x['factor'],
                "origen" => $x['origen'],
                "image_thumb" => $x['image_thumb'],
                "image" => $x['image'],
                "vigencia_puntos" => $x['vigencia_puntos'],
                //"is_promo" => $x['promo_tipo'] != null && $x['promo_tipo'] != 3,
                "is_promo" => $isOferta,
                "is_new" => $x['is_new'],
            ];
        }
        return $this->showAll(collect($result), false, false, false);
    }

    public function all()
    {
        return $this->showAll(Producto::all());
    }

    public function busqueda(Request $request)
    {
        // Que lindo, se me comio mi busqueda por codigo
        //pasamos el query del input a la busqueda



        if (Producto::where('id', $request->search)->get()) {
            $listado = Producto::where('id', '=', $request->search)->get()->map(function ($x) {
                return [
                    'id' => $x->id,
                    'descripcion' => $x->id . ' | ' . $x->descripcion
                ];
            });
        } else {
            $listado = Producto::search($request->search)
                ->get()
                ->map(function ($x) {
                    return [
                        'id' => $x->id,
                        'descripcion' => $x->id . ' | ' . $x->descripcion,
                    ];
                });
        }


        if ($request->id) {
            $listado = Producto::where('productos.id', request()->id)
                ->get()
                ->map(function ($x) {
                    return [
                        'id' => $x->id,
                        'descripcion' => $x->id . ' | ' . $x->descripcion,
                    ];
                });
        }

        return $this->showMessage($listado);
    }

    public function getDolar()
    {
        $dolar = Producto::orderBy('dolar', 'DESC')->first();

        return $this->showMessage($dolar->dolar);
    }

    public function related()
    {


        $result = [];
        //busco sustitutos de un articulo
        $subquery = ArticulosSustitucion::select('id_sustitucion')->where('id_articulo', '=', request()->id)->groupBy('id_articulo')->with(['sustituto', 'sustituto.origen'])->whereHas('sustituto', function ($q) {
            $q->where('estado_id', '!=', 'R');
        })->get();

        //obtengo articulos con los IDs de sustitutos y tengan stock
        $related = ArticulosSustitucion::whereIn('id_articulo', $subquery)->groupBy('id_sustitucion')->with(['sustituto', 'sustituto.origen'])
            ->whereHas('sustituto', function ($q) {
                $q->where('estado_id', '!=', 'R');
            })->get();
        $rs = $related->merge($subquery);

        foreach ($rs->toArray() as $sustituto) {

            $x = $sustituto['sustituto'];
            if ($x['estado_id'] == 'R')
                continue;

            $result[] = [
                "id" => $x['id'],
                "proveedor_id" => $x['proveedor_id'],
                "parte_id" => $x['parte_id'],
                "marca_id" => $x['marca_id'],
                "modelo_id" => $x['modelo_id'],
                "origen_id" => $x['origen_id'],
                "estado_id" => $x['estado_id'],
                "origen" => $x['origen'],
                "nombre" => $x['nombre'],
                "um" => $x['um'],
                "umq" => $x['umq'],
                "vigencia_desde" => $x['vigencia_desde'],
                "fecha_activo" => $x['fecha_activo'],
                "precio_actual" => $x['precio_actual'],
                "dolar" => $x['dolar'],
                "destacado" => $x['destacado'],
                "cantidad" => $x['cantidad'],
                "stock" => $x['stock'],
                "descripcion" => $x['descripcion'],
                "porcentaje" => $x['porcentaje'],
                "descuento" => $x['descuento'],
                "puntos" => $x['puntos'],
                "factor" => $x['factor'],
                "image_thumb" => $x['image_thumb'],
                "image" => $x['image'],
                "vigencia_puntos" => $x['vigencia_puntos'],
                "is_new" => $x['is_new'],
            ];
        }

        return $this->showAll(collect($result), false, false, false);
    }
}
