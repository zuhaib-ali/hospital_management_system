<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoctorAuth
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
        if(!$request->session()->get('user')){
            return redirect()->route('login');
        }else{
            if($request->session()->get('user')->role == 'doctor'){
                return $next($request);
            }else{
                return back();
            }
        }
        
    }
}
