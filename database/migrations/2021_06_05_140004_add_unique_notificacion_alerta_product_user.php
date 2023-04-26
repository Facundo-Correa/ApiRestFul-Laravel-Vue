<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueNotificacionAlertaProductUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('alerta_producto_usuarios', function (Blueprint $table) {
            $table->unique(['product_id','user_id'],'product_user_id');
            $table->unique(['product_id','user_id','combo_id'],'product_combo_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
