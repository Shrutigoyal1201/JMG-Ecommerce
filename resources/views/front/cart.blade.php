@extends('front.master')

@section('title','Cart Summary')

@section('content')
<style type="text/css">
    th
    {
        background-color:#00868B!important;
    }
    .c
    {
        background-image: linear-gradient(to right,#69d6d6,#1e3131)!important;
    }

    @media(max-width: 700px)
    {
        .col-8
        {
            width: 100%;
        }
        .col-4
        {
            width: 100%;
        }
    }
</style>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110" style="background: url('{{ url('https://image.freepik.com/free-photo/cyber-monday-retail-sales_23-2148688493.jpg') }}'); background-repeat:no-repeat; background-position: center bottom; background-size: cover;">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-left">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<section class="whish-list-section theme1 pt-80 pb-80">
    <div class="container">
        <div class="row">
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

                <h3 class="title mb-30 pb-25 text-capitalize">Your cart items</h3>
                    <div class="table-responsive col-8">
                        <table class="table">
                            <thead class="thead-light">
                                <tr class="text-light">
                                    <th class="text-center" scope="col">Product Image</th>
                                    <th class="text-center" scope="col">Product Name</th>
                                    <th class="text-center" scope="col">Qty</th>
                                    <th class="text-center" scope="col">Price</th>
                                    <th class="text-center" scope="col">action</th>

                                </tr>
                            </thead>
                            <tbody>

                            @if(count($data) >= 1)

                                 @foreach ($data as $data)


                                    <tr>

                                        <td class="text-center">
                                            <a href="{{url('productdetail/'.$data->product_id)}}"><img src="{{url('/upload/'.$data->product_image)}}" alt="img" class="d-block img-fluid" style="height: 150px;"></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{url('productdetail/'.$data->product_id)}}"><span class="whish-title">{{$data->product_name}}</span></a>
                                        </td>

                                        <td class="text-center">
                                            <div class="product-count style">
                                                <div class="count d-flex justify-content-center">
                                                    <input type="number" min="1" max="10" step="1" value="{{$data->product_quantity}}">
                                                    <div class="button-group" readonly>

                                                        <a href="{{url('cart/updatequantity/'.$data->id.'/1')}}" class="count-btn increment">
                                                            <i class="fas fa-chevron-up"></i>
                                                        </a>

                                                        <a href="{{url('cart/updatequantity/'.$data->id.'/-1')}}" class="count-btn decrement">
                                                            <i class="fas fa-chevron-down"></i>
                                                        </a>

                                            </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-list-price">
                                                Rs.{{$data->product_price*$data->product_quantity}}
                                            </span></td>

                                        <td class="text-center">
                                            <a href="{{url('cart/delete/'.$data->id)}}"> <span class="trash"><i class="fas fa-trash-alt"></i> </span></a>
                                        </td>

                                    </tr>


                                 @endforeach
                            @else
                                <tr class="mt-5" style="border-bottom: transparent;">
                                    <td></td>
                                    <td><center><img src="http://www.cheemastudio.com/no-product-found.jpg" class="col-md-5 mt-30 img-fluid"></center></td>
                                     <td></td>
                                </tr>
                            @endif


                            </tbody>
                        </table>
                    </div>

                    <div class="col-4 mb-30">

                        <h3 class="text-center">Order Summary</h3><br>
                        <ul class="list-group cart-summary rounded-0">
                           <?php  $total_amount=0; ?>
                           @foreach ($d as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <ul class="items">

                                    <li>{{$d->product_name}}</li>
                                    <li>Quantity</li>
                                </ul>
                                <ul class="amount text-center">
                                    <li>Rs.{{$d->product_price*$d->product_quantity}}</li>
                                    <li>{{$d->product_quantity}}</li>
                                </ul>

                            </li>
                            <?php $total_amount=$total_amount+($d->product_price*$d->product_quantity); ?>

                             @endforeach


                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="items">
                                    <li>Total (tax excl.)</li>
                                </ul>
                                <ul class="amount">
                                    <li><?php echo $total_amount; ?></li>
                                </ul>
                            </li>
                            <li class="list-group-item text-center">
                                @if(Auth::check())

                                    <?php if($total_amount==0) { ?>
                                        <a href="#" class="btn theme-btn--dark1 btn--md checkout" onclick='return empty_cart();'>Checkout</a>
                                    <?php } else{ ?>
                                         <a href="{{url('checkout')}}" class="btn theme-btn--dark1 btn--md checkout">Checkout</a>
                                    <?php } ?>

                                @else

                                <a href="{{url('front/login')}}" class="btn theme-btn--dark1 btn--md">Checkout</a>

                                @endif
                            </li>
                        </ul>

                    </div>
            
        </div>
    </div>
</section>
<!-- product tab end -->

@endsection
