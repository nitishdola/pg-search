<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile_number', 'email', 'permanent_address', 'city_id', 'state_id', 'password',
    ];
    protected $guarded  = ['_token'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name'              =>  'required|max:255', 
        'mobile_number'     =>  'required|max:127|unique:users',
        'email'             =>  'required|email|max:127|unique:users',
        'state_id'          =>  'exists:states,id',
        'city_id'           =>  'exists:cities,id',
    ];

    public function city() 
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function state() 
    {
        return $this->belongsTo('App\State', 'state_id');
    }
}
