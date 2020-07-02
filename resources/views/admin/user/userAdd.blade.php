@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-title">Add New USER</h4>
			</div>

			@if ($errors->any())
			<div class="col-sm-12 text-center">
				@foreach ($errors->all() as $error)
				<div style="color: red;">{{ $error }}</div>
				@endforeach
			</div>			
			@endif

			<form class="form-horizontal" method="post" action="{{ route('a_userAdd') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-6">
							<input type=text name="name" required value="{{ old('name') }}" maxlength="50" size=50 class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-6">
							<input type=text name="email"  required value="{{ old('email') }}" maxlength="250" size=86 class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
							<input type="password" name="password" required value="" maxlength="250" size=50 class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-4">
							<input id="password-confirm" type="password" maxlength="250" size=50 class="form-control" name="password_confirmation" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-4">
							<input  type="file"  size=50 class="form-control" name="image">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Group</label>
						<div class="col-sm-2">

							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true" name="group" required>
								<option value="" >Select</option>
								<option value="admin">Admin</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
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
