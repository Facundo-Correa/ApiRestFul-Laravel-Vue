<?php

namespace App;

use App\Traits\ApiTokensModifier;
use App\Traits\HasVerification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Personas extends Model
{
    use ApiTokensModifier, Notifiable, HasVerification, SoftDeletes;

    protected $fillable = [
        'nombre',
        'apellido',
        'empresa',
        'cuit',
        'phone',
        'telefono',
        'n_plataforma',
        'parent_person',
        'newsletter_mail',
        'ofertas_mail',
        'terminos',
        'nacimiento',
        'descuento_comercial',
        'tipo_persona_id',
        'status_id'
    ];

    public function tipo_persona(){
        return $this->belongsTo(TipoPersona::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function domicilios(){
        return $this->hasMany(Domicilios::class, 'persona_id');
    }

    public function users(){
        return $this->hasMany(User::class, 'persona_id');
    }

}
