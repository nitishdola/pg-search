<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Landmark;

class LandmarksController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index() {
    	$landmarks = Landmark::where('status',1)->orderBy('created_at', 'DESC')->paginate(30);
    	return view('admin.master.landmarks.index', compact('landmarks'));
    }

    public function create() {
    	return view('admin.master.landmarks.create');
    }

    public function doCreate(Request $request) {
    	$data = $request->all();

        $validator = Validator::make($data, Landmark::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);
        Landmark::create( $data );

        $message = 'Landmark added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('landmark.index')->with(['message' => $message, 'note-class' => $class]);
    }
}
