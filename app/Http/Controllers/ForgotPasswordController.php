<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use Mail; 
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
  public function getEmail()
  {
     return view('front.forgotpassword');
  }

 public function postEmail(Request $request)
  {
    // print_r($request->all());
    // die;

    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = str::random(20);

      DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('front.resetemail', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
  }

}
