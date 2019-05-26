<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

class UserActivity
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
        if(Auth::check())
        {
            $showAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-'. Auth::user()->id, true, $showAt);
        }
        return $next($request);
    }
}
