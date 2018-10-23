<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CandidateAndGuestManagerMiddleware
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
            $candidate_guest= config('global.candidate_guest');
            $jobandrelate= config('global.job_company_location');
            $admin = config('global.admin');
            if (!Auth::user()->hasRole($admin) && !Auth::user()->hasRole($candidate_guest) && !Auth::user()->hasRole($jobandrelate)) //If user does //not have this permission
            {
                abort('403');
            }
        }
        return $next($request);
    }
}
