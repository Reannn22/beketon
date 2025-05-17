<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Loan extends Model
{
    protected $fillable = [
        'unique_code',
        'user_id',
        'item_id',
        'amount',
        'borrow_date',
        'return_date',
        'status',
        'description',
        'return_photo',
        'return_description',
        'penalty_amount',
        'penalty_paid',
        'penalty_proof'
    ];

    protected $casts = [
        'borrow_date' => 'datetime',
        'return_date' => 'datetime',
        'penalty_paid' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($loan) {
            $loan->unique_code = Str::random(8);
            $loan->status = 'pending';
            $loan->borrow_date = now();
        });
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
