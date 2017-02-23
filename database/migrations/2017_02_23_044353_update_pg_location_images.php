<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePgLocationImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pg_location_images', function (Blueprint $table) {  
            $table->string('image_location', 127);
            $table->integer('pg_location_id', false, true);
            $table->tinyInteger('status')->default(1);

            $table->foreign('pg_location_id')->references('id')->on('pg_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pg_location_images', function (Blueprint $table) {
            //
        });
    }
}
