<?php

function makeARandom($digits = null) {
    if($digits != null ) $digits = 4;
    return rand(pow(10, $digits-1), pow(10, $digits)-1);
}

//helpers for PG OWNERS

//get pg owner info details
function getOwnerInfo($owner_id = null) { 
	if($owner_id != null) {
		return DB::table('rent_admins')
            ->select('name','phone_number', 'address', 'username')
            ->where('status',1)
            ->where('id',$owner_id)
            ->first();
	}
}

function checkIfWithinRadius() {
    if((isset($_REQUEST['base_lat']) && $_REQUEST['base_long'] != '') && ( isset($_REQUEST['target_lat']) && $_REQUEST['larget_long'] != '' )) {
        
        $lat1   = $_REQUEST['lat_1'];
        $lon1   = $_REQUEST['long_1'];

        $lat2   = $_REQUEST['lat_2'];
        $lon2   = $_REQUEST['long_2'];  

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = 'k';
        $unit = strtoupper($unit);

        if ($unit == "K") {
          return ($miles * 1.609344);
        } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
          return $miles;
        }          
    }
}

function getAllLocations() {
    return DB::table('locations')
            ->select('name', 'slug', 'id')
            ->where('status',1)
            ->get();
}

function getAllSubLocations($location_id = null) {
    $where = [];
    if($location_id != null) {
        $where['location_id'] = $location_id;
    }
    return DB::table('sub_locations')
            ->select('name', 'slug', 'id')
            ->where('status',1)
            ->where($where)
            ->get();
}

function getDistance( $latitude1, $longitude1, $latitude2, $longitude2 ) {  
    $earth_radius = 6371;

    $dLat = deg2rad( $latitude2 - $latitude1 );  
    $dLon = deg2rad( $longitude2 - $longitude1 );  

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
    $c = 2 * asin(sqrt($a));  
    $d = $earth_radius * $c;  

    return $d;  
}

function get_starred($str) {
    $len = strlen($str);

    return substr($str, 0, 1).str_repeat('*', $len - 2).substr($str, $len - 1, 1);
}

function checkIfBooked($pg_location_id) {
    $pg_rooms = DB::table('pg_rooms')->where('pg_location_id', $pg_location_id)->get();
    $pg_rooms_arr = [];
    foreach($pg_rooms as $room) {
        $pg_rooms_arr[] = $room->id;
    }
    return $bookings = DB::table('bookings')->where('booking_expiry_date', '<=', date('Y-md H:i:s'))->where('payment_status', '!=', 0)->whereIn('pg_room_id', $pg_rooms_arr)->count();
}

function countAvailableBeds($pg_room_id) {
    $booked_beds = DB::table('bookings')->where('booking_expiry_date', '>=', date('Y-m-d H:i:s'))->where('payment_status', '!=', 0)->where('pg_room_id', $pg_room_id)->count();

    $pg_room_info = DB::table('pg_rooms')
                    ->join('room_types', 'room_types.id', '=', 'pg_rooms.room_type_id')
                    ->where('pg_rooms.id', $pg_room_id)
                    ->select('room_types.number_of_beds')
                    ->first()->number_of_beds;
    return ($pg_room_info-$booked_beds);
}

function getCouponDetails($coupon_code) {
    return DB::table('coupons')
            ->select('coupon_code','id', 'discount_amount', 'discount_type', 'active_date', 'expiry_date', 'provider')
            ->where('status',1)
            ->where('coupon_code', $coupon_code)
            ->first();
}


function getLocInfoFromSlug($slug) {
    return DB::table('locations')
            ->select('id','name', 'slug')
            ->where('status',1)
            ->where('slug', $slug)
            ->first();
}

function getSubLocInfoFromSlug($slug) {
    return DB::table('sub_locations')
            ->select('id','name', 'slug')
            ->where('status',1)
            ->where('slug', $slug)
            ->first();
}

function getCMScontents($cms_code) {
    return DB::table('c_m_s')
            ->select('cms_code','title', 'content')
            ->where('status',1)
            ->where('cms_code', $cms_code)
            ->first();
}