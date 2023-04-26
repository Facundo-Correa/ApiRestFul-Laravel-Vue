<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarPresupuesto extends Mailable
{
    use Queueable, SerializesModels;

    public $aQuien;
    public $presentacion;
    public $subtotal;
    public $iva;
    public $total;
    public $objeto;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($aQuien, $presentacion, $subtotal, $iva, $total, $objeto, $mail)
    {
        $this->title = 'Presupuesto para '.$aQuien;
        $this->aQuien = $aQuien;
        $this->presentacion = $presentacion;
        $this->subtotal = $subtotal;
        $this->iva = $iva;
        $this->total = $total;
        $this->objeto = $objeto;
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
            ->from($this->mail,'Presupuestos')
            ->BCC('ventas@mlrepuestos.com.ar')
            ->view('Mails.presupuestoMail');
    }
}
