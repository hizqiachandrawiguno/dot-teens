<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastoral Dashboard - DOT Teens</title>
    
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #0F172A;
            color: #F3F4F6;
            font-family: 'Poppins', sans-serif;
        }
        .navbar-custom {
            background: rgba(15, 23, 42, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .text-gradient { 
            background: linear-gradient(90deg, #60A5FA, #8B5CF6); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }
        .glass-card { 
            background: rgba(255, 255, 255, 0.03); 
            border: 1px solid rgba(255, 255, 255, 0.1); 
            border-radius: 15px; 
            padding: 25px; 
        }
        .btn-gradient { 
            background: linear-gradient(90deg, #60A5FA, #8B5CF6); 
            border: none; color: white; font-weight: 600; 
        }
        .btn-gradient:hover { background: linear-gradient(90deg, #8B5CF6, #EC4899); color: white; }
        .table { color: #D1D5DB; }
        .table th { color: #fff; border-bottom: 1px solid rgba(255,255,255,0.1); background: transparent; }
        .table td { border-bottom: 1px solid rgba(255,255,255,0.05); background: transparent; vertical-align: middle; }
        .form-control, .form-control:focus {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="/"><i class="fa-solid fa-arrow-left me-2 text-secondary"></i>Kembali ke Web</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">Halo, <strong class="text-white">{{ $user->name }}</strong> (Pastoral)</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <h2 class="fw-bold mb-4">Pastoral <span class="text-gradient">Dashboard</span></h2>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="glass-card text-center" style="border-left: 4px solid #60A5FA;">
                    <h6 class="text-secondary text-uppercase tracking-wider">Total Jemaat Terdaftar</h6>
                    <h1 class="text-white fw-bold display-4 mb-0">{{ $members->count() }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="glass-card text-center" style="border-left: 4px solid #EF4444;">
                    <h6 class="text-secondary text-uppercase tracking-wider">Perlu Dikunjungi (> 3 Minggu)</h6>
                    <h1 class="text-danger fw-bold display-4 mb-0">{{ $needsVisitation->count() }}</h1>
                </div>
            </div>
        </div>

        @php
            $path = storage_path('app/form_status.txt');
            $formStatus = file_exists($path) ? file_get_contents($path) : '1';
        @endphp
        <div class="glass-card mb-4" style="border-left: 4px solid {{ $formStatus == '1' ? '#10B981' : '#EF4444' }};">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h5 class="text-white mb-1"><i class="fa-solid fa-power-off me-2 text-{{ $formStatus == '1' ? 'success' : 'danger' }}"></i>Status Form Jemaat Baru</h5>
                    <p class="text-secondary small mb-0">Atur kemunculan form pendaftaran di halaman depan. Saat ini form: <span class="badge bg-{{ $formStatus == '1' ? 'success' : 'danger' }}">{{ $formStatus == '1' ? 'OPEN (DIBUKA)' : 'CLOSED (DITUTUP)' }}</span></p>
                </div>
                <form action="/admin/toggle-form" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-{{ $formStatus == '1' ? 'outline-danger' : 'success' }} rounded-pill px-4 shadow">
                        <i class="fa-solid fa-{{ $formStatus == '1' ? 'lock' : 'lock-open' }} me-2"></i>{{ $formStatus == '1' ? 'Matikan Form (Tutup)' : 'Aktifkan Form (Buka)' }}
                    </button>
                </form>
            </div>
        </div>

        <div class="glass-card mb-4" style="border-left: 4px solid #10B981;">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h5 class="text-white mb-1"><i class="fa-solid fa-file-csv me-2 text-success"></i>Import Data Spreadsheet</h5>
                    <p class="text-secondary small mb-0">Upload file CSV (Comma Separated Values) untuk memasukkan ratusan jemaat sekaligus.</p>
                </div>
                <form action="/admin/pastoral/import" method="POST" enctype="multipart/form-data" class="d-flex gap-2">
                    @csrf
                    <input type="file" name="csv_file" class="form-control" accept=".csv" required style="max-width: 250px;">
                    <button type="submit" class="btn btn-success rounded-pill px-4">Import</button>
                </form>
            </div>
        </div>

        <div class="glass-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-white mb-0"><i class="fa-solid fa-clipboard-user me-2 text-gradient"></i>Absensi Ibadah Mingguan</h5>
            <a href="/admin/pastoral/recap" class="btn btn-outline-info rounded-pill px-4">
                <i class="fa-solid fa-history me-2"></i>Lihat Rekap Absensi
            </a>
        </div>
                <form action="/admin/pastoral" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-dark text-white border-secondary rounded-start-pill px-4" placeholder="Cari nama jemaat..." value="{{ request('search') }}">
                            <button class="btn btn-info rounded-end-pill px-4" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                    </div>
                </form>
                
                <form action="/admin/pastoral/attendance" method="POST">
                    @csrf
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Jemaat</th>
                                    <th>No. Handphone</th>
                                    <th>Kehadiran Terakhir</th>
                                    <th class="text-center">Aksi</th> <th class="text-center">Absen Hadir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $m)
                                <tr>
                                    <td>
                                        <span class="fw-bold text-white">{{ $m->name }}</span>
                                        @if(isset($m->needs_visitation) && $m->needs_visitation)
                                            <span class="badge bg-danger ms-2 rounded-pill"><i class="fa-solid fa-triangle-exclamation me-1"></i>Visitation</span>
                                        @endif
                                    </td>
                                    <td class="text-white">{{ $m->phone_number ?? '-' }}</td>
                                    <td>
                                        @if(isset($m->attendances) && $m->attendances->isNotEmpty())
                                            {{ date('d M Y', strtotime($m->attendances->last()->attendance_date)) }}
                                        @else
                                            <span class="text-secondary fst-italic">Belum ada data</span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="/admin/pastoral/member/delete/{{ $m->id }}" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Yakin ingin menghapus jemaat bernama {{ $m->name }}?');" title="Hapus Jemaat">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-switch d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" name="attendance[]" value="{{ $m->id }}" style="transform: scale(1.5); cursor: pointer;">
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-secondary">Data jemaat masih kosong. Silakan Import file CSV di atas.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($members->count() > 0)
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-gradient rounded-pill px-5 py-2 fs-5"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan Absensi</button>
                    </div>
                    @endif
                </form> </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>