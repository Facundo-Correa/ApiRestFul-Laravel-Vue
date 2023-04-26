<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicidadContadorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publicidad_contadors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('publicidad_id')->unsigned()->nullable()->index('publicidad_contadors_publicidad_id_foreign');
			$table->integer('dicks');
			$table->integer('impresiones');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publicidad_contadors');
	}

}
