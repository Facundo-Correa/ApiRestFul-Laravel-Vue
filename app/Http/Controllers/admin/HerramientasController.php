<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HerramientasController extends Controller
{

    public function procesar(Request $request){

        switch ($request->action){
            case 'rename':
                $rs = $this->renombrar($request->id,$request->id_new);
                $res = ["data"=>$rs,"accion"=>'renombrar'];
                break;
            case 'copiar':
                $rs = $this->copiar($request->id,$request->id_new);
                $res = ["data"=>$rs,"accion"=>'copiar'];
                break;
            case 'borrar':
                $rs = $this->borrar($request->id);
                $res = ["data"=>$rs,"accion"=>'copiar'];
                break;

        }

        return json_encode($res);
    }

    private function renombrar($id, $id_new){
        $imgPath = $_SERVER['DOCUMENT_ROOT'] . env('PRODUCT_IMAGE');
        $imgThumbPath = $_SERVER['DOCUMENT_ROOT'] . env('PRODUCT_IMAGE').'/thumbs/';
        $resData =['status'=>true, 'msg' => 'Se proceso correctamente el cambio de nombre'];
        $res = false;
        $res2 = false;


        $old_image = $id . '.jpg';
        $new_image = $id_new . '.jpg';


        if (file_exists($imgPath . $old_image))
            $res = rename($imgPath . $old_image, $imgPath . $new_image);
        else
            $msg = 'No se encuentra la imagen de origen' + $imgPath . $old_image;


        if (file_exists($imgThumbPath . $old_image))
            $res2 = rename($imgThumbPath . $old_image, $imgThumbPath . $new_image);
        else
            $resData =['status'=>false,'msg'=>'No se encuentra la imagen de origen' . $imgThumbPath . $old_image];

        if ($res != TRUE)
        {
            $resData=["status"=>false,'msg'=>'Problemas al cambiar el nombre de la imagen'];

        }

        if ($res2 != TRUE)
            $resData=['status'=>false, 'msg'=> 'Problemas al cambiar el nombre de la imagen miniatura'];


        return $resData;

    }

    private function copiar($id, $id_new){
        $imgPath = $_SERVER['DOCUMENT_ROOT'] . env('PRODUCT_IMAGE');
        $imgThumbPath = $_SERVER['DOCUMENT_ROOT'] . env('PRODUCT_IMAGE').'thumbs/';
        $resData =['status'=>true, 'msg' => 'Se proceso correctamente el cambio de nombre'];
        $res = false;
        $res2 = false;


        $old_image = $id . '.jpg';
        $new_image = $id_new . '.jpg';



        if (file_exists($imgPath . $old_image))
            $res = copy($imgPath . $old_image, $imgPath . $new_image);
        else
            $resData= ['status'=>false,'msg'=> 'No se encuentra la imagen de origen'. $imgPath . $old_image];


        if (file_exists($imgThumbPath . $old_image))
            $res2 = copy($imgThumbPath . $old_image, $imgThumbPath . $new_image);
        else
            $resData =['status'=>false,'msg'=>'No se encuentra la imagen de origen' .$imgThumbPath . $old_image];

        if ($res != TRUE)
        {
            $resData=["status"=>false,'msg'=>'Problemas al cambiar el nombre de la imagen'];

        }

        if ($res2 != TRUE)
            $resData=['status'=>false, 'msg'=> 'Problemas al cambiar el nombre de la imagen miniatura'];


        return $resData;
    }

    private function borrar($id){
        $imgPath = $_SERVER['DOCUMENT_ROOT'] . env('PRODUCT_IMAGE');
        $imgThumbPath = $_SERVER['DOCUMENT_ROOT'] . env('PRODUCT_IMAGE').'thumbs/';
        $resData =['status'=>true, 'msg' => 'Se proceso correctamente el cambio de nombre'];
        $res = false;
        $res2 = false;

        $old_image = $id . '.jpg';

        if (file_exists($imgPath . $old_image))
            $res =  unlink($imgPath . $old_image);

        if (file_exists($imgThumbPath . $old_image))
            $res2 =  unlink($imgThumbPath . $old_image);

        if ($res != TRUE)
        {
            $resData=["status"=>false,'msg'=>'Problemas al cambiar el nombre de la imagen'.$imgPath . $old_image];

        }

        if ($res2 != TRUE)
            $resData=['status'=>false, 'msg'=> 'Problemas al cambiar el nombre de la imagen miniatura '. $imgThumbPath . $old_image];


        return $resData;
    }
}
