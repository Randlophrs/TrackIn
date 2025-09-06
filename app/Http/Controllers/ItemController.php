<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display all items
        $items = Item::with('category')->get();

        return view('items.index', compact('items'));
    }

    public function create()
    {
        // Logic to show form for creating a new item
        return view('items.create');
    }
    
    public function store(Request $request)
    {
        // Logic to store a new item
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show($id)
    {
        // Logic to display a specific item
        // $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function edit($id)
    {
        // Logic to show form for editing an item
        // $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific item
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // $item = Item::findOrFail($id);
        // $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete a specific item
        // $item = Item::findOrFail($id);
        // $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }


}
