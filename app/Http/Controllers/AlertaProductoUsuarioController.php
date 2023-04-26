<?php

namespace App\Http\Controllers;

use App\AlertaProductoUsuario;
use App\FirebaseUserToken;
use App\Mail\AlertaInStock;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AlertaProductoUsuarioController extends Controller
{
    //

    public function checkProducts()
    {
        $ids=[];
        $productos=[];
        $user_ant ='';
        $user_id_ant='';

        //obtener productos que tengan semaforo en verde y que no esten marcados como notificados
        $arr_toUpdate = AlertaProductoUsuario::where('notificacion','<',1)->with('producto')->whereHas('producto', function ($q){
            $q->where('estado_id','=','V');
        })->orderBy('user_id', 'asc')->get();



        if($arr_toUpdate) {
            foreach ($arr_toUpdate as $key => $item) {

                /**
                 * transformo resultado en un array por usuario con productos
                 */
                $productos[$item->user_id]['user'] = $item->user;
                $productos[$item->user_id]['producto'][] = $item->producto;
                $ids[]=$item->id;

            }

            foreach ($productos as $item)
            {
                if($item['user']){

                    $this->__addBasket($item['user'],$item['producto']);

                    $this->__notifcation($item['user'],$item['producto']);
                }

            }

            // Marcar notificacion en 1 = email
            $res = AlertaProductoUsuario::whereIN('id', $ids)
                ->update(['notificacion' => '1']);


        }


    }

    private function __addBasket($user,$productos)
    {

        if (count($productos) > 0) {
            foreach ($productos as $product) {
                $user->basket()->create([
                    'producto_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->precio_actual,
                    'puntos' => 0
                ]);
            }

        }
    }

    private function __notifcation($user,$content)
    {

        $token = FirebaseUserToken::where('user_id','=',$user->id)->get();

        //Notificar usuarios que tengan dichos productos
        Mail::to($user->email)->send(new AlertaInStock("Articulos en STOCK!!", collect($content)));
        /*Mail::to(env('VENTAS_RECIPIENT'))->send(new AlertaInStock("Articulos en STOCK!!",  collect($content)));
        Mail::to(env('ADMIN_RECIPIENT'))->send(new AlertaInStock("Articulos en STOCK!!",  collect($content)));*/


        if($token->first())
        {
            $token[]=$token->first()->token;
            fcm()
            ->to($token)
            ->priority('high')
            ->timeToLive(0)
            ->notification([
                'title' => 'Alerta de Stock',
                'body' => "Ingresaron productos que tenias en alerta al Stock y ya los agregamos a tu carrito, Ingresa y no pierdas esta oportunidad",
                'image'=> "",
                "icon" => "ic_launcher",
                "color"=>"#FFFCCC"
            ])
            ->send();
        }

    }



    public function update($ids)
    {
        // cambio estados de notificaciones
        AlertaProductoUsuario::whereIN('product_id', $ids)->updated(['notificacion' => '2']);

    }

}
