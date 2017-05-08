<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PremiumPg extends Model
{
    protected $fillable = array('pg_location_id', 'premium_start_date', 'premium_expiry_date', 'amount_paid', 'status');
	protected $table    = 'premium_pgs';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'pg_location_id' 		=>  'required|exists:pg_locations,id',
    	'premium_start_date'  	=>  'required|date_format:Y-m-d',
    	'premium_expiry_date'  	=>  'required|date_format:Y-m-d',
    	'amount_paid'			=>  'required|numeric'
    ];

    public function pg_location() 
	{
		return $this->belongsTo('App\PgLocation', 'pg_location_id');
	}
}
