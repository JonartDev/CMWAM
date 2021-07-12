<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('LoggedUser') && ($request->path()!='/' && $request->path()!='admin/dashboard')){
            return redirect('/')->with('fail','You must be logged in');
        }
        if(!session()->has('LoggedUser') && ($request->path()=='/' || $request->path()=='admin/dashboard')){
            return back();
        }
        return $next($request);
    }
}
