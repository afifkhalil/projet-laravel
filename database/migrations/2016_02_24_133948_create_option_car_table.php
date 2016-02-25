<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_car')->unsigned();
            $table->foreign('id_car')->references('id')->on('cars');
            $table->integer('id_option')->unsigned();
            $table->foreign('id_option')->references('id')->on('options');
            $table->float('option_price');
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
        Schema::drop('option_car');
    }
}
