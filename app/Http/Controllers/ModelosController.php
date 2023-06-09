<?php

namespace App\Http\Controllers;

use App\Modelos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($marca_id)
    {
        return $this->showMessage(Modelos::where('marca_id',$marca_id)->orderBy('modelo')->get());
    }

    public function buscarmodelo(Request $request)
    {
        return $this->showAll(Modelos::where('modelo','=', $request->modelo)->get());
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
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function show(Modelos $modelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelos $modelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelos $modelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelos $modelos)
    {
        //
    }
}
