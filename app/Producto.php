<?php

namespace App;

use App\Traits\ImageMagicsTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Producto extends Model
{
    use FullTextSearch, ImageMagicsTrait;
    /**
     * The columns of the full text index
     */
    protected $searchable = [
         'productos.descripcion',
         'productos.nombre'
    ];

    protected $table = 'productos';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'proveedor_id',
        'parte_id',
        'marca_id',
        'modelo_id',
        'origen_id',
        'estado_id',
        'nombre',
        'um',
        'umq',
        'vigencia_desde',
        'fecha_activo',
        'precio_actual',
        'dolar',
        'destacado',
        'cantidad',
        'stock',
        'descripcion'
    ];

    protected $appends = [
        'is_new',
        'image',
        'image_thumb',
        'puntos_price',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class);
    }

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }
    public function wishlist()
    {
        return $this->belongsToMany(User::class, 'wishlist_productos', 'producto_id', 'user_id');
    }
    public function favoritos()
    {
        return $this->belongsToMany(User::class, 'favoritos_productos', 'producto_id', 'user_id');
    }
    public function getIsNewAttribute()
    {
        $vigencia = new Carbon($this->vigencia_desde);

        $hoy_es = Carbon::now();


        return $vigencia->diffInDays($hoy_es) < env('PRODUCT_NEW');
    }
    public function getImageAttribute()
    {
        $file = public_path(env('PRODUCT_IMAGE') . $this->id . ".jpg");
        $src = url(env('THUMBS_IMAGE') . "1_thumb.png");


        if (file_exists($file)) {

            // //Convierto imagenes a escala de grises si son de fondo rojo
            // $paletaimagen = self::colorPalette($file, 1, 1);
            // $gray = self::paletaRojos($paletaimagen, $this->id);

            $src = url(env('PRODUCT_IMAGE') . $this->id . ".jpg");
        }
        if(env('APP_ENV') == 'local')
            $src = url(env('PRODUCT_IMAGE') . $this->id . ".jpg");

        return $src;
    }

    public function getImageThumbAttribute()
    {
        $file = public_path(env('THUMBS_IMAGE') . $this->id . ".jpg");
        $src = url(env('THUMBS_IMAGE') . "1_thumb.png");


        if (file_exists($file)) {

            // //Convierto imagenes a escala de grises si son de fondo rojo
            // $paletaimagen = self::colorPalette($file, 1, 1);
            // $gray = self::paletaRojos($paletaimagen, $this->id);

            $src = url(env('THUMBS_IMAGE') . $this->id . ".jpg");
        }
        if(env('APP_ENV') == 'local')
            $src = url(env('THUMBS_IMAGE') . $this->id . ".jpg");

        return $src;
    }
    public function getPuntosPriceAttribute()
    {
        $precio = $this->precio_actual * $this->umq;
        $precioOriginal = $this->precio_actual * $this->umq;

        if ($this->puntos) {
            if ($precio >= 100 && $precio <= 600)
                $precio = ($precioOriginal * PuntosUsuario::FACTOR_PUNTO_PI_1) / 100;
            else if ($precio >= 601 && $precio <= 1200)
                $precio = ($precioOriginal * PuntosUsuario::FACTOR_PUNTO_PI_2) / 100;
            else if ($precio >= 1201)
                $precio = ($precioOriginal * PuntosUsuario::FACTOR_PUNTO_PI_3) / 100;

            $precio = $precioOriginal - $precio;
        }

        return $precio;
    }
    public function addToWishlist($cantidad='')
    {
        $wishlist = Auth::user()->wishlist;

        if (!$wishlist->contains('producto_id', $this->id)) {
            Auth::user()->wishlist()->create([
                'producto_id' => $this->id,
                'cantidad'=>$cantidad
            ]);
        }
    }
    public function addToFavoritos($cantidad='')
    {
        $favoritos = Auth::user()->favoritos;

        if (!$favoritos->contains('producto_id', $this->id)) {
            Auth::user()->favoritos()->create([
                'producto_id' => $this->id,
                'cantidad'=>$cantidad
            ]);
        }
    }
    public function removeFromWishlist()
    {
        $wishlist = Auth::user()->wishlist;

        if ($wishlist->contains('producto_id', $this->id)) {
            $wishlist->where('producto_id', $this->id)->first()->delete();
        }
    }
    public function removeFromFavoritos()
    {
        $favoritos = Auth::user()->favoritos;

        if ($favoritos->contains('producto_id', $this->id)) {
            $favoritos->where('producto_id', $this->id)->first()->delete();
        }
    }

    public function modifyBasket($qty, $usaPuntos)
    {
        $user = Auth::user();
        $basket = $user->basket;

        if (!$basket->contains('producto_id', $this->id)) {
            $user->basket()->create([
                'producto_id' => $this->id,
                'quantity' => $qty,
                'price' => $this->precio_actual,
                'puntos' => $usaPuntos ? $this->puntos : 0
            ]);
        } else {
            $prodInBasket = $basket->where('producto_id', $this->id)->first();
            $prodInBasket->quantity += $qty;
            $prodInBasket->price = $this->precio_actual;
            $prodInBasket->puntos = $usaPuntos ? $this->puntos : 0;

            if ($prodInBasket->quantity <= 0) {
                $prodInBasket->delete();
            } else {
                $prodInBasket->save();
            }
        }
    }
    public static function valorFlete($subtotalPedido)
    {
        $precioFlete = env("PRECIO_FLETE");
        $Flete = self::find(99900);
        if($Flete)
            $precioFlete = $Flete->precio_actual;

        $montoEnvioMinimo = 5000;
        $montoEnvioMinimo2 = 2500;
        $descuento = 0;
        $tipo = Pedidos::ENVIO_FLETE_CABA;

        if ($subtotalPedido >= $montoEnvioMinimo) {
            $precioFlete = 0;
            $descuento = 100;
            $tipo = Pedidos::ENVIO_FLETE_CABA_100;
        } elseif ($subtotalPedido < $montoEnvioMinimo && $subtotalPedido >= $montoEnvioMinimo2) {
            $precioFlete = $precioFlete / 2;
            $descuento = 50;
            $tipo = Pedidos::ENVIO_FLETE_CABA_50;
        }


        return [
            'precio' => $precioFlete,
            'descuento' => $descuento,
            'tipo' => $tipo,
        ];
    }
}
