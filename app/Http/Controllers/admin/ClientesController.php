<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Personas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller
{
    public function getClientes()
    {
        return $this->showAll(User::with('persona')->get());
    }

    public function changeStatus($cliente_id)
    {
        $user = User::with('persona')->where("persona_id", $cliente_id)->first();
        // dd($user->persona->status_id);
        if($user->persona->status_id == 1){
            $user->persona->status_id = 4;
            $user->persona->save();
            return $this->showMessage('¡Cliente deshabilitado exitosamente!');
        }
        $user->persona->status_id = 1;
        $user->persona->save();

        return $this->showMessage('¡Cliente habilitado exitosamente!');
    }

    public function editClient($id, $n_plataforma)
    {
        $user = User::with('persona')->where("persona_id", $id)->first();

        $user->persona->n_plataforma = $n_plataforma;
        $user->persona->save();

        //User::join('personas', 'users.persona_id', '=', 'personas.id')
        //  ->where('personas.id', '=', $id)
        //->update(['personas.n_plataforma' => $n_plataforma]);

        return $this->showMessage('¡Cliente modificado exitosamente!');

    }

    public function filterCLient(Request $request)
    {   
        if ($request->id != null){
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.id', '=', $request->id)
                ->get();
            }

        if ($request->n_plataforma != null){
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.n_plataforma', '=', $request->n_plataforma)
                ->get();
        }

        if ($request->nombre != null){
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.nombre', 'like', $request->nombre . '%')
                ->orWhere('personas.apellido', 'like', $request->nombre . '%')
                ->get();
        }

        if ($request->email != null){
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('users.email', 'like', $request->email . '%')
                ->get();
        }

        if ($request->status_id != null){
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.status_id', '=', $request->status_id)
                ->get();
        }

        if (!$users){
            $users = $this->showAll(User::all()->load([
                'persona',
            ]));
        }
        return $this->showAll($users);
    }

    public function search(Request $request){


        if ($request->name){
            $clientes = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.nombre', 'like', $request->name . '%')
                ->orWhere('personas.apellido', 'like', $request->name . '%')
                ->get();
        }

        if ($request->email){
            $clientes = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('users.email', 'like', $request->email . '%')
                ->get();
        }

        if ($request->id){
            $clientes = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.id', '=', $request->id)
                ->get();
        }

        if ($request->n_plataforma){
            $clientes = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.n_plataforma', '=', $request->n_plataforma)
                ->get();
        }

        if ($request->status_id){
            $clientes = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.status_id', '=', $request->status_id)
                ->get();
        }

        if(!isset($clientes)){
            $clientes = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->get();
        }

        /*return view('admin.components.clientes.clientes')->with('clientes', $clientes);*/

        return json_encode($clientes);
    }

    public function updateStatus($id){

        $user = User::with('persona')->where("persona_id", $id)->first();
        $user->persona->status_id = 1;
        $user->persona->save();

        return redirect('/admin/adminclientes/search?name=&email=&id=' . $id . '&n_plataforma=');
    }

    public function destroy($id)
    {
        $user = User::with('persona')->where("persona_id", $id)->first();
        $user->persona->delete();
        $user->delete();
        return $this->showMessage('Usuario Eliminado con exito');
    }


    public function busqueda(Request $request)
    {

        //pasamos el query del input a la busqueda
        $listado = $users = User::select('*')
            ->join('personas', 'users.persona_id', '=', 'personas.id')
            ->where('personas.nombre', 'LIKE', '%'.$request->nombre.'%')
            ->get()
            ->map(function ($x) {
                return [
                    'id' => $x->id,
                    'descripcion' => $x->id . ' | ' . $x->nombre.', '. $x->apellido,
                ];
            });

        return $this->showMessage($listado);
    }
}
