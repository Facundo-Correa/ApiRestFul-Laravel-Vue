<?php


namespace App\Http\Controllers\admin;


use App\ArticulosSustitucion;
use App\ConsTecnicaArticulos;
use App\ConsultaTecnica;
use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;


class ArticulosRelacionadosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datta=[];
        //obtener productos sustitutos agrupados por articulo
        $res = ArticulosSustitucion::with('sustituto')->orderBy('id_articulo')->get();
        if($res->count() >0)
        {
            $rs = $this->showBoAll($res,true,true  );

            foreach ($rs->getOriginalContent() as $Datum) {
                $data[$Datum->id_articulo][] = $Datum->sustituto;
            }
            foreach ($data as $key=>$val) {
                $datta[] = [
                    'id_articulo'=> $key,
                    'articulos'=>$val
                ];
            }
        }
        return $this->showMessage($datta);
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
            'articulo'=> 'required',
            'producto'=> 'required',

        ];
        $msg = [
            'articulo'=> 'El campo artculo es obligatorio',
            'producto'=> 'El campo producto  es obligatorio',

        ];



        $this->validate($request, $rules, $msg);

        // convertimos los datos
        $id = $request->id;
        $articulo = ($id)?$request->articulo: $request->articulo['id'];
        $productos= $request->producto;


        if($id) {
           //obtener ctecnica articulos borrar y crear con nuevos datos
            ArticulosSustitucion::where('id_articulo','=',$articulo)->delete();
            ArticulosSustitucion::where('id_sustitucion','=',$articulo)->delete();
        }
        //Guardo relacion de sustitutos ej: a = b,c,d guardo  a=b, a=c, a=d, b=a, b=c , c=a, c=b
        $this->insert($productos,$articulo);

        return $this->showMessage('¡Relación de articulo creada exitosamente!');
    }

    /**
     * Guardo relaciones
     */
    private function insert($productos,$articulo){
        foreach ($productos as $producto) {
            $articulo_sustitucion = ArticulosSustitucion::create(['id_articulo' => $articulo, 'id_sustitucion' => $producto['id']]);
            $articulo_sustitucion->save();
        }
        $tot_vueltas = count($productos);
        for ($i=0; $i < $tot_vueltas;$i++ )
        {
            foreach ($productos as $producto) {
                if($productos[$i]['id'] ==$producto['id'] )
                    continue;
                $sust_articulo = ArticulosSustitucion::create(['id_articulo' => $productos[$i]['id'], 'id_sustitucion' =>$producto['id']]);
                $sust_articulo->save();
            }

            $susti_articulo = ArticulosSustitucion::create(['id_articulo' => $productos[$i]['id'], 'id_sustitucion' =>$articulo]);
            $susti_articulo->save();

        }
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
        ArticulosSustitucion::where('id_articulo','=',$request->id)->delete();
        ArticulosSustitucion::where('id_sustitucion','=',$request->id)->delete();

        return $this->showMessage('Relacion de productos borrada con exito');
    }
}
