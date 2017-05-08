<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Location,App\SubLocation,App\PgLocation,App\PremiumPg,App\RentAdmin,App\User,App\Booking;
use DB, Validator, Redirect, Crypt;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
    	return view('admin.dashboard');
    }

    public function addLocation() {
    	return view('admin.master.locations.create');	
    }

    public function submitLocation(Request $request) {
    	$data = $request->all();
    	$slug = str_replace(' ','-',$request->name);
    	$slug = strtolower($slug);
    	$data['slug'] = $slug;
        $rules = Location::$rules;
        $validator = Validator::make($data, Location::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) return Redirect::back()->withErrors($validator);
            if($file->isValid()){    
                $destination_path = public_path('uploads/locations/');
                $fileName = 'enrollspace-'.strtolower($request->name).md5(uniqid()).'.'.$file->getClientOriginalExtension();
                $request->file($file->move($destination_path, $fileName));
                $data['image'] = 'locations/'.$fileName;
            }
        }

        Location::create( $data );

        $message = 'Location added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('location.index')->with(['message' => $message, 'note-class' => $class]);
    }


    public function editLocation($location_id) {
        $location = Location::findOrFail($location_id);
        return view('admin.master.locations.edit', compact('location'));   
    }

    public function updateLocation(Request $request,$location_id) {

        $data = $request->all();

        $rules = Location::$rules; 
        $rules['name']              = $rules['name'] . ',id,' . $location_id;
        //$rules['department_code']   = $rules['department_code'] . ',id,' . $id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) return Redirect::back()->withErrors($validator);
            if($file->isValid()){    
                $destination_path = public_path('uploads/locations/');
                $fileName = 'enrollspace-'.strtolower($request->name).md5(uniqid()).'.'.$file->getClientOriginalExtension();
                $request->file($file->move($destination_path, $fileName));
                $data['image'] = 'locations/'.$fileName;
            }
        }
        //dd($data);
        $location = Location::findOrFail($location_id);
        $location->fill($data);
        $location->save();
        $message = 'Location updated succssfully !';
        $class   = 'note-success';  
        return Redirect::route('location.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewLocations() {
    	$results = Location::whereStatus(1)->orderBy('name')->paginate(50);
    	return view('admin.master.locations.index', compact('results'));	
    }

    //sub location
    public function addSubLocation() {
        $locations = Location::where('status',1)->orderBy('name')->pluck('name', 'id');
        return view('admin.master.sub_locations.create', compact('locations'));   
    }

    public function submitSubLocation(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, SubLocation::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        SubLocation::create( $data );

        $message = 'Sub Location added succssfully !';
        $class   = 'note-success';  
        return Redirect::route('sub_location.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewSubLocations(Request $request) {
        $where = [];
        if($request->location_id) {
            $where['location_id'] = $request->location_id;
        }
        $where['status'] = 1;
        $results = SubLocation::where($where)->orderBy('name')->with('location')->paginate(50);
        $locations = Location::where('status',1)->orderBy('name')->pluck('name', 'id');
        return view('admin.master.sub_locations.index', compact('results', 'locations'));    
    }

    public function removeSubLocation($id) {
        $sub_location = SubLocation::findOrFail($id);
        $sub_location->status = 0;
        $sub_location->save();
        $message = 'Sub Location removed succssfully !';
        $class   = 'note-warning';  
        return Redirect::route('sub_location.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function upgradePremium() {
        $pg_locations = PgLocation::where('status',1)->orderBy('created_at', 'DESC')->pluck('address', 'id');
        return view('admin.master.premium_account.upgrade', compact('pg_locations'));
    }

    public function doUpgradePremium(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, PremiumPg::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        PremiumPg::create( $data );

        $message = 'Upgraded to premium succssfully !';
        $class   = 'note-success';  
        return Redirect::route('premium.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewPremiumAccounts(Request $request) {
        $results = PremiumPg::orderBy('premium_expiry_date', 'DESC')->with('pg_location', 'pg_location.rent_admin')->paginate(100);
        return view('admin.master.premium_account.view_all', compact('results'));
    }

    public function viewPGOwners(Request $request) {
        $results = RentAdmin::orderBy('name')->paginate(100);
        return view('admin.pg.view_owners', compact('results'));
    }


    public function viewRegUsers(Request $request) {
        $results = User::orderBy('name')->whereStatus(1)->with('city', 'state')->paginate(100);
        return view('admin.users.view_all', compact('results'));
    }

    public function removeUser($user_id) {
        $user = User::findOrFail($user_id);
        $user->status = 0;

        $user->save();
        $message = 'User diabled succesfully !';
        $class   = 'aler-success';
        return Redirect::route('view_all_users')->with(['message' => $message, 'note-class' => $class]);
    }

    public function editSubLocation($sub_location_id) {
        $locations = Location::where('status',1)->orderBy('name')->pluck('name', 'id');
        $sub_location = SubLocation::findOrFail($sub_location_id);
        return view('admin.master.sub_locations.edit', compact('sub_location', 'locations'));   
    }

    public function updateSubLocation(Request $request, $sub_location_id) {
        $sub_location = SubLocation::findOrFail($sub_location_id);
        $sub_location->location_id = $request->location_id;
        $sub_location->name = $request->name;

        $sub_location->save();
        $message = 'Sub Location edited succssfully !';
        $class   = 'note-success';  
        return Redirect::route('sub_location.index', ['location_id' => $sub_location->location_id])->with(['message' => $message, 'note-class' => $class]);
    }

    public function allBookings() {
        $results   = Booking::with('user', 'pg_room', 'pg_room.pg_location', 'pg_room.pg_location.location', 'pg_room.pg_location.rent_admin')->orderBy('booking_date', 'DESC')->paginate(50);
        //dd($results);
        return view('admin.bookings.view_all', compact('results')); 
    }
}
