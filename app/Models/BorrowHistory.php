<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    protected $fillable = [
        'borrow_request_id',
        'nim',
        'item_name',
        'borrow_date',
        'return_date',
        'status'
    ];

    protected $casts = [
        'borrow_date' => 'datetime',
        'return_date' => 'datetime'
    ];

    public function borrowRequest()
    {
        return $this->belongsTo(BorrowRequest::class);
    }
}
