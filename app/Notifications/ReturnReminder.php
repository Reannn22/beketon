<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class ReturnReminder extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . config('services.resend.key'),
                'Content-Type' => 'application/json',
            ])->post('https://api.resend.com/emails', [
                'from' => 'LendEase@lendease.my.id',
                'to' => $notifiable->email,
                'subject' => 'Reminder Pengembalian - LendEase',
                'html' => view('emails.return-reminder', [
                    'loan' => $notifiable
                ])->render()
            ]);
    }

    public function toWhatsApp($notifiable)
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => config('services.fonnte.key')
            ])->asForm()->post('https://api.fonnte.com/send', [
                'target' => $notifiable->whatsapp,
                'message' => "Reminder Pengembalian\n\nHi {$notifiable->name},\n\nBatas waktu pengembalian untuk peminjaman {$notifiable->unique_code} akan berakhir besok.\n\nSilahkan segera mengembalikan barang untuk menghindari denda.\n\nTerimakasih,\nTim LendEase"
            ]);
    }
}
