<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Item::with('category')->get();

        return view('items.index', compact('items', 'user'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $item = Item::findOrFail($id);
        return view('items.show', compact('item', 'user'));
    }
}
