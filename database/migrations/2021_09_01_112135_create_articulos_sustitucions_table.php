<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosSustitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('articulos_sustitucions', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->integer('id_sustitucion')->unsigned();
            $table->timestamps();

            $table->foreign('id_articulo', 'productos_articulos_fk')->references('id')->on('productos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_sustitucion', 'productos_sustitucion_fk')->references('id')->on('productos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_sustitucions');
    }
}
