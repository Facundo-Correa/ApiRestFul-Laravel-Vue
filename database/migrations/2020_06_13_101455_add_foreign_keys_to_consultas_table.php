<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConsultasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('consultas', function(Blueprint $table)
		{
			$table->foreign('tipo_consulta_id')->references('id')->on('tipos_consulta_tecnicas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('consultas', function(Blueprint $table)
		{
			$table->dropForeign('consultas_tipo_consulta_id_foreign');
		});
	}

}
