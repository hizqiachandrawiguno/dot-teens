<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT Admin Dashboard — Teens Edition</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-accent: #60A5FA;
            --purple-accent: #8B5CF6;
            --pink-accent: #EC4899;
            --emerald-accent: #10B981;
            --amber-accent: #F59E0B;
            --bg-dark: #0F172A;
            --card-bg: rgba(255, 255, 255, 0.03);
            --card-border: rgba(255, 255, 255, 0.08);
        }

        body { 
            background-color: var(--bg-dark); 
            color: #F3F4F6; 
            font-family: 'Poppins', sans-serif; 
            overflow-x: hidden;
            background-image: radial-gradient(circle at 10% 20%, rgba(139, 92, 246, 0.08), transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(96, 165, 250, 0.08), transparent 40%);
            min-height: 100vh;
        }
        
        .navbar-custom { 
            background: rgba(15, 23, 42, 0.9); 
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--card-border); 
            z-index: 1050;
        }

        .text-gradient {
            background: linear-gradient(90deg, #60A5FA, #8B5CF6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-animated {
            background: linear-gradient(270deg, #60A5FA, #8B5CF6, #EC4899, #60A5FA);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 6s ease infinite;
            font-weight: 800;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-card { 
            background: var(--card-bg); 
            border: 1px solid var(--card-border); 
            border-radius: 20px; 
            padding: 24px; 
            margin-bottom: 24px; 
            backdrop-filter: blur(12px);
            transition: all 0.3s ease; 
        }
        .glass-card:hover { 
            border-color: rgba(255, 255, 255, 0.18); 
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35); 
        }

        /* STAT CARDS */
        .stat-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.025);
            border: 1px solid var(--card-border);
            padding: 24px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }
        .stat-card-blue:hover { border-color: #60A5FA; }
        .stat-card-green:hover { border-color: #10B981; }
        .stat-card-pink:hover { border-color: #EC4899; }
        .stat-card-amber:hover { border-color: #F59E0B; }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        /* TAB NAVIGATION PILLS */
        .nav-pills-custom {
            gap: 10px;
            border-bottom: 1px solid var(--card-border);
            padding-bottom: 16px;
            margin-bottom: 28px;
        }
        .nav-pills-custom .nav-link {
            background: rgba(255, 255, 255, 0.03);
            color: #94A3B8;
            border: 1px solid var(--card-border);
            border-radius: 50px;
            padding: 10px 22px;
            font-weight: 600;
            font-size: 0.92rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .nav-pills-custom .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(139, 92, 246, 0.4);
        }
        .nav-pills-custom .nav-link.active {
            background: linear-gradient(90deg, #60A5FA, #8B5CF6);
            color: #fff;
            border-color: transparent;
            box-shadow: 0 4px 18px rgba(139, 92, 246, 0.35);
        }

        /* TABLES */
        .table-custom { 
            color: #E2E8F0; 
            margin-bottom: 0;
        }
        .table-custom th { 
            background: rgba(15, 23, 42, 0.7); 
            color: #94A3B8; 
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--card-border);
            padding: 14px 16px;
        }
        .table-custom td { 
            background: transparent; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.04); 
            color: #CBD5E1; 
            vertical-align: middle; 
            padding: 14px 16px;
        }
        .table-custom tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }
        
        .form-control, .form-select { 
            background: rgba(255, 255, 255, 0.04); 
            border: 1px solid var(--card-border); 
            color: #fff; 
            border-radius: 12px; 
            padding: 10px 14px;
        }
        .form-control:focus, .form-select:focus { 
            background: rgba(255, 255, 255, 0.08); 
            color: #fff; 
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.3); 
            border-color: #8B5CF6; 
        }

        .btn-gradient-sm {
            background: linear-gradient(90deg, #60A5FA, #8B5CF6);
            border: none;
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-gradient-sm:hover {
            background: linear-gradient(90deg, #8B5CF6, #EC4899);
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: rgba(15, 23, 42, 0.6); }
        ::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.15); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.3); }
    </style>
</head>
<body>

    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-2 fixed-top">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center gap-3">
                <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="DOT" style="height: 38px; object-fit: contain;">
                    <span class="fw-bold fs-5 text-white">DOT <span class="text-gradient-animated">Admin</span></span>
                </a>
                <a href="/" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 d-none d-md-inline-flex align-items-center gap-1" style="font-size: 0.78rem;">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Website
                </a>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <div class="text-white fw-bold small">{{ $user->name }}</div>
                    <span class="badge rounded-pill px-2 py-1" style="background: rgba(96, 165, 250, 0.15); color:#60A5FA; border: 1px solid rgba(96, 165, 250, 0.3); font-size: 0.7rem;">
                        <i class="fa-solid fa-shield me-1 text-warning"></i> {{ $user->role == 'super_admin' ? 'SUPER ADMIN' : 'KETUA ' . strtoupper(str_replace('_', ' ', $user->role)) }}
                    </span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold d-flex align-items-center gap-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-right-from-bracket"></i> <span class="d-none d-sm-inline">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div style="margin-top: 85px;"></div>

    <!-- MAIN CONTENT -->
    <div class="container-fluid px-3 px-md-4 py-3">
        
        <!-- NOTIFICATIONS -->
        @if(session('success')) 
            <div class="alert alert-success d-flex align-items-center rounded-4 border-0 shadow-sm mb-4 py-3 px-4" role="alert" style="background: rgba(16, 185, 129, 0.15); color: #10B981; border: 1px solid rgba(16, 185, 129, 0.3);">
                <i class="fa-solid fa-check-circle me-3 fs-4"></i>
                <div class="fw-semibold">{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto btn-close-white" data-bs-dismiss="alert"></button>
            </div> 
        @endif

        @if($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4 py-3 px-4" role="alert" style="background: rgba(239, 68, 68, 0.15); color: #EF4444; border: 1px solid rgba(239, 68, 68, 0.3);">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-triangle-exclamation me-2 fs-5"></i>
                    <strong>Perhatian: Terjadi Kesalahan</strong>
                    <button type="button" class="btn-close ms-auto btn-close-white" data-bs-dismiss="alert"></button>
                </div>
                <ul class="mb-0 ps-3 small">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($user->role == 'super_admin')

            <!-- NAVIGATION TABS FOR SUPER ADMIN -->
            <ul class="nav nav-pills nav-pills-custom" id="dashboardTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-overview-btn" data-bs-toggle="pill" data-bs-target="#tab-overview" type="button" role="tab">
                        <i class="fa-solid fa-chart-pie"></i> Ringkasan & CCTV
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-pengurus-btn" data-bs-toggle="pill" data-bs-target="#tab-pengurus" type="button" role="tab">
                        <i class="fa-solid fa-user-shield"></i> Kelola Pengurus
                        @if($stats['pending_users']->count() > 0)
                            <span class="badge bg-warning text-dark rounded-pill ms-1 px-2">{{ $stats['pending_users']->count() }}</span>
                        @endif
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-sosmed-btn" data-bs-toggle="pill" data-bs-target="#tab-sosmed" type="button" role="tab">
                        <i class="fa-solid fa-camera-retro"></i> Galeri & Sosmed
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-cell-btn" data-bs-toggle="pill" data-bs-target="#tab-cell" type="button" role="tab">
                        <i class="fa-solid fa-users"></i> Divisi Cell & Jemaat
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="dashboardTabsContent">
                
                <!-- TAB 1: OVERVIEW & CCTV -->
                <div class="tab-pane fade show active" id="tab-overview" role="tabpanel">
                    
                    <!-- STAT HIGHLIGHTS -->
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-lg-3">
                            <div class="stat-card stat-card-blue">
                                <div class="stat-icon" style="background: rgba(96, 165, 250, 0.15); color: #60A5FA;">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h2 class="text-white fw-bold mb-1">{{ $stats['total_jemaat'] }}</h2>
                                <span class="text-secondary small fw-semibold text-uppercase">Total Jemaat</span>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="stat-card stat-card-green">
                                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.15); color: #10B981;">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </div>
                                <h2 class="text-white fw-bold mb-1">{{ $stats['total_event'] }}</h2>
                                <span class="text-secondary small fw-semibold text-uppercase">Total Acara</span>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="stat-card stat-card-pink">
                                <div class="stat-icon" style="background: rgba(236, 72, 153, 0.15); color: #EC4899;">
                                    <i class="fa-regular fa-images"></i>
                                </div>
                                <h2 class="text-white fw-bold mb-1">{{ $stats['total_foto'] }}</h2>
                                <span class="text-secondary small fw-semibold text-uppercase">Foto Galeri</span>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="stat-card stat-card-amber">
                                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.15); color: #F59E0B;">
                                    <i class="fa-solid fa-user-clock"></i>
                                </div>
                                <h2 class="text-white fw-bold mb-1">{{ $stats['pending_users']->count() }}</h2>
                                <span class="text-secondary small fw-semibold text-uppercase">Permintaan Akun</span>
                            </div>
                        </div>
                    </div>

                    <!-- SHORTCUT PANELS -->
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-bolt text-warning me-2"></i> Akses Panel Divisi</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="glass-card mb-0 p-3 h-100 d-flex flex-column justify-content-between" style="border-left: 4px solid #8B5CF6;">
                                <div class="mb-3">
                                    <h6 class="text-white fw-bold mb-1"><i class="fa-solid fa-church me-2 text-purple" style="color: #8B5CF6;"></i> Ruang Pastoral</h6>
                                    <p class="text-secondary small mb-0">Kelola absensi, rekap kehadiran mingguan, dan data jemaat baru.</p>
                                </div>
                                <a href="/admin/pastoral" class="btn btn-sm text-white fw-semibold rounded-pill align-self-start px-3 py-2" style="background: #8B5CF6;">
                                    Buka Panel Pastoral <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="glass-card mb-0 p-3 h-100 d-flex flex-column justify-content-between" style="border-left: 4px solid #F59E0B;">
                                <div class="mb-3">
                                    <h6 class="text-white fw-bold mb-1"><i class="fa-solid fa-hands-praying me-2" style="color: #F59E0B;"></i> Ruang Prayer</h6>
                                    <p class="text-secondary small mb-0">Lihat permohonan doa masuk dari jemaat dan perbarui status doa.</p>
                                </div>
                                <a href="/admin/prayer" class="btn btn-sm btn-warning text-dark fw-bold rounded-pill align-self-start px-3 py-2">
                                    Buka Panel Prayer <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="glass-card mb-0 p-3 h-100 d-flex flex-column justify-content-between" style="border-left: 4px solid #10B981;">
                                <div class="mb-3">
                                    <h6 class="text-white fw-bold mb-1"><i class="fa-solid fa-calendar-days me-2" style="color: #10B981;"></i> Ruang Acara</h6>
                                    <p class="text-secondary small mb-0">Posting jadwal ibadah raya, event spesial DOT, dan kelola poster.</p>
                                </div>
                                <a href="/admin/events" class="btn btn-sm text-white fw-semibold rounded-pill align-self-start px-3 py-2" style="background: #10B981;">
                                    Buka Panel Acara <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- CCTV LOGS -->
                    <div class="glass-card">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-3">
                            <div>
                                <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-video text-danger me-2"></i> Log Aktivitas Pengurus (CCTV)</h5>
                                <p class="text-secondary small mb-0">Catatan riwayat aksi penting yang dilakukan oleh pengurus di website.</p>
                            </div>
                            <div class="input-group" style="max-width: 280px;">
                                <span class="input-group-text border-0 bg-dark text-secondary"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" id="searchCctv" class="form-control border-0" placeholder="Cari log CCTV...">
                            </div>
                        </div>

                        <div class="table-responsive rounded-3" style="max-height: 380px; overflow-y: auto;">
                            <table class="table table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 130px;">Waktu</th>
                                        <th style="width: 180px;">Pengurus</th>
                                        <th style="width: 140px;">Aksi</th>
                                        <th>Detail Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cctv_logs as $log)
                                    <tr class="baris-cctv">
                                        <td class="text-secondary small">{{ $log->created_at->format('d/m H:i') }}</td>
                                        <td class="text-white">
                                            <strong>{{ $log->user_name }}</strong><br>
                                            <small class="text-secondary">{{ ucwords(str_replace('_', ' ', $log->role)) }}</small>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill px-3 py-1 bg-danger bg-opacity-20 text-danger border border-danger border-opacity-30">
                                                {{ $log->action }}
                                            </span>
                                        </td>
                                        <td class="text-secondary small">{{ $log->description }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-secondary">
                                            <i class="fa-solid fa-shield-halved fs-3 mb-2 d-block opacity-40"></i>
                                            Belum ada log aktivitas terekam.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- TAB 2: PENGURUS & APPROVALS -->
                <div class="tab-pane fade" id="tab-pengurus" role="tabpanel">
                    
                    <!-- PENDING APPROVALS -->
                    <div class="glass-card mb-4" style="border-left: 4px solid #F59E0B;">
                        <h5 class="fw-bold text-white mb-3">
                            <i class="fa-solid fa-user-clock text-warning me-2"></i> Persetujuan Akun Divisi Baru
                            @if($stats['pending_users']->count() > 0)
                                <span class="badge bg-warning text-dark rounded-pill ms-2 px-3">{{ $stats['pending_users']->count() }} Menunggu</span>
                            @endif
                        </h5>
                        
                        <div class="table-responsive">
                            <table class="table table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th>Nama Pendaftar</th>
                                        <th>Email</th>
                                        <th>Divisi Diminta</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stats['pending_users'] as $pending)
                                    <tr>
                                        <td class="fw-bold text-white">{{ $pending->name }}</td>
                                        <td class="text-secondary">{{ $pending->email }}</td>
                                        <td>
                                            <span class="badge rounded-pill px-3 py-1" style="background: rgba(139, 92, 246, 0.2); color:#8B5CF6; border: 1px solid #8B5CF6;">
                                                {{ ucwords(str_replace('_', ' ', $pending->role)) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-flex gap-2">
                                                <form action="/admin/user/approve/{{ $pending->id }}" method="POST">
                                                    @csrf 
                                                    <button class="btn btn-sm btn-success rounded-pill px-3 fw-bold">
                                                        <i class="fa-solid fa-check me-1"></i> Terima
                                                    </button>
                                                </form>
                                                <form action="/admin/user/reject/{{ $pending->id }}" method="POST">
                                                    @csrf 
                                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold">
                                                        <i class="fa-solid fa-xmark me-1"></i> Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-secondary">
                                            <i class="fa-solid fa-mug-hot fs-3 mb-2 d-block opacity-40"></i>
                                            Tidak ada permintaan akun pengurus yang tertunda. Semua akun aman! ☕
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ALL ADMINS LIST -->
                    <div class="glass-card">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-3">
                            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-id-badge text-info me-2"></i> Daftar Seluruh Pengurus Website</h5>
                            
                            <select id="filterDivisi" class="form-select form-select-sm w-auto rounded-pill px-3 py-1 text-white" style="cursor: pointer;">
                                <option value="all" class="text-dark">⚡ Semua Divisi</option>
                                <option value="super_admin" class="text-dark">Super Admin</option>
                                <option value="div_acara" class="text-dark">Divisi Acara</option>
                                <option value="div_cell" class="text-dark">Divisi Cell</option>
                                <option value="div_pastoral" class="text-dark">Divisi Pastoral</option>
                                <option value="div_prayer" class="text-dark">Divisi Prayer</option>
                                <option value="div_sosmed" class="text-dark">Divisi Sosmed</option>
                            </select>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th>Nama Pengurus</th>
                                        <th>Email Akun</th>
                                        <th>Peran / Divisi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $pendingIds = isset($stats['pending_users']) ? $stats['pending_users']->pluck('id')->toArray() : [];
                                        $allAdmins = \App\Models\User::whereNotIn('id', $pendingIds)->orderBy('role', 'asc')->get();
                                    @endphp

                                    @forelse($allAdmins as $admin)
                                    <tr class="baris-admin" data-divisi="{{ $admin->role }}">
                                        <td class="fw-bold text-white">
                                            <i class="fa-solid fa-user-shield me-2 text-secondary"></i>
                                            {{ $admin->name }} 
                                            @if($admin->id == $user->id) 
                                                <span class="badge bg-success bg-opacity-25 text-success border border-success ms-1" style="font-size: 0.65rem;">(Anda)</span> 
                                            @endif
                                        </td>
                                        <td class="text-secondary">{{ $admin->email }}</td>
                                        <td>
                                            <span class="badge rounded-pill px-3 py-1" style="background: rgba(96, 165, 250, 0.1); color:#60A5FA; border: 1px solid rgba(96, 165, 250, 0.3);">
                                                {{ ucwords(str_replace('_', ' ', $admin->role)) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if($admin->id != $user->id)
                                                <form action="/admin/user/delete/{{ $admin->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold" onclick="return confirm('Yakin ingin menghapus akses {{ $admin->name }}?')">
                                                        <i class="fa-solid fa-trash me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-secondary small fst-italic">Akun Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-secondary">Belum ada pengurus lain yang terdaftar.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- TAB 3: SOSIAL MEDIA & GALERI -->
                <div class="tab-pane fade" id="tab-sosmed" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="glass-card h-100">
                                <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-cloud-arrow-up text-pink me-2" style="color:#EC4899;"></i> Upload Foto Galeri</h5>
                                <p class="text-secondary small mb-4">Tambahkan dokumentasi kegiatan DOT Teens untuk ditampilkan di website.</p>
                                
                                <form action="/admin/gallery/add" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="small text-secondary fw-semibold mb-1">Judul Foto / Event *</label>
                                        <input type="text" name="title" class="form-control" placeholder="Cth: Ibadah Youth DOT Sawangan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small text-secondary fw-semibold mb-1">File Foto (Maks 2MB) *</label>
                                        <input type="file" name="image" class="form-control" accept="image/*" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="small text-secondary fw-semibold mb-1">Link Google Drive (Opsional)</label>
                                        <input type="url" name="drive_link" class="form-control" placeholder="https://drive.google.com/...">
                                    </div>
                                    <button type="submit" class="btn text-white w-100 rounded-pill fw-bold py-2 shadow" style="background: linear-gradient(90deg, #EC4899, #8B5CF6); border:none;">
                                        <i class="fa-solid fa-upload me-1"></i> Simpan ke Galeri
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="glass-card h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-images text-pink me-2" style="color:#EC4899;"></i> Daftar Foto Terpublikasi</h5>
                                    <span class="badge rounded-pill bg-pink px-3 py-1" style="background-color: #EC4899;">{{ $galleries->count() }} Foto</span>
                                </div>

                                <div class="table-responsive" style="max-height: 480px; overflow-y: auto;">
                                    <table class="table table-custom align-middle">
                                        <thead>
                                            <tr>
                                                <th style="width: 80px;">Preview</th>
                                                <th>Judul Kegiatan</th>
                                                <th>Tanggal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($galleries as $gal)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('uploads/gallery/' . $gal->image) }}" alt="Preview" class="rounded-3 shadow-sm" style="width: 55px; height: 55px; object-fit: cover; border: 1px solid var(--card-border);">
                                                </td>
                                                <td class="fw-semibold text-white">
                                                    {{ $gal->title }}
                                                    @if(!empty($gal->drive_link))
                                                        <br><a href="{{ $gal->drive_link }}" target="_blank" class="small text-info text-decoration-none"><i class="fa-brands fa-google-drive me-1"></i>Link Drive</a>
                                                    @endif
                                                </td>
                                                <td class="text-secondary small">{{ date('d M Y', strtotime($gal->created_at)) }}</td>
                                                <td class="text-center">
                                                    <form action="/admin/gallery/delete/{{ $gal->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold" onclick="return confirm('Hapus foto ini dari galeri?')">
                                                            <i class="fa-solid fa-trash me-1"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5 text-secondary">Belum ada foto kegiatan yang diunggah.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: DIVISI CELL & JEMAAT -->
                <div class="tab-pane fade" id="tab-cell" role="tabpanel">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-4">
                            <div class="glass-card h-100">
                                <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-calendar-plus text-info me-2"></i> Buat Jadwal Pertemuan Cell</h5>
                                <form action="/admin/cell-schedule/add" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="small text-secondary fw-semibold mb-1">Nama Kelompok Cell *</label>
                                        <input type="text" name="cell_group_name" class="form-control" placeholder="Cth: Cell Youth Sawangan" required>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="small text-secondary fw-semibold mb-1">Tanggal *</label>
                                            <input type="date" name="meeting_date" class="form-control" style="color-scheme: dark;" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-secondary fw-semibold mb-1">Jam *</label>
                                            <input type="time" name="meeting_time" class="form-control" style="color-scheme: dark;" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small text-secondary fw-semibold mb-1">Lokasi Pertemuan *</label>
                                        <input type="text" name="location" class="form-control" placeholder="Cth: Rumah Kakak Leader / GBI" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="small text-secondary fw-semibold mb-1">No. WhatsApp Leader *</label>
                                        <input type="tel" inputmode="numeric" name="leader_phone" class="form-control" placeholder="08xxxxxxxxxx" required>
                                    </div>
                                    <button type="submit" class="btn btn-info text-dark w-100 rounded-pill fw-bold py-2 shadow">
                                        <i class="fa-solid fa-paper-plane me-1"></i> Simpan & Publikasikan
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="glass-card h-100">
                                <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-calendar-days text-info me-2"></i> Jadwal Cell Mendatang</h5>
                                <div class="table-responsive" style="max-height: 420px; overflow-y: auto;">
                                    <table class="table table-custom align-middle">
                                        <thead>
                                            <tr>
                                                <th>Nama Cell</th>
                                                <th>Waktu & Lokasi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($cellSchedules as $cs)
                                            <tr>
                                                <td class="fw-bold text-info fs-6">{{ $cs->cell_group_name }}</td>
                                                <td>
                                                    <div class="text-white small fw-semibold"><i class="fa-regular fa-clock me-1 text-warning"></i> {{ date('d M Y', strtotime($cs->meeting_date)) }} • {{ date('H:i', strtotime($cs->meeting_time)) }}</div>
                                                    <small class="text-secondary"><i class="fa-solid fa-location-dot me-1"></i> {{ $cs->location }}</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-inline-flex gap-2">
                                                        <a href="/admin/cell-schedule/edit/{{ $cs->id }}" class="btn btn-sm btn-outline-light rounded-circle" title="Edit">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </a>
                                                        <form action="/admin/cell-schedule/delete/{{ $cs->id }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Hapus jadwal pertemuan ini?')" title="Hapus">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-secondary py-5">Belum ada jadwal pertemuan cell yang dibuat.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NEW MEMBERS TABLE -->
                    <div class="glass-card">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-3">
                            <div>
                                <h5 class="fw-bold text-warning mb-0"><i class="fa-solid fa-user-plus me-2"></i> Jemaat Baru Menunggu Penempatan Cell</h5>
                                <p class="text-secondary small mb-0">Follow-up pendaftar baru lewat WhatsApp dan tandai jika sudah tergabung.</p>
                            </div>
                            
                            <select id="filterUndangan" class="form-select form-select-sm w-auto rounded-pill px-3 py-1 text-white" style="cursor: pointer;">
                                <option value="all" class="text-dark">⚡ Semua Status</option>
                                <option value="belum" class="text-dark">⏳ Belum Diundang</option>
                                <option value="sudah" class="text-dark">✅ Sudah Diundang</option>
                            </select>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>No. WhatsApp</th>
                                        <th>Tahun Lahir</th>
                                        <th>Status Undangan</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($members->where('is_joined', false) as $member)
                                    <tr class="baris-jemaat" data-status="{{ $member->is_invited ? 'sudah' : 'belum' }}">
                                        <td class="text-white fw-semibold">{{ $member->name }}</td>
                                        <td>
                                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $member->phone_number)) }}" target="_blank" class="text-success text-decoration-none fw-semibold">
                                                <i class="fa-brands fa-whatsapp me-1"></i> {{ $member->phone_number }}
                                            </a>
                                        </td>
                                        <td class="text-secondary">{{ date('Y', strtotime($member->birth_date)) }}</td>
                                        <td>
                                            @if($member->is_invited)
                                                <span class="badge rounded-pill bg-success bg-opacity-20 text-success border border-success border-opacity-30 px-3 py-1">
                                                    <i class="fa-solid fa-check-double me-1"></i> Sudah Diundang
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-secondary bg-opacity-20 text-secondary border border-secondary border-opacity-30 px-3 py-1">
                                                    <i class="fa-solid fa-hourglass-half me-1"></i> Belum Diundang
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-flex gap-2">
                                                <a href="/admin/member/invite/{{ $member->id }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3 fw-bold" style="background:#25D366; border:none; color:#000;">
                                                    <i class="fa-brands fa-whatsapp me-1"></i> Kirim WA
                                                </a>
                                                <form action="/admin/update-status/{{ $member->id }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-info rounded-pill px-3 fw-semibold">
                                                        Tandai Join
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-secondary">
                                            <i class="fa-solid fa-circle-check fs-3 mb-2 d-block text-success opacity-50"></i>
                                            Semua pendaftar baru sudah tergabung ke dalam grup Cell! 🙌
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        @else
            <!-- NON SUPER ADMIN ROLES -->
            @if($user->role == 'div_acara')
                <div class="glass-card p-4">
                    <h4 class="fw-bold mb-3" style="color: #10B981;"><i class="fa-solid fa-calendar-days me-2"></i> Ruang Kendali Divisi Acara</h4>
                    <p class="text-secondary mb-4">Kelola dan publikasikan jadwal acara, event spesial, dan poster kegiatan di website utama.</p>
                    <a href="/admin/events" class="btn btn-gradient-sm px-4 py-2">
                        Buka Manajemen Acara <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            @endif

            @if($user->role == 'div_sosmed')
                <div class="glass-card p-4">
                    <h4 class="fw-bold mb-3" style="color: #EC4899;"><i class="fa-solid fa-camera-retro me-2"></i> Ruang Kendali Divisi Sosial Media</h4>
                    <p class="text-secondary mb-4">Unggah foto kegiatan terbaru dan tautan Google Drive untuk para jemaat.</p>
                    <!-- Form Upload directly for Sosmed admin -->
                    <form action="/admin/gallery/add" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="small text-secondary fw-semibold mb-1">Judul Foto</label>
                                <input type="text" name="title" class="form-control" placeholder="Cth: Youth Gathering" required>
                            </div>
                            <div class="col-md-4">
                                <label class="small text-secondary fw-semibold mb-1">Pilih File</label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-4">
                                <label class="small text-secondary fw-semibold mb-1">Link Drive</label>
                                <input type="url" name="drive_link" class="form-control" placeholder="https://...">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-gradient-sm">Upload Foto</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @endif

    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // SCRIPT FILTER DIVISI
        document.addEventListener("DOMContentLoaded", function() {
            const filterDropdown = document.getElementById('filterDivisi');
            const barisAdmin = document.querySelectorAll('.baris-admin');

            if (filterDropdown) {
                filterDropdown.addEventListener('change', function() {
                    const val = this.value;
                    barisAdmin.forEach(function(baris) {
                        if (val === 'all' || baris.getAttribute('data-divisi') === val) {
                            baris.style.display = '';
                        } else {
                            baris.style.display = 'none';
                        }
                    });
                });
            }

            // SCRIPT FILTER UNDANGAN JEMAAT
            const filterUndangan = document.getElementById('filterUndangan');
            const barisJemaat = document.querySelectorAll('.baris-jemaat');

            if (filterUndangan) {
                filterUndangan.addEventListener('change', function() {
                    const val = this.value;
                    barisJemaat.forEach(function(baris) {
                        if (val === 'all' || baris.getAttribute('data-status') === val) {
                            baris.style.display = '';
                        } else {
                            baris.style.display = 'none';
                        }
                    });
                });
            }

            // SCRIPT SEARCH LIVE CCTV
            const searchCctv = document.getElementById('searchCctv');
            const barisCctv = document.querySelectorAll('.baris-cctv');

            if (searchCctv) {
                searchCctv.addEventListener('keyup', function() {
                    const keyword = this.value.toLowerCase();
                    barisCctv.forEach(function(baris) {
                        const text = baris.textContent.toLowerCase();
                        baris.style.display = text.includes(keyword) ? '' : 'none';
                    });
                });
            }
        });
    </script>
</body>
</html>