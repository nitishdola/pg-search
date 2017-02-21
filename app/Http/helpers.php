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