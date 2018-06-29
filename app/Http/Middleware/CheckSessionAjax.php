<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionAjax
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
        if($request->isXmlHttpRequest() && !Auth::check()){
            return response()->json([
                'message' => 'Need to Login ',
                'url' => route('login')],
            401);
        }
        return $next($request);
    }
}
