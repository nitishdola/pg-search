<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;
use App\PgLocation;
use App\PgRoom, App\Booking;
class RentAdminController extends Controller
{
	public function __construct(){
    	$this->middleware('rent_admin');
    }

    public function index(){
    	//get all pg locations by current user
    	$pg_location = PgLocation::where('rent_admin_id', Auth::guard('rent_admin')->user()->id)->where('status',1);

    	$all_locations 	= $pg_location->select('id')->get();
    	$pg_loc_arr    	= [];

    	foreach($all_locations as $v) {
    		$pg_loc_arr[] = $v->id;
    	}

    	$booked_rooms 		= PgRoom::whereIn('pg_location_id', $pg_loc_arr)->where('is_booked', '!=', 0)->count();


    	$pg_location_count  = $pg_location->count();
    	return view('rent_admin.dashboard', compact('pg_location_count', 'booked_rooms'));
    }

    public function pendingGuestLists() {
    	$pg_location 	= PgLocation::where('rent_admin_id', Auth::guard('rent_admin')->user()->id)->where('status',1);

    	$all_locations 	= $pg_location->select('id')->get();
    	$pg_loc_arr    	= [];

    	foreach($all_locations as $v) {
    		$pg_loc_arr[] = $v->id;
    	}

    	$pg_rooms 		= PgRoom::whereIn('pg_location_id', $pg_loc_arr)->select('id')->get();

    	$pg_rooms_arr 	= [];

    	foreach($pg_rooms as $k => $v) {
    		$pg_rooms_arr[] = $v->id;
    	}

    	$results = Booking::whereIn('pg_room_id', $pg_rooms_arr)->where('confirmed_by_owner', 0)->where('booking_expiry_date', '<=', date('Y-m-d H:i:s'))->with('user', 'pg_room', 'pg_room.room_types', 'pg_room.pg_location', 'user')->get();
  
    	return view('rent_admin.rooms.pending_guests_lists', compact('results'));
    }

    public function acceptGuest($booking_id) { 
    	$booking_id = Crypt::decrypt($booking_id);

    	$booking    = Booking::findOrFail($booking_id);

    	//check if room owned by owner
    	$pg_room_id = $booking->pg_room_id;
    	$pg_location_id = PgRoom::whereId($pg_room_id)->first()->pg_location_id;
    	$rent_admin_id  = PgLocation::whereId($pg_location_id)->first()->rent_admin_id;
    	
    	$message = '';
    	$class   = '';

    	if($rent_admin_id == Auth::guard('rent_admin')->user()->id) {
    		$booking->confirmed_by_owner = 1;
    		if($booking->save()) {
    			$pg_room = PgRoom::findOrFail($pg_room_id);
    			$pg_room->is_booked = 1;
    			if($pg_room->save()) {
    				$message .= 'Guest accepted succssfully !';
		        	$class 	 .= 'note-success';	
    			}
    		}else{
    			$message .= 'Guest accepted failed !';
		        $class 	 .= 'note-danger';	
    		}
    	}else{
    		$message .= 'Authentication Failed !';
		    $class 	 .= 'note-danger';	
    	}

    	return Redirect::route('accept.guest.lists')->with(['message' => $message, 'note-class' => $class]);
    }
}
