<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class JobAndRelateManagerMiddleware
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
        $user = User::all()->count();
        if (!($user == 1)) {
            $jobandrelate= config('global.job_company_location');
            $admin = config('global.admin');
            if (!Auth::user()->hasRole($admin) && !Auth::user()->hasRole($jobandrelate)) //If user does //not have this permission
            {
                abort('403');
            }
        }
        return $next($request);
    }
}
