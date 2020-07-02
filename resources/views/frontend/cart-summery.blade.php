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

				<div class="cart_summery span9">
					<ul class="breadcrumb">
						<li><a href="index.html">Home</a> <span class="divider">/</span></li>
						<li class="active"> SHOPPING CART</li>
					</ul>
					<h4>  SHOPPING CART<a href="/products" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h4>
					<hr class="soft"/>
					@php
						$items = Cart::content();
					@endphp

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Action</th>
								<th>Description</th>
								<th>Quantity/Update</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($items as $row)
							<tr>
								<td><a href="#" class="btn btn-danger cart-remove" id="{{ $row->rowId }}" style="font-size: 15px; padding: 3px;">Remove</a></td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->qty }}</td>
								<td>&euro;{{ $row->price }}</td>
								<td>&euro;{{ $row->price*$row->qty }}</td>
							</tr>
							@endforeach
							<tr {{-- style="empty-cells: hide;" --}}>
								<td></td>
								<td></td>
								<td></td>
								<td><b>Subtotal:</b></td>
								<td>&euro;{{ Cart::subtotal() }}</td>
							</tr>
						</tbody>
					</table>
					<a href="/confirm_order" class="btn btn-success pull-right">Confirm order</a>
				</div>
			</div>
		</div>
	</div>


@endsection