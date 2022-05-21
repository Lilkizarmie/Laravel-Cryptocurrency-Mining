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
use App\Models\Gateway;
use App\Models\Adminbank;
use App\Models\Banktransfer;
use Carbon\Carbon;





class DepositController extends Controller
{

    public function depositlog()
    {
        $data['title']='Deposit logs';
        $data['deposit']=Deposits::orderBy('id', 'DESC')->get();
        return view('admin.deposit.index', $data);
    } 
    
    public function depositmethod()
    {
        $data['title']='Payment gateways';
        $data['gateway']=Gateway::orderBy('id', 'DESC')->get();
        return view('admin.deposit.methods', $data);
    } 


    public function store(Request $request)
    {
        $data = Gateway::findOrFail($request->id);
        $data->name=$request->name;
        $data->rate=$request->rate;
        $data->minamo=$request->minamo;
        $data->maxamo=$request->maxamo;
        $data->fixed_charge=$request->chargefx;
        $data->percent_charge=$request->chargepc;
        $data->val1=$request->val1;
        $data->val2=$request->val2;
        $data->status=$request->status;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  

    
    public function depositapproved()
    {
        $data['title']='Approved Deposit';
        $data['deposit']=Deposits::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.deposit.approved', $data);
    }     
    
    public function depositdeclined()
    {
        $data['title']='Declined Deposit';
        $data['deposit']=Deposits::whereStatus(2)->orderBy('id', 'DESC')->get();
        return view('admin.deposit.declined', $data);
    } 
    
    public function depositpending()
    {
        $data['title']='Pending deposit';
        $data['deposit']=Deposits::whereStatus(0)->orderBy('id', 'DESC')->get();
        return view('admin.deposit.pending', $data);
    } 
    

    public function DestroyDeposit($id)
    {
        $data = Deposits::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    }    
    
    public function approve($id)
    {
        $data = Deposits::findOrFail($id);
        $user=User::find($data->user_id);
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $all = @file_get_contents("https://blockchain.info/ticker");
        if($all){
            $all = file_get_contents("https://blockchain.info/ticker");
            $res = json_decode($all);
            $btcrate = $res->USD->last;
            $usd = $data->amount;
            $btcamount = $usd / $btcrate;
            $btc = round($btcamount, 8);
            $data->status=1;
            if(empty($data->btc_amo)){
                $data->btc_amo=$btc;
            }
            $user->balance=$user->balance+$btc;
            $user->save();
            $res=$data->save();
            if($set->email_notify==1){
                send_email(
                    $user->email, 
                    $user->username, 
                    'Deposit Request has been approved', 
                    'Deposit of '.$btc.'BTC. has been approved<br>Thanks for working with us.'
                );
            }
            if ($res) {
                return back()->with('success', 'Request was Successfully approved!');
            } else {
                return back()->with('alert', 'Problem With Approving Request');
            }
        }else{
            return back()->with('alert', 'Connect to internet to approve request');
        }
    }   
    
    public function decline($id)
    {
        $data = Deposits::findOrFail($id);
        $user=User::find($data->user_id);
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $data->status=2;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }        
}
