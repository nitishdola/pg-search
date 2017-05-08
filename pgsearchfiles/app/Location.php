<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = array('name', 'image', 'status');
	protected $table    = 'locations';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 	=>  'required|unique:locations',
    	'file'  =>  'required|mimes:jpeg,jpg,png|max:3000',
    ];
}
