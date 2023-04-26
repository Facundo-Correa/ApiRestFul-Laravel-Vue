<?php

namespace App\Http\Controllers;
use App\User;
use App\Personas;
use App\Domicilios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiPerfilController extends Controller
{
    public function index(){

    }

    public function update(Request $request){

        $user = Auth::user();
        $personas = Personas::findOrFail($user->persona_id);
        $domicilio = Domicilios::findOrFail($user->id);

        if($request->email != null){
            $user->update([
                'email'=>$request->email
            ]);
        }
        if($request->password != null){
            $user->update([
                'password' => md5($request->password),
            ]);
        }
        if($request->nombre != null){
            $personas->update([
                'nombre' => $request->nombre
            ]);
            $user->update([
                'name' => $request->nombre . " " . $request->apellido,
            ]);
        }
        if($request->apellido != null){
            $personas->update([
                'apellido'=>$request->apellido
            ]);
            $user->update([
                'name' => $request->nombre . " " . $request->apellido,
            ]);
        }
        if($request->empresa != null){
            $personas->update([
                'empresa'=>$request->empresa
            ]);
            $domicilio->update([
                'nombre'=>$request->empresa
            ]);
        }
        if($request->cuit != null){
            $personas->update([
                'cuit'=>$request->cuit
            ]);
        }
        if($request->telefono != null){
            $personas->update([
                'phone'=>$request->telefono,
                'telefono'=>$request->telefono,
            ]);
        }
        if($request->direccion != null){
            $domicilio->update([
                'direccion'=>$request->direccion
            ]);
        }
        $personas->save();
    }
}
