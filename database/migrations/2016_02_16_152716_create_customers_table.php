<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_customer');
            $table->string('last_name_customer');
            $table->integer('cin_customer');
            $table->string('mail_customer');
            $table->string('adress_customer');
            $table->string('function_customer');
            $table->integer('id_commercial');
            //$table->foreign('id_commercial')->references('id_commercial')->on('commercials')->onUpdate('cascade');
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
        Schema::drop('customers');
    }
}
