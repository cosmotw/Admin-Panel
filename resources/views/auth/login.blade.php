@extends('layouts.auth')

@section('auth_content')
<form method="post" action="{{ route('login') }}">
    {{ csrf_field() }}

    <h1>Login Form</h1>
    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
@if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
@endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
@if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
@endif
    </div>
    <div>
        <input type="submit" class="btn btn-default submit" value="Log in">
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <div class="clearfix"></div>
        <br />

        <div>
            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
        </div>
    </div>
</form>
@endsection