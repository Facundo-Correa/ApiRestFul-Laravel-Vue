<?php
namespace App\Library;
/**
 * Created by PhpStorm.
 * User: jasca
 * Date: 13/04/16
 * Time: 15:20
 */

//namespace library\core\ws;


class NotaPedidoDctoRenglonDTO
{
    public $NumeroInternoComprobante;
    public $Renglon;
    public $NumeroOrden;
    public $PorcentajeDcto;
    public $EsPorcentajeCombo;

    public function __construct($NumeroInternoComprobante=0,$Renglon='',$NumeroOrden='',$PorcentajeDcto,$EsPorcentajeCombo=0)
    {
        $this->NumeroInternoComprobante=$NumeroInternoComprobante;
        $this->Renglon=$Renglon;
        $this->NumeroOrden=$NumeroOrden; //cept a varios descuen4tos por renglon
        $this->PorcentajeDcto=$PorcentajeDcto;
        $this->EsPorcentajeCombo=$EsPorcentajeCombo;

    }

}