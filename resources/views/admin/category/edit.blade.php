@extends('admin.master')

@section('content')
    
<div class="content-wrapper col-md-10">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category Details</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- code start-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('category/update')}}" enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$data->name}}">
                  </div>
                  <div class="form-group">
                    <label name="description" row="10" cols="10">Description</label>
                    <textarea class="form-control" name="description">{{$data->description}}</textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <label>Update existing Image:</label>
                        <img src="{{url('/upload/'.$data->image)}}" class="img-fluid"><br>
                        <div class="form-group">
                          <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      
                    </div>
                  </div>
                </div>
        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
              </form>

              @if(session('message'))

              <p class="alert alert-success">
                {{session('message')}}
              </p>

              @endif
              
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