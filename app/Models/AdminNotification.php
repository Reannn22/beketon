<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'message',
        'type',
        'is_read',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
