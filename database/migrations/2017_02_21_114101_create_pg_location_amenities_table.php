<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgLocationAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pg_location_amenities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pg_location_id', false, true);
            $table->integer('amenity_id', false, true);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('pg_location_id')->references('id')->on('pg_locations');
            $table->foreign('amenity_id')->references('id')->on('amenities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pg_location_amenities');
    }
}
