<?php
namespace App\Library;
/**
 * Created by Trememote.
 * User: jasca
 * Date: 13/04/16
 * Time: 10:00
 */

class CrearNotaPedido
{

    static public function newPedido($nropedido, $cliente_id,$fecha_entrega ,$hora_entrega,$arrDatosWs,$leyenda,$lista)
    {
        //Seteo fecha de pedido
        $hoy = date("c", time());
        $fecha_e = DateTime::createFromFormat('d/m/Y',$fecha_entrega);
        if(is_object($fecha_e))
            $fecha_entrega =  $fecha_e->format('Y-m-d');


        $f_entrega=$fecha_entrega."T".$hora_entrega;

        //creo el objeto pedido
        $NotaPedido = new NotaPedido($nropedido, $cliente_id, $hoy,$f_entrega,$arrDatosWs,$leyenda,$lista);

        return self::_sendPedido($NotaPedido);


    }

    // static private function _sendPedido($NotaPedido)
    // {
    //     //defino opciones de conección
    //     $url = 'https://webservice.mlrepuestos.com.ar:2087/ServiciosIMAC.asmx?wsdl';
    //     $options = array(
    //         'soap_version'=>SOAP_1_1,
    //         'exceptions'=>true,
    //         'trace'=>1,
    //         "connection_timeout" => 90
    //     );
    //
    //     //instancio objeto SOAP
    //     $clientenuevo = new SoapClient($url,$options);
    //     $res = $clientenuevo->CrearNotaPedido(array("notaPedido"=>$NotaPedido));
    //
    //     $result = array('row'=>$NotaPedido,'res'=>$res);
    //
    //     return $result;
    //
    // }
}
