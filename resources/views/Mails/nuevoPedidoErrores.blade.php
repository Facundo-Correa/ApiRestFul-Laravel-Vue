@extends('Mails.mailLayout')

@section('css')
    <style>
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .content {
            max-width: 600px;
            margin: auto;
        }
        .author {
            font-size: 90%;
            text-align: right;
            padding-bottom: 40px;
        }
        .bg-white, .bg-white tr, .bg-white td   {
            background-color: #f3f3f3 !important;
        }
        .font-90 {
            font-size: 90%;
        }
        .errores {
            color: red;
        }
        .green {
            border-bottom: 1px solid #ccc;
            font-size: 11px;
            text-align: left;
            color: green;
        }
    </style>
@endsection

@section('body')
    <table class="content">
        <tr>
            <td>
                <h3 style="margin-bottom: 0">Recibimos un nuevo pedido con errores</h3>
            </td>
        </tr>

        <!-- Errores -->
        <tr>
            <td class='errores'>{{$pedido->pedido}}</td>
        </tr>

        <tr>
            <td class="text-left">
                <p>
                    <b>Pedido Nro:</b> #{{substr('00000000'.$pedido->id,-8)}}
                    <br>
                    <b>Fecha:</b> {{(new \Carbon\Carbon($pedido->fecha_pedido))->format('d/m/Y H:t')}}
                    <br>
                    <b>Cantidad:</b> {{$pedido->cantidad_productos}}
                    <br>
                    <b>Monto:</b> ${{$pedido->getFormatoPrecio($pedido->monto_total*1.21)}}
                    <br>
                    <br>
                    <b>Forma de Entrega:</b> {{$pedido->forma_de_entrega}}
                    <br>
                    <b>Fecha aprox. de Entrega:</b> {{(new \Carbon\Carbon($pedido->fecha_envio))->format('d/m/Y H:t')}}
                    <br>
                    @if($pedido->direccion_envio)
                    <b>Dirección de Entrega:</b> {{$pedido->direccion_envio}}
                    <br>
                    @endif

                    <br>
                    <b>Cliente:</b> <small>(ID: {{$pedido->cliente->persona->id}})</small> {{ucwords($pedido->cliente->persona->nombre)}} {{ucwords($pedido->cliente->persona->apellido)}}
                    <br>
                    <b>CUIT:</b> {{$pedido->cliente->persona->cuit}}
                    <br>
                    <b>Telefono/s:</b> {{$pedido->cliente->persona->phone}}
                    @if($pedido->cliente->persona->telefono)
                    / {{$pedido->cliente->persona->telefono}}
                    @endif
                    <br>
                    <b>Nro Plataforma:</b> {{$pedido->cliente->persona->n_plataforma}}
                    <br>
                </p>
            </td>
        </tr>
        <tr>
            <td class='bg-white font-90' style='padding: 15px;'>
                <table>
                    <tr>
                        <th class='text-left'>ID</th>
                        <th class='text-left'>Producto</th>
                        <th>Cantidad</th>
                        <th class='text-left'>Precio Un.</th>
                        <th class='text-left'>Desc.</th>
                        <th class='text-left'>Importe</th>
                    </tr>
                    @foreach($pedido->productos as $producto)
                    <tr>
                        <td class="text-left">{{$producto->id}}</td>
                        <td class='text-left'>{{$producto->nombre}} <br> <small>({{$producto->umq}} x envase)</small></td>
                        <td>{{$producto->pivot->cantidad}}</td>
                        @if($producto->pivot->precio)
                        <td class='text-left'>${{$pedido->getFormatoPrecio($producto->pivot->precio)}}</td>
                        @else
                        <td class='text-left'>-</td>
                        @endif
                        <td class='text-left'>{{$pedido->getFormatoPrecio($producto->pivot->descuento_porcentaje)}}%</td>
                        <td class='text-left'>${{$pedido->getFormatoPrecio(
                            $producto->pivot->precio * $producto->pivot->cantidad
                            * (1-($producto->pivot->descuento_porcentaje/100))
                            * $producto->umq
                        )}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="green">
                            {{$producto->pivot->promo_descripcion}}
                        </td>
                    </tr>
                    @endforeach
                    <tr style='border-top: 1px solid #ccc'>
                        <th colspan='5' class='text-right pr-4'>PUNTOS DESCONTADOS</th>
                        <td class='text-left'>{{$pedido->puntos_descontados}}</td>
                    </tr>
                    <tr>
                        <th colspan='5' class='text-right pr-4'>SUBTOTAL</th>
                        <td class='text-left'>${{$pedido->getFormatoPrecio($pedido->monto_total)}}</td>
                    </tr>
                    <tr>
                        <th colspan='5' class='text-right pr-4'>IVA</th>
                        <td class='text-left'>${{$pedido->getFormatoPrecio($pedido->monto_total*0.21)}}</td>
                    </tr>
                    <tr>
                        <th colspan='5' class='text-right pr-4'>TOTAL</th>
                        <td class='text-left'>${{$pedido->getFormatoPrecio($pedido->monto_total*1.21)}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 0">
            </td>
        </tr>
    </table>
@endsection
