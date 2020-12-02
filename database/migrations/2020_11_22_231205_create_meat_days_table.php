<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->references('id')->on('days');

            $table->foreignId('meat_id')->references('id')->on('meats');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meat_days');
    }
}
