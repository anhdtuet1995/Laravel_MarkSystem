@extends('layouts.dashboard')

@section('content')
<div class="col-lg-5 col-lg-offset-1" >
    <h1><i class="fa fa-folder"></i> Quản lý kỳ học </h1>
    {{ Form::open(['method' => 'DELETE']) }}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Lựa chọn</th>
					<th>STT</th>
					<th>Học kỳ</th>
					<th>Năm học</th>
					<th>Chức năng quản lý</th>
				</tr>
			</thead>
			<tbody>
				@foreach($semesters as $sem)
				<tr>
					<td><input type="checkbox" name="selectMany[]" value="{{$sem->id}}"></td>
					<td>{{$i++}}</td>
					<td>{{$sem->semester_title}}</td>
					<td>{{$sem->getYear($sem->year_id)->year_title}}</td>
					<td>
						<a href="{{url('admin/semester/edit')."/".$sem->id}} " class="btn btn-info pull-left" style="margin-right: 3px;">Sửa</a>
			            {{ Form::open(['url' => 'admin/semester/' . $sem->id, 'method' => 'DELETE']) }}
			            {{ Form::submit('Xóa', ['class' => 'btn btn-danger'])}}
			            {{ Form::close() }}
		            </td>
		            
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{ Form::submit('Xóa nhiều', ['class' => 'btn btn-danger'])}}
	{{ Form::close() }}


</div>	

<div class="col-lg-5 col-lg-offset-1" >
	@if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h1><i class='fa fa-user'></i> Thêm năm học</h1>

    {{ Form::open(['role' => 'form', 'url' => '/admin/semester']) }}

    Lựa chọn học kỳ:
    <select class='form-control' name="year" >
    	@foreach($years  as $year)
		<option value="{{$year->id}}">{{$year->year_title}}</option>}
		option
    	@endforeach
    </select>
	
	<div class='form-group'>
        {{ Form::label('semester', 'Kỳ học') }}
        {{ Form::text('semester', null, ['placeholder' => 'Kỳ học', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::submit('Xác nhận', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@stop