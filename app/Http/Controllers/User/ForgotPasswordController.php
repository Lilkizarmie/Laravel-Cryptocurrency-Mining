<?php

namespace App\Http\Controllers\User;

use App\GeneralSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\Settings;
use DB;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    public function __construct()
    {
        $basic= Settings::first();

    }

    public function showLinkRequestForm()
    {
        $data['title'] = "Send Link password";
        return view('auth.passwords.email',$data);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $us = User::whereEmail($request->email)->count();
        if ($us == 0)
        {
            return back()->with('warning', 'We can\'t find a user with that e-mail address.');
        }else{
            $user = User::whereEmail($request->email)->first();
            $to =$user->email;
            $name = $user->name;
            $subject = 'Password Reset';
            $code = str_random(30);
            $link = url('/user-password/').'/reset/'.$code;
            $message = "Use This Link to Reset Password: <br>";
            $message .= "<a href='.{{$link}}.'>".$link."</a>";
            DB::table('password_resets')->insert(
                ['email' => $to, 'token' => $code,  'created_at' => date("Y-m-d h:i:s")]
            );
            send_email($to,  $name, $subject,$message);
            return back()->with('success', 'Password Reset Link Send Your E-mail');
        }
    }
}
