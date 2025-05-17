<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LogsExport;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with(['user', 'item'])->orderBy('created_at', 'desc')->get();
        return view('logs', compact('logs'));
    }

    public function handle(Request $request, $logId = null)
    {
        if ($request->isMethod('get')) {
            // Check if the user is an admin
            if (Auth::user()->role === 'admin') {
                // If user is admin, show all logs
                $logs = Log::all();
            } else {
                // If user is not admin, show only logs related to the logged-in user
                $logs = Log::where('user_id', Auth::id())->get();
            }

            return view('log', compact('logs'));
        }

        if ($request->isMethod('delete')) {
            try {
                // Temukan item berdasarkan ID
                $log = Log::findOrFail($logId);

                // Hapus log
                $log->delete();

                return back()->with('success', 'Log berhasil dihapus.');
            } catch (\Exception $e) {
                return back()->with('error', 'Terjadi kesalahan saat menghapus Log.');
            }
        }

        return back()->with('error', 'Aksi tidak diizinkan.');
    }

    public function exportPDF()
    {
        $logs = Log::with(['user', 'item'])->orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('exports.logs-pdf', ['logs' => $logs]);
        return $pdf->download('activity-logs.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new LogsExport, 'activity-logs.xlsx');
    }
}
