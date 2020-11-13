<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Client;

class Client
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
        /*if(Auth::check() && Auth::user()->isClient()){
            return $next($request);
        }*/
		$id = $request->get('id');
		$token = $request->get('token_key');
		
		
        $client_sel = Client::where([['id',$id],['client_token',$token]])->get();
	
		if($client_sel){
			//return view('admin.user.index',compact('user_sel','id'));
			return $next($request);
		}
		
        return redirect('/');
    }
}
