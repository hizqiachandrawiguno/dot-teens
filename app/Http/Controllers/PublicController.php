<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;

class PublicController extends Controller
{
    // Fungsi untuk menampilkan halaman About Us
    public function about()
    {
        // 1. Ambil data dari database dulu (hanya Super Admin dan Divisi Cell)
        $team = \App\Models\User::whereIn('role', ['super_admin', 'div_cell'])->get();

        // 2. Urutkan datanya menggunakan fitur Collection PHP
        // (Super Admin dikasih prioritas angka 1 agar muncul paling atas)
        $team = $team->sortBy(function ($user) {
            return $user->role === 'super_admin' ? 1 : 2;
        });

        // 3. Kirim data tim ke file tampilan 'about.blade.php'
        return view('about', compact('team'));
    }

    public function storeMember(Request $request)
    {
        // Satpam Pengecek Status Form
        $path = storage_path('app/form_status.txt');
        $status = file_exists($path) ? file_get_contents($path) : '1';
        
        if ($status == '0') {
            return back()->with('error', 'Mohon maaf, pendaftaran jemaat baru saat ini sedang ditutup. Silakan hubungi admin.');
        }

        $request->validate([
            'name'         => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'birth_date'   => 'required|date',
            // Kolom lainnya opsional
        ]);

        $cleanPhone = preg_replace('/[^0-9]/', '', $request->phone_number);
        if (str_starts_with($cleanPhone, '62')) {
            $cleanPhone = substr($cleanPhone, 2);
        } elseif (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = substr($cleanPhone, 1);
        }
        $formattedPhone = '+62' . $cleanPhone;

        $parentPhone = null;
        if ($request->filled('parent_phone')) {
            $cleanParent = preg_replace('/[^0-9]/', '', $request->parent_phone);
            if (str_starts_with($cleanParent, '62')) {
                $cleanParent = substr($cleanParent, 2);
            } elseif (str_starts_with($cleanParent, '0')) {
                $cleanParent = substr($cleanParent, 1);
            }
            $parentPhone = '+62' . $cleanParent;
        }

        Member::create([
            'name'         => $request->name,
            'phone_number' => $formattedPhone,
            'birth_date'   => $request->birth_date,
            'address'      => $request->address,
            'fire_cell'    => $request->fire_cell,
            'hobby'        => $request->hobby,
            'instagram'    => $request->instagram,
            'email'        => $request->email,
            'parent_name'  => $request->parent_name,
            'parent_phone' => $parentPhone,
            'school'       => $request->school,
            'is_joined'    => $request->fire_cell ? true : false, // Jika langsung isi fire cell, is_joined = true
        ]);

        return back()->with('join_success', 'Yey! Pendaftaran berhasil. Tim Pastoral DOT akan segera menghubungi kamu. Welcome to the family!');
    }
}