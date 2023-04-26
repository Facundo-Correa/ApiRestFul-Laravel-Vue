<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultas', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('marca', 100);
			$table->string('modelo', 100);
			$table->string('cdn', 500);
			$table->string('valor', 100);
			$table->enum('tipo', array('CD','CT','CAD','PI','COR','FIL','DIS','PASD','PAST','BAT','BUJ','CDI','REG','RTS','RPC','RRD','RRT','RCL'));
			$table->timestamps();
			$table->softDeletes();
			$table->integer('tipo_consulta_id')->unsigned()->nullable()->index('consultas_tipo_consulta_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consultas');
	}

}
