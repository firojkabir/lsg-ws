@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h4 class="box-title">Category List</h4>
				<a href="{{ route('a_categoryAdd') }}" class="btn  btn-primary btn-flat pull-right">Add new</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="" class="table table-striped">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;">Edit</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@php $i = $results->perPage() * ($results->currentPage()-1); @endphp
						@foreach ($results as $category)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $category->name }}</td>

							<td style="text-align: center;">@if($category->status)
								<a
								href="JavaScript:status('{{ route('a_categoryStatus',['id' => $category->id, 'value' => $category->status, 'status' => 'status' ]) }}')"><img src="{{ asset('admin_assets/admin_images/yes.gif') }}"></a>
								@else
								<a
								href="JavaScript:status('{{ route('a_categoryStatus',['id' => $category->id, 'value' => $category->status, 'status' => 'status']) }}')"><img src="{{ asset('admin_assets/admin_images/no.gif') }}"></a>
								@endif
							</td>

							<td style="text-align: center;">
								<a href="{{ route('a_categoryEdit', ['id' => $category->id ]) }}"><img src="{{ asset('admin_assets/admin_images/edit.gif') }}"></a>
							</td>

							<td style="text-align: center;">
								<a href="JavaScript:del('{{ route('a_categoryDelete', ['id' => $category->id]) }}')"><img src="{{ asset('admin_assets/admin_images/del.gif') }}"></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $results->links() }}
			</div>
		</div>
	</div>
</div>

@endsection