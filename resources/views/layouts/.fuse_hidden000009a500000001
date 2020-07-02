<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LetStuffGo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="{{ asset('static/website/themes/images/ico/favicon.ico') }}">

	<script src="{{ asset('static/website/themes/js/less.js" type="text/javascript') }}"></script> 	
	<!-- Bootstrap style --> 
	<link id="callCss" rel="stylesheet" href="{{ asset('static/website/themes/bootshop/bootstrap.min.css') }}" media="screen"/>
	<link href="{{ asset('static/website/themes/css/base.css') }}" rel="stylesheet" media="screen"/>
	<!-- Bootstrap style responsive -->	
	<link href="{{ asset('static/website/themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('static/website/themes/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->	
	<link href="{{ asset('static/website/themes/js/google-code-prettify/prettify.css') }}" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div id="header">
		<div class="container">
			<div id="welcomeLine" class="row">
				<div class="span6">
					@if(Auth::guard('client')->check())
					Hello {{ Auth::guard('client')->user()->firstname.' '.Auth::guard('client')->user()->lastname.',' }}
					@endif
					Welcome to <strong> LetStuffGo</strong></div>
					<div class="span6">
						<div class="pull-right">
							<a href="/cart-summery"><span class="btn cart_btn"><i class="icon-shopping-cart icon-white"></i> [ <span id="cart-counter">{{ Cart::count() }}</span> ] Cart </span> </a> 
						</div>
					</div>
				</div>
				<!-- ****** Navbar ****** -->
				<div id="logoArea" class="navbar">
					<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-inner">
						{{-- <a class="brand" href="/"><img class="pull-left" src="{{ asset('static/website/themes/images/logo.png') }}" alt="LetStuffGo"/></a> --}}
						<a class="brand" href="/" style="color: #BBDEFB;"><p class="pull-left">Let<span style="color: red; font-size: 25px;">Stuff</span>Go</p></a>
						<form class="form-inline navbar-search pull-left" method="get" action="/search">
							<input id="srchFld" class="srchTxt" placeholder="search" type="text" name="text"/>
							<button type="submit" id="submitButton" class="btn"><i class="fa fa-search"></i></button>
						</form>
						<ul id="topMenu" class="nav pull-right">
							<li class=""><a href="/">Home</a></li>
							<li class=""><a href="/contact">Contact</a></li>
							<li class=""><a href="/team">Team</a></li>
							@if(Auth::guard('client')->check())
							<li class=""><a href="/profile">Profile</a></li>
							<li class="">
								<a href="/logout" role="button" style="padding-right:0"><span class="btn btn-large btn-danger"><i class="fa fa-sign-out"></i></span></a>
							</li>
							@else
							<li>
								<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success"><i class="fa fa-sign-in"></i></span></a>
								<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h3 style="text-align: center;">Login</h3>
									</div>
									<div class="modal-body">
										<form class="form-horizontal loginFrm" method="post" action="/login">
											@csrf
											<div class="one control-group">								
												<input type="text" id="inputEmail" placeholder="Username or Email" name="email">
											</div>
											<br>
											<div class="two control-group">
												<input type="password" id="inputPassword" placeholder="Password" name="password">
											</div>
											<br>
											<div class="control-group">
												<label class="checkbox">
													<input type="checkbox"> Remember me
												</label>
												<p style="font-size: 15px;">New here? Then <b><a href="/register" style="color: darkslateblue;">Register</a> </b>first.</p>
											</div>
											<button type="submit" class="btn btn-success">Login</button>
											<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										</form>		
									</div>
								</div>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- ******* Header End ****** -->

		@yield('content')

		<!-- ****** Footer part start ****** -->
		<div  id="footerSection">
			<div class="container">
				<div class="row">
					<div class="span6 pull-left">
						<p class="">&copy; Copyright reserved by <b>GDSD-G6</b>, 2019</p>
					</div>
					<div id="socialMedia" class="span6 pull-right">
						{{-- <h5>SOCIAL MEDIA </h5> --}}<span>Follow us: </span>
						<a class="fb" href="www.facebook.com"><i class="fa fa-facebook" style="font-size:30px;"></i></a>
						<a class="youtube" href="www.youtube.com"><i class="fa fa-youtube" style="font-size:30px;"></i></a>
					</div>
				</div>
				<br>
			</div>
			<!-- ****** Container End ****** -->
		</div>
		<!-- ****** Footer part end ****** -->

		<!-- Placed at the end of the document so the pages load faster ============================================= -->
		<script src="{{ asset('static/website/themes/js/jquery.js') }}" type="text/javascript"></script>
		<script src="{{ asset('static/website/themes/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('static/website/themes/js/google-code-prettify/prettify.js') }}"></script>
		<script src="{{ asset('static/website/themes/js/bootshop.js') }}"></script>
		<script src="{{ asset('static/website/themes/js/jquery.lightbox-0.5.js') }}"></script>


		<script type="text/javascript">
			$(document).ready(function(){
				$('.add-to-cart').on('click', function() {
					var id = $(this).attr("id");
					console.log(id);
					$.ajax({
						url: "{{ route('client.cart.add') }}",
						type: 'post',
						data: { '_token':'{{ csrf_token() }}', "id": id},
						success: function (response) {
							if(response =='0'){
								alert("Something went wrong!");
							}else{
								$('#cart-counter').html(response);
								alert("Product successfully added to cart!");
							}
						}
					});
				});

				$('.cart-remove').on('click', function() {
					var id = $(this).attr("id");
					console.log(id);
					$.ajax({
						url: "{{ route('client.cart.delete') }}",
						type: 'post',
						data: { '_token':'{{ csrf_token() }}', "id": id},
						success: function (response) {
							alert(response);
							location.reload();
						}
					});
				});
			});

		</script>
		@yield('scripts')

	</body>
	</html>