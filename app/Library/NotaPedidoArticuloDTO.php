<?php
namespace App\Library;
/**
 * Created by PhpStorm.
 * User: jasca
 * Date: 12/04/16
 * Time: 20:46
 */

//namespace library\core\ws;


class NotaPedidoArticuloDTO
{

    public $NumeroInternoComprobante;
    public $Renglon;
    public $ArticuloEmpresa;
    public $Deposito;
    public $FechaEntrega;
    public $UnidadMedida;
    public $Cantidad;
    public $PrecioUnitario;
    public $UMPrecioVenta;
    public $FactorUMS;
    public $DescuentosRenglon;

    public function __construct($Renglon, $ArticuloEmpresa, $FechaEntrega, $UnidadMedida, $Cantidad, $PrecioUnitario, $DescuentosRenglon,$FactorUMS=1,$Lista=null)
    {

        $this->ListaPrecioVenta = null;
        $this->NumeroInternoComprobante = (int)0;
        $this->Renglon = (int)$Renglon;
        $this->ArticuloEmpresa= (int)$ArticuloEmpresa;
        $this->Deposito = (int)1;
        $this->FechaEntrega = $FechaEntrega;
        $this->UnidadMedida = (string)$UnidadMedida;
        $this->Cantidad = (float)$Cantidad;
        $this->PrecioUnitario = 0;
        $this->UMPrecioVenta = (int)1;
        $this->FactorUMS = (float)$FactorUMS;
        if(is_object($DescuentosRenglon))
            $this->DescuentosRenglon = array($DescuentosRenglon);


    }

}