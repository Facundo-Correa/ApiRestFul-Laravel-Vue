<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class V2PromoTipoUsuario extends Model
{
    //
    protected $table = 'v2_promo_tipo_usuario';
    protected $primaryKey = 'id_promo';
    protected $guarded =[];


    public function tipo_persona()
    {
        return $this->belongsTo(TipoPersona::class,'id_entidad', 'id');
    }

}
