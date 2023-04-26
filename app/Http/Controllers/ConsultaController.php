<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TextMail;
use Illuminate\Support\Facades\Mail;

class ConsultaController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ];

        $msg = [
            'nombre.required' => 'Debe ingresar su nombre',
            'email.required' => 'Debe ingresar su email',
            'email.email' => 'El email no es valido',
            'mensaje.required' => 'Debe enviar algun mensaje',
        ];
        $this->validate($request, $rules, $msg);

        $title = 'Nueva consulta en MLRepuestos.com.ar';
        $content = 'Nueva consulta en MLRepuestos.com.ar<br>' . PHP_EOL;
        $content .= '<b>Nombre:</b> ' . $request->nombre . '<br>' . PHP_EOL;
        $content .= '<b>Email:</b> ' . $request->email . '<br>' . PHP_EOL;
        if (isset($request->empresa)) {
          $content .= '<b>Empresa:</b> ' . $request->empresa . '<br>' . PHP_EOL;
        };
        if (isset($request->telefono)) {
          $content .= '<b>Telefono:</b> ' . $request->telefono . '<br>' . PHP_EOL;
        };
        if (isset($request->celular)) {
          $content .= '<b>Celular:</b> ' . $request->celular . '<br>' . PHP_EOL;
        };
        $content .= '<b>Mensaje:</b> ' . $request->mensaje . PHP_EOL;

        Mail::to(env('VENTAS_RECIPIENT'))->send(new TextMail($title, $content));

        return $this->showMessage('Mensaje enviado, muchas gracias!');
    }
}
