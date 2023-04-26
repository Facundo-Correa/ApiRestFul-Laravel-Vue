<?php

namespace App\Http\Controllers;

use App\tipoPublicidad;
use Illuminate\Http\Request;

class TipoPublicidadController extends Controller
{
    public function index()
    {
        return $this->showAll(tipoPublicidad::all());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(tipoPublicidad $tipo_publicidad)
    {
        //
    }

    public function update(Request $request, tipoPublicidad $tipo_publicidad)
    {
        //
    }

    public function destroy(tipoPublicidad $tipo_publicidad)
    {
        //
    }
}
