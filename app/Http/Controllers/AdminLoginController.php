<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Settings;

class AdminLoginController extends Controller
{


	public function __construct(){
		$Gset = Settings::first();
		$this->sitename = $Gset->site_name;
	}


	public function index(){

		if(Auth::guard('admin')->check()){
			return redirect()->route('admin.dashboard');
		}
		$data['title'] = "Admin";
		return view('admin.index', $data);
	}

	public function authenticate(Request $request){
		if (Auth::guard('admin')->attempt([
			'username' => $request->username,
			'password' => $request->password,
		])) {
			return redirect()->intended('admin/dashboard');
		}else{
			return back()->with('alert', 'Oops! You have entered invalid credentials');
		}
	}
}
