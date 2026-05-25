<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('inventory.index'))->with('success', 'Otentikasi berhasil.');
        }

        return back()->withErrors(['email' => 'Kredensial tidak cocok dengan data kami.'])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('info', 'Sesi Anda telah diakhiri.');
    }
}