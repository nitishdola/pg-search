<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Crypt;
use App\CMS,App\HomeBanner;

class CMSController extends Controller
{
    public function index() {
        $results = CMS::whereStatus(1)->paginate(100);
        return view('admin.cms.list_all', compact('results'));
    }

    public function addCMSContent() {
    	$cms_codes = CMS::$cms_codes;
    	return view('admin.cms.add_content', compact('cms_codes'));
    }

    public function postCMSContent(Request $request) {
    	$data = $request->all();
        $validator = Validator::make($data, CMS::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        CMS::create( $data );

        $message = 'Content added succssfully !';
        $class 	 = 'note-success';	
        return Redirect::route('cms.index')->with(['message' => $message, 'note-class' => $class]);
    }
    public function editCMSContent($id = null) {
        $id = Crypt::decrypt($id);
        $cms = CMS::findOrFail($id);
        $cms_codes = CMS::$cms_codes;
        return view('admin.cms.edit_content', compact('cms_codes', 'cms'));   
    }

    public function updateCMSContent(Request $request, $id) {
        $id = Crypt::decrypt($id);
        $data = $request->all();

        $rules = CMS::$rules;

        $rules['cms_code']   = $rules['cms_code'] . ',id,' . $id;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        $cms = CMS::findOrFail($id);

        $cms->fill($data);
        $message = '';
        if($cms->save()) {
            $message .= 'CMS Content Updated Successfully !';
        }else{
            $message .= 'Unable to update  content !';
        }

        return Redirect::route('cms.index')->with('message', $message);
    }

    public function viewCMSContent($cms_code = null) {
    	$cms_code = str_replace('-', '_', $cms_code);
    	$contents = getCMScontents($cms_code);
    	return view('cms.website.view', compact('contents'));
    }

    public function addNewHomeBanner() {
        return view('admin.home_banners.create');
    }

    public function postNewHomeBanner(Request $request) {

        $data = $request->all();
        $validator = Validator::make($data, HomeBanner::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        $fileName = '';
        if ($request->file('banner_path')->isValid()) {
            $destination_path = public_path('/uploads/home_banners/');
            $extension    = $request->file('banner_path')->getClientOriginalExtension(); // getting image extension
            $fileName     = 'enrolls-ace-'.date('Ymd').rand(11111,99999).'.'.$extension; // renameing file
            $request->file('banner_path')->move($destination_path, $fileName); // uploading file to given path
            $data['banner_path'] = $fileName;
        }

        HomeBanner::create( $data );

        $message = 'Banner added succssfully !';
        $class   = 'note-success';  
        return Redirect::route('cms.view_all_home_banners')->with(['message' => $message, 'note-class' => $class]);
    }

    public function viewAllHomeBanners() {
        $results = HomeBanner::paginate(10);
        return view('admin.home_banners.view_all', compact('results'));
    }

    public function editHomeBanner($id) {
        $home_banner = HomeBanner::findOrFail($id);
        return view('admin.home_banners.edit', compact('home_banner'));
    }

    public function updateHomeBanner(Request $request, $id) {

        $data = $request->all();
        $validator = Validator::make($data, HomeBanner::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator);

        $fileName = '';
        if ($request->file('banner_path')->isValid()) {
            $destination_path = public_path('/uploads/home_banners/');
            $extension    = $request->file('banner_path')->getClientOriginalExtension(); // getting image extension
            $fileName     = 'enrollspace-'.date('Ymd').rand(11111,99999).'.'.$extension; // renameing file
            $request->file('banner_path')->move($destination_path, $fileName);
            $data['banner_path'] = $fileName;
        }

        $home_banner = HomeBanner::findOrFail($id);
        $home_banner->fill($data);

        $home_banner->save();

        $message = 'Updated succssfully !';
        $class   = 'note-success';  
        return Redirect::route('cms.view_all_home_banners')->with(['message' => $message, 'note-class' => $class]);
    }

    public function activateHomeBanner($id) {
        $home_banner = HomeBanner::findOrFail($id);
        $home_banner->status = 1;
        $home_banner->save();
        $message = 'Activated succssfully !';
        $class   = 'note-success';  
        return Redirect::route('cms.view_all_home_banners')->with(['message' => $message, 'note-class' => $class]);
    }


    public function disableHomeBanner($id) {
        $home_banner = HomeBanner::findOrFail($id);
        $home_banner->status = 0;
        $home_banner->save();
        $message = 'Disabled succssfully !';
        $class   = 'note-success';  
        return Redirect::route('cms.view_all_home_banners')->with(['message' => $message, 'note-class' => $class]);
    }
}
