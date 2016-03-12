<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Customer;
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
            $table->string('name');
            $table->string('last_name');
            $table->integer('cin');
            $table->string('mail');
            $table->string('adress');
            $table->string('function');
            $table->integer('commercial_id');
            //$table->foreign('id_commercial')->references('id_commercial')->on('commercials')->onUpdate('cascade');
            $table->timestamps();
        });
         Customer::create(['name'=>'chabah','last_name'=>'chabah','cin'=>0,'mail'=>'mail','adress'=>'adress','function'=>'fonction' ,'commercial_id'=>0]);


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
