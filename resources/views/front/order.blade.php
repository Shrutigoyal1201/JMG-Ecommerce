@extends('front.master')

@section('title','Orderdetails')

@section('content')

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110" style="background: url('{{ url('https://image.freepik.com/free-photo/cyber-monday-retail-sales_23-2148688493.jpg') }}'); background-repeat:no-repeat; background-position: center bottom; background-size: cover;">
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-left">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-100 mb-100">
	<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	   

	    <!-- Main content -->
	    <section class="content">

	      <!-- Default box -->
	      <div class="card">
	        <div class="card-header mb-50">
	          <h3 class="card-title">Products Ordered</h3>
	        </div>
	        <div class="card-body">
	          <div class="row">
	            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
	              
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
	              <h3 class="text-primary">Order Id: {{$data->id}}</h3><br>
	              <p class="text-muted"><address> {{$data->address}} </address></p>
	              <br>
	              <div class="text-muted">
	               	
			            <div class="row"> 
			                <div class="col-md-6">
				                <p class="text-sm">Customer's Name:
				                  <b class="d-block">{{$data->name}}</b>
				                </p>
				            </div>
				            
				            <div class="col-md-6">
				                <p class="text-sm">Customer's Email:
				                  <b class="d-block">{{$data->useremail}}</b>
				                </p>
				            </div>
				            </div>
				            <br>
				            <div class="row">
				            	<div class="col-md-6">
				            	<p class="text-sm">Phone Number:
				                  <b class="d-block">{{$data->phone}}</b>
				                </p>
				            </div>
				                
				            <div class="col-md-6">
				                <p class="text-sm">Payment Method:
				                  <b class="d-block">{{$data->payment_method}}</b>
				                </p>
				            </div>
				        </div>
	                
	              </div>


	              <button onclick="myPrint();" class="rounded-pill mt-35 btn-success btn--lg"><i class="fas fa-download"> </i> Download Invoice</button>

	              
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
</div>

	
@endsection