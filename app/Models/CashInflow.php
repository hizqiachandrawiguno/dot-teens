<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashInflow extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'amount',
        'received_date',
        'payer_name',
        'phone',
        'payment_method',
        'notes',
        'proof_image',
        'recorded_by',
    ];

    protected $casts = [
        'amount' => 'integer',
        'received_date' => 'date',
    ];

    /**
     * Konfigurasi label, warna, dan ikon berdasarkan kategori
     */
    public function getCategoryInfoAttribute(): array
    {
        return match ($this->category) {
            'dana_usaha' => [
                'label' => 'Dana Usaha',
                'bg' => 'rgba(59, 130, 246, 0.18)',
                'border' => 'rgba(59, 130, 246, 0.4)',
                'color' => '#60A5FA',
                'icon' => 'fa-store',
            ],
            'janji_iman' => [
                'label' => 'Janji Iman',
                'bg' => 'rgba(168, 85, 247, 0.18)',
                'border' => 'rgba(168, 85, 247, 0.4)',
                'color' => '#C084FC',
                'icon' => 'fa-hand-holding-heart',
            ],
            'donatur' => [
                'label' => 'Dana Donatur',
                'bg' => 'rgba(16, 185, 129, 0.18)',
                'border' => 'rgba(16, 185, 129, 0.4)',
                'color' => '#34D399',
                'icon' => 'fa-circle-dollar-to-slot',
            ],
            default => [
                'label' => 'Pemasukan Lainnya',
                'bg' => 'rgba(148, 163, 184, 0.18)',
                'border' => 'rgba(148, 163, 184, 0.4)',
                'color' => '#CBD5E1',
                'icon' => 'fa-coins',
            ],
        };
    }

    /**
     * Label metode pembayaran
     */
    public function getPaymentMethodBadgeAttribute(): array
    {
        return match ($this->payment_method) {
            'transfer' => [
                'label' => 'Transfer Bank',
                'class' => 'badge-transfer',
                'icon' => 'fa-building-columns',
            ],
            'cash' => [
                'label' => 'Tunai / Cash',
                'class' => 'badge-cash',
                'icon' => 'fa-money-bill-wave',
            ],
            'qris' => [
                'label' => 'QRIS',
                'class' => 'badge-qris',
                'icon' => 'fa-qrcode',
            ],
            default => [
                'label' => strtoupper($this->payment_method ?? 'CASH'),
                'class' => 'badge-secondary',
                'icon' => 'fa-receipt',
            ],
        };
    }

    /**
     * URL Bukti Transfer / Kwitansi
     */
    public function getProofUrlAttribute(): ?string
    {
        if (!$this->proof_image) {
            return null;
        }

        if (str_starts_with($this->proof_image, 'http')) {
            return $this->proof_image;
        }

        if (str_starts_with($this->proof_image, 'uploads/')) {
            return asset($this->proof_image);
        }

        if (file_exists(public_path('uploads/cash_inflows/' . basename($this->proof_image)))) {
            return asset('uploads/cash_inflows/' . basename($this->proof_image));
        }

        if (file_exists(public_path('storage/' . $this->proof_image))) {
            return asset('storage/' . $this->proof_image);
        }

        return asset('uploads/cash_inflows/' . basename($this->proof_image));
    }
}
