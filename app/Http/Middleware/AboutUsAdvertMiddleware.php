<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AboutUsAdvertMiddleware
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
            $contact_advert = config('global.contact_advert');
            $admin = config('global.admin');
            if (!Auth::user()->hasRole($admin) || !Auth::user()->hasRole($contact_advert)) //If user does //not have this permission
            {
                abort('401');
            }
        }
        return $next($request);
    }
}
