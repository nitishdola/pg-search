@extends('layouts.user_auth')

@section('content')
<div class="login-content" id="login">
    <h1>Login to Enrollspace</h1>
    <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Enter username and password. </span>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Username" name="email" required/> 
            </div>
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" /> Remember me
                    <span></span>
                </label>
            </div>
            <div class="col-sm-8 text-right">
                <div class="forgot-password">
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
                <button class="btn blue" type="submit">Sign In</button>
                <p>
                New User ? <a href="javascript:;" id="signup-view" class="btn-link">Sign Up</a> here
                </p>
            </div>
        </div>
    </form>
    <form class="forget-form" action="javascript:;" method="post">
        <h3>Forgot Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
            <button type="submit" class="btn blue uppercase pull-right">Submit</button>
        </div>
    </form>
</div>


<div class="login-content" id="signup" style="display: none">
    <h1>Signup</h1>
    <form class="login-form" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Enter username and password. </span>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Enter Your Full Name" name="name" required/> 
            </div>
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="number" autocomplete="off" placeholder="Enter Your Mobile Number" name="mobile_number" required/> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Enter Your Email ID" name="email" required/> 
            </div>
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Choose a Password" name="password" required/> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8 text-right">
                <button class="btn blue" type="submit">Sign Up</button>
                <p>
                    Already have an account?  <a href="javascript:;" id="login-view" class="btn-link">Sign In</a> here
                </p>
            </div>
        </div>
    </form>
</div>
@endsection
