@extends('admin.master')

@section('content')
    
<div class="content-wrapper col-md-10">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add SubCategory</h1>
            
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add SubCategories</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('subcategory/save')}}">

                @csrf

                <div class="card-body">
                  <label>Choose Category</label>
                  <div class="form-group">
                    <select class="form-control" name="category_id">
                      <option>Select Category</option>
                      @foreach($categories as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Subcategory</label>
                    <input type="text" class="form-control" name="subcategory" placeholder="Enter subcategory">
                  </div>
                  
                </div>
        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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