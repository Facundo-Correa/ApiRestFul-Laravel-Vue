<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogPedidosAPlataformaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_pedidos_a_plataforma', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pedido_id')->unsigned()->nullable()->index('log_pedidos_a_plataforma_pedido_id_foreign');
			$table->text('request', 65535);
			$table->dateTime('fecha');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_pedidos_a_plataforma');
	}

}
