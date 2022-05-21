<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Session;
use Auth;

class Tfa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->fa_status == 0){
            return $next($request);
        }elseif(Auth::user()->fa_status == 1 && session()->has('fakey')){
            return $next($request);
        }elseif(Auth::user()->fa_status == 1 && session()->get('fakey')){
            return redirect()->route('2fa');
        }
    }
}
