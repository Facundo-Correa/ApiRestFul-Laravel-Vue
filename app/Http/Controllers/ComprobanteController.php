<?php

namespace App\Http\Controllers;

use App\Comprobantes;
use App\Mail\ComprobanteMail;
use App\Mail\ComprobanteMailable;
use App\Personas;
use App\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ComprobanteController extends Controller
{
    public function get(Request $request)
    {
        
        $comp = Comprobantes::orderBy($request->options['column'], $request->options['dir'])->get();
        if($request->options['column']  == 'Year')
            $comp = Comprobantes::orderBy('updated_at', $request->options['dir'])->get();
        if($request->options['search'] != ""){
            $comp = Comprobantes::where('Plattform', 'LIKE', '%' . $request->options['search'] . '%')
            ->orWhere('Email', 'LIKE', '%' . $request->options['search'] . '%')
            ->orWhere('Year', 'LIKE', '%' . $request->options['search'] . '%')
            ->orWhere('id', 'LIKE', '%' . $request->options['search'] . '%')
            ->orderBy($request->options['column'], $request->options['dir'])->get();
        }
        $return = [];
        
        foreach($comp as $cmp){
            $User = Personas::where('id', User::where('email', $cmp->Email)->get()->first()->id)->get()->first();
            $c = [
                'ID' => $cmp->id,
                'Name' => $User->nombre . ' ' . $User->apellido,
                'Year' => $cmp->Year . '/' . $cmp->Month . '/' . $cmp->Day,
                'Plattform' => $cmp->Plattform,
            ];
            array_push($return, $c);
        }

        return response()->json([
            'data' => $return
        ]);
    }

    public function save(Request $request)
    {
        $comprobante = new Comprobantes();

        $email = $request->email;
        $bitmap = $request->bitmap;
        //$plataforma = Personas::where('id', User::where('email', $email)->get()->first()->id)->get()->first()->n_plataforma;

        
        $plataforma = User::where('email', $email)->first()->getPersona()->n_plataforma;

        $fecha = $this->getFecha();

        $savePath = 'comprobantes/';
        $this->checkDir($savePath);

        $savePath = 'comprobantes/' . $fecha[0] . '/';
        $this->checkDir($savePath);

        $savePath = 'comprobantes/' . $fecha[0] . '/' . $plataforma . '/';
        $this->checkDir($savePath);

        // 11-02-2022 jscavino@trememote.com.ar - 11hs 52min
        //$filename = $fecha[0] . '-' . $fecha[1] . '-' . $fecha[2] . '_' . $plataforma . '_' . $fecha[3] . 'hs_' . $fecha[4] . 'min' . '.jpeg';

        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $filename = "comprobante_" . $plataforma . '_' . $timestamp . '.jpg';

        // || Creacion del archivo
        $file = fopen($savePath . $filename, 'w');
        fclose($file);
        // || Fin creacion

        // || Escritura del contenido
        try {
            file_put_contents($savePath . $filename, base64_decode($bitmap));
        } catch (Exception $e) {
            dd('Error en la escritura del comprobante: ' . $e);
        }
        // || Fin escritura

        // || Guardado en la base de datos
        $comprobante->Name = $filename;
        $comprobante->Year = $fecha[0];
        $comprobante->Month = $fecha[1];
        $comprobante->Day = $fecha[2];
        $comprobante->Hour = $fecha[3];
        $comprobante->Minute = $fecha[4];
        $comprobante->Plattform = $plataforma;
        $comprobante->Email = $email;
        $comprobante->Href = $savePath . $filename;
        $comprobante->save();
    }

    public function send(Request $request)
    {

        // || Emisión del comprobante a la dirección indicada || //
        $user = Personas::where('id', User::where('email', Comprobantes::where('id', $request->id)->get()->first()->Email)->get()->first()->id)->get()->first()->nombre;
        
        $email = Comprobantes::where('id', $request->id)->first()->Email;
        $user = User::where('email', $email)->first()->getPersona()->nombre;
        

        $email = $request->email;

        $comprobante_path = Comprobantes::where('id', $request->id)->get()->first()->Href;

        $title = '| Comprobante de Pago | MLRepuestos';
        //$msg = 'Comprobante de pago | ' . $user . ' | http://localhost:8000' . $comprobante_path;

        $details = [
            'title' => $title,
            'name' => $user,
            // || Cambiar esto por produccion || //
            'link' => 'https://mlrepuestos.com.ar/descargar/',
            'id' => $request->id
        ];

        Mail::to($email)->send(new ComprobanteMail($details));
    }

    private function getFecha()
    {

        $año = date('Y');
        $mes = date('n');
        $dia = date('d');
        $hora = date('G');
        $minuto = date('i');

        $retorno = [$año, $mes, $dia, $hora, $minuto];
        return $retorno;
    }

    private function checkDir($direction)
    {
        // || Si el directorio no existe, crearlo || //
        if (!is_dir($direction)) {
            mkdir($direction, 0777);
        }
    }

    public function years()
    {
        $files = array();
        if (is_dir('comprobantes/')) {
            $files = scandir('comprobantes/');
        }
        $ret = [' '];
        foreach ($files as $file) {
            if ($file != "." && $file != '..') {
                array_push($ret, $file);
            }
        }
        return response()->json([
            'data' => $ret
        ], 200);
    }

    public function getAll()
    {
        $comp = Comprobantes::all();
        $comp = DB::table('comprobantes as C')->orderBy('id', 'desc')->get();

        $return = [];

        foreach($comp as $cmp){
            //$User = Personas::where('id', User::where('email',)->get()->first()->id)->get()->first();
            $User = User::where('email',  $cmp->Email)->first()->getPersona();
            
            $c = [
                'ID' => $cmp->id,
                'Name' => $User->nombre . ' ' . $User->apellido,
                'Year' => $cmp->Year,
                'Plattform' => $cmp->Plattform,
            ];
            array_push($return, $c);
        }
        return response()->json([
            'data' => $return
        ]);
    }

    public function delete (Request $req){
        $ids = $req->ids;

        foreach($ids as $id){
            // || Delete from DataBase and Folder
            $comprobante = Comprobantes::where('id', $id)->get()->first();
            $file = $comprobante->Href;
            try {
                unlink($file);
                $comprobante->delete();
            }
            catch(Exception $e){
                return $e;
            }
        }
    }

}
