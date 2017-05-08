<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Landmark, App\PgRoom, App\PgRating, App\Wishlist;
class RESTController extends Controller
{
    public function getAllCities() {
    	$where = [];
    	$where['status'] = 1;
    	if(isset($_GET['state_id']) && $_GET['state_id'] != '') {
    		$where['state_id'] = trim($_GET['state_id']);
    	}
    	return DB::table('cities')->select('id', 'name')->where($where)->get();
    }
    public function getSubLocations() {
        $where = [];
        $where['status'] = 1;
        if(isset($_GET['location_id']) && $_GET['location_id'] != '') {
            $where['location_id'] = trim($_GET['location_id']);
        }
        return DB::table('sub_locations')->select('id', 'name')->orderBy('name')->where($where)->get();
    }

    public function getLandmarkInfo() {
    	if(isset($_GET['landmark_id']) && $_GET['landmark_id'] != '') {
    		return Landmark::findOrFail(trim($_GET['landmark_id']));
    	}
    }

    public function getRoomPrice() {
        if(isset($_GET['pg_room_id']) && $_GET['pg_room_id'] != '') {
            //check if booked
            $available_beds = countAvailableBeds( trim(Crypt::decrypt($_GET['pg_room_id'])) );
            $room = PgRoom::findOrFail(trim(Crypt::decrypt($_GET['pg_room_id'])));

            $arr = [];
            $arr['available_beds'] = $available_beds;
            $arr['rent_per_bed'] = $room->rent_per_bed;

            return json_encode($arr);
        }
    }

    function getDistance() {  
        $latitude1  = $_GET['srclat'];
        $longitude1 = $_GET['srclong'];

        $latitude2  = $_GET['destlat'];
        $longitude2 = $_GET['destlong'];

        $earth_radius = 6371;

        $dLat = deg2rad( $latitude2 - $latitude1 );  
        $dLon = deg2rad( $longitude2 - $longitude1 );  

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
        $c = 2 * asin(sqrt($a));  
        $d = $earth_radius * $c;  

        return $d;  
    }

    public function lovePG() {
        $resp = [];
        $resp['success'] = false;
        if(isset($_GET['pg_locaton_id']) && $_GET['pg_locaton_id'] != '') {
            if(Auth::guard('user')->user()) {
                $data['user_id']        = Auth::guard('user')->user()->id;
                $data['pg_locaton_id']  = $_GET['pg_locaton_id'];

                if( PgRating::create($data)) {
                    $resp['success'] = true;
                    $resp['message'] = '';
                }
            }else{
                $resp['message'] = 'You must login to love this PG';
            }
        }else{
            $resp['message'] = 'Invalid PG';
        }

        return json_encode($resp);
    }

    public function addToWishlist() {
        if(isset($_GET['pg_location_id']) && $_GET['pg_location_id'] != '') { 
            if(Auth::guard('user')->user()) {
                $data['user_id']            = Auth::guard('user')->user()->id;
                $data['pg_location_id']     = $_GET['pg_location_id'];
                return Wishlist::create($data);
            }
        }
    }
}
