<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicidadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publicidads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('oferta_id')->unsigned()->nullable()->index('publicidads_oferta_id_foreign');
			$table->string('titulo', 50);
			$table->string('descripcion', 200);
			$table->string('imagen', 200);
			$table->integer('estado');
			$table->dateTime('fecha_desde');
			$table->dateTime('fecha_hasta');
			$table->integer('clics');
			$table->integer('impresiones');
			$table->string('tag_marcas', 250);
			$table->string('tag_modelos', 250);
			$table->string('tag_partes', 250);
			$table->string('excluir_productos', 250);
			$table->dateTime('fecha_alta');
			$table->dateTime('fecha_modificacion');
			$table->integer('user_alta_id')->unsigned()->nullable()->index('publicidads_user_alta_id_foreign');
			$table->integer('user_modif_id')->unsigned()->nullable()->index('publicidads_user_modif_id_foreign');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('seccion_id')->unsigned()->nullable()->index('publicidads_seccion_id_foreign');
			$table->integer('tipo_publicidad_id')->unsigned()->nullable()->index('publicidads_tipo_publicidad_id_foreign');
			$table->integer('promocion_id')->unsigned()->nullable()->index('publicidads_promocion_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publicidads');
	}

}
