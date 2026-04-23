<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\User;
use App\Models\CellSchedule;

class AdminController extends Controller
{
    public function dashboard() 
    {
        $user = auth()->user();

        // 1. CEK BERDASARKAN "ROLE" ASLI DI DATABASE
        if ($user->role == 'div_pastoral') {
            // Langsung otomatis arahkan ke Ruang Pastoral
            return redirect('/admin/pastoral');
        }

        // 2. JIKA YANG LOGIN SUPER ADMIN ATAU DIVISI LAIN
        $members = Member::all();
        $cellSchedules = CellSchedule::all();
        $galleries = Gallery::latest()->get(); 
        
        $stats = [
            'total_jemaat' => $members->count(),
            'total_event' => Event::count(),
            'total_foto' => $galleries->count(),
            'pending_users' => User::where('status', 'pending')->get()
        ];

        // CEK BERDASARKAN "ROLE" ASLI DI DATABASE
        if ($user->role == 'div_pastoral') {
            return redirect('/admin/pastoral');
        }

        // TAMBAHKAN INI: Jika yang login Divisi Prayer
        if ($user->role == 'div_prayer') {
            return redirect('/admin/prayer');
        }
        
        return view('admin.dashboard', compact('user', 'stats', 'cellSchedules', 'members', 'galleries'));
    }

    // --- FUNGSI SUPER ADMIN: APPROVE / REJECT AKUN ---
    public function approveUser($id) {
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();
        return back()->with('success', "Akun {$user->name} berhasil disetujui!");
    }

    public function rejectUser($id) {
        User::findOrFail($id)->delete(); // Langsung hapus akun yang ditolak
        return back()->with('success', 'Akun berhasil ditolak dan dihapus!');
    }

    // --- FUNGSI DIVISI CELL: UPDATE STATUS JEMAAT ---
    public function updateStatus($id)
    {
        $member = Member::findOrFail($id);
        $member->is_joined = !$member->is_joined;
        $member->save();

        return redirect()->back()->with('success', 'Status grup Cell berhasil diubah!');
    }

    // --- FUNGSI DIVISI SOSMED: UPLOAD FOTO ---
    public function storeGallery(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'drive_link' => 'nullable|url', // [BARU] Pastikan yang diinput benar-benar link URL, tapi boleh dikosongkan (nullable)
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads/gallery'), $imageName);

        Gallery::create([
            'title' => $request->title,
            'image' => $imageName,
            'drive_link' => $request->drive_link, // [BARU] Menangkap link G-Drive dari form dan menyimpannya
        ]);

        return back()->with('success', 'Foto dan Link Google Drive berhasil diunggah!');
    }

    // --- FUNGSI DIVISI SOSMED: HAPUS FOTO ---
    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Hapus file fisik dari dalam folder (jika ada)
        $imagePath = public_path('uploads/gallery/' . $gallery->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data dari database
        $gallery->delete();

        return back()->with('success', 'Foto berhasil dihapus dari Galeri!');
    }

    // --- FUNGSI DIVISI ACARA: BUAT EVENT BARU ---
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'location' => 'required',
        ]);

        Event::create($request->all());

        return back()->with('success', 'Acara baru berhasil ditambahkan!');
    }

    // --- FUNGSI EDIT ACARA (Tampilkan Form Edit) ---
    public function editEvent($id)
    {
        $event = Event::findOrFail($id);
        $user = auth()->user();
        return view('admin.edit-event', compact('event', 'user'));
    }

    // --- FUNGSI UPDATE ACARA (Simpan Perubahan) ---
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'location' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect('/admin/dashboard')->with('success', 'Acara berhasil diperbarui!');
    }

    // --- FUNGSI HAPUS ACARA ---
    public function deleteEvent($id)
    {
        Event::findOrFail($id)->delete();
        return back()->with('success', 'Acara berhasil dihapus dari sistem!');
    }

    // --- FUNGSI DIVISI CELL: JADWAL ---
    public function storeCellSchedule(Request $request) {
        $request->validate(['cell_group_name' => 'required', 'meeting_date' => 'required|date', 'meeting_time' => 'required', 'location' => 'required']);
        CellSchedule::create($request->all());
        return back()->with('success', 'Jadwal Cell berhasil dipublikasikan!');
    }

    public function editCellSchedule($id) {
        $schedule = CellSchedule::findOrFail($id);
        $user = auth()->user();
        return view('admin.edit-cell', compact('schedule', 'user'));
    }

    public function updateCellSchedule(Request $request, $id) {
        $schedule = CellSchedule::findOrFail($id);
        $schedule->update($request->all());
        return redirect('/admin/dashboard')->with('success', 'Jadwal Cell berhasil diperbarui!');
    }

    public function deleteCellSchedule($id) {
        CellSchedule::findOrFail($id)->delete();
        return back()->with('success', 'Jadwal Cell berhasil dihapus!');
    }

    public function pastoralDashboard(Request $request)
    {
        $user = auth()->user();
        $query = \App\Models\Member::query();

        // Fitur Pencarian Nama
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $members = $query->orderBy('name', 'asc')->get();
        
        // TAMBAHAN BARU: Variabel untuk jemaat yang butuh kunjungan.
        // Untuk sementara kita isi kosong (collect) agar halaman tidak error.
        // Nanti bisa kita atur logikanya (misal: jemaat yang 3 minggu berturut-turut tidak absen).
        $needsVisitation = collect();

        // Kirim semua datanya ke view
        return view('admin.pastoral', compact('user', 'members', 'needsVisitation'));
    }

    // --- FUNGSI UNTUK MENYIMPAN DATA ABSENSI JEMAAT ---
    public function saveAttendance(Request $request)
    {
        $date = date('Y-m-d'); // Tanggal ibadah hari ini

        // PENGAMAN 1: Cek apakah ada jemaat yang dicentang.
        // Jika tidak ada yang dicentang, jangan jalankan query database.
        if (!$request->has('attendance') || empty($request->attendance)) {
            return back()->with('error', 'Pilih minimal satu jemaat yang hadir sebelum menyimpan.');
        }

        // PENGAMAN 2: Gunakan Transaction agar data aman jika terjadi error di tengah jalan
        \DB::transaction(function () use ($request, $date) {
            // Hapus data absen lama di tanggal yang sama agar tidak duplikat
            \DB::table('attendances')->where('attendance_date', $date)->delete();

            // Simpan data baru
            foreach ($request->attendance as $member_id) {
                \DB::table('attendances')->insert([
                    'member_id'       => $member_id,
                    'attendance_date' => $date, // Memastikan tanggal terisi otomatis
                    'created_at'      => now(),
                    'updated_at'      => now()
                ]);
            }
        });

        return back()->with('success', 'Data kehadiran jemaat berhasil diperbarui!');
    }

public function storeAttendance(Request $request)
{
    $date = $request->attendance_date ?? now()->toDateString();
    
    foreach ($request->members as $memberId => $status) {
        if ($status == 'hadir') {
            \App\Models\Attendance::updateOrCreate(
                ['member_id' => $memberId, 'attendance_date' => $date],
                ['status' => 'hadir']
            );
        }
    }

    return back()->with('success', 'Absensi berhasil dicatat!');
}
public function importCsv(Request $request)
    {
        // 1. Validasi file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), "r");
        
        // 2. Lewati baris pertama (Header / Judul Kolom di Spreadsheet)
        $header = fgetcsv($handle);
        
        $importedCount = 0;
        
        // 3. Looping untuk membaca data baris demi baris
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            // Lewati jika baris kosong atau baris pertama (Header)
            if (empty(trim($row[0])) || trim($row[0]) == 'Nama Lengkap') continue;

            $name = trim($row[0]);
            $phone = (isset($row[1]) && trim($row[1]) !== '') ? trim($row[1]) : '-';
            
            $birth = '2000-01-01'; // Default
            if (isset($row[2]) && trim($row[2]) !== '') {
                // Konversi tanggal, kadang format Excel MM/DD/YYYY atau DD/MM/YYYY
                $birth = date('Y-m-d', strtotime(str_replace('/', '-', trim($row[2]))));
            }

            // Ambil data-data baru sesuai urutan kolom di CSV
            $address      = (isset($row[3]) && trim($row[3]) !== '') ? trim($row[3]) : null;
            $fire_cell    = (isset($row[4]) && trim($row[4]) !== '') ? trim($row[4]) : null;
            $hobby        = (isset($row[5]) && trim($row[5]) !== '') ? trim($row[5]) : null;
            $instagram    = (isset($row[6]) && trim($row[6]) !== '') ? trim($row[6]) : null;
            $email        = (isset($row[7]) && trim($row[7]) !== '') ? trim($row[7]) : null;
            $parent_name  = (isset($row[8]) && trim($row[8]) !== '') ? trim($row[8]) : null;
            $parent_phone = (isset($row[9]) && trim($row[9]) !== '') ? trim($row[9]) : null;
            $school       = (isset($row[10]) && trim($row[10]) !== '') ? trim($row[10]) : null;

            // Masukkan ke database
            \App\Models\Member::updateOrCreate(
                ['name' => $name], 
                [
                    'phone_number' => $phone,
                    'birth_date'   => $birth,
                    'address'      => $address,
                    'fire_cell'    => $fire_cell,
                    'hobby'        => $hobby,
                    'instagram'    => $instagram,
                    'email'        => $email,
                    'parent_name'  => $parent_name,
                    'parent_phone' => $parent_phone,
                    'school'       => $school,
                    'is_joined'    => $fire_cell ? true : false,
                ]
            );
            
            $importedCount++;
        }
        
        fclose($handle);

        return back()->with('success', "$importedCount data jemaat berhasil di-import dari Spreadsheet!");
    }

    // --- FUNGSI UNTUK MELIHAT REKAP ABSENSI PASTORAL ---
    public function attendanceRecap(Request $request)
    {
        $user = auth()->user();
        
        // 1. Ambil semua daftar tanggal ibadah yang sudah ada absensinya
        $dates = \DB::table('attendances')
            ->select('attendance_date')
            ->distinct()
            ->orderBy('attendance_date', 'desc')
            ->pluck('attendance_date');

        // 2. Cek tanggal berapa yang mau dilihat (Default: Tanggal paling terbaru)
        $selectedDate = $request->filter_date ?? ($dates->first() ?? date('Y-m-d'));

        // 3. Ambil data jemaat yang hadir HANYA di tanggal yang dipilih
        $attendees = \DB::table('attendances')
            ->join('members', 'attendances.member_id', '=', 'members.id')
            ->where('attendances.attendance_date', $selectedDate)
            ->select('members.name', 'members.phone_number', 'members.fire_cell')
            ->orderBy('members.name', 'asc')
            ->get();

        return view('admin.recap', compact('user', 'dates', 'selectedDate', 'attendees'));
    }

    // --- FUNGSI UNTUK MERESET (MENGHAPUS) ABSENSI DI TANGGAL TERTENTU PASTORAL ---
    public function resetAttendance(Request $request)
    {
        $request->validate([
            'reset_date' => 'required|date'
        ]);

        // Hapus semua data absensi pada tanggal yang dipilih
        \DB::table('attendances')->where('attendance_date', $request->reset_date)->delete();

        return redirect('/admin/pastoral/recap')->with('success', 'Data absensi pada tanggal ' . date('d F Y', strtotime($request->reset_date)) . ' berhasil di-reset (dihapus).');
    }

    // --- FUNGSI UNTUK MENGHIDUPKAN/MEMATIKAN FORM JEMAAT PASTORAL ---
    public function toggleJoinForm()
    {
        $path = storage_path('app/form_status.txt');
        $current = file_exists($path) ? file_get_contents($path) : '1'; // Default 1 (Buka)
        $newStatus = ($current == '1') ? '0' : '1';
        
        // Simpan status baru ke dalam file
        file_put_contents($path, $newStatus);
        
        $msg = $newStatus == '1' ? 'Saklar dihidupkan! Form Jemaat Baru SEKARANG DIBUKA!' : 'Saklar dimatikan! Form Jemaat Baru SEKARANG DITUTUP!';
        return back()->with('success', $msg);
    }

    // --- FUNGSI UNTUK MENGHAPUS DATA JEMAAT PASTORAL ---
    public function deleteMember($id)
    {
        $member = \App\Models\Member::findOrFail($id);
        $name = $member->name;
        
        // Hapus datanya dari database (Riwayat absennya juga akan otomatis terhapus)
        $member->delete();

        return back()->with('success', "Data jemaat bernama {$name} berhasil dihapus dari sistem.");
    }

    // --- FUNGSI DIVISI PRAYER ---
    public function prayerDashboard(Request $request)
    {
        $user = auth()->user();
        
        $query = \App\Models\PrayerRequest::query();

        // 1. LOGIKA FILTER TANGGAL
        if ($request->has('start_date') && $request->has('end_date') && $request->start_date != '' && $request->end_date != '') {
            $query->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
        }

        // Clone query agar filter berlaku untuk ketiga kolom
        $pendingPrayers = (clone $query)->where('status', 'menunggu')->latest()->get();
        $prayingPrayers = (clone $query)->where('status', 'didoakan')->latest()->get();
        $answeredPrayers = (clone $query)->where('status', 'terjawab')->latest()->get();

        return view('admin.prayer', compact('user', 'pendingPrayers', 'prayingPrayers', 'answeredPrayers'));
    }

    // 2. LOGIKA DOWNLOAD CSV
    public function downloadPrayer(Request $request)
    {
        $query = \App\Models\PrayerRequest::query();
        
        // Terapkan filter yang sama saat didownload
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
        }
        $prayers = $query->latest()->get();
        
        $filename = "Data_Doa_DOT_" . date('d-m-Y') . ".csv";
        $handle = fopen('php://output', 'w');
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        // Header Kolom Excel
        fputcsv($handle, ['Tanggal Masuk', 'Nama Jemaat', 'Pokok Doa', 'Status']); 
        
        foreach($prayers as $prayer) {
            fputcsv($handle, [
                $prayer->created_at->format('d/m/Y H:i'),
                $prayer->name ?? 'Anonim',
                $prayer->topic,
                strtoupper($prayer->status)
            ]);
        }
        fclose($handle);
        exit;
    }

    // 3. LOGIKA RESET (HAPUS SEMUA DATA)
    public function resetPrayer()
    {
        // Truncate akan menghapus semua isi tabel dan mereset ID kembali ke 1
        \App\Models\PrayerRequest::truncate(); 
        return redirect('/admin/prayer')->with('success', 'Semua data pokok doa berhasil dihapus. Siap untuk doa bulan ini!');
    }

    public function updatePrayerStatus($id, $status)
    {
        $prayer = \App\Models\PrayerRequest::findOrFail($id);
        $prayer->status = $status;
        $prayer->save();
        return back()->with('success', 'Status dukungan doa berhasil diperbarui!');
    }

    // --- FUNGSI UNTUK JEMAAT KIRIM DOA DARI HALAMAN DEPAN ---
    public function storePrayerPublic(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:1000',
        ]);

        \App\Models\PrayerRequest::create([
            'name' => $request->name ?? 'Hamba Tuhan', // Jika nama kosong, otomatis "Hamba Tuhan"
            'topic' => $request->topic,
            'status' => 'menunggu'
        ]);

        return back()->with('prayer_success', 'Pokok doa Anda sudah kami terima. Tim Prayer DOT akan segera mendoakan pergumulan Anda.');
    }
}