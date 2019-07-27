<?php

namespace App\Http\Middleware;

use Closure;

class StoreVisitedPage
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
        $user_id = auth()->user()->id;
        $path = $request->path();
        auth()->user()->pageViews()->create([
            'user_id' => $user_id,
            'path' => $path
        ]);

        return $next($request);
    }
}
