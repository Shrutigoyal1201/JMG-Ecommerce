@extends('front.master')

@section('title','Register')

@section('content')

<style type="text/css">
    .back
    {
        background-image: url('https://img5.goodfon.com/wallpaper/nbig/0/c9/capsules-pills-medicine.jpg');
        background-repeat:no-repeat!important;
         background-position: center bottom!important;
         background-size: cover!important;
    }
    .box
    {
        box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
        width: 35%;
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
@foreach ($banner as $banner)
<nav class="breadcrumb-section back theme1 pt-110 pb-110">
@endforeach    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Register</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- product tab start -->
<div class="register pt-80 pb-80">
    <div class="container">
        <div class="row">
            <center>
                <div class="box alert-light">
                    <h3 class="pt-30 pb-25">Create an account</h3>
                    <div class="log-in-form">

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
                        <form method="post" action="{{url('registerusers')}}" class="personal-information">

                            @csrf

                            <div class="order-asguest theme1 mb-3">
                                <span>Already have an account?</span>
                                <a class="text-muted hover-color" href="{{url('front/login')}}">Log in instead!</a>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Password" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="password" name="password" class="form-control" id="Password">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text theme-btn--dark1 btn--md show-password" onclick="showHide()" id="eye">show
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="sign-btn text-center">
                                        <button class="btn theme-btn--dark1 btn--md">Register</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
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
