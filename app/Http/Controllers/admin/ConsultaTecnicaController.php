<?php


namespace App\Http\Controllers\admin;


use App\ConsTecnicaArticulos;
use App\ConsultaTecnica;
use App\Http\Controllers\Controller;
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

        $res = ConsultaTecnica::where('id_marca','=',$request->id_marca)->where('id_modelo','=',$request->id_modelo)->with(['marcas','modelos','tipo_partes','articulos'])->get();


        return $this->showMessage($res);
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
        /**
         * input array
         */


        //Validamos campos del formulario antes del insert
        //
        $rules = [
            'marca'=> 'required|min:4',
            'modelo'=> 'required|min:4',
            'producto'=> 'required',
            'tpartes'=> 'required',

        ];
        $msg = [
            'marca'=> 'El campo marca  es obligatorio tener al menos 4 caracteres',
            'modelo'=> 'El campo modelo  es obligatorio',
            'producto'=> 'El campo producto  es obligatorio',
            'tpartes'=> 'El campo tipo de partes  es obligatorio',

        ];


        $this->validate($request, $rules, $msg);

        // convertimos los datos
        $id = $request->id;
        $marca= $request->marca['id'];
        $modelo= $request->modelo['id'];
        $productos= $request->producto;
        $tpartes= $request->tpartes['id'];
        $valor= $request->valor;


        if(!$id) {


            $ctecnica = ConsultaTecnica::create(
                [
                    'id_marca' => $marca,
                    'id_modelo' => $modelo,
                    'id_tipo_parte' => $tpartes,
                    'value' => $valor
                ]
            );
            $ctecnica->save();

            //Guardo relacion productos ctecnica
            foreach ($productos as $producto) {
                $ctecarticulos = ConsTecnicaArticulos::create(['id_consulta_tecnica' => $ctecnica->id, 'id_articulo' => $producto['id']]);
                $ctecarticulos->save();
            }
        } else {

            //obtener ctecnica segun id
            $ctecnica = ConsultaTecnica::find($id);
            $ctecnica->value = $valor;
            $ctecnica->save();

            //obtener ctecnica articulos borrar y crear con nuevos datos
            $ct_articulos = ConsTecnicaArticulos::where('id_consulta_tecnica','=',$id)->delete();
            foreach ($productos as $producto) {
                $ctecarticulos = ConsTecnicaArticulos::create(['id_consulta_tecnica' => $ctecnica->id, 'id_articulo' => $producto['id']]);
                $ctecarticulos->save();
            }


        }

        return $this->showMessage('¡Oferta creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConsultaTecnica  $consultaTecnica
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultaTecnica $consultaTecnica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConsultaTecnica  $consultaTecnica
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultaTecnica $consultaTecnica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsultaTecnica  $consultaTecnica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsultaTecnica $consultaTecnica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConsultaTecnica  $consultaTecnica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        //obtener ctecnica segun id
        $ctecnica = ConsultaTecnica::find($request->id);

        //obtener ctecnica articulos borrar y crear con nuevos datos
        $ct_articulos = ConsTecnicaArticulos::where('id_consulta_tecnica','=',$request->id)->delete();

        $ctecnica->delete();

        return $this->showMessage('Relacion de productos borrada con exito');
    }
}
