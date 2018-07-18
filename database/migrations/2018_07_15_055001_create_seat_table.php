<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->smallInteger('seat_no');
            $table->boolean('allow');
            $table->integer('price');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('seats', function($table) {
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
