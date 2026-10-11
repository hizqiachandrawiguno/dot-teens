<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weeks_count',
        'amount',
        'due_date',
        'is_active',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'weeks_count' => 'integer',
        'amount' => 'integer',
        'due_date' => 'date',
    ];

    public function payments()
    {
        return $this->hasMany(CashPayment::class);
    }

    /**
     * Hitung tarif mingguan (default 5.000)
     */
    public function getWeeklyRateAttribute(): int
    {
        $weeks = $this->weeks_count ?: 4;
        return $weeks > 0 ? (int) round($this->amount / $weeks) : 5000;
    }

    /**
     * Tampilan nama periode dengan rincian minggu dan nominal
     */
    public function getDisplayNameAttribute(): string
    {
        $weeks = $this->weeks_count ?: 4;
        return "{$this->name} ({$weeks} Minggu — Rp " . number_format($this->amount, 0, ',', '.') . ")";
    }
}
