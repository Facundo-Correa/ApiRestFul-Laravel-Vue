<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class V2PromoUsuario extends Model
{
    //
    protected $table = 'v2_promo_usuario';
    protected $primaryKey = 'id_promo';
    protected $guarded =[];

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_entidad', 'id');
    }
}
