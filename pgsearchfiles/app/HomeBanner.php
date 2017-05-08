<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
   	protected $fillable = array('quote', 'sub_quote', 'banner_path', 'status');
	protected $table    = 'home_banners';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'banner_path' 		=>  'required|mimes:jpeg,png|max:2000',
    ];
}
