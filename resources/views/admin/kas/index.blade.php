<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bendahara & Cash Flow Management — DOT Teens</title>

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
            --purple-accent: #A855F7;
            --bg-navy: #0A1628;
            --card-bg: #112340;
            --card-border: rgba(56, 189, 248, 0.2);
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
                radial-gradient(circle at 12% 12%, rgba(56, 189, 248, 0.08), transparent 30%),
                radial-gradient(circle at 88% 88%, rgba(16, 185, 129, 0.07), transparent 30%),
                radial-gradient(circle at 50% 50%, rgba(168, 85, 247, 0.04), transparent 45%);
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

        .text-gradient-amber {
            background: linear-gradient(90deg, #FCD34D, #F59E0B);
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
            border-color: rgba(56, 189, 248, 0.4);
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
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.45);
        }
        .stat-card.card-emerald { border-left: 4px solid #10B981; }
        .stat-card.card-rose    { border-left: 4px solid #F43F5E; }
        .stat-card.card-cyan    { border-left: 4px solid #38BDF8; }
        .stat-card.card-amber   { border-left: 4px solid #F59E0B; }
        .stat-card.card-purple  { border-left: 4px solid #A855F7; }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* PILL MINI BADGE */
        .pill-mini {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.76rem;
            font-weight: 600;
        }

        /* TABS CUSTOM */
        .nav-pills-custom {
            gap: 8px;
            background: rgba(13, 28, 51, 0.7);
            padding: 6px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            display: flex;
            flex-wrap: wrap;
        }
        .nav-pills-custom .nav-link {
            color: #94A3B8;
            font-weight: 600;
            font-size: 0.88rem;
            border-radius: 12px;
            padding: 10px 18px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .nav-pills-custom .nav-link:hover {
            color: #F8FAFC;
            background: rgba(255, 255, 255, 0.05);
        }
        .nav-pills-custom .nav-link.active {
            color: #0A1628 !important;
            background: linear-gradient(135deg, #38BDF8, #60A5FA) !important;
            box-shadow: 0 4px 14px rgba(56, 189, 248, 0.35);
            font-weight: 700;
        }
        .nav-pills-custom .nav-link.active i {
            color: #0A1628 !important;
        }

        /* TABLE CUSTOM WITH SUPERIOR CONTRAST */
        .table, .table-custom {
            --bs-table-bg: transparent !important;
            --bs-table-accent-bg: transparent !important;
            --bs-table-striped-bg: transparent !important;
            --bs-table-hover-bg: #142745 !important;
            --bs-table-color: #F8FAFC !important;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 8px;
        }
        .table-custom thead th {
            background-color: #0F1E36 !important;
            color: #93C5FD !important;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            border: none;
            padding: 14px 16px;
        }
        .table-custom tbody tr, .table-custom tbody td {
            background-color: #112340 !important;
            color: #F8FAFC !important;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }
        .table-custom tbody tr:hover td {
            background-color: #172D4D !important;
        }
        .table-custom tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            font-size: 0.88rem;
        }
        .table-custom tbody tr td:first-child {
            border-left: 1px solid rgba(255, 255, 255, 0.06);
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }
        .table-custom tbody tr td:last-child {
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        /* BADGES */
        .badge-status {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .badge-lunas {
            background: rgba(16, 185, 129, 0.18);
            color: #34D399;
            border: 1px solid rgba(16, 185, 129, 0.35);
        }
        .badge-tunggak {
            background: rgba(244, 63, 94, 0.18);
            color: #FB7185;
            border: 1px solid rgba(244, 63, 94, 0.35);
        }
        .badge-inflow {
            background: rgba(16, 185, 129, 0.18);
            color: #34D399;
            border: 1px solid rgba(16, 185, 129, 0.35);
        }
        .badge-expense {
            background: rgba(244, 63, 94, 0.18);
            color: #FB7185;
            border: 1px solid rgba(244, 63, 94, 0.35);
        }

        /* MODAL DARK STYLING */
        .modal-content {
            background-color: #112340;
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            color: #F8FAFC;
        }
        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 24px;
        }
        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 16px 24px;
        }
        .form-control, .form-select {
            background-color: #172A46 !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            color: #F8FAFC !important;
            border-radius: 12px;
            padding: 10px 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #38BDF8 !important;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
        }
        .form-control::placeholder {
            color: #64748B !important;
        }

        /* BUTTONS */
        .btn-cyan-action {
            background: linear-gradient(135deg, #0284C7, #2563EB);
            color: #FFFFFF !important;
            border: none;
            font-weight: 600;
        }
        .btn-cyan-action:hover {
            background: linear-gradient(135deg, #0369A1, #1D4ED8);
            color: #FFFFFF !important;
        }
        .btn-emerald-action {
            background: linear-gradient(135deg, #10B981, #059669);
            color: #FFFFFF !important;
            border: none;
            font-weight: 600;
        }
        .btn-emerald-action:hover {
            background: linear-gradient(135deg, #059669, #047857);
            color: #FFFFFF !important;
        }
        .btn-rose-action {
            background: linear-gradient(135deg, #F43F5E, #E11D48);
            color: #FFFFFF !important;
            border: none;
            font-weight: 600;
        }
        .btn-rose-action:hover {
            background: linear-gradient(135deg, #E11D48, #BE123C);
            color: #FFFFFF !important;
        }

        /* THUMBNAIL PREVIEW */
        .img-thumb-preview {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(56, 189, 248, 0.3);
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        .img-thumb-preview:hover {
            transform: scale(1.08);
            border-color: #38BDF8;
        }
    </style>
</head>
<body>

    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-2.5 sticky-top">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center gap-3">
                <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="/admin/dashboard">
                    <img src="{{ asset('images/logo.png') }}" alt="DOT" style="height: 38px; object-fit: contain;">
                    <span class="fw-bold fs-5 text-white">DOT <span class="text-gradient">Bendahara</span></span>
                </a>
                <span class="badge rounded-pill px-3 py-1.5 d-none d-md-inline-block" style="background: rgba(16, 185, 129, 0.15); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.3); font-size: 0.75rem;">
                    <i class="fa-solid fa-coins me-1"></i> Cashflow & Kas DOT Teens
                </span>
            </div>

            <div class="d-flex align-items-center gap-2 gap-md-3">
                <a href="/admin/dashboard" class="btn btn-sm btn-outline-secondary rounded-pill px-3 d-inline-flex align-items-center gap-1.5" style="font-size: 0.8rem;">
                    <i class="fa-solid fa-arrow-left"></i> <span class="d-none d-sm-inline">Dashboard Utama</span>
                </a>
                <div class="text-end d-none d-sm-block">
                    <div class="text-white fw-bold small">{{ $user->name }}</div>
                    <span class="badge rounded-pill px-2 py-0.5" style="background: rgba(56, 189, 248, 0.15); color:#38BDF8; font-size: 0.7rem;">
                        {{ $user->role == 'super_admin' ? 'Super Admin' : 'Bendahara Tim' }}
                    </span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold d-flex align-items-center gap-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-right-from-bracket"></i> <span class="d-none d-sm-inline">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- ALERT NOTIFIKASI -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" style="background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(16, 185, 129, 0.4) !important; color: #6EE7B7;" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-circle-check fs-4 me-2.5"></i>
                    <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" style="background: rgba(244, 63, 94, 0.2); border: 1px solid rgba(244, 63, 94, 0.4) !important; color: #FDA4AF;" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-triangle-exclamation fs-4 me-2.5"></i>
                    <div>
                        <strong>Ada kesalahan input:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- HEADER SECTION & QUICK ACTIONS -->
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4 pb-2">
            <div>
                <h2 class="fw-bold text-white mb-1">
                    <i class="fa-solid fa-scale-balanced text-info me-2"></i> Cashflow & <span class="text-gradient">Keuangan Bendahara</span>
                </h2>
                <p class="text-light-sub mb-0" style="font-size: 0.92rem;">
                    Pencatatan arus kas masuk (Dana Usaha, Janji Iman, Dana Donatur, Kas Pengerja) serta seluruh pengeluaran operasional DOT Teens secara transparan & akurat.
                </p>
            </div>
            
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-emerald-action rounded-pill px-3.5 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalInflow">
                    <i class="fa-solid fa-circle-arrow-down"></i> <span>+ Catat Pemasukan</span>
                </button>
                <button class="btn btn-rose-action rounded-pill px-3.5 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalExpense">
                    <i class="fa-solid fa-circle-arrow-up"></i> <span>- Catat Pengeluaran</span>
                </button>
                <button class="btn btn-cyan-action rounded-pill px-3 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalPayment">
                    <i class="fa-solid fa-hand-holding-dollar"></i> <span>Bayar Kas Pengerja</span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-outline-info rounded-pill px-3 py-2 d-flex align-items-center gap-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-file-excel"></i> <span>Export Laporan</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="background: #112340; border: 1px solid rgba(56, 189, 248, 0.3);">
                        <li>
                            <a class="dropdown-item text-white py-2" href="{{ route('admin.kas.export_cashflow') }}">
                                <i class="fa-solid fa-file-invoice-dollar text-success me-2"></i> Export Buku Kas (Cash Flow)
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white py-2" href="{{ route('admin.kas.export') }}">
                                <i class="fa-solid fa-users text-info me-2"></i> Export Rekap Iuran Pengerja
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-outline-secondary rounded-pill px-3 py-2 d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#modalSettings">
                    <i class="fa-solid fa-gear"></i> <span class="d-none d-md-inline">Rekening</span>
                </button>
            </div>
        </div>

        <!-- 4 KARTU STATISTIK KEUANGAN & CASHFLOW -->
        <div class="row g-3 mb-4">
            <!-- Saldo Bersih Saat Ini -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-emerald">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label">Saldo Kas Riil Saat Ini</span>
                            <h3 class="fw-bold {{ $saldoAkhir >= 0 ? 'text-white' : 'text-danger' }} mt-1 mb-0">
                                Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(16, 185, 129, 0.15); color: #34D399;">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 d-flex justify-content-between stat-subtext">
                        <span>Total Masuk: <strong class="text-success">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</strong></span>
                        <span>Keluar: <strong class="text-danger">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Total Pemasukan Arus Kas -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-cyan">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label" style="color: #7DD3FC !important;">Total Pemasukan Arus Kas</span>
                            <h3 class="fw-bold text-info mt-1 mb-0">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(56, 189, 248, 0.15); color: #38BDF8;">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext d-flex justify-content-between flex-wrap gap-1" style="font-size: 0.76rem;">
                        <span>Danus: <strong class="text-white">Rp {{ number_format($totalDanaUsaha, 0, ',', '.') }}</strong></span>
                        <span>Janji Iman: <strong class="text-white">Rp {{ number_format($totalJanjiIman, 0, ',', '.') }}</strong></span>
                        <span>Donatur: <strong class="text-white">Rp {{ number_format($totalDonatur, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Total Pengeluaran Kas -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-rose">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label" style="color: #FDA4AF !important;">Total Pengeluaran Kas</span>
                            <h3 class="fw-bold text-danger mt-1 mb-0">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(244, 63, 94, 0.15); color: #FB7185;">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext text-light-sub">
                        <i class="fa-solid fa-receipt text-warning me-1"></i> {{ $allExpenses->total() }} transaksi pengeluaran belanja/operasional
                    </div>
                </div>
            </div>

            <!-- Arus Kas Bulan Berjalan -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card card-amber">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label" style="color: #FCD34D !important;">Arus Kas Bulan Ini ({{ date('F Y') }})</span>
                            <h3 class="fw-bold {{ $netBulanIni >= 0 ? 'text-warning' : 'text-danger' }} mt-1 mb-0">
                                {{ $netBulanIni >= 0 ? '+' : '' }}Rp {{ number_format($netBulanIni, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="stat-icon" style="background: rgba(245, 158, 11, 0.15); color: #F59E0B;">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext d-flex justify-content-between">
                        <span>Masuk: <strong class="text-success">+Rp {{ number_format($masukBulanIni, 0, ',', '.') }}</strong></span>
                        <span>Keluar: <strong class="text-danger">-Rp {{ number_format($keluarBulanIni, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- REKENING BANNER INFO -->
        <div class="glass-card mb-4 py-3 px-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3" style="border-left: 4px solid #38BDF8; background: rgba(13, 28, 51, 0.85);">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-20 text-info p-2.5 rounded-circle fs-5">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div>
                    <div class="small fw-bold text-uppercase" style="color: #93C5FD; letter-spacing: 0.6px;">Rekening Resmi Kas DOT Teens (Janji Iman / Donatur / Iuran):</div>
                    <div class="fw-bold text-white fs-5 mt-0.5">{{ $bankInfo }}</div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3" onclick="copyRekening('{{ $bankInfo }}')">
                    <i class="fa-regular fa-copy me-1"></i> Salin Rekening
                </button>
                <button class="btn btn-sm btn-outline-info rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#modalSettings">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Ubah Info
                </button>
            </div>
        </div>

        <!-- NAVIGATION TABS -->
        <div class="mb-4">
            <ul class="nav nav-pills nav-pills-custom" id="kasTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="tab-cashflow-btn" data-bs-toggle="pill" data-bs-target="#tab-cashflow" type="button">
                        <i class="fa-solid fa-book text-info me-1.5"></i> <strong>Buku Kas (Cashflow Ledger)</strong>
                        <span class="badge bg-primary bg-opacity-30 rounded-pill ms-1 px-2">{{ $ledgerDisplay->count() }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-inflows-btn" data-bs-toggle="pill" data-bs-target="#tab-inflows" type="button">
                        <i class="fa-solid fa-hand-holding-dollar text-success me-1.5"></i> <strong>Pemasukan (Danus, Janji Iman, Donatur)</strong>
                        <span class="badge bg-success bg-opacity-30 rounded-pill ms-1 px-2">{{ $allInflows->total() }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-pengeluaran-btn" data-bs-toggle="pill" data-bs-target="#tab-pengeluaran" type="button">
                        <i class="fa-solid fa-receipt text-danger me-1.5"></i> <strong>Pengeluaran (Belanja & Nota)</strong>
                        <span class="badge bg-danger bg-opacity-30 rounded-pill ms-1 px-2">{{ $allExpenses->total() }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-tunggakan-btn" data-bs-toggle="pill" data-bs-target="#tab-tunggakan" type="button">
                        <i class="fa-brands fa-whatsapp text-success me-1.5 fs-6"></i> <strong>Kas Bulanan Pengerja (WA)</strong>
                        @php
                            $menunggakCount = collect($volunteerSummary)->where('total_tunggakan', '>', 0)->count();
                        @endphp
                        @if($menunggakCount > 0)
                            <span class="badge bg-danger rounded-pill ms-1 px-2">{{ $menunggakCount }} nunggak</span>
                        @endif
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-pengerja-btn" data-bs-toggle="pill" data-bs-target="#tab-pengerja" type="button">
                        <i class="fa-solid fa-users me-1.5 text-secondary"></i> Master Pengerja & Periode
                    </button>
                </li>
                @if($cctv_kas->isNotEmpty())
                <li class="nav-item">
                    <button class="nav-link" id="tab-cctv-btn" data-bs-toggle="pill" data-bs-target="#tab-cctv" type="button">
                        <i class="fa-solid fa-video text-warning me-1.5"></i> CCTV Audit Log
                    </button>
                </li>
                @endif
            </ul>
        </div>

        <div class="tab-content" id="kasTabsContent">

            <!-- ========================================== -->
            <!-- TAB 1: BUKU KAS UMUM (CASH FLOW LEDGER)   -->
            <!-- ========================================== -->
            <div class="tab-pane fade show active" id="tab-cashflow" role="tabpanel">
                <div class="glass-card">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                        <div>
                            <h4 class="fw-bold text-white mb-1"><i class="fa-solid fa-book-open-reader text-info me-2"></i> Buku Kas Umum (General Ledger)</h4>
                            <p class="text-light-sub mb-0 small">Catatan arus kas gabungan pemasukan dan pengeluaran secara kronologis lengkap dengan saldo berjalan.</p>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('admin.kas.export_cashflow') }}" class="btn btn-sm btn-outline-success rounded-pill px-3 d-flex align-items-center gap-1.5">
                                <i class="fa-solid fa-file-csv"></i> Unduh CSV Excel
                            </a>
                        </div>
                    </div>

                    <!-- FILTER BUKU KAS -->
                    <div class="p-3 rounded-4 mb-4" style="background: rgba(13, 28, 51, 0.7); border: 1px solid rgba(56, 189, 248, 0.15);">
                        <form action="/admin/kas" method="GET" class="row g-2 align-items-center">
                            <input type="hidden" name="tab" value="tab-cashflow">
                            <div class="col-12 col-md-3">
                                <label class="small text-muted fw-semibold mb-1">Filter Jenis Transaksi</label>
                                <select name="ledger_type" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="all">⚡ Semua Jenis Arus Kas</option>
                                    <option value="inflow" {{ request('ledger_type') == 'inflow' ? 'selected' : '' }}>🟢 Pemasukan Saja (+)</option>
                                    <option value="expense" {{ request('ledger_type') == 'expense' ? 'selected' : '' }}>🔴 Pengeluaran Saja (-)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="small text-muted fw-semibold mb-1">Filter Kategori Sumber</label>
                                <select name="ledger_cat" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="all">⚡ Semua Kategori</option>
                                    <option value="dana_usaha" {{ request('ledger_cat') == 'dana_usaha' ? 'selected' : '' }}>🛍️ Dana Usaha</option>
                                    <option value="janji_iman" {{ request('ledger_cat') == 'janji_iman' ? 'selected' : '' }}>🙏 Janji Iman</option>
                                    <option value="donatur" {{ request('ledger_cat') == 'donatur' ? 'selected' : '' }}>🎁 Dana Donatur</option>
                                    <option value="kas_volunteer" {{ request('ledger_cat') == 'kas_volunteer' ? 'selected' : '' }}>👥 Kas Pengerja</option>
                                    <option value="pengeluaran" {{ request('ledger_cat') == 'pengeluaran' ? 'selected' : '' }}>💸 Pengeluaran Operasional</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="small text-muted fw-semibold mb-1">Bulan Transaksi</label>
                                <input type="month" name="ledger_month" class="form-control form-control-sm" value="{{ request('ledger_month') }}" onchange="this.form.submit()">
                            </div>
                            <div class="col-12 col-md-3 d-flex align-items-end gap-2">
                                <button type="submit" class="btn btn-sm btn-info rounded-pill px-3 w-50">Terapkan</button>
                                <a href="/admin/kas" class="btn btn-sm btn-outline-secondary rounded-pill px-3 w-50">Reset</a>
                            </div>
                        </form>
                    </div>

                    <!-- TABEL BUKU KAS LEDGER -->
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Tipe & Kategori</th>
                                    <th>Keperluan / Sumber Dana</th>
                                    <th>Pihak Terkait</th>
                                    <th>Nominal (Rp)</th>
                                    <th>Saldo Berjalan</th>
                                    <th>Bukti / Nota</th>
                                    <th>Pencatat</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ledgerDisplay as $item)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-white">{{ date('d M Y', strtotime($item->date)) }}</div>
                                            <span class="text-muted small" style="font-size: 0.72rem;">{{ date('H:i', strtotime($item->created_at)) }}</span>
                                        </td>
                                        <td>
                                            @if($item->type === 'inflow')
                                                <span class="badge badge-inflow mb-1 d-inline-block">
                                                    <i class="fa-solid fa-arrow-down me-1"></i> MASUK
                                                </span>
                                            @else
                                                <span class="badge badge-expense mb-1 d-inline-block">
                                                    <i class="fa-solid fa-arrow-up me-1"></i> KELUAR
                                                </span>
                                            @endif
                                            <div>
                                                <span class="pill-mini" style="background: {{ $item->category_bg }}; color: {{ $item->category_color }};">
                                                    <i class="fa-solid {{ $item->category_icon }}"></i> {{ $item->category_label }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-white fs-6">{{ $item->title }}</div>
                                            @if($item->notes)
                                                <div class="text-muted small text-truncate" style="max-width: 250px;" title="{{ $item->notes }}">
                                                    <i class="fa-regular fa-comment-dots me-1"></i> {{ $item->notes }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-light fw-medium">{{ $item->person }}</span>
                                            <div class="text-muted small">
                                                <i class="fa-solid fa-receipt me-1"></i> {{ strtoupper($item->payment_method) }}
                                            </div>
                                        </td>
                                        <td>
                                            @if($item->type === 'inflow')
                                                <span class="fw-bold text-success fs-6">+Rp {{ number_format($item->amount, 0, ',', '.') }}</span>
                                            @else
                                                <span class="fw-bold text-danger fs-6">-Rp {{ number_format($item->amount, 0, ',', '.') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-bold text-info">Rp {{ number_format($item->running_balance, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            @if($item->proof_url)
                                                <img src="{{ $item->proof_url }}" alt="Bukti" class="img-thumb-preview" onclick="openLightbox('{{ $item->proof_url }}', '{{ $item->title }}')" title="Klik untuk memperbesar">
                                            @else
                                                <span class="text-secondary small fst-italic">Tanpa Foto</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted small">{{ $item->recorded_by }}</span>
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ $item->delete_route }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data transaksi ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1.5" title="Hapus Transaksi">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fa-solid fa-inbox fs-1 mb-3 d-block text-secondary"></i>
                                                <h5>Belum Ada Catatan Transaksi Cashflow</h5>
                                                <p class="small">Klik tombol "+ Catat Pemasukan" atau "- Catat Pengeluaran" di bagian atas untuk memulai pembukuan.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 2: PEMASUKAN (DANUS, JANJI IMAN, DONATUR) -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-inflows" role="tabpanel">
                <div class="glass-card">
                    <!-- 3 KARTU KATEGORI PEMASUKAN -->
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-md-4">
                            <div class="stat-card" style="border-left: 4px solid #3B82F6; background: rgba(59, 130, 246, 0.08) !important;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="stat-label" style="color: #93C5FD !important;">1. Total Dana Usaha (Danus)</span>
                                        <h4 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalDanaUsaha, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="stat-icon" style="background: rgba(59, 130, 246, 0.2); color: #60A5FA;">
                                        <i class="fa-solid fa-store"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-muted small">Penjualan makanan, merch, kaos, & fundraising</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="stat-card" style="border-left: 4px solid #A855F7; background: rgba(168, 85, 247, 0.08) !important;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="stat-label" style="color: #D8B4FE !important;">2. Total Janji Iman</span>
                                        <h4 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalJanjiIman, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="stat-icon" style="background: rgba(168, 85, 247, 0.2); color: #C084FC;">
                                        <i class="fa-solid fa-hand-holding-heart"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-muted small">Komitmen iman pribadi / keluarga untuk pemuda</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="stat-card" style="border-left: 4px solid #10B981; background: rgba(16, 185, 129, 0.08) !important;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="stat-label" style="color: #6EE7B7 !important;">3. Total Dana Donatur</span>
                                        <h4 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalDonatur, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="stat-icon" style="background: rgba(16, 185, 129, 0.2); color: #34D399;">
                                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-muted small">Donasi sukarela orang tua, simpatisan & sponsor</div>
                            </div>
                        </div>
                    </div>

                    <!-- FILTER & SEARCH BAR INFLOWS -->
                    <div class="row g-3 align-items-center justify-content-between mb-4">
                        <div class="col-12 col-md-7">
                            <form action="/admin/kas" method="GET" class="d-flex flex-wrap gap-2">
                                <input type="hidden" name="tab" value="tab-inflows">
                                <div class="input-group" style="max-width: 280px;">
                                    <span class="input-group-text border-secondary" style="background-color: #172A46 !important; color: #38BDF8 !important;"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="inflow_search" class="form-control form-control-sm" placeholder="Cari donatur / judul..." value="{{ request('inflow_search') }}">
                                </div>
                                <select name="inflow_cat" class="form-select form-select-sm" style="max-width: 190px;" onchange="this.form.submit()">
                                    <option value="all">⚡ Semua Kategori</option>
                                    <option value="dana_usaha" {{ request('inflow_cat') == 'dana_usaha' ? 'selected' : '' }}>🛍️ Dana Usaha</option>
                                    <option value="janji_iman" {{ request('inflow_cat') == 'janji_iman' ? 'selected' : '' }}>🙏 Janji Iman</option>
                                    <option value="donatur" {{ request('inflow_cat') == 'donatur' ? 'selected' : '' }}>🎁 Dana Donatur</option>
                                    <option value="lain_lain" {{ request('inflow_cat') == 'lain_lain' ? 'selected' : '' }}>📦 Lainnya</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-info rounded-pill px-3">Filter</button>
                                @if(request('inflow_search') || request('inflow_cat'))
                                    <a href="/admin/kas?tab=tab-inflows" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-5 text-md-end">
                            <button class="btn btn-sm btn-emerald-action rounded-pill px-3 py-1.5" data-bs-toggle="modal" data-bs-target="#modalInflow">
                                <i class="fa-solid fa-plus-circle me-1"></i> Catat Pemasukan Baru
                            </button>
                        </div>
                    </div>

                    <!-- TABEL DAFTAR PEMASUKAN -->
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal Terima</th>
                                    <th>Kategori</th>
                                    <th>Judul & Uraian</th>
                                    <th>Donatur / Pembeli / PIC</th>
                                    <th>Metode Bayar</th>
                                    <th>Nominal</th>
                                    <th>Bukti Transfer</th>
                                    <th>Dicatat Oleh</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allInflows as $inf)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-white">{{ $inf->received_date->format('d M Y') }}</div>
                                        </td>
                                        <td>
                                            <span class="pill-mini" style="background: {{ $inf->category_info['bg'] }}; border: 1px solid {{ $inf->category_info['border'] }}; color: {{ $inf->category_info['color'] }};">
                                                <i class="fa-solid {{ $inf->category_info['icon'] }}"></i> {{ $inf->category_info['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-white">{{ $inf->title }}</div>
                                            @if($inf->notes)
                                                <div class="text-muted small text-truncate" style="max-width: 250px;">
                                                    <i class="fa-regular fa-comment me-1"></i> {{ $inf->notes }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-white">{{ $inf->payer_name ?: 'Donatur Anonim' }}</div>
                                            @if($inf->phone)
                                                <span class="text-muted small"><i class="fa-brands fa-whatsapp text-success me-1"></i> {{ $inf->phone }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-dark border border-secondary text-info px-2.5 py-1 rounded-pill">
                                                <i class="fa-solid {{ $inf->payment_method_badge['icon'] }} me-1"></i> {{ $inf->payment_method_badge['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-success fs-6">+Rp {{ number_format($inf->amount, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            @if($inf->proof_url)
                                                <img src="{{ $inf->proof_url }}" alt="Bukti" class="img-thumb-preview" onclick="openLightbox('{{ $inf->proof_url }}', '{{ $inf->title }}')" title="Klik untuk memperbesar">
                                            @else
                                                <span class="text-secondary small fst-italic">Tanpa Foto</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted small">{{ $inf->recorded_by }}</span>
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.kas.inflow.delete', $inf->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data pemasukan ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1.5" title="Hapus Data">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fa-solid fa-hand-holding-dollar fs-1 mb-3 d-block text-secondary"></i>
                                                <h5>Belum Ada Data Pemasukan</h5>
                                                <p class="small">Catat pemasukan dari penjualan dana usaha, komitmen janji iman, atau donasi dengan klik tombol di atas.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($allInflows->hasPages())
                        <div class="mt-4">
                            {{ $allInflows->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 3: PENGELUARAN (DUIT KELUAR & NOTA)   -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-pengeluaran" role="tabpanel">
                <div class="glass-card">
                    <!-- RANGKUMAN PENGELUARAN PER KATEGORI -->
                    <div class="mb-4">
                        <div class="small fw-bold text-uppercase text-secondary mb-2" style="letter-spacing: 0.6px;">
                            <i class="fa-solid fa-pie-chart text-warning me-1"></i> Rincian Pengeluaran Duit Berdasarkan Kategori Keperluan:
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($expensesByCategory as $ec)
                                <div class="px-3 py-2 rounded-3 border border-secondary border-opacity-25" style="background: rgba(17, 35, 64, 0.7);">
                                    <span class="text-muted small d-block">{{ $ec->category }}</span>
                                    <strong class="text-danger fs-6">Rp {{ number_format($ec->total_amount, 0, ',', '.') }}</strong>
                                    <span class="text-secondary small">({{ $ec->total_tx }} nota)</span>
                                </div>
                            @empty
                                <span class="text-muted small">Belum ada pengeluaran yang tercatat.</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- FILTER & PENCARIAN PENGELUARAN -->
                    <div class="row g-3 align-items-center justify-content-between mb-4">
                        <div class="col-12 col-md-7">
                            <form action="/admin/kas" method="GET" class="d-flex flex-wrap gap-2">
                                <input type="hidden" name="tab" value="tab-pengeluaran">
                                <div class="input-group" style="max-width: 280px;">
                                    <span class="input-group-text border-secondary" style="background-color: #172A46 !important; color: #38BDF8 !important;"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="expense_search" class="form-control form-control-sm" placeholder="Cari keperluan belanja..." value="{{ request('expense_search') }}">
                                </div>
                                <select name="expense_cat" class="form-select form-select-sm" style="max-width: 190px;" onchange="this.form.submit()">
                                    <option value="all">⚡ Semua Kategori</option>
                                    <option value="Konsumsi" {{ request('expense_cat') == 'Konsumsi' ? 'selected' : '' }}>🍔 Konsumsi</option>
                                    <option value="Acara & Revival" {{ request('expense_cat') == 'Acara & Revival' ? 'selected' : '' }}>🎉 Acara & Revival</option>
                                    <option value="Logistik & Perlengkapan" {{ request('expense_cat') == 'Logistik & Perlengkapan' ? 'selected' : '' }}>📦 Logistik</option>
                                    <option value="Multimedia & Desain" {{ request('expense_cat') == 'Multimedia & Desain' ? 'selected' : '' }}>🎨 Multimedia</option>
                                    <option value="Musik & Sound" {{ request('expense_cat') == 'Musik & Sound' ? 'selected' : '' }}>🎸 Musik & Sound</option>
                                    <option value="Modal Dana Usaha" {{ request('expense_cat') == 'Modal Dana Usaha' ? 'selected' : '' }}>🛍️ Modal Danus</option>
                                    <option value="Transportasi & Operasional" {{ request('expense_cat') == 'Transportasi & Operasional' ? 'selected' : '' }}>⚡ Operasional</option>
                                    <option value="Diakonia & Kasih" {{ request('expense_cat') == 'Diakonia & Kasih' ? 'selected' : '' }}>❤️ Diakonia</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-info rounded-pill px-3">Filter</button>
                                @if(request('expense_search') || request('expense_cat'))
                                    <a href="/admin/kas?tab=tab-pengeluaran" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-5 text-md-end">
                            <button class="btn btn-sm btn-rose-action rounded-pill px-3 py-1.5" data-bs-toggle="modal" data-bs-target="#modalExpense">
                                <i class="fa-solid fa-plus-circle me-1"></i> Catat Pengeluaran Baru
                            </button>
                        </div>
                    </div>

                    <!-- TABEL PENGELUARAN -->
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kategori Keperluan</th>
                                    <th>Keperluan / Rincian Duit</th>
                                    <th>Nominal</th>
                                    <th>Foto Nota / Struk</th>
                                    <th>Dicatat Oleh</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allExpenses as $exp)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-white">{{ $exp->expense_date->format('d M Y') }}</div>
                                        </td>
                                        <td>
                                            <span class="pill-mini" style="background: {{ $exp->category_info['bg'] }}; border: 1px solid {{ $exp->category_info['border'] }}; color: {{ $exp->category_info['color'] }};">
                                                <i class="fa-solid {{ $exp->category_info['icon'] }}"></i> {{ $exp->category_info['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-white fs-6">{{ $exp->title }}</div>
                                            @if($exp->notes)
                                                <div class="text-muted small text-truncate" style="max-width: 300px;">
                                                    <i class="fa-regular fa-file-lines me-1"></i> {{ $exp->notes }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-bold text-danger fs-6">-Rp {{ number_format($exp->amount, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            @if($exp->receipt_url)
                                                <img src="{{ $exp->receipt_url }}" alt="Nota" class="img-thumb-preview" onclick="openLightbox('{{ $exp->receipt_url }}', '{{ $exp->title }}')" title="Klik untuk memperbesar nota">
                                            @else
                                                <span class="text-secondary small fst-italic">Tanpa Nota</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted small">{{ $exp->recorded_by }}</span>
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.kas.expense.delete', $exp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengeluaran ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1.5" title="Hapus Data">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fa-solid fa-receipt fs-1 mb-3 d-block text-secondary"></i>
                                                <h5>Belum Ada Catatan Pengeluaran Kas</h5>
                                                <p class="small">Catat setiap pengeluaran kas tim agar laporan keuangan selalu seimbang dan transparan.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($allExpenses->hasPages())
                        <div class="mt-4">
                            {{ $allExpenses->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 4: KAS VOLUNTEER (PENGERJA & WA)       -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-tunggakan" role="tabpanel">
                <div class="glass-card">
                    <!-- FILTER VOLUNTEER -->
                    <div class="row g-3 align-items-center justify-content-between mb-4">
                        <div class="col-12 col-md-7">
                            <form action="/admin/kas" method="GET" class="d-flex flex-wrap gap-2">
                                <input type="hidden" name="tab" value="tab-tunggakan">
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
                                    <a href="/admin/kas?tab=tab-tunggakan" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-5 text-md-end d-flex justify-content-md-end gap-2 flex-wrap">
                            <button class="btn btn-sm btn-outline-info rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                <i class="fa-solid fa-user-plus me-1"></i> Tambah Pengerja
                            </button>
                            <form action="{{ route('admin.kas.sync') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-secondary rounded-pill px-3" title="Impor otomatis pengurus website yang sudah approved">
                                    <i class="fa-solid fa-rotate me-1"></i> Sync Pengurus
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
                                    <th>Rincian Tunggakan</th>
                                    <th>Total Tagihan</th>
                                    <th class="text-end">Aksi Cepat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($volunteerSummary as $item)
                                    @php
                                        $v = $item['model'];
                                        $unpaid = $item['unpaid_periods'];
                                        $tunggakan = $item['total_tunggakan'];
                                        $waLink = $item['wa_link'];
                                        $isLunas = ($tunggakan == 0);
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2.5">
                                                <div class="bg-primary bg-opacity-20 text-info rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; font-size: 0.9rem;">
                                                    {{ strtoupper(substr($v->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-white fs-6">{{ $v->name }}</div>
                                                    <span class="text-muted small" style="font-size: 0.72rem;">Iuran: Rp {{ number_format($v->monthly_due, 0, ',', '.') }}/bln</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill px-2.5 py-1" style="background: rgba(56, 189, 248, 0.12); color: #7DD3FC; border: 1px solid rgba(56, 189, 248, 0.25);">
                                                {{ $v->division }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $v->phone)) }}" target="_blank" class="text-decoration-none text-light-sub">
                                                <i class="fa-brands fa-whatsapp text-success me-1"></i> {{ $v->phone }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($isLunas)
                                                <span class="badge-status badge-lunas">
                                                    <i class="fa-solid fa-circle-check"></i> LUNAS
                                                </span>
                                            @else
                                                <span class="badge-status badge-tunggak">
                                                    <i class="fa-solid fa-clock"></i> {{ $unpaid->count() }} Periode Menunggak
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($isLunas)
                                                <span class="text-success small fw-semibold"><i class="fa-solid fa-check-double me-1"></i> Semua periode terbayar</span>
                                            @else
                                                <div class="d-flex flex-wrap gap-1" style="max-width: 250px;">
                                                    @foreach($unpaid as $up)
                                                        <span class="badge bg-danger bg-opacity-20 text-danger border border-danger border-opacity-25" style="font-size: 0.7rem;">
                                                            {{ $up->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($isLunas)
                                                <span class="text-muted small">-</span>
                                            @else
                                                <span class="fw-bold text-danger fs-6">Rp {{ number_format($tunggakan, 0, ',', '.') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-1.5 align-items-center">
                                                @if(!$isLunas)
                                                    <a href="{{ route('admin.kas.send_wa', $v->id) }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3 fw-semibold d-inline-flex align-items-center gap-1.5 shadow-sm" style="background: linear-gradient(135deg, #10B981, #059669); border:none;" title="Kirim Pesan WhatsApp Pengingat">
                                                        <i class="fa-brands fa-whatsapp fs-6"></i> <span>Kirim WA</span>
                                                    </a>
                                                @endif
                                                <button type="button" class="btn btn-sm btn-outline-info rounded-pill px-2.5 py-1" onclick="quickPay({{ $v->id }}, '{{ addslashes($v->name) }}', {{ json_encode($unpaid->pluck('id')) }})" title="Catat Bayar">
                                                    <i class="fa-solid fa-plus-circle me-1"></i> Bayar
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle p-1.5" onclick="editVolunteer({{ json_encode($v) }})" title="Edit Data">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fa-solid fa-users fs-1 mb-3 d-block text-secondary"></i>
                                                <h5>Belum Ada Data Pengerja</h5>
                                                <p class="small">Gunakan tombol "Sync Pengurus" atau "Tambah Pengerja" untuk memasukkan data.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 5: MASTER PENGERJA & PERIODE KAS       -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-pengerja" role="tabpanel">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="glass-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-users-gear text-info me-2"></i> Master Data Pengerja ({{ $volunteers->count() }})</h5>
                                <button class="btn btn-sm btn-info rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                    <i class="fa-solid fa-plus me-1"></i> Pengerja Baru
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-custom align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nama Pengerja</th>
                                            <th>Divisi</th>
                                            <th>WhatsApp</th>
                                            <th>Nominal Kas</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($volunteers as $v)
                                            <tr>
                                                <td class="fw-bold text-white">{{ $v->name }}</td>
                                                <td><span class="badge bg-secondary">{{ $v->division }}</span></td>
                                                <td class="text-light-sub">{{ $v->phone }}</td>
                                                <td>Rp {{ number_format($v->monthly_due, 0, ',', '.') }}</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-outline-warning rounded-circle p-1.5" onclick="editVolunteer({{ json_encode($v) }})">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <form action="{{ route('admin.kas.volunteer.delete', $v->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengerja {{ $v->name }} dari sistem kas?')">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1.5">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="glass-card mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-calendar-days text-info me-2"></i> Periode Kas</h5>
                                <button class="btn btn-sm btn-outline-info rounded-pill px-2.5" data-bs-toggle="modal" data-bs-target="#modalPeriod">
                                    <i class="fa-solid fa-plus me-1"></i> Buka Periode
                                </button>
                            </div>
                            <div class="list-group list-group-flush bg-transparent">
                                @forelse($allPeriods as $p)
                                    <div class="list-group-item bg-transparent text-white border-secondary border-opacity-25 px-0 py-2.5 d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-semibold">{{ $p->name }}</div>
                                            <span class="text-muted small">Jatuh Tempo: {{ $p->due_date ? date('d M Y', strtotime($p->due_date)) : '-' }}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-primary bg-opacity-20 text-info fw-bold">Rp {{ number_format($p->amount, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted small mb-0">Belum ada periode kas dibuka.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 6: CCTV AUDIT LOG                      -->
            <!-- ========================================== -->
            @if($cctv_kas->isNotEmpty())
            <div class="tab-pane fade" id="tab-cctv" role="tabpanel">
                <div class="glass-card">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-video text-warning me-2"></i> CCTV Audit Trail Keuangan</h5>
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>User Pelaku</th>
                                    <th>Aksi Transaksi</th>
                                    <th>Deskripsi Rincian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cctv_kas as $log)
                                    <tr>
                                        <td class="text-muted small">{{ $log->created_at->format('d M Y H:i:s') }}</td>
                                        <td>
                                            <span class="fw-bold text-white">{{ $log->user_name }}</span>
                                            <span class="badge bg-secondary ms-1">{{ $log->role }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info bg-opacity-20 text-info">{{ $log->action }}</span>
                                        </td>
                                        <td class="text-light-sub small">{{ $log->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <!-- ==================== MODALS ==================== -->

    <!-- 1. MODAL CATAT PEMASUKAN BARU (DANA USAHA, JANJI IMAN, DONATUR) -->
    <div class="modal fade" id="modalInflow" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white">
                        <i class="fa-solid fa-circle-dollar-to-slot text-success me-2"></i> Catat Pemasukan Kas / Cashflow
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.inflow.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted">Kategori Sumber Pemasukan *</label>
                                <select name="category" id="inflow_category_select" class="form-select" required onchange="updateInflowLabels()">
                                    <option value="dana_usaha">🛍️ Dana Usaha (Danus / Penjualan / Bazaar)</option>
                                    <option value="janji_iman">🙏 Janji Iman (Komitmen Iman Pribadi)</option>
                                    <option value="donatur">🎁 Dana Donatur / Donasi Sukarela</option>
                                    <option value="lain_lain">📦 Pemasukan Lain-lain</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted" id="inflow_title_label">Judul / Kegiatan Pemasukan *</label>
                                <input type="text" name="title" id="inflow_title_input" class="form-control" placeholder="Contoh: Penjualan Kaos DOT / Janji Iman Maret" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted" id="inflow_payer_label">Nama Donatur / Pembeli / PIC</label>
                                <input type="text" name="payer_name" class="form-control" placeholder="Contoh: Bpk. Yohanes / Kak Kevin">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted">Nomor WhatsApp / HP (Opsional)</label>
                                <input type="text" name="phone" class="form-control" placeholder="08123456789">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Nominal Masuk (Rp) *</label>
                                <input type="number" name="amount" class="form-control" placeholder="100000" min="1" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Tanggal Terima *</label>
                                <input type="date" name="received_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Metode Pembayaran *</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="transfer">💳 Transfer Bank</option>
                                    <option value="cash">💵 Tunai / Cash</option>
                                    <option value="qris">📱 QRIS</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Foto Bukti Transfer / Kwitansi / Struk (Opsional)</label>
                                <input type="file" name="proof_image" class="form-control" accept="image/*">
                                <span class="text-muted small" style="font-size: 0.72rem;">Format: JPG, PNG, WEBP (Maksimal 5MB)</span>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Catatan / Peruntukan Khusus (Opsional)</label>
                                <textarea name="notes" class="form-control" rows="2" placeholder="Catatan tambahan, misalnya: titipan untuk sound system / persembahan syukur ulang tahun..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-emerald-action rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-check me-1"></i> Simpan Pemasukan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 2. MODAL CATAT PENGELUARAN KAS (DUIT KELUAR UNTUK APA AJA) -->
    <div class="modal fade" id="modalExpense" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white">
                        <i class="fa-solid fa-receipt text-danger me-2"></i> Catat Pengeluaran Kas (Buku Kas Keluar)
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.expense.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-8">
                                <label class="form-label small fw-semibold text-muted">Keperluan Pengeluaran (Duitnya untuk apa) *</label>
                                <input type="text" name="title" class="form-control" placeholder="Contoh: Beli konsumsi rapat pengerja / Sewa kabel audio" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Nominal Keluar (Rp) *</label>
                                <input type="number" name="amount" class="form-control" placeholder="75000" min="1" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted">Kategori Keperluan *</label>
                                <select name="category" class="form-select" required>
                                    <option value="Konsumsi">🍔 Konsumsi (Makan / Minum Pengerja)</option>
                                    <option value="Acara & Revival">🎉 Acara, Doorprize & Souvenir</option>
                                    <option value="Logistik & Perlengkapan">📦 Logistik, Kabel & Perlengkapan</option>
                                    <option value="Multimedia & Desain">🎨 Multimedia, Desain & Banner</option>
                                    <option value="Musik & Sound">🎸 Musik & Sound System</option>
                                    <option value="Modal Dana Usaha">🛍️ Modal Bahan Dana Usaha</option>
                                    <option value="Transportasi & Operasional">⚡ Transportasi & Operasional</option>
                                    <option value="Diakonia & Kasih">❤️ Diakonia & Tanda Kasih</option>
                                    <option value="Lainnya">📦 Lainnya</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted">Tanggal Pengeluaran *</label>
                                <input type="date" name="expense_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Foto Nota / Struk / Kwitansi Fisik (Opsional)</label>
                                <input type="file" name="receipt_image" class="form-control" accept="image/*">
                                <span class="text-muted small" style="font-size: 0.72rem;">Unggah foto struk/bon belanja sebagai bukti pertanggungjawaban audit bendahara.</span>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Rincian Barang / Keterangan Belanja</label>
                                <textarea name="notes" class="form-control" rows="2" placeholder="Contoh: 10 porsi nasi uduk @ Rp 15.000 + es teh untuk pengerja ibadah sabtu..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-rose-action rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-check me-1"></i> Simpan Pengeluaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 3. MODAL CATAT PEMBAYARAN KAS PENGERJA -->
    <div class="modal fade" id="modalPayment" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-money-bill-wave text-success me-2"></i> Bayar Kas Pengerja</h5>
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
                            <label class="form-label small fw-semibold text-muted">Pilih Periode Kas (Bisa lebih dari 1)</label>
                            <div class="bg-dark bg-opacity-50 p-3 rounded-3 border border-secondary border-opacity-25" style="max-height: 180px; overflow-y: auto;">
                                @foreach($allPeriods as $p)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input period-checkbox" type="checkbox" name="period_ids[]" value="{{ $p->id }}" id="period_{{ $p->id }}">
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
                            <label class="form-label small fw-semibold text-muted">Bukti Transfer (Opsional)</label>
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

    <!-- 4. MODAL TAMBAH / EDIT PENGERJA -->
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
                            <label class="form-label small fw-semibold text-muted">Nomor WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-success"><i class="fa-brands fa-whatsapp"></i></span>
                                <input type="text" name="phone" id="vol_phone" class="form-control" placeholder="08123456789" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Divisi Pelayanan</label>
                            <input type="text" name="division" id="vol_division" class="form-control" placeholder="Contoh: Usher / Singer / Multimedia" required>
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
                            <i class="fa-solid fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 5. MODAL TAMBAH PERIODE KAS -->
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

    <!-- 6. MODAL PENGATURAN REKENING -->
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
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Nominal Kas Standar (Rp)</label>
                            <input type="number" name="default_nominal" class="form-control" value="{{ $defaultNominal }}" min="1000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 7. MODAL LIGHTBOX / IMAGE PREVIEW -->
    <div class="modal fade" id="modalImagePreview" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-center">
                <div class="modal-header py-2">
                    <h6 class="modal-title text-white" id="lightboxTitle">Bukti Transaksi</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-2 bg-black bg-opacity-50">
                    <img id="lightboxImage" src="" alt="Bukti" class="img-fluid rounded-3" style="max-height: 80vh; object-fit: contain;">
                </div>
                <div class="modal-footer py-2 justify-content-between">
                    <a id="lightboxDownload" href="" target="_blank" class="btn btn-sm btn-outline-info rounded-pill px-3">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka Ukuran Penuh
                    </a>
                    <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Copy rekening ke clipboard
        function copyRekening(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Nomor rekening berhasil disalin: ' + text);
            }).catch(err => {
                prompt('Salin nomor rekening:', text);
            });
        }

        // Buka Lightbox preview gambar bukti / nota
        function openLightbox(imageUrl, title) {
            document.getElementById('lightboxImage').src = imageUrl;
            document.getElementById('lightboxTitle').innerText = title || 'Bukti Transaksi';
            document.getElementById('lightboxDownload').href = imageUrl;
            const modal = new bootstrap.Modal(document.getElementById('modalImagePreview'));
            modal.show();
        }

        // Penyesuaian label otomatis di modal inflow
        function updateInflowLabels() {
            const cat = document.getElementById('inflow_category_select').value;
            const titleLabel = document.getElementById('inflow_title_label');
            const titleInput = document.getElementById('inflow_title_input');
            const payerLabel = document.getElementById('inflow_payer_label');

            if (cat === 'dana_usaha') {
                titleLabel.innerText = 'Nama Usaha / Penjualan *';
                titleInput.placeholder = 'Contoh: Penjualan Makanan Danus Revival / Kaos DOT';
                payerLabel.innerText = 'PIC / Penanggung Jawab Penjualan';
            } else if (cat === 'janji_iman') {
                titleLabel.innerText = 'Keperluan Janji Iman *';
                titleInput.placeholder = 'Contoh: Janji Iman Bulanan / Revival DOT';
                payerLabel.innerText = 'Nama Pemberi Janji Iman';
            } else if (cat === 'donatur') {
                titleLabel.innerText = 'Peruntukan Donasi *';
                titleInput.placeholder = 'Contoh: Donasi Fasilitas Ibadah / Sound System';
                payerLabel.innerText = 'Nama Donatur / Hamba Tuhan / Perorangan';
            } else {
                titleLabel.innerText = 'Judul Pemasukan *';
                titleInput.placeholder = 'Contoh: Kas Khusus / Bunga Simpanan';
                payerLabel.innerText = 'Nama Penyetor / Sumber';
            }
        }

        // Quick Pay Modal
        function quickPay(volunteerId, volunteerName, unpaidPeriodIds) {
            document.getElementById('pay_volunteer_id').value = volunteerId;
            document.querySelectorAll('.period-checkbox').forEach(cb => cb.checked = false);

            if (unpaidPeriodIds && unpaidPeriodIds.length > 0) {
                unpaidPeriodIds.forEach(id => {
                    const cb = document.getElementById('period_' + id);
                    if (cb) cb.checked = true;
                });
            } else {
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

        // Reset form volunteer
        document.getElementById('modalVolunteer').addEventListener('hidden.bs.modal', function () {
            document.getElementById('modalVolunteerTitle').innerHTML = '<i class="fa-solid fa-user-plus text-info me-2"></i> Tambah Pengerja Baru';
            document.getElementById('formVolunteer').action = '{{ route("admin.kas.volunteer.store") }}';
            document.getElementById('vol_name').value = '';
            document.getElementById('vol_phone').value = '';
            document.getElementById('vol_division').value = '';
            document.getElementById('vol_notes').value = '';
            document.getElementById('vol_edit_extra').style.display = 'none';
        });

        // Buka tab berdasarkan parameter URL ?tab=...
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam) {
                const triggerEl = document.querySelector('#kasTabs button[data-bs-target="#' + tabParam + '"]');
                if (triggerEl) {
                    bootstrap.Tab.getOrCreateInstance(triggerEl).show();
                }
            }
        });
    </script>
</body>
</html>
