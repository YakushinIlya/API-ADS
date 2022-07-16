<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ApiTokenAuth
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
        $cookie_token = Cookie::get('token_auth');
        if(!empty($cookie_token) && !Auth::check()){
            if($user = User::where('token_auth', $cookie_token)->get()->first()) {
                Auth::login($user);
                return redirect()->route('profile');
            }
            return redirect('/');
        }

        if(!empty($cookie_token) && Auth::check()){
            if($cookie_token!=Auth::user()->token_auth){
                return redirect()->route('logout');
            }
        }

        if(!Auth::check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
