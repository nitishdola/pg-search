<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    protected $fillable = array('cms_code', 'title', 'content');
	protected $table    = 'c_m_s';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'cms_code' 				=>  'required|unique:c_m_s',
    	'title' 				=>  'required',
    	'content' 				=>  'required|min:10',
    ];

    public static $cms_codes = [
    	'privacy_policy' 		=> 'Privacy Policy',
    	'terms_and_conditions'	=> 'Terms and Conditions',
    	'guest_policies' 		=> 'Guest Policies',
    	'about_us' 				=> 'About Us',
    	'careers' 				=> 'Careers',
        'phone_number'          => 'Phone Number',
        'location'              => 'Location',
    ];
}
