@extends('admin.master');

@section('content')
    
<div class="container">
    <div class="content-wrapper">
        <br><br>
        <h4>Title:{{$data->title}}</h4><br>
        <h4>URL:<textarea class="form-control">{{$data->url}}</textarea></h4><br>
        <h4>Image:<img src="{{url('/upload/'.$data->image)}}" class="img-fluid"></h4><br>
    </div>
</div>

@endsection