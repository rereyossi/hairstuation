<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class SuperAdmin
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
      if (User::is_superadmin() == false)
      {
        return redirect('/');
      }
        return $next($request);
    }
}
