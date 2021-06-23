    
@extends('front.master')

@section('title','JMG')

@section('content')  

<style type="text/css">

   
   .product-card
    {
        width:21%;
        height: auto;
        /*box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;*/
    }
    .i
    {
        padding: 10px;
        height: 250px;
    }
    @media(max-width: 700px)
    {
        .product-card
        {
            margin: 5%;
            width: 90%;
        }
        
    }
</style>  
<hr>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme3 bg-lighten2 pt-110 pb-110 bg">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-50">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('wishlist')}}">Wishlist</a></li>
                </ol>
            </div>
        </div>
    </div>
                  
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
            
            <div class="row">

                 @if(count($wish) >= 1)

                    @foreach ($wish as $prod)
                
                        <div class="mt-20 mb-50 pb-20 ml-50 mr-10 product-card alert-light rounded-5">
                   

                            <div class="mx-50">
                                <a href="{{url('productdetail/'.$prod->id)}}">
                                    <img src="{{ url('/upload/'.$prod->image) }}" alt="thumbnail" class="img-fluid d-block i">
                                </a><br>
                                <a href="{{url('productdetail/'.$prod->id)}}">
                                    <b class=" mb-10">{{$prod->product_name}}</b>
                                </a>
                                <div class="d-flex align-items-center mb-30">
                                    <p class="mr-20">Rs. {{$prod->product_price}}</p>
                                </div>
                                

                                <form method="post" action="{{url('addtocart')}}">

                                @csrf

                                <input type="hidden" name="product_id" value="{{$prod->id}}">

                                <input type="hidden" name="product_name" value="{{$prod->product_name}}">

                                <input type="hidden" name="product_quantity" value="1">

                                <input type="hidden" name="product_price" value="{{$prod->product_price}}">

                                <input type="hidden" name="product_image" value="{{$prod->image}}">
                                
                                
                                <div>
                                    <button class="alert-info rounded-pill mr-2">
                                        <i class="ion-android-add"></i> <i class="fas fa-shopping-cart"> Add to Cart</i>
                                    </button>

                                </form>

                                   <a href="{{url('wishlist/itemdelete/'.$prod->id)}}" type="button" class="alert-danger btn-lg rounded-pill"><i class="fas fa-trash-alt"></i></a>
                                                  
                                </div>
                            </div>  

                       </div>

                    @endforeach

                @else
                    
                    <center><img src="http://www.cheemastudio.com/no-product-found.jpg" class="col-md-5 mt-30 img-fluid"></center>

                @endif

                <div class="row">
                        <div class="col-12">
                            <nav class="pagination-section mt-30">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">{{$wish->links()}}</li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div> 

            </div>
    
</nav>

   
<!-- breadcrumb-section end -->
                 
  <!-- staic media start -->
<section class="static-media-section menu-btn py-45">
    <div class="container">
        <div class="static-media-wrap p-0">
            <div class="row">
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="../frontend/img/icon/2.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Shipping</h4>
                            <p class="text text-white">On all orders over Rs. 500/-</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="../frontend/img/icon/3.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Returns</h4>
                            <p class="text text-white">Returns are free within 9 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="../frontend/img/icon/5.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Support 24/7</h4>
                            <p class="text text-white">Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="../frontend/img/icon/4.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">100% Payment Secure</h4>
                            <p class="text text-white">Your payment are safe with us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- staic media end -->
@endsection