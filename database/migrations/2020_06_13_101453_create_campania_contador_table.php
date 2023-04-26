<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaniaContadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campania_contador', function(Blueprint $table)
		{
			$table->integer('id_campania')->index('id_campania');
			$table->integer('clicks')->nullable();
			$table->integer('impresiones')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campania_contador');
	}

}
