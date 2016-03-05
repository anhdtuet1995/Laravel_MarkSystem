@extends('layouts.dashboard')

@section('title') Users @stop

@section('content')
@role('admin')
<div class="col-lg-10 col-lg-offset-1" >
    <h1><i class="fa fa-folder"></i> Quản lý file điểm </h1>

    <form action="{{url('admin/post/add')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        Năm học: <select id="year" name="year">
        <option value="0">Lựa chọn năm học</option>
        @foreach($years as $year)
        <option value="{{$year->id}}">{{$year->year_title}}</option>
        @endforeach
        </select><br>
        Kỳ học: <select name="semester" id="semester" onChange="">
        <option value="0">Lựa chọn học kỳ</option>
        </select><br>
        Môn học: <select name="subject" id="subject">
        <option value="0">Lựa chọn môn học</option>
        </select>
        <br>
        Nhập tên file:
        <input type="text" name="name"><br>
        <input type="file" name="filefield"><br>
        <input type="submit">
    </form>

    <h1> Pictures list</h1>
     <div class="row">
            <ul>
     @foreach($entries as $entry)
            <li><a href="{{url('admin/post/get/')."/".$entry->filename}}" title="">{{$entry->original_filename}}</a>
            <a href="{{url('admin/post/edit')."/".$entry->id}}">Edit</a></li>
            <a href="{{url('admin/post/delete/')."/".$entry->filename}}">Delete</a></li>
     @endforeach
     <br>
     <ul class="pagination pull-left">
        @if($entries->currentPage() > 1)
        <li><a href="{{ $entries->url($entries->currentPage() -1 )}}">Prev</a></li>
        @endif
        @for($i = 1; $i <= $entries->lastPage(); $i++)
        <li class="{!! $entries->currentPage() == $i ? 'active' : '' !!}">
            <a href="{!! $entries->url($i) !!}">{{ $i }}</a>
        </li>
        @endfor
        @if($entries->currentPage() < $entries->lastPage())
        <li><a href="{{ $entries->url($entries->currentPage() +1 )}}">Next</a></li>
        @endif
     </ul>
     </div>
</div>


<script type="text/javascript" charset="utf-8" async defer>
    $('#year').on('change', function(e){
        console.log(e);

        var year_id = e.target.value;

        $.get('{{url('admin/post/ajax-submenu')}}' + '?year_id=' + year_id, function(data){
            $('#semester').empty();
            $('#semester').append('<option value=0>Lựa chọn học kỳ</option>');
            $.each(data, function(index, semesterObj){
                $('#semester').append('<option value='+semesterObj.id+'>'+semesterObj.semester_title+'</option>');
            });
        });
    });

    $('#semester').on('change', function(e){
        console.log(e);

        var year_id = e.target.value;
        var semester_id = e.target.value;

        $.get('{{url('admin/post/ajax-submenu2')}}'+ '?year_id='+ year_id +'&semester_id=' + semester_id, function(data){
            $('#subject').empty();
            $('#subject').append('<option value=0>Lựa chọn môn học</option>');
            $.each(data, function(index, subjectObj){
                $('#subject').append('<option value='+subjectObj.id+'>'+subjectObj.subject_title+'</option>');
            });
        });
    });

</script>



@endrole
@stop
