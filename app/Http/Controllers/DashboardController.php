<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan pengguna sudah login sebelum mencoba mendapatkan data pengguna
        if (Auth::check()) {
            $userRole = Auth::user()->role; // Ambil role user yang sedang login
            
            if ($userRole === 'admin') {
                $items = Item::all();
                $borrowItems = Loan::where('status', 'borrowed')->count();
                $returnItems = Loan::where('status', 'returned')->count();
            } else if( $userRole === 'user') {
                $items = Loan::where('user_id', Auth::id())->get();
                $borrowItems = Loan::where('user_id', Auth::id())->where('status', 'borrowed')->count();
                $returnItems = Loan::where('user_id', Auth::id())->where('status', 'returned')->count();
            }

            return view('dashboard', compact('userRole', 'items', 'borrowItems', 'returnItems'));
        }

        // Jika pengguna belum login, arahkan ke halaman login atau tampilkan pesan
        return redirect()->route('login')->withErrors(['error' => 'You must be logged in to access this page.']);
    }

    public function dashboardData(Request $request)
    {
        $user = $request->user();

        // Admin dashboard data
        if ($user->hasRole('Admin')) {
            return response()->json([
                'total_item' => Item::count(),
                'item_dipinjam' => Loan::where('status', 'borrowed')->count(),
                'item_dikembalikan' => Loan::where('status', 'returned')->count(),
            ]);
        }

        // Non-admin (user) dashboard data
        return response()->json([
            'item_dipinjam' => Loan::where('user_id', $user->id)->where('status', 'borrowed')->count(),
            'item_dikembalikan' => Loan::where('user_id', $user->id)->where('status', 'returned')->count(),
        ]);
    }

}