<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubLocation extends Model
{
    protected $fillable = array('location_id', 'name', 'status');
	protected $table    = 'sub_locations';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'location_id' 	=>  'required|exists:locations,id',
    	'name' 			=>  'required|unique:sub_locations,name',
    ];

    public function location() 
	{
		return $this->belongsTo('App\Location', 'location_id');
	}
}
