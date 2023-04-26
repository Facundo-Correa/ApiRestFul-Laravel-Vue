<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class AlertaInStock extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,Collection  $content)
    {


        $this->title = $title;
        $this->content  = $content->toArray();


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
            ->from('ventas@mlrepuestos.com.ar','MLRepuestos')
            ->view('Mails.alertasInStock');
    }
}
