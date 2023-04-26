<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(Schema::hasTable('image')){
            Schema::drop('image');
        }

		Schema::create('image', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('size');
			$table->string('width');
			$table->string('height');
			$table->string('type');
			$table->integer('id_user_add')->index('Image_FI_1');
			$table->dateTime('date_add');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('image');
	}

}
