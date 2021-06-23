@extends('front.master')

@section('title','About JMG')

@section('content')

<style type="text/css">
        p
        {
            text-align: justify;
            color: #6c757d;
            font-size: 18px;
            line-height: 40px;
        }
        .mis
        {
            background-color: #daf0fe;
        }
        .team
        {
            background-color: #adc7d3;
            padding-left: 20px;
        }
        .i1
        {
            box-shadow: 0 5px 20px;
            width: 400px;
        }
        .box
        {
            box-shadow: 0 5px 20px;
            width: 330px;
            border:1px solid;
            border-color: grey;
            margin: 10px auto;
            position: relative;
            overflow: hidden;
        }
        .box img
        {
            width: 100%;
            height: auto;
            transition: all 0.4s;
        }
       .box:hover img 
        {
            transform: scale(0);
        }
        .box .box-content
        {
            background:black;
            color: #fff;
            position: absolute;
            left: 0;
            top:0;
            width: 100%;
            height: 100%;
            padding: 30px;
            box-sizing: border-box;
            transform:scale(0) rotate(-180deg);
            opacity: 0;
            transition: all 0.4s;
        }
        .box:hover .box-content
        {
            opacity: 1;
            transform: scale(1) rotate(0deg);
            transition-delay: 0.2s;
        }
        @media(max-width: 700px)
        {
            p
            {
                text-align: justify;
                color: #6c757d;
                font-size: 13px;
                line-height: 20px;
            }
            
        }

    </style>


<!-- breadcrumb-section start -->
@foreach($banner as $banner)
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110" style="background: url('{{ url('/upload/'.$banner->image) }}'); background-repeat:no-repeat; background-position: center bottom; background-size: cover;">
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">About Us</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!--container-fluid start-->
    <div class="container-fluid">
       
        <div class="row" style="height: 500px;"><!--row start-->
            <div class="col-md-2 mis"><!--col-md-2 start-->
            </div><!--col-md-2 end-->
            <div class="col-md-8"><!--col-md-8 start-->
                <br>
                <h1>OUR MISSION & VISION</h1><br>
                <p>
                    Our mission is to expand and establish a firm foothold in the pharmaceutical industry. Currently we are aiming at increasing our online presence so that we can reach out to people all across the country. 
                    We have a vision of a prosperous INDIA with top medical facilities.
                    Our goal is to provide our customers a one-stop destination, servicing to the most remotest parts of India. We are a wholesale outlet store supplying allopathy and ayurvedic medicines and personal care products at the most affordable price with no compromises in the quality.We have already served more than a million people over the course of our 33 years long journey.To see our customers happy and satisfied is our utmost priority. The belief that customer's satisfaction is as important as our products and services, have helped us garner a vast base of customers, which continues to grow by the day. We employ individuals that are dedicated towards their respective roles and put in a lot of effort to achieve the common vision and larger goals of the company. In the near future, we aim to expand our line of products and services and cater to a larger client base. 
                </p>
            </div><!--col-md-8 end-->
        </div><!--row end-->
        <br><br><br>
        <div class="row"><!--row start-->
            <div class="col-md-8"><!--col-md-8 start-->
                <img src="https://www.iengineksa.com/wp-content/uploads/2018/01/Banner_OurTeam.jpg" class="w-100">
            </div><!--col-md-8 end-->
            <div class="col-md-4 team"><!--col-md-4 start-->
            </div><!--col-md-4 end-->
        </div><!--row end-->
        <div class="row"><!--row start-->
            <div class="col-md-1"><!--col-md-1 start-->
            </div><!--col-md-1 end-->
            <div class="col-md-6"><!--col-md-6 start-->
                <br><br>
                <h1>MEET THE TEAM</h1>
            </div><!--col-md-6 end-->
            <div class="col-md-5"><!--col-md-5 start-->
            </div><!--col-md-5 end-->
        </div><!--row end-->
        <div class="row"><!--row start-->
            <div class="col-md-1"><!--col-md-1 start-->
            </div><!--col-md-1 end-->
            <div class="col-md-6"><!--col-md-6 start-->
                <br><br>
                <h4 >Founder & Director-Ajay Goyal Basu</h4>
                <br>
                <p style="text-align: justify;"> Mr. Ajay Goyal Basu, the founder and director of JMG (Jai Maa Gumano Medico & Surgico) is a        qualified stockist and pharmacist serving the mankind since 1987. He, who laid the roots of this very establishment 33 years     back, is a well trained chemist and license holder. In his career in the pharmaceutical industry he has served hundreds and     thousands of people and counting more.
                    He is an ethical practitioner and expertise of medicine who will continue to serve for the health and betterment of the people with the blessings of Goddess Maa Gumano,the female deity worshiped by our clan. 
                </p>
            </div><!--col-md-6 end-->
            <div class="col-md-1"><!--col-md-1 start-->
            </div><!--col-md-1 end-->
            <div class="col-md-4"><!--col-md-4 start-->
                <center>
                <div class="box"><!--box start-->
                <img src="frontend/img/pappa.jpg"  class="img-fluid i" alt="222">
                    <div class="box-content text-light"><!--box-content start-->
                        <h4>Mr.Ajay Goyal Basu</h4>
                        <br>
                        <h6 style="text-align: justify;font-size: 12px">Mr.Ajay is a well known pharmacist but along with that he is an active social servant. He served as the president of Agrawal Samaj back in 2013-16. He started his journey as a speaker, stage manager and operator. As a speaker, he has hosted 125+ social events (Social matchmaking, underpriveledged welfare, communal events, etc) held all across the country and counting more. He is a man of few words but when he speaks on stage his charismatic personality renders everyone around him in complete awe and a sense of admiration.<br>You can join him on facebook - <a href="https://www.facebook.com/ajay.goyal.5059601">Ajay Goyal Basu</a> </h6>
                    </div><!--box-content end-->
                </div><!--box end-->
            </center>
            </div><!--col-md-4 end-->
        </div><!--row end-->
        <br>
        <div class="row"><!--row start-->
            <div class="col-md-1"><!--col-md-1 start-->
            </div><!--col-md-1 end-->
            <div class="col-md-6"><!--col-md-6 start-->
                <br><br><br>
                <h4 >Operator- Shubham Yatharth Goyal</h4>
                <br>
                <p style="text-align: justify;"> Mr. Shubham Yatharth Goyal is the young blood of the family carrying old values with new vision to serve people with physical and online presence. He is a degree holder in B.pharma and has an experience of about 6 years at JMG with additional exposure to medicine manufacturing and laboratory skills aqcuired during internship at huge pharamaceutical firms like Hind Pharma and others. He is a visionary and an enthusiast who strives to carry forward the family name and business.</p>
            </div><!--col-md-6 end-->
            <div class="col-md-1"><!--col-md-1 start-->
            </div><!--col-md-1 end-->
            <div class="col-md-4 col-sm-3"><!--col-md-4 start-->
                <center>
                <div class="box"><!--box start-->
                        <img src="frontend/img/shubham.jpg"  class="img-fluid i" alt="222">
                    <div class="box-content text-light"><!--box content start-->
                        <h4>Shubham Yatharth Goyal </h4>
                        <br>
                        <h6 style="text-align: justify;font-size: 12px">Mr. Shubham is an emerging entreprenuer with keen interest in his chosen field but apart from being a business man, he is also a poet and has a huge fanbase on<a href="https://www.yourquote.in/shubham-yatharth-yq-qlj6/quotes" class="text-light"> YourQuote </a>. He has written 2.5k+ quotes and shayaris. His quotes are much appreciated for the elegance, the poise, the sophistication they reflect. For those of you who are into motivational quotes & hindi shayaris, here is a little treat for you. Go check out his page - <a href="https://www.yourquote.in/shubham-yatharth-yq-qlj6/quotes"> Shubham Yatharth YQ</a>.</h6>
                        <br><br>
                    </div><!--box content end-->
                </div> <!--box end-->
                </center>
            </div><!--col-md-4 end-->
        </div><!--row end-->
        <br><br>
    </div><!--container-fluid end-->

@endsection