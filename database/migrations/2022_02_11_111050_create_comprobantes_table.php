<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("Name")->nullable();
            $table->string("Year")->nullable();
            $table->string("Month")->nullable();
            $table->string("Day")->nullable();
            $table->string("Hour")->nullable();
            $table->string("Minute")->nullable();
            $table->string("Plattform")->nullable();
            $table->string("Email")->nullable();
            $table->string("Href")->nullable();
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
        Schema::dropIfExists('comprobantes');
    }
}
