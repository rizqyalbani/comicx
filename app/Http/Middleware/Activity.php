<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\ActivityLog;

class Activity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            $models = new ActivityLog();
            $models->user_id = Auth::user()->id;
            $models->route = \Request::route()->getName();
            $models->save();
        }

        return $next($request);
    }
}
