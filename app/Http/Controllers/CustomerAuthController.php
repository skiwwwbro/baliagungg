<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $key = Str::lower($request->email) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {

            $seconds = RateLimiter::availableIn($key);

            return response()->json([
                'status' => false,
                'message' => "Terlalu banyak percobaan login. Coba lagi {$seconds} detik."
            ],429);
        }

        if (!Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])) {

            RateLimiter::hit($key,60);

            return response()->json([
                'status'=>false,
                'message'=>'Email atau password salah.'
            ],422);
        }

        RateLimiter::clear($key);

        $request->session()->regenerate();

        $user = Auth::user();

        return response()->json([
            'status'=>true,
            'message'=>'Login berhasil.',
            'redirect'=>$user->is_admin
                ? route('admin.dashboard')
                : route('customer.bookings')
        ]);
    }

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols(),
        ],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'customer',
            'is_admin' => false,
        ]);

        Auth::login($user);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Register berhasil.',
                'user' => [
                    'name' => $user->name,
                    'initial' => strtoupper(substr($user->name, 0, 1)),
                ],
                'redirect' => route('customer.bookings'),
            ]);
        }

        return redirect()->route('customer.bookings');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Logout berhasil.',
            ]);
        }

        return redirect()->route('home');
    }
}