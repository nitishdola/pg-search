<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Banner, App\Coupon;
use DB, Validator, Redirect, Crypt;

class BannersController extends Controller
{
    public function create() {
    	$coupons = Coupon::where('status',1)->orderBy('created_at', 'DESC')->pluck('coupon_code', 'id');
    	return view('admin.banners.create', compact('coupons'));
    }

    public function addBanner(Request $request) {
    	$data = $request->all();

        $validator = Validator::make($data, Banner::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        if ($request->hasFile('banner_path')) {
        	$destination_path = public_path('uploads/banners/'.date('Y-m-d'));
			if ($request->file('banner_path')->isValid()){
			  $fileName = 'enrollspace-home-banner-'.md5(uniqid()).'.'.$request->file('banner_path')->getClientOriginalExtension();
			  $request->file('banner_path')->move($destination_path, $fileName);
			  $data['banner_path'] = date('Y-m-d').'/'.$fileName;
			}
		}

        Banner::create( $data );

        $message = 'Banner added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('banner.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewAllBanners() {
    	$results = Banner::orderBy('created_at', 'DESC')->with('coupon')->paginate(100);
    	return view('admin.banners.index', compact('results'));
    }
}
