<?php

namespace App;

use Laravel\Passport\HasApiTokens;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Traits\ApiTokensModifier;
use App\Traits\HasVerification;
use App\Presupuestos;
use Illuminate\Database\Eloquent\SoftDeletes;

//RENAME TABLE `databasepoa`.`cuotassimpagas` TO `databasepoa`.`cuotasimpagas`;


class User extends Authenticatable
{
    use ApiTokensModifier, Notifiable, HasVerification, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'activado',
        'persona_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'total_puntos'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //sorry fundamentalistas del codigo, pero el metodo de abajo no se donde impacta y necesito su nombre
    public function person()
    {
        return $this->belongsTo(Personas::class,'persona_id', 'id');
    }

    public function getPersona() {
        return $this->hasOne(Personas::class, 'id', 'id')->first();
    }

    public function persona()
    {
        return $this->belongsTo('App\Personas')->with('domicilios');
    }
    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'cliente_id', 'id');
    }
    public function wishlist()
    {
        return $this->hasMany(WishlistProductos::class);
    }
    public function favoritos()
    {
        return $this->hasMany(FavoritosProductos::class);
    }
    public function basket()
    {
        return $this->hasMany(Basket::class, 'cliente_id', 'id');
    }
    public function puntos()
    {
        return $this->hasMany(PuntosUsuario::class);
    }
    public function seguimiento()
    {
        return $this->hasMany(Seguimientos::class);
    }

    public function firebase()
    {
        return $this->belongsTo(FirebaseUserToken::class,'user_id', 'id');
    }

    public function alertas()
    {
        return $this->hasMany(AlertaProductoUsuario::class,'user_id', 'id');
    }

    public function isSuperAdmin()
    {
        return $this->role == 'super_admin';
    }
    public function isComercio()
    {
        return $this->role == 'comercio';
    }
    public function isAdmin()
    {
        return $this->role == 'admin';
    }
    public function isFacturador()
    {
        return $this->role == 'facturador';
    }
    public function isUser()
    {
        return $this->role == 'user';
    }

    public function isMoroso()
    {
        $persona = $this->persona;
        return $persona->status_id == 4;
    }

    public function totalUltimaCompra()
    {
        $uc = $this->pedidos()
            ->orderBy('id_pedido', 'desc')
            ->first();

        return $uc ? $uc->total : 0;
    }

    public function getTotalPuntosAttribute()
    {
        return $this->puntos()
            ->where('fecha_hasta', '>=', Carbon::today()->format('Y-m-d'))
            ->sum('puntos');
    }

    public function notificaciones()
    {
      return $this->alertas()->where('notificacion','=',1);

    }
    public function presupuestos()
    {   
        return $this->hasMany(Presupuestos::class, 'usuario_id', 'id');
    }
}
