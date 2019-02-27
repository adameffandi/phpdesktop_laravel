<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

class AdminMiddleware
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
        if ($request->user() && $request->user()->role_id != 1)
        {
          Auth::logout();
          return new Response(view("misc.unauthorized")->with("role", "ADMIN"));
        }

        return $next($request);
    }
}
