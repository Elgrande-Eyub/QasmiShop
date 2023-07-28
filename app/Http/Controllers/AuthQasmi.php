<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AuthQasmi extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', $validator->errors()->first());
        }

        $isProfessionel = "user";
        $activeAccount = 1;

        if($request->has('isProfessionel')) {
            $isProfessionel = "professional";
            $activeAccount = 0;

            $validator = Validator::make($request->all(), [
                'telephone' => ['required', 'string', 'max:255'],

            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('message', $validator->errors()->first());
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $isProfessionel,
            'activeAccount' => $activeAccount,
        ]);

        event(new Registered($user));

        if(!$request->has('isProfessionel')) {
            $request->session()->put('role', 'user');
            Auth::login($user);
                $user->update([
                'online' => 1
            ]);

            return redirect()->route('index');
        }

        $user->update([
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('getRegisterQasmi')->with(['success'=>'votre premium account est en traitement , vous contactera bientôt']);

    }
}
