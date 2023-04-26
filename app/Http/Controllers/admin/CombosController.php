<?php

namespace App\Http\Controllers\admin;

use App\V2PromoVista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CombosController extends Controller
{
    public function index(Request $request)
    {

        //$data = V2PromoVista::groupBy('codigo')->get();
        $data = V2PromoVista::getCombos()->get() ;

        return $this->showBoAll($data,true,true);
    }
}