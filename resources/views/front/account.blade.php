@extends('front.master')

@section('content')

<style type="text/css">
    .myaccount-tab-menu a.active, .myaccount-tab-menu a:hover
    {
        background-color:#00868B!important;
    }

    .box
    {
        border: 1px solid;
        border-radius: 10px;
        margin-bottom: 25px;
        border-color: #cdd0d0;
    }

    .img-fluid
    {
        height: 150px;
    }

    @media(max-width: 700px)
    {
        .img
        {
            width: 100px;
        }
        .img-fluid
        {
            height: 100px;
        }

        .product-detail
        {
            width: 100px;
        }

        .col-md-1
        {
            width: 50px;
        }
    }   
</style>

<!-- product tab start -->

@if(session('message'))

    <h4 class ="alert alert-success text-center">
      {{session('message')}}
    </h4>

@endif

<div class="my-account pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25">my account</h3>
            </div>
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12 mb-30">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#dashboad" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>
                        Dashboard</a>

                    <a href="#orders" data-toggle="tab" class="active"><i class="fa fa-cart-arrow-down"></i>
                        Orders</a>

                    <a href="#download" data-toggle="tab"><i class="fas fa-cloud-download-alt"></i>
                        Download</a>

                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                        Payment
                        Method</a>

                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                        address</a>

                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                        Details</a>

                    <a href="{{url('front/logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-30">
                <div class="tab-content" id="myaccountContent">
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="dashboad" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Dashboard</h3>

                            <div class="welcome mb-20">
                                <p>Hello, <strong>{{Auth::user()->name}}</strong> (If Not <strong>{{Auth::user()->name}}!</strong><a
                                        href="{{url('front/logout')}}" class="logout"> Logout</a>)</p>
                            </div>

                            <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                recent orders, manage your shipping and billing addresses and edit your
                                password and account details.</p>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>All Orders</h3>

                            <div class="myaccount-table table-responsive">
                                    <div class="h-auto shadow-lg">

                                            @foreach($allorders as $key=>$order)

                                            <div class="box">

                                            <a href="#pills-profile" class="ml-20 text-primary bg-lighten2">{{$order->created_at}}</a>
                                            <br><br>
                                            <ul id="" class="alert alert-border-secondary">
                                                <li>
                                                    
                                                    @php

                                                    $orderdetail=DB::table('orderproducts')->where('order_id',$order->id)->limit('1')->get();
                                                    
                                                    @endphp
                                                      

                                                     @foreach($orderdetail as $detail)
                                                     <ul class="">
                                                                <li><a href="#">
                                                                       
                                                                <div class="row rounded border-secondary">

                                                                    <div class="col-md-4 img">
                                                                        <a href="{{url('productdetail/'.$detail->product_id)}}"> 
                                                                            <img src="{{url('/upload/'.$detail->product_image)}}" class="img-fluid mx-auto">
                                                                        </a>
                                                                    </div>
                                                                    
                                                                   
                                                                    <div class="col-md-5 product-detail">
                                                                        <b> <a href="{{url('productdetail/'.$detail->product_id)}}">{{$detail->product_name}}</a></b>
                                                                         <p>Qty : {{$detail->product_quantity}}<br>
                                                                         Product Price : {{$detail->product_price}}<br></p>

                                                                    </div>

                                                                    <div class="col-md-1 float-right">
                                                                         <a href="{{url('order/'.$order->id)}}" class="float-right rounded"><img src="https://icons-for-free.com/iconfiles/png/512/double+arrow+doublechevronright+right+arrows+icon-1320185729292506033.png" class="mx-auto float-right"></a>
                                                                    </div>

                                                                </div>

                                                                <hr>

                                                            </ul>

                                                    @endforeach
                                                </li>

                                                <div class="row"> 
                                                  
                                                  <div class="col-md-2 mt-2">
                                                      <span>Out for Delivery</span>
                                                  </div>
                                                  <div class="col-md-3 mt-2">
                                                      <span>Payment Method: {{$order->payment_method}}</span>
                                                  </div>
                                                  <div class="col-md-2 mt-2">
                                                      <b> Order Total : &nbsp;&nbsp;Rs. {{$order->grand_total}}</b>
                                                  </div>
                                                  
                                                  <div class="col-sm-5">
                                                  
                                                    <a href="{{url('order/'.$order->id)}}" class=" btn-info text-light rounded btn--lg text-center">View Details</a>
                                                    <a href="{{url('invoice/'.$order->id)}}" class=" rounded-pill mt-35 btn-warning btn--lg">Show Invoice</a>

                                                  </div>

                                               </div>

                                            </ul>
                                            
                                            </div>

                                            @endforeach

                                    </div>
                            </div>
                        </div>

                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-section mt-30">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">{{$allorders->links()}}</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                    </div>

                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="download" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Downloads</h3>

                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Expire</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Mostarizing Oil</td>
                                            <td>Aug 22, 2018</td>
                                            <td>Yes</td>
                                            <td><a href="#" class="ht-btn black-btn">Download File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Katopeno Altuni</td>
                                            <td>Sep 12, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="ht-btn black-btn">Download File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Payment Method</h3>

                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Billing Address</h3>

                            <address>
                                <p><strong class="text-uppercase">{{Auth::user()->name}}</strong></p>
                                @foreach($data as $data)
                                <p>{{$data->address}}</p>
                                <p>{{$data->pincode}}</p>
                                @endforeach
                            </address>

                            <a href="#" class="ht-btn black-btn d-inline-block edit-address-btn"><i
                                    class="fa fa-edit"></i>Edit Address</a>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                   
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Account Details</h3>

                            <div class="account-details-form">
                                <form method="POST" action="{{ route('change.password') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="first-name" name="name" value="{{Auth::user()->name}}" placeholder="Name" type="text">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="email" name="email" value="{{Auth::user()->email}}" placeholder="Email Address" type="email">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <h4>Password change</h4>
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="new-pwd" placeholder="New Password" type="password" name='new_password'>
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="confirm-pwd" placeholder="Confirm Password" type="password" name='new_confirm_password'>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn theme-btn--dark1 btn--md">Save
                                                Changes</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- product tab end -->

@endsection