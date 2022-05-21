<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

use Auth;
class CheckStatus
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
        if(Auth::user()->phone_verify == 1 && Auth::user()->email_verify == 1 && Auth::user()->status == 0)
        {
            return $next($request);
        }else{
            return redirect()->route('user.authorization');
        }

    }
}
