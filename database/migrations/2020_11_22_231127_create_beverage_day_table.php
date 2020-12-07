<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeverageDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverage_day', function (Blueprint $table) {
            $table->id();

            $table->foreignId('day_id')->references('id')->on('days')->onDelete('cascade');

            $table->foreignId('beverage_id')->references('id')->on('beverages')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beverage_day');
    }
}
