<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*$user = User::select('type')->first();
        return dd($user->type);
        && $user->type == 1*/
        //return dd(Auth::guard($guard)->check());
        //return dd($request);
        $user2 = isset(auth()->user()->type) ? auth()->user()->type : 0;
        if (Auth::check() && $user2 == 1) {
           return redirect(RouteServiceProvider::HOME);
            //return  redirect('/');
        }
        return $next($request);
    }
}
