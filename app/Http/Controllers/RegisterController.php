<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\User;
use App\Models\Referral;
use App\Models\Settings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;

class RegisterController extends Controller
{

    protected $redirectTo = '/user/dashboard';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function register()
    {
		$data['title']='Register';
		if(Auth::user()){
			return redirect()->intended('user/dashboard');
		}else{
	        return view('/auth/register', $data);
		}
    }    
    public function referral($id)
    {
		$data['title']='Affiliate system';
		$data['ref']=$id;
		if(Auth::user()){
			return redirect()->intended('user/dashboard');
		}else{
	        return view('/auth/referral', $data);
		}
    }


    public function submitregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $data['title']='Register';
            $data['errors']=$validator->errors();
            return view('/auth/register', $data);
        }

        $basic = Settings::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }
        $verification_code = strtoupper(Str::random(6));
        $sms_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $acct='2'.rand(1, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email_verify = $email_verify;
        $user->verification_code = $verification_code;
        $user->sms_code = $sms_code;
        $user->email_time = $email_time;
        $user->phone_verify = $phone_verify;
        $user->phone_time = $phone_time;
        $user->balance = $basic->balance_reg;
        $user->ip_address = user_ip();
        $user->pin = '0000';
        $user->password = Hash::make($request->password);
        $user->save();


        if ($basic->email_verification == 1) {
            $text = "Your Email Verification Code Is: <b>$user->verification_code</b>";
            send_email($user->email, $user->name, 'Email verification', $text);
        }
        if ($basic->sms_verification == 1) {
            $message = "Your phone verification code is: $user->sms_code";
            send_sms($user->phone, strip_tags($message));
        }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect()->intended('user/dashboard');
        }
    }    
    
    public function submitreferral(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $data['title']='Register';
            $data['errors']=$validator->errors();
            return view('/auth/register', $data);
        }

        $basic = Settings::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }
        $verification_code = strtoupper(Str::random(6));
        $sms_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email_verify = $email_verify;
        $user->verification_code = $verification_code;
        $user->sms_code = $sms_code;
        $user->email_time = $email_time;
        $user->phone_verify = $phone_verify;
        $user->phone_time = $phone_time;
        $user->balance = $basic->balance_reg;
        $user->ip_address = user_ip();
        $user->pin = '0000';
        $user->password = Hash::make($request->password);
        $user->save();
        $main = User::whereUsername($request->ref)->first();
        $ref = User::whereUsername($request->username)->first();
        $sav['user_id']=$ref->id;
        $sav['ref_id']=$main->id;
        Referral::create($sav);


        if ($basic->email_verification == 1) {
            $text = "Your Email Verification Code Is: <b>$user->verification_code</b>";
            send_email($user->email, $user->name, 'Email verification', $text);
        }
        if ($basic->sms_verification == 1) {
            $message = "Your phone verification code is: $user->sms_code";
            send_sms($user->phone, strip_tags($message));
        }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect()->intended('user/dashboard');
        }
    }
}
