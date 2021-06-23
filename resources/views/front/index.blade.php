@extends('front.master')

@section('title','JMG')

@section('content')

<style type="text/css">
    .surimg
    {
        width:24%;
    }
    .first-img
    {
        height: 300px;
        width: 258px;
        padding: 30px;
    }
    @media(max-width: 700px)
    {
        .ir
        {
            width: 180px;
            height: auto;
            margin: -50px -5px 0px;
        }
        .ir2
        {
            width: 100px;
            height: auto;
            margin: -50px -5px 0px;
        }
       
    }
</style>

<!-- main slider start -->
<section class="bg-light position-relative">
    <div class="main-slider dots-style theme3">

        @foreach ($banner as $banner)

        <div class="slider-item bg-img bg-img7" style="background: url('{{ url('/upload/'.$banner->image) }}'); background-repeat:no-repeat; background-position: center bottom; background-size: cover;">
            <div class="container">
                <div class="row align-items-center slider-height">
                    <div class="col-12">
                        <div class="slider-content d-inline-block text-center">
                            <p class="text text-lighten text-uppercase animated mb-25" data-animation-in="fadeInDown">
                                {{$banner->title}}</p>
                            <!-- <h4 class="title text-dark animated text-capitalize mb-25" data-animation-in="fadeInLeft"
                                data-delay-in="1"> {{$banner->title}}</h4> -->
                            <!-- <h2 class="sub-title text-dark animated" data-animation-in="fadeInRight" data-delay-in="1">
                               {{$banner->title}}</h2> -->
                            <a href="{{url('shop')}}"
                                class="btn btn--lg text-uppercase rounded-5 animated mt-50 mt-sm-25"
                                data-animation-in="zoomIn" data-delay-in="1">Shop now</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach


       
        <!-- slider-item end -->
    </div>
    <!-- slick-progress -->
    <div class="slick-progress">
        <span></span>
    </div>
    <!-- slick-progress end-->
</section>
<!-- main slider end -->

<!-- common banner  start -->
<div class="common-banner bg-white pt-80">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30 ir">
                <div class="banner-thumb">
                    <a href="shop-grid-4-column.html" class="">
                        <img src="https://images.unsplash.com/photo-1576671081837-49000212a370?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8bWVkaWNpbmV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
            <div class="col-md-3 mb-30 ir2">
                <div class="banner-thumb">
                    <a href="shop-grid-4-column.html" class="">
                        <img src="https://images.unsplash.com/photo-1584707824245-f67bad2c62d5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y292aWR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
            <div class="col-md-3 mb-30 ir2">
                <div class="banner-thumb">
                    <a href="shop-grid-4-column.html" class="">
                        <img src="https://images.unsplash.com/photo-1574482620826-40685ca5ebd2?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGNvdmlkfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- common banner  end -->

<section class="product-tab theme3 bg-white pt-50 pb-80">
    <div class="container">
        <div class="product-tab-nav mb-35">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h2 class="title text-dark text-capitalize">Our products</h2>
                        <p class="text mt-10">Add our products to weekly line up</p>
                    </div>
                </div>
                <div class="col-12">
                    <nav class="product-tab-menu">
                        
                         <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">

                            @foreach ($categories as $key=>$category)
                            <li class="nav-item">
                                <a  class="nav-link {{ $key==0 ? 'active' : '' }}" id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-home" href="#pills-category_{{$category->id}}" aria-selected="true"   
                                    >{{$category->name}}</a>
                            </li>
                            
                            @endforeach
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
                    @foreach ($categories as $key=>$category )
                         
                   
                    <div class="tab-pane fade show {{ $key==0 ? 'active' : ''}}" 
                       id="pills-category_{{$category->id}}"  role="tabpanel"
                        aria-labelledby="pills-home-tab">
                       
                        <div class="product-slider-init slick-nav">                        
                                   
                            @php

                            $c_prod=DB::table('products')->where('category_id',$category->id)->get();
                
                            @endphp
                              

                            @foreach ($c_prod as $prod)
                                
                           
                            <div class="slider-item">
                                <div class="card product-card">
                                    <div class="card-body p-0">
                                        <div class="media flex-column">
           
                                             <div class="product-thumbnail position-relative">
                                                
                                                <a href="{{url('productdetail/'.$prod->id)}}">
                                                    <img src="{{ url('/upload/'.$prod->image) }}" 
                                                     alt="thumbnail" class="col-md-8 img-fluid  d-block " style="height: 200px;">
                                                </a>
                                             
                                            </div>
                                            
                                            <div class="media-body">
                                                <div class="product-desc">
                                                    <h3 class="title"><a href="{{'productdetail/'.$prod->id}}">
                                                        {{$prod->product_name}}</a></h3>
                                                    
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="product-price"><span>Rs. </span> {{$prod->product_price}}</h6>
                                                        
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
                     @endforeach
                   
                </div>
               
            </div>
        </div>
    </div>
</section>

<!-- popular-section  start -->
<div class="popular-section bg-lighten theme3 bg-white pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <h2 class="title text-dark text-capitalize">Popular Categories</h2>
                    <p class="text mt-10">Our Top Selling Products from all the Popular categories
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="popular-slider-init dots-style">

                    @foreach ($cat as $cat)
                    <div class="slider-item">
                        <div class="card popular-card zoom-in">
                            <div class="card-body">
                                <a href="#" class="thumb-naile d-block overflow-hidden"> <img class="d-block mx-auto" src="{{ url('/upload/'.$cat->image) }}" alt="img"></a>
                                <h3 class="popular-title">
                                    <a href="#">{{$cat->name}}<!-- <br><span class="text-secondary te">{{$cat->description}}</span> --></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    
                    @endforeach
                    <!-- slider-item end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular-section  end -->

<div class="container mb-35"><!--container2 surgical range slider start-->
        <br><br><h2 class="text-center">Our Surgical Range</h2><br><br>

        <div class="row"><!--row start-->
            <!--carousel slider start-->
            <div class="carousel slide" data-ride="carousel" id="myslide2">
                
                <!--carousel inner start-->
                <div class="carousel-inner">

                    <!--carousel item-1 start-->
                    <div class="carousel-item active" data-interval="2000">
                        
                        <img class="img-fluid surimg" src="https://5.imimg.com/data5/YH/XG/EQ/SELLER-4480/3m-littmann-classic-iii-stethoscope-navy-blue-tube-500x500.jpg">
                        <img class="img-fluid surimg" src="https://image.shutterstock.com/image-photo/digital-glucometer-lancet-pen-on-260nw-793138105.jpg">
                        <img class="img-fluid surimg" src="https://imagesvc.meredithcorp.io/v3/mm/image?q=85&c=sc&poi=face&w=1500&h=1500&url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F12%2F2020%2F06%2F16%2Fbumapo-waterproof-digital-body.jpg">
                        <img class="img-fluid surimg" src="https://5.imimg.com/data5/XL/BM/NW/SELLER-11599107/bp-3bg1-dr-morepen-blood-pressure-monitor-500x500.jpg">
                    
                    </div><!--carousel item-1 end-->

                    <!--carousel item-2 start-->
                    <div class="carousel-item" data-interval="2000">
                        
                        <img class="img-fluid surimg" src="https://5.imimg.com/data5/JS/XX/MY-4762877/single-use-syringe-250x250.jpg">
                        <img class="img-fluid surimg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTmMCjxLWVATaXnyZQHbn6ofm2EhMakVxMAzA&usqp=CAU">
                        <img class="img-fluid surimg" src="https://d27zlipt1pllog.cloudfront.net/pub/media/catalog/product/d/c/dch0005.jpg">
                        <img class="img-fluid surimg" src="https://www.circleone.in/images/products_gallery_images/Kit_Mockup_533_x_315.jpg">
                        
                    </div><!--carousel item-2 end-->

                </div><!--carousel-inner end-->
                <!--list tag start-->
                <ul class="carousel-indicators">
                    <li data-target="#myslide2" data-slide-to="0" class="active img"></li>
                    <li data-target="#myslide2" data-slide-to="1" class="img"></li>
                </ul>
                <!--list tag end-->
                <!--preview anchor tag start-->
                <a href="#myslide2" data-slide="prev" class="carousel-control-prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <!--preview anchor tag end-->
                <!--next slide anchor tag start-->
                <a href="#myslide2" data-slide="next" class="carousel-control-next">
                    <span class="carousel-control-next-icon"></span>
                </a> 
                <!--next slide anchor tag end-->
            </div><!--  carousel slide end-->
        </div><!--row2 end-->
</div><!--container2 surgical range slider end-->

<!-- common banner  start -->
<!-- <div class="common-banner bg-white pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-30">
                <div class="banner-thumb common-bthumb1">
                    <a href="shop-grid-4-column.html" class="zoom-in d-block overflow-hidden">
                        <img src="frontend/img/banner/22.jpg" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="banner-thumb common-bthumb1">
                    <a href="shop-grid-4-column.html" class="zoom-in d-block overflow-hidden">
                        <img src="frontend/img/banner/23.jpg" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- common banner end -->

<!-- staic media start -->
<section class="static-media-section menu-btn theme-bg3 py-45">
    <div class="container">
        <div class="static-media-wrap p-0">
            <div class="row">
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="frontend/img/icon/2.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Shipping</h4>
                            <p class="text text-white">On all orders over Rs. 500/-</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="frontend/img/icon/3.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Returns</h4>
                            <p class="text text-white">Returns are free within 9 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="frontend/img/icon/5.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Support 24/7</h4>
                            <p class="text text-white">Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="frontend/img/icon/4.png"
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