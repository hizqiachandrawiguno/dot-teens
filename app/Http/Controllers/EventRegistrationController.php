<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class EventRegistrationController extends Controller
{
    /**
     * Pastikan tabel event_registrations tersedia di database server live
     */
    private function ensureTableExists()
    {
        if (!Schema::hasTable('event_registrations')) {
            Schema::create('event_registrations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
                $table->string('ticket_code', 30)->unique()->index();
                $table->string('name');
                $table->string('phone');
                $table->string('email')->nullable();
                $table->string('category')->default('SMP');
                $table->string('origin')->nullable();
                $table->string('status', 20)->default('registered');
                $table->timestamp('attended_at')->nullable();
                $table->string('scanned_by')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Cek apakah nama sudah terdaftar secara real-time saat mengisi form
     */
    public function checkName(Request $request)
    {
        $this->ensureTableExists();

        $eventId = $request->event_id;
        $name = trim($request->name ?? '');

        if (!$eventId || mb_strlen($name) < 2) {
            return response()->json(['exists' => false]);
        }

        $existing = EventRegistration::where('event_id', $eventId)
            ->whereRaw('LOWER(name) = ?', [strtolower($name)])
            ->first();

        if ($existing) {
            return response()->json([
                'exists' => true,
                'message' => 'Nama sudah terdaftar',
            ]);
        }

        return response()->json(['exists' => false]);
    }

    /**
     * Pendaftaran Peserta Event (Public via Website)
     */
    public function register(Request $request)
    {
        $this->ensureTableExists();

        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:150',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:150',
            'category' => 'required|string|max:50',
            'origin' => 'nullable|string|max:150',
            'notes' => 'nullable|string|max:500',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'phone.required' => 'Nomor WhatsApp / HP wajib diisi.',
            'category.required' => 'Kategori (SMP/SMA/Umum) wajib dipilih.',
        ]);

        // Normalisasi format nomor WhatsApp agar konsisten berawalan +62
        $digits = preg_replace('/[^0-9]/', '', $request->phone);
        if (str_starts_with($digits, '62')) {
            $digits = substr($digits, 2);
        } elseif (str_starts_with($digits, '0')) {
            $digits = substr($digits, 1);
        }
        $formattedPhone = '+62' . $digits;
        $normalizedName = trim($request->name);

        // 1. Cek apakah NAMA sudah pernah terdaftar di event yang sama
        $existingByName = EventRegistration::where('event_id', $request->event_id)
            ->whereRaw('LOWER(name) = ?', [strtolower($normalizedName)])
            ->first();

        if ($existingByName) {
            $msg = 'Nama sudah terdaftar';

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'status' => 'already_registered',
                    'field' => 'name',
                    'message' => $msg,
                ], 422);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['name' => $msg]);
        }

        // 2. Cek apakah NOMOR WHATSAPP sudah terdaftar di event yang sama
        $existingByPhone = EventRegistration::where('event_id', $request->event_id)
            ->where(function($q) use ($formattedPhone, $digits) {
                $q->where('phone', $formattedPhone)
                  ->orWhere('phone', 'like', '%' . substr($digits, -8));
            })->first();

        if ($existingByPhone) {
            $msg = 'Nomor WhatsApp sudah terdaftar';

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'status' => 'already_registered',
                    'field' => 'phone',
                    'message' => $msg,
                ], 422);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['phone' => $msg]);
        }

        // Generate kode tiket unik format: DRN-XXXXX
        $prefix = 'DRN-';
        do {
            $code = $prefix . strtoupper(Str::random(5));
        } while (EventRegistration::where('ticket_code', $code)->exists());

        $registration = EventRegistration::create([
            'event_id' => $request->event_id,
            'ticket_code' => $code,
            'name' => trim($request->name),
            'phone' => $formattedPhone,
            'email' => $request->email ? trim($request->email) : null,
            'category' => $request->category,
            'origin' => $request->origin ? trim($request->origin) : 'Umum',
            'notes' => $request->notes ?? null,
            'status' => 'registered',
        ]);

        $event = $registration->event;

        $ticketData = [
            'id' => $registration->id,
            'ticket_code' => $registration->ticket_code,
            'name' => $registration->name,
            'phone' => $registration->phone,
            'category' => $registration->category,
            'origin' => $registration->origin,
            'status' => $registration->status,
            'attended_at' => null,
            'event_title' => $event->title,
            'event_date' => date('d M Y', strtotime($event->event_date)),
            'event_time' => ($event->event_waktu ?? $event->event_time ?? '17:30') . ' WIB',
            'event_location' => $event->location,
            'ticket_url' => url('/event/ticket/' . $registration->ticket_code),
        ];

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran Berhasil! Simpan dan tunjukkan E-Tiket ini saat tiba di acara.',
                'ticket' => $ticketData,
            ]);
        }

        return redirect()->route('event.ticket', $registration->ticket_code)
            ->with('success', 'Pendaftaran berhasil! Simpan E-Tiket ini.');
    }

    /**
     * Tampilan E-Ticket Publik
     */
    public function showTicket($ticket_code)
    {
        $this->ensureTableExists();

        $registration = EventRegistration::with('event')
            ->where('ticket_code', $ticket_code)
            ->firstOrFail();

        return view('events.ticket', compact('registration'));
    }

    /**
     * Halaman Scanner Kehadiran Panitia / Usher (Admin)
     */
    public function scannerPage(Request $request, $event_id = null)
    {
        $this->ensureTableExists();

        $events = Event::orderBy('event_date', 'desc')->get();

        if (!$event_id) {
            // Pilih event mendatang terdekat atau event dengan judul Disciples Revival Night
            $selectedEvent = Event::where('title', 'like', '%Revival%')
                ->orWhere('event_date', '>=', now()->toDateString())
                ->orderBy('event_date', 'asc')
                ->first() ?? $events->first();
        } else {
            $selectedEvent = Event::findOrFail($event_id);
        }

        if (!$selectedEvent) {
            return redirect('/admin/dashboard')->with('error', 'Belum ada data event di sistem.');
        }

        $totalRegistered = EventRegistration::where('event_id', $selectedEvent->id)->count();
        $totalAttended = EventRegistration::where('event_id', $selectedEvent->id)->where('status', 'attended')->count();
        $totalPending = $totalRegistered - $totalAttended;

        $recentAttended = EventRegistration::where('event_id', $selectedEvent->id)
            ->where('status', 'attended')
            ->orderBy('attended_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.events.scan', compact(
            'events',
            'selectedEvent',
            'totalRegistered',
            'totalAttended',
            'totalPending',
            'recentAttended'
        ));
    }

    /**
     * API Proses Scan QR Code Kehadiran
     */
    public function processScan(Request $request)
    {
        $this->ensureTableExists();

        $request->validate([
            'ticket_code' => 'required|string',
            'event_id' => 'nullable|exists:events,id',
        ]);

        $code = trim($request->ticket_code);

        // Jika QR Code berisi URL lengkap (cth: https://domain.com/event/ticket/DRN-XXXXX)
        if (preg_match('/ticket\/([A-Za-z0-9\-]+)/', $code, $matches)) {
            $code = $matches[1];
        }

        $query = EventRegistration::with('event')->where('ticket_code', $code);
        if ($request->event_id) {
            $query->where('event_id', $request->event_id);
        }

        $registration = $query->first();

        if (!$registration) {
            return response()->json([
                'success' => false,
                'status' => 'not_found',
                'message' => "Tiket [{$code}] tidak ditemukan dalam database atau bukan untuk event ini!",
            ], 404);
        }

        // Cek jika sudah pernah hadir
        if ($registration->status === 'attended') {
            $attendedTime = $registration->attended_at 
                ? $registration->attended_at->format('H:i:s') . ' WIB' 
                : 'Sebelumnya';
            $scannedBy = $registration->scanned_by ?? 'Panitia';

            return response()->json([
                'success' => false,
                'status' => 'already_attended',
                'message' => "⚠️ Peserta INI SUDAH CHECK-IN pada pukul {$attendedTime} (oleh: {$scannedBy})!",
                'participant' => [
                    'name' => $registration->name,
                    'ticket_code' => $registration->ticket_code,
                    'category' => $registration->category,
                    'origin' => $registration->origin,
                    'attended_at' => $attendedTime,
                ]
            ]);
        }

        // Berhasil check in pertama kali
        $scannedBy = auth()->check() ? auth()->user()->name : 'Panitia Scanner';
        $registration->update([
            'status' => 'attended',
            'attended_at' => now(),
            'scanned_by' => $scannedBy,
        ]);

        // Rekam ke CCTV log jika ada
        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => $scannedBy,
                'role' => auth()->check() ? auth()->user()->role : 'usher',
                'action' => 'SCAN KEHADIRAN',
                'description' => "Check-in kehadiran peserta: {$registration->name} ({$registration->ticket_code}) - {$registration->event->title}",
            ]);
        }

        // Hitung ulang statistik
        $totalRegistered = EventRegistration::where('event_id', $registration->event_id)->count();
        $totalAttended = EventRegistration::where('event_id', $registration->event_id)->where('status', 'attended')->count();

        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => "✅ Check-in Berhasil! Selamat datang di Disciples Revival Night, {$registration->name}!",
            'participant' => [
                'id' => $registration->id,
                'name' => $registration->name,
                'ticket_code' => $registration->ticket_code,
                'phone' => $registration->phone,
                'category' => $registration->category,
                'origin' => $registration->origin,
                'attended_at' => $registration->attended_at->format('H:i:s') . ' WIB',
            ],
            'stats' => [
                'total_registered' => $totalRegistered,
                'total_attended' => $totalAttended,
                'total_pending' => $totalRegistered - $totalAttended,
            ]
        ]);
    }

    /**
     * Halaman Rekap & Kelola Seluruh Peserta Event
     */
    public function participantsList(Request $request, $event_id)
    {
        $this->ensureTableExists();

        $event = Event::findOrFail($event_id);
        
        $query = EventRegistration::where('event_id', $event_id);

        if ($request->has('search') && $request->search != '') {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('ticket_code', 'like', "%{$s}%")
                  ->orWhere('phone', 'like', "%{$s}%")
                  ->orWhere('origin', 'like', "%{$s}%");
            });
        }

        if ($request->has('status') && in_array($request->status, ['registered', 'attended'])) {
            $query->where('status', $request->status);
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $participants = $query->orderBy('created_at', 'desc')->paginate(30);

        $totalRegistered = EventRegistration::where('event_id', $event_id)->count();
        $totalAttended = EventRegistration::where('event_id', $event_id)->where('status', 'attended')->count();
        $totalPending = $totalRegistered - $totalAttended;

        return view('admin.events.participants', compact(
            'event', 
            'participants', 
            'totalRegistered', 
            'totalAttended', 
            'totalPending'
        ));
    }

    /**
     * Manual Check-in / Cancel Check-in Toggle oleh Admin
     */
    public function toggleAttendance($id)
    {
        $registration = EventRegistration::findOrFail($id);

        if ($registration->status === 'attended') {
            $registration->update([
                'status' => 'registered',
                'attended_at' => null,
                'scanned_by' => null,
            ]);
            $msg = "Status kehadiran {$registration->name} dibatalkan (kembali ke Belum Hadir).";
        } else {
            $registration->update([
                'status' => 'attended',
                'attended_at' => now(),
                'scanned_by' => auth()->user()->name ?? 'Admin',
            ]);
            $msg = "Status kehadiran {$registration->name} berhasil diubah menjadi HADIR.";
        }

        return back()->with('success', $msg);
    }

    /**
     * Hapus Data Peserta
     */
    public function destroyParticipant($id)
    {
        $registration = EventRegistration::findOrFail($id);
        $name = $registration->name;
        $registration->delete();

        return back()->with('success', "Data peserta {$name} berhasil dihapus.");
    }

    /**
     * Ekspor Data Peserta ke Format CSV
     */
    public function exportCsv($event_id)
    {
        $this->ensureTableExists();

        $event = Event::findOrFail($event_id);
        $participants = EventRegistration::where('event_id', $event_id)
            ->orderBy('created_at', 'asc')
            ->get();

        $filename = 'Peserta_' . Str::slug($event->title) . '_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($participants) {
            $file = fopen('php://output', 'w');
            // Add UTF-8 BOM
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, ['No', 'Kode Tiket', 'Nama Lengkap', 'WhatsApp', 'Email', 'Kategori', 'Asal Sekolah/Cool', 'Status Kehadiran', 'Waktu Hadir', 'Petugas Scan', 'Catatan / Doa', 'Tanggal Daftar']);

            $no = 1;
            foreach ($participants as $p) {
                fputcsv($file, [
                    $no++,
                    $p->ticket_code,
                    $p->name,
                    $p->phone,
                    $p->email ?? '-',
                    $p->category,
                    $p->origin ?? '-',
                    $p->status === 'attended' ? 'HADIR' : 'BELUM HADIR',
                    $p->attended_at ? $p->attended_at->format('d/m/Y H:i:s') : '-',
                    $p->scanned_by ?? '-',
                    $p->notes ?? '-',
                    $p->created_at->format('d/m/Y H:i'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
