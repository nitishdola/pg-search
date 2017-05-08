<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pg_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rent_admin_id', false, true);
            $table->string('longitude', 127);
            $table->string('latitude', 127);
			$table->integer('location_id', false, true)->after('latitude');
            $table->integer('sub_location_id', false, true)->after('location_id');
            $table->integer('landmark_id', false, true);
            $table->string('address', 300);
            $table->string('pin', 6);
            $table->integer('city_id', false, true);
            $table->integer('state_id', false, true);
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
        Schema::drop('pg_locations');
    }
}
