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

    /**
     * Konfigurasi label, warna badge, dan icon kategori pengeluaran
     */
    public function getCategoryInfoAttribute(): array
    {
        $cat = strtolower(trim($this->category ?? 'operasional'));

        $icon = match (true) {
            str_contains($cat, 'konsumsi') => 'fa-utensils',
            str_contains($cat, 'acara') || str_contains($cat, 'revival') => 'fa-calendar-star',
            str_contains($cat, 'logistik') || str_contains($cat, 'perlengkapan') => 'fa-boxes-stacked',
            str_contains($cat, 'multimedia') || str_contains($cat, 'desain') || str_contains($cat, 'sosmed') => 'fa-photo-film',
            str_contains($cat, 'musik') || str_contains($cat, 'sound') => 'fa-guitar',
            str_contains($cat, 'modal') || str_contains($cat, 'usaha') || str_contains($cat, 'danus') => 'fa-bag-shopping',
            str_contains($cat, 'transport') || str_contains($cat, 'operasional') => 'fa-van-shuttle',
            str_contains($cat, 'diakonia') || str_contains($cat, 'kasih') => 'fa-hand-holding-heart',
            default => 'fa-receipt',
        };

        $label = match (true) {
            str_contains($cat, 'konsumsi') => 'Konsumsi',
            str_contains($cat, 'acara') || str_contains($cat, 'revival') => 'Acara & Revival',
            str_contains($cat, 'logistik') || str_contains($cat, 'perlengkapan') => 'Logistik & Perlengkapan',
            str_contains($cat, 'multimedia') || str_contains($cat, 'desain') || str_contains($cat, 'sosmed') => 'Multimedia & Desain',
            str_contains($cat, 'musik') || str_contains($cat, 'sound') => 'Musik & Sound System',
            str_contains($cat, 'modal') || str_contains($cat, 'usaha') || str_contains($cat, 'danus') => 'Modal Dana Usaha',
            str_contains($cat, 'transport') || str_contains($cat, 'operasional') => 'Operasional & Transport',
            str_contains($cat, 'diakonia') || str_contains($cat, 'kasih') => 'Diakonia & Kasih',
            default => $this->category ?: 'Pengeluaran Umum',
        };

        return [
            'label' => $label,
            'bg' => 'rgba(255, 255, 255, 0.05)',
            'border' => 'rgba(255, 255, 255, 0.1)',
            'color' => '#CBD5E1',
            'icon' => $icon,
        ];
    }

    /**
     * URL Bukti Struk/Kwitansi
     */
    public function getReceiptUrlAttribute(): ?string
    {
        if (!$this->receipt_image) {
            return null;
        }

        if (str_starts_with($this->receipt_image, 'http')) {
            return $this->receipt_image;
        }

        if (str_starts_with($this->receipt_image, 'uploads/')) {
            return asset($this->receipt_image);
        }

        if (file_exists(public_path('uploads/cash_receipts/' . basename($this->receipt_image)))) {
            return asset('uploads/cash_receipts/' . basename($this->receipt_image));
        }

        if (file_exists(public_path('storage/' . $this->receipt_image))) {
            return asset('storage/' . $this->receipt_image);
        }

        return asset('uploads/cash_receipts/' . basename($this->receipt_image));
    }
}
