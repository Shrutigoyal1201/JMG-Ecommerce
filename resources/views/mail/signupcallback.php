http://127.0.0.1:8000/verify?code={{$email_data['verify_code']}}


public function regsave(Request $a)
	{
		$this->validate($a,[
		"name"=>"required",
        "email"=>"required|max:30|min:8|email|unique:users",
        "password"=>"required|min:8|max:15|",
   		]);


		$data=new User;

		$data->name=$a->name;
		$data->email=$a->email;
		$data->password=Hash::make($a->password);
		$data->verification_code = sha1(time());

        $data->save();

        if($data!=null)
        {
        	MailController::sendSignupEmail($data->name, $data->email, $data->verification_code);
        	return redirect()->back()->with('message', 'Your account has been created. Please check email for verification link.');
        
        }
        
        return redirect()->back()->with('error', 'Something went wrong!');
        
    }

     public function verifyUser(Request $request)
     {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $user = User::where(['verification_code' => $verification_code])->first();
        
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with('message', 'Your account is verified. Please login!');
        }

        return redirect()->route('login')->with('message', 'Invalid verification code!');
    }



    // Route::post('front/regsave','UserController@regsave');
// Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');
