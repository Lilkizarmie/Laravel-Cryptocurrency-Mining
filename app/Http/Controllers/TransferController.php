<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Transfer;
use App\Models\Earning;
use Carbon\Carbon;


class TransferController extends Controller
{

    public function Transfers()
    {
        $data['title']='Own bank transfer';
        $data['transfer']=Transfer::latest()->get();
        return view('admin.transfer.transfer', $data);
    }     
    
    public function Referrals()
    {
        $data['title']='Referral earnings';
        $data['earning']=Earning::latest()->get();
        return view('admin.transfer.referral', $data);
    } 
    
    
}
