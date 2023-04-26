<?php

namespace App\Library;

/**
 * Created by PhpStorm.
 * User: jasca
 * Date: 12/04/16
 * Time: 20:52
 */

//namespace library\core\ws;




class NotaPedido
{
    public $UsuarioAuditoria = 'MARCELO';
    public $NumeroInternoComprobante = 0;
    public $NumeracionAutomatica = 1;
    public $ContienePreciosDctos = 2;
    public $CalcPromVolCompra = 0;
    public $CalcBandejas = 0;
    public $Division = 1;
    public $Tipo = 'NPW';
    public $Numero = null;
    public $ReferenciaExterna = '1111';
    public $FechaEmision = '';
    public $ClienteId = '908';
    public $MonedaId = 'PS';
    public $Observacion = 'pedido web';
    public $ListaPrecioVenta = null;
    public $CantidadDctosCabecera = 0;
    public $CantidadDctosRenglones = 1;
    public $DctoNetoBrutoCabecera = 2;
    public $DctoNetoBrutoRenglones = 2;
    public $DirEntregaCliente = 1;
    public $DepositoBaseConfId = 1;
    public $FechaEntregaBase = '';
    public $Vendedor1Id = '06';
    public $PesoTotalEmbaladoAj = 1;
    public $VolumenTotalEmbaladoAj = 1;
    public $Articulos = array();
    public $NotaPedidoLeyendaDTO = array();

    public function __construct($nropedido, $cliente_id, $FechaPedido, $FechaEtnrega, $arrArticulos, $leyenda = '', $lista)
    {
        //Seteo el numero interno de comprobante
        $this->ReferenciaExterna = $nropedido;

        //Seteo la fecha emision y entrega
        $this->FechaEmision = $FechaPedido;
        $this->FechaEntregaBase = $FechaEtnrega;

        //seteo el Cliente
        $this->ClienteId = $cliente_id;

        //seteo la observación en virtud de lo completado en el pedido
        $this->Observacion = $leyenda;


        //seteo los articulos y regreso el objeto
        $i = 1;
        foreach ($arrArticulos as $key => $row) {


            $descuentoRenglon = 'null';

            if ($row['descuento'] > 0) {
                $descuentoRenglon = new NotaPedidoDctoRenglonDTO(0, $i, 1, $row['descuento'], 0);
            }

            $descuentoRenglon = is_object($descuentoRenglon) ? $descuentoRenglon : null;
            //creo el renglon con descuento
            // $um =  $row['um'] = 'BV'?'UN': $row['um'];
            $articulos[] = new NotaPedidoArticuloDTO($i, $key, $this->FechaEntregaBase, $row['um'], $row['cantidad'], $row['precio'], $descuentoRenglon, $row['umq'], $lista);
            $i++;
        }

        $this->Articulos = $articulos;
        $this->NotaPedidoLeyendaDTO = array(new NotaPedidoLeyendaDTO('0', 1, $leyenda));
    }
}
