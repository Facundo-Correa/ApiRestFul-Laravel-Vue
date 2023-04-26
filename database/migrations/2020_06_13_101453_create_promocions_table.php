<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromocionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promocions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_tipo_entidad');
			$table->string('id_tipo_promo');
			$table->string('id_tipo_criterio');
			$table->string('desde');
			$table->string('hasta');
			$table->text('nombre', 65535);
			$table->text('descripcion', 65535);
			$table->string('codigo');
			$table->text('imagen', 65535);
			$table->boolean('porcentaje');
			$table->integer('descuento_gral');
			$table->text('comparador_gral', 65535);
			$table->integer('ultima_compra');
			$table->integer('puntos');
			$table->softDeletes();
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
		Schema::drop('promocions');
	}

}
