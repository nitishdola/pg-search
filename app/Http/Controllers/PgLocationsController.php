<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Landmark, App\State,App\Amenity,App\RoomType,App\PgLocation,App\PgLocationAmenity,App\PgLocationImage, App\PgRoom;
class PgLocationsController extends Controller
{
    public function create() {
    	$landmarks 	= Landmark::pluck('name', 'id');
    	$states 	= State::pluck('name', 'id');
    	$amenities 	= Amenity::get();
    	$room_types = RoomType::pluck('name', 'id');
    	return view('rent_admin.pg_locations.create', compact('landmarks', 'states', 'amenities', 'room_types'));
    }

    public function doCreate(Request $request) { 
    	$message = '';
        DB::beginTransaction();

        try {
            // add pg location
            $data = $request->all();
            $data['rent_admin_id'] = Auth::guard('rent_admin')->user()->id;

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

        //add images
        try {
            //loop through the items entered
            $destination_path = public_path('uploads/pg_images/'.date('Y').'/'.$pg_location->id);
            $img_data['pg_location_id']    	= $pg_location->id;
            	//upload image
        	if ($request->hasFile('image')) {

        		for($i = 0; $i < count($request->image); $i++) {
					if ($request->file('image')[$i]->isValid()) {
					  	$fileName = 'pg-'.md5(uniqid()).'.'.$request->file('image')[$i]->getClientOriginalExtension();
					  	$request->file('image')[$i]->move($destination_path, $fileName);
					  	$img_data['image_location'] = 'pg_images/'.date('Y').'/'.$pg_location->id.'/'.$fileName;

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
        
         //add rooms
        try {
            //loop through the items entered
            $room_data['pg_location_id']    	= $pg_location->id;
            	
            for($i = 0; $i < count($request->room_type_id); $i++) {

            	if(isset($request->room_type_id[$i]) && isset($request->rent_per_bed[$i])) {
            		if(($request->room_type_id[$i] ) != '' && ($request->rent_per_bed[$i] != '')) {
            			$room_data['room_type_id']            = $request->room_type_id[$i];
		                $room_data['rent_per_bed']            = $request->rent_per_bed[$i];
		                $validator = Validator::make($room_data, PgRoom::$rules);
		                if ($validator->fails()) return Redirect::back()->withErrors($validator);
		                PgRoom::create( $room_data );
            		}
	            }
            }
        } catch(ValidationException $e)
        {
            return Redirect::back();
        }

        // Commit the queries!
        DB::commit();

        $message = 'Landmark added succssfully !';
        $class   = 'note-success';  
        return Redirect::route('landmark.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function createSuccess() {
        return view('rent_admin.pg_locations.add_success');
    }
}
