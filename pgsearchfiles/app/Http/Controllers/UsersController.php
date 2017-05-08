<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Wishlist, App\User,App\State,App\Booking;
use DB, Validator, Redirect, Auth, Crypt;
class UsersController extends Controller
{
   	public function __construct(){
    	$this->middleware('auth');
    }

    public function viewWishlist() {
    	$user_id = Auth::guard('user')->user()->id;
    	$results = Wishlist::where('status',1)->with('pg_location', 'pg_location.location')->orderBy('created_at', 'DESC')->get();

    	return view('users.wishlist', compact('results'));
    }

    public function editProfile() {
    	$user_id = Auth::guard('user')->user()->id;
    	$states 	= State::pluck('name', 'id');
    	$user = User::findOrFail($user_id);
    	return view('users.edit_profile', compact('user', 'states'));
    }

    public function updateProfile(Request $request) {
    	$user_id = Auth::guard('user')->user()->id;
    	
    	$user = User::findOrFail($user_id);

    	$rules = User::$rules;
        $rules['mobile_number'] = $rules['mobile_number'] . ',id,' . $user_id;
        $rules['email']   		= $rules['email'] . ',id,' . $user_id;

    	$validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();


        $message = '';

        $user->fill($data);
        if($user->save()) {
            $message .= ' Updated Successfully !';
        }else{
            $message .= 'Unable to update   !';
        }

        return Redirect::route('user.edit_profile')->with('message', $message);
    }

    public function viewMyBookings() {
        $user_id    = Auth::guard('user')->user()->id;
        $bookings   = Booking::where('user_id', $user_id)->with('pg_room', 'pg_room.pg_location', 'pg_room.pg_location.location')->get();
    
        return view('users.my_bookings', compact('bookings'));
    }
}
