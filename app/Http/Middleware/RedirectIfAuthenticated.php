<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME);
                $role = strtolower(Auth::user()->getRole());

                switch ($role) {
                    case 'super administrator':
                        return redirect('/super/dashboard');
                        break;
                    case 'administrator':
                        return redirect('/oasis-admin/dashboard');
                        break;
                    case 'client':
                        return redirect('/dashboard');
                        break;

                    default:
                        return redirect('/');
                        break;
                }
            }
        }

        return $next($request);
    }
}
