<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class V2PromoVista extends Model
{
    // Criterios
    const CRIT_DIA = 1;
    const CRIT_MES = 2;
    const CRIT_SEMANA = 3;
    const CRIT_CLIENTE = 4;
    const CRIT_TIPOCLIENTE = 5;
    const CRIT_CANTIDADES = 6;
    const CRIT_ULTIMACOMPRA = 7;

    // Entidades
    const ENT_PRODUCTO = 1;
    const ENT_MARCA = 2;
    const ENT_MODELO = 3;
    const ENT_PARTE = 4;
    const ENT_ORIGEN = 5;
    const ENT_PROVEEDOR = 6;
    const ENT_TODOS = 7;

    //Tipos de Promo
    const TP_2X1 = 1;
    const TP_3X2 = 2;
    const TP_DESCUENTO = 5;
    const TP_REGALO = 4;
    const TP_COMBO = 3;
    const TP_TODOS = 7;

    protected $table = 'v2_PromoVista';

    public function publicidades()
    {
        return $this->hasMany(Publicidad::class);
    }

    // Scopes

    /**
     * Scope para obtener solamente los combos
     * Modo de uso V2PromoVista::combos
     * @param Builder $query
     * @return Builder
     */
    public static function scopeCombos($query)
    {
        return $query->where('id_tipo_promo', '=', self::TP_COMBO)
            ->whereRaw('SUBSTR(codigo, 1, 3) = "CMB"');
    }

    /**
     * Scope para obtener solamente las promos
     * Modo de uso V2PromoVista::promos
     * @param Builder $query
     * @return Builder
     */
    public static function scopePromos($query)
    {
        return $query->whereIn('id_tipo_promo',[self::TP_2X1,self::TP_3X2,self::TP_REGALO,self::TP_DESCUENTO])->whereRaw('SUBSTR(codigo, 1, 3) != "OFE"');
    }

    /**
     * Scope para obtener solamente las ofertas
     * Modo de uso V2PromoVista::ofertas
     * @param Builder $query
     * @return Builder
     */
    public static function scopeOfertas($query)
    {
        return $query->where('id_tipo_promo', '=', self::TP_DESCUENTO)
            ->whereRaw("SUBSTR(codigo,1,3) ='OFE'");
    }

    /**
     * Scope para obtener solamente aquellas que cumplan con los
     * requisitos para estar activas
     */
    public function scopeActives($query)
    {
        $today = Carbon::today();
        return $query->where('desde', '<=', $today->format('Y-m-d'))
            ->where('hasta', '>=', $today->format('Y-m-d'));
    }

    /**
     * Scope para obtener solamente aquellas que cumplan con los
     * criterios de fecha y usuario para estar activas
     */
    public function scopeCriterios($query)
    {
        $user = Auth::user();

        return $query->where(function ($q) use ($user) {
            $q->where('diasemana', '=', (int) Carbon::today()->dayOfWeek)
                ->orWhere('mes', '=', (int) Carbon::today()->month)
                ->orWhere('semana', '=', (int) Carbon::today()->weekOfMonth)
                ->when($user, function ($x) use ($user) {
                    $x->orWhere('usuario', $user->id)
                        ->orWhere('ultima_compra', '<=', $user->totalUltimaCompra())
                        ->orWhere('puntos', '<=', $user->total_puntos)
                        ->when($user->tipo_cliente, function ($z) use ($user) {
                            $z->orWhere('tipo_usuario', $user->tipo_cliente);
                        });
                });
        });
    }

    /**
     * Scope para obtener solamente aquellas que cumplan con las
     * entidades provistas por array
     */
    public function scopeEntidades($query, $entidades = [])
    {
        return $query->where(function ($q) use ($entidades) {
            // when es igual a un "if (entidades[1]) -> entro a la funcion"
            $q->when(
                array_key_exists('producto_id', $entidades),
                function ($x) use ($entidades) {
                    $x->orWhere('producto', $entidades['producto_id']);
                }
            )
                ->when(
                    array_key_exists('marca_id', $entidades),
                    function ($x) use ($entidades) {
                        $x->orWhere('marca', $entidades['marca_id']);
                    }
                )
                ->when(
                    array_key_exists('modelo_id', $entidades),
                    function ($x) use ($entidades) {
                        $x->orWhere('modelo', $entidades['modelo_id']);
                    }
                )
                ->when(
                    array_key_exists('parte_id', $entidades),
                    function ($x) use ($entidades) {
                        $x->orWhere('parte', $entidades['parte_id']);
                    }
                )
                ->when(
                    array_key_exists('origen_id', $entidades),
                    function ($x) use ($entidades) {
                        $x->orWhere('origen', $entidades['origen_id']);
                    }
                )
                ->when(
                    array_key_exists('proveedor_id', $entidades),
                    function ($x) use ($entidades) {
                        $x->orWhere('proveedor', $entidades['proveedor_id']);
                    }
                )
                ->orWhere('id_tipo_entidad', self::ENT_TODOS);
        })
            ->where('cant_producto', '<=', $entidades['cantidad']);
    }

    // Relaciones
    public function getProducto()
    {
        return $this->belongsTo(Producto::class, 'producto', 'id');
    }

    public function getMarca()
    {
        return $this->belongsTo(Marcas::class, 'marca', 'id');
    }

    public function getModelo()
    {
        return $this->belongsTo(Modelos::class, 'modelo', 'id');
    }

    public function getParte()
    {
        return $this->belongsTo(Partes::class, 'parte', 'id');
    }

    public function getOrigen()
    {
        return $this->belongsTo(Origen::class, 'origen', 'id');
    }

    public function getProveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor', 'id');
    }

    public function productosInCombo()
    {
        $combo = self::where('id', $this->id)->get();
        return Producto::whereIn('id', $combo->pluck('producto'))
            ->get()
            ->map(function ($x) use ($combo) {
                $padre = $combo->where('producto', $x->id)->first();
                return [
                    'id' => $x->id,
                    'nombre' => $x->nombre,
                    'descripcion' => $x->descripcion,
                    'precio_actual' => $x->precio_actual,
                    'umq' => $x->umq,
                    'um' => $x->um,
                    'image_thumb' => $x->image_thumb,
                    'cantidad' => $padre->cant_producto,
                    'descuento' => $padre->descuento,
                ];
            });
    }

    public function precioTotal()
    {
        $precio_total = 0;

        foreach ($this->productosInCombo() as $producto) {

            //se quita umq de la oferta segun pedido #809239
            $precio_total += ($producto['precio_actual'] - ($producto['precio_actual'] * $producto['descuento'] / 100));
        };

        return $precio_total;
    }

    public function precioTotalSinDesc()
    {
        $precio_total = 0;

        foreach ($this->productosInCombo() as $producto) {
            //se quita umq de la oferta segun pedido #809239
            $precio_total += $producto['precio_actual'];

        };

        return $precio_total;
    }


    // Static Getters
    /**
     * Input array $producto example
     *  - producto_id => 1
     *  - marca_id => 1
     *  - modelo_id => 1
     *  - parte_id => 1
     *  - origen_id => 1
     *  - proveedor_id => 1
     *  - cantidad => 1
     *
     * Output array
     *  - id_promo
     *  - descuento
     *  - porcentaje
     *  - multiplicador
     *  - regalo
     *  - q_regalo
     */
    public static function findBestPromo($entidades)
    {
        //Para ver LOG de querys
        // DB::enableQueryLog();
        $promo = self::promos()->actives()
            ->criterios()
            ->entidades($entidades)
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('desde', 'desc')
            ->orderBy('id_tipo_entidad', 'asc')
            ->first();

        // Para ver LOG de querys
        // dd(DB::getQueryLog());
        $res = [];

        if ($promo) {

            switch ($promo->id_tipo_promo) {
                case self::TP_2X1: {
                        $cantidad = (int) ($entidades['cantidad'] / 2);
                        $entidades['cantidad'] -= $cantidad * 2;

                        $res[] = [
                            'id_promo' => $promo->id,
                            'descripcion' => $promo->descripcion,
                            'descuento' => 100,
                            'porcentaje' => 1,
                            'multiplicador' => 2,
                            'regalo' => null,
                            'q_regalo' => 0,
                            'cantidad' => $cantidad,
                            'cantidad_sp' => $cantidad
                        ];
                    }
                    break;
                case self::TP_3X2: {

                        $cantidad = (int) ($entidades['cantidad'] / 3);
                        $entidades['cantidad'] -= $cantidad * 3;

                        $res[] = [
                            'id_promo' => $promo->id,
                            'descripcion' => $promo->descripcion,
                            'descuento' => 100,
                            'porcentaje' => 1,
                            'multiplicador' => 3,
                            'regalo' => null,
                            'q_regalo' => 0,
                            'cantidad' => $cantidad,
                            'cantidad_sp' => ($cantidad * 3) - $cantidad
                        ];
                    }
                    break;
                case self::TP_DESCUENTO: {

                        $cantidad = (int) ($entidades['cantidad']);
                        $entidades['cantidad'] -= $cantidad;

                        $res[] = [
                            'id_promo' => $promo->id,
                            'descripcion' => $promo->descripcion,
                            'descuento' => $promo->descuento_gral,
                            'porcentaje' => 1,
                            'multiplicador' => null,
                            'regalo' => null,
                            'q_regalo' => 0,
                            'cantidad' => $cantidad,
                            'cantidad_sp' => 0
                        ];
                    }
                    break;

                    // TODO VER retorno para regalo
                case self::TP_REGALO; {

                        $cantidad = (int) $entidades['cantidad'];
                        $resto = $cantidad * $promo->cant_producto;
                        $entidades['cantidad'] = 0;

                        $res[] = [
                            'id_promo' => $promo->id,
                            'descripcion' => $promo->descripcion,
                            'descuento' => 100,
                            'porcentaje' => 1,
                            'multiplicador' => null,
                            'regalo' => $promo->regalo,
                            'q_regalo' => $promo->cantidad_regalo,
                            'cantidad' => $cantidad,
                            'cantidad_sp' => 0
                        ];
                    }
                    break;

                case self::TP_TODOS; {

                        $cantidad = (int) ($entidades['cantidad']);
                        $resto = 0;
                        $entidades['cantidad'] = 0;

                        $res[] = [
                            'id_promo' => $promo->id,
                            'descripcion' => $promo->descripcion,
                            'descuento' => $promo->descuento_gral,
                            'porcentaje' => 1,
                            'multiplicador' => null,
                            'regalo' => null,
                            'q_regalo' => null,
                            'cantidad' => $cantidad,
                            'cantidad_sp' => 0
                        ];
                    }
                    break;
            }
        }

        if (count($res) > 0 && $entidades['cantidad'] > 0) {

            $promo = self::findBestPromo($entidades);

            if (count($promo[0]) == 8) {
                $res[] = $promo[0];
            }
        }


        return $res;
    }

    /**
     * Input array $producto
     *  - id_producto
     *  - marca
     *  - modelo
     *  - parte
     *  - origen
     *  - proveedor
     *  - cantidad
     *
     * Output array
     *  - id_promo
     *  - descuento
     *  - porcentaje
     *  - multiplicador
     *  - regalo
     *  - q_regalo
     */
    public static function getDescuentos($productos)
    {

        $descuentos = [];
        $promos = [];
        $sinPromo = [];

        foreach ($productos as $producto) {

            // Traigo todas las promos posibles con funcion recursiva
            $promos = self::findBestPromo($producto);

            // Sumo cantidades en promo.
            $q = 0;
            foreach ($promos as $promo) {
                $q += $promo['cantidad'] + $promo['cantidad_sp'];
            }

            // Veo si quedaron productos fuera de promocion y los agrego a respuesta.
            $producto[7] -= $q;
            if ($producto[7] > 0)
                $sinPromo = $producto;


            $descuentos[$producto[1]] = [
                'promos' => $promos,
                'sinPromo' => $sinPromo
            ];
        }


        return $descuentos;
    }
    public static function getAll()
    {
        return self::all()->groupBy('codigo');
    }

    public static function getCombos()
    {
        return self::combos()->actives()
            ->criterios()
            ->groupBy('codigo')
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('desde', 'desc')
            ->orderBy('id_tipo_entidad', 'asc');
    }

    public static function getOfertas()
    {


        return self::ofertas()->actives()
            ->criterios()
            ->groupBy('codigo')
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('desde', 'desc')
            ->orderBy('id_tipo_entidad', 'asc');
    }

    public static function getOfertasByProdID($id) {
        //return self::getOfertas()->where('producto', '=', $id)->get();
        return self::ofertas()->actives()->criterios()->where('producto', '=', $id);

    }

    public static function getOfertasAll()
    {
        return self::ofertas()
            ->groupBy('codigo')
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('id', 'desc')
            ->orderBy('id_tipo_entidad', 'asc');
    }

    public static function getPromosAll()
    {
        return self::promos()
            ->groupBy('codigo')
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('desde', 'desc')
            ->orderBy('id_tipo_entidad', 'asc');
    }

    public static function getPromos()
    {
        return self::promos()->actives()
            ->criterios()
            ->orderBy('id_tipo_promo', 'asc')
            ->orderBy('desde', 'desc')
            ->orderBy('id_tipo_entidad', 'asc');
    }
    public function modifyBasket($qty)
    {
        $user = Auth::user();
        $basket = $user->basket;

        if (!$basket->contains('combo_id', $this->id)) {
            $user->basket()->create([
                'combo_id' => $this->id,
                'quantity' => $qty,
                'price' => $this->precioTotal(),
                'puntos' => 0
            ]);
        } else {
            $comboInBasket = $basket->where('combo_id', $this->id)->first();
            $comboInBasket->price = $this->precioTotal();
            $comboInBasket->quantity += $qty;

            if ($comboInBasket->quantity <= 0) {
                $comboInBasket->delete();
            } else {
                $comboInBasket->save();
            }
        }
    }
}
