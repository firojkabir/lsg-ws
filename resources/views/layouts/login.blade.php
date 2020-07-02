<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>LSG</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Favicon -->
	{{-- <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}"> --}}
	<link rel="shortcut icon" href="{{ asset('admin_assets/admin_images/favicon.ico') }}">
	<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/dist/css/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/plugins/iCheck/square/blue.css') }}">

</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<br />
		<div class="login-logo" style="background:#FFFFFF ">
			<a href=""><img  src="{{ asset('admin_assets/admin_images/logo.png') }}"></a>
			<h2 class="text-custom" style="padding-top:0px; margin-top:10px;"> LetStuffGo :: ADMIN LOGIN</h2>
		</div>
		@yield('content')
	</div>
</body>
<script src="{{ asset('admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/iCheck/icheck.min.js') }}"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' 
		});
	});
</script>
</html>