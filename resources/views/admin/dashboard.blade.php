<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT Dashboard - Teens Edition</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        body { 
            background-color: #0F172A; 
            color: #F3F4F6; 
            font-family: 'Poppins', sans-serif; 
            overflow-x: hidden;
            background-image: radial-gradient(circle at top right, rgba(139, 92, 246, 0.1), transparent 40%),
                              radial-gradient(circle at bottom left, rgba(96, 165, 250, 0.1), transparent 40%);
        }
        
        .navbar-custom { 
            background: rgba(15, 23, 42, 0.8); 
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,0.05); 
        }

        .text-gradient-animated {
            background: linear-gradient(270deg, #60A5FA, #8B5CF6, #EC4899, #60A5FA);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 5s ease infinite;
            font-weight: 800;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-card { 
            background: rgba(255, 255, 255, 0.03); 
            border: 1px solid rgba(255, 255, 255, 0.05); 
            border-radius: 24px; 
            padding: 25px; 
            margin-bottom: 30px; 
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        }
        .glass-card:hover { 
            transform: translateY(-8px); 
            border-color: rgba(255, 255, 255, 0.2); 
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4); 
        }

        .card-stat-info:hover { box-shadow: 0 10px 25px rgba(96, 165, 250, 0.2); border-color: #60A5FA; }
        .card-stat-success:hover { box-shadow: 0 10px 25px rgba(16, 185, 129, 0.2); border-color: #10B981; }
        .card-stat-pink:hover { box-shadow: 0 10px 25px rgba(236, 72, 153, 0.2); border-color: #EC4899; }
        .card-stat-warning:hover { box-shadow: 0 10px 25px rgba(245, 158, 11, 0.2); border-color: #F59E0B; }

        .table-custom { color: #E5E7EB; }
        .table-custom th { background-color: rgba(255,255,255,0.05); color: #fff; border-bottom: 2px solid rgba(139, 92, 246, 0.5); }
        .table-custom td { background-color: transparent; border-bottom: 1px solid rgba(255,255,255,0.05); color: #D1D5DB; vertical-align: middle; }
        
        .form-control, .form-select { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 12px; }
        .form-control:focus, .form-select:focus { background: rgba(255,255,255,0.1); color: #fff; box-shadow: 0 0 15px rgba(139, 92, 246, 0.3); border-color: #8B5CF6; }

        .btn { transition: 0.3s ease; }
        .btn:hover { transform: scale(1.05); }
        
        .icon-float { animation: floating 3s ease-in-out infinite; }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 fixed-top" data-aos="fade-down">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold fs-4" href="/">DOT <span class="text-gradient-animated">Dashboard</span></a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary small d-none d-md-block">
                    Halo, <strong class="text-white">{{ $user->name }}</strong> 
                    <span class="badge ms-2 rounded-pill px-3 py-2" style="background: rgba(96, 165, 250, 0.15); color:#60A5FA; border: 1px solid rgba(96, 165, 250, 0.5);">
                        <i class="fa-solid fa-bolt text-warning me-1"></i> {{ $user->role == 'super_admin' ? 'SUPER ADMIN' : 'KETUA ' . strtoupper(str_replace('_', ' ', $user->role)) }}
                    </span>
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-bold">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div style="margin-top: 90px;"></div>

    <div class="container-fluid px-4 py-4">
        
        @if(session('success')) 
            <div class="alert alert-success rounded-pill border-0 shadow-sm" data-aos="zoom-in">
                <i class="fa-solid fa-check-circle me-2 fs-5 align-middle"></i> {{ session('success') }}
            </div> 
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-4" role="alert" data-aos="shake">
                <i class="fa-solid fa-triangle-exclamation me-2"></i><strong>Oops! Gagal Menyimpan.</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($user->role == 'div_acara')
        <div class="row g-4 mb-4">
            <div class="col-12" data-aos="fade-up">
                <h4 class="fw-bold mb-4" style="color: #10B981;"><i class="fa-solid fa-calendar-days me-2 icon-float"></i> Dashboard Divisi Acara</h4>
                
                <div class="glass-card h-100 mb-0" style="border-left: 5px solid #10B981; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, transparent 100%); transition: 0.4s;">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <h5 class="text-white fw-bold mb-2"><i class="fa-solid fa-calendar-plus me-2" style="color: #10B981;"></i> Kelola Jadwal & Event</h5>
                            <p class="text-secondary mb-0">Masuk ke Ruang Acara untuk memposting jadwal ibadah, event spesial DOT, dan mengunggah poster terbaru.</p>
                        </div>
                        <a href="/admin/events" class="btn rounded-pill px-5 py-3 text-white fw-bold shadow-lg" style="white-space: nowrap; background-color: #10B981; border: none; font-size: 1.1rem;">
                            Buka Panel Acara <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($user->role == 'super_admin')

            <div class="row g-4 mb-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="glass-card h-100 mb-0" style="border-left: 5px solid #8B5CF6; background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, transparent 100%);">
                        <div class="d-flex flex-column flex-xl-row justify-content-between align-items-xl-center gap-3">
                            <div>
                                <h5 class="text-white fw-bold mb-1"><i class="fa-solid fa-church me-2 icon-float" style="color: #8B5CF6;"></i> Ruang Pastoral</h5>
                                <p class="text-secondary mb-0" style="font-size: 0.8rem;">Absensi, import CSV & jemaat.</p>
                            </div>
                            <a href="/admin/pastoral" class="btn rounded-pill px-3 py-2 text-white fw-bold shadow" style="white-space: nowrap; background-color: #8B5CF6; border: none; font-size: 0.85rem;">Buka Panel <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card h-100 mb-0" style="border-left: 5px solid #F59E0B; background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, transparent 100%);">
                        <div class="d-flex flex-column flex-xl-row justify-content-between align-items-xl-center gap-3">
                            <div>
                                <h5 class="text-white fw-bold mb-1"><i class="fa-solid fa-hands-praying me-2 icon-float" style="color: #F59E0B;"></i> Ruang Prayer</h5>
                                <p class="text-secondary mb-0" style="font-size: 0.8rem;">Kelola doa jemaat & filter.</p>
                            </div>
                            <a href="/admin/prayer" class="btn btn-warning rounded-pill px-3 py-2 text-dark fw-bold shadow" style="white-space: nowrap; font-size: 0.85rem;">Buka Panel <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12" data-aos="fade-left" data-aos-delay="300">
                    <div class="glass-card h-100 mb-0" style="border-left: 5px solid #10B981; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, transparent 100%);">
                        <div class="d-flex flex-column flex-xl-row justify-content-between align-items-xl-center gap-3">
                            <div>
                                <h5 class="text-white fw-bold mb-1"><i class="fa-solid fa-calendar-days me-2 icon-float" style="color: #10B981;"></i> Ruang Acara</h5>
                                <p class="text-secondary mb-0" style="font-size: 0.8rem;">Kelola jadwal & posting acara.</p>
                            </div>
                            <a href="/admin/events" class="btn rounded-pill px-3 py-2 text-white fw-bold shadow" style="white-space: nowrap; background-color: #10B981; border: none; font-size: 0.85rem;">Buka Panel <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="glass-card mt-4" data-aos="fade-up">
                
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4">
                    <h5 class="fw-bold mb-3 mb-sm-0 text-white">
                        <i class="fa-solid fa-video text-danger me-2 icon-float"></i> Log Aktivitas Admin (CCTV)
                    </h5>
                    
                    <div class="input-group shadow-sm" style="max-width: 300px;">
                        <span class="input-group-text border-0" style="background: rgba(255,255,255,0.9); border-radius: 50px 0 0 50px;">
                            <i class="fa-solid fa-magnifying-glass text-dark"></i>
                        </span>
                        <input type="text" id="searchCctv" class="form-control border-0 shadow-none px-2" placeholder="Cari aktivitas..." style="background: rgba(255,255,255,0.9); color: #000; border-radius: 0 50px 50px 0; font-weight: 500;">
                    </div>
                </div>

                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table table-custom align-middle mb-0">
                        <thead style="position: sticky; top: 0; z-index: 10; background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(5px);">
                            <tr>
                                <th style="border-bottom: 2px solid rgba(239, 68, 68, 0.5);">Waktu</th>
                                <th style="border-bottom: 2px solid rgba(239, 68, 68, 0.5);">Admin</th>
                                <th style="border-bottom: 2px solid rgba(239, 68, 68, 0.5);">Aksi</th>
                                <th style="border-bottom: 2px solid rgba(239, 68, 68, 0.5);">Detail Lengkap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cctv_logs as $log)
                            <tr class="baris-cctv hover-row">
                                <td class="text-secondary small">{{ $log->created_at->format('d/m H:i') }}</td>
                                <td class="text-white"><strong>{{ $log->user_name }}</strong> <br><small class="text-secondary">{{ $log->role }}</small></td>
                                <td>
                                    <span class="badge bg-danger bg-opacity-25 text-danger border border-danger rounded-pill px-3 py-1">
                                        {{ $log->action }}
                                    </span>
                                </td>
                                <td class="text-secondary small">{{ $log->description }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-secondary">
                                    <i class="fa-solid fa-shield-halved fs-3 mb-2 d-block opacity-50"></i>Sistem CCTV aktif. Belum ada aktivitas terekam.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <h3 class="fw-bold mb-4 mt-5" data-aos="fade-up">Highlight <span class="text-gradient-animated">Statistik</span> 📊</h3>
            <div class="row g-4 mb-5">
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="glass-card card-stat-info text-center h-100 p-4">
                        <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex p-3 mb-3"><i class="fa-solid fa-users fs-3 text-info"></i></div>
                        <h1 class="text-info fw-bold mb-0">{{ $stats['total_jemaat'] }}</h1>
                        <p class="text-secondary small mb-0 fw-semibold text-uppercase tracking-wider">Total Jemaat</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="glass-card card-stat-success text-center h-100 p-4">
                        <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex p-3 mb-3"><i class="fa-regular fa-calendar-check fs-3 text-success"></i></div>
                        <h1 class="text-success fw-bold mb-0">{{ $stats['total_event'] }}</h1>
                        <p class="text-secondary small mb-0 fw-semibold text-uppercase tracking-wider">Total Acara</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="glass-card card-stat-pink text-center h-100 p-4">
                        <div class="rounded-circle bg-pink bg-opacity-10 d-inline-flex p-3 mb-3" style="background: rgba(236,72,153,0.1);"><i class="fa-regular fa-images fs-3" style="color:#EC4899;"></i></div>
                        <h1 class="text-pink fw-bold mb-0" style="color:#EC4899;">{{ $stats['total_foto'] }}</h1>
                        <p class="text-secondary small mb-0 fw-semibold text-uppercase tracking-wider">Foto Galeri</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="glass-card card-stat-warning text-center h-100 p-4">
                        <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex p-3 mb-3"><i class="fa-solid fa-user-clock fs-3 text-warning"></i></div>
                        <h1 class="text-warning fw-bold mb-0">{{ $stats['pending_users']->count() }}</h1>
                        <p class="text-secondary small mb-0 fw-semibold text-uppercase tracking-wider">Pending Request</p>
                    </div>
                </div>
            </div>

            <h3 class="fw-bold mb-4" data-aos="fade-up">Persetujuan <span class="text-warning">Akun Divisi</span> 🔐</h3>
            <div class="glass-card mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="table-responsive">
                    <table class="table table-custom mb-0 align-middle">
                        <thead><tr><th>Nama Pendaftar</th><th>Email</th><th>Jabatan Diminta</th><th>Aksi</th></tr></thead>
                        <tbody>
                            @forelse($stats['pending_users'] as $pending)
                            <tr class="hover-row">
                                <td class="fw-bold text-white"><i class="fa-solid fa-circle-user me-2 text-secondary"></i>{{ $pending->name }}</td>
                                <td>{{ $pending->email }}</td>
                                <td><span class="badge bg-primary rounded-pill px-3 py-2" style="background: rgba(139, 92, 246, 0.2)!important; color:#8B5CF6!important; border: 1px solid #8B5CF6;">{{ ucwords(str_replace('_', ' ', $pending->role)) }}</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="/admin/user/approve/{{ $pending->id }}" method="POST">@csrf <button class="btn btn-sm btn-success px-4 rounded-pill fw-bold shadow-sm"><i class="fa-solid fa-check me-1"></i> Terima</button></form>
                                        <form action="/admin/user/reject/{{ $pending->id }}" method="POST">@csrf <button class="btn btn-sm btn-outline-danger px-4 rounded-pill fw-bold"><i class="fa-solid fa-xmark me-1"></i> Tolak</button></form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5 text-secondary"><i class="fa-solid fa-mug-hot fs-2 mb-3 d-block opacity-50"></i>Woohoo! Tidak ada permintaan akun baru. Waktunya santai! ☕</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mt-5 mb-4" data-aos="fade-up">
                <h3 class="fw-bold mb-3 mb-sm-0">Daftar <span class="text-info">Pengurus Website</span></h3>
                
                <select id="filterDivisi" class="form-select form-select-sm w-auto rounded-pill px-4 py-2 text-white shadow-sm" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(96, 165, 250, 0.5); cursor: pointer;">
                    <option value="all" class="text-dark">⚡ Semua Divisi</option>
                    <option value="super_admin" class="text-dark">Super Admin</option>
                    <option value="div_acara" class="text-dark">Divisi Acara</option>
                    <option value="div_cell" class="text-dark">Divisi Cell</option>
                    <option value="div_pastoral" class="text-dark">Divisi Pastoral</option>
                    <option value="div_prayer" class="text-dark">Divisi Prayer</option>
                    <option value="div_sosmed" class="text-dark">Divisi Sosmed</option>
                </select>
            </div>

            <div class="glass-card mb-5" data-aos="fade-up" data-aos-delay="150">
                <div class="table-responsive">
                    <table class="table table-custom mb-0 align-middle">
                        <thead>
                            <tr>
                                <th>Nama Pengurus</th>
                                <th>Email</th>
                                <th>Divisi / Jabatan</th>
                                <th class="text-center">Aksi</th> </tr>
                        </thead>
                        <tbody>
                            @php
                                $pendingIds = isset($stats['pending_users']) ? $stats['pending_users']->pluck('id')->toArray() : [];
                                $allAdmins = \App\Models\User::whereNotIn('id', $pendingIds)->orderBy('role', 'asc')->get();
                            @endphp

                            @forelse($allAdmins as $admin)
                            <tr class="hover-row baris-admin" data-divisi="{{ $admin->role }}">
                                <td class="fw-bold text-white">
                                    <i class="fa-solid fa-user-shield me-2 text-secondary"></i>
                                    {{ $admin->name }} 
                                    @if($admin->id == $user->id) 
                                        <span class="badge bg-success ms-2" style="font-size: 0.6rem;">(Kamu)</span> 
                                    @endif
                                </td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <span class="badge rounded-pill px-3 py-2 border" 
                                          style="background: rgba(96, 165, 250, 0.1); color:#60A5FA; border-color: rgba(96, 165, 250, 0.5) !important;">
                                        <i class="fa-solid fa-bolt me-1 text-warning"></i> 
                                        {{ ucwords(str_replace('_', ' ', $admin->role)) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($admin->id != $user->id)
                                        <form action="/admin/user/delete/{{ $admin->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold" onclick="return confirm('Yakin ingin mencabut akses website untuk {{ $admin->name }}?')">
                                                <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-secondary small fst-italic">Akun Anda</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-secondary" id="pesanKosong">Belum ada pengurus lain yang terdaftar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if($user->role == 'super_admin' || $user->role == 'div_sosmed')
            <div class="col-12 mb-4">
                <h4 class="fw-bold text-pink mb-4" style="color:#EC4899;" data-aos="fade-right"><i class="fa-solid fa-camera-retro me-2 icon-float"></i> Panel Divisi Sosial Media</h4>
                
                <div class="row g-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="glass-card h-100">
                            <h6 class="mb-4 text-white fw-bold">Upload Momen Keren 📸</h6>
                            <form action="/admin/gallery/add" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="small text-secondary fw-semibold mb-1">Judul Kegiatan</label>
                                    <input type="text" name="title" class="form-control px-3 py-2" placeholder="Cth: Easter Vibe 2026" required>
                                </div>
                                <div class="mb-3">
                                <label class="small text-secondary fw-semibold mb-1">Pilih Foto (Maks 2MB)</label>
                                    <input type="file" name="image" class="form-control px-3 py-2" accept="image/*" required>
                                </div>

                                <div class="mb-4">
                                    <label class="small text-secondary fw-semibold mb-1">Link Google Drive (Opsional)</label>
                                    <input type="url" name="drive_link" class="form-control px-3 py-2" placeholder="https://drive.google.com/...">
                                </div>

                                <button type="submit" class="btn text-white w-100 rounded-pill fw-bold py-2 shadow-lg" style="background: linear-gradient(90deg, #EC4899, #8B5CF6); border:none;">
                                    <i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload Foto
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="glass-card h-100">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="mb-0 text-white fw-bold">Kelola Foto Galeri</h6>
                                <span class="badge rounded-pill bg-pink text-white px-3 py-2" style="background-color: #EC4899;">{{ $galleries->count() }} Foto</span>
                            </div>
                            
                            <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                                <table class="table table-custom align-middle">
                                    <thead><tr><th>Preview</th><th>Judul Kegiatan</th><th>Tanggal Upload</th><th>Aksi</th></tr></thead>
                                    <tbody>
                                        @forelse($galleries as $gal)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/gallery/' . $gal->image) }}" alt="Preview" class="shadow-sm" style="width: 70px; height: 70px; object-fit: cover; border-radius: 12px; border: 2px solid rgba(255,255,255,0.1);">
                                            </td>
                                            <td class="fw-bold text-white">{{ $gal->title }}</td>
                                            <td class="text-secondary small"><i class="fa-regular fa-calendar me-1"></i> {{ date('d M Y', strtotime($gal->created_at)) }}</td>
                                            <td>
                                                <form action="/admin/gallery/delete/{{ $gal->id }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-4 fw-bold" onclick="return confirm('Yakin mau hapus foto keren ini?')"><i class="fa-solid fa-trash me-1"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="4" class="text-center py-5 text-secondary">Belum ada foto nih. Yuk penuhi galeri dengan keseruan DOT! 🎉</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @if($user->role == 'super_admin' || $user->role == 'div_cell')
            <div class="col-12 mb-5">
                <h4 class="fw-bold text-info mb-4" data-aos="fade-right"><i class="fa-solid fa-users me-2 icon-float"></i> Ruang Kendali Divisi Cell</h4>
                
                <div class="row g-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="glass-card">
                            <h6 class="text-white mb-4 fw-bold">Buat Jadwal Pertemuan Cell ✨</h6>
                            <form action="/admin/cell-schedule/add" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="small text-secondary fw-semibold mb-1">Pilih/Nama Cell</label>
                                    <input type="text" name="cell_group_name" class="form-control px-3 py-2" placeholder="Cth: Cell Jireh" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6"><label class="small text-secondary fw-semibold mb-1">Tanggal</label><input type="date" name="meeting_date" class="form-control" style="color-scheme: dark;" required></div>
                                    <div class="col-6"><label class="small text-secondary fw-semibold mb-1">Jam</label><input type="time" name="meeting_time" class="form-control" style="color-scheme: dark;" required></div>
                                </div>
                                <div class="mb-3">
                                    <label class="small text-secondary fw-semibold mb-1">Lokasi</label>
                                    <input type="text" name="location" class="form-control px-3 py-2" placeholder="Cth: Rumah Keren / GBI" required>
                                </div>
                                <div class="mb-4">
                                    <label class="small text-secondary fw-semibold mb-1">Nomor WA Ketua Cell</label>
                                    <input type="number" name="leader_phone" class="form-control px-3 py-2" placeholder="628123..." required>
                                </div>
                                <button type="submit" class="btn btn-info w-100 rounded-pill fw-bold py-2 shadow"><i class="fa-solid fa-paper-plane me-2"></i>Posting Jadwal</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="glass-card h-100">
                            <h6 class="text-white mb-4 fw-bold">Jadwal Cell Mendatang 🗓️</h6>
                            <div class="table-responsive">
                                <table class="table table-custom align-middle">
                                    <thead><tr><th>Cell</th><th>Waktu & Tempat</th><th>Aksi</th></tr></thead>
                                    <tbody>
                                        @forelse($cellSchedules as $cs)
                                        <tr>
                                            <td class="fw-bold text-info fs-5">{{ $cs->cell_group_name }}</td>
                                            <td>
                                                <div class="text-white"><i class="fa-regular fa-clock me-1 text-warning"></i> {{ date('d M Y', strtotime($cs->meeting_date)) }} • {{ date('H:i', strtotime($cs->meeting_time)) }}</div>
                                                <small class="text-secondary"><i class="fa-solid fa-location-dot me-1"></i> {{ $cs->location }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="/admin/cell-schedule/edit/{{ $cs->id }}" class="btn btn-sm btn-outline-light rounded-circle" style="width: 35px; height: 35px;"><i class="fa-solid fa-pen mt-1"></i></a>
                                                    <form action="/admin/cell-schedule/delete/{{ $cs->id }}" method="POST">@csrf<button class="btn btn-sm btn-outline-danger rounded-circle" style="width: 35px; height: 35px;" onclick="return confirm('Hapus jadwal?')"><i class="fa-solid fa-trash mt-1"></i></button></form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-secondary py-4">Belum ada jadwal. Yuk buat sekarang!</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card mt-4" data-aos="fade-up">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4">
                        <h5 class="text-warning fw-bold mb-3 mb-sm-0"><i class="fa-solid fa-user-astronaut me-2 icon-float"></i> Jemaat Baru Menunggu Cell</h5>
                        
                        <select id="filterUndangan" class="form-select form-select-sm w-auto rounded-pill px-4 py-2 text-white shadow-sm" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(245, 158, 11, 0.5); cursor: pointer;">
                            <option value="all" class="text-dark">⚡ Semua Status</option>
                            <option value="belum" class="text-dark">⏳ Belum Diundang</option>
                            <option value="sudah" class="text-dark">✅ Sudah Diundang</option>
                        </select>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead><tr><th>Nama</th><th>WhatsApp</th><th>Tahun Lahir</th><th class="text-center">Status & Aksi</th></tr></thead>
                            <tbody>
                                @forelse($members->where('is_joined', false) as $member)
                                <tr class="hover-row baris-jemaat" data-status="{{ $member->is_invited ? 'sudah' : 'belum' }}">
                                    <td class="text-white fw-semibold">{{ $member->name }}</td>
                                    <td>
                                        <span class="text-secondary"><i class="fa-brands fa-whatsapp me-1 text-success"></i> {{ $member->phone_number }}</span>
                                    </td>
                                    <td>{{ date('Y', strtotime($member->birth_date)) }}</td>
                                    <td>
                                        <div class="text-center mb-2">
                                            @if($member->is_invited)
                                                <span class="badge bg-success bg-opacity-25 text-success border border-success rounded-pill px-3 py-1"><i class="fa-solid fa-check-double me-1"></i> Sudah Diundang</span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-25 text-secondary border border-secondary rounded-pill px-3 py-1"><i class="fa-solid fa-hourglass-half me-1"></i> Belum Diundang</span>
                                            @endif
                                        </div>

                                        <div class="d-flex flex-column gap-2">
                                            <a href="/admin/member/invite/{{ $member->id }}" target="_blank" class="btn btn-sm text-dark fw-bold rounded-pill shadow-sm" style="background-color: #25D366; border: none;">
                                                <i class="fa-brands fa-whatsapp me-1"></i> Kirim Undangan WA
                                            </a>
                                            <form action="/admin/update-status/{{ $member->id }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-info w-100 rounded-pill fw-bold">Tandai Sudah Join</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center text-secondary py-5">Yeay! Semua jemaat baru sudah masuk ke dalam Cell. 🙌</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // 1. Script Animasi Bawaan
        AOS.init({
            duration: 800, 
            once: true, 
            offset: 50 
        });

        // 2. SCRIPT FILTER DIVISI KILAT
        document.addEventListener("DOMContentLoaded", function() {
            const filterDropdown = document.getElementById('filterDivisi');
            const barisAdmin = document.querySelectorAll('.baris-admin');

            if (filterDropdown) {
                filterDropdown.addEventListener('change', function() {
                    const divisiPilihan = this.value;

                    barisAdmin.forEach(function(baris) {
                        // Jika pilih "all" ATAU data-divisi di baris sama dengan pilihan dropdown
                        if (divisiPilihan === 'all' || baris.getAttribute('data-divisi') === divisiPilihan) {
                            baris.style.display = ''; // Munculkan
                        } else {
                            baris.style.display = 'none'; // Sembunyikan
                        }
                    });
                });
            }
        });
        // 3. SCRIPT FILTER STATUS UNDANGAN JEMAAT CELL
        document.addEventListener("DOMContentLoaded", function() {
            const filterUndangan = document.getElementById('filterUndangan');
            const barisJemaat = document.querySelectorAll('.baris-jemaat');

            if (filterUndangan) {
                filterUndangan.addEventListener('change', function() {
                    const statusPilihan = this.value;

                    barisJemaat.forEach(function(baris) {
                        if (statusPilihan === 'all' || baris.getAttribute('data-status') === statusPilihan) {
                            baris.style.display = ''; 
                        } else {
                            baris.style.display = 'none'; 
                        }
                    });
                });
            }
        });

        // 4. SCRIPT PENCARIAN LIVE CCTV
        document.addEventListener("DOMContentLoaded", function() {
            const searchCctv = document.getElementById('searchCctv');
            const barisCctv = document.querySelectorAll('.baris-cctv');

            if (searchCctv) {
                searchCctv.addEventListener('keyup', function() {
                    // Ambil teks yang diketik lalu ubah jadi huruf kecil semua
                    const keyword = this.value.toLowerCase();

                    barisCctv.forEach(function(baris) {
                        // Ambil seluruh teks di dalam satu baris tabel
                        const teksBaris = baris.textContent.toLowerCase();
                        
                        // Cek apakah teks yang diketik ada di dalam baris tersebut
                        if (teksBaris.includes(keyword)) {
                            baris.style.display = ''; // Tampilkan
                        } else {
                            baris.style.display = 'none'; // Sembunyikan
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>