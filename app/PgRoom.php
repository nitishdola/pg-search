<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PgRoom extends Model
{
    protected $fillable = array('pg_location_id', 'room_type_id', 'rent_per_bed', 'status');
	protected $table    = 'pg_rooms';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'pg_location_id' 	=>  'required|exists:pg_locations,id',
    	'room_type_id'  	=>  'required|exists:room_types,id',
    	'rent_per_bed' 		=>  'required|numeric',
    ];

    public function pg_location() 
	{
		return $this->belongsTo('App\PgLocation', 'pg_location_id');
	}

	public function room_types() 
	{
		return $this->belongsTo('App\RoomType', 'room_type_id');
	}
}
