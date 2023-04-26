<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsTecnicaArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cons_tecnica_articulos', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('id_consulta_tecnica')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->timestamps();
            $table->foreign('id_consulta_tecnica', 'consulta_tecnica_fk')->references('id')->on('consulta_tecnicas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_articulo', 'productos_fk')->references('id')->on('productos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::dropIfExists('cons_tecnica_articulos');
    }
}
