<?php

namespace App\Http\Controllers;

use App\AlertaProductoUsuario;
use App\Basket;
use App\Http\Controllers\Controller;
use App\Producto;
use App\V2PromoVista;
use App\Pedidos;
use App\PuntosUsuario;
use App\Mail\NuevoPedido;
use App\Mail\NuevoPedidoConErrores;
use App\Mail\TextMail;
use Carbon\Carbon;

use Exception;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Attempting;
class BasketController extends Controller
{


    private function getBasket()
    {

        $respuesta = [];
        // Obtengo Prods y Combos
        $productos = Auth::user()->basket()->productos()->get();
        $combos = Auth::user()->basket()->combos()->get();

        // Si hay productos los agrego a la respuesta junto con sus promos


        if (count($productos)) {
            foreach ($productos as $p) {

                $prod = $p->producto;
                $promos = [];
                $sinPromo = null;

                if(!$prod)
                {
                    continue;
                }


                // Entidad para la busqueda de promos
                $producto = [
                    'producto_id' => $prod->id,
                    'marca_id' => $prod->marca_id,
                    'modelo_id' => $prod->modelo_id,
                    'parte_id' => $prod->parte_id,
                    'origen_id' => $prod->origen_id,
                    'proveedor_id' => $prod->proveedor_id,
                    'cantidad' => $p->quantity,
                ];

                // Traigo todas las promos posibles con funcion recursiva
                $promos = V2PromoVista::findBestPromo($producto);

                // Sumo cantidades en promo.
                $q = 0;
                foreach ($promos as $promo) {
                    $q += $promo['cantidad'];
                }

                // Veo si quedaron productos fuera de promocion y los agrego a respuesta.
                $producto['cantidad'] -= $q;
                if ($producto['cantidad'] > 0)
                    $sinPromo = $producto;

                // Precios Sin Descuentos

                //dd($sinPromo);

                $precio_sin_desc = [
                    'cantidad' => $sinPromo['cantidad'],
                    'precio' => $prod->precio_actual
                ];

                // Precios con Descuentos
                $precio_con_desc = [];
                foreach ($promos as $promo) {
                    $precio_con_desc[] = [
                        'cantidad' => $promo['cantidad'],
                        'precio' => $prod->precio_actual * (1 - ($promo['descuento'] / 100)),
                        'precio_old' => $prod->precio_actual,
                        'descripcion' => $promo['descripcion'],
                    ];
                    $precio_sin_desc['cantidad'] += $p['cantidad_sp'];
                }

                $respuesta[] = [
                    'id' => $prod->id,
                    'nombre' => $prod->nombre,
                    'descripcion' => $prod->descripcion,
                    'precio' => $prod->precio_actual,
                    'umq' => $prod->umq,
                    'um' => $prod->um,
                    'cantidad' => $p->quantity,
                    'precio_sin_desc' => $precio_sin_desc['cantidad'] ? $precio_sin_desc : null,
                    'precio_con_desc' => $precio_con_desc,
                    'image_thumb' => $prod->image_thumb,
                    'is_oferta' => $prod->is_oferta,
                    'is_promo' => $prod->is_promo,
                    'puntos' => $prod->puntos,
                    'puntos_price' => $prod->puntos_price,
                    'usa_puntos' => $p->puntos > 0
                ];
            }
        }


        // Agregamos Combos
        if (count($combos)) {
            foreach ($combos as $combo) {

                $c = $combo->combo;


                if($c != null)
                {
                        $respuesta[] = [
                        'id' => $c->id,
                        'codigo' => $c->codigo,
                        'nombre' => $c->nombre,
                        'descripcion' => $c->descripcion,
                        'precio' => $c->precioTotal(),
                        'cantidad' => $combo->quantity,
                        'productos' => $c->productosInCombo()->sortBy('descuento')->values(),
                    ];
                }

            }
        }

        return collect($respuesta);
    }
    public function index()
    {
        return $this->showAll($this->getBasket());
    }

    protected function limiter(): RateLimiter {
        return app( RateLimiter::class );
    }

    public function update(Request $request)
    {


        $rules = [
            'ids' => 'required|array',
            'ids.*.quantity' => 'required|numeric',
            'ids.*.id' => 'required',
            'ids.*.is_combo' => 'required|boolean',
            'ids.*.usa_puntos' => 'required|boolean'
        ];

        $v = Validator::make($request->toArray(), $rules);

        if ($v->fails())
            return $this->errorResponse($v->errors(), 412);


        foreach ($request->ids as $id) {

            $message = 'Carrito modificado exitosamente!';
            $status =200;

            if ($id['is_combo']) {
                $combo = V2PromoVista::findOrFail($id['id']);
                $combo->modifyBasket($id['quantity']);
            }
            else if(isset($id['is_oferta']) && $id['is_oferta']) {

                $offer = V2PromoVista::getOfertasByProdID($id['id'])->get();



                $offer[0]->modifyBasket($id['quantity']);
            }
            else {
                $prod = Producto::findOrFail($id['id']);

                //Agregar condición semáforo
                if($prod->estado_id == 'R' || $prod->estado_id == 'P'  )
                {

                    if($id['quantity'] >= 1) {
                        $user = Auth::user();

                        $alerta = AlertaProductoUsuario::create([
                            'product_id' => $prod->id,
                            'user_id' => $user->id
                        ]);

                        $alerta->save();

                        $message="<h4>Se creo una Alerta sobre el faltante del producto y sera informado por mail cuando ingrese a nuestro stock </h4>";
                        $status= 205;


                    }


                }

                $prod->modifyBasket($id['quantity'], $id['usa_puntos']);


            }
        }
        $data = [
            'data'=>$message,
            'status'=>$status
        ];
        return $this->showMessage($data);
    }

    public function destroy()
    {
        Auth::user()->basket()->delete();
        return $this->showMessage('Carrito ha sido vaciado exitosamente!');
    }

    /**
     * Separamos todos los productos con promos y combos
     * en renglones, para hacer un invoice con cada producto + su precio final
     * una vez aplicadas las promos y los descuentos correspondientes
     */
    public function getSummary($resJson = true)
    {
        $basket = $this->getBasket();
        $rows = [];

        // Obtengo los productos con promos
        $prods = $basket->filter(function ($x) {
            return !array_key_exists('codigo', $x);
        });

        // Obtengo los combos
        $combos = $basket->filter(function ($x) {
            return array_key_exists('codigo', $x);
        });

        // Agrego a los ROWS los productos con su precio final
        // separados por renglon segun descuentos
        foreach ($prods as $prod) {


            // Si usa puntos se hace el calculo correspondiente
            if ($prod['usa_puntos']) {

                $rows[] = [
                    'id' => $prod['id'],
                    'nombre' => $prod['nombre'],
                    'descripcion' => $prod['descripcion'],
                    'precio_old' => $prod['precio'],
                    'precio' => $prod['puntos_price'],
                    'ahorro' => $prod['precio'] - $prod['puntos_price'],
                    'cantidad' => $prod['cantidad'],
                    'puntos' => $prod['puntos'],
                    'umq' => $prod['umq'],
                    'um' => $prod['um'],
                    'promo_desc' => 'Canjea ' . $prod['puntos'] . ' puntos'
                ];
                continue;
            }


            // Si no usa puntos, calculamos promos
            // Primero los precios sin Descuento
            if ($prod['precio_sin_desc'] && count($prod['precio_sin_desc'])) {
                $rows[] = [
                    'id' => $prod['id'],
                    'nombre' => $prod['nombre'],
                    'descripcion' => $prod['descripcion'],
                    'precio_old' => $prod['precio'],
                    'precio' => $prod['precio_sin_desc']['precio'],
                    'ahorro' => 0,
                    'cantidad' => $prod['precio_sin_desc']['cantidad'],
                    'puntos' => 0,
                    'umq' => $prod['umq'],
                    'um' => $prod['um'],
                    'promo_desc' => null
                ];
            }
            // Despues los precios con Descuento
            if (count($prod['precio_con_desc'])) {
                foreach ($prod['precio_con_desc'] as $promo) {
                    $rows[] = [
                        'id' => $prod['id'],
                        'nombre' => $prod['nombre'],
                        'descripcion' => $prod['descripcion'],
                        'precio_old' => $promo['precio_old'],
                        'precio' => $promo['precio'],
                        'ahorro' => $promo['precio_old'] - $promo['precio'],
                        'cantidad' => $promo['cantidad'],
                        'puntos' => 0,
                        'umq' => $prod['umq'],
                        'um' => $prod['um'],
                        'promo_desc' => $promo['descripcion']
                    ];
                }
            }
        }

        // Agrego a los ROWS los PRODUCTOS EN COMBO con su precio final
        // separados por renglon segun descuentos
        foreach ($combos as $combo) {

            foreach ($combo['productos'] as $prod) {

                $precio = $prod['precio_actual'] - ($prod['precio_actual'] * $prod['descuento'] / 100);
                $cantidad = $prod['cantidad'] * $combo['cantidad'];


                $rows[] = [
                    'id' => $prod['id'],
                    'nombre' => $prod['nombre'],
                    'descripcion' => $prod['descripcion'],
                    'precio_old' => $prod['precio_actual'],
                    'precio' => $precio,
                    'ahorro' => $prod['precio_actual'] * $prod['descuento'] / 100,
                    'cantidad' => $cantidad,
                    'puntos' => 0,
                    'umq' => $prod['umq'],
                    'um' => $prod['um'],
                    'promo_desc' => $combo['descripcion']
                ];
            }
        }

        $subtotal = collect($rows)->sum(function ($x) {
            return $x['precio'] * $x['cantidad'] * $x['umq'];
        });
        $subtotalAhorro = collect($rows)->sum(function ($x) {
            return $x['ahorro'] * $x['cantidad'] * $x['umq'];
        });
        $totalPuntos = collect($rows)->sum(function ($x) {
            return $x['puntos'] * $x['cantidad'] * $x['umq'];
        });

        $ultPedido = Pedidos::orderBy('id', 'desc')->first();
        $nPedido = $ultPedido ? $ultPedido->id + 1 : 1;
        // Obtengo el valor del flete segun el monto comprado para GBA
        $flete = Producto::valorFlete($subtotal);

        $res = [
            'rows' => $rows,
            'total_puntos' => $totalPuntos,
            'subtotal' => $subtotal,
            'subtotal_ahorro' => $subtotalAhorro,
            'iva' => $subtotal * 0.21,
            'total' => $subtotal * 1.21,
            'n_pedido' => $nPedido,
            'fecha' => Carbon::now()->format('d/m/Y'),
            'fleteGBA' => $flete,
        ];

        if (!$resJson)
            return $res;

        return $this->showMessage($res);
    }

    public function checkout(Request $request)
    {
        $summary = $this->getSummary(false);

        DB::beginTransaction();

        try {

            // Guardo el pedido
            $pedido = Pedidos::create([
                'total' => $summary['total'],
                'cliente_id' => Auth::id(),
                'fecha_pedido' => Carbon::now(),
                'fecha_envio' => $request->fecha_entrega,
                'direccion_envio' => $request->dir_entrega,
                'tipo_envio' => $request->tipo_entrega,
                'estado' => 2,
            ]);

            // Guardo los productos para el pedido
            // con sus correspondientes precios y cantidades
            foreach ($summary['rows'] as $row) {
                $pedido->productos()->attach($row['id'], [
                    'precio' => $row['precio_old'],
                    'cantidad' => $row['cantidad'],
                    'descuento_porcentaje' => $row['ahorro'] * 100 / $row['precio_old'],
                    'promo_descripcion' => $row['promo_desc'],
                    'puntos_descontados' => $row['puntos'],
                ]);
            }

            // Si canjeo puntos, no gano puntos.
            if ($summary['total_puntos'] > 0) {
                // Saco los puntos que se canjearon por la compra
                PuntosUsuario::create([
                    'user_id' => Auth::id(),
                    'puntos' => -$summary['total_puntos'],
                    'fecha_hasta' => Carbon::now()->addMonths(4),
                ]);
            } else {
                // Agrego la cantidad de puntos ganados por esta compra
                PuntosUsuario::create([
                    'user_id' => Auth::id(),
                    'puntos' => $summary['total'] * PuntosUsuario::FACTOR_PUNTO_PI / 100,
                    'fecha_hasta' => Carbon::now()->addMonths(4),
                ]);
            }


            // Subo el pedido a PLATAFORMA el sistema de gestion
            // Si la app no esta en modo DEBUG

                // $pedidoConError = $pedido->MensajePedidoConError();
                $erro170 = false;
                if (!isset($pedidoConError)){
                  // Subo el pedido a PLATAFORMA el sistema de gestion
                  // Si la app no esta en modo DEBUG
                  if (!env('APP_DEBUGGER')) {
                      $conFlete = $request->tipo_entrega > 2;
                      $precioFlete = $summary['fleteGBA']['precio'];
                      $descFlete = $summary['fleteGBA']['descuento'];

                    /*
                      $wsResponse = (object)array(
                          'Code' => 'OK',
                      );
                    */

                      //utilizamos el APP_DEBUGGER para generar un array falso en DESARROLLO
                      if (!env('APP_DEBUGGER')){
                        $wsResponse = $pedido->enviarNotaDePedido($conFlete, $precioFlete, $descFlete)
                            ->CrearNotaPedidoResult
                            ->Detalle
                            ->ItemResultadoNotaPedido;

                        // $erro170 = false;
                      } else {
                        $wsResponse = (object)array(
                          'Code' => 'E0150',
                          'Mensaje'=> 'MENSAJE DE ERROR: E0150'
                        );

                        $res_ws = (object)array(
                          'Code' => 'E0150'
                        );

                        // $erro170 = false;
                      }

                  }

                  // Si $wsResponse es array contiene mas de un error.
                  if (is_array($wsResponse)) {

                      $msg = '';
                      // bucleo errores
                      foreach ($wsResponse as $err) {
                          $msg .= "Error: {$err->Code} - {$err->Mensaje} " . PHP_EOL;
                          $erro170 = $err->Code == 'E0170';
                      }

                      // si sale E0170 seteamos el mensaje distinto para enviar por mail y hacemos update en base de datos
                      if ($erro170){

                        $msg = "No se pudo enviar el pedido debido a que usted se encuentra atrasado en el pago de facturas de su CTA CTE.";
                      }

                      // generamos mensaje para mostrar al cliente al finalizar el pedido
                      $pedidoConError = "Estimado cliente: el pedido cursado #" . substr('00000000'.$pedido->id,-8) . "no se pudo enviar debido a que  usted se encuentra atrasado en el pago de facturas de su CTA CTE.";

                      // agrego error al campo pedido
                      $pedido->pedido = $msg;
                      $pedido->save();


                  } elseif ($wsResponse->Code != 'OK') {

                      $msg = "Error: {$wsResponse->Code} - {$wsResponse->Mensaje} " . PHP_EOL;
                      $erro170 = $wsResponse->Code == 'E0170';

                      // si sale E0170 seteamos el mensaje distinto para enviar por mail y hacemos update en base de datos
                      if ($erro170){
                        //  dd($pedido);
                        $msg = "No se pudo enviar el pedido debido a que usted se encuentra atrasado en el pago de facturas de su CTA CTE.";
                      }

                      // generamos mensaje para mostrar al cliente al finalizar el pedido
                      $pedidoConError = "Estimado cliente: el pedido cursado #" . substr('00000000'.$pedido->id,-8) . "no se pudo enviar debido a que  usted se encuentra atrasado en el pago de facturas de su CTA CTE";

                      // agrego error al campo pedido
                      $pedido->pedido = $msg;
                      $pedido->save();

                  } else {
                      // se updatea campo pedido con 'OK' en caso de todo correcto
                      $pedido->pedido = 'OK';
                      $pedido->save();
                  }

                // Si salta error 170 significa que el cliente es moroso.
                // actualizamos su estado a 4 segun el antiguo codigo
                // verificar la exactitud de esto, ya que en DB el status 4 es PENDIENTE
                if ($erro170) {
                    $pedido->cliente->persona->status_id = 4;
                    $pedido->push(); // Guarda los datos modificados de persona en DB
                }
              }


            // Vacio Basket
            Auth::user()->basket()->delete();

            // Envio de emails correspondientes. Cliente, Admin & AdminTMT
            // Solo si la APP no esta en DEBUG MODE
            if (!env('APP_DEBUGGER')) {
                if (!isset($pedidoConError)){
                  Mail::to($pedido->cliente->email)->send(new NuevoPedido($pedido));
                  Mail::to(env('VENTAS_RECIPIENT'))->send(new NuevoPedido($pedido, true));
                  Mail::to(env('ADMIN_RECIPIENT'))->send(new NuevoPedido($pedido, true));
                } else {
                  // envia mail a estas 2 casillas avisando del pedido con errores
                  Mail::to(env('CRONES_RECIPIENT'))->send(new NuevoPedidoConErrores($pedido));
                  Mail::to(env('VENTAS_RECIPIENT'))->send(new NuevoPedidoConErrores($pedido, true));
                  Mail::to(env('ADMIN_RECIPIENT'))->send(new NuevoPedidoConErrores($pedido));
                }
            }

        } catch (\Exception $e) {
            DB::rollback();

            if (env('APP_DEBUG'))
                dd($e);

            return $this->errorResponse('Ha occurrido un error inesperado, intente luego nuevamente', 500);
        }

        DB::commit();

        if (!isset($pedidoConError)){
          return $this->showMessage('Su pedido ha sido enviado, muy pronto nos contactaremos con usted. Muchas gracias!');
        } elseif ($erro170) {
          return $this->errorResponse('Tiene facturas pendientes de pago en su CTA CTE. Por favor, contactarse con Administración. ¡Gracias!', 500);
        } else {
          return $this->errorResponse($pedidoConError, 500);
      }
    }

}
