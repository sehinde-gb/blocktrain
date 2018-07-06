<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            //$table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade')->unsigned();
            $table->string('origin');
            $table->string('startingCity');
            $table->string('to');
            $table->string('endingCity');
            $table->string('description');
            $table->string('type');
            $table->string('passengerType');
            $table->string('mode');
            $table->decimal('endingFare', 8, 2);
            $table->decimal('balance', 8, 2);
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
        Schema::dropIfExists('journeys');
    }
}
