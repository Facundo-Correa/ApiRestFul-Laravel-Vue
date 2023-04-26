<?php

namespace App\Http\Controllers;

use App\TipoPersona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipousuario = TipoPersona::get()
                        ->map(function ($x) {
                return [
                    'id' => $x->id,
                    'descripcion' => $x->id . ' | ' . $x->nombre.', '. $x->apellido,
                ];
            });

        return $this->showMessage($tipousuario);
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
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPersona $tipoPersona)
    {
        $tipos=$tipoPersona->all();
        return $this->showMessage($tipos);
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPersona $tipoPersona)
    {
        //
    }
}
