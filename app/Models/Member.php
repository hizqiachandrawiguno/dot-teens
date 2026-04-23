<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'phone_number', 'birth_date', 'address', 'phone', 'is_joined',
        'fire_cell', 'hobby', 'instagram', 'email', 'parent_name', 'parent_phone', 'school'
    ];

    // Tambahkan di dalam class Member
public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

// Fungsi untuk cek jemaat yang tidak hadir lebih dari 3 minggu
public function getNeedsVisitationAttribute()
{
    $lastAttendance = $this->attendances()->orderBy('attendance_date', 'desc')->first();
    
    if (!$lastAttendance) return true; // Belum pernah absen sama sekali
    
    return \Carbon\Carbon::parse($lastAttendance->attendance_date)->diffInWeeks(now()) >= 3;
}
}
