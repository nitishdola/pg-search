<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = array('coupon_id', 'banner_path', 'status');
	protected $table    = 'home_banners';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'banner_path' 		=>  'required|mimes:jpeg,png|max:1000',
    ];

    public function coupon() 
    {
        return $this->belongsTo('App\Coupon', 'coupon_id');
    }
}
