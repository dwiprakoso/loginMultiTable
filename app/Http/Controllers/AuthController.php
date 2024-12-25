<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request, $role)
        {
            $credentials = $request->only('email', 'password');

            // Tentukan guard berdasarkan role
            $guards = match ($role) {
                'user' => ['user', 'admin'], // User bisa login sebagai User atau Admin
                'vendor' => ['vendor', 'admin'], // Vendor bisa login sebagai Vendor atau Admin
                default => null,
            };

            if (!$guards) {
                return back()->withErrors(['login' => 'Role tidak valid.'])->withInput();
            }

            // Cek login pada setiap guard
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->attempt($credentials)) {
                    // Redirect ke dashboard sesuai guard yang berhasil
                    return redirect()->route("$guard.dashboard");
                }
            }

            // Jika tidak ada yang cocok, tampilkan error
            return back()->withErrors(['login' => 'Email atau password salah'])->withInput();
        }


    public function logout(Request $request)
        {
            // Logout dari semua guard
            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            }

            if (Auth::guard('user')->check()) {
                Auth::guard('user')->logout();
            }

            if (Auth::guard('vendor')->check()) {
                Auth::guard('vendor')->logout();
            }

            // Invalidate dan regenerasi token session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'Berhasil logout!');
        }
}
