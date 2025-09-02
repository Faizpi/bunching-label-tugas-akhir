<?php

namespace App\Http\Middleware;

use Closure;
use App\Constans\UserRole;

class WebAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(!\Auth::check()) {
            return redirect()->route('web.index');
        }

        $role = UserRole::getString(\Auth::user()->role);
        if(!in_array($role, $roles)) {
            \Auth::logout();
            return redirect()->route('web.index');
        }

        return $next($request);
    }
}
