<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('marca_id')->references('id')->on('marcas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('estado_id')->references('id')->on('estados_productos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('parte_id')->references('id')->on('partes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('modelo_id')->references('id')->on('modelos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('origen_id')->references('id')->on('origen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_marca_id_foreign');
            $table->dropForeign('productos_estado_id_foreign');
            $table->dropForeign('productos_parte_id_foreign');
            $table->dropForeign('productos_modelo_id_foreign');
            $table->dropForeign('productos_origen_id_foreign');
            $table->dropForeign('productos_proveedor_id_foreign');
        });
    }
}
