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
					<li class="active">Registration</li>
				</ul>
				<h3 style="text-align: center;"> Registration</h3>	
				<hr>
				<br>
				<div class="well">
					@if ($errors->any())
					<div class="col-sm-12 text-center">
						<br>
						@foreach ($errors->all() as $error)
						<div style="color: red;">{{ $error }}</div>
						@endforeach
						<br>
					</div>
					@endif
					<div class="row">
						<form class="reg" method="post" action="/register">
							@csrf
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<input type="text" id="inputFname1" placeholder="First Name*" required="" name="firstname">
									</div>
								</div>
							</div>
							<div class="span5">
								<div class="control-group">
									<div class="controls">
										<input type="text" id="inputLnam" placeholder="Last Name*" required="" name="lastname">
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<input type="email" id="email" placeholder="Email*" required="" name="email" value="">
									</div>
								</div>
							</div>
							<div class="span5">
								<div class="control-group">
									<div class="controls">
										<input type="password" id="inputPassword" placeholder="Password*" required="" name="password">
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<input type="number" id="inputPhone" placeholder="Phone Number*" required="" name="phone">
									</div>
								</div>
							</div>
							<div class="span5">
								<div class="control-group">
									<div class="controls">
										<input type="password" id="inputPassword" placeholder="Password confirm*" required="" name="password_confirmation">
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<input type="text" id="inputStreet" placeholder="Street*" required="" name="street">
									</div>
								</div>
							</div>
							<div class="span5">
								<div class="control-group">
									<div class="controls">
										<input type="text" id="inputCity" placeholder="City*" required="" name="city">
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<input type="number" id="inputZip" placeholder="Zip*" required="" name="zip">
									</div>
								</div>
							</div>
							<div class="span5">
								<div class="control-group">
									<div class="controls">
										<input type="text" id="inputCountry" placeholder="Country*" required="" name="country">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-success pull-right rg-btn">Sign Up</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#email').on('change', function() {
			var value = $(this).val();
			var domain = '.hs-fulda.de';
			if (!emailDomainCheck(value)) {
				console.log(emailDomainCheck(value))
				alert('Please only use the email provided by the university!');
				$(this).val('');
			}
		});
	});

	function emailDomainCheck(email)
	{
		var parts = email.split('@');

		var domain = 'informatik.hs-fulda.de';
		var domain2 = 'verw.hs-fulda.de';

		if (parts.length) {
			if (parts[1] == domain || parts[1] == domain2) {
				return true;
			}
		}
		return false;
	}

</script>
@endsection