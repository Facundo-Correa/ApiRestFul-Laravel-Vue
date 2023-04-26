<?php

namespace App\Http\Controllers;

use App\FirebaseUserToken;
use App\NotificationQueue;
use App\V2Promos;
use Illuminate\Http\Request;

class FirebaseNotificationController extends Controller
{
    private function endLine()
    {
        echo ("\r\n");
    }

    static public function send_fcm($test = false)
    {
        $recipients = [];

        if($test){

            $fb_users[] = FirebaseUserToken::whereIN('user_id',[253, 1282])->get();
            foreach($fb_users[0] as $user) {
                array_push($recipients, $user->token);
            }

        }
        else {
            $fb_users = FirebaseUserToken::all('token')->toArray();

            if ($fb_users && is_array($fb_users)) {
                foreach ($fb_users as $fbtoken) {
                    $recipients[] = $fbtoken['token'];
                }
            } else {
                $recipients[] = $fb_users->token;
            }
        }




        echo ('|| -------------------------------- ||');
        //endLine();
        echo ('|| Emitiendo testeo de notificacion ||');
        //endLine();

        $notificaciones_en_cola = NotificationQueue::all();


        foreach ($notificaciones_en_cola as $notificacion) {

            $promoID = $notificacion->promoID;
            $promo = V2Promos::find($promoID);


            if(!$promo){
                continue; //o sea goto 10

            }

            $producto = $promo->productos()->get();
            $img = env('THUMBS_IMAGE').$producto[0]->id_producto.".jpg";


            $resultado = fcm()
                ->to($recipients)
                ->priority('high')
                ->timeToLive(0)
                ->notification([
                    'title' => 'MLRepuestos | Ofertas Diarias',
                    'body' => $promo->nombre,
                    'style' => 'picture',
                    'image' => $img,
                    "color" => "#FFFCCC",
                    'click_action' => 'OPEN',
                    'show_in_foreground' => 'true',
                ])
                ->data([
                    'title' => 'MLRepuestos: Ofertas Diarias',
                    'body' => $promo->nombre,
                    'id'   => $promoID,
                    'image' => $img,
                    'style' => 'picture',
                    "color" => "#FFFCCC",
                ])->send();

            echo ('|| Notificacion emitida ||');
            //$this->endLine();
            echo "con Exito:". $resultado['success'] . " Fallidas: ".$resultado['failure'] . "\n";

            // || Borrado
            $notificacion->delete();

            // Descanso de 5 min
            sleep(60*5);
        }
        //endLine();
        echo ('|| Ya le avisamos a todos ||');
        //endLine();
    }


}
