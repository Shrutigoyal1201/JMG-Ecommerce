@extends('admin.master');

@section('content')
    
<div class="container col-md-10">
    <div class="content-wrapper">
        <br><br>
        <h4>Name:{{$data->name}}</h4><br>
        <h4>Description:<textarea class="form-control">{{$data->description}}</textarea></h4><br>
        <h4>Image:<img src="{{url('/upload/'.$data->image)}}" class="img-fluid"></h4><br>
        <h4>Status:<br><input type="button" class="btn btn-info" value="{{$data->status}}" ></h4>
    </div>
</div>

@endsection