<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    // Tampilkan halaman Dashboard Acara
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        $currentPopupEvent = Event::where('is_popup', true)->first();
        return view('admin.events.index', compact('events', 'currentPopupEvent'));
    }

    // Simpan Acara Baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'event_waktu' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', // Maksimal 10 MB
        ], [
            'image.max' => 'Ukuran file gambar poster terlalu besar, maksimal 10 MB.',
            'image.image' => 'File yang diunggah harus berupa file gambar.',
            'image.mimes' => 'Format gambar yang didukung: JPEG, PNG, JPG, atau WEBP.',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/events'), $imageName);
        }

        $isPopup = $request->boolean('is_popup');
        if ($isPopup) {
            Event::where('is_popup', true)->update(['is_popup' => false]);
        }

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_waktu' => $request->event_waktu,
            'location' => $request->location,
            'image' => $imageName,
            'is_popup' => $isPopup,
        ]);

        if (class_exists(ActivityLog::class) && auth()->check()) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'TAMBAH EVENT',
                'description' => auth()->user()->name . ' membuat acara baru: ' . $event->title . ($isPopup ? ' (Langsung dijadikan Pop Up Banner)' : ''),
            ]);
        }

        return back()->with('success', 'Acara berhasil ditambahkan ke kalender!' . ($isPopup ? ' Dan langsung aktif sebagai Pop Up Banner Beranda.' : ''));
    }

    // Toggle atau Ubah Pop Up Banner
    public function togglePopup($id)
    {
        $event = Event::findOrFail($id);

        if ($event->is_popup) {
            // Matikan popup
            $event->is_popup = false;
            $event->save();

            if (class_exists(ActivityLog::class) && auth()->check()) {
                ActivityLog::create([
                    'user_name' => auth()->user()->name,
                    'role' => auth()->user()->role,
                    'action' => 'MATIKAN POPUP',
                    'description' => auth()->user()->name . ' menonaktifkan Pop Up Banner beranda (' . $event->title . ')',
                ]);
            }

            return back()->with('success', "Pop Up Banner di awal website untuk '{$event->title}' berhasil dinonaktifkan.");
        } else {
            // Matikan popup event lain, lalu aktifkan event ini
            Event::where('is_popup', true)->update(['is_popup' => false]);
            $event->is_popup = true;
            $event->save();

            if (class_exists(ActivityLog::class) && auth()->check()) {
                ActivityLog::create([
                    'user_name' => auth()->user()->name,
                    'role' => auth()->user()->role,
                    'action' => 'UBAH POPUP BANNER',
                    'description' => auth()->user()->name . ' mengubah Pop Up Banner beranda menjadi: ' . $event->title,
                ]);
            }

            return back()->with('success', "Pop Up Banner di awal website berhasil diubah menjadi '{$event->title}'! Pengunjung beranda sekarang akan melihat banner acara ini.");
        }
    }

    // Hapus Acara
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Hapus file foto jika ada
        if ($event->image) {
            $imagePath = public_path('uploads/events/' . $event->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if (class_exists(ActivityLog::class) && auth()->check()) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'HAPUS EVENT',
                'description' => auth()->user()->name . ' menghapus acara: ' . $event->title,
            ]);
        }

        $event->delete();
        return back()->with('success', 'Acara berhasil dihapus.');
    }

    // Tampilkan Detail Acara / Peserta
    public function show($id)
    {
        return redirect()->route('admin.events.participants', ['event_id' => $id]);
    }
}