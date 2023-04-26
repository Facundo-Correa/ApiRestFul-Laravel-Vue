<?php

namespace App\Http\Controllers;

use App\ConsultaTecnica;
use Illuminate\Http\Request;

class ConsultaTecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $res = ConsultaTecnica::where('id_marca','=',$request->marca_id)->where('id_modelo','=',$request->modelo_id)->with(['marcas','modelos','tipo_partes','articulos'])->get();



        return $this->showMessage($res);
    }


}
