<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
Use Session;

class Admin
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
        if(!Auth::user()->admin){
            session::flash('info','you dont have permission to perform this action');
            return redirect()->back();
        }
        return $next($request);
    }
}
