<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class BorrowReminder extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toWhatsApp($notifiable)
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'HZRHUDM3PSGkj1u5WCPy'
            ])->asForm()->post('https://api.fonnte.com/send', [
                'target' => $notifiable->whatsapp,
                'message' => "Reminder: Batas waktu pengembalian barang akan berakhir besok.\n\nKode Peminjaman: {$notifiable->unique_code}\nBarang: {$notifiable->item->name}\n\nSilahkan segera mengembalikan barang untuk menghindari denda keterlambatan.\n\nTerimakasih,\nTim LendEase"
            ]);

        return $response->successful();
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Reminder Pengembalian',
            'message' => "Batas waktu pengembalian untuk peminjaman {$notifiable->unique_code} akan berakhir besok"
        ];
    }
}
