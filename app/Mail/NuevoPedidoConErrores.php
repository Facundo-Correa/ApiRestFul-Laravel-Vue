<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NuevoPedidoConErrores extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pedido '.substr('00000000'.$this->pedido->id,-8).' en MlRepuestos con Errores')
            ->from('ventas@mlrepuestos.com.ar','MlRepuestos')
            ->view('Mails.nuevoPedidoErrores');
    }
}
