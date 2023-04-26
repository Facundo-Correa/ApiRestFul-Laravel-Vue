<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PromoDiaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('v2_promo_dia', function(Blueprint $table)
		{
			$table->integer('id_promo')->index('id_promo');
			$table->integer('id_entidad');
			$table->integer('descuento');
			$table->boolean('descuento_porcentaje');
			$table->integer('otro_descuento');
			$table->primary(['id_promo','id_entidad']);
			$table->index(['id_promo','id_entidad'], 'id_promo_entidad');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_promo_dia');
	}

}
