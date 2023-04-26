<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDomiciliosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domicilios', function(Blueprint $table)
		{
			$table->foreign('geolocalizacion_id')->references('id')->on('geolocalizacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('persona_id')->references('id')->on('personas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domicilios', function(Blueprint $table)
		{
			$table->dropForeign('domicilios_geolocalizacion_id_foreign');
			$table->dropForeign('domicilios_persona_id_foreign');
		});
	}

}
