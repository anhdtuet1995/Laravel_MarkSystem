@extends('layouts.dashboard')

@section('content')
<div class="col-lg-5 col-lg-offset-1" >
    <h1><i class="fa fa-folder"></i> Quản lý môn học </h1>
    {{ Form::open(['method' => 'DELETE']) }}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Lựa chọn</th>
					<th>STT</th>
					<th>Môn học</th>
					<th>Học kỳ</th>
					<th>Năm học</th>
					<th>Chức năng quản lý</th>
				</tr>
			</thead>
			<tbody>
				@foreach($subjects as $subject)
				<tr>
					<td><input type="checkbox" name="selectMany[]" value="{{$subject->id}}"></td>
					<td>{{$i++}}</td>
					<th>{{$subject->subject_title}}</th>
					<td>{{$subject->getSemester($subject->semester_id)->semester_title}}</td>
					<td>{{$subject->getSemester($subject->semester_id)->getYear($subject->getSemester($subject->semester_id)->year_id)->year_title}}</td>
					<td>
						<a href="{{url('admin/subject/edit')."/".$subject->id}} " class="btn btn-info pull-left" style="margin-right: 3px;">Sửa</a>
			            {{ Form::open(['url' => 'admin/subject/' . $subject->id, 'method' => 'DELETE']) }}
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

    <h1><i class='fa fa-user'></i> Thêm môn học</h1>

    {{ Form::open(['role' => 'form', 'url' => '/admin/subject']) }}

    Lựa chọn học kỳ:
    <select class='form-control' name="semester" >
    	@foreach($semesters as $semester)
		<option value="{{$semester->id}}">{{$semester->semester_title}}</option>}
    	@endforeach
    </select>
	
	<div class='form-group'>
        {{ Form::label('subject', 'Môn học') }}
        {{ Form::text('subject', null, ['placeholder' => 'Môn học', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::submit('Xác nhận', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@stop