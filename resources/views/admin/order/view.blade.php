@extends('admin.master');

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order Detail</h3>

         
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Order Status</span>
                      <span class="info-box-number text-center text-muted mb-0">Pending</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Order Total</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$data->grand_total}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Order Placed at</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$data->created_at}}<span>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <h4>Products Ordered</h4>
                    	<table class="table table-responsive">
	                        
	                        <thead>
	                        	<tr>
		                        	<th class="col-md-1">Image</th>
		                        	<th>Product</th>
				                    <th>Quantity</th>
				                    <th>Product price</th>
				                    <th>Product Total</th>
				                </tr>
			                </thead>

			                <tbody>
			                	@foreach($productdata as $productdata)
                  				<div class="row">
					                <div class="col-12">
						                <div class="post">
		                      				<div class="user-block">
		                      
							                	<tr>
							                		<td><img class="img-bordered-sm img-fluid" src="{{url('/upload/'.$productdata->product_image)}}" alt="product image"></td>
							                		<td class="username">{{$productdata->product_name}}</td>
							                		<td>{{$productdata->product_quantity}}</td>
							                		<td>{{$productdata->product_price}}</td>
							                		<td>Rs. {{$productdata->product_price*$productdata->product_quantity}}</td>
				                    
							                	</tr>
					                	
							        		</div>
					        			</div>
	    							</div>
              					</div>
								@endforeach
			                </tbody>
			            </table>
			            <div class="alert alert-dark text-center">  Order Total : &nbsp;&nbsp;Rs. {{$data->grand_total}}</div>
			                  
	                </div>

            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary">Order Id: {{$data->id}}</h3>
              <p class="text-muted"><address> {{$data->address}} </address></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Customer's Name:
                  <b class="d-block">{{$data->name}}</b>
                </p>
                <p class="text-sm">Customer's Email:
                  <b class="d-block">{{$data->useremail}}</b>
                </p>
                <p class="text-sm">Phone Number:
                  <b class="d-block">{{$data->phone}}</b>
                </p>
                <p class="text-sm">Payment Method:
                  <b class="d-block">{{$data->payment_method}}</b>
                </p>
               
             	</div>

              
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection