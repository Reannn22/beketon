<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
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
        'actual_return_date',
        'return_photo',
        'return_description',
        'penalty_amount',
        'admin_notes',
    ];

    protected $casts = [
        'borrow_date' => 'datetime',
        'return_date' => 'datetime',
        'actual_return_date' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penaltyPayment()
    {
        return $this->hasOne(PenaltyPayment::class);
    }
}
