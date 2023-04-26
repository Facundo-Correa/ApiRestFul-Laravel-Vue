<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPedidosAPlataforma extends Model
{
    protected $fillable = ['pedido_id', 'fecha', 'request'];

    public $table = 'log_pedidos_a_plataforma';

    protected $hidden = [];

    public function pedido()
    {
        return $this->belongsTo('App\Pedidos');
    }
}
