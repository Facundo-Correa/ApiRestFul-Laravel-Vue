<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos_productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pedido_id')->unsigned()->nullable()->index('pedidos_productos_pedido_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('pedidos_productos_user_id_foreign');
			$table->float('precio', 65);
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
		Schema::drop('pedidos_productos');
	}

}
