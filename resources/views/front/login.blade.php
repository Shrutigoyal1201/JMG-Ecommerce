
@extends('front.master')

@section('title','Login')

@section('content')

<style type="text/css">
    
    .box
    {
        background-image: url('https://img5.goodfon.com/wallpaper/nbig/0/c9/capsules-pills-medicine.jpg');
        background-repeat:no-repeat!important;
         background-position: center bottom!important;
         background-size: cover!important;
        box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
        width: 35%;
    }
    .icon
    {
        width: 10%;
        height: auto;
    }
    @media(max-width: 700px)
    {
        .box
        {
            width: 100%;
        }
    }
</style>
<!-- breadcrumb-section start -->
 
<nav class="breadcrumb-section theme1 pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">login</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Log in to your account </li>
                </ol>
            </div>
        </div>
    </div>
<!-- product tab start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row pt-80 pb-80">
            <center>
                <div class="box">

                    <h3 class="pt-30 pb-25">Log in to your account </h3>

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
                    
                    <form method="post" action="{{url('loginsave')}}" class="log-in-form">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control bg-muted" id="staticEmail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="password" name="password" class="form-control bg-muted" id="inputPassword">

                                </div>

                            </div>

                        </div>

                        <input type="hidden" name="role" value='1'>
                        <br>

                        <center>
                            <div class="flex items-center mt-4">

                                <div class="row">

                                    <div class="justify-content-center">
                                        <a href="{{ url('auth/google') }}">
                                           <img src="https://img.icons8.com/color/452/google-logo.png" class="icon" >
                                        </a>

                                        <a href="{{ url('login/facebook') }}">
                                           <img src="https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/facebook-512.png" class="icon" >
                                        </a>
                                    </div>

                                   
                                </div>
                            </div>
                        </center>
                        <br>
                        <div class="form-group row pb-3 text-center">
                            <div class="col-md-6 offset-md-3">
                                <div class="login-form-links">
                                    <a href="{{url('/forget-password')}}" class="for-get">Forgot your password?</a>
                                    <div class="sign-btn">
                                        <button type="submit" class="btn theme-btn--dark1 btn--md">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row text-center mb-0">
                            <div class="col-12">
                                <div class="border-top">
                                    <a href="{{url('front/register')}}" class="no-account">No account? Create one here</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
<!-- product tab end -->
</nav>

<!-- breadcrumb-section end -->


<!-- staic media start -->
<section class="static-media-section menu-btn theme-bg3 py-45">
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
