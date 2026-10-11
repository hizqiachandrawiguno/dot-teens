<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashVolunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_id',
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

    public function member()
    {
        return $this->belongsTo(Member::class);
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
     * Hitung detail status pembayaran untuk periode tertentu
     */
    public function getPeriodDetail($period)
    {
        $payment = $this->payments->firstWhere('cash_period_id', $period->id);
        $amountPaid = $payment ? (int)$payment->amount_paid : 0;
        $targetAmount = (int)$period->amount;
        $weeksCount = $period->weeks_count ?: ($targetAmount >= 25000 ? 5 : 4);
        $weeklyRate = $weeksCount > 0 ? (int)round($targetAmount / $weeksCount) : 5000;
        $weeksPaid = $weeklyRate > 0 ? min($weeksCount, (int)floor($amountPaid / $weeklyRate)) : 0;
        $remaining = max(0, $targetAmount - $amountPaid);

        $status = 'belum';
        if ($amountPaid >= $targetAmount) {
            $status = 'lunas';
        } elseif ($amountPaid > 0) {
            $status = 'sebagian';
        }

        return (object)[
            'payment' => $payment,
            'amount_paid' => $amountPaid,
            'target_amount' => $targetAmount,
            'weeks_count' => $weeksCount,
            'weeks_paid' => $weeksPaid,
            'weekly_rate' => $weeklyRate,
            'remaining' => $remaining,
            'status' => $status,
        ];
    }

    /**
     * Dapatkan periode-periode yang masih memiliki sisa tunggakan
     */
    public function getUnpaidPeriods($allPeriods)
    {
        return $allPeriods->filter(function ($period) {
            return $this->getPeriodDetail($period)->remaining > 0;
        });
    }

    /**
     * Hitung total sisa tunggakan keseluruhan periode aktif
     */
    public function getTotalTunggakan($allPeriods): int
    {
        return (int) $allPeriods->sum(function ($period) {
            return $this->getPeriodDetail($period)->remaining;
        });
    }

    /**
     * Generate URL One-Click WhatsApp dengan template pesan ramah per anak
     */
    public function generateWaLink($unpaidPeriods, $bankInfo = null)
    {
        $phone = $this->formatted_phone;
        if (empty($phone)) {
            return '#';
        }

        $detailsList = [];
        $totalAmount = 0;

        foreach ($unpaidPeriods as $period) {
            $detail = $this->getPeriodDetail($period);
            $sisaNominal = 'Rp ' . number_format($detail->remaining, 0, ',', '.');
            if ($detail->weeks_paid > 0) {
                $keterangan = "{$period->name}: Sisa {$sisaNominal} (terbayar {$detail->weeks_paid}/{$detail->weeks_count} mgg)";
            } else {
                $keterangan = "{$period->name}: {$sisaNominal} ({$detail->weeks_count} minggu)";
            }
            $detailsList[] = "• " . $keterangan;
            $totalAmount += $detail->remaining;
        }

        $periodListText = !empty($detailsList) ? implode("\n", $detailsList) : "Semua periode lunas";
        $nominalFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');
        $rekeningText = $bankInfo ?: "BCA 6390086774 a.n Hizqia Chandra Wiguno";

        $pesan = "Shalom {$this->name}! 👋✨\n"
               . "Semoga harimu menyenangkan dan selalu diberkati Tuhan Yesus.\n\n"
               . "Mengingatkan untuk iuran kas *DOT Teens* (wajib Rp 5.000/minggu):\n"
               . "📌 *Rincian Tunggakan Kas:*\n"
               . "{$periodListText}\n\n"
               . "💰 *Total Yang Harus Dibayar:* *{$nominalFormatted}*\n\n"
               . "Bisa diserahkan tunai ke Bendahara saat ibadah atau transfer melalui:\n"
               . "💳 *{$rekeningText}*\n\n"
               . "Jika sudah transfer, mohon konfirmasi dengan mengirimkan bukti transfer ke chat ini ya. Terima kasih atas komitmennya! Tuhan Yesus memberkati 🙏🔥";

        return 'https://wa.me/' . $phone . '?text=' . urlencode($pesan);
    }
}
