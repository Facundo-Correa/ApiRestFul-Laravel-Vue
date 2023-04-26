<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPedidosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_productos', function($table) {
            $table->dropForeign('pedidos_productos_user_id_foreign');
            $table->dropColumn('user_id');

            $table->unsignedInteger('producto_id');
            $table->float('precio')->change();
            $table->integer('cantidad');

            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_productos', function($table) {            
            $table->dropForeign('pedidos_productos_producto_id_foreign');

            $table->dropColumn('producto_id');
            $table->double('precio',65,2)->change();
            $table->dropColumn('cantidad');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
