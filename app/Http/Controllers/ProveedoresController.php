<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    public function proveedoresConLogo($ruta){

      $proveedoresConLogo = [];

      if($dir = opendir($_SERVER['DOCUMENT_ROOT'].$ruta)){
        while(($archivo = readdir($dir)) !== false){
          if($archivo != '.' && $archivo != '..'){
            $path_parts = pathinfo($archivo);
            array_push($proveedoresConLogo, $path_parts['filename']);
          }
        }
        closedir($dir);

      }

      return $proveedoresConLogo;

    }

    public function showProveedores(){

        $proveedoresConLogo = self::proveedoresConLogo(env('LOGOS_IMAGE'));

        $proveedores=Proveedores::inRandomOrder()->has('productos','>', 5)->whereIn('id', $proveedoresConLogo)->get();

        foreach($proveedores as $proveedor){
            $proveedor->load(['productos' => function($q){
                return $q->take(6);
            }]);
            foreach ($proveedor->productos as $producto){
                $producto->load(['origen']);
            }
        }

        return $this->showAll($proveedores);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedores $proveedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedores $proveedores)
    {
        //
    }
}
