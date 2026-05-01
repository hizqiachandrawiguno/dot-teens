<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    // --- 1. FUNGSI MENAMPILKAN HALAMAN ADMIN & FILTER ---
    public function index(Request $request)
    {
        $query = Member::query();

        // Jika Admin memilih filter Cool
        if ($request->filled('cell')) {
            $query->where('cell_name', $request->cell);
        }

        // Ambil data terbaru
        $members = $query->orderBy('created_at', 'desc')->get();
        
        // Ambil daftar nama Cool yang ada di database untuk menu Dropdown
        $cells = Member::select('cell_name')->whereNotNull('cell_name')->distinct()->pluck('cell_name');

        return view('admin', compact('members', 'cells'));
    }

    // --- 2. FUNGSI UBAH STATUS SUDAH/BELUM MASUK CELL ---
    public function updateStatus($id)
    {
        $member = Member::findOrFail($id);
        $member->is_joined = !$member->is_joined; // Membalik status (True jadi False, False jadi True)
        $member->save();

        return redirect()->back()->with('success', 'Status grup Cell berhasil diubah!');
    }

    // --- 3. FUNGSI MENYIMPAN DATA DARI HALAMAN DEPAN ---
    public function store(Request $request)
    {
        // === TAMBAHAN BARU: SISTEM VALIDASI WAJIB ISI ===
        // Sistem akan mengecek apakah data yang wajib sudah diisi. Jika belum, akan otomatis kembali ke form.
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'birth_date' => 'required|date',
            'address' => 'required|string', // KUNCI UTAMA: Alamat sekarang sifatnya WAJIB (Required)
            // Data di bawah ini bersifat opsional (nullable)
            'email' => 'nullable|email',
            'instagram' => 'nullable|string',
            'hobby' => 'nullable|string',
            'parent_name' => 'nullable|string',
            'parent_phone' => 'nullable|numeric',
            'school' => 'nullable|string',
            'fire_cell' => 'nullable|string',
        ]);

        $member = new Member();
        
        // Menyimpan Data Utama
        $member->name = $request->name;
        $member->phone_number = $request->phone_number;
        $member->birth_date = $request->birth_date;
        $member->address = $request->address;
        
        // Menyimpan Data Tambahan yang baru kita tambahkan di form
        $member->email = $request->email;
        $member->instagram = $request->instagram;
        $member->hobby = $request->hobby;
        $member->parent_name = $request->parent_name;
        $member->parent_phone = $request->parent_phone;
        $member->school = $request->school;
        $member->fire_cell = $request->fire_cell; // Walau di form namanya fire_cell, sistem kita sebelumnya pakai cell_name. Di bawah ini kita override.

        // Auto-Assign (Menentukan Cool berdasarkan Tahun Lahir)
        $year = date('Y', strtotime($request->birth_date));
        $cell = 'Lainnya';
        
        if ($year == 2007) { $cell = 'Jireh'; }
        elseif ($year == 2008) { $cell = 'Growing Generation (G.G)'; }
        elseif ($year == 2009) { $cell = 'The Lions'; }
        elseif ($year == 2010 || $year == 2011) { $cell = 'Gen 2010-2011 (Perlu Diplot)'; } 
        elseif ($year == 2012) { $cell = 'Hoshiah Zion'; }
        elseif ($year >= 2013) { $cell = 'Salvation'; }

        // Jika dia sudah nulis asal fire_cell-nya di form, kita pakai itu. Kalau kosong, pakai hasil Auto-Assign.
        $member->cell_name = $request->fire_cell ? $request->fire_cell : $cell;
        
        $member->is_joined = false; // Default: Belum masuk grup
        $member->save();

        return redirect('/#join')->with('join_success', 'Puji Tuhan! Datamu berhasil dikirim. Kamu akan segera dihubungi oleh Leader Cell kamu!');
    }
}