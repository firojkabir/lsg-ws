@extends('layouts.frontend_base')

@section('content')
	<div id="divImg">
		<img src="{{ asset('static/website/themes/images/fulda2.jpg') }}" alt="" class="img img-responsive">
	</div>

	<!-- ****** Body part start ****** -->
	<div id="mainBody">
		<div class="container">
			<div class="row">
				
				<!-- ****** Sidebar start ****** -->
				@include('frontend.include.sidebar')
				<!-- ******* Sidebar end ******* -->

				<div class="span9">
					<ul class="breadcrumb">
						<li><a href="index.html">Home</a> <span class="divider">/</span></li>
						<li class="active">Products</li>
					</ul>
					<h3>{{ $search }}</h3>
					<hr class="soft"/>
					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails">
							@foreach($results as $r)
							<li class="span3">
								<div class="thumbnail">
									<a target="_blank" href="/product-details/{{ $r->id }}"><img src="{{ asset($r->path.$r->thumb) }}" alt=""/></a>
									<div class="caption">
										<h5>{{ $r->title }}</h5>
										<p>{{ $r->name }}</p>
										<h4 style="text-align:center"><a class="btn" href="/product-details/{{ $r->id }}"> <i class="icon-zoom-in"></i></a> <a class="btn add-to-cart" id="{{ $r->id }}" href="#" style="background-color: #F4B94B;">Add to <i class="icon-shopping-cart"></i></a> <a class="btn" href="#">&euro;{{ $r->price }}</a></h4>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
						<hr class="soft"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ****** Body part end ****** -->

@endsection