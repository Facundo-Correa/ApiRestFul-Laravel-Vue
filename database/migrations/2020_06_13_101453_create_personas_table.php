<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('apellido', 100);
			$table->string('empresa', 200);
			$table->string('cuit', 100);
			$table->string('phone', 50);
			$table->string('telefono', 50);
			$table->integer('n_plataforma');
			$table->integer('parent_person');
			$table->boolean('newsletter_mail');
			$table->boolean('ofertas_mail');
			$table->boolean('terminos');
			$table->dateTime('nacimiento');
			$table->decimal('descuento_comercial', 11, 4);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('tipo_persona_id')->unsigned()->nullable()->index('personas_tipo_persona_id_foreign');
			$table->integer('status_id')->unsigned()->nullable()->index('personas_status_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personas');
	}

}
