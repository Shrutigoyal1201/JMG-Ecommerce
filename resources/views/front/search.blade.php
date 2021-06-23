    
@extends('front.master')

@section('title','JMG')

@section('content')  

<style type="text/css">
    .box
    {
        box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
    }
    .img-fluid
    {
        height: 200px;
    }
</style>  
<hr>
    <div class="container">
                  
                   @if(session('message'))

                         <p class ="alert alert-success">
                          {{session('message')}}
                          <a href="{{url('wishlist')}}" class="ml-10 alert-light btn-lg rounded-pill">Open Wishlist!</a>
                         </p>
                    @endif

                    @if(session('error'))

                         <p class ="alert alert-danger">
                          {{session('error')}}
                          <a href="{{url('wishlist')}}" class="ml-10 alert-light btn-lg rounded-pill">Open Wishlist!</a>
                         
                         </p>

                    @endif

                     @if(session('carterror'))

                         <p class ="alert alert-danger">
                          {{session('carterror')}}
                          <a href="{{url('cart')}}" class="ml-10 alert-light btn-lg rounded-pill">View Cart!</a>
                         
                         </p>

                    @endif
            <h6 class="alert alert-info text-center">Search Results</h6>

               <div class="row mt-20 mb-50 product-card">
                 @if(count($searchresult) >= 1)

                     @foreach ($searchresult as $prod)
                  

                    <div class="col-md-2 ml-25">
                        <a href="{{url('productdetail/'.$prod->id)}}">
                            <img src="{{ url('/upload/'.$prod->image) }}" alt="thumbnail" class="img-fluid">
                        </a>
                    </div>  
                    <div class="col-md-3 mt-20 mr-25">
                        <div class="single-product-info">
                            <div class="single-product-head">
                                <h5 class=" mb-30">{{$prod->product_name}}</h5>
                            </div>
                            <div class="product-body mb-40">
                                <div class="d-flex align-items-center mb-30">
                                    <h5 class="mr-20">Rs. {{$prod->product_price}}</h5>
                                </div>
                                
                            </div>

                            <form method="post" action="{{url('addtocart')}}">

                            @csrf

                            <input type="hidden" name="product_id" value="{{$prod->id}}">

                            <input type="hidden" name="product_name" value="{{$prod->product_name}}">

                            <input type="hidden" name="product_quantity" value="1">

                            <input type="hidden" name="product_price" value="{{$prod->product_price}}">

                            <input type="hidden" name="product_image" value="{{$prod->image}}">

                            <div class="product-footer">
                                <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                                    
                                            <button class="pro-btn" data-toggle="modal"
                                                    data-target="#add-to-cart">
                                                    <i class="icon-basket"></i>
                                            </button>
                                            
                                            </form>

                                             @if(Auth::check())
                                            <form method="post" action="{{url('wishlist')}}">
                                                
                                            @csrf
                                                <input type="hidden" name="product_id" value="{{$prod->id}}">
                                                <input type="hidden" name="user_email" value="{{Auth::user()->email}}">

                                                <button class="alert-danger rounded-pill btn--lg"><i class="icon-heart"></i> Add to wishlist</button>
                                            </form>
                                            @else
                                                 <a href="{{url('front/login')}}" class="alert-danger rounded-pill btn--lg"><i class="icon-heart"></i> Add to wishlist</a>
                                            @endif
                                    
                                </div>
                               
                            </div>
                        </div>
                        <br>
                    </div>
                
                    @endforeach

                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-section mt-30">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">{{$searchresult->links()}}</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                @else
                    <strong class="text-center">Sorry! No Product Found.</strong>
                    <center><img src="http://www.cheemastudio.com/no-product-found.jpg" class="col-md-5 img-fluid"></center>
                @endif
             
             </div>      
           
    </div>
                            
@endsection