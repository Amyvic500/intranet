<?php

namespace App\Http\Middleware;

use View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Closure;
use App\message;
use App\Config;

class Viewshare
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
		$con = config::find(1);
		
		$user = Auth::user();
		if(Auth::check()){
				$message = message::with('dept.company.location')->where('auth', 1)->where('dept_id', '=', $user->dept_id)->orWhere(function ($query){
				$query->where('auth', 1)->where('dept_id', 0);
				})->take(5)->orderBy('created_at', 'DESC')->get();			
		}
		else{

				$message = message::where('auth', 1)->where('dept_id', 0)->take(5)->orderBy('created_at', 'DESC')->get();
			
		}
		View::share(['message'=>$message, 'con'=>$con]);
        return $next($request);
    }
}
