<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = array('coupon_id', 'banner_path', 'status');
	protected $table    = 'deals';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'banner_path' 		=>  'required|mimes:jpeg,png|max:1000',
    ];

    public function coupon() 
    {
        return $this->belongsTo('App\Coupon', 'coupon_id');
    }
}
