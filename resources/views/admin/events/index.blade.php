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
        :root {
            --navy-dark: #0A1628;
            --navy-card: #112240;
            --navy-input: #172A46;
            --cyan-accent: #38BDF8;
            --blue-accent: #2563EB;
            --text-light: #F8FAFC;
            --text-muted: #94A3B8;
        }

        body { 
            background-color: var(--navy-dark); 
            color: var(--text-light); 
            font-family: 'Poppins', sans-serif; 
            min-height: 100vh;
            padding-bottom: 50px;
        }

        .navbar-custom { 
            background: rgba(17, 34, 64, 0.92); 
            backdrop-filter: blur(15px); 
            border-bottom: 1px solid rgba(56, 189, 248, 0.15); 
        }

        .glass-card { 
            background: rgba(17, 34, 64, 0.85); 
            border: 1px solid rgba(56, 189, 248, 0.2); 
            border-radius: 20px; 
            backdrop-filter: blur(15px); 
            padding: 24px; 
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4); 
            transition: 0.3s; 
        }

        .form-control, .form-select { 
            background-color: var(--navy-input) !important; 
            border: 1px solid rgba(56, 189, 248, 0.25) !important; 
            color: #FFFFFF !important; 
            border-radius: 12px; 
            padding: 10px 14px; 
            font-size: 14px;
        }

        .form-control:focus, .form-select:focus { 
            background-color: #1c3355 !important; 
            border-color: var(--cyan-accent) !important; 
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important; 
        }

        .form-control::placeholder {
            color: #64748B !important;
            opacity: 1 !important;
        }

        .form-label-custom {
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }

        .btn-primary-gradient { 
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%); 
            border: none; 
            border-radius: 12px; 
            font-weight: 600; 
            color: #FFFFFF;
            transition: all 0.2s;
        }

        .btn-primary-gradient:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        /* Tombol Ukuran Mini (btn-xs) */
        .btn-xs {
            padding: 4px 10px;
            font-size: 11.5px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            line-height: 1.3;
        }
        
        /* FIX: Membasmi background putih Bootstrap di tabel */
        .table-custom { 
            --bs-table-bg: transparent; 
            color: #CBD5E1; 
            margin-bottom: 0;
            min-width: 680px;
        }
        .table-custom th { 
            background-color: rgba(10, 22, 40, 0.7) !important; 
            border-bottom: 2px solid rgba(56, 189, 248, 0.3) !important; 
            color: var(--text-muted); 
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 14px;
        }
        .table-custom td { 
            background-color: transparent !important; 
            border-bottom: 1px solid rgba(255,255,255,0.06); 
            color: #CBD5E1; 
            vertical-align: middle; 
            padding: 14px 12px;
        }
        .table-custom tbody tr:hover td {
            background-color: rgba(56, 189, 248, 0.04) !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom py-2.5 fixed-top">
    <div class="container-fluid px-3 px-md-4 d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold fs-6 fs-md-5 d-flex align-items-center text-truncate" href="{{ route('dashboard') }}" style="max-width: 55vw;">
            <i class="fa-solid fa-arrow-left me-2 text-info"></i>
            <span class="d-none d-sm-inline">Kembali ke </span>Dashboard
        </a>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.events.scan') }}" class="btn btn-sm btn-outline-info rounded-pill px-2 px-sm-3 fw-semibold shadow-sm">
                <i class="fa-solid fa-qrcode me-1"></i> <span class="d-none d-sm-inline">Scanner QR</span> Panitia
            </a>
            <a href="/" target="_blank" class="btn btn-sm btn-outline-light rounded-pill px-2 px-sm-3 fw-semibold">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> <span class="d-none d-md-inline">Lihat </span>Web
            </a>
        </div>
    </div>
</nav>

<div class="container-fluid px-3 px-md-4" style="margin-top: 85px;">
    <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-right">
            <div class="glass-card">
                <h5 class="fw-bold mb-4"><i class="fa-solid fa-calendar-plus text-info me-2"></i> Tambah Acara Baru</h5>
                
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger rounded-4 py-2 small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label-custom">Judul Acara <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Cth: Youth Celebration" required>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label-custom">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="event_date" class="form-control" style="color-scheme: dark;" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label-custom">Jam <span class="text-danger">*</span></label>
                            <input type="time" name="event_waktu" class="form-control" style="color-scheme: dark;" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-custom">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control" placeholder="Lokasi acara..." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Deskripsi Singkat <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Apa yang seru di acara ini?" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Poster Acara (Opsional)</label>
                        <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                        <div class="form-text small" style="color: #94A3B8; font-size: 11.5px; margin-top: 5px;">
                            <i class="fa-solid fa-circle-info me-1 text-info"></i> Format: JPG, PNG, WEBP. Maksimal 10 MB.
                        </div>
                    </div>

                    <!-- Pilihan Pop Up Banner Beranda -->
                    <div class="form-check form-switch mb-4 p-3 rounded-3" style="background: rgba(245, 158, 11, 0.08); border: 1px dashed rgba(245, 158, 11, 0.35);">
                        <input class="form-check-input ms-0 me-2" type="checkbox" name="is_popup" value="1" id="isPopupCheck" style="cursor: pointer;">
                        <label class="form-check-label small text-white fw-bold" for="isPopupCheck" style="cursor: pointer;">
                            <i class="fa-solid fa-star text-warning me-1"></i> Jadikan Pop Up Banner Beranda
                        </label>
                        <div class="small mt-1 ps-4" style="color: #94A3B8; font-size: 11px; line-height: 1.4;">
                            Jika dicentang, acara ini langsung muncul otomatis di pop-up banner beranda website menggantikan banner yang aktif saat ini.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary-gradient w-100 py-2.5 text-white shadow">
                        <i class="fa-solid fa-paper-plane me-1"></i> Posting Acara Sekarang
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up">
            <div class="glass-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <h5 class="fw-bold mb-0"><i class="fa-solid fa-list-ul text-primary me-2"></i> Daftar Acara Mendatang</h5>
                    <a href="{{ route('admin.events.scan') }}" class="btn btn-sm btn-outline-info rounded-pill px-3 py-2 fw-semibold shadow-sm">
                        <i class="fa-solid fa-qrcode me-1"></i> Buka Scanner QR Panitia
                    </a>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-10 text-success border-0 rounded-4 mb-4">
                        <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <!-- STATUS POP UP BANNER BERANDA SAAT INI -->
                @if(isset($currentPopupEvent) && $currentPopupEvent)
                    <div class="p-3 rounded-4 mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3 shadow-sm" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.15) 0%, rgba(239, 68, 68, 0.1) 100%); border: 1px solid rgba(245, 158, 11, 0.45);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle p-2 bg-warning bg-opacity-25 text-warning fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <div>
                                <div class="small fw-bold text-uppercase" style="color: #FBBF24; font-size: 11px; letter-spacing: 0.5px;">
                                    <i class="fa-solid fa-circle-check me-1"></i> Pop Up Banner Beranda Saat Ini:
                                </div>
                                <div class="fw-bold text-white fs-6">
                                    {{ $currentPopupEvent->title }}
                                    <span class="badge bg-secondary bg-opacity-50 text-light fw-normal ms-1" style="font-size: 11px;">
                                        <i class="fa-regular fa-calendar me-1"></i>{{ date('d M Y', strtotime($currentPopupEvent->event_date)) }}
                                    </span>
                                </div>
                                <div class="small text-secondary" style="font-size: 11.5px;">
                                    Acara ini ditampilkan sebagai pop-up & floating widget saat pengunjung membuka website utama.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <form action="{{ route('admin.events.toggle_popup', $currentPopupEvent->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1 fw-semibold" onclick="return confirm('Nonaktifkan Pop Up Banner di awal website?')">
                                    <i class="fa-solid fa-power-off me-1"></i> Nonaktifkan Pop Up
                                </button>
                            </form>
                            <a href="/" target="_blank" class="btn btn-sm btn-light text-dark rounded-pill px-3 py-1 fw-semibold">
                                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Preview di Web
                            </a>
                        </div>
                    </div>
                @else
                    <div class="p-3 rounded-4 mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3" style="background: rgba(148, 163, 184, 0.08); border: 1px dashed rgba(148, 163, 184, 0.3);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle p-2 bg-secondary bg-opacity-25 text-secondary fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="fa-regular fa-eye-slash"></i>
                            </div>
                            <div>
                                <div class="small text-secondary fw-semibold">Status Pop Up Banner Beranda:</div>
                                <div class="text-white fw-bold">Sedang Dinonaktifkan (Tidak ada modal promosi yang muncul)</div>
                                <div class="small text-secondary" style="font-size: 11.5px;">
                                    Pilih acara di bawah dan klik tombol <strong class="text-warning">"Jadikan Pop Up Banner"</strong> untuk memunculkannya di halaman depan.
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Poster</th>
                                <th>Detail Acara</th>
                                <th style="width: 210px;">Waktu & Lokasi</th>
                                <th class="text-center" style="width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                            <tr>
                                <td>
                                    @if($event->image)
                                        <img src="{{ asset('uploads/events/' . $event->image) }}" class="rounded-3 shadow-sm" style="width: 65px; height: 65px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
                                    @else
                                        <div class="bg-secondary rounded-3 d-flex align-items-center justify-content-center bg-opacity-25" style="width: 65px; height: 65px;">
                                            <i class="fa-solid fa-calendar text-secondary"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                        <div class="fw-bold text-white fs-6">{{ $event->title }}</div>
                                        @if($event->is_popup)
                                            <span class="badge rounded-pill px-2 py-1" style="background: linear-gradient(135deg, #F59E0B, #EF4444); color: #FFFFFF; font-size: 10px; letter-spacing: 0.5px;">
                                                <i class="fa-solid fa-star me-1"></i> POP UP AKTIF
                                            </span>
                                        @endif
                                    </div>
                                    <div class="small text-secondary mb-2">{{ Str::limit($event->description, 60) }}</div>
                                    <div class="d-flex gap-1 flex-wrap align-items-center">
                                        <!-- Tombol Pop Up Banner -->
                                        @if($event->is_popup)
                                            <form action="{{ route('admin.events.toggle_popup', $event->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-xs rounded-pill px-2 py-1 fw-bold shadow-sm" style="background: #F59E0B; color: #000; font-size: 11px;" title="Acara ini sedang aktif sebagai Pop Up. Klik untuk menonaktifkan">
                                                    <i class="fa-solid fa-star me-1"></i> Pop Up Banner (Aktif)
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.events.toggle_popup', $event->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-outline-warning rounded-pill px-2 py-1 fw-semibold" style="font-size: 11px;" title="Klik untuk menjadikan acara ini Pop Up Banner di awal website">
                                                    <i class="fa-regular fa-star me-1"></i> Jadikan Pop Up Banner
                                                </button>
                                            </form>
                                        @endif

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