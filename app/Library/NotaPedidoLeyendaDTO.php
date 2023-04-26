<?php
namespace App\Library;
/**
 * Created by PhpStorm.
 * User: jasca
 * Date: 13/04/16
 * Time: 15:23
 */

//namespace library\core\ws;


class NotaPedidoLeyendaDTO
{
    public $NumeroInternoComprobante;
    public $Renglon;
    public $Leyenda;

    public function __construct($NumeroInternoComprobante=0,$Renglon='1',$Leyenda='01')
    {
        $this->NumeroInternoComprobante=$NumeroInternoComprobante;
        $this->Renglon=$Renglon;
        $this->Leyenda=$Leyenda; //cept a varios descuen4tos por renglon


    }
}