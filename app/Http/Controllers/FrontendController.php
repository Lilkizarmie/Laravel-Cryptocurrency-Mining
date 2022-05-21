<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Social;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Page;
use App\Models\Design;
use App\Models\About;
use App\Models\Review;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use App\Models\Alerts;
use App\Models\Save;
use App\Models\Subscriber;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class FrontendController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        $data['title'] = "Home";
        return view('front.index', $data);
    }


    public function about()
    {
        $data['title'] = "About Us";
        $data['review'] = Review::whereStatus(1)->get();
        return view('front.about', $data);
    }

    public function faq()
    {
        $data['title'] = "Faq";
        return view('front.faq', $data);
    }
    
    public function terms()
    {
        $data['title'] = "Terms & conditions";
        return view('front.terms', $data);
    }    
    
    public function privacy()
    {
        $data['title'] = "Privacy policy";
        return view('front.privacy', $data);
    }


    public function contact()
    {
        $data['title'] = "Contact Us";
        return view('front.contact', $data);
    }


    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required'
        ]);
        $sav['full_name']=$request->name;
        $sav['email']=$request->email;
        $sav['mobile']=$request->mobile;
        $sav['message']=$request->message;
        $sav['seen'] = 0;
        Contact::create($sav);
        return back()->with('success', ' Message was successfully sent!');
    }


    public function blog()
    {
        $data['title'] = "Blog Feed";
        $data['posts'] = Blog::latest()->paginate(3);
        return view('front.blog', $data);
    }

    public function article($id)
    {
        $post = $data['post'] = Blog::find($id);
        $xcat = $data['xcat'] = Category::find($post->cat_id);
        $post->views += 1;
        $post->save();
        $data['title'] = $data['post']->title;
        return view('front.single', $data);
    }

    public function category($id)
    {
        $cat = Category::find($id);
        $data['title'] = $cat->categories;
        $data['posts'] = Blog::where('cat_id', $id)->latest()->paginate(3);
        return view('front.cat', $data);
    } 
    
    public function page($id)
    {
        $page = $data['page']=Page::find($id);
        $data['title'] = $page->title;
        return view('front.pages', $data);
    }


    public function subscribe(Request $request)
    {
		 $request->validate([
            'email' => 'required|email|max:255',
        ]);
        $macCount = Subscriber::where('email', $request->email)->count();
        if ($macCount > 0) {
            return back()->with('alert', 'This Email Already Exist !!');
        }else{
            Subscriber::create($request->all());
            return back()->with('success', ' Subscribe Successfully!');
        }
    }

}
