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

        Member::create([
            'name'         => $request->name,
            'phone_number' => $request->phone_number,
            'birth_date'   => $request->birth_date,
            'address'      => $request->address,
            'fire_cell'    => $request->fire_cell,
            'hobby'        => $request->hobby,
            'instagram'    => $request->instagram,
            'email'        => $request->email,
            'parent_name'  => $request->parent_name,
            'parent_phone' => $request->parent_phone,
            'school'       => $request->school,
            'is_joined'    => $request->fire_cell ? true : false, // Jika langsung isi fire cell, is_joined = true
        ]);

        return back()->with('join_success', 'Yey! Pendaftaran berhasil. Tim Pastoral DOT akan segera menghubungi kamu. Welcome to the family!');
    }
}