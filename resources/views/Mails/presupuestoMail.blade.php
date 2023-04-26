@extends('Mails.presupuestoLayout')

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
            margin-top: 1%;
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
    </style>

@endsection

@section('body')
    <div>
        <h3 style="margin-bottom: 0">Presupuesto para {{$aQuien}}</h3>
    </div>
    <div class="text-left">
        <h4>{{$presentacion}}</h4>
        <h4>Le envío el presupuesto solicitado:</h4>
    </div>
    <table class="content">
        <tr>
            <th class='text-left'>Producto</th>
            <th class='text-left'>ID</th>
            <th>Cantidad</th>
            <th class='text-left'>Precio Unitario</th>
            <th>Unidades x paquete</th>
            <th>Total</th>
        </tr>
        @foreach($objeto as $producto)
            <tr>
                <td class='text-left'>{{$producto->nombre_producto}}</td>
                <td class="text-left">{{$producto->producto_id}}</td>
                <td>{{$producto->cantidad_producto}}</td>
                <td>{{$producto->precio_producto}}</td>
                <td>{{$producto->umq_producto}}</td>
                <td>{{$producto->total_producto}}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan='5' class='text-right pr-4'>SUBTOTAL</th>
            <td class='text-left'>${{$subtotal}}</td>
        </tr>
        <tr>
            <th colspan='5' class='text-right pr-4'>IVA</th>
            <td class='text-left'>${{$iva}}</td>
        </tr>
        <tr>
            <th colspan='5' class='text-right pr-4'>TOTAL</th>
            <td class='text-left'>${{$total}}</td>
        </tr>
    </table>
@endsection
