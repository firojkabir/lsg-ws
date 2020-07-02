@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h4 class="box-title">User List</h4>
                <a href="{{ route('a_userAdd') }}" class="btn  btn-primary btn-flat pull-right">Add new</a>
            </div>            
            <!-- /.box-header -->
            {{-- {{ Request::getClientIp(true) }} --}}
            <div class="box-body">
                <table id="" class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>username</th>
                            <th style="text-align: center;">email</th>
                            <th style="text-align: center;">Group</th>
                            <th style="text-align: center;">Image</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $user->perPage() * ($user->currentPage()-1); @endphp
                        @foreach ($user as $user_data)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td >{{ $user_data->name }}</td>
                            <td style="text-align: center;">{{ $user_data->email }}</td>
                            <td style="text-align: center; color: red;">{{ ucwords($user_data->group) }}</td>

                            <td style="text-align: center;">@if ($user_data->image)
                                <a target="_blank"
                                href="{{ asset($user_data->image_path.$user_data->image) }}">
                                <img src="{{ asset($user_data->image_path.$user_data->image) }}"
                                class="img-circle" width="30px" height="30px"></a>
                                @endif
                            </td>

                            <td style="text-align: center;">@if($user_data->status)
                                <a href="JavaScript:status('{{ route('a_userStatus',['id' => $user_data->id, 'value' => $user_data->status, 'status' => 'status' ]) }}')"><img src="{{ asset('admin_assets/admin_images/yes.gif') }}"></a>
                                @else
                                <a href="JavaScript:status('{{ route('a_userStatus',['id' => $user_data->id, 'value' => $user_data->status, 'status' => 'status']) }}')"><img src="{{ asset('admin_assets/admin_images/no.gif') }}"></a>
                                @endif
                            </td>

                            <td style="text-align: center;"><a href="{{ route('a_userEdit', ['id' => $user_data->id]) }}"><img src="{{ asset('admin_assets/admin_images/edit.gif')}}"/></a>
                            </td>

                            <td style="text-align: center;"><a href="JavaScript:del('{{ route('a_userDelete', ['id' => $user_data->id]) }}')"><img src="{{ asset('admin_assets/admin_images/del.gif') }}"></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection




