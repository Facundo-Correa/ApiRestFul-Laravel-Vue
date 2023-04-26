<?php

namespace App\Http\Controllers;

use App\NewsletterGuests;
use App\Newsletters;
use App\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class NewslettersController extends Controller
{
    public function index()
    {
        return $this->showAll(Newsletters::all());
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $newsletter = Newsletters::create([
                'asunto'=> $request->asunto,
                'mensaje'=> $request->mensaje,
                'fecha'=> $request->fecha,
                'perfil'=> $request->perfil,
                'link'=> $request->link,
            ]);

        } catch(\Exception $e) {
            DB::rollBack();
            if (env('APP_DEBUG'))
                dd($e);

            return $this->errorResponse('Ha occurrido un error inesperado, intente luego nuevamente',500);
        }

        DB::commit();

        return $this->showMessage('Newsletter creado con exito!');
    }

    public function show(Newsletters $newsletters)
    {
        //
    }

    public function busqueda( Request $request ){

        $newsletter = (new Newsletters())->newQuery();

        if ($request->asunto != null){
            $newsletter = $newsletter->where('asunto','LIKE','%'.$request->asunto.'%');
        }

        if ($request->fecha != null){
            $newsletter = $newsletter->where('fecha', $request->fecha);
        }

        $newsletter = $newsletter->get();

        return $this->showAll($newsletter);
    }

    public function update(Request $request, Newsletters $newsletter){

        if ($request->asunto != $newsletter->asunto)
            $newsletter->asunto = $request->asunto;

        if ($request->mensaje != $newsletter->mensaje)
            $newsletter->mensaje = $request->mensaje;

        if ($request->link != $newsletter->link)
            $newsletter->link = $request->link;
        if ($request->perfil != $newsletter->perfil)
            $newsletter->perfil = $request->perfil;

        if ($request->fecha != $newsletter->fecha)
            $newsletter->fecha = $request->fecha;

        $newsletter->save();

        return $this->showMessage('Newsletter modificado con exito!');
    }

    public function destroy(Newsletters $newsletter)
    {
        $newsletter->delete();

        return $this->showMessage('Newsletter eliminado!');
    }

    public function addGuest($mail){
        if ($mail != null){
            NewsletterGuests::create([
                'email'=>$mail,
                'newsletter_mail'=>1
            ]);

            return $this->showMessage('Subscripción exitosa!');
        }else{
            return $this->showMessage('Debe ingresar un email valido');
        }
    }

    public function addUser(Personas $persona_id){
        if ($persona_id){
            if ($persona_id->newsletter_mail != 1){
                $persona_id->newsletter_mail = 1;

                $persona_id->save();
                return $this->showMessage('Subscripción exitosa!');
            }else{
                return $this->showMessage('Ya se encuentra subscripto!');
            }
        }else{
            return $this->showMessage('Hubo un error, intente nuevamente mas tarde');
        }
    }
}
