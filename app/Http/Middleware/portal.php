<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class portal
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
        if(!Session::get('portal_session')){
            return redirect('portal/login');
        }
        return $next($request);
    }
}
