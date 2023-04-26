<?php

namespace App\Http\Controllers\admin;

use App\Basket;
use App\FirebaseUserToken;
use App\V2PromoDia;
use App\V2PromoMes;
use App\V2PromoProducto;
use App\V2Promos;
use App\V2PromoSemana;
use App\V2PromoTipoUsuario;
use App\V2PromoUsuario;
use App\V2PromoVista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NotificationQueue;
use App\Producto;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Console\Commands\DestroyOfertas;

class OfertaController extends Controller
{
    public function index(Request $request)
    {
        //$data = V2PromoVista::groupBy('codigo')->get();
        $data = V2PromoVista::getOfertasAll()->get();


        return $this->showBoAll($data, true, true);
    }
    public function oferta(Request $request)
    {

        // Busco la promo a editar
        $promo = V2Promos::find($request->id);

        $promo->getAllRelations();

        return $this->showMessage($promo);
    }

    public function store(Request $request)
    {
        //dd($request->relaciones[0]['dias']['nombre']);

        /**
         * input array
         */


        //Validamos campos del formulario antes del insert
        //


        $rules = [
            'codigo' => 'required|min:4',
            'nombre' => 'required|min:4',
            'desde' => 'required',
            'hasta' => 'required',
            'descripcion' => 'required|min:4',
            'id_tipo_criterio' => 'required',
            'producto' => 'required',
            'descuento_gral' => 'required',
        ];
        $msg = [
            'codigo' => 'El campo codigo es obligatorio y tener al menos 4 caracteres',
            'nombre' => 'El campo nombre  es obligatorio tener al menos 4 caracteres',
            'desde' => 'El campo desde  es obligatorio',
            'hasta' => 'El campo hasta  es obligatorio',
            'descripcion' => 'El campo descripcion  es obligatorio tener al menos 4 caracteres',
            'criterio' => 'El campo criterio  es obligatorio',
            'productos' => 'El campo productos  es obligatorio',
            'descuento_gral' => 'El campo descuento_gral  es obligatorio',

        ];


        $this->validate($request, $rules, $msg);

        // convertimos los datos
        $codigo = $request->codigo;
        $nombre = $request->nombre;
        $desde = $request->desde;
        $hasta = $request->hasta;
        $descripcion = $request->descripcion;
        $criterio = $request->id_tipo_criterio;
        $productos = $request->producto;
        $dsemana = $request->dsemana;
        $semana = $request->semana;
        $mes = $request->mes;
        $usuario = $request->usuario;
        $tipo_usuario = $request->tipo_usuario;
        $puntos = $request->puntos;
        $ultima_compra = $request->ultima_compra;
        $descuento_gral = $request->descuento_gral;

        //$codigo = V2Promos::all()->first()->id +1;

        $promo = V2Promos::create(
            [
                'id_tipo_entidad' => 1,
                'id_tipo_promo' => 5,
                'id_tipo_criterio' => $criterio,
                'codigo' => 'ofe' . $codigo,
                'nombre' => $nombre,
                'desde' => $desde,
                'hasta' => $hasta,
                'descripcion' => $descripcion,
                'descuento_gral' => $descuento_gral,
                'puntos' => $puntos,
                'ultima_compra' => $ultima_compra
            ]
        );
        // ||  || //


        $mes = new V2PromoMes();
        $mes->id_promo = $promo->id;

        $semana = new V2PromoSemana();
        $semana->id_promo = $promo->id;

        $dia = new V2PromoDia();
        $dia->id_promo = $promo->id;


        $promo->cDia = $request->cDia['nombre'] ?? 'Sin especificar';
        $promo->cSemana = $request->cSemana['nombre'] ?? 'Sin especificar';
        $promo->cMes = $request->cMes['nombre'] ?? 'Sin especificar';

        if ($promo->cDia == 'Sin especificar' || $promo->cMes == 'Sin especificar' || $promo->cSemana == 'Sin especificar') {
            $promo->cDia = $request->cDia ?? 'Sin especificar';
            $promo->cSemana = $request->cSemana ?? 'Sin especificar';
            $promo->cMes = $request->cMes ?? 'Sin especificar';
        }

        $diaR = $request->dsemana?$request->dsemana['id'] : 0;
        $semanaR = $request->semana?$request->semana['id'] : 0;
        $mesR = $request->mes ?$request->mes['id'] : 0;


        $semana->id_entidad = $semanaR;
        $mes->id_entidad = $mesR;
        $dia->id_entidad = $diaR;




        $dia->save();
        $semana->save();
        $mes->save();
        $promo->save();

        //Guardo Criterios
        //Si criterio es Fecha
        /*if ($criterio == 1) {

            // Guardo Dia
            if ($dsemana) {
                $dia = V2PromoDia::create([
                    'id_promo' => $promo->id,
                    'id_entidad' => $dsemana['id']
                ]);
                $dia->save();
            }
            //Guardo Semana

            if ($semana) {
                $ofsemana = V2PromoSemana::create([
                    'id_promo' => $promo->id,
                    'id_entidad' => $semana['id']
                ]);
                $ofsemana->save();
            }

            //Guardo Mes
            if ($mes) {
                $ofmes = V2PromoMes::create([
                    'id_promo' => $promo->id,
                    'id_entidad' => $mes['id']
                ]);
                $ofmes->save();
            }
        }
        */



        //Si criterio es Usuario
        if ($criterio == 2) {

            //Gurado Usuario Pueden ser varios
            if ($usuario) {
                foreach ($usuario as $user) {

                    $ofuser = V2PromoUsuario::create([
                        'id_promo' => $promo->id,
                        'id_entidad' => $user['id']
                    ]);

                    $ofuser->save();
                }
            }

            //Guardo TipoPersona

            if ($tipo_usuario) {
                $tipo_user = V2PromoTipoUsuario::create([
                    'id_promo' => $promo->id,
                    'id_entidad' => $tipo_usuario['id']
                ]);

                $tipo_user->save();
            }
        }

        //Guardo el producto de la oferta @TODO aceptar multiples productos

        $products = V2PromoProducto::create([
            'id_promo' => $promo->id,
            'id_producto' => $productos['id'],
            'descuento' => $descuento_gral,
            'cantidad' => 1

        ]);

        $products->save();

        if($request->notificar) {
            $not = new NotificationQueue();
            $not->promoID = (int)($promo->id);
            $not->save();
        }
        return $this->showMessage('¡Oferta creada exitosamente!');
    }

    public function update(Request $request)
    {

        // valida formulario
        $rules = [
            'codigo' => 'required|min:4',
            'nombre' => 'required|min:4',
            'desde' => 'required',
            'hasta' => 'required',
            'descripcion' => 'required|min:4',
            'descuento_gral' => 'required',
        ];
        $msg = [
            'codigo' => 'El campo codigo es obligatorio y tener al menos 4 caracteres',
            'nombre' => 'El campo nombre  es obligatorio tener al menos 4 caracteres',
            'desde' => 'El campo desde  es obligatorio',
            'hasta' => 'El campo hasta  es obligatorio',
            'descripcion' => 'El campo descripcion  es obligatorio tener al menos 4 caracteres',
            'descuento_gral' => 'El campo descuento_gral  es obligatorio',

        ];

        $this->validate($request, $rules, $msg);


        //Obtengo promo a editar
        $promo = V2Promos::find($request->id);

        //Obtengo promo del request para evitar inyeccion
        if(!$promo)
        {
            return  $this->showError('No se encontro promocion a editar');
        }


        //Evaluo Criterios y busco por el id_promo para el que deba editar

        if($request->mes)
        {

            V2PromoMes::updateOrCreate([
                'id_promo' => $promo->id],
                ['id_entidad' => $request->mes['id']]
            );


        }
        if($request->dsemana){
            V2PromoDia::updateOrCreate([
                'id_promo' => $promo->id],
                ['id_entidad' => $request->dsemana['id']]
            );
        }
        if($request->semana){
            V2PromoSemana::updateOrCreate([
                'id_promo' => $promo->id],
                ['id_entidad' => $request->semana['id']]
            );
        }
        if($request->producto){

            V2PromoProducto::updateOrCreate([
                'id_promo' => $promo->id],
                ['id_producto' => $request->producto['id'],'descuento' => $request->descuento_gral]
            );
        }


        $usuario = $request->usuario;
        $tipo_usuario = $request->tipo_usuario;


        if ($request->id_tipo_criterio == 2) {
            if($request->usuario) {
                //borro los usuarios y los vuelvo a asignar o sea no hago update
                V2PromoUsuario::destroy($promo->id);
                $ids = array_column($request->usuario,'id');
                $data = $this->mergeUsers($ids,$promo->id);
                V2PromoUsuario::insert($data);


            }

            if($request->tipo_usuario){
                V2PromoTipoUsuario::updateOrCreate([
                    'id_promo' => $promo->id],
                    ['id_entidad' => $request->tipo_usuario['id']]
                );
            }

        }

        //Ejecuto destroy:ofertas al vencerse la fecha de la oferta
        $hoy = Carbon::today();
        if($request->hasta < $hoy){
            DestroyOfertas::handle();
        }

        //Guardo cambios en la promoción
        $promo->nombre = $request->nombre;
        $promo->desde = $request->desde;
        $promo->hasta = $request->hasta;
        $promo->descripcion = $request->descripcion;
        $promo->descuento_gral = $request->descuento_gral;
        $promo->puntos = $request->puntos;
        $promo->ultima_compra = $request->ultima_compra;
        $promo->save();

        if($request->notificar){
            //Inserto promo en notificacion app
            $not = new NotificationQueue();
            $not->promoID = (int)($promo->id);
            $not->save();
        }

        return  $this->showMessage('¡Oferta editada exitosamente!');
    }

    public function mergeUsers($ids,$idpromo){
       foreach($ids as $id)
       {
           $res[]=[
               'id_promo'=>$idpromo,
               'id_entidad'=>$id,
               'created_at'=>now(),
               'updated_at'=>now()
           ];
       }
       return $res;
    }

    public function destroy(Request $request)
    {
        // dd();

        $promo = V2Promos::findOrFail($request->id);

        // || Check if there's an offer on user's basket correspondent to this promo id
        $basket = Basket::query()->where('combo_id','=',$promo->id)->with('combo')->get();

        if($basket)
        {
            foreach ($basket as $item) {

                //Creamos un registro con el articulo que se borro de la oferta
                Basket::create(
                    [
                        'producto_id' => $item->combo->producto,
                        'quantity' => $item->quantity,
                        'cliente_id' => $item->cliente_id,

                    ]
                );

                $item->delete();
            }
        }

        /*
        $productos = Auth::user()->basket()->productos()->get();
        dd($productos);
        foreach($productos as $p) {
            if($p->id == $request->id) {
                $p->delete();
            }
        }*/

        $promo->dias()->delete();
        $promo->semana()->delete();
        $promo->mes()->delete();
        $promo->promousuarios()->delete();
        $promo->tipo_usuario()->delete();
        $promo->productos()->delete();
        $promo->delete();

        return  $this->showMessage('¡Oferta eliminada exitosamente!');
    }

    /*
    private function send_fcm(V2Promos $promo, $test = false)
    {

        if($test == true)
        {
            $fb_users[] = FirebaseUserToken::where('user_id','=',254)->first();

        }  else {
            $fb_users = FirebaseUserToken::all('token')->toArray();
        }

        if($fb_users && is_array($fb_users) )
        {
            foreach ($fb_users as $fbtoken)
            {
                $recipients[]= $fbtoken['token'];
            }
        } else{
            $recipients[]=$fb_users->token;
        }

    }
*/

    public function getNewId()
    {
        if ($promos = count(V2Promos::all()) >= 1) {
            return DB::table('v2_promos')->orderBy('updated_at', 'desc')->first()->id+1;
        }
        return 0;
    }

    public function isOffer(Request $req)
    {
        if ($prom = V2PromoProducto::where('id_producto', (int)($req->id))->first()) {
            return response()->json([
                'data' => V2Promos::where('id', $prom->id_promo)->first(),
            ]);
        }
        return 'No encontrado';
    }


    public function monthToCode($mes)
    {
        if ($mes) {
            $ret = 0;
            switch ($mes) {
                case 'Enero': {
                        $ret = 1;
                        return $ret;
                    }
                case 'Febrero': {
                        $ret = 2;
                        return $ret;
                    }
                case "Marzo": {
                        $ret = 3;
                        return $ret;
                    }
                case 'Abril': {
                        $ret = 4;
                        return $ret;
                    }
                case 'Mayo': {
                        $ret = 5;
                        return $ret;
                    }
                case 'Junio
                ': {
                        $ret = 6;
                        return $ret;
                    }
                case 'Julio': {
                        $ret = 7;
                        return $ret;
                    }
                case 'Agosto': {
                        $ret = 8;
                        return $ret;
                    }
                case 'Septiembre': {
                        $ret = 9;
                        return $ret;
                    }
                case 'Octubre': {
                        $ret = 10;
                        return $ret;
                    }
                case 'Noviembre': {
                        $ret = 11;
                        return $ret;
                    }
                case 'Diciembre': {
                        $ret = 12;
                        return $ret;
                    }
                case 'Sin Especificar': {
                        $ret = 13;
                        return $ret;
                    }
            }
        }
    }
    public function weekToCode($semana)
    {
        if ($semana) {
            $ret = 0;
            switch ($semana) {
                case 'Primera': {
                        $ret = 1;
                        return $ret;
                    }
                case 'Segunda': {
                        $ret = 2;
                        return $ret;
                    }
                case 'Tercera': {
                        $ret = 3;
                        return $ret;
                    }
                case 'Cuarta': {
                        $ret = 4;
                        return $ret;
                    }
                case 'Quinta': {
                        $ret = 5;
                        return $ret;
                    }
                case 'Sexta': {
                        $ret = 6;
                        return $ret;
                    }
                case 'Sin especificar': {
                        $ret = 7;
                        return $ret;
                    }
            }
        }
    }

    public function dayToCode($dia)
    {
        if ($dia) {
            $ret = 0;
            switch ($dia) {
                case 'Domingo': {
                        $ret = 1;
                        return $ret;
                    }
                case 'Lunes': {
                        $ret = 2;
                        return $ret;
                    }
                case 'Martes': {
                        $ret = 3;
                        return $ret;
                    }
                case 'Miercoles': {
                        $ret = 4;
                        return $ret;
                    }
                case 'Jueves': {
                        $ret = 5;
                        return $ret;
                    }
                case 'Viernes': {
                        $ret = 6;
                        return $ret;
                    }
                case 'Sabado': {
                        $ret = 7;
                        return $ret;
                    }
                case 'Sin especificar': {
                        $ret = 8;
                        return $ret;
                    }
            }
        }
    }
}
