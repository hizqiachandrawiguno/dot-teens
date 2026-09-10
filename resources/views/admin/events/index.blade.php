<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT Admin | Manage Events</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        body { background-color: #0F172A; color: #F3F4F6; font-family: 'Poppins', sans-serif; }
        .navbar-custom { background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .glass-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 20px; backdrop-filter: blur(10px); padding: 25px; transition: 0.3s; }
        .glass-card:hover { border-color: rgba(96, 165, 250, 0.3); transform: translateY(-5px); }
        .form-control { background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.15); color: #fff; border-radius: 12px; padding: 10px 14px; }
        .form-control:focus { background: rgba(255,255,255,0.12); color: #fff; border-color: #60A5FA; box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.25); }
        .form-control::placeholder,
        .form-control::-webkit-input-placeholder,
        .form-control::-moz-placeholder {
            color: #94A3B8 !important;
            opacity: 1 !important;
        }
        .btn-primary-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; border-radius: 12px; font-weight: 600; }
        
        /* FIX: Membasmi background putih Bootstrap di tabel */
        .table-custom { --bs-table-bg: transparent; color: #D1D5DB; }
        .table-custom th { background-color: transparent !important; border-bottom: 2px solid rgba(96, 165, 250, 0.3) !important; color: #fff; }
        .table-custom td { background-color: transparent !important; border-bottom: 1px solid rgba(255,255,255,0.05); color: #D1D5DB; vertical-align: middle; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom py-3 fixed-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="/admin/dashboard"><i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Dashboard</a>
    </div>
</nav>

<div class="container-fluid px-4" style="margin-top: 100px;">
    <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-right">
            <div class="glass-card">
                <h5 class="fw-bold mb-4"><i class="fa-solid fa-calendar-plus text-info me-2"></i> Tambah Acara Baru</h5>
                
                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 py-2 small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="small text-secondary mb-1">Judul Acara</label>
                        <input type="text" name="title" class="form-control" placeholder="Cth: Youth Celebration" required>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="small text-secondary mb-1">Tanggal</label>
                            <input type="date" name="event_date" class="form-control" style="color-scheme: dark;" required>
                        </div>
                        <div class="col-6">
                            <label class="small text-secondary mb-1">Jam</label>
                            <input type="time" name="event_waktu" class="form-control" style="color-scheme: dark;" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="small text-secondary mb-1">Lokasi</label>
                        <input type="text" name="location" class="form-control" placeholder="Lokasi acara..." required>
                    </div>
                    <div class="mb-3">
                        <label class="small text-secondary mb-1">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Apa yang seru di acara ini?" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="small text-secondary mb-1">Poster Acara (Opsional)</label>
                        <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                        <div class="form-text small" style="color: #94A3B8; font-size: 11.5px; margin-top: 5px;">
                            <i class="fa-solid fa-circle-info me-1 text-info"></i> Format: JPG, PNG, WEBP. Maksimal 10 MB.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-gradient w-100 py-2 text-white shadow">Posting Acara Sekarang</button>
                </form>
            </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up">
            <div class="glass-card h-100">
                <h5 class="fw-bold mb-4"><i class="fa-solid fa-list-ul text-primary me-2"></i> Daftar Acara Mendatang</h5>
                
                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-10 text-success border-0 rounded-4 mb-4">
                        <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th>Poster</th>
                                <th>Detail Acara</th>
                                <th>Waktu & Lokasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                            <tr>
                                <td>
                                    @if($event->image)
                                        <img src="{{ asset('uploads/events/' . $event->image) }}" class="rounded-3 shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded-3 d-flex align-items-center justify-content-center bg-opacity-25" style="width: 60px; height: 60px;">
                                            <i class="fa-solid fa-calendar text-secondary"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-white mb-1">{{ $event->title }}</div>
                                    <div class="small text-secondary mb-2">{{ Str::limit($event->description, 60) }}</div>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <a href="{{ route('admin.events.scan', $event->id) }}" class="btn btn-xs btn-outline-info rounded-pill px-2 py-1 small" style="font-size: 11px;">
                                            <i class="fa-solid fa-qrcode me-1"></i> Scan Kehadiran
                                        </a>
                                        <a href="{{ route('admin.events.participants', $event->id) }}" class="btn btn-xs btn-outline-light rounded-pill px-2 py-1 small" style="font-size: 11px;">
                                            <i class="fa-solid fa-users me-1"></i> Peserta ({{ $event->registrations()->count() }})
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-info fw-semibold"><i class="fa-regular fa-clock me-1 text-warning"></i> {{ date('d M Y', strtotime($event->event_date)) }} • {{ $event->time_formatted }} WIB</div>
                                    <div class="small text-secondary mt-1"><i class="fa-solid fa-location-dot me-1"></i> {{ $event->location }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger rounded-circle" style="width: 35px; height: 35px;" onclick="return confirm('Hapus acara ini?')">
                                                <i class="fa-solid fa-trash mt-1"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-secondary">Belum ada acara yang diposting. Yuk isi kalendernya! 🗓️</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>