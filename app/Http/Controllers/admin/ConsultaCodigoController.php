<?php

namespace App\Http\Controllers;

use App\ConsultaCodigo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultaCodigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->showMessage(ConsultaCodigo::orderBy('nombre')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConsultaCodigo  $consultaCodigo
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultaCodigo $consultaCodigo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConsultaCodigo  $consultaCodigo
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultaCodigo $consultaCodigo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsultaCodigo  $consultaCodigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsultaCodigo $consultaCodigo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConsultaCodigo  $consultaCodigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsultaCodigo $consultaCodigo)
    {
        //
    }

    public function search(Request $request)
    {
        //

        return $this->showMessage(ConsultaCodigo::whereNotIn('id', function($q) use ($request) {
            $q->select('id_tipo_parte')->from('consulta_tecnicas')
                ->where('id_marca','=',$request->id_marca)
                ->where('id_modelo','=',$request->id_modelo);
        })
            ->orderBy('nombre')->get()
        );
    }
}
