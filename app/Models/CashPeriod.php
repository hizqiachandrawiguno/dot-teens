<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'due_date',
        'is_active',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'amount' => 'integer',
        'due_date' => 'date',
    ];

    public function payments()
    {
        return $this->hasMany(CashPayment::class);
    }
}
