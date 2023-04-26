<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailing', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('date');
			$table->integer('id_publication');
			$table->boolean('id_mail_type');
			$table->boolean('id_status');
			$table->boolean('id_user_group');
			$table->integer('id_user');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mailing');
	}

}
