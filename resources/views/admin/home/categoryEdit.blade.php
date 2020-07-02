@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-name">Edit Category</h4>
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

			<form class="form-horizontal" method="post" action="{{ route('a_categoryEdit', ['id' => $result->id ]) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" name="name" placeholder="" required value="{{ $result->name }}">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
								<option value="1" @if($result->status==1) {{ 'selected' }} @endif>Yes</option>
								<option value="0" @if($result->status==0) {{ 'selected' }} @endif>No</option>
							</select>
						</div>
					</div>

				</div>

				<div class="box-footer">
					<div class="col-sm-12"> 
						<div class="col-sm-4 col-md-offset-2">
							<button type="submit" class="btn btn-info"> Update </button>
						</div>
					</div>
				</div>
				<br>
			</form>
		</div>
	</div>
</div>

@endsection