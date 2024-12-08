<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id',       // Tambahkan ini untuk 'user_id'
        'item_id',
        'amount',
        'borrow_date',
        'description',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
