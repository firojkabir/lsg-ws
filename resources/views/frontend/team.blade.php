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
						<li class="active">Team</li>
					</ul>
					<h3 style="text-align: center;"> Team members</h3>
  					<hr>
				</div>
			</div>
			<div class="team_card row">
				<div class="span4">
					<div class="card" style="width: 18rem; border: 1px solid grey; padding: 15px; height: 75%; width: 75%; text-align: center;">
    				  	<img class="card-img-top" src="{{ asset('static/website/themes/images/user.png') }}" alt="Card image cap" style="">
    				  	<br>
    				  	<div class="card-body">
    				    	<h3>Naeem Afzal​</h3>
    				    	<b>Front End</b>
    				  	</div>
    				</div>
				</div>
				<div class="span4">
					<div class="card" style="width: 18rem; border: 1px solid grey; padding: 15px; height: 75%; width: 75%; text-align: center;">
    				  	<img class="card-img-top" src="{{ asset('static/website/themes/images/user.png') }}" alt="Card image cap" style="">
    				  	<br>
    				  	<div class="card-body">
    				    	<h3>Emin Gasimov</h3>
    				    	<b>Github Master & Backend</b>
    				  	</div>
    				</div>
				</div>
				<div class="span4">
					<div class="card" style="width: 18rem; border: 1px solid grey; padding: 15px; height: 75%; width: 75%; text-align: center;">
    				  	<img class="card-img-top" src="{{ asset('static/website/themes/images/user.png') }}" alt="Card image cap" style="">
    				  	<br>
    				  	<div class="card-body">
    				    	<h3>Firoj Kabir</h3>
    				    	<b>Frontend Lead & Backend</b>
    				  	</div>
    				</div>
				</div>
			</div>
		</div>
	</div>
@endsection