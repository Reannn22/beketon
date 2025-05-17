<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class LoanNotification extends Notification
{
    use Queueable;

    protected $type;
    protected $data;

    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['database', 'custom'];
    }

    public function toWhatsApp($notifiable)
    {
        $message = match($this->type) {
            'return_reminder' => "Hi {$notifiable->name},\n\nPengingat: Batas waktu pengembalian untuk peminjaman {$this->data['unique_code']} akan berakhir besok.\n\nSilakan segera mengembalikan barang untuk menghindari denda.\n\nTerimakasih,\nTim LendEase",
            'loan_approved' => "Hi {$notifiable->name},\n\nPeminjaman dengan kode {$this->data['unique_code']} telah disetujui.\n\nSilakan ambil barang sesuai jadwal yang ditentukan.\n\nTerimakasih,\nTim LendEase",
            default => ""
        };

        return Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'HZRHUDM3PSGkj1u5WCPy'
            ])->asForm()->post('https://api.fonnte.com/send', [
                'target' => $notifiable->whatsapp,
                'message' => $message
            ]);
    }

    public function toEmail($notifiable)
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer re_7uKY2Wh6_5cNwJoB4wJBsbfvpMaB9m7db',
                'Content-Type' => 'application/json',
            ])->post('https://api.resend.com/emails', [
                'from' => 'lendease@lendease.my.id',
                'to' => $notifiable->email,
                'subject' => "LendEase - " . ucfirst(str_replace('_', ' ', $this->type)),
                'html' => view('emails.loan-notification', [
                    'type' => $this->type,
                    'data' => $this->data,
                    'user' => $notifiable
                ])->render()
            ]);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
