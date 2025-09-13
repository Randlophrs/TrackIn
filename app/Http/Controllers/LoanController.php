<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Notification;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $current = $request->input('category', 'semua');

        $loans = Loan::with('item.category')
            ->where('user_id', $user->id)
            ->whereNull('return_date')
            ->when($current !== 'semua', function ($query) use ($current) {
                $query->whereHas('item.category', function ($q) use ($current) {
                    $q->whereRaw('LOWER(name) = ?', [strtolower($current)]);
                });
            })
            ->paginate($request->input('per_page')); // misalnya 5 per page

        return view('loans.loan', compact('loans', 'user', 'current'));
    }


    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $item = Item::findOrFail($id);

        $request->validate([
            'loan_quantity' => 'required|integer|min:1|max:' . $item->quantity,
        ]);

        $loan = new Loan();
        $loan->user_id = $user->id;
        $loan->item_id = $item->id;
        $loan->quantity = $request->loan_quantity;
        $loan->loan_date = now();
        $loan->save();

        $item->quantity -= $request->loan_quantity;
        $item->save();

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Peminjaman Berhasil',
            'message' => 'Anda telah meminjam barang: ' . $item->name,
            'is_read' => false,
            'created_at' => now(),
        ]);

        return redirect()->route('items.index')->with('success', 'Barang berhasil dipinjam.');
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

    public function history(Request $request)
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

        return view('loans.history', compact('loans', 'user'));
    }
}
