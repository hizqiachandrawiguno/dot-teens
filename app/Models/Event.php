<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk membuka gembok keamanan Laravel
    protected $fillable = [
        'title',
        'event_date',
        'event_time',
        'location',
        'image'
    ];
}