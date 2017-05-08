<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PgLocation extends Model
{
    protected $fillable = array('rent_admin_id', 'longitude','latitude', 'landmark_id','address', 'pin','city_id', 'state_id', 'rules', 'description', 'advantages', 'location_id', 'sub_location_id', 'free_booking_days', 'paid_booking_days', 'gender');
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
        'location_id'       =>  'required|exists:locations,id',
        'sub_location_id'   =>  'required|exists:sub_locations,id',
        'description'       =>  'required',
        'rules'             =>  'required',
        'free_booking_days' =>  'required',
        'paid_booking_days' =>  'required',
        'gender'            =>  'required',
    ];

    public static $pg_preferred_for = ['Girls' => 'Girls', 'Boys' => 'Boys'];

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

    public function location() 
    {
        return $this->belongsTo('App\Location', 'location_id');
    }

    public function sub_location() 
    {
        return $this->belongsTo('App\SubLocation', 'sub_location_id');
    }

    public function landmark() 
    {
        return $this->belongsTo('App\Landmark', 'landmark_id');
    }

    public function amrnities()
    {
        return $this->hasMany('App\PgLocationAmenity');
    }
}
