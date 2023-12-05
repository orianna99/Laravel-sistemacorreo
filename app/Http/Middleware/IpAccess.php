<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IpAccess
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
        function getRealIP()
        {
        
            if (isset($_SERVER["HTTP_CLIENT_IP"]))
            {
                return $_SERVER["HTTP_CLIENT_IP"];
            }
            elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            {
                return $_SERVER["HTTP_X_FORWARDED_FOR"];
            }
            elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
            {
                return $_SERVER["HTTP_X_FORWARDED"];
            }
            elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
            {
                return $_SERVER["HTTP_FORWARDED_FOR"];
            }
            elseif (isset($_SERVER["HTTP_FORWARDED"]))
            {
                return $_SERVER["HTTP_FORWARDED"];
            }
            else
            {
                return $_SERVER["REMOTE_ADDR"];
            }
        
        }
        
        $myIp = getRealIP();

            if ($myIp == Auth::user()->ip || Auth::user()->rol->key == 'master' || Auth::user()->rol->key == 'admin') {
                return $next($request);  
            }
                Auth::logout();
                return redirect()->route('login');
           
        
        
    }
}
