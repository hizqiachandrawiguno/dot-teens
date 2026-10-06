<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'expense_date',
        'category',
        'notes',
        'receipt_image',
        'recorded_by',
    ];

    protected $casts = [
        'amount' => 'integer',
        'expense_date' => 'date',
    ];
}
