<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PgLocation, App\PgLocationAmenity, App\PgLocationImage,App\PgRoom,App\Booking;
use DB, Validator, Redirect, Auth, Crypt;

class PgController extends Controller
{

    public function view($subname, $seo_friend,$id) { 
    	$id = Crypt::decrypt($id);

    	$info = PgLocation::whereId($id)->with(['rent_admin', 'city', 'state', 'location', 'sub_location', 'landmark'])->first();

    	$amenities 	= PgLocationAmenity::where('pg_location_id',$id)->with('amenity')->get();
    	$images 	= PgLocationImage::where('pg_location_id',$id)->get();
    	$rooms 		= PgRoom::where('pg_location_id',$id)->with('pg_location', 'room_types')->get();

        $coupon_details = [];
        if(isset($_GET['coupon_code'])) {
            $coupon_code = $_GET['coupon_code'];
            $coupon_details = getCouponDetails($coupon_code);
        }

        return view('pg_rooms.view', compact('subname', 'seo_friend', 'amenities', 'images', 'info', 'rooms', 'coupon_details'));
    }

    public function book(Request $request) {
        
        $pg_room_id = Crypt::decrypt($request->pg_room_id);
        $info       = PgRoom::whereId($pg_room_id)->with(['pg_location', 'room_types', 'pg_location.location', 'pg_location.rent_admin'])->first();

        $seo_friend = $info->pg_location->id.'-ENROLLSPACE-'.$info->pg_location->location['name'].'-book-pg-in';
    	return view('pg_rooms.confirm_booking', compact('seo_friend', 'info'));
    }

    public function confirmBooking(Request $request) {
        dd($request);
    }

    public function confirmFreeBooking($pg_room_id) {
        $pg_room_id = Crypt::decrypt($pg_room_id);

        $pg_room = PgRoom::whereId($pg_room_id)->first();
        
        $random     = makeARandom(4);
        $user_id    = Auth::guard('user')->user()->id;
        $full_name  = ucfirst(Auth::guard('user')->user()->name);

        $fnamearr   = explode(' ',$full_name);

        $first      = $fnamearr[0][0];
        $last       = '';
        if(isset($fnamearr[1][0])) {
            $last       = $fnamearr[1][0];     
        }
        
        $transaction_id = $first.$last.$user_id.$pg_room_id.$random;

        $free_days = 3;

        $data = [];
        $data['user_id'] = $user_id;
        $data['pg_room_id'] = $pg_room_id;
        $data['booking_date'] = date('Y-m-d H:i:s');
        $data['booking_expiry_date'] = date('Y-m-d H:i:s',strtotime("+$free_days days"));
        $data['booking_type'] = 'free';
        $data['paid_amount'] = 0.00;
        $data['transaction_id'] = $transaction_id;
        $data['payment_status'] = 2;
        $data['confirmed_by_owner'] = 0;

        $validator = Validator::make($data, Booking::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);
        $booking = Booking::create( $data );

        $message = $class = '';
        if($booking) {
            //$message = 'Landmark added succssfully !';
            //$class   = 'note-success';  
            return Redirect::route('booking.confirm.recipt', $booking->id);
        }
    }

    public function confirmReceiptGenerate($booking_id) {
        $booking = Booking::whereId($booking_id)->with('user', 'pg_room', 'pg_room.pg_location', 'pg_room.pg_location.location', 'pg_room.pg_location.sub_location', 'pg_room.pg_location.city', 'pg_room.room_types', 'pg_room.pg_location.rent_admin')->first(); //dump($booking);
        return view('pg_rooms.confirm_receipt', compact('booking'));
    }
}
