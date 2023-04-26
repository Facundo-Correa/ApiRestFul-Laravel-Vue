<?php


namespace App\Notificacion;


use App\FirebaseUserToken;
use Matrix\Exception;

class FBNotificacion
{

    public static function sendFM($user_id,$token,$title,$msg)
    {
        if($token)
            $token[]=$token;

        if($user_id > 0)
        {
            $res = FirebaseUserToken::where('user_id', '=', $user_id)->orderBy('id', 'desc')->first();
            if($res)
            {
                $token[]=$res->token;
            }
        }

        if(is_array($token) && count($token)>0)
        {
            fcm()
                ->to($token)
                ->priority('high')
                ->timeToLive(0)
                ->notification([
                    'title' => $title,
                    'body' => $msg,
                    'image'=> "",
                    "icon" => "ic_launcher",
                    "color"=>"#FFFCCC"
                ])
                ->send();
        } else {
            throw new Exception('No hay token de firebase para el usuario');
        }

    }
}