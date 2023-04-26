
@extends('Mails.mailLayout')

@section('css')


@endsection

@section('body')
    <table class="content">
        <tr>
            <td>
                <h3 style="margin-bottom: 0">{{$title}}</h3>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <p>
                Se agregaron los siguientes articulos a su carrito<br> Aproveche a comprarlo antes que se vuelva a agotar<br>  Gracias !!
                </p>
                <ul>

                    @foreach($content as $producto)
                        <li> {{$producto['nombre']}} (id: {{$producto['id']}})</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 0">
            </td>
        </tr>
    </table>

@endsection
