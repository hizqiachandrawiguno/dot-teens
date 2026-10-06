<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cash_volunteer_id',
        'cash_period_id',
        'amount_paid',
        'paid_at',
        'payment_method',
        'proof_image',
        'notes',
        'recorded_by',
    ];

    protected $casts = [
        'amount_paid' => 'integer',
        'paid_at' => 'date',
    ];

    public function volunteer()
    {
        return $this->belongsTo(CashVolunteer::class, 'cash_volunteer_id');
    }

    public function period()
    {
        return $this->belongsTo(CashPeriod::class, 'cash_period_id');
    }
}
