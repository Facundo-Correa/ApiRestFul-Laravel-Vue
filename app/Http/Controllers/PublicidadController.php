<?php

namespace App\Http\Controllers;

use App\Publicidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PublicidadController extends Controller
{
    public function index()
    {
        // tag_marcas = dia de la semana
        // domingo = 0
        // lunes = 1
        $publis = Publicidad::where('tag_marcas', Carbon::today()->dayOfWeek)->get();
        return $this->showMessage($publis);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $publicidad = Publicidad::create([
                'titulo'=> $request->titulo,
                'descripcion'=> $request->descripcion,
                'imagen'=> $request->imagen,
                'estado'=> $request->estado,
                'fecha_desde'=> $request->fecha_desde,
                'fecha_hasta'=> $request->fecha_hasta,
                'clics'=> $request->clics,
                'impresiones'=> $request->impresiones,
                'tag_marcas'=> $request->tag_marcas,
                'tag_modelos'=> $request->tag_modelos,
                'tag_partes'=> $request->tag_partes,
                'excluir_productos'=> $request->excluir_productos,
                'fecha_alta'=> $request->fecha_alta,
                'fecha_modificacion'=> $request->fecha_modificacion,
                'user_alta_id'=> $request->user_alta_id,
                'user_modif_id'=> $request->user_modif_id,
                'seccion_id'=> $request->seccion_id,
                'tipo_publicidad_id'=> $request->tipo_publicidad_id,
                'promocion_id'=> $request->promocion_id,
                'oferta_id'=> $request->oferta_id
            ]);

        } catch(\Exception $e) {
            DB::rollBack();
            if (env('APP_DEBUG'))
                dd($e);

            return $this->errorResponse('Ha occurrido un error inesperado, intente luego nuevamente',500);
        }

        DB::commit();

        return $this->showMessage('Publicidad creada con exito!');
    }

    public function show(Publicidad $publicidades)
    {
        //
    }

    public function busqueda( Request $request ){

        $publicidad = (new Publicidad())->newQuery();

        if ($request->nombre != null){
            $publicidad = $publicidad->where('titulo','LIKE','%'.$request->nombre.'%');
        }

        if ($request->fecha_desde != null){
            $publicidad = $publicidad->where('fecha_desde', $request->fecha_desde);
        }

        if ($request->fecha_hasta != null){
            $publicidad = $publicidad->where('fecha_hasta', $request->fecha_hasta);
        }

        $publicidad = $publicidad->get();

        return $this->showAll($publicidad);
    }

    public function update(Request $request, Publicidad $publicity){

        if($request->titulo != $publicity->titulo){
            $publicity->titulo = $request->titulo;
        }
        if($request->descripcion != $publicity->descripcion){
            $publicity->descripcion = $request->descripcion;
        }
        if($request->imagen != $publicity->imagen){
            $publicity->imagen = $request->imagen;
        }
        if($request->estado != $publicity->estado){
            $publicity->estado = $request->estado;
        }
        if($request->fecha_desde != $publicity->fecha_desde){
            $publicity->fecha_desde = $request->fecha_desde;
        }
        if($request->fecha_hasta != $publicity->fecha_hasta){
            $publicity->fecha_hasta = $request->fecha_hasta;
        }
        if($request->clics != $publicity->clics){
            $publicity->clics = $request->clics;
        }
        if($request->impresiones != $publicity->impresiones){
            $publicity->impresiones = $request->impresiones;
        }
        if($request->tag_marcas != $publicity->tag_marcas){
            $publicity->tag_marcas = $request->tag_marcas;
        }
        if($request->tag_modelos != $publicity->tag_modelos){
            $publicity->tag_modelos = $request->tag_modelos;
        }
        if($request->tag_partes != $publicity->tag_partes){
            $publicity->tag_partes = $request->tag_partes;
        }
        if($request->excluir_productos != $publicity->excluir_productos){
            $publicity->excluir_productos = $request->excluir_productos;
        }
        if($request->fecha_alta != $publicity->fecha_alta){
            $publicity->fecha_alta = $request->fecha_alta;
        }
        if($request->fecha_modificacion != $publicity->fecha_modificacion){
            $publicity->fecha_modificacion = $request->fecha_modificacion;
        }
        if($request->user_alta_id != $publicity->user_alta_id){
            $publicity->user_alta_id = $request->user_alta_id;
        }
        if($request->user_modif_id != $publicity->user_modif_id){
            $publicity->user_modif_id = $request->user_modif_id;
        }
        if($request->seccion_id != $publicity->seccion_id){
            $publicity->seccion_id = $request->seccion_id;
        }
        if($request->tipo_publicidad_id != $publicity->tipo_publicidad_id){
            $publicity->tipo_publicidad_id = $request->tipo_publicidad_id;
        }
        if($request->promocion_id != $publicity->promocion_id){
            $publicity->promocion_id = $request->promocion_id;
        }
        if($request->oferta_id != $publicity->oferta_id){
            $publicity->oferta_id = $request->oferta_id;
        }

        $publicity->save();

        return $this->showMessage('Publicidad modificada con exito!');
    }

    public function destroy(Publicidad $publicity)
    {
        $publicity->delete();

        return $this->showMessage('Publicidad eliminada!');
    }
}
