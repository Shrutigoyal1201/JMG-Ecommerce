@extends('admin.master')

@section('content')
    
<div class="content-wrapper col-md-10">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Coupon</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- code start-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Coupon Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('coupon/update')}}">

                @csrf
                
                <div class="card-body">
                    
                    <input type="hidden" name="id" value="{{$data->id}}">

                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" name="coupon_code" placeholder="Enter coupon code" value="{{$data->coupon_code}}">
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter amount" value="{{$data->amount}}">
                    </div>

                    <div class="form-group">
                        <label>Amount Type</label>
                        <select name="amount_type" id="" class="form-control">
                            <option>--Select Amount Type--</option>
                            <option value="Percentage" @if($data->amount_type=='Percentage') selected @endif>Percentage</option>
                            <option value="Fixed" @if($data->amount_type=='Fixed') selected @endif>Fixed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="date" class="form-control" name="expiry_date" placeholder="Enter Expiry Date" value="{{$data->expiry_date}}">
                    </div>
        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

              @if(session('message'))

              <p class="alert alert-info">
                {{session('message')}}
              </p>

              @endif
              
            </div>
        </div>
    </div>
</div>
</section>
            <!-- /.card -->

    <!-- code end-->
    <!-- /.content-wrapper -->
</div>


@endsection