<?php

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

public function checkIfWithinRadius() {
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