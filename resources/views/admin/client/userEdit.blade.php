@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h4 class="box-title">USER Edit</h4>
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

			<form class="form-horizontal" method="post" action="{{ route('a_userEdit', ['id' => $user->id ]) }}"
				enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-6">
							<input type=text name="name" required value="{{ $user->name }}" maxlength="50" size=50
								class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-6">
							<input type=text name="email" required value="{{ $user->email }}" maxlength="250" size=86
								class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
							<input type="password" name="password" value="" maxlength="250" size=50
								class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-4">
							<input id="password-confirm" type="password" maxlength="250" size=50 class="form-control"
								name="password_confirmation">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-4">
							<input type="file" size=50 class="form-control" name="image">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Group</label>
						<div class="col-sm-2">

							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
								aria-hidden="true" name="group" required>
								<option value="">Select</option>
								<option value="admin" @if($user->group=='admin'): {{ 'selected' }} @endif>Admin</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-2">
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
								tabindex="-1" aria-hidden="true" name="status">
								<option value=1 @if($user->status==1): {{ 'selected' }} @endif >Yes</option>
								<option value=0 @if($user->status==0): {{ 'selected' }} @endif>No</option>
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