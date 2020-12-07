<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaySoupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_soup', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreignId('soup_id')->references('id')->on('soups')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_soup');
    }
}
