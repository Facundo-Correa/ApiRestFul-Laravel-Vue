<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proveedor_id')->unsigned()->index('productos_proveedor_id_foreign');
			$table->integer('parte_id')->unsigned()->index('productos_parte_id_foreign');
			$table->integer('marca_id')->unsigned()->index('productos_marca_id_foreign');
			$table->integer('modelo_id')->unsigned()->index('productos_modelo_id_foreign');
			$table->string('origen_id', 3)->index('origen_id');
			$table->string('estado_id', 2)->index('producto_estado_id_foreign');
			$table->string('nombre', 100);
			$table->string('um', 4);
			$table->integer('umq');
			$table->date('vigencia_desde');
			$table->date('fecha_activo');
			$table->float('precio_actual', 65, 3);
			$table->decimal('dolar', 11);
			$table->string('destacado', 2);
			$table->integer('cantidad')->default(0);
			$table->integer('stock')->default(0);
			$table->string('descripcion', 256);
			$table->boolean('porcentaje');
			$table->integer('descuento');
			$table->integer('puntos');
			$table->decimal('factor', 11);
			$table->date('vigencia_puntos');
		});

		DB::statement('ALTER TABLE productos ADD FULLTEXT fulltext_index (nombre, descripcion)');

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
