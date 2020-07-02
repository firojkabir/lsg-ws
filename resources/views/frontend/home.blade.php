@extends('layouts.frontend_base')

@section('content')

	@include('frontend.include.slider')


	<!-- ****** Body part start ****** -->
	<div id="mainBody">
		<div class="container">
			<div class="row">
				
				<!-- ****** Sidebar start ****** -->
				@include('frontend.include.sidebar')
				<!-- ******* Sidebar end ******* -->

				<!-- ****** Product div start ****** -->
				@include('frontend.include.mainbody')
				<!-- ****** Product div end ****** -->

			</div>
		</div>
	</div>
	<!-- ****** Body part end ****** -->

@endsection