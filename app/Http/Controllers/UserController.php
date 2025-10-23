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

class UserController extends Controller
{
    public function showDashboard(Request $request)
    {
        $user = Auth::user();

        $items = Item::count();
        $loans = Loan::where('user_id', $user->id)
            ->paginate($request->input('history_per_page', 5), ['*'], 'history_page');

        $notifications = Notification::where('user_id', $user->id)
            ->paginate($request->input('notif_per_page', 5), ['*'], 'notif_page');

        return view('users.dashboard', compact('user', 'loans', 'notifications', 'items'));
    }

    public function ShowHistory(Request $request)
    {
        $user = Auth::user();
        $current = $request->input('category', 'semua');
        
        $loans = Loan::where('user_id', $user->id)
            ->whereNotNull('return_date')
            ->when($current !== 'semua', function ($query) use ($current) {
                $query->whereHas('item.category', function ($q) use ($current) {
                    $q->whereRaw('LOWER(name) = ?', [strtolower($current)]);
                });
            })
            ->paginate($request->input('history_per_page', 1), ['*'], 'history_page');

        return view('users.loans.history', compact('loans', 'user'));
    }

    public function showNotifications(Request $request)
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate($request->input('per_page'));

        return view('users.profile.notification', compact('notifications', 'user'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('users.profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'oldpassword'     => 'nullable|string|min:6',
            'newpassword'     => 'nullable|string|min:6|confirmed',
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
