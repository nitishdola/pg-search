<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use DB, Redirect, Auth, Crypt,Input;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';
    protected $guard = 'user';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile_number' => 'required|numeric|digits_between:10,10|unique:users',
            //'password' => 'required|min:6|confirmed',
            'password' => 'required|min:6',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postLogin(Request $request) {
        $rules = array(
            'email'     => 'required|email',
            'password'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $credentials['email']       = $request->email;
        $credentials['password']    = $request->password;

        if (Auth::attempt($credentials)) {
            //check if OTP is verified
            $status         = Auth::guard('user')->user()->status;
            if($status) {
                return Redirect::route('home');    
            }else if(!$status) {
                return 'You are disabled ! Please contact administrator !';
            }
            return 'Error !';
        }else{
            $message = 'Unable to log in. Check your credentials';
            $alert_class = 'alert-danger';
            return Redirect::to('/login')
                ->with(['message' => $validator, 
                    'alert-class' => $alert_class]);
        }
    }
}
