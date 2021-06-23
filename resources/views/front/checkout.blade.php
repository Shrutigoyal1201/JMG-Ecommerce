@extends('front.master')

@section('title','Checkout')

@section('content')
<section class="check-out-section pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-30">
                <div id="accordion">

                    @if(session('message'))

                         <p class ="alert alert-success">
                          {{session('message')}}
                         </p>
                          
                    @endif

                    @if(session('error'))

                         <p class ="alert alert-danger">
                          {{session('error')}}
                         </p>
                          
                    @endif

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button  type="button" class="btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    1 Personal Information
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <form action="{{url('place_order')}}" method="post" class="personal-information">

                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="firstname" class="form-control" name="" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-6">
                                            <input type="email" id="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
 
                                
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button type="button" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    2 Shipping Address
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="checkout-inner border-0">
                                    <div class="checkout-address p-0">
                                        <p>
                                            The selected address will be used both as your personal address (for invoice) and as your delivery address.
                                        </p>
                                    </div>
                                    <div class="check-out-content">
                                        
                                            <div class="form-group row">
                                                <label class="col-md-3" for="firstName2">Name</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="firstName2" name="name" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="address1">Address</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="address1" name="address" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="city">City</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="city" name="city" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">State</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="state">
                                                        <option class="form-control" value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option class="form-control" value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option class="form-control" value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option class="form-control" value="Assam">Assam</option>
                                                        <option class="form-control" value="Bihar">Bihar</option>
                                                        <option class="form-control" value="Chandigarh">Chandigarh</option>
                                                        <option class="form-control" value="Chhattisgarh">Chhattisgarh</option>
                                                        <option class="form-control" value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                        <option class="form-control" value="Daman and Diu">Daman and Diu</option>
                                                        <option class="form-control" value="Delhi">Delhi</option>
                                                        <option class="form-control" value="Lakshadweep">Lakshadweep</option>
                                                        <option class="form-control" value="Puducherry">Puducherry</option>
                                                        <option class="form-control" value="Goa">Goa</option>
                                                        <option class="form-control" value="Gujarat">Gujarat</option>
                                                        <option class="form-control" value="Haryana">Haryana</option>
                                                        <option class="form-control" value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option class="form-control" value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option class="form-control" value="Jharkhand">Jharkhand</option>
                                                        <option class="form-control" value="Karnataka">Karnataka</option>
                                                        <option class="form-control" value="Kerala">Kerala</option>
                                                        <option class="form-control" value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option class="form-control" value="Maharashtra">Maharashtra</option>
                                                        <option class="form-control" value="Manipur">Manipur</option>
                                                        <option class="form-control" value="Meghalaya">Meghalaya</option>
                                                        <option class="form-control" value="Mizoram">Mizoram</option>
                                                        <option class="form-control" value="Nagaland">Nagaland</option>
                                                        <option class="form-control" value="Odisha">Odisha</option>
                                                        <option class="form-control" value="Punjab">Punjab</option>
                                                        <option class="form-control" value="Rajasthan">Rajasthan</option>
                                                        <option class="form-control" value="Sikkim">Sikkim</option>
                                                        <option class="form-control" value="Tamil Nadu">Tamil Nadu</option>
                                                        <option class="form-control" value="Telangana">Telangana</option>
                                                        <option class="form-control" value="Tripura">Tripura</option>
                                                        <option class="form-control" value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option class="form-control" value="Uttarakhand">Uttarakhand</option>
                                                        <option class="form-control" value="West Bengal">West Bengal</option>
            
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="zip">Zip/Postal Code</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="zip" name="pincode" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">Country</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="country">
                                                        <option>-- please choose --</option>
                                                        <option class="form-control" value="India">India</option>
                                                        <option class="form-control" value="USA">United States</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="phone">Phone</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="phone" name="phone" type="text" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="optional">
                                                        Optional
                                                    </span>
                                                </div>
                                            </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button  type="button" class="btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>3</span> Payment
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body pt-0">
                              <div class="row mt-30">
                                <div class="col-6 custom-radio mb-4">
                                    <input type="radio" id="test5" name="payment_method" value="paytm" class="paytm">
                                    <label for="test5"><img src="frontend/img/paytm.jpg" class="col-md-2"></label>
                                </div>
                                
                                <div class="col-6 custom-radio mb-4">
                                    <input type="radio" id="test6" name="payment_method" value="googlepay" class="googlepay">
                                    <label for="test6"><img src="frontend/img/gpay.jpg" class="col-md-2"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 custom-radio mb-4">
                                    <input type="radio" id="test7" name="payment_method" value="upi" class="upi">
                                     <label for="test7"><img src="frontend/img/bhim.png" class="col-md-2"></label>
                                </div>

                                <div class="col-6 custom-radio mb-4">
                                    <input type="radio" id="test8" name="payment_method" value="cod" class="cod">
                                    <label for="test8"><img src="https://www.vippng.com/png/detail/63-630661_png-file-svg-cod-icon-png.png" class="col-md-2"></label>
                                </div>
                            </div>

                                <div class="filter-check-box mb-4">
                                    <input type="checkbox" id="20828" required="">
                                    <label class="checkout" for="20828">I agree to the terms and Conditions</label>
                                </div>

                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
             <div class="col-4 mb-30">

                        <h3 class="text-center">Order Summary</h3><br>
                        <ul class="list-group cart-summary rounded-0">
                           <?php  $total_amount=0; ?>
                           @foreach ($d as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                
                                <ul class="items">

                                    <li>{{$d->product_name}}</li>
                                    <li>Quantity</li>
                                </ul>
                                <ul class="amount text-center">
                                    <li>Rs.{{$d->product_price*$d->product_quantity}}</li>
                                    <li>{{$d->product_quantity}}</li>
                                </ul>
                               
                            </li>
                            <?php $total_amount=$total_amount+($d->product_price*$d->product_quantity); ?>

                             @endforeach


                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="items">
                                    <li>Total (tax excl.)</li>
                                </ul>
                                <ul class="amount">
                                    <input type="hidden" name="grand_total" value="<?php echo $total_amount; ?>">
                                    <li><?php echo $total_amount; ?></li>
                                </ul>
                            </li>
                            <li class="list-group-item text-center">
                                @if(Auth::check())
                                <?php if($total_amount==0) { ?>
                                <input  class="btn theme-btn--dark1 btn--md" onclick="return empty_cart()" value="Place Order" readonly>
                                <?php } else{ ?>
                                 <input type="submit" class="btn theme-btn--dark1 btn--md" onclick="return select_payment_method()" value="Place Order">
                                <?php } ?>
                                @endif
                            </li>
                        </ul>
                    </form> 
             </div>       
        </div>
    </div>
</section>

@endsection