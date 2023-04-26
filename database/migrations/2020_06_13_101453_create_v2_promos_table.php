<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PromosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('v2_promos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_tipo_entidad')->nullable();
			$table->string('id_tipo_promo')->nullable();
			$table->string('id_tipo_criterio')->nullable();
			$table->string('desde')->nullable();
			$table->string('hasta')->nullable();
			$table->text('nombre', 65535)->nullable();
			$table->text('descripcion', 65535)->nullable();
			$table->string('codigo')->nullable();
			$table->text('imagen', 65535)->nullable();
			$table->boolean('porcentaje')->nullable();
			$table->integer('descuento_gral')->nullable();
			$table->text('comparador_gral', 65535)->nullable();
			$table->integer('ultima_compra')->nullable();
			$table->integer('puntos')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_promos');
	}

}
