<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class V2Promos extends Model
{
    //Este modelo se utiliza solo para la creación de promos, por ello carce de relaciones y getters
    //Para consultas revisar V2PromoVista

    protected $table = 'v2_promos';
    protected $primaryKey = 'id';
    protected $guarded =[];

    public function dias()
    {
        return $this->hasMany(V2PromoDia::class, 'id_promo', 'id') ;
    }

    public function semana()
    {
        return $this->hasMany(V2PromoSemana::class, 'id_promo', 'id');
    }

    public function mes()
    {
        return $this->hasMany(V2PromoMes::class, 'id_promo', 'id');
    }
    public function promoUsuarios()
    {
        return $this->hasMany(V2PromoUsuario::class, 'id_promo', 'id');
    }
    public function tipo_usuario()
    {
        return $this->hasMany(V2PromoTipoUsuario::class, 'id_promo', 'id');
    }

    public function productos()
    {
        return $this->hasMany(V2PromoProducto::class, 'id_promo', 'id');
    }

    // Usar estas funciones
    public function getNombreDia(){
        $nombre  = [];

        foreach ($this->dias()->get() as $dia)
        {
            switch ($dia->id_entidad){
                case 1: $nombre[] = 'Lunes'; break;
                case 2: $nombre[] = 'Martes'; break;
                case 3: $nombre[] = 'Miercoles'; break;
                case 4: $nombre[] = 'Jueves'; break;
                case 5: $nombre[] = 'Viernes'; break;
                case 6: $nombre[] = 'Sábado'; break;
                case 7: $nombre[] = 'Domingo'; break;
            }
        }

        return $nombre;
    }

    public function getSemana(){
        $nombre  = [];

        foreach ($this->semana()->get() as $semana)
        {
            switch ($semana->id_entidad){
                case 1: $nombre[] = 'Primer'; break;
                case 2: $nombre[] = 'Segunda'; break;
                case 3: $nombre[] = 'Tercera'; break;
                case 4: $nombre[] = 'Cuarta'; break;
                case 5: $nombre[] = 'Quinta'; break;
                case 6: $nombre[] = 'Sexta'; break;
            }
        }

        return $nombre;
    }

    public function getNombreMes(){
        $nombre  = null;

        foreach ($this->mes()->get() as $mes) {
            switch ($mes->id_entidad) {
                case 1:$nombre = 'Enero';break;
                case 2:$nombre = 'Febrero';break;
                case 3:$nombre = 'Marzo';break;
                case 4:$nombre = 'Abril';break;
                case 5:$nombre = 'Mayo';break;
                case 6:$nombre = 'Junio';break;
                case 7:$nombre = 'Julio';break;
                case 8:$nombre = 'Agosto';break;
                case 9:$nombre = 'Septiembre';break;
                case 10:$nombre = 'Octubre';break;
                case 11:$nombre = 'Noviembre';break;
                case 12:$nombre = 'Diciembre';break;
            }
        }

        return $nombre;
    }

    public function getUsuario()
    {
        $users = [];

        $promo_users =  $this->promoUsuarios()->get();

        foreach ($promo_users as $user)
        {
            $persona= $user->usuario->person;

            $users[] = $persona->nombre.",". $persona->apellido;
        }
        return $users;
    }

    public function getTipoUsuario()
    {
        $users = [];

        $tipo_usuario =  $this->tipo_usuario()->get();

        foreach ($tipo_usuario as $tuser)
        {
            $users[] = $tuser->tipo_persona->nombre;

        }
        return $users;
    }

    public function getProductos()
    {
        $products = [];

        $productos =  $this->productos()->get();

        foreach ($productos as $producto)
        {
            $product = $producto->product->nombre;
            $precio = $producto->product->precio_actual;

            $products[] = ['nombre'=>$product,'cantidad'=>$producto->cantidad,'precio'=>$precio,'image'=>$producto->product->image,'image_thumb'=>$producto->product->image_thumb];
        }

        return $products;

    }

    public function getAllRelations()
    {

        $this->relaciones =[
            'dias' => $this->getNombreDia(),
            'semanas' => $this->getSemana(),
            'meses' => $this->getNombreMes(),
            'usuarios' =>$this->getUsuario(),
            'tipo_usuarios' => $this->getTipoUsuario(),
            'productos' => $this->getProductos(),
        /*'marcas' => $this->marcas(),
            'modelos' => $this->modelos(),
            'origenes' => $this->origenes(),
            'partes' => $this->partes(),

            'regalos' => $this->regalos(),
            'proveedores' => $this->proveedores(),
            */
        ];
    }
}
