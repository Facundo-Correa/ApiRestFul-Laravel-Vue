<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLogPedidosAPlataformaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('log_pedidos_a_plataforma', function(Blueprint $table)
		{
			$table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('log_pedidos_a_plataforma', function(Blueprint $table)
		{
			$table->dropForeign('log_pedidos_a_plataforma_pedido_id_foreign');
		});
	}

}
