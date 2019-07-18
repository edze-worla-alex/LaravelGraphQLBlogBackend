<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

use Nuwave\Lighthouse\Exceptions\AuthenticationException;

class CheckRole
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
      Log::info('Showing user profile for user: '.$request);
      if ($request->token != "12345") {
          // return redirect('/');
         throw new AuthenticationException("Authorized access only");
      }

        return $next($request);
    }
}
