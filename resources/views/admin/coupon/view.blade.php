@extends('admin.master');

@section('content')
    
<div class="container">
    <div class="content-wrapper col-md-10">
        <br><br>
        <h4>Coupon Code:{{$data->coupon_code}}</h4><br>
        <h4>Amount:{{$data->amount}}</h4><br>
        <h4>Amount Type:{{$data->amount_type}}</h4><br>
        <h4>Expiry Date:{{$data->expiry_date}}</h4><br>
        <h4>Status:<input type="button" class="btn btn-info" value="{{$data->status}}" ></h4>
    </div>
</div>

@endsection