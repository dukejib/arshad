<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Support\Facades\Session;

class Administrator
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
        // if(auth()->check()){

        //     if( in_array( auth()->user()->email, config('app.administrators') ) ){
        //         Session::flash('success','Your are an admin');
        //     }else{
        //         Session::flash('info','You do not have access');
        //     }

        // }else {
        //     Session::flash('info','Please login');
        // }
        return $next($request);
    }
}
