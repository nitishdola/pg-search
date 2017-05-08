<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = array('user_id', 'pg_room_id','booking_date', 'booking_expiry_date', 'booking_type', 'paid_amount', 'confirmed_by_owner', 'transaction_id', 'payment_status', 'bank_response_code', 'gateway_string');
	protected $table    = 'bookings';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'user_id' 				=>  'required|exists:users,id',
    	'pg_room_id' 			=>  'required|exists:pg_rooms,id',
    	'booking_date'			=>  'required|date_format:Y-m-d H:i:s',
    	'booking_expiry_date'	=>  'required|date_format:Y-m-d H:i:s',
    	'booking_type'			=>  'required|in:paid,free',
    	'paid_amount'			=>  'required|numeric',
    	'confirmed_by_owner'	=>  'required',
    	'transaction_id'		=>  'required|unique:bookings',
    	'payment_status'		=>  'required',
    ];

    public function user() 
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pg_room() 
    {
        return $this->belongsTo('App\PgRoom', 'pg_room_id');
    }
}
