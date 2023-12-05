<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MasterAccess
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

        if ( Auth::user()->rol->key == 'master' || Auth::user()->rol->key == 'admin') {
            return $next($request);
        }else {
            return redirect()->route('mail.index');
        }

        
    }
}
