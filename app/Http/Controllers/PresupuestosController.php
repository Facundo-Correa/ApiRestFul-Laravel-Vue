<?php

namespace App\Http\Controllers;
use App\Presupuestos;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class PresupuestosController extends Controller
{

    public function store(Request $request){

        $user = Auth::user();
        $hoy = Carbon::now();
        $presupuesto = Presupuestos::create([
            'usuario_id'=>$user->id,
            'nombre_destinatario' => $request->nombre,
            'email_destinatario' => $request->email,
            'telefono_destinatario' => $request->telefono,
            'margen_destinatario' => $request->margen,
            'estado'=>0,
            'fecha'=> $hoy->format('d-m-Y H:i')
        ]);

        $presupuesto->save();

    }

    public function editM(Request $request)
    {
        $edit = Presupuestos::where('id','=',$request->id)->get();
        
        if($edit[0]->estado == "0"){
            $edit[0]->update([
                'estado'=>"1"
            ]);
        }
        if($edit[0]->estado == "2"){
            $edit[0]->update([
                'estado'=>"3"
            ]);
        }
    }

    public function editW(Request $request)
    {
        $edit = Presupuestos::where('id','=',$request->id)->get();
        
        if($edit[0]->estado == "0"){
            $edit[0]->update([
                'estado'=>"2"
            ]);
        }
        if($edit[0]->estado == "1"){
            $edit[0]->update([
                'estado'=>"3"
            ]);
        }
    }
}
