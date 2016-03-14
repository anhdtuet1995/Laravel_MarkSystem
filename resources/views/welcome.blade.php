@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{url('/search')}}" method="post" accept-charset="utf-8">
            <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tra cứu điểm thi</div>

                <div class="panel-body">
                    <div class="col-md-4">
                        Năm học:
                        <select name="year" id="year" class="form-control">
                            @foreach($years as $year)
                            <option value="{{$year->id}}"
                                <?php if(isset($_POST['year']) && $_POST['year'] == '{{$year->id}}') echo ' selected="selected"';?>>{{$year->year_title}}</option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="col-md-4">
                        Kỳ học: 
                        <select name="semester" id="semester" class="form-control">
                            <option value="1">Học kỳ một</option>
                        </select>    
                    </div>
                    <div class="col-md-4">
                        Nhập môn học cần tìm: 
                        <input class="form-control" type="text" name="mamh" value="" placeholder="">
                        <button type="submit">Submit</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã lớp môn học</th>
                                    <th>Tên môn học</th>
                                    <th>File điểm thi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach($results as $re)
                                    <tr>
                                    <td>{{$re->subject_code}}</td>

                                    <td>{{$re->subject_title}}</td>
                                    <td>
                                        @if($re->hasMark())
                                            <a href="{{url('/get/')."/".$re->getMark()->filename}}" title="">{{$re->getMark()->original_filename}}
                                            </a>
                                        @else
                                            <?php echo "Chưa có điểm" ?>
                                        @endif
                                    </td>
                                    {{-- <td><a href="{{url('/get/')."/".$file->filename}}" title="">{{$file->original_filename}}</a></td>
                                    
                                     </tr> --}}
                                 </tr>
                                    @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        </form>
        
        
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $('#year').on('change', function(e){
        console.log(e);

        var year_id = e.target.value;

        $.get('{{url('/ajax-submenu')}}' + '?year_id=' + year_id, function(data){
            $('#semester').empty();
            $('#semester').append('<option value=0>Lựa chọn học kỳ</option>');
            $.each(data, function(index, semesterObj){
                $('#semester').append('<option value='+semesterObj.id+'>'+semesterObj.semester_title+'</option>');
            });
        });
    });
</script>
@endsection
