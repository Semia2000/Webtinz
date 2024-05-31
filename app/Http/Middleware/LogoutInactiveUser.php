<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LogoutInactiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            $inactiveLimit = 100 * 3600; // 

            if ($lastActivity && (time() - $lastActivity > $inactiveLimit)) {
                Auth::logout();
                Session::forget('lastActivityTime');
                return redirect()->route('login')->with('message', 'You have been logged out due to inactivity.');
            }

            Session::put('lastActivityTime', time());
        }

        return $next($request);
    }
}
