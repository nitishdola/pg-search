<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = array('pg_location_id', 'user_id', 'status');
	protected $table    = 'wishlists';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'pg_location_id' 	=>  'required|exists:pg_locations,id',
    	'user_id' 			=>  'required|exists:users,id',
    ];

    public function pg_location() 
	{
		return $this->belongsTo('App\PgLocation', 'pg_location_id');
	}

	public function user() 
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
