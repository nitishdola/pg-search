<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PgLocationImage extends Model
{
    protected $fillable = array('pg_location_id', 'image_location', 'status');
	protected $table    = 'pg_location_images';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'pg_location_id' 	=>  'required|exists:pg_locations,id',
    	'image_location'  	=>  'required|max:500',
    ];

    public function pg_location() 
	{
		return $this->belongsTo('App\PgLocation', 'pg_location_id');
	}
}
