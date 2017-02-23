<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PgLocation extends Model
{
    protected $fillable = array('rent_admin_id', 'longitude','latitude', 'landmark_id','address', 'pin','city_id', 'state_id');
	protected $table    = 'pg_locations';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'rent_admin_id' 	=>  'required|exists:rent_admins,id',
    	'longitude'			=>  'required',
    	'latitude'			=>  'required',
    	'landmark_id'  		=>  'required|exists:landmarks,id',
    	'address'  			=>  'required|min:10',
    	'pin'  				=>  'required|numeric|digits_between:6,6',
    	'city_id'  			=>  'required|exists:cities,id',
    	'state_id'  		=>  'required|exists:states,id',
    ];

    public function rent_admin() 
	{
		return $this->belongsTo('App\RentAdmin', 'rent_admin_id');
	}

	public function city() 
	{
		return $this->belongsTo('App\City', 'city_id');
	}

	public function state() 
	{
		return $this->belongsTo('App\State', 'state_id');
	}
}
