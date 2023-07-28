<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check the account status
            if ($user->activeAccount === -1) {
                // Account is blocked
                Auth::logout();
                return redirect()->back()->with('error', 'Your account has been blocked. Please contact support.');
            } elseif ($user->activeAccount === 0) {
                // Account is under process
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is still under process. Please wait for activation.');
            }

        }

        return $next($request);
    }
}
