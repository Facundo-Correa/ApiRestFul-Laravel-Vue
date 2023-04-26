<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PromoProductoRegaloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('v2_promo_producto_regalo', function(Blueprint $table)
		{
			$table->integer('id_promo')->index('fk_promo_producto_regalo');
			$table->integer('id_entidad');
			$table->integer('descuento');
			$table->boolean('descuento_porcentaje');
			$table->integer('cantidad');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_promo_producto_regalo');
	}

}
