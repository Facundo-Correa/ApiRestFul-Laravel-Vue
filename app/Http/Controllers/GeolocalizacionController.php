<?php

namespace App\Http\Controllers;

use App\Geolocalizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeolocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $geodata=Geolocalizacion::where('parent_id','=',\request('parent_id'))->get();
        return $this->showMessage($geodata);
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
     * @param  \App\Geolocalizacion  $geolocalizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Geolocalizacion $geolocalizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Geolocalizacion  $geolocalizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Geolocalizacion $geolocalizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Geolocalizacion  $geolocalizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Geolocalizacion $geolocalizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Geolocalizacion  $geolocalizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Geolocalizacion $geolocalizacion)
    {
        //
    }
}
