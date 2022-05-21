<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use DB;
use App\Models\PasswordReset;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/login';

    public function showResetForm(Request $request, $token)
    {
        $data['title'] = "Change Password";
         $tk =PasswordReset::where('token',$token)->first();
         if(is_null($tk))
         {
            $notification =  array('message' => 'Token Not Found!!','alert-type' => 'warning');
            return redirect()->route('user.password.request')->with($notification);
         }else{
            $email = $tk->email;
            return view('auth.passwords.reset',$data)->with(
                ['token' => $token, 'email' => $email]
            );
         }
    }


    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $tk =PasswordReset::where('token',$request->token)->first();
        $user = User::whereEmail($tk->email)->first();
        if(!$user)
        {
            return back()->with('warning', 'Email don\'t match!!');
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success', 'Successfully Password Reset.');
    }
}
