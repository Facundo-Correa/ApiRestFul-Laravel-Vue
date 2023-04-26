<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Library\NotaPedido;
use Carbon\Carbon;
use SoapClient;

class Pedidos extends Model
{
    // TIPOS DE ENVIO
    const SIN_ENVIO = 1;
    const ENVIO_COMISIONISTA = 2;
    const ENVIO_EXPRESO = 3;
    const ENVIO_FLETE_CABA = 4;
    const ENVIO_FLETE_CABA_50 = 5;
    const ENVIO_FLETE_CABA_100 = 6;


    protected $fillable = [
        'total',
        'cliente_id',
        'fecha_pedido',
        'estado',
        'fecha_cierre',
        'fecha_envio',
        'direccion_envio',
        'tipo_envio',
        'pedido'
    ];

    protected $hidden = [];

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedidos_productos', 'pedido_id', 'producto_id')
            ->withPivot(['precio', 'cantidad', 'descuento_porcentaje', 'promo_descripcion', 'puntos_descontados']);
    }
    public function getCantidadProductosAttribute()
    {
        return $this->productos->sum(function ($x) {
            return $x->pivot->cantidad;
        });
    }
    public function getMontoTotalAttribute()
    {
        return $this->productos->sum(function ($x) {
            return $x->pivot->cantidad * $x->pivot->precio * $x->umq * (1 - ($x->pivot->descuento_porcentaje / 100));
        });
    }
    public function getPuntosDescontadosAttribute()
    {
        return $this->productos->sum(function ($x) {
            return $x->pivot->cantidad * $x->pivot->puntos_descontados;
        });
    }
    public function getFormaDeEntregaAttribute()
    {
        $fEntrega = 'Retiro Personalmente';

        switch ($this->tipo_envio) {
            case self::ENVIO_COMISIONISTA: {
                    $fEntrega = 'Envío Comisionista';
                }
                break;
            case self::ENVIO_EXPRESO: {
                    $fEntrega = 'Envío Expreso';
                }
                break;
            case self::ENVIO_FLETE_CABA:
            case self::ENVIO_FLETE_CABA_50:
            case self::ENVIO_FLETE_CABA_100: {
                    $fEntrega = 'Envío por Flete';
                }
                break;
        }

        return $fEntrega;
    }

    public function getFormatoPrecio($precio){
      if (!env('APP_DEBUGGER')){
        return money_format('%i', $precio);
      } else {
        return number_format($precio, 2, ',' , '.');
      }
    }

    public function enviarNotaDePedido($conFlete = false, $precioFlete, $descFlete)
    {
        // Creo el array para enviar al WS
        $arrDatosWs = [];
        foreach ($this->productos as $prod) {
            $arrDatosWs[$prod->id] = [
                'cantidad' => $prod->pivot->cantidad,
                'precio' => $prod->pivot->precio,
                'descuento' => $prod->pivot->descuento_porcentaje > 99.99 ? 99.99 : $prod->pivot->descuento_porcentaje,
                'um' => $prod->um,
                'umq' => $prod->umq
            ];
        }

        // Agregar flete tambien.
        if ($conFlete) {
            $arrDatosWs[99900] = [
                'cantidad' => 1,
                'precio' => $precioFlete,
                'descuento' => $descFlete,
                'um' => 'UN',
                'umq' => 1
            ];
        }


        // Creo el objeto NotaPedido
        $NotaPedido = new NotaPedido(
            $this->id, // Nro Pedido
            $this->cliente->persona->n_plataforma, // Nro Plataforma
            Carbon::now()->format('Y-m-d\TH:i:s'), // Fecha hoy | Formato: '2020-06-19T13:56:02'
            // en caso de querer enviar fecha de entrega va asi:
            // (new Carbon($this->fecha_entrega))->format('Y-m-d\TH:i:s'), // Fecha Entrega
            Carbon::now()->format('Y-m-d\TH:i:s'), // Fecha Entrega ???? los datos enviados anteriormente son los de HOY | Formato: '2020-06-19T13:56:02'
            $arrDatosWs, // productos con formato para WS
            'Direccion envio: ' . $this->direccion_envio . ' | '
                . 'Tipo envio: ' . $this->tipo_envio . ' | '
                . 'Fecha envio: ' . (new Carbon($this->fecha_envio))->format('d/m/Y \a \l\a\s H:i'), // Leyenda (Observaciones)
            null // Lista
        );

        // Lo envio al Web Service
        $url = 'https://webservice.mlrepuestos.com.ar:2087/ServiciosIMAC.asmx?wsdl';

        if (!env('APP_DEBUG')){
          $conection_timeout = 60;
        } else {
          $conection_timeout = 15;
        }

        $options = array(
            'soap_version' => SOAP_1_1,
            'exceptions' => true,
            'trace' => 1,
            "connection_timeout" => $conection_timeout
        );

        //instancio objeto SOAP
        $clientenuevo = new SoapClient($url, $options);
        $res = $clientenuevo->CrearNotaPedido(["notaPedido" => $NotaPedido]);

        // Guardo Pedido en Log Plataforma
        LogPedidosAPlataforma::create([
            'pedido_id' => $this->id,
            'request' => json_encode(['notaPedido' => $NotaPedido]),
            'fecha' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $res;
    }
}
