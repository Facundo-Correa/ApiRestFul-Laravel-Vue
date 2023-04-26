<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomiciliosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domicilios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('direccion', 45);
			$table->string('logo', 100);
			$table->string('header', 100);
			$table->string('latitud', 45);
			$table->string('longitud', 45);
			$table->string('nombre');
			$table->string('descripcion');
			$table->integer('cp')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('geolocalizacion_id')->unsigned()->nullable()->index('domicilios_geolocalizacion_id_foreign');
			$table->integer('persona_id')->unsigned()->nullable()->index('domicilios_persona_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('domicilios');
	}

}
