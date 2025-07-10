<?php

namespace App\Http\Controllers\Admin;

use App\Dto\User\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Services\UserService;
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

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login');

    }

}
