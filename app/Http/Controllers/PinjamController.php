<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $loans = Loan::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->with('item')
            ->get();

        $items = Item::where('stock', '>', 0)->get();

        return view('pinjam.index', compact('loans', 'items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|integer|min:1',
            'description' => 'required|string|max:255',
        ]);

        $item = Item::findOrFail($validated['item_id']);

        if ($item->stock < $validated['amount']) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        $loan = Loan::create([
            'user_id' => auth()->id(),
            'item_id' => $validated['item_id'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'borrow_date' => now(),
            'status' => 'pending'
        ]);

        $item->decrement('stock', $validated['amount']);

        return redirect()->route('pinjam.index')->with('success', 'Pengajuan peminjaman berhasil dibuat.');
    }
}
