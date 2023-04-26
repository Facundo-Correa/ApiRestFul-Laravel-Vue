<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('consulta_tecnicas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id')->unsigned();
            $table->integer('id_marca')->unsigned();
            $table->integer('id_modelo')->unsigned();
            $table->integer('id_tipo_parte')->unsigned();
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_marca', 'marca_fk')->references('id')->on('marcas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_modelo', 'modelo_fk')->references('id')->on('modelos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_tipo_parte', 'tparte_fk')->references('id')->on('consulta_codigos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::dropIfExists('consulta_tecnicas');
    }
}
