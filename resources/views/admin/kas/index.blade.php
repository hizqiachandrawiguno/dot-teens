<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kas & Keuangan Volunteer — DOT Teens</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Bootstrap 5.3 & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-accent: #38BDF8;
            --emerald-accent: #10B981;
            --emerald-glow: rgba(16, 185, 129, 0.25);
            --amber-accent: #F59E0B;
            --rose-accent: #F43F5E;
            --bg-navy: #0A1628;
            --card-bg: #112340;
            --card-border: rgba(56, 189, 248, 0.22);
            --navy-input: #172A46;
            --text-light: #F8FAFC;
            --text-muted: #94A3B8;
        }

        body {
            background-color: #0A1628 !important;
            color: #F8FAFC !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(56, 189, 248, 0.08), transparent 35%),
                radial-gradient(circle at 85% 85%, rgba(16, 185, 129, 0.06), transparent 35%);
            background-attachment: fixed;
        }

        .navbar-custom {
            background: #0D1C33;
            border-bottom: 1px solid var(--card-border);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .text-gradient {
            background: linear-gradient(90deg, #38BDF8, #60A5FA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-emerald {
            background: linear-gradient(90deg, #34D399, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glass-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: rgba(56, 189, 248, 0.45);
        }

        /* TEXT CONTRAST & VISIBILITY OVERRIDES */
        .text-muted, .text-secondary {
            color: #94A3B8 !important;
        }
        .text-light-sub {
            color: #CBD5E1 !important;
        }
        .stat-label {
            color: #94A3B8 !important;
            font-size: 0.78rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.6px !important;
            display: block;
            margin-bottom: 4px;
        }
        .stat-subtext {
            color: #CBD5E1 !important;
            font-size: 0.82rem !important;
            font-weight: 500 !important;
        }

        /* STAT CARDS */
        .stat-card {
            background: #112340 !important;
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 22px 24px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            transition: transform 0.25s ease, border-color 0.25s ease;
        }
        .stat-card:hover {
            transform: translateY(-4px);
        }
        .stat-card.card-emerald { border-left: 4px solid var(--emerald-accent) !important; }
        .stat-card.card-amber { border-left: 4px solid var(--amber-accent) !important; }
        .stat-card.card-cyan { border-left: 4px solid var(--primary-accent) !important; }
        .stat-card.card-rose { border-left: 4px solid var(--rose-accent) !important; }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 12px;
        }

        /* CUSTOM BUTTONS */
        .btn-wa-click {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            padding: 8px 16px;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            box-shadow: 0 4px 14px rgba(37, 211, 102, 0.35);
            transition: all 0.25s ease;
            text-decoration: none;
        }
        .btn-wa-click:hover {
            background: linear-gradient(135deg, #2bf075 0%, #0d6e63 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(37, 211, 102, 0.5);
            color: #FFFFFF !important;
        }

        .btn-cyan-action {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF !important;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            transition: all 0.25s ease;
        }
        .btn-cyan-action:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            transform: translateY(-2px);
            color: #FFFFFF !important;
        }

        /* TABS */
        .nav-pills-custom {
            gap: 8px;
            background: rgba(13, 28, 51, 0.85);
            padding: 6px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            display: inline-flex;
            flex-wrap: wrap;
        }
        .nav-pills-custom .nav-link {
            color: #CBD5E1 !important;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 20px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }
        .nav-pills-custom .nav-link:hover {
            color: #FFFFFF !important;
            background: rgba(56, 189, 248, 0.15) !important;
        }
        .nav-pills-custom .nav-link.active {
            background: linear-gradient(135deg, #0284C7, #2563EB) !important;
            color: #FFFFFF !important;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.35);
        }

        /* TABLES & OVERRIDES */
        .table, .table-custom {
            --bs-table-bg: transparent !important;
            --bs-table-accent-bg: transparent !important;
            --bs-table-striped-bg: transparent !important;
            --bs-table-hover-bg: #142745 !important;
            --bs-table-color: #F8FAFC !important;
            color: #F8FAFC !important;
            border-collapse: separate;
            border-spacing: 0 8px;
            background-color: transparent !important;
        }
        .table-custom thead th {
            background: transparent !important;
            color: #38BDF8 !important;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: 700;
            border: none;
            padding: 12px 16px;
        }
        .table-custom tbody tr, .table-custom tbody td {
            background-color: #0F1E36 !important;
            color: #F8FAFC !important;
            border: none;
        }
        .table-custom tbody tr:hover td {
            background-color: #172D4D !important;
        }
        .table-custom tbody td {
            padding: 16px;
            vertical-align: middle;
        }
        .table-custom tbody tr td:first-child {
            border-top-left-radius: 14px;
            border-bottom-left-radius: 14px;
        }
        .table-custom tbody tr td:last-child {
            border-top-right-radius: 14px;
            border-bottom-right-radius: 14px;
        }

        /* FORM CONTROLS & INPUT GROUP */
        .input-group-text {
            background-color: #172A46 !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            color: #38BDF8 !important;
        }
        .form-control, .form-select {
            background-color: #172A46 !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            color: #FFFFFF !important;
            border-radius: 12px;
            padding: 10px 14px;
        }
        .form-control:focus, .form-select:focus {
            background-color: #1E375C !important;
            border-color: var(--primary-accent) !important;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
            color: #FFFFFF !important;
        }
        .form-control::placeholder {
            color: #94A3B8 !important;
            opacity: 1 !important;
        }

        .modal-content {
            background-color: #112240;
            border: 1px solid var(--card-border);
            border-radius: 20px;
            color: var(--text-light);
        }
        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .badge-lunas {
            background: rgba(16, 185, 129, 0.18);
            color: #34D399;
            border: 1px solid rgba(16, 185, 129, 0.35);
            font-weight: 700;
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 50px;
        }
        .badge-menunggak {
            background: rgba(244, 63, 94, 0.18);
            color: #FB7185;
            border: 1px solid rgba(244, 63, 94, 0.35);
            font-weight: 700;
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 50px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-2.5 fixed-top">
        <div class="container-fluid px-3 px-md-4">
            <div class="d-flex align-items-center gap-3">
                <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="/admin/kas">
                    <img src="{{ asset('images/logo.png') }}" alt="DOT" style="height: 38px; object-fit: contain;">
                    <span class="fw-bold fs-5 text-white">DOT <span class="text-gradient">Kas & Keuangan</span></span>
                </a>
                <a href="/admin/dashboard" class="btn btn-sm btn-outline-secondary rounded-pill px-3 d-none d-sm-inline-flex align-items-center gap-1.5" style="font-size: 0.8rem;">
                    <i class="fa-solid fa-arrow-left"></i> Dashboard Utama
                </a>
            </div>

            <div class="d-flex align-items-center gap-2 gap-md-3">
                <div class="text-end d-none d-sm-block">
                    <div class="text-white fw-bold small">{{ $user->name }}</div>
                    <span class="badge rounded-pill px-2.5 py-1" style="background: rgba(16, 185, 129, 0.15); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.3); font-size: 0.7rem;">
                        <i class="fa-solid fa-coins me-1 text-warning"></i> {{ $user->role == 'super_admin' ? 'SUPER ADMIN' : 'BENDAHARA / KEUANGAN' }}
                    </span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold">
                        <i class="fa-solid fa-right-from-bracket"></i> <span class="d-none d-sm-inline">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div style="margin-top: 85px;"></div>

    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- NOTIFIKASI SUKSES / ERROR -->
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center rounded-4 border-0 shadow-sm mb-4 py-3 px-4" style="background: rgba(16, 185, 129, 0.18); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.35);">
                <i class="fa-solid fa-circle-check fs-4 me-3"></i>
                <div class="fw-semibold">{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4 py-3 px-4" style="background: rgba(239, 68, 68, 0.18); color: #F87171; border: 1px solid rgba(239, 68, 68, 0.35);">
                <div class="fw-bold mb-1"><i class="fa-solid fa-triangle-exclamation me-2"></i>Terjadi Kesalahan:</div>
                <ul class="mb-0 ps-3 small">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close ms-auto btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- HEADER TITLE & QUICK ACTIONS -->
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold text-white mb-1">
                    <i class="fa-solid fa-wallet text-info me-2"></i> Dashboard <span class="text-gradient">Kas Volunteer</span>
                </h2>
                <p class="text-light-sub mb-0" style="font-size: 0.92rem;">Kelola iuran bulanan pengerja DOT, pantau tunggakan, dan kirimkan pengingat WhatsApp dalam 1 klik.</p>
            </div>
            
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-success fw-bold rounded-pill px-3 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalPayment" style="background: linear-gradient(135deg, #10B981, #059669); border:none;">
                    <i class="fa-solid fa-plus-circle"></i> <span>Catat Bayar Kas</span>
                </button>
                <button class="btn btn-danger fw-bold rounded-pill px-3 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalExpense" style="background: linear-gradient(135deg, #F43F5E, #E11D48); border:none;">
                    <i class="fa-solid fa-receipt"></i> <span>Catat Pengeluaran</span>
                </button>
                <a href="{{ route('admin.kas.export') }}" class="btn btn-outline-info rounded-pill px-3 py-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-file-csv"></i> <span>Export Excel</span>
                </a>
                <button class="btn btn-outline-secondary rounded-pill px-3 py-2 d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#modalSettings">
                    <i class="fa-solid fa-gear"></i> <span class="d-none d-md-inline">Pengaturan Rekening</span>
                </button>
            </div>
        </div>

        <!-- 4 KARTU STATISTIK KEUANGAN -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-emerald">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label">Saldo Kas Bersih</span>
                            <h3 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(16, 185, 129, 0.15); color: #34D399;">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 d-flex justify-content-between stat-subtext">
                        <span>Masuk: <strong class="text-success">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</strong></span>
                        <span>Keluar: <strong class="text-danger">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-rose">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label" style="color: #FDA4AF !important;">Total Tunggakan Pengerja</span>
                            <h3 class="fw-bold text-danger mt-1 mb-0">Rp {{ number_format($totalTunggakanKeseluruhan, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(244, 63, 94, 0.15); color: #FB7185;">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext text-warning">
                        <i class="fa-solid fa-circle-exclamation me-1"></i> Piutang kas belum terbayar
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-cyan">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label" style="color: #7DD3FC !important;">Pemasukan Bulan Ini</span>
                            <h3 class="fw-bold text-info mt-1 mb-0">Rp {{ number_format($masukBulanIni, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(56, 189, 248, 0.15); color: #38BDF8;">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext">
                        <i class="fa-regular fa-calendar-check text-info me-1"></i> Periode {{ date('F Y') }}
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-amber">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label" style="color: #FCD34D !important;">Pengeluaran Bulan Ini</span>
                            <h3 class="fw-bold text-warning mt-1 mb-0">Rp {{ number_format($keluarBulanIni, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(245, 158, 11, 0.15); color: #F59E0B;">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext">
                        <i class="fa-solid fa-receipt text-warning me-1"></i> Operasional & kebutuhan tim
                    </div>
                </div>
            </div>
        </div>

        <!-- REKENING BANNER INFO -->
        <div class="glass-card mb-4 py-3.5 px-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3" style="border-left: 4px solid #38BDF8; background: rgba(13, 28, 51, 0.85);">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-20 text-info p-2.5 rounded-circle fs-5">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div>
                    <div class="small fw-bold text-uppercase" style="color: #93C5FD; letter-spacing: 0.6px;">Tujuan Rekening Transfer Kas (Disertakan di WhatsApp):</div>
                    <div class="fw-bold text-white fs-5 mt-0.5">{{ $bankInfo }}</div>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-info rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#modalSettings">
                <i class="fa-solid fa-pen-to-square me-1"></i> Ubah Info Rekening
            </button>
        </div>

        <!-- NAVIGATION TABS -->
        <div class="mb-4">
            <ul class="nav nav-pills nav-pills-custom" id="kasTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="tab-tunggakan-btn" data-bs-toggle="pill" data-bs-target="#tab-tunggakan" type="button">
                        <i class="fa-brands fa-whatsapp text-success me-1.5 fs-6"></i> <strong>Monitoring Tunggakan & Kirim WA</strong>
                        @php
                            $menunggakCount = collect($volunteerSummary)->where('total_tunggakan', '>', 0)->count();
                        @endphp
                        @if($menunggakCount > 0)
                            <span class="badge bg-danger rounded-pill ms-1 px-2">{{ $menunggakCount }}</span>
                        @endif
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-riwayat-btn" data-bs-toggle="pill" data-bs-target="#tab-riwayat" type="button">
                        <i class="fa-solid fa-clock-rotate-left me-1.5"></i> Riwayat Pembayaran Masuk
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-pengeluaran-btn" data-bs-toggle="pill" data-bs-target="#tab-pengeluaran" type="button">
                        <i class="fa-solid fa-money-bill-transfer text-danger me-1.5"></i> Buku Kas Keluar (Pengeluaran)
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-pengerja-btn" data-bs-toggle="pill" data-bs-target="#tab-pengerja" type="button">
                        <i class="fa-solid fa-users me-1.5 text-info"></i> Kelola Pengerja & Periode
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="kasTabsContent">

            <!-- TAB 1: MONITORING TUNGGAKAN & KIRIM WA ONE-CLICK -->
            <div class="tab-pane fade show active" id="tab-tunggakan" role="tabpanel">
                <div class="glass-card">
                    <!-- FILTER & SEARCH BAR -->
                    <div class="row g-3 align-items-center justify-content-between mb-4">
                        <div class="col-12 col-md-7">
                            <form action="/admin/kas" method="GET" class="d-flex flex-wrap gap-2">
                                <div class="input-group" style="max-width: 320px;">
                                    <span class="input-group-text border-secondary" style="background-color: #172A46 !important; color: #38BDF8 !important;"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama atau No. WA..." value="{{ request('search') }}">
                                </div>
                                <select name="division" class="form-select form-select-sm" style="max-width: 200px;" onchange="this.form.submit()">
                                    <option value="">⚡ Semua Divisi</option>
                                    @foreach($divisions as $div)
                                        <option value="{{ $div }}" {{ request('division') == $div ? 'selected' : '' }}>{{ $div }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-info rounded-pill px-3">Filter</button>
                                @if(request('search') || request('division'))
                                    <a href="/admin/kas" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-5 text-md-end d-flex justify-content-md-end gap-2 flex-wrap">
                            <button class="btn btn-sm btn-outline-info rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                <i class="fa-solid fa-user-plus me-1"></i> Tambah Pengerja
                            </button>
                            <form action="{{ route('admin.kas.sync') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-light rounded-pill px-3" onclick="return confirm('Tarik data akun pengurus yang ada di sistem website ke daftar kas?')">
                                    <i class="fa-solid fa-arrows-rotate me-1"></i> Sync Pengurus Web
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- TABEL MONITORING TUNGGAKAN -->
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Pengerja / Volunteer</th>
                                    <th>Divisi Pelayanan</th>
                                    <th>No. WhatsApp</th>
                                    <th>Status Kas</th>
                                    <th>Bulan Menunggak</th>
                                    <th>Total Tagihan</th>
                                    <th class="text-center" style="min-width: 220px;">Aksi Cepat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($volunteerSummary as $item)
                                    @php
                                        $vol = $item['model'];
                                        $unpaid = $item['unpaid_periods'];
                                        $hasTunggakan = $item['total_tunggakan'] > 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2.5">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; background: rgba(56, 189, 248, 0.15); color: #38BDF8; font-size: 0.85rem;">
                                                    {{ strtoupper(substr($vol->name, 0, 2)) }}
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-white">{{ $vol->name }}</div>
                                                    <span class="text-muted small" style="font-size: 0.75rem;">Terdaftar: {{ $vol->created_at->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill px-2.5 py-1" style="background: rgba(139, 92, 246, 0.15); color: #A78BFA; border: 1px solid rgba(139, 92, 246, 0.3); font-size: 0.75rem;">
                                                {{ $vol->division }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="https://wa.me/{{ $vol->formatted_phone }}" target="_blank" class="text-decoration-none text-info small fw-semibold">
                                                <i class="fa-brands fa-whatsapp text-success me-1"></i> {{ $vol->phone }}
                                            </a>
                                        </td>
                                        <td>
                                            @if(!$hasTunggakan)
                                                <span class="badge-lunas">
                                                    <i class="fa-solid fa-circle-check me-1"></i> LUNAS
                                                </span>
                                            @else
                                                <span class="badge-menunggak">
                                                    <i class="fa-solid fa-clock me-1"></i> {{ $unpaid->count() }} BULAN
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($unpaid->isEmpty())
                                                <span class="text-muted small">Semua periode lunas</span>
                                            @else
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach($unpaid as $up)
                                                        <span class="badge bg-dark text-warning border border-warning border-opacity-25" style="font-size: 0.7rem;">
                                                            {{ $up->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$hasTunggakan)
                                                <span class="text-success fw-bold">Rp 0</span>
                                            @else
                                                <span class="text-danger fw-bold fs-6">Rp {{ number_format($item['total_tunggakan'], 0, ',', '.') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                @if($hasTunggakan)
                                                    <!-- TOMBOL ONE-CLICK WHATSAPP DENGAN CCTV TRACKING -->
                                                    <a href="{{ route('admin.kas.send_wa', $vol->id) }}" target="_blank" class="btn-wa-click" title="Kirim Pesan WhatsApp Rincian Tunggakan">
                                                        <i class="fa-brands fa-whatsapp fs-6"></i> Kirim WA
                                                    </a>
                                                    
                                                    <!-- CATAT PEMBAYARAN CEPAT -->
                                                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold" onclick="quickPay({{ $vol->id }}, '{{ addslashes($vol->name) }}', {{ json_encode($unpaid->pluck('id')) }})">
                                                        <i class="fa-solid fa-money-bill-check me-1"></i> Bayar
                                                    </button>
                                                @else
                                                    <span class="text-success small fw-semibold"><i class="fa-solid fa-check-double me-1"></i> Aman</span>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-2.5 py-1" onclick="quickPay({{ $vol->id }}, '{{ addslashes($vol->name) }}', [])" title="Catat bayar di muka">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5" style="background: transparent !important; border: none !important;">
                                            <div class="p-4 rounded-4 text-center mx-auto" style="background: #0B192E !important; border: 1px dashed rgba(56, 189, 248, 0.3) !important; max-width: 620px;">
                                                <i class="fa-solid fa-users-slash fs-2 mb-2 d-block text-secondary opacity-75"></i>
                                                <h6 class="text-white fw-bold mb-1">Belum ada data pengerja / volunteer di daftar kas</h6>
                                                <p class="text-light-sub small mb-3">Daftar pengerja masih kosong. Klik tombol di bawah untuk menambahkan pengerja baru atau menarik akun pengurus yang sudah ada.</p>
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <button class="btn btn-sm btn-info rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                                        <i class="fa-solid fa-plus me-1"></i> Tambah Pengerja
                                                    </button>
                                                    <form action="{{ route('admin.kas.sync') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-light rounded-pill px-3">
                                                            <i class="fa-solid fa-arrows-rotate me-1"></i> Sync Pengurus Web
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 2: RIWAYAT PEMBAYARAN MASUK -->
            <div class="tab-pane fade" id="tab-riwayat" role="tabpanel">
                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-white mb-0">
                            <i class="fa-solid fa-arrow-down-long text-success me-2"></i> Riwayat Pembayaran Kas Masuk
                        </h5>
                        <button class="btn btn-sm btn-success rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalPayment">
                            <i class="fa-solid fa-plus me-1"></i> Input Pembayaran
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal Bayar</th>
                                    <th>Nama Pengerja</th>
                                    <th>Periode Kas</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Dicatat Oleh</th>
                                    <th>Catatan / Bukti</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentPayments as $pay)
                                    <tr>
                                        <td class="text-muted small">{{ \Carbon\Carbon::parse($pay->paid_at)->format('d M Y') }}</td>
                                        <td class="fw-bold text-white">{{ $pay->volunteer->name ?? 'Pengerja Dihapus' }}</td>
                                        <td>
                                            <span class="badge bg-dark text-info border border-info border-opacity-25">
                                                {{ $pay->period->name ?? 'Periode Kas' }}
                                            </span>
                                        </td>
                                        <td class="text-success fw-bold">Rp {{ number_format($pay->amount_paid, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge rounded-pill px-2 py-1 {{ $pay->payment_method == 'transfer' ? 'bg-primary' : 'bg-secondary' }}" style="font-size: 0.72rem;">
                                                {{ strtoupper($pay->payment_method) }}
                                            </span>
                                        </td>
                                        <td class="text-muted small">{{ $pay->recorded_by }}</td>
                                        <td>
                                            @if($pay->proof_image)
                                                <a href="{{ asset('storage/' . $pay->proof_image) }}" target="_blank" class="btn btn-sm btn-outline-info rounded-pill px-2 py-0.5" style="font-size: 0.72rem;">
                                                    <i class="fa-solid fa-image me-1"></i> Lihat Bukti
                                                </a>
                                            @else
                                                <span class="text-muted small">{{ $pay->notes ?: '-' }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.kas.payment.delete', $pay->id) }}" method="POST" onsubmit="return confirm('Hapus data pembayaran ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 32px; height: 32px; padding:0;" title="Hapus Transaksi">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5" style="background: transparent !important; border: none !important;">
                                            <div class="p-4 rounded-4 text-center mx-auto" style="background: #0B192E !important; border: 1px dashed rgba(56, 189, 248, 0.25) !important; max-width: 500px;">
                                                <i class="fa-regular fa-folder-open fs-2 mb-2 d-block text-secondary opacity-75"></i>
                                                <h6 class="text-white fw-bold mb-1">Belum ada catatan pembayaran kas masuk</h6>
                                                <p class="text-light-sub small mb-0">Klik tombol "Input Pembayaran" untuk mencatat iuran yang sudah diserahkan pengerja.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 3: BUKU PENGELUARAN KAS -->
            <div class="tab-pane fade" id="tab-pengeluaran" role="tabpanel">
                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="fw-bold text-white mb-1">
                                <i class="fa-solid fa-arrow-up-long text-danger me-2"></i> Buku Pengeluaran Kas (Kas Keluar)
                            </h5>
                            <p class="text-muted small mb-0">Catat setiap penggunaan dana kas untuk transparansi operasional tim.</p>
                        </div>
                        <button class="btn btn-sm btn-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalExpense">
                            <i class="fa-solid fa-plus me-1"></i> Catat Pengeluaran Baru
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keperluan / Judul</th>
                                    <th>Kategori</th>
                                    <th>Nominal Keluar</th>
                                    <th>Dicatat Oleh</th>
                                    <th>Keterangan / Struk</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allExpenses as $exp)
                                    <tr>
                                        <td class="text-muted small">{{ \Carbon\Carbon::parse($exp->expense_date)->format('d M Y') }}</td>
                                        <td class="fw-bold text-white">{{ $exp->title }}</td>
                                        <td>
                                            <span class="badge rounded-pill px-2.5 py-1" style="background: rgba(245, 158, 11, 0.15); color: #FBBF24; border: 1px solid rgba(245, 158, 11, 0.3); font-size: 0.72rem;">
                                                {{ $exp->category }}
                                            </span>
                                        </td>
                                        <td class="text-danger fw-bold">Rp {{ number_format($exp->amount, 0, ',', '.') }}</td>
                                        <td class="text-muted small">{{ $exp->recorded_by }}</td>
                                        <td>
                                            @if($exp->receipt_image)
                                                <a href="{{ asset('storage/' . $exp->receipt_image) }}" target="_blank" class="btn btn-sm btn-outline-warning rounded-pill px-2 py-0.5" style="font-size: 0.72rem;">
                                                    <i class="fa-solid fa-receipt me-1"></i> Struk / Nota
                                                </a>
                                            @endif
                                            @if($exp->notes)
                                                <div class="text-muted small mt-1">{{ $exp->notes }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.kas.expense.delete', $exp->id) }}" method="POST" onsubmit="return confirm('Hapus catatan pengeluaran ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 32px; height: 32px; padding:0;" title="Hapus">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5" style="background: transparent !important; border: none !important;">
                                            <div class="p-4 rounded-4 text-center mx-auto" style="background: #0B192E !important; border: 1px dashed rgba(56, 189, 248, 0.25) !important; max-width: 500px;">
                                                <i class="fa-solid fa-receipt fs-2 mb-2 d-block text-secondary opacity-75"></i>
                                                <h6 class="text-white fw-bold mb-1">Belum ada data pengeluaran kas tercatat</h6>
                                                <p class="text-light-sub small mb-0">Klik tombol "Catat Pengeluaran Baru" untuk mencatat belanja atau kebutuhan tim.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($allExpenses->hasPages())
                        <div class="mt-3">
                            {{ $allExpenses->links() }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- TAB 4: KELOLA PENGERJA & PERIODE KAS -->
            <div class="tab-pane fade" id="tab-pengerja" role="tabpanel">
                <div class="row g-4">
                    <!-- DAFTAR PERIODE KAS -->
                    <div class="col-12 col-lg-5">
                        <div class="glass-card h-100">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-white mb-0">
                                    <i class="fa-regular fa-calendar-days text-info me-2"></i> Periode Iuran Kas
                                </h5>
                                <button class="btn btn-sm btn-cyan-action rounded-pill px-3 py-1" data-bs-toggle="modal" data-bs-target="#modalPeriod">
                                    <i class="fa-solid fa-plus me-1"></i> Tambah Periode
                                </button>
                            </div>
                            <p class="text-muted small mb-3">Setiap periode mewakili iuran bulanan yang harus dibayar oleh setiap pengerja.</p>

                            <div class="list-group list-group-flush bg-transparent">
                                @forelse($allPeriods as $period)
                                    <div class="list-group-item bg-dark bg-opacity-40 border border-secondary border-opacity-25 rounded-3 mb-2 p-3 text-white d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-bold">{{ $period->name }}</div>
                                            <div class="small text-info">Tarif: Rp {{ number_format($period->amount, 0, ',', '.') }} / orang</div>
                                            @if($period->due_date)
                                                <div class="small text-muted">Jatuh Tempo: {{ \Carbon\Carbon::parse($period->due_date)->format('d M Y') }}</div>
                                            @endif
                                        </div>
                                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 rounded-pill px-2.5 py-1">
                                            Aktif
                                        </span>
                                    </div>
                                @empty
                                    <div class="text-muted text-center py-4">Belum ada periode kas.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- DAFTAR & EDIT PENGERJA -->
                    <div class="col-12 col-lg-7">
                        <div class="glass-card h-100">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-white mb-0">
                                    <i class="fa-solid fa-user-gear text-info me-2"></i> Data Pengerja / Volunteer ({{ $volunteers->count() }})
                                </h5>
                                <button class="btn btn-sm btn-outline-info rounded-pill px-3 py-1" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                    <i class="fa-solid fa-plus me-1"></i> Pengerja Baru
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-custom align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Divisi</th>
                                            <th>No. WhatsApp</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($volunteers as $v)
                                            <tr>
                                                <td class="fw-bold text-white">{{ $v->name }}</td>
                                                <td><span class="small text-muted">{{ $v->division }}</span></td>
                                                <td class="small text-info">{{ $v->phone }}</td>
                                                <td>
                                                    <span class="badge {{ $v->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill px-2 py-0.5" style="font-size: 0.7rem;">
                                                        {{ $v->is_active ? 'Aktif' : 'Non-aktif' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-inline-flex gap-1">
                                                        <button class="btn btn-sm btn-outline-warning rounded-circle" style="width: 28px; height: 28px; padding:0;" onclick="editVolunteer({{ json_encode($v) }})">
                                                            <i class="fa-solid fa-pen" style="font-size: 0.7rem;"></i>
                                                        </button>
                                                        <form action="{{ route('admin.kas.volunteer.delete', $v->id) }}" method="POST" onsubmit="return confirm('Hapus pengerja {{ $v->name }}?')">
                                                            @csrf
                                                            <button class="btn btn-sm btn-outline-danger rounded-circle" style="width: 28px; height: 28px; padding:0;">
                                                                <i class="fa-solid fa-trash" style="font-size: 0.7rem;"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- CCTV LOGS RECENT -->
        @if($cctv_kas->isNotEmpty())
            <div class="glass-card mt-4 p-3 border-secondary border-opacity-25" style="background: rgba(13, 28, 51, 0.6);">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="text-danger fs-6"><i class="fa-solid fa-video"></i></span>
                    <strong class="text-white small">CCTV Aktivitas Kas & Notifikasi Terakhir:</strong>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($cctv_kas as $log)
                        <div class="badge bg-dark text-muted border border-secondary border-opacity-25 p-2 text-start font-monospace" style="font-size: 0.72rem; font-weight: normal;">
                            <span class="text-info">[{{ $log->created_at->format('H:i') }}]</span> 
                            <strong class="text-light">{{ $log->action }}:</strong> {{ Str::limit($log->description, 60) }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

    <!-- ==================== MODALS ==================== -->

    <!-- MODAL CATAT PEMBAYARAN KAS -->
    <div class="modal fade" id="modalPayment" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-money-bill-wave text-success me-2"></i> Catat Pembayaran Kas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Pilih Pengerja / Volunteer</label>
                            <select name="cash_volunteer_id" id="pay_volunteer_id" class="form-select" required>
                                <option value="">-- Pilih Pengerja --</option>
                                @foreach($volunteers as $v)
                                    <option value="{{ $v->id }}">{{ $v->name }} ({{ $v->division }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Pilih Periode Kas (Bisa pilih lebih dari satu)</label>
                            <div class="bg-dark bg-opacity-50 p-3 rounded-3 border border-secondary border-opacity-25" style="max-height: 180px; overflow-y: auto;" id="pay_period_container">
                                @foreach($allPeriods as $p)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input period-checkbox" type="checkbox" name="period_ids[]" value="{{ $p->id }}" id="period_{{ $p->id }}" data-amount="{{ $p->amount }}">
                                        <label class="form-check-label text-white d-flex justify-content-between" for="period_{{ $p->id }}">
                                            <span>{{ $p->name }}</span>
                                            <span class="text-info fw-bold">Rp {{ number_format($p->amount, 0, ',', '.') }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold text-muted">Tanggal Bayar</label>
                                <input type="date" name="paid_at" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold text-muted">Metode Pembayaran</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="cash">💵 Tunai (Cash)</option>
                                    <option value="transfer">💳 Transfer Bank / QRIS</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Foto Bukti Transfer (Opsional)</label>
                            <input type="file" name="proof_image" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Catatan (Opsional)</label>
                            <input type="text" name="notes" class="form-control" placeholder="Contoh: Titip lewat Kak Kevin">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-check me-1"></i> Simpan Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL CATAT PENGELUARAN KAS -->
    <div class="modal fade" id="modalExpense" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-receipt text-danger me-2"></i> Catat Pengeluaran Kas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.expense.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Judul / Keperluan Pengeluaran</label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Beli Snack Rapat Pengerja DOT" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold text-muted">Nominal (Rp)</label>
                                <input type="number" name="amount" class="form-control" placeholder="50000" min="1000" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold text-muted">Kategori</label>
                                <select name="category" class="form-select" required>
                                    <option value="Konsumsi">🍔 Konsumsi</option>
                                    <option value="Peralatan">🛠️ Peralatan / Perlengkapan</option>
                                    <option value="Diakonia">❤️ Kasih / Diakonia</option>
                                    <option value="Operasional">⚡ Operasional Ibadah</option>
                                    <option value="Event">🎉 Acara / Event</option>
                                    <option value="Lainnya">📦 Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Tanggal Pengeluaran</label>
                            <input type="date" name="expense_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Foto Nota / Struk Pembelian (Opsional)</label>
                            <input type="file" name="receipt_image" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Keterangan Tambahan</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="Detail belanja..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-check me-1"></i> Simpan Pengeluaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH / EDIT PENGERJA -->
    <div class="modal fade" id="modalVolunteer" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white" id="modalVolunteerTitle"><i class="fa-solid fa-user-plus text-info me-2"></i> Tambah Pengerja Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form id="formVolunteer" action="{{ route('admin.kas.volunteer.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nama Lengkap Pengerja</label>
                            <input type="text" name="name" id="vol_name" class="form-control" placeholder="Contoh: Hizqia Chandra" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nomor WhatsApp (Untuk Notifikasi 1-Klik)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-success"><i class="fa-brands fa-whatsapp"></i></span>
                                <input type="text" name="phone" id="vol_phone" class="form-control" placeholder="08123456789" required>
                            </div>
                            <span class="text-muted small" style="font-size: 0.72rem;">Bisa diawali 08... atau 628...</span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Divisi Pelayanan</label>
                            <input type="text" name="division" id="vol_division" class="form-control" placeholder="Contoh: Usher / Singer / Multimedia / Cell Leader" required>
                        </div>

                        <div class="row g-2 mb-2" id="vol_edit_extra" style="display: none;">
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Status Aktif</label>
                                <select name="is_active" id="vol_is_active" class="form-select">
                                    <option value="1">Aktif</option>
                                    <option value="0">Non-Aktif (Istirahat)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Catatan (Opsional)</label>
                            <input type="text" name="notes" id="vol_notes" class="form-control" placeholder="Catatan khusus...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-save me-1"></i> Simpan Pengerja
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH PERIODE KAS -->
    <div class="modal fade" id="modalPeriod" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white"><i class="fa-regular fa-calendar-plus text-info me-2"></i> Buka Periode Kas Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.period.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nama Periode Kas</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Kas November 2026" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Tarif Kas per Orang (Rp)</label>
                            <input type="number" name="amount" class="form-control" value="10000" min="1000" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Tanggal Jatuh Tempo (Opsional)</label>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-cyan-action rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-check me-1"></i> Buka Periode
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL PENGATURAN REKENING & INFO KAS -->
    <div class="modal fade" id="modalSettings" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-gear text-info me-2"></i> Pengaturan Informasi Rekening</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.settings.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Info Rekening Transfer</label>
                            <input type="text" name="bank_info" class="form-control" value="{{ $bankInfo }}" placeholder="BCA 6390086774 a.n Hizqia Chandra Wiguno" required>
                            <span class="text-muted small" style="font-size: 0.72rem;">Info ini akan otomatis tertulis dalam pesan WhatsApp pengingat tunggakan.</span>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Nominal Kas Standar (Rp)</label>
                            <input type="number" name="default_nominal" class="form-control" value="{{ $defaultNominal }}" min="1000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-save me-1"></i> Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Modal Bayar Cepat
        function quickPay(volunteerId, volunteerName, unpaidPeriodIds) {
            document.getElementById('pay_volunteer_id').value = volunteerId;
            
            // Uncheck semua dulu
            document.querySelectorAll('.period-checkbox').forEach(cb => cb.checked = false);

            // Centang otomatis periode yang menunggak
            if (unpaidPeriodIds && unpaidPeriodIds.length > 0) {
                unpaidPeriodIds.forEach(id => {
                    const cb = document.getElementById('period_' + id);
                    if (cb) cb.checked = true;
                });
            } else {
                // Centang periode pertama jika sudah lunas atau belum ada tunggakan
                const firstCb = document.querySelector('.period-checkbox');
                if (firstCb) firstCb.checked = true;
            }

            const modal = new bootstrap.Modal(document.getElementById('modalPayment'));
            modal.show();
        }

        // Edit Pengerja
        function editVolunteer(v) {
            document.getElementById('modalVolunteerTitle').innerHTML = '<i class="fa-solid fa-pen-to-square text-warning me-2"></i> Edit Pengerja';
            document.getElementById('formVolunteer').action = '/admin/kas/volunteer/update/' + v.id;
            document.getElementById('vol_name').value = v.name;
            document.getElementById('vol_phone').value = v.phone;
            document.getElementById('vol_division').value = v.division;
            document.getElementById('vol_notes').value = v.notes || '';
            document.getElementById('vol_is_active').value = v.is_active ? '1' : '0';
            document.getElementById('vol_edit_extra').style.display = 'block';

            const modal = new bootstrap.Modal(document.getElementById('modalVolunteer'));
            modal.show();
        }

        // Reset form volunteer ketika modal tertutup
        document.getElementById('modalVolunteer').addEventListener('hidden.bs.modal', function () {
            document.getElementById('modalVolunteerTitle').innerHTML = '<i class="fa-solid fa-user-plus text-info me-2"></i> Tambah Pengerja Baru';
            document.getElementById('formVolunteer').action = '{{ route("admin.kas.volunteer.store") }}';
            document.getElementById('vol_name').value = '';
            document.getElementById('vol_phone').value = '';
            document.getElementById('vol_division').value = '';
            document.getElementById('vol_notes').value = '';
            document.getElementById('vol_edit_extra').style.display = 'none';
        });
    </script>
</body>
</html>
