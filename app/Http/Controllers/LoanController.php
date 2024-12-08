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
        $userId = $userId ?? Auth::id(); // Gunakan user ID yang dioper, atau ID user yang sedang login

        // Ambil semua barang yang ada
        $items = Item::all();

        // Ambil pinjaman berdasarkan user ID
        $loans = Loan::where('user_id', $userId)->get();

        return view('pinjamBarang', compact('items', 'loans'));
    }

    public function borrow(Request $request)
    {
        // Validasi input
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'user' => 'required|string',
            'borrow_date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|integer|min:1|max:' . Item::find($request->item_id)->stock,
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

    public function return(Loan $loan)
    {
        // Pastikan loan ada
        if (!$loan) {
            return back()->with('error', 'Peminjaman tidak ditemukan.');
        }
    
        // Cek jika status sudah 'returned'
        if ($loan->status === 'returned') {
            return back()->with('error', 'Barang sudah dikembalikan');
        }
    
        // Cek apakah item terkait masih ada (optional)
        $item = $loan->item;
        if (!$item) {
            return back()->with('error', 'Barang yang dipinjam tidak ditemukan.');
        }
    
        // Ambil jumlah item yang dikembalikan
        $amount = $loan->amount;
    
        // Update status dan tanggal pengembalian
        $loan->status = 'returned';
        $loan->return_date = now();
        $loan->save(); // Menyimpan perubahan ke database
    
        // Tambahkan stok barang berdasarkan amount
        $item->increment('stock', $amount); // Increment stok barang sesuai dengan jumlah yang dikembalikan
    
        // Catat log dengan deskripsi
        Log::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'amount' => $amount,
            'action' => 'return',
        ]);
    
        return back()->with('success', 'Barang berhasil dikembalikan');
    }
    
}
