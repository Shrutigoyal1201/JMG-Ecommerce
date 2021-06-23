@extends('admin.master')

@section('content')
    
<div class="content-wrapper col-md-10">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Product</h1>
            
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
                <h3 class="card-title">Edit Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('product/update')}}" enctype="multipart/form-data">

                @csrf
                
                <div class="card-body">
              
                <input type="hidden" name="id" value="{{$data->id}}">
                
                 <div class="row">
                    <div class="col-md-6">
                      <label>Edit Category</label>
                      <div class="form-group">
                        <select class="form-control" name="category_id">
                          <option>Select Category</option>
                          @foreach($categories as $cat)
                              <option value="{{$cat->id}}" {{$cat->id==$data->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Edit Subcategory</label>
                      <div class="form-group">
                        <select class="form-control" name="subcategory_id">
                          <option>Select Subcategory</option>
                          @foreach($subcategories as $subcat)
                              <option value="{{$subcat->id}}" {{$cat->id==$data->subcategory_id ? 'selected' : ''}}>{{$subcat->subcategory}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter product name" value="{{$data->product_name}}">
                  </div>
                  <div class="form-group">
                    <label>Product Size</label>
                    <input type="text" class="form-control" name="product_size" placeholder="Enter product size" value="{{$data->product_size}}">
                  </div>
                  <div class="form-group">
                    <label name="product_description" row="10" cols="10">Product Description</label>
                    <textarea class="form-control" id="summernote" name="product_description">{{$data->product_description}}</textarea>
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <label >Update Product Image</label>
                            <img src="{{url('/upload/'.$data->image)}}" class="img-fluid">
                            <br>
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
                    <br>

                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter product name" value="{{$data->product_price}}">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="product_quantity" placeholder="Enter product size" value="{{$data->product_quantity}}">
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