<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PromoProductoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('v2_promo_producto', function(Blueprint $table)
		{
			$table->integer('id_promo')->index('id_promo');
			$table->integer('id_producto');
			$table->integer('descuento');
			$table->boolean('descuento_porcentaje');
			$table->integer('cantidad');
			$table->primary(['id_promo','id_producto']);
			$table->index(['id_promo','id_producto'], 'id_promo_producto');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_promo_producto');
	}

}
