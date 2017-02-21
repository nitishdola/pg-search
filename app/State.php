<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table  =   'states';
	public static $rules = [
	'name' => 'required',
	];
	protected $guarded = ['id', '_token', '_method'];
	protected $fillable = ['name'];
}
