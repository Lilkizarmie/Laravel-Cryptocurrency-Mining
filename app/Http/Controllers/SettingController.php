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
use App\Models\Admin;
use App\Models\Etemplate;
use Carbon\Carbon;


class SettingController extends Controller
{

    public function Settings()
    {
        $data['title']='General settings';
        return view('admin.settings.basic-setting', $data);
    }     
    
    public function Email()
    {
        $data['title']='Email settings';
        $data['val']=Etemplate::first();
        return view('admin.settings.email', $data);
    } 

    public function EmailUpdate(Request $request)
    {
        $data = Etemplate::findOrFail(1);
        $data->esender=$request->sender;
        $data->emessage=$request->message;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }      
    
    public function Account()
    {
        $data['title']='Change account details';
        $data['val']=Admin::first();
        return view('admin.settings.account', $data);
    } 

    public function AccountUpdate(Request $request)
    {
        $data = Admin::findOrFail(1);
        $data->username=$request->username;
        $data->password=Hash::make($request->password);
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  
    
    public function Sms()
    {
        $data['title']='Sms settings';
        $data['val']=Etemplate::first();
        return view('admin.settings.sms', $data);
    } 

    public function SmsUpdate(Request $request)
    {
        $data = Etemplate::findOrFail(1);
        $data->smsapi=$request->smsapi;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }      
    
    public function SettingsUpdate(Request $request)
    {
        $data = Settings::findOrFail(1);
        $data->site_name=$request->site_name;
        $data->tawk_id=$request->tawk_id;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->title=$request->title;
        $data->balance_reg=$request->bal;
        $data->withdraw_charge=$request->withdraw_charge;
        $data->upgrade_fee=$request->upgrade_fee;
        $data->site_desc=$request->site_desc;
        $data->address=$request->address;
        if(empty($request->kyc)){
            $data->kyc=0;	
        }else{
            $data->kyc=$request->kyc;
        }    
        if(empty($request->email_activation)){
            $data->email_verification=0;	
        }else{
            $data->email_verification=$request->email_activation;
        }       
        if(empty($request->sms_activation)){
            $data->sms_verification=0;	
        }else{
            $data->sms_verification=$request->sms_activation;
        }        
        if(empty($request->email_notify)){
            $data->email_notify=0;	
        }else{
            $data->email_notify=$request->email_notify;
        }  
        if(empty($request->sms_notify)){
            $data->sms_notify=0;	
        }else{
            $data->sms_notify=$request->sms_notify;
        }        
        if(empty($request->registration)){
            $data->registration=0;	
        }else{
            $data->registration=$request->registration;
        }           
        if(empty($request->upgrade_status)){
            $data->upgrade_status=0;	
        }else{
            $data->upgrade_status=$request->upgrade_status;
        }        
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  
}
