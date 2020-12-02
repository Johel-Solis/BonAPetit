<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoupDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soup_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->references('id')->on('days');
            $table->foreignId('soup_id')->references('id')->on('soups');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_soup_days');
    }
}
