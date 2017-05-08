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
        $landmark_name = null;
    	return view('admin.master.landmarks.create', compact('landmark_name'));
    }

    public function edit($landmark_id) {
        $landmark_id    = Crypt::decrypt($landmark_id);
        $landmark       = Landmark::findOrFail($landmark_id);
        $landmark_name  = $landmark->name;
        return view('admin.master.landmarks.edit', compact('landmark', 'landmark_name'));
    }

    public function doCreate(Request $request) {
    	$data = $request->all();

        $validator = Validator::make($data, Landmark::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        if ($request->hasFile('landmark_image')) {
            $destination_path = public_path('uploads/landmarks/'.date('Y'));
            if ($request->file('landmark_image')->isValid()){
              $fileName = md5(time()).'_enrollspace-find-pg-in-'.strtolower(str_replace(' ', '-', str_replace(',','',$request->name))).'.'.$request->file('landmark_image')->getClientOriginalExtension();
              $request->file('landmark_image')->move($destination_path, $fileName);
              $data['landmark_image'] = date('Y').'/'.$fileName;
            }
        }

        Landmark::create( $data );

        $message = 'Landmark added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('landmark.index')->with(['message' => $message, 'note-class' => $class]);
    }


    public function doUpdate(Request $request, $id) {
        $data   = $request->all();
        $id     = Crypt::decrypt($id); 
        $rules  = Landmark::$rules;

        $rules['name']              = $rules['name'] . ',id,' . $id;

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        $landmark       = Landmark::findOrFail($id);

        if ($request->hasFile('landmark_image')) {
            $destination_path = public_path('uploads/landmarks/'.date('Y'));
            if ($request->file('landmark_image')->isValid()){
              $fileName = md5(time()).'_enrollspace-find-pg-in-'.strtolower(str_replace(' ', '-', str_replace(',','',$request->name))).'.'.$request->file('landmark_image')->getClientOriginalExtension();
              $request->file('landmark_image')->move($destination_path, $fileName);
              $data['landmark_image'] = date('Y').'/'.$fileName;
            }
        }

        $landmark->fill($data);

        if($landmark->save()) {
            $message = 'Landmark updated succssfully !';
            $class   = 'note-success';  
        }else{
            $message = 'Unable to update !';
            $class   = 'note-danger';  
        }
        return Redirect::route('landmark.index')->with(['message' => $message, 'note-class' => $class]);
    }

    public function remove($landmark_id) {
        $id         = Crypt::decrypt($landmark_id); 
        $landmark   = Landmark::findOrFail($id);

        $landmark->status = 0;

        if($landmark->save()) {
            $message = 'Landmark removed succssfully !';
            $class   = 'note-success';  
        }else{
            $message = 'Unable to remove !';
            $class   = 'note-danger';  
        }
        return Redirect::route('landmark.index')->with(['message' => $message, 'note-class' => $class]);
    }
}
