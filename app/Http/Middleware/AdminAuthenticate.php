<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate extends Middleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     protected function redirectTo(Request $request){
        return $request->expectsJson() ? null : route('admin.login');
     }

     protected function authenticate($request, array $guards)
     {
        if ($this->auth->guard('admin')->check()) {
            return $this->auth->shouldUse('admin');
        }

         $this->unauthenticated($request, ['admin']);
     }
}
