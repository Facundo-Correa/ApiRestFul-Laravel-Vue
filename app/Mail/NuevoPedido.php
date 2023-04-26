<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NuevoPedido extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;
    public $toAdmin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido, $toAdmin = false)
    {
        $this->pedido = $pedido;
        $this->toAdmin = $toAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Pedido en MlRepuestos')
            ->from('ventas@mlrepuestos.com.ar','MlRepuestos')
            ->view('Mails.nuevoPedido');
    }
}
