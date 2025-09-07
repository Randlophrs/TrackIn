<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $loans = Loan::where('user_id', $user->id)->whereNull('return_date')->paginate(12, ['*'], 'loans_page');

        return view('loan', compact('loans'));
    }

    public function returnLoan($id)
    {
        $loan = Loan::findOrFail($id);

        // update return_date sekarang
        $loan->return_date = now();
        $loan->save();

        // kembalikan stok barang
        $loan->item->quantity += $loan->quantity;
        $loan->item->save();

        Notification::create([
            'user_id' => $loan->user_id,
            'title' => 'Pengembalian Berhasil',
            'message' => 'Anda telah mengembalikan barang: ' . $loan->item->name,
            'is_read' => false,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Barang berhasil dikembalikan.');
    }

    public function history()
    {
        $user = Auth::user();

        $loans = Loan::where('user_id', $user->id)->whereNotNull('return_date')->paginate(15, ['*'], 'history_page');

        return view('history', compact('loans'));
    }
}
