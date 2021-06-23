@extends('admin.master')

@section('content')

<div class="container">
    <div class="content-wrapper">
        <h4>Product Id:{{$data->id}}</h4>
        <h4>Category Name:{{$data->category_id}}</h4>
        <h4>Subcategory Name:{{$data->subcategory_id}}</h4>
        <h4>Product Name:{{$data->product_name}}</h4>
        <h4>Product Size:{{$data->product_size}}</h4>
        <h4>Product Description:{!!$data->product_description!!}</h4>
        <h4>Product Image:<img src="{{url('/upload/'.$data->image)}}" class="img-fluid">
        </h4>
        <h4>Quantity:{{$data->product_quantity}}</h4>
        <h4>Price:{{$data->product_price}}</h4>
        <h4>Featured Products:{{$data->featured_product}}</h4>
        <h4>Popular Products:{{$data->popular_product}}</h4>
        <h4>Latest Products{{$data->latest_product}}</h4>

        <h4>Status:{{$data->status}}</h4>
    </div>
</div>
@endsection