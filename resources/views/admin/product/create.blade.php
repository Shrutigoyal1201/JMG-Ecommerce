@extends('admin.master')

@section('content')
    
<div class="content-wrapper col-md-10">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product</h1>
            
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
                <h3 class="card-title">Fill Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('product/save')}}" enctype="multipart/form-data">

                @csrf
                
                <div class="card-body">
              
                  <div class="row">
                    <div class="col-md-6">
                      <label>Choose Category</label>
                      <div class="form-group">
                        <select class="form-control" name="category_id">
                          <option>Select Category</option>
                          @foreach($categories as $cat)
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Choose Subcategory</label>
                      <div class="form-group">
                        <select class="form-control" name="subcategory_id">
                          <option>Select Subcategory</option>
                          @foreach($subcategories as $subcat)
                              <option value="{{$subcat->id}}">{{$subcat->subcategory}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
                  </div>
                  <div class="form-group">
                    <label>Select Disease</label>
                    
                    <select id="mySelect" class="form-control">
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                    <input type="button" onclick="multipleFunc()" value="Select multiple options" class="form-control">

                    <script>
                             function multipleFunc() {
                                document.getElementById("mySelect").multiple = true;
                             }
                    </script>

                  </div>
                  <div class="form-group">
                    <label>Product Size</label>
                    <input type="text" class="form-control" name="product_size" placeholder="Enter product size">
                  </div>
                  <div class="form-group">
                    <label name="product_description" row="10" cols="10">Product Description</label>
                    <textarea class="form-control" id="summernote" name="product_description"></textarea>
                  </div>
                  <div class="form-group">
                    <label >Upload Product Image</label>
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
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter product name">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="product_quantity" placeholder="Enter product size">
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
