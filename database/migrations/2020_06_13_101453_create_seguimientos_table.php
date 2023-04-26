<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeguimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seguimientos', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('user_id')->unsigned()->index('seguimientos_user_id_foreign');
			$table->string('seccion', 100);
			$table->string('accion', 100);
			$table->string('atributo', 100);
			$table->string('atributo_valor', 100);
			$table->string('referido', 256);
			$table->string('descripcion', 100);
			$table->string('adicional', 100);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seguimientos');
	}

}
