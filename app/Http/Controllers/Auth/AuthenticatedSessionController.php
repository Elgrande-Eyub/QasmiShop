<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function userLogin(LoginRequest $request): RedirectResponse
    {

         $request->authenticate();

        /* if(!$request->authenticate()){
            return redirect()->route('frontlogin')->with(['message'=>'email ou password est incorrect']);
        } */

        $request->session()->regenerate();

        if (Auth::check() && Auth::user()->role === 'professional') {

            if(Auth::user()->activeAccount == 0){
              Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('frontlogin')->with(['message'=>'Votre Compte nest pas Verifie']);
            }

            $request->session()->put('role', 'professional');
            return redirect()->route('index');
        }

        if (Auth::check() && Auth::user()->role === 'user') {

            $request->session()->put('role', 'user');
            return redirect()->route('index');
        }

        if (Auth::check() && Auth::user()->role === 'admin') {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('frontlogin')->with(['message'=>'Votre Email/Password est incorrect']);
        }




        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('admin/login');

            return redirect()->route('login');

    }

    public function userLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
