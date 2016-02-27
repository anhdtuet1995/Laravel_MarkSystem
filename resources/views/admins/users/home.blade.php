@extends('layouts.app')

@section('title') Users @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1" >

    <h1><i class="fa fa-users"></i> Quản lý giáo viên </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Ngày tạo tài khoản</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        <a href="{{url('admin/user') .'/'. $user->id . '/edit'}} " class="btn btn-info pull-left" style="margin-right: 3px;">Sửa</a>
                        {{ Form::open(['url' => 'admin/user/' . $user->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Xóa', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{url('admin/user/create')}}" class="btn btn-success">Thêm giáo viên</a>

</div>

@stop
