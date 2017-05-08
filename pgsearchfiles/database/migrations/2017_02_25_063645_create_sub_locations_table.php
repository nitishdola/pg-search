<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->integer('location_id', false, true);
            $table->tinyInteger('status')->default(1);
            
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_locations');
    }
}
