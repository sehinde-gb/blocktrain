<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned()->index();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->unsigned();
            //$table->string('startingCity');
            //$table->string('endingCity');
            //$table->string('description');
            //$table->string('type');
            //$table->string('passengerType');
            //$table->string('mode');
            //$table->decimal('endingFare', 8, 2);
            $table->decimal('balance', 8, 2);
            $table->decimal('current_balance', 8, 2);
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
        Schema::dropIfExists('cards');
    }
}
