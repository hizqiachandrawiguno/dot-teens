<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_code',
        'name',
        'phone',
        'email',
        'category',
        'origin',
        'status',
        'attended_at',
        'scanned_by',
        'notes',
    ];

    protected $casts = [
        'attended_at' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
