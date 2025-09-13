<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loan;
use App\Models\Item;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('email')) {
                return back()->withInput()->with('fail', 'Email sudah terdaftar');
            }

            return back()->withInput()->with('fail', 'Regsiter gagal! periksa data anda');
        }

        $user = User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'profile_picture' => 'user-default.png',
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Register berhasil! Silakan login.');
        }

        return back()->with('fail', 'Register gagal, coba lagi.');
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login berhasil, selamat datang');
        }

        return back()->with('fail', 'Login gagal, periksa kembali email atau password');
    }

    public function showDashboard(Request $request)
    {
        $user = Auth::user();

        $items = Item::count();
        $loans = Loan::where('user_id', $user->id)
            ->paginate($request->input('history_per_page', 5), ['*'], 'history_page');

        $notifications = Notification::where('user_id', $user->id)
            ->paginate($request->input('notif_per_page', 5), ['*'], 'notif_page');

        return view('dashboard', compact('user', 'loans', 'notifications', 'items'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showNotifications(Request $request)
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate($request->input('per_page'));

        return view('notification', compact('notifications', 'user'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'oldpassword'     => 'nullable|string|min:6',
            'newpassword'     => 'nullable|string|min:6|confirmed', // gunakan jika pakai konfirmasi password
        ]);

        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/profiles'), $fileName);

            if (
                $user->profile_picture
                && $user->profile_picture !== 'user-default.png'
                && file_exists(public_path('images/profiles/' . $user->profile_picture))
            ) {
                unlink(public_path('images/profiles/' . $user->profile_picture));
            }

            $data['profile_picture'] = $fileName;
        }

        // Handle change password
        if ($request->filled('oldpassword') || $request->filled('newpassword')) {
            if (!$request->filled('oldpassword') || !$request->filled('newpassword')) {
                return back()->with('fail', 'Kata sandi salah!');
            }

            if (!Hash::check($request->oldpassword, $user->password)) {
                return back()->with('fail', 'Kata sandi salah!');
            }

            $data['password'] = Hash::make($request->newpassword);
        }

        $user->update($data);

        return back()->with('success', 'Profile berhasil diperbarui!');
    }
}
