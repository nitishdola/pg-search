<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PgLocationAmenity extends Model
{
    protected $fillable = array('pg_location_id', 'amenity_id', 'status');
	protected $table    = 'pg_location_amenities';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'pg_location_id' 	=>  'required|exists:pg_locations,id',
    	'amenity_id'  		=>  'required|exists:amenities,id',
    ];

    public function pg_location() 
	{
		return $this->belongsTo('App\PgLocation', 'pg_location_id');
	}

	public function amenity() 
	{
		return $this->belongsTo('App\Amenity', 'amenity_id');
	}
}
