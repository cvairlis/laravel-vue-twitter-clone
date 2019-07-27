<?php

namespace App\Http\Middleware\Api;

use Closure;

class AuthenticateApi
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
        $token = $request->header('Authorization');
        if ($token != 'Bearer fwdPuYcgxdonAQoncuN8GIuvcOwuiYU8')
        {
            return response()->json([
                'message' => 'Authentication token not valid.'
            ], 401);
        }

        return $next($request);
    }
}
