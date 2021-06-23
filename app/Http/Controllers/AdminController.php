<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderproduct;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
        $user=User::all();

        return view('admin.dashboard',compact('user'));
    }

    public function orders()
    {
        $data=Order::orderBy('id','desc')->get();
        return view('admin.order.display',compact('data'));
    }
    public function orderdetail($id)
    {
        $data=Order::find($id);
        $productdata=Orderproduct::where('order_id','=',$id)->get();
        return view('admin.order.view',compact('data','productdata'));
    }
    public function orderinvoice($id)
    {
        $data=Order::find($id);
        $productdata=Orderproduct::where('order_id','=',$id)->get();
        return view('admin.order.invoice',compact('data','productdata'));
    }
}

