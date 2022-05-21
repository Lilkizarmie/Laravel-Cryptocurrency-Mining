<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Currency;
use App\Models\Deposits;
use App\Models\Withdraw;
use Carbon\Carbon;





class WithdrawController extends Controller
{


        
    public function withdrawlog()
    {
        $data['title']='Withdraw logs';
        $data['withdraw']=Withdraw::orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.index', $data);
    } 
   
    
    public function withdrawapproved()
    {
        $data['title']='Approved Withdraw';
        $data['withdraw']=Withdraw::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.approved', $data);
    } 
    
    public function withdrawunpaid()
    {
        $data['title']='Approved Withdraw';
        $data['withdraw']=Withdraw::whereStatus(0)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.unpaid', $data);
    } 
    
    public function withdrawdeclined()
    {
        $data['title']='Declined Withdraw';
        $data['withdraw']=Withdraw::whereStatus(2)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.declined', $data);
    }

    public function DestroyWithdrawal($id)
    {
        $data = Withdraw::findOrFail($id);
        if($data->status==0){
            return back()->with('alert', 'You cannot delete an unpaid withdraw request');
        }else{
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
        }

    }  
    
    public function approve($id)
    {
        $data = Withdraw::findOrFail($id);
        $user=User::find($data->user_id);
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $data->status=1;
        $res=$data->save();
        if($set->email_notify==1){
            send_email(
                $user->email, 
                $user->username, 
                'Withdraw Request has been approved', 
                'Withdrawal request of '.substr($data->amount,0,9).'BTC. has been approved<br>Thanks for working with us.'
            );
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }  
   
    public function decline($id)
    {
        $data = Withdraw::findOrFail($id);
        $user=User::find($data->user_id);
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $data->status=2;
        $res=$data->save();
        if($data->type==1){
            $user->profit=$user->profit+$data->amount;
            $user->save();
        }elseif($data->type==2){
            $user->balance=$user->balance+$data->amount;
            $user->save();
        }elseif($data->type==3){
            $user->ref_bonus=$user->ref_bonus+$data->amount;
            $user->save();
        }
        if($set->email_notify==1){
            send_email(
                $user->email, 
                $user->username, 
                'Withdraw Request has been declined', 
                'Withdrawal request of '.substr($data->amount,0,9).'BTC. has been declined<br>Thanks for working with us.'
            );
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }        
}
