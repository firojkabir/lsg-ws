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
					<li class="active">Add Product</li>
				</ul>
				<h3 style="text-align: center;"> Add Product</h3>	
				<hr>
				<div class="well">
					<div class="row">
						@if ($errors->any())
							<div class="col-sm-12 text-center">
								<br>
								@foreach ($errors->all() as $error)
								<div style="color: red;">{{ $error }}</div>
								@endforeach
								<br>
							</div>
						@endif
						<form class="add_product" method="post" enctype="multipart/form-data" action="/add_product">
							@csrf
							<div class="span1"></div>
							<div class="span5">
								<div class="control-group">
									<div class="controls">
										<label for="title"><b>Product title<span style="color: red;">*</span></b></label>
										<input type="text" id="title" placeholder="" required="" name="title">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label for="price"><b>Product price<span style="color: red;">*</span></b></label>
										<input type="number" step="any" min="0.01" id="price" placeholder="" required="" name="price">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label for="image"><b>Product image 1<span style="color: red;">*</span></b></label>
										<input type="file" id="image" required="" name="image">
									</div>
								</div>
								<br>

								<div class="control-group">
									<div class="controls">
										<label for="image"><b>Product image 2</b></label>
										<input type="file" id="image1" name="image1">
									</div>
								</div>
								<br>

								<div class="control-group">
									<div class="controls">
										<label for="image"><b>Product image 3</b></label>
										<input type="file" id="image2" name="image2">
									</div>
								</div>
								<br>

							</div>
							<div class="span5">
								<div class="control-group">
									<div class="controls"><b>
										<label for="product_category"><b>Product category<span style="color: red;">*</span></b></label>
										<select name="category" id="product_category"  style="width: 80%;" required>
											<option value="">=== Choose product category ===</option>
											@foreach($categories as $c)
											<option value="{{ $c->id }}">{{ $c->name }}</option>
											@endforeach

										</select>
									</div>
									<br>
									<div class="control-group">
										<div class="controls">
											<label for="product_description"><b>Product description<span style="color: red;">*</span></b></label>
											<textarea name="description" placeholder="" required="" style="min-height: 130px; width: 70%;"></textarea>
										</div>
										<br>
									</div>
								</div>
							</div>
							<br><br>
							<button type="submit" class="btn pull-right upload-btn">Upload product</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection