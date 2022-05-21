<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Plans;
use App\Models\Gateway;
use App\Models\Deposits;
use App\Models\Withdraw;
use App\Models\Withdrawm;
use App\Models\Profits;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Referral;
use App\Models\Earning;
use App\Models\Transfer;
use Carbon\Carbon;
use Session;
use Image;




class UserController extends Controller
{

        
    public function __construct()
    {		
        $this->middleware('auth');
    }

        
    public function dashboard()
    {
        $data['title']='Dashboard';
        $data['val']=Plans::whereStatus(1)->orderBy('min_deposit', 'DESC')->limit(1)->first();
        $data['profit']=Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('user.index', $data);
    }
          
    public function referral()
    {
        $data['title']='Referral';
        $data['referral']=Referral::whereRef_id(Auth::user()->id)->get();
        $data['earning']=Earning::whereReferral(Auth::user()->id)->get();
        return view('user.referral', $data);
    }     
    
    public function ticket()
    {
        $data['title']='Tickets';
        $data['ticket']=Ticket::whereUser_id(Auth::user()->id)->get();
        return view('user.ticket', $data);
    } 
        
    public function plans()
    {
        $data['title']='Investment';
        $data['plan']=Plans::whereStatus(1)->orderBy('min_deposit', 'DESC')->get();
        $data['profit']=Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        $data['datetime']=Carbon::now();
        return view('user.plans', $data);
    } 
        
    public function fund()
    {
        $data['title']='Fund account';
        $data['gateways']=Gateway::whereStatus(1)->orderBy('id', 'DESC')->get();
        $data['deposits']=Deposits::whereUser_id(Auth::user()->id)->latest()->get();
        return view('user.fund', $data);
    }
        
    public function withdraw()
    {
        $data['title']='Withdraw';
        $data['withdraw']=Withdraw::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.withdraw', $data);
    }    
    
    public function share()
    {
        $data['title']='Share btc';
        $data['share']=Transfer::where('sender_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.share', $data);
    }
        
    public function changePassword()
    {
        $data['title'] = "Security";
        $g=new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret=$g->generateSecret();
        $set=Settings::first();
        $user = User::find(Auth::user()->id);
        $site=$set->site_name;
        $data['secret']=$secret;
        $data['image']=\Sonata\GoogleAuthenticator\GoogleQrUrl::generate($user->email, $secret, $site);
        return view('user.password', $data);
    } 

    public function changePin()
    {
        $data['title'] = "Change Pin";
        return view('user.pin', $data);
    } 
        
    public function profile()
    {
        $data['title'] = "Profile";
        return view('user.profile', $data);
    }    
    
    public function Replyticket($id)
    {
        $data['ticket']=$ticket=Ticket::find($id);
        $data['title']='#'.$ticket->ticket_id;
        $data['reply']=Reply::whereTicket_id($ticket->ticket_id)->get();
        return view('user.reply-ticket', $data);
    }    

    public function authCheck()
    {
        if (Auth()->user()->status == '0' && Auth()->user()->email_verify == '1' && Auth()->user()->sms_verify == '1') {
            return redirect()->route('user.dashboard');
        } else {
            $data['title'] = "Authorization";
            return view('user.authorization', $data);
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->phone_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->phone_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->phone_time = Carbon::now();
            $user->sms_code = $code;
            $user->save();
            send_sms($user->phone, 'Your Verification Code is ' . $code);

            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function smsVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->sms_code == $request->sms_code) {
            $user->phone_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }

    public function sendEmailVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->email_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->email_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->email_time = Carbon::now();
            $user->verification_code = $code;
            $user->save();
            send_email($user->email, $user->username, 'Verificatin Code', 'Your Verification Code is ' . $code);
            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function postEmailVerify(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if ($user->verification_code == $request->email_code) {
            $user->email_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }
    
    
    public function Destroyticket($id)
    {
        $data = Ticket::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    } 

    public function submitticket(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $sav['user_id']=Auth::user()->id;
        $sav['subject']=$request->subject;
        $sav['priority']=$request->category;
        $sav['message']=$request->details;
        $sav['ticket_id']=round(microtime(true));
        $sav['status']=0;
        Ticket::create($sav);
        return back()->with('success', 'Ticket Submitted Successfully.');
    }     
    
    public function submitreply(Request $request)
    {
        $sav['reply']=$request->details;
        $sav['ticket_id']=$request->id;
        $sav['status']=1;
        Reply::create($sav);
        $data=Ticket::whereTicket_id($request->id)->first();
        $data->status=0;
        $data->save();
        return back()->with('success', 'Message sent!.');
    }  
        
    public function withdrawsubmit(Request $request)
    {
        $set=$data['set']=Settings::first();
        $user=$data['user']=User::find(Auth::user()->id);
        $amount=$request->amount-($request->amount*$set->withdraw_charge/100);
            if($request->type==1){
                if($user->profit>$amount || $user->profit==$amount){
                    $sav['user_id']=Auth::user()->id;
                    $sav['amount']=$amount;
                    $sav['status']=0;
                    $sav['details']=$request->details;
                    $sav['type']=$request->type;
                    Withdraw::create($sav);
                    $user->profit=$user->profit-$amount;
                    $user->save();
                    if($set->email_notify==1){
                        send_email(
                            $user->email, 
                            $user->username, 
                            'Withdraw Request currently being Processed', 
                            'We are currently reviewing your withdrawal request of '.$request->amount.'BTC.<br>Thanks for working with us.'
                        );
                    }
                    return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
                }else{
                    return back()->with('alert', 'Insufficent balance.');
                }
            }elseif($request->type==2){
                if($user->balance>$amount || $user->balance==$amount){
                    $sav['user_id']=Auth::user()->id;
                    $sav['amount']=$amount;
                    $sav['status']=0;
                    $sav['details']=$request->details;
                    $sav['type']=$request->type;
                    Withdraw::create($sav);
                    $user->balance=$user->balance-$amount;
                    $user->save();
                    if($set->email_notify==1){
                        send_email(
                            $user->email, 
                            $user->username, 
                            'Withdraw Request currently being Processed', 
                            'We are currently reviewing your withdrawal request of '.$request->amount.'BTC.<br>Thanks for working with us.'
                        );
                    }
                    return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
                }else{
                    return back()->with('alert', 'Insufficent balance.');
                }
            }elseif($request->type==3){
                if($user->ref_bonus>$amount || $user->ref_bonus==$amount){
                    $sav['user_id']=Auth::user()->id;
                    $sav['amount']=$amount;
                    $sav['status']=0;
                    $sav['details']=$request->details;
                    $sav['type']=$request->type;
                    Withdraw::create($sav);
                    $user->ref_bonus=$user->ref_bonus-$amount;
                    $user->save();
                    if($set->email_notify==1){
                        send_email(
                            $user->email, 
                            $user->username, 
                            'Withdraw Request currently being Processed', 
                            'We are currently reviewing your withdrawal request of '.$request->amount.'BTC.<br>Thanks for working with us.'
                        );
                    }
                    return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
                }else{
                    return back()->with('alert', 'Insufficent balance.');
                }
            }
    }      
    
    public function sharesubmit(Request $request)
    {
        $set=$data['set']=Settings::first();
        $user=$data['user']=User::find(Auth::user()->id);
        $kex=User::whereUsername($request->username)->get();
        if(count($kex)>0){
            if($user->balance>$request->amount || $user->balance==$request->amount){
                $receiver=User::whereUsername($request->username)->first();
                if($user->pin==$request->pin){
                    if($user->id!=$receiver->id){
                        $sav['sender_id']=Auth::user()->id;
                        $sav['receiver_id']=$receiver->id;
                        $sav['amount']=$request->amount;
                        $sav['ref_id']=str_random(16);
                        Transfer::create($sav);
                        $user->balance=$user->balance-$request->amount;
                        $user->save();               
                        $receiver->balance=$receiver->balance+$request->amount;
                        $receiver->save();
                        return back()->with('success', 'Transaction successful.');
                    }else{
                        return back()->with('alert', 'Invalid username.');
                    }
                }else{
                    return back()->with('alert', 'Invalid pin.');
                }
            }else{
                return back()->with('alert', 'Insufficent balance.');
            }
        }else{
            return back()->with('alert', 'Invalid username.');
        }
    } 

    public function userDataUpdate($id)
    {
        $data=Deposits::wheresecret($id)->first();
        if ($data->status == 0) {
            $currency=Currency::whereStatus(1)->first();
            $data['status'] = 1;
            $data->update();
            $user = User::find($data->user_id);
            $user['balance'] = $user->balance + $data->btc_amo;
            $user->update();
            $txt = $data->btc_amo.'BTC Deposited Successfully Via ' . $data->gateway->name;
            return redirect()->route('user.fund')->with('success', 'Payment was successful!');

        }else{
            return redirect()->route('user.fund')->with('alert', 'Already verified!');
        }

    }
        
    public function fundsubmit(Request $request)
    {
        $gate=Gateway::where('id', $request->gateway)->first();
        $user=User::find(Auth::user()->id);
        if ($gate->minamo <= $request->amount && $gate->maxamo >= $request->amount) {
            $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
            $usdamo = ($request->amount + $charge) / $gate->rate;
            $usdamo = round($usdamo, 2);
            $trx = round(microtime(true));
            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount + $charge;
            $depo['charge'] = $charge;
            $depo['usd'] = round($usdamo, 2);
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = str_random(16);
            $depo['secret'] = str_random(8);
            $depo['try'] = 0;
            $depo['status'] = 0;
            Deposits::create($depo);
            Session::put('Track', $depo['trx']);
            return redirect()->route('user.preview');        
        } else {
            return back()->with('alert', 'Please Follow Deposit Limit');
        }
    }

    public function depositpreview()
    {
        $track = Session::get('Track');
        $data['title']='Deposit Preview';
        $data['gate'] = Deposits::where('status', 0)->where('trx', $track)->first();
        return view('user.preview', $data);
    } 
    
    public function calculate(Request $request)
    {
        $plan=Plans::find($request->plan_id);
        $duration=$plan->duration.' '.$plan->period;
        $profit=$request->amount*($plan->percent/100)*castrotime($duration);
        if($request->amount>$plan->min_deposit || $request->amount==$plan->min_deposit){
            if($request->amount<$plan->amount  || $request->amount==$plan->amount){
                return back()->with('success', $profit.'BTC');  
            }else{
                return back()->with('alert', 'value is greater than maximum deposit');  
            }
        }else{
            return back()->with('alert', 'value is less than minimum deposit');  
        }
    }
    
    public function buy(Request $request)
    {
        $plan=$data['plan']=Plans::Where('id',$request->plan)->first();
        $user=User::find(Auth::user()->id);
        $set=Settings::find(1);
        if($user->balance>$request->amount || $user->balance==$request->amount){
            if($request->amount>$plan->min_deposit || $request->amount==$plan->min_deposit){
                if($request->amount<$plan->amount  || $request->amount==$plan->amount){
                    $sav['user_id']=Auth::user()->id;
                    $sav['plan_id']=$request->plan;
                    $sav['amount']=$request->amount;
                    $sav['profit']=0;
                    $sav['status']=1;
                    $sav['end_date']=0;
                    $sav['date']=Carbon::now();
                    $sav['trx']=str_random(16);
                    Profits::create($sav);
                    $a=$user->balance-$request->amount;
                    $user->balance=$a;
                    $user->save();
                    if ($set->referral==1){
                        $kex=Referral::whereUser_id(Auth::user()->id)->get();
                        if(count($kex)>0){
                            $ref_amount=($request->amount*$plan->ref_percent)/100;
                            $key=Referral::whereUser_id(Auth::user()->id)->first();
                            $user_update=User::whereId($key->ref_id)->first();
                            $user_update->ref_bonus=$user_update->ref_bonus+$ref_amount;
                            $user_update->save();
                            $ref['user_id']=Auth::user()->id;
                            $ref['referral']=$key->ref_id;
                            $ref['amount']=$ref_amount;
                            Earning::create($ref);
                        }
                    }
                    return back()->with('success', 'Plan was successfully purchased, scroll down to watch your daily earnings');  
                }else{
                    return back()->with('alert', 'value is greater than maximum deposit');  
                }
            }else{
                return back()->with('alert', 'value is less than minimum deposit');  
            }
        }else{
            return back()->with('alert', 'Insufficient Funds, please fund your account');
        }
    } 

        public function logout()
    {
        Auth::guard()->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/login');
    }
    
        public function submitPin(Request $request)
    {
        $this->validate($request, [
            'current_pin' => 'required',
            'pin' => 'required|max:4|confirmed'
        ]);
        try {

            $c_pin = Auth::user()->pin;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if ($request->current_pin==$c_pin) {
                if($request->pin==$request->pin_confirmation){
                    $user->pin = $request->pin;
                    $user->save();
                    return back()->with('success', 'Pin Changed Successfully.');
                }else{
                    return back()->with('alert', 'New Pin Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Pin Not Match.');
            }

        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }
    
    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {
                if($request->password==$request->password_confirmation){
                    $password = Hash::make($request->password);
                    $user->password = $password;
                    $user->save();
                    return back()->with('success', 'Password Changed Successfully.');
                }else{
                    return back()->with('alert', 'New Password Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Password Not Match.');
            }

        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }
    
        public function avatar(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                File::delete($path.$user->image);
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->image=$filename;
            $user->save();
            return back()->with('success', 'Avatar Updated Successfully.');
        }else{
            return back()->with('success', 'An error occured, try again.');
        }
    }       
    
        public function kyc(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                $link = $path . $user->kyc_link;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->kyc_link=$filename;
            $user->save();
            return back()->with('success', 'Kyc document Upload was successful.');
        }else{
            return back()->with('success', 'An error occured, try again.');
        }
    }
        public function account(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->country=$request->country;
        $user->city=$request->city;
        $user->zip_code=$request->zip_code;
        $user->address=$request->address;
        $user->save();
        return back()->with('success', 'Profile Updated Successfully.');
    }
        
    public function submit2fa(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $g=new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret=$request->vv;
        if ($request->type==0) {
            $check=$g->checkcode($secret, $request->code, 3);
            if($check){
                $user->fa_status = 0;
                $user->googlefa_secret = null;
                $user->save();
                return back()->with('success', '2fa disabled.');
            }else{
                return back()->with('alert', 'Invalid code.');
            }
        }else{
            $check=$g->checkcode($secret, $request->code, 3);
            if($check){
                $user->fa_status = 1;
                $user->googlefa_secret = $request->vv;
                $user->save();
                return back()->with('success', '2fa enabled.');
            }else{
                return back()->with('alert', 'Invalid code.');
            }
        }
    }
    public function upgrade()
    {
        $user=User::where('id', Auth::user()->id)->first();
        $set=Settings::first();
        if($user->balance>$set->upgrade_fee || $user->balance==$set->upgrade_fee){
            $user->upgrade=1;
            $user->balance=$user->balance-$set->upgrade_fee;
            $user->save();  
            return back()->with('success', 'You now have access to mining bonus.');
        }else{
            return back()->with('alert', 'Insufficient balance, add more funds..');
        }

    }
}
