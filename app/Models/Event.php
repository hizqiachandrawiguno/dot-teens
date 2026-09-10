<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

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
        'image',
        'is_popup'
    ];

    protected $casts = [
        'is_popup' => 'boolean',
    ];

    protected static function booted()
    {
        static::ensureIsPopupColumnExists();
    }

    /**
     * Otomatis membuat kolom is_popup di database live hosting jika belum di-migrate
     */
    public static function ensureIsPopupColumnExists()
    {
        static $checked = false;
        if ($checked) return;
        $checked = true;

        try {
            if (Schema::hasTable('events') && !Schema::hasColumn('events', 'is_popup')) {
                Schema::table('events', function (Blueprint $table) {
                    $table->boolean('is_popup')->default(false)->after('image');
                });
            }
        } catch (\Throwable $e) {
            // Abaikan jika migrasi sedang berjalan atau keterbatasan hak akses
        }
    }

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