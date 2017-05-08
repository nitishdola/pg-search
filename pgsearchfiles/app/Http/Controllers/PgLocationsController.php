<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt, Input, Storage;
use App\Landmark, App\State,App\Amenity,App\RoomType,App\PgLocation,App\SubLocation,App\PgLocationAmenity,App\PgLocationImage, App\PgRoom, App\BookingType,App\Location,App\City;
class PgLocationsController extends Controller
{
    public function create() {
    	$landmarks  = Landmark::where('status',1)->pluck('name', 'id');
        $states     = State::where('status',1)->pluck('name', 'id');
        $amenities  = Amenity::get();
        $room_types = RoomType::where('status',1)->pluck('name', 'id');
        $gender     = PgLocation::$pg_preferred_for;
        $locations  = Location::where('status',1)->pluck('name', 'id');
    	return view('rent_admin.pg_locations.create', compact('landmarks', 'states', 'amenities', 'room_types', 'gender', 'locations'));
    }

    public function doCreate(Request $request) { 
        DB::beginTransaction();

        try {
            // add pg location
            $data = $request->all();
            $data['rent_admin_id'] = Auth::guard('rent_admin')->user()->id;

            //booking types
            $booking_type = BookingType::get();
            $data['free_booking_days'] = $booking_type[0]->default_booking_days;
            $data['paid_booking_days'] = $booking_type[0]->default_booking_days;

            $validator = Validator::make($data, PgLocation::$rules);
            if ($validator->fails()) return Redirect::back()->withErrors($validator);
            $pg_location = PgLocation::create( $data );
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        //add amenities
        try {
            //loop through the items entered
            
            $amm_data['pg_location_id']    	= $pg_location->id;
            for($i = 0; $i < count($request->amenities); $i++) {
                $amm_data['amenity_id']            = $request->amenities[$i];
                $validator = Validator::make($amm_data, PgLocationAmenity::$rules);
                if ($validator->fails()) return Redirect::back()->withErrors($validator);
                PgLocationAmenity::create( $amm_data );
            }
        } catch(ValidationException $e)
        {
            return Redirect::back();
        }
       
         //add rooms
        try {
            //loop through the items entered
            $room_data['pg_location_id']    	= $pg_location->id;
            //image data
            $img_data['pg_location_id']         = $pg_location->id;

            for($i = 0; $i < count($request->room_type_id); $i++) {
                //add rooms
            	if(isset($request->room_type_id[$i]) && isset($request->rent_per_bed[$i])) {
            		if(($request->room_type_id[$i] ) != '' && ($request->rent_per_bed[$i] != '')) {
            			$room_data['room_type_id']            = $request->room_type_id[$i];
		                $room_data['rent_per_bed']            = $request->rent_per_bed[$i];
		                $validator = Validator::make($room_data, PgRoom::$rules);
		                if ($validator->fails()) return Redirect::back()->withErrors($validator);
		                $pg_room = PgRoom::create( $room_data );



                        //add images
                        $file = $request->image[$i];
                        $img_validator = Validator::make($request->all(),[
                            'image.*' => 'required|mimes:jpeg,png|max:102400'
                        ]);
                        $destination_path = public_path('uploads/pg_images/'.date('Y').'/'.$pg_location->id.'/');
                        $fileName = 'enrollspace-'.md5(uniqid()).'.'.$file->getClientOriginalExtension();
                        $request->file($file->move($destination_path, $fileName));
                        $img_data['image_location'] = 'pg_images/'.date('Y').'/'.$pg_location->id.'/'.$fileName;
                        $img_data['pg_room_id']     = $pg_room->id;
                        $validator = Validator::make($img_data, PgLocationImage::$rules);
                        if ($validator->fails()) return Redirect::back()->withErrors($validator);
                        PgLocationImage::create( $img_data );
            		}
	            }
                
            }
        } catch(ValidationException $e)
        {
            return Redirect::back();
        }

        // Commit the queries!
        DB::commit();

        $message = 'PG added succssfully !';
        $class   = 'note-success';  
        return Redirect::route('pg_location.add_success')->with(['message' => $message, 'note-class' => $class]);
    }

    public function createSuccess() {
        return view('rent_admin.pg_locations.add_success');
    }

    public function index(Request $request) {
        $results = PgLocation::where('status',1)->orderBy('created_at', 'DESC')->with('rent_admin', 'city', 'state', 'location', 'sub_location', 'landmark')->paginate(100);
        return view('admin.pg.view_all', compact('results'));
    }

    public function removebyAdmin($id) {
        $pg_location = PgLocation::findOrFail($id);
        $pg_location->status = 0;
        $pg_location->save();
        $message = 'PG removed succssfully !';
        $class   = 'note-success';  
        return Redirect::route('view_all_pg')->with(['message' => $message, 'note-class' => $class]);
    }
    public function myPgs() {
        $rent_admin_id = Auth::guard('rent_admin')->user()->id;
        $results = PgLocation::where('rent_admin_id', $rent_admin_id)->with('rent_admin', 'city', 'state', 'location', 'sub_location', 'landmark')->paginate(20);
        return view('rent_admin.pg_locations.my_pgs', compact('results'));
    }

    public function viewMyPglocation($id) {
        $id = Crypt::decrypt($id);
        $pg_location = PgLocation::whereId($id)->with('rent_admin')->first();
        //check if owned
        $rent_admin_id = Auth::guard('rent_admin')->user()->id;
        if($rent_admin_id == $pg_location->rent_admin['id']) {
            $landmarks  = Landmark::where('status',1)->pluck('name', 'id');
            $states     = State::where('status',1)->pluck('name', 'id');
            //$amenities  = Amenity::get();
            $room_types = RoomType::where('status',1)->pluck('name', 'id');
            $gender     = PgLocation::$pg_preferred_for;
            $locations  = Location::where('status',1)->pluck('name', 'id');
            $sublocations  = SubLocation::where('status',1)->pluck('name', 'id');
            $cities     = City::where('status',1)->pluck('name','id');

            $pg_amenities  = PgLocationAmenity::where('pg_location_id', $pg_location->id)->with('amenity')->get();

            $pg_rooms  = PgRoom::where('pg_location_id', $pg_location->id)->with('room_types')->get();

            return view('rent_admin.pg_locations.view_pg_location', compact('pg_location','landmarks', 'states','pg_amenities','room_types','gender','locations','cities','sublocations','pg_rooms'));
        }else{
            return 'When you know '.$rent_admin_id.' != '.$pg_location->rent_admin['id'];
        }
    }

    public function editMyPGBasicInfo($id) {
        $id = Crypt::decrypt($id);
        $pg_location = PgLocation::findOrFail($id);
        $rent_admin_id = Auth::guard('rent_admin')->user()->id;
        if($rent_admin_id == $pg_location->rent_admin_id) {
            $gender     = PgLocation::$pg_preferred_for;
            $states     = State::where('status',1)->pluck('name', 'id');
            $cities     = City::where('status',1)->pluck('name','id');
            $locations  = Location::where('status',1)->pluck('name', 'id');
            $sublocations  = SubLocation::where('status',1)->pluck('name', 'id');
            $landmarks  = Landmark::where('status',1)->pluck('name', 'id');
            return view('rent_admin.pg_locations.edit.basic_info', compact('pg_location','gender','states','cities','locations','sublocations','landmarks'));
        }
        return '?????';
    }

    public function updateMyPGBasicInfo(Request $request, $id) {
        $id = Crypt::decrypt($id);
        $pg_location = PgLocation::findOrFail($id);


        $rules = [
            'longitude'         =>  'required',
            'latitude'          =>  'required',
            'landmark_id'       =>  'required|exists:landmarks,id',
            'address'           =>  'required|min:10',
            'pin'               =>  'required|numeric|digits_between:6,6',
            'city_id'           =>  'required|exists:cities,id',
            'state_id'          =>  'required|exists:states,id',
            'location_id'       =>  'required|exists:locations,id',
            'sub_location_id'   =>  'required|exists:sub_locations,id',
            'gender'            =>  'required',
        ];


        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        $pg_location->fill($data);
        $pg_location->save();

        $message = 'PG updated succssfully !';
        $class   = 'note-success';  
        return Redirect::route('rent_admin.view_pg_location', Crypt::encrypt($pg_location->id))->with(['message' => $message, 'note-class' => $class]);
    }

    public function editMyPGAmmenityInfo($id) {
        $id             = Crypt::decrypt($id);
        $pg_location    = PgLocation::findOrFail($id);
        $rent_admin_id  = Auth::guard('rent_admin')->user()->id;
        if($rent_admin_id == $pg_location->rent_admin_id) {
            $pg_amenities  = PgLocationAmenity::where('pg_location_id', $pg_location->id)->with('amenity')->get();
            $amenities  = Amenity::get();
             return view('rent_admin.pg_locations.edit.ammenity_info', compact('pg_amenities', 'amenities'));
        }
        return '????';
    }
}
