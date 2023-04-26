<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('presupuesto_id');
            $table->integer('producto_id');
            $table->float('precio_producto');
            $table->integer('umq_producto');
            $table->integer('cantidad_producto');
            $table->float('total_producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos_productos');
    }
}
