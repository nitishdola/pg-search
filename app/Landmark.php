<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    protected $fillable = array('name', 'longitude','latitude', 'status');
	protected $table    = 'landmarks';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:landmarks',
    	'longitude'			=>  'required',
    	'latitude'			=>  'required',
    ];
}
