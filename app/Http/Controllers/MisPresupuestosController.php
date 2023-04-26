<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Producto;
use App\MisCompras;
use App\Pedidos;
use App\Presupuestos;
use App\PresupuestosProductos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarPresupuesto;

class MisPresupuestosController extends Controller
{
    public function index(){
        // $hoy = Carbon::now(); //probando el carbon, se puede borrar lo comentado
        // dd($hoy->format('d-m-Y\ H:i'));
        $consulta = Auth::user()->presupuestos()->with('presupuestoProducto')->get();
        //ordenamos de manera descendente los resultados, by id
        $presu = $consulta->sortByDesc('id')->values();
        return $this->showAll($presu);
    }

    public function presupuestoProducto(Request $request){
        $producto = PresupuestosProductos::where('presupuesto_id','=',$request->id)->get();
        return $this->showAll($producto);
    }

    public function borrarPresupuesto (Request $req){
        $id = $req->id;
        $borrarPresupuestos = Presupuestos::where('id', $id)->delete();
        $borrarProductoPresupuesto = PresupuestosProductos::where('presupuesto_id',$id)->delete();
    }

    public function enviarMail(Request $request)
    {
        $consulta = Auth::user();//1547
        $userId = $consulta->id;
        $destinatario = Presupuestos::where('id',$request->id)->first();
        $presupuestoProducto = PresupuestosProductos::where('presupuesto_id', $request->id)->get();
        
        $cantidades = []; $nombres = []; $precios = []; $total = [];

        for($i=0; $i<count($presupuestoProducto); $i++)
        {
            $cantidades[$i] = $presupuestoProducto[$i]->cantidad_producto;
            $nombre = Producto::where('id',$presupuestoProducto[$i]->producto_id)->get();
            $nombres[$i] = $nombre[0]->nombre;
            $precios[$i] = ($presupuestoProducto[$i]->precio_producto)*1.21;
            $total[$i] = $cantidades[$i] * $precios[$i];
        }
        
        $producto = json_decode($presupuestoProducto);
        $objeto = [];

        for($i = 0; $i < count($presupuestoProducto); $i++)
        {
            $prod = $producto[$i];
            $prod->nombre_producto = $nombres[$i];
            $objeto[$i] = $prod;
        }

        $aQuien = $destinatario->nombre_destinatario;
        $presentacion = 'Soy '.$request->minombre.' '.$request->miapellido.' de la empresa '.$request->miempresa.'.';
        $subtotal = round($request->total, 2);
        $iva = round($subtotal*0.21, 2);
        $total = round($subtotal*1.21, 2);
        $mail = $destinatario->email_destinatario;

        //dd($objeto);
        Mail::to($mail)->send(new EnviarPresupuesto($aQuien, $presentacion, $subtotal, $iva, $total, $objeto, $mail));
    }

    public function compras(Request $request)
    {
        $id = []; $nombre = []; $precio = []; $cantidad = []; $umq = []; $puntos = []; $ahorro = []; $totalP = [];
        for($i=0; $i<count($request->rows); $i++){
            
            $id[$i] = $request->rows[$i]["id"];
            $nombre[$i] = $request->rows[$i]["nombre"];
            $precio[$i] = $request->rows[$i]["precio"];
            $cantidad[$i] = $request->rows[$i]["cantidad"];
            $umq[$i] = $request->rows[$i]["umq"];
            $puntos[$i] = $request->rows[$i]["puntos"];
            $ahorro[$i] = $request->rows[$i]["ahorro"];
            $totalP[$i] = ($request->rows[$i]["precio"])*($request->rows[$i]["cantidad"])*($request->rows[$i]["umq"]);
            
            $misCompras = MisCompras::create([
                'compra_id'=>$id[$i],
                'nombre'=>$nombre[$i],
                'precio'=>$precio[$i],
                'cantidad'=>$cantidad[$i],
                'umq'=>$umq[$i],
                'puntos'=>$puntos[$i],
                'ahorros'=>$ahorro[$i],
                'total_producto'=>$totalP[$i],
                'iva'=>$request->iva,
                'numero_pedido'=>$request->n_pedido,
                'subtotal'=>$request->subtotal,
                'total'=>$request->total,
                'fecha'=>$request->fecha
            ]);

            $misCompras->save();
        }
        
    }

    public function miscompras()
    {
        $consulta = Auth::user();
        $userId = $consulta->id;
        $miscompras = Pedidos::where('cliente_id','=',$userId)->with('productos')->get();
        return $this->showAll($miscompras);
    }
}
