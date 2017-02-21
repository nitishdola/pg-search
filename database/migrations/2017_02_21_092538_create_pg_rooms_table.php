<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pg_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pg_location_id', false, true);
            $table->integer('room_type_id', false, true);
            $table->decimal('rent_per_bed', 10,2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pg_rooms');
    }
}
