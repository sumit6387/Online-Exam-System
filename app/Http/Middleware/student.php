<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class student
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
        if(!Session::get('id')){
            return redirect(url('student/login'));
        }
        return $next($request);
    }
}
