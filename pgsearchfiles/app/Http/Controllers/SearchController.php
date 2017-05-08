<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PgLocation, App\PgLocationImage,App\PgRoom,App\Booking,App\RoomType;
use DB, Validator, Redirect, Auth, Crypt;

class SearchController extends Controller
{
    public function searchByGeoLocation(Request $request) {
    	$latitude 	= $request->placeLat;
    	$longitude 	= $request->placeLong;
    	$location 	= $request->pg_location;

        $where = [];
        if($request->gender) {
            $where['gender'] = $request->gender;
        }

        $pr_start = 0;
        $pr_end   = 1000000;

        if($request->price_range) {
            $price_range = $request->price_range;
            $price_range = explode('-', $price_range);
            $pr_start    = $price_range[0];
            $pr_end      = $price_range[1];
        }
        $preferred_gender     = PgLocation::$pg_preferred_for;
        $room_types       = RoomType::pluck('name', 'id');
    	$results = PgLocation::whereStatus(1)->where($where)->with('city', 'state', 'location', 'sub_location', 'amrnities')->paginate(40);
        if(count($results)) {
        	foreach( $results as $k => $v) {
        		//check if location is within radius
        		$distance = getDistance( $latitude, $longitude, $v->latitude, $v->longitude );
        		if( $distance <= 2 ) {
        			//get the images
        			$pg_images = PgLocationImage::where('pg_location_id', $v->id)->get();
        			$results[$k]['pg_images'] = $pg_images;

                    $pg_min_price = PgRoom::where('pg_location_id', $v->id)->orderBy('rent_per_bed', 'ASC')->select('rent_per_bed')->first()->rent_per_bed;

                    if($pg_min_price >= $pr_start && $pg_min_price <= $pr_end) {
                        $results[$k]['pg_min_price'] = $pg_min_price; 
                        $results[$k]['available'] = checkIfBooked($v->id);      
                    }else{
                        unset($results[$k]);
                    }
    			}else{
                    unset($results[$k]);
                }
        	}
        }
    	return view('search.search_result', compact('results', 'preferred_gender', 'room_types'));
    }


    public function searchByLocation(Request $request, $location_slug = '') {

        $where['status'] = 1;

        if(isset($_GET['sub_location']) && $_GET['sub_location'] != '') {
            $sub_location_slug  = $_GET['sub_location'];

            $sub_location_info  = getSubLocInfoFromSlug($sub_location_slug);
            $sub_location_id    = $sub_location_info->id;
            $where['sub_location_id'] = $sub_location_id;
        }

        if(trim($location_slug) != ''):
        $location_slug  = str_replace(config('globals.APP_SEARCH_STRING'), '', $location_slug);

        $location_info  = getLocInfoFromSlug($location_slug);
        if($location_info):
            $location_id    = $location_info->id;
            $where['location_id'] = $location_id;
        endif;
        endif;

        $pr_start = 0;
        $pr_end   = 1000000;

        if($request->price_range) {
            $price_range = $request->price_range;
            $price_range = explode('-', $price_range);
            $pr_start    = $price_range[0];
            $pr_end      = $price_range[1];
        }
        $preferred_gender = PgLocation::$pg_preferred_for;
        $room_types       = RoomType::pluck('name', 'id');
        $results = PgLocation::where($where)->with('city', 'state', 'location', 'sub_location')->paginate(20);
        foreach( $results as $k => $v) {
            $pg_images = PgLocationImage::where('pg_location_id', $v->id)->get();
            $results[$k]['pg_images'] = $pg_images;

            $pg_min_price = PgRoom::where('pg_location_id', $v->id)->orderBy('rent_per_bed', 'ASC')->select('rent_per_bed')->first()->rent_per_bed;
            if($pg_min_price >= $pr_start && $pg_min_price <= $pr_end) {
                $results[$k]['pg_min_price'] = $pg_min_price; 
                $results[$k]['available'] = checkIfBooked($v->id);   
            }else{
                unset($results[$k]);
            }
        }
        return view('search.search_result', compact('results', 'preferred_gender', 'room_types'));
    }
}
