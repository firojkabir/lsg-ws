@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h4 class="box-title">Client List</h4>
            </div>            
            <!-- /.box-header -->
            {{-- {{ Request::getClientIp(true) }} --}}
            <div class="box-body">
                <table id="" class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th style="text-align: center;">Firstname</th>
                            <th style="text-align: center;">Lastname</th>
                            <th style="text-align: center;">email</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $client->perPage() * ($client->currentPage()-1); @endphp
                        @foreach ($client as $client_data)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td style="text-align: center;">{{ $client_data->firstname }}</td>
                            <td style="text-align: center;">{{ $client_data->lastname }}</td>
                            <td style="text-align: center;">{{ $client_data->email }}</td>
                            <td style="text-align: center;">@if($client_data->status)
                                <a href="JavaScript:status('{{ route('a_clientStatus',['id' => $client_data->id, 'value' => $client_data->status, 'status' => 'status' ]) }}')"><img src="{{ asset('admin_assets/admin_images/yes.gif') }}"></a>
                                @else
                                <a href="JavaScript:status('{{ route('a_clientStatus',['id' => $client_data->id, 'value' => $client_data->status, 'status' => 'status']) }}')"><img src="{{ asset('admin_assets/admin_images/no.gif') }}"></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $client->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection




