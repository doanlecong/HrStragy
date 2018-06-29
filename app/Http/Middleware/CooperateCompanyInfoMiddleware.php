<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CooperateCompanyInfoMiddleware
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
            $contact_mail_sub= config('global.cooperate_company_info');
            $admin = config('global.admin');
            if (!Auth::user()->hasRole($admin) && !Auth::user()->hasRole($contact_mail_sub)) //If user does //not have this permission
            {
                abort('403');
            }
        }
        return $next($request);
    }
}
