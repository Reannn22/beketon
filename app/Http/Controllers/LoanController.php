<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function loans($userId = null)
    {
        $userId = $userId ?? Auth::id();

        // Ambil semua barang yang ada dan urutkan berdasarkan nama
        $items = Item::orderBy('name')->get();

        // Ambil pinjaman berdasarkan user ID dan urutkan berdasarkan tanggal terbaru
        $loans = Loan::where('user_id', $userId)
            ->with('item')  // Eager load item relation
            ->orderBy('borrow_date', 'desc')
            ->get();

        return view('pinjam', compact('items', 'loans'));
    }

    public function borrow(Request $request)
    {
        // Validasi input dengan pesan error yang lebih informatif
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'user' => 'required|string|max:255',
            'borrow_date' => 'required|date|after_or_equal:today',
            'description' => 'required|string|max:1000',
            'amount' => 'required|integer|min:1',
        ], [
            'item_id.required' => 'Silahkan pilih barang yang akan dipinjam',
            'amount.min' => 'Jumlah minimal peminjaman adalah 1',
            'borrow_date.after_or_equal' => 'Tanggal peminjaman tidak boleh kurang dari hari ini',
        ]);

        // Ambil data barang yang dipilih
        $item = Item::findOrFail($request->item_id);

        // Pastikan ada cukup stok barang
        if ($item->stock < $request->amount) {
            return back()->with('error', 'Stok barang tidak mencukupi');
        }

        // Kurangi stok barang
        $item->decrement('stock', $request->amount);

        // Simpan data peminjaman ke tabel loans
        $loan = Loan::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'borrow_date' => $request->borrow_date,
            'description' => $request->description,
            'amount' => $request->amount, // Simpan jumlah peminjaman
        ]);

        // Catat log peminjaman
        Log::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'borrow',
            'amount' => $request->amount, // Simpan jumlah yang dipinjam di log
        ]);

        return back()->with('success', 'Peminjaman berhasil!');
    }

    public function return(Loan $loan, Request $request)
    {
        // Validate input
        $request->validate([
            'return_photo' => 'nullable|image|max:2048',
            'return_description' => 'nullable|string|max:1000',
        ]);

        // Check if loan exists and not already returned
        if (!$loan || $loan->return_date) {
            return back()->with('error', 'Invalid loan or already returned');
        }

        // Handle file upload if photo provided
        if ($request->hasFile('return_photo')) {
            $path = $request->file('return_photo')->store('return-photos', 'public');
            $loan->return_photo = $path;
        }

        // Update loan status
        $loan->status = 'returned';
        $loan->return_date = now();
        $loan->return_description = $request->return_description;
        $loan->save();

        // Return stock to inventory
        $loan->item->increment('stock', $loan->amount);

        // Log the return
        Log::create([
            'user_id' => auth()->id(),
            'item_id' => $loan->item_id,
            'action' => 'return',
            'amount' => $loan->amount,
        ]);

        return back()->with('success', 'Item returned successfully');
    }

    public function returnPage()
    {
        $userId = Auth::id();
        $loans = Loan::where('user_id', $userId)
            ->where('status', 'approved')
            ->whereNull('return_date')
            ->with('item')
            ->get();

        return view('return', compact('loans'));
    }

}
