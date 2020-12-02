<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrincipleDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('principle_days', function (Blueprint $table) {
            $table->id();

            $table->foreignId('day_id')->references('id')->on('days');

            $table->foreignId('principle_id')->references('id')->on('principles');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('principle_days');
    }
}
