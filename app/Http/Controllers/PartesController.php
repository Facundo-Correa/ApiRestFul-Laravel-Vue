<?php

namespace App\Http\Controllers;

use App\Partes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->showMessage(Partes::orderBy('parte')->get());
    }

    public function buscarparte(Request $request)
    {
        return $this->showAll(Partes::where('parte','=', $request->parte)->get());
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
     * @param  \App\Partes  $partes
     * @return \Illuminate\Http\Response
     */
    public function show(Partes $partes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partes  $partes
     * @return \Illuminate\Http\Response
     */
    public function edit(Partes $partes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partes  $partes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partes $partes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partes  $partes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partes $partes)
    {
        //
    }
}
