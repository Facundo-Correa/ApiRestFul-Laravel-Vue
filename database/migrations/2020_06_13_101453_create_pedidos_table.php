<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('total', 65);
			$table->dateTime('fecha_pedido');
			$table->dateTime('fecha_cierre');
			$table->dateTime('fecha_envio');
			$table->text('descuentos', 65535);
			$table->text('pedido', 65535);
			$table->smallInteger('estado');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('id_pedido');
			$table->integer('cliente_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pedidos');
	}

}
