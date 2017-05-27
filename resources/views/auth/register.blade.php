@extends('layouts.auth')

@section('auth_content')
<form method="post" action="{{ route('register') }}">
    {{ csrf_field() }}

    <h1>Create Account</h1>

    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
@if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
@endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

@if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
@endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

@if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
@endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

@if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
@endif
    </div>
    <div>
        <button class="btn btn-default submit" >Register</button>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="separator">
        <p class="change_link">Already a member ?
            <a href="{{ route('login') }}" class="to_register"> Log in </a>
        </p>
        
        <div class="clearfix"></div>
        <br />
        
        <div>
            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
        </div>
    </div>
</form>
@endsection