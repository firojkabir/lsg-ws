@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-title">Add New Slider Image</h4>
			</div>

			@if ($errors->any())
			<div class="col-sm-12 text-center">
				<br>
				@foreach ($errors->all() as $error)
				<div style="color: red;">{{ $error }}</div>
				@endforeach
				<br>
			</div>
			@endif

			<form class="form-horizontal" method="post" action="{{ route('a_sliderAdd') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">

					<div class="form-group">
						<label for="rank" class="col-sm-2 control-label">Rank</label>
						<div class="col-sm-2">
							<input type="number" class="form-control" id="rank" placeholder="" name="rank" required
								value="{{ old('rank') }}">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="title" name="title" placeholder="" required
								value="{{ old('title') }}">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Know More</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="morelink" placeholder="Link name"
								value="{{ old('morelink') }}">
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="morelinkweb" placeholder="Link web"
								value="{{ old('morelinkweb') }}">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Summery</label>
						<div class="col-sm-9">
							<textarea type="text" class="form-control" id="details"
								name="details">{{ old('details') }}</textarea>
							<script type="text/javascript">
								CKEDITOR.replace("details", {height:"200", width:"100%"});
							</script>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
						<div class="col-sm-4">
							<input type="file" class="form-control" id="" name="image">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
								tabindex="-1" aria-hidden="true" name="status">
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>

				</div>

				<div class="box-footer">
					<div class="col-sm-12">
						<div class="col-sm-4 col-md-offset-2">
							<button type="submit" class="btn btn-info"> Save </button>
						</div>
					</div>
				</div>
				<br>
			</form>
		</div>
	</div>
</div>

@endsection