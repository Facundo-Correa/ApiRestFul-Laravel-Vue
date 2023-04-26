<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2TipoCriterioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('v2_tipo_criterio', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('nombre', 150);
			$table->string('otro', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_tipo_criterio');
	}

}
