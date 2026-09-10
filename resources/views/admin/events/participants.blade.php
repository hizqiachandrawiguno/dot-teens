<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta: {{ $event->title }} | DOT Admin</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            padding-bottom: 60px;
        }

        .navbar-custom {
            background: rgba(17, 34, 64, 0.9);
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
            margin-bottom: 24px;
        }

        .stat-card {
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(56, 189, 248, 0.15);
            border-radius: 16px;
            padding: 16px 20px;
            text-align: center;
        }

        .stat-val {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 26px;
            font-weight: 800;
            line-height: 1.2;
        }

        .form-control, .form-select {
            background-color: var(--navy-input) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            color: #FFFFFF !important;
            border-radius: 12px;
            font-size: 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--cyan-accent) !important;
            box-shadow: none !important;
        }

        .table-custom {
            --bs-table-bg: transparent;
            color: #CBD5E1;
            min-width: 820px;
        }
        .table-custom th {
            color: #94A3B8;
            font-weight: 600;
            font-size: 12px;
            border-bottom: 1px solid rgba(56, 189, 248, 0.2);
            text-transform: uppercase;
            padding: 14px 12px;
            background-color: rgba(10, 22, 40, 0.6) !important;
        }
        .table-custom td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 13px;
            padding: 12px;
            vertical-align: middle;
        }
        .table-custom tbody tr:hover td {
            background-color: rgba(56, 189, 248, 0.04) !important;
        }

        .btn-cyan {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 8px 16px;
            transition: all 0.2s;
        }
        .btn-cyan:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            color: #FFFFFF;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark navbar-custom py-2.5 sticky-top">
        <div class="container-fluid px-3 px-lg-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                <a class="btn btn-sm btn-outline-secondary text-light rounded-pill px-2.5 px-sm-3" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-arrow-left me-1"></i> <span class="d-none d-sm-inline">Dashboard</span>
                </a>
                <span class="fw-bold text-white fs-6 fs-md-5 text-truncate" style="max-width: 45vw;">
                    <i class="fa-solid fa-users text-info me-1 me-sm-2"></i> <span class="d-none d-sm-inline">Data Pendaftar </span>Event
                </span>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.events.scan', $event->id) }}" class="btn btn-sm btn-cyan">
                    <i class="fa-solid fa-qrcode me-1"></i> <span class="d-none d-sm-inline">Buka </span>Scanner
                </a>
                <a href="{{ route('admin.events.export', $event->id) }}" class="btn btn-sm btn-outline-success rounded-pill px-2.5 px-sm-3">
                    <i class="fa-solid fa-file-csv me-1"></i> <span class="d-none d-sm-inline">Export </span>CSV
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-3 px-lg-4 mt-4">
        <!-- Event Header -->
        <div class="glass-card mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <span class="badge bg-primary bg-opacity-25 text-info border border-info mb-1 px-3 py-1">
                        {{ $event->title }}
                    </span>
                    <h3 class="fw-bold text-white mb-1">Rekap Peserta & Kehadiran</h3>
                    <p class="text-secondary small mb-0">
                        <i class="fa-regular fa-calendar me-1"></i> {{ date('d F Y', strtotime($event->event_date)) }} • 
                        <i class="fa-regular fa-clock me-1"></i> {{ $event->time_formatted }} WIB • 
                        <i class="fa-solid fa-location-dot me-1"></i> {{ $event->location }}
                    </p>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success bg-success bg-opacity-15 text-success border-0 rounded-4 mb-4 d-flex align-items-center gap-2">
                <i class="fa-solid fa-circle-check fs-5"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- STATS -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-4">
                <div class="stat-card">
                    <div class="text-secondary small mb-1">Total Peserta Terdaftar</div>
                    <div class="stat-val text-white">{{ $totalRegistered }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="stat-card" style="border-color: rgba(34, 197, 94, 0.3);">
                    <div class="text-success small mb-1"><i class="fa-solid fa-circle-check me-1"></i> Sudah Hadir (Check-in)</div>
                    <div class="stat-val text-success">{{ $totalAttended }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="stat-card" style="border-color: rgba(245, 158, 11, 0.3);">
                    <div class="text-warning small mb-1"><i class="fa-solid fa-hourglass-half me-1"></i> Belum Hadir</div>
                    <div class="stat-val text-warning">{{ $totalPending }}</div>
                </div>
            </div>
        </div>

        <!-- FILTER & TABLE -->
        <div class="glass-card">
            <!-- Filter Form -->
            <form action="{{ route('admin.events.participants', $event->id) }}" method="GET" class="row g-2 mb-4">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama, tiket, no HP, atau sekolah..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="attended" {{ request('status') === 'attended' ? 'selected' : '' }}>Sudah Hadir</option>
                        <option value="registered" {{ request('status') === 'registered' ? 'selected' : '' }}>Belum Hadir</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="category" class="form-select">
                        <option value="">-- Kategori --</option>
                        <option value="SMP" {{ request('category') === 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ request('category') === 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="Kuliah / Pemuda" {{ request('category') === 'Kuliah / Pemuda' ? 'selected' : '' }}>Kuliah / Pemuda</option>
                        <option value="Pelayan / Mentor" {{ request('category') === 'Pelayan / Mentor' ? 'selected' : '' }}>Pelayan / Mentor</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-cyan w-100"><i class="fa-solid fa-filter me-1"></i> Filter</button>
                    @if(request()->hasAny(['search', 'status', 'category']))
                        <a href="{{ route('admin.events.participants', $event->id) }}" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate-left"></i></a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th>Tiket</th>
                            <th>Nama Peserta</th>
                            <th>WhatsApp</th>
                            <th>Kategori</th>
                            <th>Asal</th>
                            <th>Status Kehadiran</th>
                            <th>Waktu Check-in</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($participants as $p)
                        <tr>
                            <td>
                                <a href="{{ route('event.ticket', $p->ticket_code) }}" target="_blank" class="font-monospace text-info fw-bold text-decoration-none" title="Lihat E-Tiket">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1 small"></i>{{ $p->ticket_code }}
                                </a>
                            </td>
                            <td>
                                <div class="fw-bold text-white">{{ $p->name }}</div>
                                @if($p->email)<small class="text-secondary">{{ $p->email }}</small>@endif
                            </td>
                            <td>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->phone) }}" target="_blank" class="text-success text-decoration-none small">
                                    <i class="fa-brands fa-whatsapp me-1"></i>{{ $p->phone }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-50 text-light">{{ $p->category }}</span>
                            </td>
                            <td>
                                <span class="small text-secondary">{{ $p->origin ?? '-' }}</span>
                            </td>
                            <td>
                                @if($p->status === 'attended')
                                    <span class="badge bg-success bg-opacity-25 text-success border border-success px-2 py-1">
                                        <i class="fa-solid fa-circle-check me-1"></i> HADIR
                                    </span>
                                @else
                                    <span class="badge bg-warning bg-opacity-15 text-warning border border-warning px-2 py-1">
                                        <i class="fa-solid fa-clock me-1"></i> BELUM HADIR
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($p->attended_at)
                                    <div class="text-light small">{{ $p->attended_at->timezone('Asia/Jakarta')->format('d M, H:i:s') }} WIB</div>
                                    <small class="text-secondary">Oleh: {{ $p->scanned_by ?? 'Panitia' }}</small>
                                @else
                                    <span class="text-secondary">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <!-- Toggle Hadir/Batal -->
                                    <form action="{{ route('admin.events.participants.toggle', $p->id) }}" method="POST">
                                        @csrf
                                        @if($p->status === 'attended')
                                            <button type="submit" class="btn btn-sm btn-outline-warning" title="Batalkan status hadir">
                                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-outline-success" title="Tandai Hadir">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        @endif
                                    </form>

                                    <!-- Hapus -->
                                    <form action="{{ route('admin.events.participants.delete', $p->id) }}" method="POST" onsubmit="return confirm('Hapus data peserta {{ $p->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Peserta">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-secondary">
                                Tidak ada data peserta yang cocok dengan pencarian.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-end">
                {{ $participants->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</body>
</html>
