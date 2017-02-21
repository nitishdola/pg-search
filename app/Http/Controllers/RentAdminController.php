<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;
use App\PgLocation;

class RentAdminController extends Controller
{
	public function __construct(){
    	$this->middleware('rent_admin');
    }

    public function index(){
    	//get all pg locations by current user
    	$pg_locations = PgLocation::where('rent_admin_id', Auth::guard('rent_admin')->user()->id)->where('status',1)->count();
    	return view('rent_admin.dashboard', compact('pg_locations'));
    }
}
