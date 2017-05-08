<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PgLocation, App\Coupon;
use DB, Validator, Redirect, Crypt;

class CouponsController extends Controller
{
    public function create() {
    	$coupon_types = Coupon::$coupon_types;
    	$pg_locations = PgLocation::where('status',1)->orderBy('created_at', 'DESC')->pluck('address', 'id');
    	return view('admin.coupons.create', compact('coupon_types', 'pg_locations'));
    }

    public function addCoupon(Request $request) {
    	$data = $request->all();

        $validator = Validator::make($data, Coupon::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        Coupon::create( $data );

        $message = 'Coupon added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('coupon.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewAllCoupons() {
    	$results = Coupon::orderBy('active_date', 'DESC')->with('cpn_provider', 'cpn_provider.rent_admin')->paginate(100);
    	return view('admin.coupons.index', compact('results'));
    }
}
