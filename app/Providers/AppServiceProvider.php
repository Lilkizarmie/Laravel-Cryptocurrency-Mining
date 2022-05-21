<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
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
use App\Models\Services;
use App\Models\Gateway;
use Illuminate\Support\Facades\View;
use Session;
use Image;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            if (Auth::check()){
                $user=User::find(Auth::user()->id);
                $currency=Currency::whereStatus(1)->first();
                if(empty($user->image)){
                    $cast="react.jpg";
                }else{
                    $cast=$user->image;
                }
                $profit=$data['profit']=Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
                foreach($profit as $xpro){
                    $profits=Profits::whereId($xpro->id)->first();
                    $date1=date_create(Carbon::now());
                    $date2=date_create($xpro->date);
                    $date_diff=date_diff($date2, $date1);
                    $start_date=date_create($xpro->date);
                    date_add($start_date, date_interval_create_from_date_string($xpro->plan->duration.' '.$xpro->plan->period));
                    $ndate=date_format($start_date, "Y-m-d H:i:s");   
                    $profits->end_date=$ndate;
                    $profits->save();
                    if (Carbon::now()<$ndate){
                        $fdate=($xpro->plan->percent*$xpro->amount)/100 * $date_diff->format('%R%a');   
                        $profits->profit=$fdate;
                        $profits->status=1;
                        $profits->save();
                    }else{
                        $fdate=($xpro->plan->percent*$xpro->amount)/100 * castrotime($xpro->plan->duration.' '.$xpro->plan->period);  
                        $profits->profit=$fdate;
                        $profits->save();
                        if($xpro->status==1){
                            $user->profit=$user->profit+$fdate;
                            $user->save();   
                            $profits->status=2;
                            $profits->save();
                            $set=Settings::first();
                            if($set->upgrade_status==1){
                                $bonus=$fdate*$xpro->plan->upgrade/100;
                                $user->profit=$user->profit+$bonus;
                                $user->save();   
                            }
                        }
                    }
                }

                $view->with('user', $user );
                $view->with('cast', $cast );
                $view->with('currency', $currency );
            }
        });
        $data['set']=Settings::first();
        $data['blog']=Blog::whereStatus(1)->get();
        $data['logo']=Logo::first();
        $data['social']=Social::all();
        $data['faq']=Faq::all();
        $data['cat']=Category::all();
        $data['pages']=Page::whereStatus(1)->get();
        $data['ui']=Design::first();
        $data['about']=About::first();
        $data['trending'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['posts'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['currency']=Currency::whereStatus(1)->first();
        $data['review'] = Review::whereStatus(1)->get();
        $data['service'] = Services::all();
        $data['gateway'] = Gateway::whereStatus(1)->get();
        $data['plan'] = Plans::whereStatus(1)->get();

        
        view::share($data);
    }
}
