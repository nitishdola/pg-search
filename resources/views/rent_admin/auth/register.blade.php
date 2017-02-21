@extends('layouts.admin_auth')

@section('content')
<form class="register-form" action="{{ url('/rent/admin/register') }}" method="post">
{{ csrf_field() }}
      <div class="form-title">
        <span class="form-title">Sign Up</span>
      </div>
      <p class="hint"> Enter your personal details below: </p>
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">Full Name</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" value="{{ old('name') }}" autocomplete="off" required="true" />
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif 
      </div>
      <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Phone Number</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Phone Number" name="phone_number" autocomplete="off" required="true" /> 
        @if ($errors->has('phone_number'))
            <span class="help-block">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">Address</label>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Address" name="address" required="true" /> 
         @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Choose a Username" name="username" autocomplete="off" required="true" /> 
            @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control placeholder-no-fix" autocomplete="off" type="password" placeholder="Password" name="password" required="true" /> 
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
      </div>

      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
            <input class="form-control placeholder-no-fix" type="password" placeholder="Password" name="password_confirmation" autocomplete="off" required="true" /> 
            @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
      </div>

    
      <div class="form-group margin-top-20 margin-bottom-20">
        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="tnc" id="tnc" /> I agree to the
            <a href="javascript:;">Terms of Service </a> &
            <a href="javascript:;">Privacy Policy </a>
            <span></span>
        </label>
        <div id="register_tnc_error"> </div>
      </div>
      <div class="form-actions">
        <button type="submit" disabled="disabled" id="register-submit-btn" class="btn red uppercase">Register
        </button>
    </div>
</form>

@stop