<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use App\Models\Item;
use App\Notifications\LoanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BorrowController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string',
            'name' => 'required|string',
            'whatsapp' => 'required|string',
            'item_id' => 'required|exists:items,id',
            'id_card_photo' => 'required|image',
            'request_letter' => 'required|file|mimes:pdf',
            'borrow_date' => 'required|date|after:today',
            'return_date' => 'required|date|after:borrow_date',
        ]);

        $borrowRequest = BorrowRequest::create([
            ...$validated,
            'id_card_photo' => $request->file('id_card_photo')->store('id_cards'),
            'request_letter' => $request->file('request_letter')->store('letters'),
            'user_id' => auth()->id()
        ]);

        // Notify admin
        $admins = User::where('role', 'admin')->get();
        foreach($admins as $admin) {
            $admin->notify(new LoanNotification('new_request', $borrowRequest));
        }

        return back()->with('success', "Peminjaman berhasil diajukan dengan kode: {$borrowRequest->unique_code}");
    }

    // Add other methods...
}
