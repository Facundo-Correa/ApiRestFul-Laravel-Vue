<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ofertas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('codigo', 15);
			$table->string('imagen', 1000);
			$table->string('titulo', 50);
			$table->string('descripcion', 1000);
			$table->decimal('precio', 6);
			$table->integer('descuento');
			$table->integer('vendidas');
			$table->date('finaliza');
			$table->integer('ofertas')->nullable();
			$table->boolean('portada');
			$table->string('pdf', 1000)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ofertas');
	}

}
