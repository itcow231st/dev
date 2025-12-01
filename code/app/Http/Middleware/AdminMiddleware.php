<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->guard('admin')->check()){
            return redirect()->route('admin.login');
        }

        if(auth()->guard('admin')->user()->role_id != '1'){
            auth()->guard('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['You do not have admin access.']);
        }
        return $next($request);
    }
}
