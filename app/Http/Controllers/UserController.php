<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use Auth;
use App\Cart;
use Session;
use DB;
use App\Banner;


class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->redirectTo = url()->previous();
    // }

	public function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['is_verified' => 1]);
    }
	public function login(Request $request)
    {
        if($request->session()->has('FRONT_LOGIN'))
        {
            return redirect('/');
        }
        else
        {
            Session::forget('FRONT_LOGIN',true);
            return view('front.login');
        }
    }

	public function loginsave(Request $l)
	{
		// print_r($l->all());

		$session_id=Session::getId();
		$data=$l->all();

        $check_role=User::where('email','=',$data['email'])->first();
        
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'role'=>$data['role']]))
		{

            if($check_role->role==0)
            {
                return redirect('dashboard');
            }

            elseif($check_role->role==1)
            {
                $l->session()->put('FRONT_LOGIN',true);

                // Session::put('FRONT_LOGIN',$data['email']);

                Cart::where('session_id',$session_id)->update(['useremail'=>$data['email']]);

                  // if(!session()->has('url.intended'))
                  //   {
                  //        session(['url.intended' => url()->previous()]);
                  //   }
                return redirect('cart')->with('message','login successful!');
            }
            else
            {
                return redirect()->back()->with('message','login failed!');
            }
		}
		else
		{
			return redirect()->back()->with('error','Invalid Username or Password');
		}
	}

	public function logout()
	{
        Session::forget('FRONT_LOGIN');
		Auth::logout();
		return redirect('/');
	}

	public function register()
	{
		$banner=Banner::where('title','jmg')->get();

		return view('front.register',compact('banner'));
	}
	public function registerusers(Request $request)
    {
         return Validator::make($request,
          [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
        ]);

        if($request-> isMethod('post')){

            $data = $request->all();  //echo "<pre>"; print_r($data); die;

            // check user already exist

            $userCount=User::where('email',$data['email'])->count();

            if($userCount>0)
            {
                // $message="Email already exists!";
                // session::flash('error_message',$message);
                return redirect()->back()->with('error','Email alredy exists');
            }

            else
            {
                $user = new User;

                $user -> name = $data['name'];
                $user -> email = $data['email'];
                $user -> password = bcrypt($data['password']);
                $user -> status = 0;
                $user-> role=1;

                $user->save();

                // Email Verification
                $email = $data['email'];

                $messageData=[
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'code' => base64_encode($data['email'])
                	];
                	
                Mail::send('mail.signup-email',$messageData,function($message) use($email){
                    $message->to($email)->subject('Confirm your Email Account ');
                } );

                // return user with success message
                return redirect()->back()->with('message','Mail has been sent to your registered Email! Kindly verify your account.') ;


                return redirect('cart');
            }
        }
    }
    public function confirmAccount($email)
    {
        $email = base64_decode($email);
        
        // Check Email in database
        $userCount = User::where('email',$email)->count();
        
        if($userCount>0)
        {
            
            // User Email already activated
            $userDetails = User::where('email',$email)->first();
            
            if($userDetails->status == 1)
            {
                // $message= "Your Email is already activated. please login.";
                return redirect('front/login')->with('error','Your Account is already activated. please login.');
            }
            else
            {
                User::where('email',$email)->update(['status' =>1]);
                return redirect('front/login')->with('message','Account Activated Successfully. kindly login!');
            }
        }
        else
        {
            abort(404);
        }
    }
	
}
