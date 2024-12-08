<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function handle(Request $request, $userId = null)
    {
        if ($request->isMethod('get')) {
            // Menampilkan daftar user
            $users = User::all();
            return view('user', compact('users'));  // View to list users
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
                'role' => 'required|string|max:255',
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
    
            if ($user) {
                return back()->with('success', 'User berhasil ditambahkan.');
            } else {
                return back()->with('error', 'Terjadi kesalahan saat menambahkan user.');
            }
        }

        if ($request->isMethod('put') && $userId) {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $userId,
                'password' => 'nullable|min:8|confirmed',  // Password is optional during update
                'role' => 'required|string|max:255',
            ]);

            // Temukan user berdasarkan ID
            $user = User::findOrFail($userId);

            // Memperbarui user
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->role = $request->role;

            if ($user->save()) {
                return back()->with('success', 'User berhasil diperbarui.');
            } else {
                return back()->with('error', 'Terjadi kesalahan saat memperbarui user.');
            }
        }

        if ($request->isMethod('delete') && $userId) {
            try {
                // Temukan user berdasarkan ID
                $user = User::findOrFail($userId);

                // Hapus user
                $user->delete();

                return back()->with('success', 'User berhasil dihapus.');
            } catch (\Exception $e) {
                return back()->with('error', 'Terjadi kesalahan saat menghapus user.');
            }
        }

        return back()->with('error', 'Aksi tidak diizinkan.');
    }
}