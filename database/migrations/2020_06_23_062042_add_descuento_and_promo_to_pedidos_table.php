<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescuentoAndPromoToPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_productos', function (Blueprint $table) {
            $table->float('descuento_porcentaje')->default(0);
            $table->string('promo_descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_productos', function (Blueprint $table) {
            $table->dropColumn('descuento_porcentaje');
            $table->dropColumn('promo_descripcion');
        });
    }
}
