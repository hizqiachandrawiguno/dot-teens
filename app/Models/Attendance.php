<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Buka gembok agar kolom ini bisa diisi dari form website
    protected $fillable = [
        'member_id',
        'attendance_date',
        'status'
    ];

    // Relasi balik: Setiap 1 Absensi adalah milik 1 Jemaat (Member)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}