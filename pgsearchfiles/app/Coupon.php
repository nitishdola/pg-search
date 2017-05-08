<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = array('coupon_code', 'discount_amount','discount_type', 'active_date', 'expiry_date', 'provider', 'coupon_type', 'status');
	protected $table    = 'coupons';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'coupon_code' 		=>  'required|unique:coupons',
    	'discount_amount'	=>  'required',
    	'discount_type'		=>  'required',
    	'active_date'    	=> 	'required|date|date_format:Y-m-d',
    	'coupon_type'		=>  'required|in:Promotion,Offer,Discount'
    ];

    public static $coupon_types = [
    	'Promotion' => 'Promotion',
    	'Offer' 	=> 'Offer',
    	'Discount' 	=> 'Discount',
    ];

    public function cpn_provider() 
    {
        return $this->belongsTo('App\PgLocation', 'provider');
    }
}
