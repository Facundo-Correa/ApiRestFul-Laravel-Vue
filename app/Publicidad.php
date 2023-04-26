<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'estado',
        'fecha_desde',
        'fecha_hasta',
        'clics',
        'impresiones',
        'tag_marcas',
        'tag_modelos',
        'tag_partes',
        'excluir_productos',
        'fecha_alta',
        'fecha_modificacion',
        'user_alta_id',
        'user_modif_id',
        'seccion_id',
        'tipo_publicidad_id',
        'promocion_id',
        'oferta_id',
    ];

    public function seccion() {
        return $this->belongsTo(Seccion::class);
    }

    public function tipoPublicidad() {
        return $this->belongsTo(tipoPublicidad::class);
    }

    public function promocion() {
        return $this->belongsTo(V2PromoVista::class);
    }

    public function oferta() {
        return $this->belongsTo(Ofertas::class);
    }
}
