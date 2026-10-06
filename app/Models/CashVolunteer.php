<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashVolunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'division',
        'monthly_due',
        'is_active',
        'notes',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'monthly_due' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(CashPayment::class);
    }

    /**
     * Format nomor HP agar standar internasional untuk WhatsApp (628...)
     */
    public function getFormattedPhoneAttribute(): string
    {
        $phone = preg_replace('/[^0-9]/', '', (string)$this->phone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        } elseif (str_starts_with($phone, '8')) {
            $phone = '62' . $phone;
        }
        return $phone;
    }

    /**
     * Hitung periode yang belum dibayar oleh volunteer ini
     */
    public function getUnpaidPeriods($allPeriods)
    {
        $paidPeriodIds = $this->payments->pluck('cash_period_id')->toArray();
        return $allPeriods->filter(function ($period) use ($paidPeriodIds) {
            return !in_array($period->id, $paidPeriodIds);
        });
    }

    /**
     * Generate URL One-Click WhatsApp dengan template pesan ramah
     */
    public function generateWaLink($unpaidPeriods, $bankInfo = null)
    {
        $phone = $this->formatted_phone;
        if (empty($phone)) {
            return '#';
        }

        $periodNames = $unpaidPeriods->pluck('name')->implode(', ');
        $totalAmount = $unpaidPeriods->sum('amount');
        $nominalFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');

        $rekeningText = $bankInfo ?: "BCA 6390086774 a.n Hizqia Chandra Wiguno";

        $pesan = "Shalom Kak {$this->name}! 👋✨\n"
               . "Semoga pelayanannya selalu diberkati ya.\n\n"
               . "Mengingatkan untuk iuran kas *DOT Teens* yang masih belum tercatat:\n"
               . "📌 *Periode:* {$periodNames}\n"
               . "💰 *Total Tunggakan:* *{$nominalFormatted}*\n\n"
               . "Bisa diserahkan tunai ke Bendahara atau transfer melalui:\n"
               . "💳 *{$rekeningText}*\n\n"
               . "Jika sudah transfer, mohon konfirmasi dengan mengirimkan bukti transfer ke chat ini ya Kak. Terima kasih atas komitmen & pelayanannya! Tuhan Yesus memberkati 🙏🔥";

        return 'https://wa.me/' . $phone . '?text=' . urlencode($pesan);
    }
}
