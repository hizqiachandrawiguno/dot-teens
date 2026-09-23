<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara & Banner | DOT Admin</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
            padding-bottom: 60px;
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
            padding: 28px; 
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4); 
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
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom py-2.5 fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold fs-6 fs-md-5 d-flex align-items-center text-truncate" href="{{ route('events.index') }}">
            <i class="fa-solid fa-arrow-left me-2 text-info"></i>
            Kembali ke Daftar Acara
        </a>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.events.participants', $event->id) }}" class="btn btn-sm btn-outline-info rounded-pill px-3 py-1 fw-semibold">
                <i class="fa-solid fa-users me-1"></i> Lihat Peserta ({{ $event->registrations()->count() }})
            </a>
            <a href="/" target="_blank" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1 fw-semibold">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Web
            </a>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 95px; max-width: 780px;">
    
    <!-- JAMINAN KEAMANAN DATABASE -->
    <div class="alert alert-info rounded-4 py-3 px-4 mb-4 d-flex align-items-center gap-3 shadow-sm" style="background: rgba(56, 189, 248, 0.12); border: 1px solid rgba(56, 189, 248, 0.35); color: #E0F2FE;">
        <div class="rounded-circle p-2 bg-info bg-opacity-25 text-info fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; min-width: 48px;">
            <i class="fa-solid fa-shield-halved"></i>
        </div>
        <div>
            <div class="fw-bold" style="color: #38BDF8;">Database Jemaat Aman & Terjaga</div>
            <div class="small text-secondary" style="font-size: 12.5px; line-height: 1.5;">
                Mengubah informasi judul, tanggal, jam, atau banner poster acara ini <strong>sama sekali tidak akan menghapus data {{ $event->registrations()->count() }} jemaat</strong> yang telah mendaftar.
            </div>
        </div>
    </div>

    <div class="glass-card">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2 pb-3 border-bottom border-secondary border-opacity-25">
            <div>
                <h4 class="fw-bold text-white mb-1"><i class="fa-solid fa-pen-to-square text-warning me-2"></i> Edit Acara & Update Banner</h4>
                <div class="small text-secondary">Perbarui detail acara atau upload gambar banner baru.</div>
            </div>
            <span class="badge bg-secondary bg-opacity-50 text-light px-3 py-2 rounded-pill">
                ID Acara: #{{ $event->id }}
            </span>
        </div>

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger rounded-4 py-2 small mb-4">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- PREVIEW BANNER SAAT INI -->
            <div class="mb-4 p-3 rounded-4" style="background: rgba(15, 23, 42, 0.6); border: 1px solid rgba(56, 189, 248, 0.2);">
                <label class="form-label-custom fw-bold text-info mb-2">
                    <i class="fa-solid fa-image me-1"></i> Banner / Poster Acara Saat Ini:
                </label>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    @if($event->image)
                        <img src="{{ asset('uploads/events/' . $event->image) }}" alt="Poster {{ $event->title }}" class="rounded-3 shadow" style="width: 110px; height: 110px; object-fit: cover; border: 2px solid rgba(56,189,248,0.4);">
                        <div>
                            <div class="fw-semibold text-white small mb-1">{{ $event->image }}</div>
                            <div class="small text-secondary" style="font-size: 11.5px;">Jika Anda ingin mengganti banner ini, pilih file gambar baru di bawah. Jika tidak, biarkan kosong.</div>
                        </div>
                    @else
                        <div class="bg-secondary bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center text-secondary" style="width: 110px; height: 110px;">
                            <i class="fa-solid fa-image fs-1"></i>
                        </div>
                        <div class="small text-secondary">Belum ada gambar poster. Silakan upload gambar poster baru di bawah.</div>
                    @endif
                </div>

                <div class="mt-3 pt-3 border-top border-secondary border-opacity-25">
                    <label class="form-label-custom">Upload Banner / Poster Baru (Opsional):</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                    <div class="form-text small" style="color: #94A3B8; font-size: 11.5px; margin-top: 5px;">
                        <i class="fa-solid fa-circle-info me-1 text-info"></i> Format: JPG, PNG, WEBP. Maksimal 10 MB. Kosongkan jika tetap memakai banner lama.
                    </div>
                </div>
            </div>

            <!-- DETAIL ACARA -->
            <div class="mb-3">
                <label class="form-label-custom">Judul Acara <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="form-label-custom">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control" style="color-scheme: dark;" value="{{ old('event_date', $event->event_date) }}" required>
                </div>
                <div class="col-sm-6 mt-3 mt-sm-0">
                    <label class="form-label-custom">Jam <span class="text-danger">*</span></label>
                    <input type="time" name="event_waktu" class="form-control" style="color-scheme: dark;" value="{{ old('event_waktu', $event->event_waktu ?? $event->event_time ?? '18:00') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">Lokasi <span class="text-danger">*</span></label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">Deskripsi Lengkap / Singkat <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
            </div>

            <!-- Pilihan Pop Up Banner Beranda -->
            <div class="form-check form-switch mb-4 p-3 rounded-3" style="background: rgba(245, 158, 11, 0.08); border: 1px dashed rgba(245, 158, 11, 0.35);">
                <input class="form-check-input ms-0 me-2" type="checkbox" name="is_popup" value="1" id="isPopupCheckEdit" style="cursor: pointer;" {{ (old('is_popup', $event->is_popup)) ? 'checked' : '' }}>
                <label class="form-check-label small text-white fw-bold" for="isPopupCheckEdit" style="cursor: pointer;">
                    <i class="fa-solid fa-star text-warning me-1"></i> Tampilkan Sebagai Pop Up Banner Beranda
                </label>
                <div class="small mt-1 ps-4" style="color: #94A3B8; font-size: 11px; line-height: 1.4;">
                    Jika dicentang, acara & banner ini langsung aktif di halaman depan website DOT.
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end pt-2">
                <a href="{{ route('events.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary-gradient rounded-pill px-4 py-2 text-white shadow">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan Banner
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
