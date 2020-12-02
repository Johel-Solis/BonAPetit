<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeverageDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverage_days', function (Blueprint $table) {
            $table->id();

            $table->foreignId('day_id')->references('id')->on('days');

            $table->foreignId('beverage_id')->references('id')->on('beverages');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beberage_days');
    }
}
