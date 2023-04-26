<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPedidosProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pedidos_productos', function(Blueprint $table)
		{
			$table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pedidos_productos', function(Blueprint $table)
		{
			$table->dropForeign('pedidos_productos_pedido_id_foreign');
			$table->dropForeign('pedidos_productos_user_id_foreign');
		});
	}

}
