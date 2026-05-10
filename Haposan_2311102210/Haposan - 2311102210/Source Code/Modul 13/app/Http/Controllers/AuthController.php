<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email|max:150',
            'password' => 'required|string|min:6',
        ]);

        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                session()->put('name', Auth::user()->name);
                return redirect()->intended('/admin/packages');
            }

            return back()->withErrors([
                'email' => 'Otentikasi gagal: Email atau Password tidak valid.',
            ]);
        } catch (\Exception $e) {
            Log::error('Kesalahan Otentikasi: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Terjadi kesalahan internal server.',
            ]);
        }
    }
}
