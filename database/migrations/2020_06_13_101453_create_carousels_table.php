<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarouselsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carousels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('active');
			$table->string('link', 50);
			$table->string('texto', 50);
			$table->string('copete', 50);
			$table->string('titulo', 50);
			$table->text('image_desktop', 65535);
			$table->text('image_mobile', 65535);
			$table->string('cdn');
			$table->integer('position');
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
		Schema::drop('carousels');
	}

}
