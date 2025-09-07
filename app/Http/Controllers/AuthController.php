<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loan;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Register berhasil! Silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function showDashboard()
    {
        $user = Auth::user();

        $loans = Loan::where('user_id', $user->id)->paginate(10, ['*'], 'loans_page');

        $notifications = Notification::where('user_id', $user->id)->paginate(5, ['*'], 'notifications');

        return view('dashboard', compact('user', 'loans', 'notifications'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showNotifications()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('notification', compact('notifications'));
    }
}
