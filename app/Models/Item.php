<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    use HasFactory;

    // Menentukan kolom yang dapat diisi melalui mass assignment
    protected $fillable = ['name', 'description', 'stock'];
}