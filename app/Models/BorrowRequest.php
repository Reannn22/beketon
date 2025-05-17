<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BorrowRequest extends Model
{
    protected $fillable = [
        'unique_code',
        'user_id',
        'item_id',
        'nim',
        'name',
        'whatsapp',
        'id_card_photo',
        'request_letter',
        'borrow_date',
        'return_date',
        'status',
        'admin_notes',
        'return_photo',
        'return_description',
        'penalty_amount',
        'penalty_proof',
        'is_late',
        'penalty_paid'
    ];

    protected $casts = [
        'borrow_date' => 'datetime',
        'return_date' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($request) {
            $request->unique_code = Str::random(8);
            $request->status = 'pending';
        });
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sendWhatsAppNotification($message)
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'HZRHUDM3PSGkj1u5WCPy'
            ])->asForm()->post('https://api.fonnte.com/send', [
                'target' => $this->whatsapp,
                'message' => $message
            ]);
    }

    public function sendEmailNotification($subject, $html)
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer re_7uKY2Wh6_5cNwJoB4wJBsbfvpMaB9m7db',
                'Content-Type' => 'application/json',
            ])->post('https://api.resend.com/emails', [
                'from' => 'lendease@lendease.my.id',
                'to' => $this->user->email,
                'subject' => $subject,
                'html' => $html
            ]);
    }

    public function isLate()
    {
        return now() > $this->return_date;
    }

    public function calculatePenalty()
    {
        if (!$this->isLate()) return 0;

        $daysLate = now()->diffInDays($this->return_date);
        return $daysLate * 10000; // Rp 10.000 per hari
    }
}
