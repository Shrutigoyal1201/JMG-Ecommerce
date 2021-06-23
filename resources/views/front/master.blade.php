<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('frontend/img/logo.jpg')}}" />

    <link rel="stylesheet" href="{{url('frontend/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/plugins/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/plugins/plugins.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/style.min.css')}}" />

    <style type="text/css">
        .nav-color
        {
            background-image: linear-gradient(to right,#1e3131,#69d6d6);
        }
        .btn
        {
            background-color:#00868B!important;
        }
        .menu-btn,.theme-default
        {
            background-image: linear-gradient(to right,#69d6d6,#1e3131)!important;
        }

         .footer
        {
         background: url('../frontend/img/footer.jpg')!important;
         background-repeat:no-repeat!important;
         background-position: center bottom!important;
         background-size: cover!important;"
        }
        .mobfooter
        {
            display: none;
        }
        @media(max-width: 700px)
        {
            .footer
            {
                  display: none;
            }
            .mobfooter
            {   
                display: block;
                 background: url('../frontend/img/footer.jpg')!important;
                 background-repeat:no-repeat!important;
                 background-position: center bottom!important;
                 background-size: cover!important;"
            }
        }
    </style>
</head>

<body>

        <!-- WISHLIST SIDEBAR -->
        
        @php 

            if(Auth::check())
            {   
                $useremail=Auth::User()->email;

                $sidewish = DB::table('wishlists')->join('products','wishlists.pid','=','products.id')->where('wishlists.u_email','=',$useremail)->get(); 
            }

        @endphp

        
        <!-- CART SIDEBAR -->
        @php 

            if(Auth::check())
            {   
                $useremail=Auth::User()->email;

                $cart = DB::table('carts')->where('useremail',$useremail)->get(); 
            }
            else
            {  
                $session=Session::getId();

                $r = DB::table('carts')->where('session_id',$session)->get(); 

            }
        
        @endphp

<!-- offcanvas-overlay start-->
<div class="offcanvas-overlay"></div>
<!-- offcanvas-overlay end -->
<!-- offcanvas-mobile-menu start -->
<div id="offcanvas-mobile-menu" class="offcanvas theme3 offcanvas-mobile-menu">
    <div class="inner">

        <div class="border-bottom mb-4 pb-4 text-right">
             @if(Auth::check() and Auth::User()->role==1)
                <a href="{{url('account')}}" class="float-left title">{{Auth::user()->name}}'s Account! <i class="ion-ios-arrow-right"></i><i class="ion-ios-arrow-right"></i></a>
            @endif
            <span><button class="offcanvas-close">×</button>
           </span>
        </div>

        
        <div class="offcanvas-head mb-4">
            <nav class="offcanvas-top-nav">
                <ul class="d-flex justify-content-center align-items-center">
                    <li class="mx-4"><a href="{{url('cart')}}"><i class="icon-bag"></i> Cart <span> 
                    @if(Auth::check())
                        ({{$cart->count()}})
                    @else 
                        ({{$r->count()}})
                    @endif</span>
                        </a></li>
                    <li class="mx-4">
                        <a href="{{url('wishlist')}}"> <i class="ion-android-favorite-outline"></i> Wishlist
                            <span>
                    @if(Auth::check())
                        ({{$sidewish->count()}})
                    @else
                        (0)
                    @endif</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="offcanvas-menu">
            <ul>
                <li><a href="{{url('/')}}"><span>Home</span></a>
                    
                </li>
                <li><a href="{{url('shop')}}"><span class="menu-text">Shop</span></a>
                    <ul class="offcanvas-submenu">

                        @php 

                        $allcategories = DB::table('categories')->get(); 
                                            
                        @endphp

                        @foreach($allcategories as $maincategory)

                        <li>
                            <a href="{{url('shop')}}"><span class="menu-text">{{$maincategory->name}}</span></a>
                            <ul class="offcanvas-submenu">

                                @php

                                $Subcategory=DB::table('subcategories')->where('category_id','=',$maincategory->id)->get();
                                                                
                                @endphp

                                @foreach($Subcategory as $subcategory)

                                <li><a href="{{url('shop/'.$maincategory->id)}}">{{$subcategory->subcategory}}</a></li>
                                        
                                @endforeach
                               
                            </ul>
                        </li>

                        @endforeach
                    </ul>
                </li>
                
                <li><a href="{{url('about')}}">About Us</a></li>
                <li><a href="{{url('contact')}}">Contact Us</a></li>
            </ul>
        </nav>
        <div class="offcanvas-social py-30">
            <ul>
                <li>
                    <a href="https://m.facebook.com/HealthandmedicineatJMG/?tsid=0.3179322746523827&source=result"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/jaimaagumano/"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                    <a href="mailto:sales.jaimaagumano@gmail.com"><i class="icon-social-google"></i></a>
                </li>
                <li>
                    <a href="tel:9144480962"><i class="fa fa-phone"></i></a>
                </li>
                <li>
                    <a href="https://wa.link/6hjrok"><i class="fab fa-whatsapp"></i></a>
                </li>
                
            </ul>
        </div>

        <br><br>
        @if(Auth::check())
            
            <a href="{{url('front/logout')}}" class="btn theme-btn--dark1 btn--lg d-block d-sm-inline-block mt-4 mt-sm-0 rounded-5">Sign Out</a>
                            
        @else

            <a href="{{url('front/login')}}" class="btn theme--btn-default btn--lg d-block d-sm-inline-block rounded-5 mr-sm-2">Login</a>
            <a href="{{url('front/register')}}" class="btn theme-btn--dark1 btn--lg d-block d-sm-inline-block mt-4 mt-sm-0 rounded-5">Register</a>
                            
        @endif

    </div>
</div>
<!-- offcanvas-mobile-menu end -->

        

<!-- OffCanvas Wishlist Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist theme3">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title">Wishlist</span>
            <button class="offcanvas-close">×</button>
        </div>

       
        <ul class="minicart-product-list" style="overflow: scroll;">
            @if(Auth::check())
                @if($sidewish->count()>0)

                    @foreach($sidewish as $wishsidebar)
                   
                   <li>
                        <a href="{{url('productdetail/'.$wishsidebar->pid)}}" class="image"><img src="{{ url('/upload/'.$wishsidebar->image) }}"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="{{url('productdetail/'.$wishsidebar->pid)}}" class="title">{{$wishsidebar->product_name}}</a>
                            <span class="amount">{{$wishsidebar->product_price}}</span>
                            <a href="{{url('wishlist/itemdelete/'.$wishsidebar->id)}}" class="remove">×</a>
                        </div>
                    </li>

                    @endforeach
                
                @endif
            @else
        
                To add products to the wishlist! <a href="{{url('front/login')}}"><b class="alert-info"> Login First!</b></a>
        
            @endif
          
        </ul>
        <a href="{{url('wishlist')}}" class="btn theme--btn-ddefault btn--lg d-block d-sm-inline-block rounded-5 mt-30">view
            wishlist</a>
             
    </div>
</div>
<!-- OffCanvas Wishlist End -->      


<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart theme3">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <ul class="minicart-product-list" style="overflow: scroll;">
            <?php $total_amount=0; ?>

             @if(Auth::check())
                @if($cart->count()>0)

                    @foreach($cart as $cartdata)
                        <li>
                            <a href="{{url('productdetail/'.$cartdata->product_id)}}" class="image"><img src="{{ url('/upload/'.$cartdata->product_image) }}"
                                    alt="Cart product Image"></a>
                            <div class="content">
                                <a href="{{url('productdetail/'.$cartdata->product_id)}}" class="title">{{ $cartdata->product_name}}</a>
                                <span class="quantity-price">{{$cartdata->product_quantity}} x <span class="amount">{{$cartdata->product_price}}</span></span>
                                <a href="{{url('cart/delete/'.$cartdata->id)}}" class="remove">×</a>
                            </div>
                        </li>   

                         <?php $total_amount=$total_amount+($cartdata->product_price*$cartdata->product_quantity); ?>

                    @endforeach

                @else
                    
                     <center><img src="http://www.cheemastudio.com/no-product-found.jpg" class="col-md-3 mt-30 mb-30 img-fluid"></center>

                @endif

            @else

                @if($r->count()>0)

                    @foreach($r as $cartdata1)
                        <li>
                            <a href="{{url('productdetail/'.$cartdata1->product_id)}}" class="image"><img src="{{ url('/upload/'.$cartdata1->product_image) }}" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="{{url('productdetail/'.$cartdata1->product_id)}}" class="title">{{ $cartdata1->product_name }}</a>
                                <span class="quantity-price">1 x <span class="amount">{{$cartdata1->product_price}}</span></span>
                                <a href="{{url('cart/delete/'.$cartdata1->id)}}" class="remove">×</a>
                            </div>
                        </li>  

                        <?php $total_amount=$total_amount+($cartdata1->product_price*$cartdata1->product_quantity); ?>

                    @endforeach
                

                @else
                    
                     <center><img src="http://www.cheemastudio.com/no-product-found.jpg" class="col-md-3 mt-30 mb-30 img-fluid"></center>

                @endif


            @endif
          
        </ul>
        <div class="sub-total d-flex flex-wrap justify-content-between">
            <strong>Subtotal :</strong>
            <span class="amount">Rs. <?php echo $total_amount;?></span>
        </div>
        <a href="{{url('cart')}}" class="btn theme--btn-ddefault btn--lg d-block d-sm-inline-block rounded-5 mr-sm-2">view
            cart</a>
        <p class="minicart-message">Free Shipping on All Orders above Rs. 500!</p>
    </div>
</div>
<!-- OffCanvas Cart End -->
<!-- header start -->
<header>
    <!-- header top start -->
    <div id="sticky" class="header-top theme3 nav-color d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-xl-9 col-lg-8 position-xl-relative">
                    <!-- header bottom start -->
                    <nav class="header-bottom">
                        <ul class="main-menu d-flex">
                            <li class="active ml-0">
                                <a href="{{url('/')}}" class="pl-0">Home</a>
                                
                            </li>
                              <li class="position-static">
                            <a href="{{url('shop')}}">Shop <i class="ion-ios-arrow-down"></i></a>
                            <ul class="mega-menu row">
                                <li class="col-3">
                                    <ul>
                                        <li class="mega-menu-title"><a href="#">Shop By Category</a></li>
                                        @php 

                                            $shopbycategory = DB::table('categories')->get(); 
                                            
                                        @endphp

                                        @foreach($shopbycategory as $shop)

                                        <li><a href="{{url('shop/'.$shop->id)}}">{{$shop->name}}</a></li>
                                        
                                        @endforeach

                                    </ul>
                                </li>
                                
                                <!--  <li class="col-6 mt-4">
                                    <a href="single-product.html" class="zoom-in overflow-hidden"><img
                                            src="assets/img/mega-menu/1.jpg" alt="img"></a>
                                </li>
                                <li class="col-6 mt-4">
                                    <a href="single-product.html" class="zoom-in overflow-hidden"><img
                                            src="assets/img/mega-menu/2.jpg" alt="img"></a>
                                </li> -->
                            </ul>
                        </li>
                            
                             <li><a href="{{url('about')}}">About</a></li>

                            <li><a href="{{url('contact')}}">contact Us</a></li>
                        </ul>
                    </nav>
                    <!-- header bottom end -->
                </div>
                <div class="col-xl-3 col-lg-4">
                    <nav class="navbar-top pb-2 pb-md-0">
                        <ul class="d-flex justify-content-center justify-content-md-end align-items-center">
                            @if(Auth::check() and Auth::User()->role==1)

                                <li>
                                <a href="#" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-user text-uppercase">  {{Auth::user()->name}} <i class="ion ion-ios-arrow-down"></i></i></a>
                                <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown1">
                                    <li><a href="{{url('account')}}">My account</a></li>
                                    <li><a href="{{url('cart')}}">Checkout</a></li>
                                    <li><a href="{{url('front/logout')}}">Sign out</a></li>
                                </ul>
                            </li></i>
                            
                            @else
                            
                            <li><a href="{{url('front/login')}}">Login</a></li>
                            <li><a href="{{url('front/register')}}">Register</a></li>
                                 
                            @endif

                            <li class="nav-item dropdown">
                                <a href="#" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">CONNECT! <i class="ion ion-ios-arrow-down"></i>
                                </a>
                                <!--dropdown menu start-->
                               <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown1">
                                    <li><a class="dropdown-item text-dark" href="tel:9144480962">
                                        <i class="fa fa-phone" aria-hidden="true" style="color:black;font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Call us
                                    </a></li>
                                    <li><a class="dropdown-item text-dark" href="https://wa.link/6hjrok">
                                        <i class="fab fa-whatsapp" aria-hidden="true" style="color:black;font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Chat with us
                                    </a></li>
                                    <li><a class="dropdown-item text-dark" href="https://www.instagram.com/jaimaagumano/">    
                                        <i class="fab fa-instagram" style="color:black;font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Join us on instagram
                                    </a></li>
                                    <li><a class="dropdown-item text-dark" href="https://m.facebook.com/HealthandmedicineatJMG/?tsid=0.3179322746523827&source=result">
                                        <i class="fab fa-facebook-f" style="color:black;font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Join us on facebook 
                                    </a></li>
                                    <li><a class="dropdown-item text-dark" href="mailto:sales.jaimaagumano@gmail.com">
                                        <i class="fab fa-google" aria-hidden="true" style="color:black;font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Send us an Email
                                    </a></li>
                                </ul><!--dropdown menu end-->
                            </li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- header-middle satrt -->
    <div class="header-middle theme3 bg-white py-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-5 col-lg-2 order-first">
                    <div class="logo text-center text-sm-left mb-30 mb-sm-0">
                        <a href="{{url('/')}}"><img src="{{url('frontend/img/logo.jpg')}}" width="30%" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-0">
                    <div class="d-flex flex-wrap w-100 align-items-center">
                        <div class="vertical-menu d-none d-lg-block">
                            <button class="menu-btn d-flex"><span class="ion-android-menu"></span>All Categories<span
                                    class="ion-ios-arrow-down d-block ml-auto"></span> </button>
                            <ul class="vmenu-content display-none">
                                
                                
                                @foreach($allcategories as $maincategory)

                                <li class="menu-item">
                                    <a href="#">{{$maincategory->name}}<i class="ion-ios-arrow-right"></i></a>
                                    <ul class="verticale-mega-menu flex-wrap">
                                       
                                       
                                        @foreach($Subcategory as $subcategory)

                                        <li>
                                            <a href="#">
                                                <span> <strong>{{$subcategory->subcategory}}</strong></span>
                                            </a>
                                            <ul class="submenu-item">
                                                <li><a href="{{url('shop/'.$maincategory->id)}}">Eyes</a></li>
                                            </ul>
                                        </li>

                                        @endforeach
                                       
                                   </ul>
                                    <!-- sub menu -->
                                </li>
                                @endforeach
                            </ul>
                            <!-- menu content -->
                        </div>
                        <div class="search-form width-calc-from-left pl-35 mt-30 mt-lg-0">
                            <form class="form-inline position-relative" type="get" action="{{url('search')}}">
                                <input class="form-control theme3" type="search" name="search"
                                    placeholder="Search by product,brand or more...">
                                <button class="btn bg-white search-btn position-left" type="submit"><i
                                        class="icon-magnifier"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 position-relative">
                    <div class="d-flex align-items-center justify-content-center justify-content-sm-end">
                        <div class="cart-block-links theme1">
                            <ul class="d-flex">
                                <li>
                                    <a class="offcanvas-toggle" href="#offcanvas-wishlist">
                                        <span class="position-relative">
                                            <i class="icon-heart"></i>
                                            @if(Auth::check())
                                             <span class="badge cbdg1">
                                                {{$sidewish->count()}}
                                             </span>
                                            @else
                                             <span class="badge cbdg1">0</span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                                <li class="mr-0 cart-block position-relative">
                                    <a class="offcanvas-toggle" href="#offcanvas-cart">
                                        <span class="position-relative">
                                            <i class="icon-bag"></i>
                                            <span class="badge cbdg1">
                                                @if(Auth::check()) {{$cart->count()}}
                                                @else {{$r->count()}}
                                                @endif
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <!-- cart block end -->

                                
                            </ul>
                        </div>
                        <div class="mobile-menu-toggle theme3 d-lg-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewbox="0 0 800 600">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318)">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle end -->
    <div class="mobile-category-nav theme3 d-lg-none pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--=======  category menu  =======-->
                    <div class="hero-side-category">
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
                        </div>
                            
                        
                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                              
                                @foreach($allcategories as $maincategory)

                                <li class="menu-item-has-children menu-item-has-children-1">
                                    <a href="#">{{$maincategory->name}}<i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->

                                    
                                    <ul class="category-mega-menu category-mega-menu-1">
                                    
                                    
                                    @foreach($Subcategory as $subcategory)
                                        <li><a href="#">{{$subcategory->subcategory}}</a></li>

                                    @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li>
                                    <a href="#" id="more-btn"><i class="ion-ios-plus-empty"></i>
                                        More Categories</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=======  End of category menu =======-->
</header>
<!-- header end -->


@yield('content')


<!-- brand slider start -->
<!-- footer start -->
<div class="container-fluid footer"><!--container fluid-2 start-->
        <div class="row"><!--row start-->
            <div class="col-md-4"><!--col-md-4 start-->
                <br>
                <h1 class="mb-50">Contact Us</h1>
            <div class="row mb-30">
                <h6 class="col-md-2"> Address: </h6>
                <p class="col-md-8"> Shatabdi Complex, Shop, G-5,  Huzrat Pull,  Lashkar,  Gwalior,  Madhya Pradesh 474001</p>
            </div>
            <div class="row mb-30">
                <h6 class="col-md-2">Hours:</h6>
                <p class="col-md-8"> 11:00 a.m.- 7:30 p.m.</p>
                
            </div>
            <div class="row mb-30">
                <h6 class="col-md-2">Phone:</h6>
                <p class="col-md-8">9144480962, 9826236830</p>
               
            </div>
            
            <div class="h3">
                <a href="https://m.facebook.com/HealthandmedicineatJMG/?tsid=0.3179322746523827&source=result">
                    <i class="fab fa-facebook-square"></i>
                </a>
                
                <a href="https://www.instagram.com/jaimaagumano/">
                    <i class="fab fa-instagram-square"></i>
                </a>
                <a href="https://wa.link/6hjrok">
                    <i class="fab fa-whatsapp-square ml-20 "></i>
                </a>
                <a href="tel:9144480962">
                    <i class="fas fa-phone-square ml-20 "></i>
                </a>
                <a href="mailto:sales.jaimaagumano@gmail.com">
                    <i class="fas fa-envelope ml-20 "></i>
                </a>
            </div>
       
            </div><!--col-md-4 end-->
             <div class="col-md-3 text-secondary"><!--col-md-4 start-->
                <br>
                <h1 class="mb-50">Explore</h1>
                <a href="index.html">HOME</a><br><br>
                <a href="about.html">ABOUT US</a><br><br>
                <a href="ourproducts.html">OUR PRODUCTS</a><br><br>
                <a href="brands.html">BRANDS AVAILABLE</a><br><br>
                <!--a href="" class="text-light">DISEASE AND ITS CURE</a><br><br>
                <a href="" class="text-light">OUR NETWORK</a><br><br-->
                <a href="contact.html">CONTACT US</a><br><br>
            </div><!--col-md-4 end-->
            <div class="col-md-5">
            </div>
            
        </div><!--row end-->
    </div><!--container fluid-2 end-->
<!-- footer end -->

<!-- Mobile footer start -->
<div class="container-fluid mobfooter"><!--container fluid-2 start-->
        <div class="row"><!--row start-->
            <div class="col-md-4"><!--col-md-4 start-->
                <br>
                <h1 class="mb-50">Contact Us</h1>
            <div class="row mb-30">
                <h6 class="col-md-2"> Address: </h6>
                <address class="col-md-8"> Shatabdi Complex, Shop, G-5,  Huzrat Pull,  Lashkar,  Gwalior,  Madhya Pradesh 474001</address>
            </div>
            <div class="row mb-30">
                <h6 class="col-md-2">Hours:</h6>
                <p class="col-md-8"> 11:00 a.m.- 7:30 p.m.</p>
                
            </div>
            <div class="row mb-30">
                <h6 class="col-md-2">Phone:</h6>
                <p class="col-md-8">9144480962, 9826236830</p>
               
            </div>
            
            <div class="h3">
                <a href="https://m.facebook.com/HealthandmedicineatJMG/?tsid=0.3179322746523827&source=result">
                    <i class="fab fa-facebook-square"></i>
                </a>
                
                <a href="https://www.instagram.com/jaimaagumano/">
                    <i class="fab fa-instagram-square"></i>
                </a>
                <a href="https://wa.link/6hjrok">
                    <i class="fab fa-whatsapp-square ml-20 "></i>
                </a>
                <a href="tel:9144480962">
                    <i class="fas fa-phone-square ml-20 "></i>
                </a>
                <a href="mailto:sales.jaimaagumano@gmail.com">
                    <i class="fas fa-envelope ml-20 "></i>
                </a>
            </div>
       
        </div><!--row end-->
    </div><!--container fluid-2 end-->
<!-- Mobile footer end -->


<!-- modals start -->
<!-- first modal -->
<div class="modal fade theme3 style1" id="quick-view" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 mx-auto col-lg-5 mb-5 mb-lg-0">
                        <div class="product-sync-init mb-20">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/4.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/5.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/6.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/7.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                        </div>

                        <div class="product-sync-nav">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"> <img src="assets/img/hot-deals/thumb/4.2x.jpg"
                                            alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"> <img src="assets/img/hot-deals/thumb/5.2x.jpg"
                                            alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"><img src="assets/img/hot-deals/thumb/6.2x.jpg"
                                            alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"><img src="assets/img/hot-deals/thumb/7.2x.jpg"
                                            alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                        </div>
                    </div>
                    <div class="col-lg-7 mt-5 mt-md-0">
                        <div class="modal-product-info">
                            <div class="product-head">
                                <h2 class="title">New Balance Running Arishi trainers in triple</h2>
                                <h4 class="sub-title">Reference: demo_5</h4>
                                <div class="star-content mb-20">
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                </div>
                            </div>
                            <div class="product-body mb-40">
                                <div class="d-flex align-items-center mb-30">
                                    <h6 class="product-price"><del class="del">$23.90</del>
                                        <span class="onsale">$21.51</span></h6>
                                    <span class="badge position-static bg-dark p-2 rounded-0 ml-2">Save 10%</span>
                                </div>
                                <p>Break old records and make new goals in the New Balance® Arishi Sport v1.</p>
                                <ul>
                                    <li>Predecessor: None.</li>
                                    <li>Support Type: Neutral.</li>
                                    <li>Cushioning: High energizing cushioning.</li>
                                </ul>
                            </div>
                            <div class="product-footer">
                                <div class="product-count style d-flex flex-column flex-sm-row my-4">
                                    <div class="count d-flex">
                                        <input type="number" min="1" max="10" step="1" value="1">
                                        <div class="button-group">
                                            <button class="count-btn increment"><i
                                                    class="fas fa-chevron-up"></i></button>
                                            <button class="count-btn decrement"><i
                                                    class="fas fa-chevron-down"></i></button>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn theme-btn--dark3 btn--xl mt-5 mt-sm-0 rounded-5">
                                            <span class="mr-2"><i class="ion-android-add"></i></span>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                                <div class="addto-whish-list">
                                    <a href="{{url('wishlist')}}"><i class="icon-heart"></i> Add to wishlist</a>
                                    <a href="#"><i class="icon-shuffle"></i> Add to compare</a>
                                </div>
                                <div class="pro-social-links mt-10">
                                    <ul class="d-flex align-items-center">
                                        <li class="share">Share</li>
                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="ion-social-google"></i></a></li>
                                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- second modal -->
<div class="modal fade style2" id="compare" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="title"><i class="fa fa-check"></i> Product added to compare.</h5>
            </div>
        </div>
    </div>
</div>
<!-- second modal -->
<div class="modal fade style3" id="add-to-cart" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <h5 class="modal-title" id="add-to-cartCenterTitle"> <span class="ion-checkmark-round"></span>
                    Product successfully added to your shopping cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 divide-right">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="assets/img/hot-deals/thumb/4.2x.jpg" alt="img">
                            </div>
                            <div class="col-md-6 mb-2 mb-md-0">
                                <h4 class="product-name">New Balance Running Arishi trainers in triple</h4>
                                <h5 class="price">$$29.00</h5>
                                <h6 class="color"><strong>Dimension: </strong>: <span class="dmc">40x60cm</span> </h6>
                                <h6 class="quantity"><strong>Quantity:</strong>&nbsp;1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="modal-cart-content">
                            <p class="cart-products-count">There is 1 item in your cart.</p>
                            <p><strong>Total products:</strong>&nbsp;$123.72</p>
                            <p><strong>Total shipping:</strong>&nbsp;$7.00 </p>
                            <p><strong>Taxes</strong>&nbsp;$0.00</p>
                            <p><strong>Total:</strong>&nbsp;$130.72 (tax excl.)</p>
                            <div class="cart-content-btn">
                                <button type="button" class="btn theme-btn--dark3 btn--md mt-4"
                                    data-dismiss="modal">Continue
                                    shopping</button>
                                <button class="btn theme-btn--dark3 btn--md mt-4"><i
                                        class="ion-checkmark-round"></i>Proceed to
                                    checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modals end -->

    <script src="{{url('frontend/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('frontend/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="{{url('frontend/js/popper.min.js')}}"></script>
    <script src="{{url('frontend/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{url('frontend/js/plugins/plugins.js')}}"></script>
    <script src="{{url('frontend/js/main.js')}}"></script>
    <script>
        function select_payment_method()
        {
            // alert ("Hello");

            if($('.upi').is(':checked') || $('.cod').is(':checked') || $('.googlepay').is(':checked') || $('.paytm').is(':checked') )
            {
                  alert('Payment method selected');
            }
            else
            {
                  alert('Please select payment method');
                  return false;
            }
        }
    </script>

    <script>
        function empty_cart()
        {
            alert('Cart is empty! Please add items to checkout');
        }

    </script>
    <script type="text/javascript">
      function myPrint()
      {
        window.addEventListener("load", window.print());
      }
    </script>

    <script>
        function show() 
        {
          var p = document.getElementById('pwd');
          p.setAttribute('type', 'text');
        }

        function hide() 
        {
          var p = document.getElementById('pwd');
          p.setAttribute('type', 'password');
        }

        function showHide()
        {
          var pwShown = 0;

          document.getElementById("eye").addEventListener("click", function() 
          {
            if (pwShown == 0)
            {
              pwShown = 1;
              show();
            } 
            else
            {
              pwShow = 0;
              hide();
            }
          }, false);
        }
    </script>

</body>

</html>