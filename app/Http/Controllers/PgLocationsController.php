<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Landmark, App\State,App\Amenity;
class PgLocationsController extends Controller
{
    public function create() {
    	$landmarks 	= Landmark::pluck('name', 'id');
    	$states 	= State::pluck('name', 'id');
    	$amenities = Amenity::get();
    	return view('rent_admin.pg_locations.create', compact('landmarks', 'states', 'amenities'));
    }
}
