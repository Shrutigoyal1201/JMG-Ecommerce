<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\PaytmController;
use App\Banner;
use App\Category;
use App\Product;
use App\Cart;
use Session;
use DB;
use Auth;
use Hash;
use App\User;
use App\Contact;
use App\Order;
use App\Orderproduct;
use Mail;
use View;
use App\Wishlist;
// reference the Dompdf namespace
use Dompdf\Dompdf;


class FrontController extends Controller
{
   
   // **************************** BULK SMS *******************************// 


function sms($mob,$msg)
{
  
$username = urlencode("u4017"); 
$msg_token = urlencode("vNYI8c"); 
$sender_id = urlencode("HMLBTM"); // optional (compulsory in transactional sms) 
$message = urlencode("$msg"); 
$mobile = urlencode("$mob"); 

$url = " https://www.fast2sms.com/dev/wallet?authorization=NMVWgP7US6l5zIewbxCv3yYO0FuinfsZ4QHAdkBGc19marqh8jmh8L0rk1IPxEolCyeY2nvTFQzUWd9K".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$msg."&mobile=".$mobile.""; 


// $url = " https://www.fast2sms.com/dev/bulkV2?authorization=NMVWgP7US6l5zIewbxCv3yYO0FuinfsZ4QHAdkBGc19marqh8jmh8L0rk1IPxEolCyeY2nvTFQzUWd9K&sender_id=FSTSMS&message=".urlencode('YOUR_MESSAGE_ID')."&variables_values=".urlencode('12345|asdaswdx')."&route=dlt&numbers=".urlencode('9999999999,8888888888,7777777777');

//API URL
//$url="http://sms.globehost.com/api/sendhttp.php";
$postData=json_enco(array(
$username = urlencode("u4017"), 
$msg_token = urlencode("vNYI8c"), 
$sender_id = urlencode("HMLBTM"), // optional (compulsory in transactional sms) 
$message = urlencode("$msg"),
$mobile = urlencode("$mob")));
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));



//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
return 1;
}
// *********************************************************************//

    public function __construct()
    {
        $allcategory=Category::all();

        $wish=Product::where('wishlist','=','1')->get();

        if(Auth::check())
        {
            $allcart=Cart::where('useremail',$useremail)->get();
        }
        else
        {
            $session_id=Session::getId();
            
            $allcart=Cart::where(['session_id'=>$session_id])->get();
        }
        
        View::share('allcategory','wish','cart');
    }
   

    public function index()
    {
    	$banner=Banner::whereBetween('id',['1','5'])->get();
    	$cat=Category::limit('5')->get();
    	$prod=Product::orderby('created_at','DESC')->get();
        $categories=Category::whereBetween('id',['7','11'])->get();
        $session_id=Session::getId();

        $data=Cart::where(['session_id'=>$session_id])->get();

        return view('front.index',compact('banner','cat','prod','data','categories'));

    }

    public function search()
    {
        $search_text=$_GET['search'];
        $searchresult=Product::where('product_name','LIKE','%'.$search_text.'%')->paginate(8);

        return view('front.search',compact('searchresult'));
    }
    public function category($category_id)
    {

        $banner=Banner::whereBetween('id',['1','5'])->get();
        $cat=Category::limit('5')->get();
        $prod=Product::where(['category_id'=>$category_id])->get();
        $category=Category::whereBetween('id',['7','11'])->get();
        $session_id=Session::getId();

        $data=Cart::where(['session_id'=>$session_id])->get();

        return view('front.index',compact('banner','cat','prod','data','category'));
    }

    public function getwishlist()
    {
        $useremail=Auth::User()->email;

        $wish=Wishlist::join('products','wishlists.pid','=','products.id')->where('wishlists.u_email','=',$useremail)->paginate(8);

        return view('front.wishlist',compact('wish'));
    }
   
    public function postwishlist(Request $w)
    {
        $found = Wishlist::where('u_email', $w->user_email)->where('pid', $w->product_id)->count();

        if($found==0)
        {
            $wish=new Wishlist;

            $wish->u_email=$w->user_email;
            $wish->pid=$w->product_id;

            $wish->save();

            return redirect()->back()->with('message','Product wishlisted');
        }
        else
        {
            return redirect()->back()->with('error','This Product is already present in your wishlist!');
        }

        // $p=Product::find($w->product_id);

        // if($p->wishlist=='0')
        // {
        //     $p->wishlist='1';
            
        //     $p->save();

        //     return redirect()->back()->with('message','Product wishlisted');
        // }

        // else
        // {
        //     return redirect()->back()->with('error','This Product is already present in your wishlist!');
           
        // }
        
    }

    public function wishlistdeleteitem($id)
    {
        $wish=Wishlist::where('pid','=',$id);
       
        if($wish)
            {
                $wish->delete();

                return redirect()->back()->with('message','Product Removed from wishlist');
            }
        else
        {
             return redirect()->back()->with('error','Product does not exist in the wishlist');  
        }
       // $p=Product::find($id);

       //  if($p->wishlist=='1')
       //  {
       //      $p->wishlist='0';
            
       //      $p->save();

       //      return redirect()->back()->with('message','Product Removed from wishlist');
       //  }

       //  else
       //  {
       //      return redirect()->back()->with('error','Product does not exist in the wishlist');       
       //  }
    }

    public function shop()
    {
        $allcat=Category::whereBetween('id',['7','11'])->get();
        $allproducts=Product::paginate('12');
        $allp2=$allproducts;
        return view('front.shop',compact('allproducts','allp2','allcat'));
    }
    public function shopbycategory($id)
    {
        $allcat=Category::whereBetween('id',['7','11'])->get();
        $allproducts=Product::where('category_id','=',$id)->paginate('12');
        $allp2=$allproducts;
        return view('front.shop',compact('allproducts','allp2','allcat'));
    }
    public function shopsale()
    {
        $allcat=Category::whereBetween('id',['7','11'])->get();
        $allproducts=Product::where('product_price','<=','500')->paginate('12');
        $allp2=$allproducts;
        return view('front.shop',compact('allproducts','allp2','allcat'));
    }
    public function shopnewproducts()
    {
        $allcat=Category::whereBetween('id',['7','11'])->get();
        $allproducts=Product::orderby('created_at','desc')->limit('8')->paginate('8');
        $allp2=$allproducts;
        return view('front.shop',compact('allproducts','allp2','allcat'));
    }
    
    public function productdetail($id)
    {
        $session_id=Session::getId();

        $data=Cart::where(['session_id'=>$session_id])->get();

    	$prod=Product::find($id);

        $category_id=$prod->category_id;

        $new=Product::orderby('created_at','DESC')->limit('10')->get();

        // print_r($new);
        // die;

        $related=Product::where('category_id','=',$category_id)->where('id','!=',$id)->orderby('id','ASC')->limit('5')->get();

    	return view('front.productdetail',compact('prod','data','new','related'));
    }

    public function checkcartproduct($a)
    {
        // print_r($a->all());
        // die;
       
        $cart=Cart::where('useremail','=',$a->useremail)->where('product_id','=',$a->product_id)->get();

        print_r($cart->all());
        die;
        $cart->product_quantity+=$a->product_quantity;

        $cart->save();

    }
    public function addtocart(Request $a)
    {
    	// print_r($a->all());

        $session_id=Session::getId();

        $cart=new Cart;

        if(Auth::check())
        {
            $useremail=Auth::user()->email;

            $cart->useremail=$useremail;

            $data=Cart::where('useremail',$useremail)->where('product_id','=',$a->product_id)->count();
            
            if($data==0)
            {
                $cart->product_id=$a->product_id;
                $cart->product_name=$a->product_name;
                $cart->product_price=$a->product_price;
                $cart->product_image=$a->product_image;
                $cart->product_quantity=$a->product_quantity;
                $cart->session_id=$session_id;

                $cart->save();
        
            }
            else
            {
                // $this->checkcartproduct($a);

                return redirect()->back()->with('carterror','This Product is already present in your cart!');
       
            }
        }

        else
        {
            $session_id=Session::getId();
            
            $data=Cart::where(['session_id'=>$session_id])->where('product_id','=',$a->product_id);
            
            // print_r($data->all());
            // die;

            if($data)
            {
                $cart->product_quantity=$data->product_quantity+$a->product_quantity;
               
                $cart->save();
            }
            else
            {
                $cart->product_id=$a->product_id;
                $cart->product_name=$a->product_name;
                $cart->product_price=$a->product_price;
                $cart->product_image=$a->product_image;
                $cart->product_quantity=$a->product_quantity;
                $cart->session_id=$session_id;

                $cart->save();

                
            }
        }

        return redirect()->back()->with('cartmessage','Product Added to your cart!');
        

      }

    public function cart()
    {

        if(Auth::check())
        {
            $banner=Banner::where('title','About')->get();
            $useremail=Auth::User()->email;
            $data=Cart::where('useremail',$useremail)->get();
            $d=$data;
            return view('front.cart',compact('data','d','banner'));
        }
        else
        {
            $banner=Banner::where('title','About')->get();
            $session_id=Session::getId();
            // print_r($session_id);
            $data=Cart::where(['session_id'=>$session_id])->get();
            $d=$data;
            return view('front.cart',compact('data','d','banner'));
        }
     
    }

    public function delcartitem($id)
    {
        $data=Cart::find($id);

        $data->delete();
        if($data)
        {
            return redirect('cart')->with('message','item removed from the cart');
        }
    }


    public function updatequantity($id=null,$product_quantity=null)
    {
        // print_r($id);
        // print_r($product_quantity);

        DB::table('carts')->where('id',$id)->increment('product_quantity',$product_quantity);

        return redirect('cart')->with('message','Product quantity has been updated');
    }

    public function checkout()
    {
        $useremail=Auth::User()->email;
            
        $cart=Cart::where('useremail',$useremail)->get();
        
        if($cart)
        {
            $useremail=Auth::User()->email;
            $d=Cart::where('useremail',$useremail)->get();
            return view('front.checkout',compact('d'));
        }    
        else
        {
           return redirect()->back()->with('error','Your cart is empty! Add items to checkout');
             
        }
    }

    public function place_order(Request $a)
    {
        // print_r($a->all());

        $data=new Order;

        $data->useremail=$a->email;
        $data->name=$a->name;
        $data->address=$a->address;
        $data->city=$a->city;
        $data->state=$a->state;
        $data->country=$a->country;
        $data->pincode=$a->pincode;
        $data->phone=$a->phone;
        $data->payment_method=$a->payment_method;
        $data->grand_total=$a->grand_total;
        $data->order_uid=Str::random(10);
        $data->save();

        $order_id=DB::getPdo()->lastinsertID();
        
        // print_r($order_id);
        // die;

        $cart_product=DB::table('carts')->where(['useremail'=>$a->email])->get();

        // print_r($cart_product);

        foreach ($cart_product as $c)
        {
            $cart=new Orderproduct;

            $cart->useremail=$a->email;
            $cart->order_id=$order_id;
            $cart->product_id=$c->product_id;
            $cart->product_name=$c->product_name;
            $cart->product_price=$c->product_price;
            $cart->product_size=$c->product_size;
            $cart->product_quantity=$c->product_quantity;
            $cart->product_image=$c->product_image;

            $cart->save();

        }

    if($data['payment_method']=='cod')
        {
            $email = $data['useremail'];
            $messageData=[
                'email' => $data['useremail'],
                'name' => $data['name']

            ];
            Mail::send('front.order_email',$messageData,function($message) use($email){
                $message->to($email)->subject(' Order placed Successfully ');
            } );
            return redirect('thanks')->with('message','Order details submitted sucessfully');
         
        }
    
    if($data['payment_method']=='googlepay')
        {
            return redirect('thanks/'.$order_id)->with('message','Order details submitted sucessfully');
        }
    if($data['payment_method']=='upi')
        {
            return redirect('thanks/'.$order_id)->with('message','Order details submitted sucessfully');
        }
    if($data['payment_method']=='paytm')
        {
            //$data->order_status = 'pending';
            $amount=$data['grand_total'];
            $order_id=$data['order_uid'];

            $data_for_request = app('App\Http\Controllers\PaytmController')->handlePaytmRequest( $order_id, $amount, );
            
            $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
            $paramList = $data_for_request['paramList'];
            $checkSum = $data_for_request['checkSum'];
    
            return view( 'front.paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
        } 
    }

    public function orderconfirm()
    {
        $useremail=Auth::user()->email;

        DB::table('carts')->where('useremail',$useremail)->delete();

        return view('front.thanks');
    }


    public function account()
    {
        $useremail=Auth::user()->email;

        $data=Order::where('useremail',$useremail)->limit('1')->get();

        $allorders=Order::where('useremail',$useremail)->orderby('id','desc')->paginate('2');
        
        return view('front.account',compact('data','allorders'));
    }
    
    public function changepassword(Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect('account')->with('message','Password changed successfully.');
    }

    public function orderdetails($order_id)
    {
        $useremail=Auth::user()->email;

        $data=Order::find($order_id);
        $productdata=Orderproduct::where('order_id','=',$order_id)->get();
                
        return view('front.order',compact('data','productdata'));
    }
   
    public function orderinvoice($order_id)
    {
        $data=Order::find($order_id);
        $productdata=Orderproduct::where('order_id','=',$order_id)->get();
        return view('front.invoice',compact('data','productdata'));
    }
    public function about()
    {
        $banner=Banner::where('title','About')->get();
        return view('front.about',compact('banner'));
    }


    public function contact()
    {
        $banner=Banner::where('title','Contact')->get();
        return view('front.contact',compact('banner'));
    }

    public function savecontact(Request $c)
    {
        $contact= new Contact;

        $contact->name=$c->name;
        $contact->email=$c->email;
        $contact->phone=$c->phone;
        $contact->des=$c->des;

        $contact->save();

        if($contact)
        {
            return redirect('contact')->with('message','Your contact information has been added');
        }
    }





}
