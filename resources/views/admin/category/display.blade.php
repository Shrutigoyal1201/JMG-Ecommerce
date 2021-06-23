@extends('admin.master')

@section('content')

@if(session('message'))

<p class="alert alert-primary text-center">
  {{session('message')}}
</p>

@endif

<div class="content-wrapper col-md-10">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View All Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- code start-->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th style="width: 40px">image</th>
                      {{-- <th>Change status</th> --}}
                      <th>Current status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $a)
                    <tr>
                      <td>{{$a->id}}</td>
                      <td>{{$a->name}}</td>
                      <td>{{$a->description}}</td>
                      <td><img src="{{url('/upload/'.$a->image)}}" style="height:100px; width:200px;">
                      </td>
                      {{-- <td>
                          <input type="button" class="btn btn-sm btn-outline-success" name="Available" value="Available">
                          <input type="button" class="btn btn-sm btn-outline-primary" name="Dormant" value="Dormant">
                          <input type="button" class="btn btn-sm btn-outline-danger" name="Not available" value="Not available">
                      </td> --}}
                      <?php  $status=$a['status'] ?>
                      <td>
                        @if($status=='1')
                        
                        <input type="button" class="btn btn-success" name="Available" value="Available">
                        
                        @elseif($status=='0')
                        
                        <input type="button" class="btn btn-danger" name="Not available" value="Not available">
                        
                        @endif
                    </td>
                      <td>
                        <a href="{{url('category/view/'.$a->id)}}">Show</a>
                        <a href="{{url('category/edit/'.$a->id)}}">Edit</a>
                        <a href="{{url('category/delete/'.$a->id)}}">Delete</a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
</section>
            <!-- /.card -->
    <!-- code end-->
    <!-- /.content-wrapper -->
</div>

@endsection