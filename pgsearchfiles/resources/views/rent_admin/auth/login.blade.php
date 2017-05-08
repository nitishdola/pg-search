@extends('layouts.admin_auth')

@section('content')
<form class="login-form" action="{{ url('/rent/admin/login') }}" method="post">
{{ csrf_field() }}
    <div class="form-title">
        <span class="form-title">OWNER'S LOGIN.</span>
    </div>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter your username and password. </span>
    </div>
    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> 
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-actions">
        <button type="submit" class="btn red btn-block uppercase">Login</button>
    </div>
    <p style="color:#701F25">
    Not yet registerd ? Register <a href="{{ url('rent/admin/register')}}" class="link">Here</a>
    </p>
    
</form>
@stop