<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBasketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('baskets', function(Blueprint $table)
		{
			$table->foreign('combo_id', 'combo_fk')->references('id')->on('v2_promos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('baskets', function(Blueprint $table)
		{
			$table->dropForeign('combo_fk');
		});
	}

}
