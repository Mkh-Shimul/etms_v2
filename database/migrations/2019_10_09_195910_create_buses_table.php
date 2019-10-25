<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('worker_id');
            $table->string('number', 64)->unique();
            $table->string('bus_to', 64);
            $table->string('bus_from', 64);
            $table->timeTz('bus_start_time');
            $table->timeTz('bus_reach_time');
            $table->string('pickup_location', 128);
            $table->string('holy_schedule')->nullable();
            $table->timestamps();

            // $table->foreign('worker_id')->references('id')->on('workers');
            $table->index('worker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
