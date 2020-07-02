@extends('layouts.login')

@section('content')
<div class="login-box-body">

    <p class="login-box-msg">Enter your Account Email address</p>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-sm-3 control-label">E-Mail</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Send Password Reset Link
                </button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-xs-12">
            <div class="text text-right" >
                <p><a href="{{ route('admin') }}">Go to Home Page<hr></a></p>
            </div>
        </div>
    </div>
</div>
@endsection