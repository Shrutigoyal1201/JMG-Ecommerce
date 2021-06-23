@extends('front.master')

@section('title','Shop')

@section('content')

<style type="text/css">
    .first-img
    {
        height: 200px;
    }
</style>


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
<!-- product tab start -->
<div class="product-tab bg-white pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mb-30 overflow-auto">
                <div class="grid-nav-wraper bg-lighten2 mb-30">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            <i class="fa fa-th"></i>

                                        </a>
                                    </li>
                                    <li class="nav-item mr-0">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false"><i class="fa fa-list"></i></a>
                                    </li>
                                    <li> <span class="total-products text-capitalize">All  products.</span></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <div class="shop-grid-button d-flex align-items-center">
                                <span class="sort-by">Sort by:</span>
                                <button class="btn-dropdown rounded d-flex justify-content-between" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Relevance <span class="ion-android-arrow-dropdown"></span>
                                </button>
                                <div class="dropdown-menu shop-grid-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Relevance</a>
                                    <a class="dropdown-item" href="#"> Name, A to Z</a>
                                    <a class="dropdown-item" href="#"> Name, Z to A</a>
                                    <a class="dropdown-item" href="#"> Price, low to high</a>
                                    <a class="dropdown-item" href="#"> Price, high to low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-nav end -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row grid-view theme1">

                            @foreach($allproducts as $allp)
                                            
                            <div class="col-sm-6 col-lg-4 col-xl-3 mb-30">
                                <div class="card product-card">
                                    <div class="card-body">
                                        <div class="product-thumbnail position-relative">
                                            
                                            <a href="{{url('productdetail/'.$allp->id)}}">
                                                <img class="first-img" src="{{url('/upload/'.$allp->image)}}" alt="thumbnail">
                                            </a>
                                            <!-- product links -->
                                            <ul class="product-links d-flex justify-content-center">
                                                <li>
                                                    <form method="post" action="{{url('wishlist')}}">
                                
                                                        @csrf
                                                            <input type="hidden" name="product_id" value="{{$allp->id}}">

                                                           <!--  <button data-toggle="modal" data-target="#quick-view">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                    title="add to wishlist" class="icon-heart"> 
                                                                </span>
                                                            </button> -->
                                                             <a href="#" type="button">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                    title="add to wishlist" class="icon-heart"> </span>
                                                            </a>
                                                    </form> 
                                                </li>
                                                
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#quick-view">
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Quick view" class="icon-magnifier"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- product links end-->
                                        </div>
                                        <div class="product-desc py-0">
                                            <h3 class="title mt-20"><a href="{{url('productdetail/'.$allp->id)}}">{{$allp->product_name}}</a></h3>
                                           
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="product-price">Rs. {{$allp->product_price}}</h6>

                                            <form method="post" action="{{url('addtocart')}}">

                                                @csrf

                                                <input type="hidden" name="product_id" value="{{$allp->id}}">

                                                <input type="hidden" name="product_name" value="{{$allp->product_name}}">

                                                <input type="hidden" name="product_quantity" value="1">

                                                <input type="hidden" name="product_price" value="{{$allp->product_price}}">

                                                <input type="hidden" name="product_image" value="{{$allp->image}}">
                                                
                                                    <button class="pro-btn" data-toggle="modal"
                                                    data-target="#add-to-cart"><i class="icon-basket"></i></button>

                                            </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-list End -->
                            </div>
                            @endforeach

                            
                        </div>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row grid-view-list theme1">
                             @foreach($allp2 as $allp2)
                           
                            <div class="col-12 mb-30">
                                <div class="card product-card">
                                    <div class="card-body">
                                        <div class="media flex-column flex-md-row">
                                            <div class="product-thumbnail position-relative col-md-4">
                                                 <a href="{{url('productdetail/'.$allp2->id)}}">
                                                    <img class="first-img" src="{{url('/upload/'.$allp2->image)}}" alt="thumbnail">
                                                </a>
                                                <!-- product links -->
                                                <ul class="product-links d-flex justify-content-center">
                                                    <li>
                                                       
                                                        <form method="post" action="{{url('wishlist')}}">
                                
                                                        @csrf
                                                            <input type="hidden" name="product_id" value="{{$allp2->id}}">

                                                            <!-- <button>
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                    title="add to wishlist" class="icon-heart"> 
                                                                </span>
                                                            </button> -->

                                                            <a href="#" type="button">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                    title="add to wishlist" class="icon-heart"> </span>
                                                            </a>
                                                        </form> 
                                                           
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view">
                                                            <span data-toggle="tooltip" data-placement="bottom"
                                                                title="Quick view" class="icon-magnifier"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- product links end-->
                                            </div>
                                            <div class="media-body pl-30">
                                                <div class="product-desc py-0">
                                                    <h3 class="title"><a href="{{url('productdetail/'.$allp2->id)}}">{{$allp2->product_name}}</a></h3>
                                                    
                                                    <h6 class="product-price">Rs. {{$allp2->product_price}}</h6>
                                                </div>
                                                <ul class="product-list-des">
                                                    {!!$allp2->product_description!!}
                                                </ul>
                                                <div class="availability-list mb-30">
                                                    <p>Availability:
                                                        @if($allp2->status=0)
                                                            <button class="alert-danger">Out of stock</button>
                                                        @else 
                                                            <button class="alert-info">In stock</button>
                                                    
                                                        @endif
                                                     </p>
                                                </div>
                                                <form method="post" action="{{url('addtocart')}}">

                                                @csrf

                                                <input type="hidden" name="product_id" value="{{$allp2->id}}">

                                                <input type="hidden" name="product_name" value="{{$allp2->product_name}}">

                                                <input type="hidden" name="product_quantity" value="1">

                                                <input type="hidden" name="product_price" value="{{$allp2->product_price}}">

                                                <input type="hidden" name="product_image" value="{{$allp2->image}}">
                                                
                                                
                                                <button class="btn theme-btn--dark1 btn--xl rounded-5"
                                                        data-toggle="modal" data-target="#add-to-cart">
                                                        Add to cart
                                                </button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-list End -->
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
                                        <li class="page-item">{{$allproducts->links()}}</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-30 order-last">
                <aside class="left-sidebar theme1">
                    <!-- search-filter start -->
                    <div class="search-filter">
                        <div class="check-box-inner pt-0">
                            <h4 class="title">Shop By Category</h4>
                        </div>

                    </div>

                    <ul id="offcanvas-menu2" class="blog-ctry-menu">
                        @foreach($allcat as $key=>$allcat)
                            
                            @php

                                $Subcat=DB::table('subcategories')->where('category_id','=',$allcat->id)->get();
                                                    
                            @endphp

                            <li>
                                <a href="#" class="">{{$allcat->name}}</a>
                                @foreach($Subcat as $subcat)
                            
                                <ul class="category-sub-menu">
                                    <li><a href="{{url('shop/'.$allcat->id)}}">{{$subcat->subcategory}}</a></li>
                                </ul>
                                @endforeach
                            </li>
                            
                        @endforeach
                       
                       
                    </ul>

                     <div class="search-filter">
                        <form action="#">
                            <div class="check-box-inner mt-10">
                                <h4 class="title">Filter By</h4>
                                <h4 class="sub-title pt-10">Disease or illness</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20820">
                                    <label for="20820">Fever <span>(13)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20821">
                                    <label for="20821">Cold/Cough <span>(6)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20822">
                                    <label for="20822">Acne<span>(11)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20823">
                                    <label for="20823">Vitamin Deficiency<span>(2)</span></label>
                                </div>
                                
                            </div>
                            <!-- check-box-inner -->
                             <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Price</h4>
                                <div class="price-filter mt-10">
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" name="price" readonly
                                            placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                    <!-- search-filter end -->
                    <div class="product-widget mb-60 mt-30">
                        <h3 class="title">Product Tags</h3>
                        <ul class="product-tag d-flex flex-wrap">
                            <li><a href="{{url('shopnewproducts')}}">New products</a></li>
                            <li><a href="{{url('shopsale')}}">sale</a></li>
                        </ul>
                    </div>
                   
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

@endsection