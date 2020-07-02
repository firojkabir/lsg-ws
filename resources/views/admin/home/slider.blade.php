@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h4 class="box-title">Slider List</h4>
				<a href="{{ route('a_sliderAdd') }}" class="btn  btn-primary btn-flat pull-right">Add new</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="" class="table table-striped">
					<thead>
						<tr>
							<th>SL</th>
							<th>Rank</th>
							<th>Title</th>
							<th style="text-align: center;">Link</th>
							<th style="text-align: center;">Image</th>
							<th style="text-align: center;">H.Status</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;">Edit</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@php $i = $results->perPage() * ($results->currentPage()-1); @endphp
						@foreach ($results as $slider)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $slider->rank }}</td>
							<td>{{ $slider->title }}</td>

							<td style="text-align: center;">@if($slider->morelink)
								<a target="_blank" href="{{ $slider->morelinkweb }}">{{ $slider->morelink }}</a>
								@endif
							</td>

							<td style="text-align: center;">@if($slider->image)
								<a href="{{ asset($slider->image_path.$slider->image) }}" target="_blank"><img src="{{ asset($slider->image_path.$slider->thumb) }}" width="50px" height="25px"></a>
								@endif
							</td>

							<td style="text-align: center;">@if($slider->hstatus)
								<a
								href="JavaScript:hstatus('{{ route('a_sliderStatus',['id' => $slider->id, 'value' => $slider->hstatus, 'status' => 'hstatus' ]) }}')"><img src="{{ asset('admin_assets/admin_images/yes.gif') }}"></a>
								@else
								<a
								href="JavaScript:hstatus('{{ route('a_sliderStatus',['id' => $slider->id, 'value' => $slider->hstatus, 'status' => 'hstatus']) }}')"><img src="{{ asset('admin_assets/admin_images/no.gif') }}"></a>
								@endif
							</td>

							<td style="text-align: center;">@if($slider->status)
								<a
								href="JavaScript:status('{{ route('a_sliderStatus',['id' => $slider->id, 'value' => $slider->status, 'status' => 'status' ]) }}')"><img src="{{ asset('admin_assets/admin_images/yes.gif') }}"></a>
								@else
								<a
								href="JavaScript:status('{{ route('a_sliderStatus',['id' => $slider->id, 'value' => $slider->status, 'status' => 'status']) }}')"><img src="{{ asset('admin_assets/admin_images/no.gif') }}"></a>
								@endif
							</td>

							<td style="text-align: center;">
								<a href="{{ route('a_sliderEdit', ['id' => $slider->id ]) }}"><img src="{{ asset('admin_assets/admin_images/edit.gif') }}"></a>
							</td>

							<td style="text-align: center;">
								<a href="JavaScript:del('{{ route('a_sliderDelete', ['id' => $slider->id]) }}')"><img src="{{ asset('admin_assets/admin_images/del.gif') }}"></a>
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