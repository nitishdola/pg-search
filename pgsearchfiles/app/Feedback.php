<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = array('subject', 'name', 'email', 'mobile', 'message', 'status');
	protected $table    = 'feedbacks';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'subject' 		=>  'required',
    	'name' 			=> 'required',
    	'email' 		=> 'email',
    	'mobile' 		=> 'required|numeric|min:10,max:10',
    	'message' 		=> 'required|max:500'
    ];
}
