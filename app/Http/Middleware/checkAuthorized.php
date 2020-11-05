<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class checkAuthorized
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
        if(!Auth::check()){

            return response()->json([
                'status' => false,
                'error' => 'Unauthorized'
            ]);
        }

        return $next($request);
    }
}
