<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{



    public function login(Request $request): RedirectResponse
    {
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($user, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Incorrect email or password!');
    }

    public function showLogin()
    {

        return view('auth.login');
    }


    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login');

    }

}
