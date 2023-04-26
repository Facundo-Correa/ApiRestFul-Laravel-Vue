<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaniasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campanias', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_seccion');
			$table->integer('id_tipo');
			$table->integer('id_promocion')->nullable()->index('campanias_FI_3');
			$table->integer('id_oferta')->nullable()->index('campanias_FI_4');
			$table->string('titulo', 50);
			$table->string('descripcion', 200);
			$table->string('imagen', 200);
			$table->integer('estado');
			$table->dateTime('fecha_desde');
			$table->dateTime('fecha_hasta');
			$table->integer('clics');
			$table->integer('impresiones');
			$table->string('tag_marcas', 250)->nullable();
			$table->string('tag_modelos', 250)->nullable();
			$table->string('tag_partes', 250)->nullable();
			$table->string('excluir_productos', 250)->nullable();
			$table->dateTime('fecha_alta');
			$table->dateTime('fecha_modificacion')->nullable();
			$table->integer('id_usuario_alta')->index('campanias_FI_1');
			$table->integer('id_usuario_modificacion')->nullable()->index('campanias_FI_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campanias');
	}

}
