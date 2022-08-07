<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       /* return dd($request);
        return auth()->user()->type;
        $user = User::select('type')->where('email',$request->email)->first();
        return dd($user);*/
        if(auth()->user()->type == 0) {
            return view('test');
        }
        return $next($request);
    }
}
