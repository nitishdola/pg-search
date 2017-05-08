<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Deal, App\Coupon;
use DB, Validator, Redirect, Crypt;
class DealsController extends Controller
{
    public function create() {
    	$coupons = Coupon::where('status',1)->orderBy('created_at', 'DESC')->pluck('coupon_code', 'id');
    	return view('admin.deals.create', compact('coupons'));
    }

    public function addDeal(Request $request) {
    	$data = $request->all();

        $validator = Validator::make($data, Deal::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        if ($request->hasFile('banner_path')) {
        	$destination_path = public_path('uploads/deals/'.date('Y-m-d'));
			if ($request->file('banner_path')->isValid()){
			  $fileName = 'enrollspace-home-offers-'.md5(uniqid()).'.'.$request->file('banner_path')->getClientOriginalExtension();
			  $request->file('banner_path')->move($destination_path, $fileName);
			  $data['banner_path'] = date('Y-m-d').'/'.$fileName;
			}
		}

        Deal::create( $data );

        $message = 'Deal added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('deal.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewAllDeals() {
    	$results = Deal::orderBy('created_at', 'DESC')->with('coupon')->paginate(100);
    	return view('admin.deals.index', compact('results'));
    }
}
