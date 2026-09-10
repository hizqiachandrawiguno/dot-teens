<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'event_date', 
        'event_waktu',
        'event_time',
        'location', 
        'image'
    ];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function getTimeFormattedAttribute()
    {
        $time = $this->event_waktu ?? $this->event_time ?? '17:00';
        return date('H:i', strtotime($time));
    }
}