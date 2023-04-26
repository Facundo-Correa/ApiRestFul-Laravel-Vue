<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_queues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('promoID')->nullable();
            $table->string('promoNombre')->nullable();
            $table->string('promoImage')->nullable();
            $table->json('receptoresNotificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_queues');
    }
}
