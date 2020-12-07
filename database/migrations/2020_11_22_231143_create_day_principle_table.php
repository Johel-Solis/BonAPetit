<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayPrincipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_principle', function (Blueprint $table) {
            $table->id();

            $table->foreignId('day_id')->references('id')->on('days')->onDelete('cascade');

            $table->foreignId('principle_id')->references('id')->on('principles')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_principle');
    }
}
