@extends('layouts.frontend_base')

@section('content')
<div id="divImg">
	<img src="{{ asset('static/website/themes/images/fulda2.jpg') }}" alt="" class="img img-responsive">
</div>

<div id="mainBody">
	<div class="container">
		<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<li><a href="/">Home</a> <span class="divider">/</span></li>
					<li class="active">Login</li>
				</ul>
				<h3 style="text-align: center;"> Login</h3>	
				<hr>
				<br>
				<div class="well">
					@if ($errors->any())
					<div class="col-sm-12" style="text-align: center;">
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
					</div>
					@endif
					<div class="row">
						<div class="span4">

						</div>
						<div class="span6">
							<form class="form-horizontal loginFrm" method="post" action="/login">
								@csrf
								<div class="one control-group">								
									<input type="text" id="inputEmail" placeholder="Username or Email" name="email" value="{{ old('email') }}">
								</div>
								<br>
								<div class="two control-group">
									<input type="password" id="inputPassword" placeholder="Password" name="password">
								</div>
								<br>
								<div class="control-group">
									<label class="checkbox">
										<input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember"> Remember me
									</label>
									<p style="font-size: 15px;">New here? Then <b><a href="/register" style="color: darkslateblue;">Register</a> </b>first.</p>
								</div>
								<button type="submit" class="btn btn-success">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection