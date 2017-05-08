<?php

namespace App\Http\Controllers\RentAdminAuth;

use App\RentAdmin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo   = '/rent/admin';
    protected $guard        = 'rent_admin';
    protected $username     = 'username';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showLoginForm(){

        if(view()->exists('rent_admin.authenticate')){
            return view('rent_admin.authenticate');
        }
        return view('rent_admin.auth.login');
    }
    
    public function showRegistrationForm(){

        return view('rent_admin.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {       
        return Validator::make($data, [
            'name'      => 'required|max:255',
            'phone_number'  => 'required|numeric|min:10|unique:rent_admins,phone_number',
            'address'   => 'required|min:10',
            'username'  => 'required|max:255|unique:rent_admins,username',
            'password'  => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
  
        return RentAdmin::create([
            'name'      => $data['name'],
            'phone_number'      => $data['phone_number'],
            'address'   => $data['address'],
            'username'  => $data['username'],
            'password'  => bcrypt($data['password']),
        ]);
    }
}