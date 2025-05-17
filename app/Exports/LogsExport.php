<?php

namespace App\Exports;

use App\Models\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LogsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Log::with(['user', 'item'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($log) {
                return [
                    'User' => $log->user->name,
                    'Barang' => $log->item->name,
                    'Aksi' => ucfirst($log->action),
                    'Jumlah' => $log->amount,
                    'Tanggal' => $log->created_at->format('d/m/Y H:i')
                ];
            });
    }

    public function headings(): array
    {
        return [
            'User',
            'Barang',
            'Aksi',
            'Jumlah',
            'Tanggal'
        ];
    }
}
