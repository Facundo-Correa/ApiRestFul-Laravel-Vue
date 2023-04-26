<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailingUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailing_user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_user');
			$table->integer('id_mailing');
			$table->boolean('id_status');
			$table->date('sent_date');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mailing_user');
	}

}
