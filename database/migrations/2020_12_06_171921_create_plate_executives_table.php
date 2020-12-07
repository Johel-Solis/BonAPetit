<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlateExecutivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plate_executives', function (Blueprint $table) {
            $table->id();
            $table->integer('cost');
            $table->integer('cant');
            $table->string('observation');
            $table->foreignId('soup_id')->references('id')->on('soups')->onDelete('cascade');
            $table->foreignId('principle_id')->references('id')->on('principles')->onDelete('cascade');
            $table->foreignId('meat_id')->references('id')->on('meats')->onDelete('cascade');
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
        Schema::dropIfExists('plate_executives');
    }
}
