<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Location, App\Landmark, App\Deal, App\Banner,App\HomeBanner;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $landmarks = Landmark::whereStatus(1)->select('name', 'landmark_image', 'latitude', 'longitude')->get();
        $locations = Location::whereStatus(1)->select('name', 'slug', 'image')->get();
        $deals      = Deal::whereStatus(1)->orderBy('created_at', 'DESC')->with('coupon', 'coupon.cpn_provider.rent_admin', 'coupon.cpn_provider.location')->get();
        $banners    = Banner::whereStatus(1)->orderBy('created_at', 'DESC')->get();
        $home_banners = HomeBanner::whereStatus(1)->get();
        return view('welcome', compact('landmarks', 'deals', 'banners', 'locations', 'home_banners'));
    }
}
