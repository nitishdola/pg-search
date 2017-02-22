<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Landmark;
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

    public function getLandmarkInfo() {
    	if(isset($_GET['landmark_id']) && $_GET['landmark_id'] != '') {
    		return Landmark::findOrFail(trim($_GET['landmark_id']));
    	}
    }
}
