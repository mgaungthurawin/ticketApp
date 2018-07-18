<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->string('period');
            $table->date('depature');
            $table->string('depature_date');
            $table->string('depature_time');
            $table->date('arrival');
            $table->string('arrival_date');
            $table->string('arrival_time');
            $table->timestamps();
        });

        Schema::table('schedules', function($table) {
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
        Schema::dropIfExists('schedules');
    }
}
