
@extends('front.master')

@section('title','Contact Us')

@section('content')

<!-- breadcrumb-section start -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.9643058646284!2d78.15252451502995!3d26.19783938344067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3976c5cd1251880d%3A0x16f46a194cf92c39!2sJai%20Maa%20Gumano%20Medico%20%26%20Surgico!5e0!3m2!1sen!2sin!4v1602237514641!5m2!1sen!2sin"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="100%" height="400px">
    
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-15">
                        <h2 class="title text-dark text-capitalize">Contact Us</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
      
</iframe>

            @if(session('message'))

              <p class="alert alert-success">
                {{session('message')}}
              </p>

            @endif

<!-- breadcrumb-section end -->
<!-- product tab start -->
<section class="contact-section pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mb-30">
                <!--  contact page side content  -->
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Contact Us</h3>
                    <p class="contact-page-message mb-30">Be a part of the family, Join us at JMG and recieve best medical facilities.
                         Do not forget to rate us on google, your reviews are highly welcomed. You can directly contact us on whatsapp or via call, you can also visit our instagram and facebook pages. 
                         Click on the icons to visit our pages -</p>
                    <!--  single contact block  -->

                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Address</h4>
                        <p> Shatabdi Complex, Shop,G-5, Huzrat Pull, Lashkar, Gwalior, Madhya Pradesh 474001</p>
                    </div>

                    <!--  End of single contact block -->

                    <!--  single contact block -->

                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <h4>Hours:</h4> 10:00 a.m.- 9:30 p.m.<br><br><br>
                    <h4>Phone:</h4> 09144480962,<br>9826236830
                    </div>

                    <!-- End of single contact block -->

                    <!--  single contact block -->

                    <div class="single-contact-block">
                        <h4><i class="fas fa-envelope"></i> Email</h4>
                        <p>
                            <a href="mailto:sales.jaimaagumano@gmail.com">sales.jaimaagumano@gmail.com</a>
                        </p>
                        <p> <a href="mailto:shubham.yatharth@gmail.com">shubham.yatharth@gmail.com</a></p>
                    </div>

                    <!--=======  End of single contact block  =======-->
                </div>

                <!--=======  End of contact page side content  =======-->

            </div>
            <div class="col-lg-6 col-12 mb-30">
                <!--  contact form content -->
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Tell Us Your Message/Request a product</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="{{url('savecontact')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Your Name <span class="required">*</span></label>
                                <input type="text" name="name" id="customername" required="">
                            </div>
                            <div class="form-group">
                                <label>Your Email <span class="required">*</span></label>
                                <input type="email" name="email" id="customerEmail" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" id="contactSubject" required="">
                            </div>
                            <div class="form-group">
                                <label>Product Name and description</label>
                                <textarea name="des" class="pb-10" id="contactMessage"
                                    required=""></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" value="submit" id="submit" class="btn theme-btn--dark1 btn--lg"
                                    name="submit">submit</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messegemt-10"></p>
                </div>
                <!-- End of contact -->
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->

@endsection