@extends('front.master')

@section('content')

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110" style="background: url('{{ url('https://image.freepik.com/free-photo/cyber-monday-retail-sales_23-2148688493.jpg') }}'); background-repeat:no-repeat; background-position: center bottom; background-size: cover;">
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-left">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<div class="text-center mb-100">
	<img src="https://i.gifer.com/7efs.gif" class="col-md-3">
	<h2 class="text text-lighten text-uppercase animated mb-25 text-center" data-animation-in="zoomIn" data-delay-in="1">Order Placed Succesfully</i></h2>
</div>

@endsection