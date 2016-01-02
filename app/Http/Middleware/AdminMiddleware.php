<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
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
      if (User::is_admin() == false)
      {
        return redirect()->guest('auth/login');
      }
        return $next($request);
    }
}
