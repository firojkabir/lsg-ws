@extends('layouts.login')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    @if ($errors->has('email'))
    <span class="help-block">
        <strong style="color: red;">{{ $errors->first('email') }}<br></strong>
    </span>
    @endif
    @if ($errors->has('password'))
    <span class="help-block">
        <strong style="color: red;">{{ $errors->first('password') }}</strong>
    </span>
    @endif
    <form action="{{ route('login') }}" method="post" id="register" name="register" onSubmit="return validateForm();">
        {{ csrf_field() }}
        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="text" class="form-control"  placeholder="username"  name="email" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" name="login"  class="btn btn-success btn-block btn-flat">Sign In</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-xs-12">
            <div class="text text-right" >

                {{-- <a href="{{ route('password.request') }}"><p><font color="red">Forgot Your Password ?</font></p></a> --}}
                <p><a href="">Go to Home Page</a></p>
            </div>
        </div>
    </div>
</div>

@endsection