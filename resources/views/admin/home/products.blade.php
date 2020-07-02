@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h4 class="box-title">Product List</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="" class="table table-striped">
					<thead>
						<tr>
							<th>SL</th>
							<th>Title</th>
							<th style="text-align: center;">Category</th>
							<th style="text-align: center;">Price</th>
							<th style="text-align: center;">Description</th>
							<th style="text-align: center;">Status</th>
						</tr>
					</thead>
					<tbody>
						@php $i = $results->perPage() * ($results->currentPage()-1); @endphp
						@foreach ($results as $product)
						<tr>
							<td>{{ ++$i }}</td>
							<td><a target="_blank" href="/product-details/{{ $product->id }}">{{ $product->title }}</a></td>
							<td style="text-align: center;">{{ $product->name }}</td>
							<td style="text-align: center;">&euro;{{ $product->price }}</td>
							<td style="text-align: center;">{{ $product->description }}</td>

							<td style="text-align: center;">@if($product->status)
								<a
								href="JavaScript:status('{{ route('a_productsStatus',['id' => $product->id, 'value' => $product->status, 'status' => 'status' ]) }}')"><img src="{{ asset('admin_assets/admin_images/yes.gif') }}"></a>
								@else
								<a
								href="JavaScript:status('{{ route('a_productsStatus',['id' => $product->id, 'value' => $product->status, 'status' => 'status']) }}')"><img src="{{ asset('admin_assets/admin_images/no.gif') }}"></a>
								@endif
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