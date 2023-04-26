<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos',function($table) {
            $table->dropColumn('descuentos');
            $table->text('direccion_envio')->nullable();
            $table->integer('tipo_envio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos',function($table) {
			$table->text('descuentos', 65535);
            $table->dropColumn('direccion_envio');
            $table->dropColumn('tipo_envio');
        });
    }
}
