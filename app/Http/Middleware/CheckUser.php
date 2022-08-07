<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{

    public function handle(Request $request, Closure $next)
    {
        //return dd(isset(auth()->user()->type));
        $user = isset(auth()->user()->type) ? 1: 0 ;
        $user2 = isset(auth()->user()->type) ? auth()->user()->type : 0;
        if($user2 == 0 || !$user){
            //return  response('you are not admin');
            //@if(Session::has('msg')) {{Session::get('msg')}}@endif use it with the with(['msg'=>'msdfjdjf']) in blade
            return  redirect('/')->with(['msg'=>'you are not Admin']);
            //return  redirect('/')->withErrors(['msg'=>'you are not Admin']);
            // when using withError(['msg'=>'dfkjdfkjdfj']) it will use this format in blade
            // @error('msg') {{$message}} @enderror take care from {{$message}} although using any name
            // like withError('name'=>'dkdjf') or withError('hassan'=>'dkdjf') you will use in {{}} the variable $message
        }
        return $next($request);
    }
}
