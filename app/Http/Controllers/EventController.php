<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    // Tampilkan halaman Dashboard Acara
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('admin.events.index', compact('events'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/events'), $imageName);
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_waktu' => $request->event_waktu,
            'location' => $request->location,
            'image' => $imageName,
        ]);

        return back()->with('success', 'Acara berhasil ditambahkan ke kalender!');
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

        $event->delete();
        return back()->with('success', 'Acara berhasil dihapus.');
    }
}