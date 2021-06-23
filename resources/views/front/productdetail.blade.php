@extends('front.master')

@section('title','Product Details')

@section('content')

<style type="text/css">
    .first-img
    {
        height: 200px;
    }
    .m-prod
    {
        height: 500px;
    }
    @media(max-width: 700px)
    {
        .m-prod
        {
        height: 200px;
        }
        
       .first-img
        {
            height: 250px;
        } 
    }

</style>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme3 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop-grid-3-column.html">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product-single start -->
<section class="product-single theme3 pt-60">
    <div class="container">
        <div class="row">
                    
            <div class="col-lg-6 mb-5 mb-lg-0">
                
                <div class="product-sync-init mb-20">
                
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="{{url('/upload/'.$prod->image)}}" alt="product-thumb" class="mx-auto img-fluid d-block m-prod">
                        </div>
                    </div>
                    
                </div>

                <div class="product-sync-nav single-product">
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"> <img src="{{url('/upload/'.$prod->image)}}"
                                    alt="product-thumb"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"> <img src="{{url('/upload/'.$prod->image)}}"
                                    alt="product-thumb"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"><img src="{{url('/upload/'.$prod->image)}}"
                                    alt="product-thumb"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"><img src="{{url('/upload/'.$prod->image)}}"
                                    alt="product-thumb"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-md-0">

                    @if(session('cartmessage'))

                         <p class ="alert alert-success">
                          {{session('cartmessage')}}
                          <a href="{{url('cart')}}" class="ml-10 alert-light btn-lg rounded-pill">Open Cart!</a>
                         </p>
                    @endif

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
                <div class="single-product-info">
                    <div class="single-product-head">
                        <h2 class="title mt-50 mb-20">{{$prod->product_name}}</h2>
                        <div class="star-content mb-50">
                           
                            <a href="#" id="write-comment"><span class="ml-2"><i class="far fa-comment-dots"></i></span>
                                Read reviews <span>(1)</span></a>
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="edite"><i
                                        class="far fa-edit"></i></span> Write a review</a>
                        </div>
                    </div>
                    <div class="product-body mb-40">
                        <div class="d-flex align-items-center mb-30">
                            <h6 class="product-price mr-20"><!-- <del class="del">Rs.{{$prod->product_price*2}}</del> -->
                                <span class="onsale">Rs.{{$prod->product_price}}</span></h6>
                            <span class="badge position-static bg-dark rounded-0">Save 50%</span>
                        </div>
                        <address>{!!$prod->product_description!!}</address>
                       
                    </div>

                    <form method="post" action="{{url('addtocart')}}">

                    @csrf

                    <input type="hidden" name="product_id" value="{{$prod->id}}">

                    <input type="hidden" name="product_name" value="{{$prod->product_name}}">

                    <input type="hidden" name="product_price" value="{{$prod->product_price}}">

                    <input type="hidden" name="product_image" value="{{$prod->image}}">
                    <div class="product-footer">
                        <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                            <div class="count d-flex">
                                <input type="number" name="product_quantity" min="1" max="10" step="1" value="1" readonly>
                                
                                <div class="button-group">
                                           
                                    <button type="button" class="count-btn increment" value="product_quantity">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>

                                    <button type="button" class="count-btn decrement" value="product_quantity">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>

                                </div>
                            </div>
                            <div>
	                                <button class="btn btn--xl rounded-5">
	                                    <span class="mr-2"><i class="ion-android-add"></i></span>
	                                    Add to cart
	                                </button>

                            	</form>
                                
                            </div>
                        </div>
                        <div class="addto-whish-list">
                            @if(Auth::check())
                            <form method="post" action="{{url('wishlist')}}">
                                
                            @csrf
                                <input type="hidden" name="product_id" value="{{$prod->id}}">
                                <input type="hidden" name="user_email" value="{{Auth::user()->email}}">

                                <button class=""><i class="icon-heart"></i> Add to wishlist</button>
                            </form>
                            @else
                                 <a href="{{url('front/login')}}" class=""><i class="icon-heart"></i> Add to wishlist</a>
                            @endif

                        </div>
                        <div class="pro-social-links mt-10">
                            <ul class="d-flex align-items-center">
                                <li class="share">Share</li>
                                <li><a href="#" class="btn-light rounded-pill"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="btn-light rounded-pill"><i class="ion-social-google"></i></a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-single end -->
<!-- product tab start -->
<div class="product-tab theme3 bg-white pt-60 pb-80">
    <div class="container">
        <div class="product-tab-nav">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav class="product-tab-menu single-product">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="single-product-desc">
                            <ul>
                                <li>
                                   {!!$prod->product_description!!}
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    
                    <!-- third tab-pane -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="single-product-desc">
                            <div class="grade-content">
                                <span class="grade">Grade </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <h6 class="sub-title">test</h6>
                                <p>23/09/2020</p>
                                <h4 class="title">test</h4>
                                <p>test</p>
                            </div>
                            <hr class="hr">
                            <div class="grade-content">
                                <span class="grade">Grade </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <h6 class="sub-title">Hastheme</h6>
                                <p>23/09/2020</p>
                                <h4 class="title">demo</h4>
                                <p>ok !</p>
                                <a href="#" class="btn theme-btn--dark3 theme-btn--dark3-sm btn--sm rounded-5 mt-15"
                                    data-toggle="modal" data-target="#exampleModalCenter">Write your review !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<!-- similar product section start -->
<section class="theme3 bg-white pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <h2 class="title text-dark text-capitalize">You might also like </h2>
                    <p class="text mt-10">10 other products in the same category: </p>
                </div>
            </div>
            <div class="col-12">
                <div class="product-slider-init slick-nav">
                    <!-- slider-item end -->
                    @foreach($related as $related)
                        <div class="slider-item">
                            <div class="card product-card align-items-center">
                                <div class="card-body p-0">
                                    <div class="media flex-column">
                                        <div class="product-thumbnail position-relative">
                                            <span class="badge badge-danger top-right">Similar</span>
                                            <a href="{{url('productdetail/'.$related->id)}}">
                                                <img class="first-img mx-auto d-block" src="{{url('/upload/'.$related->image)}}" alt="thumbnail">
                                            </a>
                                         </div>
                                        <div class="media-body">
                                            <div class="product-desc">
                                                <h3 class="title"><a href="{{url('productdetail/'.$related->id)}}">{{$related->product_name}}</a></h3>
                                               
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="product-price">Rs. {{$related->product_price}}</h6>
                                                    <a href="{{url('productdetail/'.$related->id)}}" class="pro-btn" data-toggle="modal"
                                                        data-target="#add-to-cart">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- slider-item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- similar product section end -->

<!-- new arrival section start -->
<section class="theme3 bg-white pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <h2 class="title text-dark text-capitalize">New arrivals</h2>
                    <p class="text mt-10">Have a look at our newly arrived products
                    </p>
                </div>
            </div>
           
              <div class="col-12">
                <div class="product-slider-init slick-nav">
                    <!-- slider-item end -->
                    @foreach($new as $new)
                        <div class="slider-item">
                            <div class="card product-card align-items-center">
                                <div class="card-body p-0">
                                    <div class="media flex-column">
                                        <div class="product-thumbnail position-relative">
                                            <span class="badge badge-danger top-right">New</span>
                                            <a href="{{url('productdetail/'.$new->id)}}" class="align-items-center">
                                                <img class="first-img mx-auto d-block" src="{{url('/upload/'.$new->image)}}" alt="thumbnail">
                                            </a>
                                         </div>
                                        <div class="media-body">
                                            <div class="product-desc">
                                                <h3 class="title"><a href="{{url('productdetail/'.$new->id)}}">{{$new->product_name}}</a></h3>
                                               
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="product-price">Rs. {{$new->product_price}}</h6>
                                                    <a href="{{url('productdetail/'.$related->id)}}" class="pro-btn" data-toggle="modal"
                                                        data-target="#add-to-cart">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- slider-item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new arrival section end -->

@endsection