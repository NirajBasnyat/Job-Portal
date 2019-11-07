<?php

namespace App\Http\Middleware;

use Closure;

class Seeker
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
        //TODO add admin permissions too
        if(auth()->user()->role === 1){
            return $next($request);
        }
        abort(401, 'This action is unauthorized.');
        return redirect('/');

    }
}
