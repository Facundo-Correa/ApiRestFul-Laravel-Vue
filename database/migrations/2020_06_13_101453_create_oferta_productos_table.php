<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertaProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oferta_productos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ofertas_id');
			$table->integer('id_producto');
			$table->dateTime('fecha_oferta');
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
		Schema::drop('oferta_productos');
	}

}
