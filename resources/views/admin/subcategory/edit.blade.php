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
              <form role="form" method="post" action="{{url('subcategory/update')}}>

                @csrf

                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label>Edit Category</label><br>
                      <select class="form-control" name="category_id">
                       <option>Select Category</option>
                          @foreach($categories as $cat)
                            <option value="{{$cat->id}}" {{$cat->id==$data->category_id ? 'selected' : ''}} >{{$cat->name}}</option>
                          @endforeach
                      </select>
                  </div>
                 
                  <div class="form-group">
                    <label>Subcategory</label>
                    <input type="text" class="form-control" name="subcategory" placeholder="Enter subcategory" value="{{$data->subcategory}}">
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