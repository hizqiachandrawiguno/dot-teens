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
        $member = new Member();
        $member->name = $request->name;
        $member->phone_number = $request->phone_number;
        $member->birth_date = $request->birth_date;
        $member->address = $request->address;

        // Auto-Assign (Menentukan Cool berdasarkan Tahun Lahir)
        $year = date('Y', strtotime($request->birth_date));
        $cell = 'Lainnya';
        
        if ($year == 2007) { $cell = 'Jireh'; }
        elseif ($year == 2008) { $cell = 'Growing Generation (G.G)'; }
        elseif ($year == 2009) { $cell = 'The Lions'; }
        elseif ($year == 2010 || $year == 2011) { $cell = 'Gen 2010-2011 (Perlu Diplot)'; } // Karena ada 4 Gen, admin perlu ploting manual nanti
        elseif ($year == 2012) { $cell = 'Hoshiah Zion'; }
        elseif ($year >= 2013) { $cell = 'Salvation'; }

        $member->cell_name = $cell;
        $member->is_joined = false; // Default: Belum masuk grup
        $member->save();

        return redirect('/#join')->with('success', 'Puji Tuhan! Datamu berhasil dikirim. Kamu akan segera dihubungi oleh Leader Cell kamu!');
    }
}