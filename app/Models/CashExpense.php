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

        return match (true) {
            str_contains($cat, 'konsumsi') => [
                'label' => 'Konsumsi',
                'bg' => 'rgba(249, 115, 22, 0.18)',
                'border' => 'rgba(249, 115, 22, 0.4)',
                'color' => '#FB923C',
                'icon' => 'fa-utensils',
            ],
            str_contains($cat, 'acara') || str_contains($cat, 'revival') => [
                'label' => 'Acara & Revival',
                'bg' => 'rgba(236, 72, 153, 0.18)',
                'border' => 'rgba(236, 72, 153, 0.4)',
                'color' => '#F472B6',
                'icon' => 'fa-calendar-star',
            ],
            str_contains($cat, 'logistik') || str_contains($cat, 'perlengkapan') => [
                'label' => 'Logistik & Perlengkapan',
                'bg' => 'rgba(14, 165, 233, 0.18)',
                'border' => 'rgba(14, 165, 233, 0.4)',
                'color' => '#38BDF8',
                'icon' => 'fa-boxes-stacked',
            ],
            str_contains($cat, 'multimedia') || str_contains($cat, 'desain') || str_contains($cat, 'sosmed') => [
                'label' => 'Multimedia & Desain',
                'bg' => 'rgba(168, 85, 247, 0.18)',
                'border' => 'rgba(168, 85, 247, 0.4)',
                'color' => '#C084FC',
                'icon' => 'fa-photo-film',
            ],
            str_contains($cat, 'musik') || str_contains($cat, 'sound') => [
                'label' => 'Musik & Sound System',
                'bg' => 'rgba(234, 179, 8, 0.18)',
                'border' => 'rgba(234, 179, 8, 0.4)',
                'color' => '#FACC15',
                'icon' => 'fa-guitar',
            ],
            str_contains($cat, 'modal') || str_contains($cat, 'usaha') || str_contains($cat, 'danus') => [
                'label' => 'Modal Dana Usaha',
                'bg' => 'rgba(59, 130, 246, 0.18)',
                'border' => 'rgba(59, 130, 246, 0.4)',
                'color' => '#60A5FA',
                'icon' => 'fa-bag-shopping',
            ],
            str_contains($cat, 'transport') || str_contains($cat, 'operasional') => [
                'label' => 'Operasional & Transport',
                'bg' => 'rgba(20, 184, 166, 0.18)',
                'border' => 'rgba(20, 184, 166, 0.4)',
                'color' => '#2DD4BF',
                'icon' => 'fa-van-shuttle',
            ],
            str_contains($cat, 'diakonia') || str_contains($cat, 'kasih') => [
                'label' => 'Diakonia & Kasih',
                'bg' => 'rgba(244, 63, 94, 0.18)',
                'border' => 'rgba(244, 63, 94, 0.4)',
                'color' => '#FB7185',
                'icon' => 'fa-hand-holding-heart',
            ],
            default => [
                'label' => $this->category ?: 'Pengeluaran Umum',
                'bg' => 'rgba(148, 163, 184, 0.18)',
                'border' => 'rgba(148, 163, 184, 0.4)',
                'color' => '#CBD5E1',
                'icon' => 'fa-receipt',
            ],
        };
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
