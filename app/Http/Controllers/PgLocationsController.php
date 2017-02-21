<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PgLocationsController extends Controller
{
    public function create() {
    	return view('rent_admin.pg_locations.create');
    }
}
