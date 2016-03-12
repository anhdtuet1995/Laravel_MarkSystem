@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tra cứu điểm thi</div>

                <div class="panel-body">
                    <div class="col-md-4">
                        <select name="year" id="year" class="form-control">
                            <option value="1">Năm 2014</option>
                        </select>    
                    </div>
                    <div class="col-md-4">
                        <select name="semester" id="semester" class="form-control">
                            <option value="1">Học kỳ một</option>
                        </select>    
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="mamh" value="1" placeholder="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
