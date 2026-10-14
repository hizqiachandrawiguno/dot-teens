<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="theme-color" content="#0B132B">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Bendahara & Cash Flow Management — DOT Teens</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Bootstrap 5.3 & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-accent: #2563EB;
            --bg-navy: #0B132B;
            --card-bg: #111C2E;
            --card-border: rgba(255, 255, 255, 0.08);
            --navy-input: #0D1726;
            --text-light: #F8FAFC;
            --text-muted: #94A3B8;
        }

        body {
            background-color: #0B132B !important;
            color: #F8FAFC !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
        }

        .navbar-custom {
            background: #0D1726;
            border-bottom: 1px solid var(--card-border);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        }

        .glass-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            transition: border-color 0.2s ease;
        }
        .glass-card:hover {
            border-color: rgba(255, 255, 255, 0.15);
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
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            display: block;
            margin-bottom: 4px;
        }
        .stat-subtext {
            color: #94A3B8 !important;
            font-size: 0.8rem !important;
            font-weight: 500 !important;
        }

        /* STAT CARDS */
        .stat-card {
            background: var(--card-bg) !important;
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 20px 22px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            border-color: rgba(255, 255, 255, 0.16);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            background: rgba(255, 255, 255, 0.05);
            color: #94A3B8;
        }

        /* PILL MINI BADGE */
        .pill-mini {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 2px 9px;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #94A3B8 !important;
        }
        .pill-mini i {
            color: #64748B !important;
        }

        /* TABS CUSTOM */
        .nav-pills-custom {
            gap: 6px;
            background: rgba(255, 255, 255, 0.03);
            padding: 6px;
            border-radius: 14px;
            border: 1px solid var(--card-border);
            display: flex;
            flex-wrap: wrap;
        }
        .nav-pills-custom .nav-link {
            color: #94A3B8;
            font-weight: 500;
            font-size: 0.85rem;
            border-radius: 10px;
            padding: 8px 16px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .nav-pills-custom .nav-link i {
            color: #64748B;
            transition: color 0.2s ease;
        }
        .nav-pills-custom .nav-link:hover {
            color: #F8FAFC;
            background: rgba(255, 255, 255, 0.05);
        }
        .nav-pills-custom .nav-link:hover i {
            color: #CBD5E1;
        }
        .nav-pills-custom .nav-link.active {
            color: #FFFFFF !important;
            background: #2563EB !important;
            box-shadow: none !important;
            font-weight: 600;
        }
        .nav-pills-custom .nav-link.active i {
            color: #FFFFFF !important;
        }

        /* TABLE CUSTOM WITH CLEAN CONTRAST */
        .table, .table-custom {
            --bs-table-bg: transparent !important;
            --bs-table-accent-bg: transparent !important;
            --bs-table-striped-bg: transparent !important;
            --bs-table-hover-bg: #16243A !important;
            --bs-table-color: #F8FAFC !important;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 6px;
        }
        .table-custom thead th {
            background-color: #0D1726 !important;
            color: #94A3B8 !important;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 12px 16px;
        }
        .table-custom tbody tr, .table-custom tbody td {
            background-color: #111C2E !important;
            color: #F8FAFC !important;
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }
        .table-custom tbody tr:hover td {
            background-color: #16243A !important;
        }
        .table-custom tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            font-size: 0.86rem;
        }
        .table-custom tbody tr td:first-child {
            border-left: 1px solid rgba(255, 255, 255, 0.04);
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .table-custom tbody tr td:last-child {
            border-right: 1px solid rgba(255, 255, 255, 0.04);
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* BADGES */
        .badge-status {
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.74rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .badge-lunas {
            background: rgba(16, 185, 129, 0.12);
            color: #34D399;
            border: 1px solid rgba(16, 185, 129, 0.25);
        }
        .badge-tunggak {
            background: rgba(244, 63, 94, 0.12);
            color: #FB7185;
            border: 1px solid rgba(244, 63, 94, 0.25);
        }
        .badge-inflow {
            background: rgba(16, 185, 129, 0.12);
            color: #34D399;
            border: 1px solid rgba(16, 185, 129, 0.25);
            font-size: 0.72rem;
            font-weight: 600;
        }
        .badge-expense {
            background: rgba(244, 63, 94, 0.12);
            color: #FB7185;
            border: 1px solid rgba(244, 63, 94, 0.25);
            font-size: 0.72rem;
            font-weight: 600;
        }

        /* BADGE PERIODE RINCIAN KAS */
        .badge-period-lunas {
            background: rgba(16, 185, 129, 0.15) !important;
            color: #34D399 !important;
            border: 1px solid rgba(16, 185, 129, 0.35) !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            padding: 4px 9px !important;
            border-radius: 6px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 5px !important;
            white-space: nowrap !important;
            text-decoration: none !important;
        }
        .badge-period-sebagian {
            background: rgba(245, 158, 11, 0.18) !important;
            color: #FBBF24 !important;
            border: 1px solid rgba(245, 158, 11, 0.4) !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            padding: 4px 9px !important;
            border-radius: 6px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 5px !important;
            white-space: nowrap !important;
            text-decoration: none !important;
        }
        .badge-period-tunggak {
            background: rgba(244, 63, 94, 0.15) !important;
            color: #FB7185 !important;
            border: 1px solid rgba(244, 63, 94, 0.35) !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            padding: 4px 9px !important;
            border-radius: 6px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 5px !important;
            white-space: nowrap !important;
            text-decoration: none !important;
        }

        /* MODAL DARK STYLING */
        .modal-content {
            background-color: #111C2E;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6);
            color: #F8FAFC;
        }
        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 18px 24px;
        }
        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 14px 24px;
        }
        .form-control, .form-select {
            background-color: #0D1726 !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            color: #F8FAFC !important;
            border-radius: 10px;
            padding: 8px 12px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2563EB !important;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2) !important;
        }
        .form-control::placeholder {
            color: #64748B !important;
        }

        /* UNIFIED BUTTONS */
        .btn-action-primary {
            background: #2563EB;
            color: #FFFFFF !important;
            border: none;
            font-weight: 500;
            transition: background 0.2s ease;
        }
        .btn-action-primary:hover {
            background: #1D4ED8;
            color: #FFFFFF !important;
        }
        .btn-action-secondary {
            background: rgba(255, 255, 255, 0.04);
            color: #F1F5F9 !important;
            border: 1px solid rgba(255, 255, 255, 0.12);
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-action-secondary:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #FFFFFF !important;
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* THUMBNAIL PREVIEW */
        .img-thumb-preview {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        .img-thumb-preview:hover {
            transform: scale(1.06);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* ANDROID / MOBILE ENHANCEMENTS */
        * {
            -webkit-tap-highlight-color: transparent;
        }

        @media (max-width: 767.98px) {
            body {
                padding-bottom: 84px !important; /* Space for sticky bottom bar */
            }
            .container-fluid {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
            .glass-card {
                padding: 16px !important;
                border-radius: 14px !important;
            }
            .navbar-custom {
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }
        }

        /* HORIZONTAL SCROLLABLE TABS ON MOBILE */
        .mobile-scroll-tabs {
            display: flex !important;
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            -ms-overflow-style: none;
            gap: 8px !important;
            padding: 4px 2px !important;
        }
        .mobile-scroll-tabs::-webkit-scrollbar {
            display: none !important;
        }
        .mobile-scroll-tabs .nav-link {
            white-space: nowrap !important;
            flex-shrink: 0 !important;
            font-size: 0.82rem !important;
            padding: 8px 14px !important;
        }

        /* ANDROID WALLET SUMMARY CARD */
        .mobile-wallet-card {
            background: linear-gradient(135deg, #132238 0%, #0F1A2D 100%) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            border-radius: 20px !important;
            padding: 18px 16px !important;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
            margin-bottom: 16px;
        }
        .mobile-wallet-badge {
            background: rgba(56, 189, 248, 0.12);
            color: #38BDF8;
            border: 1px solid rgba(56, 189, 248, 0.25);
            font-size: 0.72rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 50px;
        }

        /* MOBILE CARDS FOR TRANSACTIONS & KIDS */
        .mobile-card-item {
            background: #111C2E;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.15s ease, border-color 0.15s ease;
        }
        .mobile-card-item:active {
            transform: scale(0.99);
            border-color: rgba(255, 255, 255, 0.18);
        }

        /* STICKY BOTTOM ACTION BAR FOR ANDROID / HP */
        .mobile-bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1040;
            background: rgba(11, 19, 43, 0.95);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            padding: 8px 10px;
            padding-bottom: max(8px, env(safe-area-inset-bottom));
            display: flex;
            align-items: center;
            justify-content: space-around;
            gap: 6px;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.5);
        }
        .mobile-bar-btn {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            padding: 7px 4px;
            border-radius: 12px;
            font-size: 0.72rem;
            font-weight: 600;
            border: none;
            color: #F8FAFC;
            text-decoration: none;
            transition: all 0.15s ease;
            line-height: 1.1;
        }
        .mobile-bar-btn i {
            font-size: 1rem;
        }
        .mobile-bar-btn-primary {
            background: linear-gradient(135deg, #2563EB, #1D4ED8);
            color: #FFFFFF !important;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
        }
        .mobile-bar-btn-inflow {
            background: rgba(16, 185, 129, 0.15);
            color: #34D399 !important;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        .mobile-bar-btn-expense {
            background: rgba(244, 63, 94, 0.15);
            color: #FB7185 !important;
            border: 1px solid rgba(244, 63, 94, 0.3);
        }
        .mobile-bar-btn-menu {
            background: rgba(255, 255, 255, 0.06);
            color: #CBD5E1 !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* MODAL ON MOBILE (BOTTOM SHEET FEEL) */
        @media (max-width: 575.98px) {
            .modal-dialog {
                margin: 0 !important;
                position: fixed !important;
                bottom: 0 !important;
                left: 0 !important;
                right: 0 !important;
                max-width: 100% !important;
                width: 100% !important;
            }
            .modal-content {
                border-radius: 24px 24px 0 0 !important;
                max-height: 88vh !important;
                border-bottom: none !important;
                border-left: none !important;
                border-right: none !important;
            }
            .modal-body {
                max-height: 65vh;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }
            .form-control, .form-select {
                font-size: 16px !important; /* Prevents auto-zoom in Android Chrome */
                min-height: 44px;
            }
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
                    <span class="fw-bold fs-5 text-white">DOT Bendahara</span>
                </a>
                <span class="badge rounded-pill px-3 py-1.5 d-none d-md-inline-block" style="background: rgba(255, 255, 255, 0.05); color: #CBD5E1; border: 1px solid rgba(255, 255, 255, 0.1); font-size: 0.75rem;">
                    <i class="fa-solid fa-coins me-1"></i> Cashflow & Kas DOT Teens
                </span>
            </div>

            <div class="d-flex align-items-center gap-2 gap-md-3">
                @if($user->role == 'super_admin')
                    <a href="/admin/dashboard" class="btn btn-sm btn-outline-secondary rounded-pill px-3 d-inline-flex align-items-center gap-1.5" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-arrow-left"></i> <span class="d-none d-sm-inline">Dashboard Utama</span>
                    </a>
                @else
                    <a href="/" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 d-inline-flex align-items-center gap-1.5" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-globe"></i> <span class="d-none d-sm-inline">Website DOT</span>
                    </a>
                @endif
                <div class="text-end">
                    <div class="text-white fw-bold small d-none d-sm-block">{{ $user->name }}</div>
                    <span class="badge rounded-pill px-2.5 py-1" style="background: rgba(16, 185, 129, 0.15); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.3); font-size: 0.72rem;">
                        <i class="fa-solid fa-coins me-1"></i> {{ $user->role == 'super_admin' ? 'Super Admin' : 'Bendahara' }}
                    </span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-2.5 px-sm-3 fw-semibold d-flex align-items-center gap-1" style="font-size: 0.8rem;" title="Logout">
                        <i class="fa-solid fa-right-from-bracket"></i> <span class="d-none d-sm-inline">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- ALERT NOTIFIKASI -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3) !important; color: #6EE7B7;" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-circle-check fs-4 me-2.5"></i>
                    <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" style="background: rgba(244, 63, 94, 0.15); border: 1px solid rgba(244, 63, 94, 0.3) !important; color: #FDA4AF;" role="alert">
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

        <!-- ANDROID MOBILE WALLET WIDGET -->
        <div class="mobile-wallet-card d-block d-md-none">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="mobile-wallet-badge">
                    <i class="fa-solid fa-coins me-1 text-warning"></i> Kas DOT Teens
                </span>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2.5 py-1 text-light border-0" onclick="toggleSaldoVisibility()" title="Sembunyikan / Tampilkan Saldo">
                        <i class="fa-solid fa-eye" id="iconEyeSaldo" style="font-size: 0.85rem;"></i>
                    </button>
                    <button type="button" class="btn btn-xs btn-action-secondary rounded-pill px-2.5 py-1 text-white" onclick="copyRekening('{{ $bankInfo }}')" style="font-size: 0.72rem;">
                        <i class="fa-regular fa-copy me-1"></i> Rekening
                    </button>
                </div>
            </div>

            <span class="stat-label mb-0" style="font-size: 0.72rem;">Saldo Kas Riil Saat Ini</span>
            <div class="d-flex align-items-baseline gap-2 my-1">
                <h2 class="fw-extrabold text-white mb-0" id="displaySaldoAmount" data-amount="{{ $saldoAkhir }}" style="letter-spacing: -0.5px;">
                    Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                </h2>
            </div>

            <!-- QUICK INFLOW & EXPENSE METRICS -->
            <div class="row g-2 mt-2 pt-2 border-top border-white border-opacity-10 text-center">
                <div class="col-6">
                    <div class="p-2 rounded-3" style="background: rgba(16, 185, 129, 0.08); border: 1px solid rgba(16, 185, 129, 0.2);">
                        <span class="d-block text-muted small" style="font-size: 0.68rem; text-transform: uppercase;">Total Masuk</span>
                        <span class="fw-bold text-success" style="font-size: 0.88rem;">+Rp {{ number_format($totalMasuk, 0, ',', '.') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-2 rounded-3" style="background: rgba(244, 63, 94, 0.08); border: 1px solid rgba(244, 63, 94, 0.2);">
                        <span class="d-block text-muted small" style="font-size: 0.68rem; text-transform: uppercase;">Total Keluar</span>
                        <span class="fw-bold text-danger" style="font-size: 0.88rem;">-Rp {{ number_format($totalKeluar, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- EXTRA COLLAPSIBLE MINI BREAKDOWN -->
            <div class="mt-2 text-center">
                <a class="text-decoration-none text-muted small" data-bs-toggle="collapse" href="#collapseMobileStats" role="button" style="font-size: 0.72rem;">
                    <i class="fa-solid fa-angle-down me-1"></i> Rincian Sumber Kas & Bulan Ini
                </a>
                <div class="collapse mt-2" id="collapseMobileStats">
                    <div class="p-2.5 rounded-3 text-start small" style="background: rgba(0, 0, 0, 0.25); border: 1px solid rgba(255, 255, 255, 0.06); font-size: 0.76rem;">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Danus (Usaha):</span>
                            <span class="text-light fw-semibold">Rp {{ number_format($totalDanaUsaha, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Janji Iman:</span>
                            <span class="text-light fw-semibold">Rp {{ number_format($totalJanjiIman, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Dana Donatur:</span>
                            <span class="text-light fw-semibold">Rp {{ number_format($totalDonatur, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between pt-1 border-top border-white border-opacity-10">
                            <span class="text-muted">Arus Kas Bulan Ini:</span>
                            <span class="{{ $netBulanIni >= 0 ? 'text-success' : 'text-danger' }} fw-bold">
                                {{ $netBulanIni >= 0 ? '+' : '' }}Rp {{ number_format($netBulanIni, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HEADER SECTION & QUICK ACTIONS (DESKTOP) -->
        <div class="d-none d-md-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4 pb-2">
            <div>
                <h2 class="fw-bold text-white mb-1">
                    <i class="fa-solid fa-scale-balanced text-secondary me-2"></i> Cashflow & Keuangan Bendahara
                </h2>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">
                    Pencatatan arus kas masuk (Dana Usaha, Janji Iman, Dana Donatur, Kas Anak) serta seluruh pengeluaran operasional DOT Teens secara transparan & akurat.
                </p>
            </div>
            
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-action-primary rounded-pill px-3.5 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalInflow">
                    <i class="fa-solid fa-plus"></i> <span>Catat Pemasukan</span>
                </button>
                <button class="btn btn-action-secondary rounded-pill px-3.5 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalExpense">
                    <i class="fa-solid fa-minus"></i> <span>Catat Pengeluaran</span>
                </button>
                <button class="btn btn-action-secondary rounded-pill px-3.5 py-2 shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalPayment">
                    <i class="fa-solid fa-wallet"></i> <span>Bayar Kas Anak</span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-action-secondary rounded-pill px-3 py-2 d-flex align-items-center gap-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fa-regular fa-file-lines"></i> <span>Export Laporan</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="background: #111C2E; border: 1px solid rgba(255, 255, 255, 0.1);">
                        <li>
                            <a class="dropdown-item text-white py-2" href="{{ route('admin.kas.export_cashflow') }}">
                                <i class="fa-solid fa-file-invoice-dollar text-secondary me-2"></i> Export Buku Kas (Cash Flow)
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white py-2" href="{{ route('admin.kas.export') }}">
                                <i class="fa-solid fa-users text-secondary me-2"></i> Export Rekap Iuran Kas Anak
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-action-secondary rounded-pill px-3 py-2 d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#modalSettings">
                    <i class="fa-solid fa-gear"></i> <span class="d-none d-md-inline">Rekening</span>
                </button>
            </div>
        </div>

        <!-- 4 KARTU STATISTIK KEUANGAN & CASHFLOW (DESKTOP) -->
        <div class="row g-3 mb-4 d-none d-md-flex">
            <!-- Saldo Bersih Saat Ini -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label">Saldo Kas Riil Saat Ini</span>
                            <h3 class="fw-bold {{ $saldoAkhir >= 0 ? 'text-white' : 'text-danger' }} mt-1 mb-0">
                                Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="stat-icon">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 d-flex justify-content-between stat-subtext">
                        <span>Total Masuk: <strong class="text-light">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</strong></span>
                        <span>Keluar: <strong class="text-light">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Total Pemasukan Arus Kas -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label">Total Pemasukan Arus Kas</span>
                            <h3 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext d-flex justify-content-between flex-wrap gap-1" style="font-size: 0.76rem;">
                        <span>Danus: <strong class="text-light">Rp {{ number_format($totalDanaUsaha, 0, ',', '.') }}</strong></span>
                        <span>Janji Iman: <strong class="text-light">Rp {{ number_format($totalJanjiIman, 0, ',', '.') }}</strong></span>
                        <span>Donatur: <strong class="text-light">Rp {{ number_format($totalDonatur, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Total Pengeluaran Kas -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label">Total Pengeluaran Kas</span>
                            <h3 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext text-muted">
                        <i class="fa-regular fa-file-lines me-1"></i> {{ $allExpenses->total() }} transaksi belanja / operasional
                    </div>
                </div>
            </div>

            <!-- Arus Kas Bulan Berjalan -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="stat-label">Arus Kas Bulan Ini ({{ date('F Y') }})</span>
                            <h3 class="fw-bold text-white mt-1 mb-0">
                                {{ $netBulanIni >= 0 ? '+' : '' }}Rp {{ number_format($netBulanIni, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="stat-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary border-opacity-25 stat-subtext d-flex justify-content-between">
                        <span>Masuk: <strong class="text-light">+Rp {{ number_format($masukBulanIni, 0, ',', '.') }}</strong></span>
                        <span>Keluar: <strong class="text-light">-Rp {{ number_format($keluarBulanIni, 0, ',', '.') }}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- REKENING BANNER INFO (DESKTOP) -->
        <div class="glass-card mb-4 py-3 px-4 d-none d-md-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-white bg-opacity-10 text-light p-2.5 rounded-circle fs-5 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div>
                    <div class="small fw-semibold text-uppercase text-muted" style="letter-spacing: 0.5px; font-size: 0.75rem;">Rekening Resmi Kas DOT Teens (Janji Iman / Donatur / Iuran):</div>
                    <div class="fw-bold text-white fs-5 mt-0.5">{{ $bankInfo }}</div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-action-secondary rounded-pill px-3" onclick="copyRekening('{{ $bankInfo }}')">
                    <i class="fa-regular fa-copy me-1"></i> Salin Rekening
                </button>
                <button class="btn btn-sm btn-action-secondary rounded-pill px-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalSettings">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Ubah Info
                </button>
            </div>
        </div>

        <!-- NAVIGATION TABS (SWIPEABLE ON ANDROID / HP) -->
        <div class="mb-3 mb-md-4">
            <ul class="nav nav-pills nav-pills-custom mobile-scroll-tabs" id="kasTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="tab-cashflow-btn" data-bs-toggle="pill" data-bs-target="#tab-cashflow" type="button">
                        <i class="fa-solid fa-book me-1"></i> <span>Buku Kas</span>
                        <span class="badge bg-secondary bg-opacity-25 text-light rounded-pill ms-1 px-1.5">{{ $ledgerDisplay->count() }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-inflows-btn" data-bs-toggle="pill" data-bs-target="#tab-inflows" type="button">
                        <i class="fa-solid fa-hand-holding-dollar me-1"></i> <span>Pemasukan</span>
                        <span class="badge bg-secondary bg-opacity-25 text-light rounded-pill ms-1 px-1.5">{{ $allInflows->total() }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-pengeluaran-btn" data-bs-toggle="pill" data-bs-target="#tab-pengeluaran" type="button">
                        <i class="fa-solid fa-receipt me-1"></i> <span>Pengeluaran</span>
                        <span class="badge bg-secondary bg-opacity-25 text-light rounded-pill ms-1 px-1.5">{{ $allExpenses->total() }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-tunggakan-btn" data-bs-toggle="pill" data-bs-target="#tab-tunggakan" type="button">
                        <i class="fa-solid fa-child-reaching me-1"></i> <span>Kas Anak (Rp 5rb)</span>
                        @php
                            $menunggakCount = collect($volunteerSummary)->where('total_tunggakan', '>', 0)->count();
                        @endphp
                        @if($menunggakCount > 0)
                            <span class="badge bg-danger bg-opacity-75 rounded-pill ms-1 px-1.5">{{ $menunggakCount }} nunggak</span>
                        @endif
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="tab-pengerja-btn" data-bs-toggle="pill" data-bs-target="#tab-pengerja" type="button">
                        <i class="fa-solid fa-sliders me-1"></i> <span>Master Data</span>
                    </button>
                </li>
                @if($cctv_kas->isNotEmpty())
                <li class="nav-item">
                    <button class="nav-link" id="tab-cctv-btn" data-bs-toggle="pill" data-bs-target="#tab-cctv" type="button">
                        <i class="fa-solid fa-shield-halved me-1"></i> <span>CCTV Audit</span>
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
                            <h4 class="fw-bold text-white mb-1"><i class="fa-solid fa-book-open-reader text-secondary me-2"></i> Buku Kas Umum (General Ledger)</h4>
                            <p class="text-muted mb-0 small">Catatan arus kas gabungan pemasukan dan pengeluaran secara kronologis lengkap dengan saldo berjalan.</p>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('admin.kas.export_cashflow') }}" class="btn btn-sm btn-action-secondary rounded-pill px-3 d-flex align-items-center gap-1.5">
                                <i class="fa-solid fa-file-csv"></i> Unduh CSV Excel
                            </a>
                        </div>
                    </div>

                    <!-- FILTER BUKU KAS -->
                    <div class="p-3 rounded-4 mb-4" style="background: rgba(255, 255, 255, 0.02); border: 1px solid var(--card-border);">
                        <form action="/admin/kas" method="GET" class="row g-2 align-items-center">
                            <input type="hidden" name="tab" value="tab-cashflow">
                            <div class="col-12 col-md-3">
                                <label class="small text-muted fw-semibold mb-1">Filter Jenis Transaksi</label>
                                <select name="ledger_type" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="all">Semua Jenis Arus Kas</option>
                                    <option value="inflow" {{ request('ledger_type') == 'inflow' ? 'selected' : '' }}>Pemasukan Saja (+)</option>
                                    <option value="expense" {{ request('ledger_type') == 'expense' ? 'selected' : '' }}>Pengeluaran Saja (-)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="small text-muted fw-semibold mb-1">Filter Kategori Sumber</label>
                                <select name="ledger_cat" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="all">Semua Kategori</option>
                                    <option value="dana_usaha" {{ request('ledger_cat') == 'dana_usaha' ? 'selected' : '' }}>Dana Usaha</option>
                                    <option value="janji_iman" {{ request('ledger_cat') == 'janji_iman' ? 'selected' : '' }}>Janji Iman</option>
                                    <option value="donatur" {{ request('ledger_cat') == 'donatur' ? 'selected' : '' }}>Dana Donatur</option>
                                    <option value="kas_volunteer" {{ request('ledger_cat') == 'kas_volunteer' ? 'selected' : '' }}>Kas Pengerja</option>
                                    <option value="pengeluaran" {{ request('ledger_cat') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran Operasional</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="small text-muted fw-semibold mb-1">Bulan Transaksi</label>
                                <input type="month" name="ledger_month" class="form-control form-control-sm" value="{{ request('ledger_month') }}" onchange="this.form.submit()">
                            </div>
                            <div class="col-12 col-md-3 d-flex align-items-end gap-2">
                                <button type="submit" class="btn btn-sm btn-action-primary rounded-pill px-3 w-50">Terapkan</button>
                                <a href="/admin/kas" class="btn btn-sm btn-action-secondary rounded-pill px-3 w-50">Reset</a>
                            </div>
                        </form>
                    </div>

                    <!-- TABEL BUKU KAS LEDGER (DESKTOP) -->
                    <div class="table-responsive d-none d-md-block">
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
                                                <span class="pill-mini">
                                                    <i class="fa-solid {{ $item->category_icon }}"></i> {{ $item->category_label }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-white fs-6">{{ $item->title }}</div>
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
                                            <span class="fw-bold text-light">Rp {{ number_format($item->running_balance, 0, ',', '.') }}</span>
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
                                                <button type="submit" class="btn btn-sm btn-action-secondary rounded-circle p-1.5" title="Hapus Transaksi">
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
                                                <p class="small">Klik tombol "Catat Pemasukan" atau "Catat Pengeluaran" di bagian atas untuk memulai pembukuan.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- FEED TRANSAKSI BUKU KAS (MOBILE / ANDROID) -->
                    <div class="d-block d-md-none">
                        @forelse($ledgerDisplay as $item)
                            <div class="mobile-card-item">
                                <div class="d-flex justify-content-between align-items-center mb-1.5">
                                    <div class="d-flex align-items-center gap-1.5">
                                        @if($item->type === 'inflow')
                                            <span class="badge badge-inflow"><i class="fa-solid fa-arrow-down me-1"></i> MASUK</span>
                                        @else
                                            <span class="badge badge-expense"><i class="fa-solid fa-arrow-up me-1"></i> KELUAR</span>
                                        @endif
                                        <span class="pill-mini"><i class="fa-solid {{ $item->category_icon }}"></i> {{ $item->category_label }}</span>
                                    </div>
                                    <span class="text-muted small" style="font-size: 0.72rem;">{{ date('d M Y', strtotime($item->date)) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                    <div>
                                        <div class="fw-bold text-white fs-6">{{ $item->title }}</div>
                                        <div class="text-light-sub small" style="font-size: 0.78rem;">
                                            <i class="fa-solid fa-user me-1 text-secondary" style="font-size: 0.7rem;"></i> {{ $item->person }} &bull; <span class="text-muted">{{ strtoupper($item->payment_method) }}</span>
                                        </div>
                                        @if($item->notes)
                                            <div class="text-muted small fst-italic mt-1" style="font-size: 0.75rem;">
                                                <i class="fa-regular fa-comment me-1"></i> {{ $item->notes }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-end flex-shrink-0">
                                        @if($item->type === 'inflow')
                                            <div class="fw-bold text-success fs-6">+Rp {{ number_format($item->amount, 0, ',', '.') }}</div>
                                        @else
                                            <div class="fw-bold text-danger fs-6">-Rp {{ number_format($item->amount, 0, ',', '.') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-2 border-top border-white border-opacity-10 small">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted" style="font-size: 0.72rem;">Saldo: <strong class="text-white">Rp {{ number_format($item->running_balance, 0, ',', '.') }}</strong></span>
                                        @if($item->proof_url)
                                            <button type="button" class="btn btn-xs btn-action-secondary rounded-pill px-2 py-0.5" onclick="openLightbox('{{ $item->proof_url }}', '{{ $item->title }}')" style="font-size: 0.7rem;">
                                                <i class="fa-solid fa-image me-1 text-info"></i> Bukti
                                            </button>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="{{ $item->delete_route }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus transaksi ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0 p-1" title="Hapus">
                                                <i class="fa-solid fa-trash-can" style="font-size: 0.82rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">
                                <i class="fa-solid fa-inbox fs-2 mb-2 d-block text-secondary"></i>
                                <p class="small mb-0">Belum ada catatan transaksi arus kas.</p>
                            </div>
                        @endforelse
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
                            <div class="stat-card">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="stat-label">1. Total Dana Usaha (Danus)</span>
                                        <h4 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalDanaUsaha, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fa-solid fa-store"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-muted small">Penjualan makanan, merch, kaos, & fundraising</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="stat-card">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="stat-label">2. Total Janji Iman</span>
                                        <h4 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalJanjiIman, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fa-solid fa-hand-holding-heart"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-muted small">Komitmen iman pribadi / keluarga untuk pemuda</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="stat-card">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="stat-label">3. Total Dana Donatur</span>
                                        <h4 class="fw-bold text-white mt-1 mb-0">Rp {{ number_format($totalDonatur, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="stat-icon">
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
                                    <span class="input-group-text border-secondary bg-dark text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="inflow_search" class="form-control form-control-sm" placeholder="Cari donatur / judul..." value="{{ request('inflow_search') }}">
                                </div>
                                <select name="inflow_cat" class="form-select form-select-sm" style="max-width: 190px;" onchange="this.form.submit()">
                                    <option value="all">Semua Kategori</option>
                                    <option value="dana_usaha" {{ request('inflow_cat') == 'dana_usaha' ? 'selected' : '' }}>Dana Usaha</option>
                                    <option value="janji_iman" {{ request('inflow_cat') == 'janji_iman' ? 'selected' : '' }}>Janji Iman</option>
                                    <option value="donatur" {{ request('inflow_cat') == 'donatur' ? 'selected' : '' }}>Dana Donatur</option>
                                    <option value="lain_lain" {{ request('inflow_cat') == 'lain_lain' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-action-secondary rounded-pill px-3">Filter</button>
                                @if(request('inflow_search') || request('inflow_cat'))
                                    <a href="/admin/kas?tab=tab-inflows" class="btn btn-sm btn-action-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-5 text-md-end">
                            <button class="btn btn-sm btn-action-primary rounded-pill px-3 py-1.5" data-bs-toggle="modal" data-bs-target="#modalInflow">
                                <i class="fa-solid fa-plus-circle me-1"></i> Catat Pemasukan Baru
                            </button>
                        </div>
                    </div>

                    <!-- TABEL DAFTAR PEMASUKAN (DESKTOP) -->
                    <div class="table-responsive d-none d-md-block">
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
                                            <span class="pill-mini">
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
                                                <span class="text-muted small"><i class="fa-brands fa-whatsapp text-secondary me-1"></i> {{ $inf->phone }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary bg-opacity-25 text-light px-2.5 py-1 rounded-pill">
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
                                                <button type="submit" class="btn btn-sm btn-action-secondary rounded-circle p-1.5" title="Hapus Data">
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

                    <!-- DAFTAR KARTU PEMASUKAN (MOBILE / ANDROID) -->
                    <div class="d-block d-md-none">
                        @forelse($allInflows as $inf)
                            <div class="mobile-card-item">
                                <div class="d-flex justify-content-between align-items-center mb-1.5">
                                    <span class="pill-mini">
                                        <i class="fa-solid {{ $inf->category_info['icon'] }}"></i> {{ $inf->category_info['label'] }}
                                    </span>
                                    <span class="text-muted small" style="font-size: 0.72rem;">{{ $inf->received_date->format('d M Y') }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                    <div>
                                        <div class="fw-bold text-white fs-6">{{ $inf->title }}</div>
                                        <div class="text-light-sub small" style="font-size: 0.78rem;">
                                            <i class="fa-solid fa-user me-1 text-secondary" style="font-size: 0.7rem;"></i> {{ $inf->payer_name ?: 'Donatur Anonim' }}
                                            @if($inf->phone)
                                                &bull; <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $inf->phone)) }}" target="_blank" class="text-success text-decoration-none"><i class="fa-brands fa-whatsapp"></i> WA</a>
                                            @endif
                                        </div>
                                        @if($inf->notes)
                                            <div class="text-muted small fst-italic mt-1" style="font-size: 0.75rem;">
                                                <i class="fa-regular fa-comment me-1"></i> {{ $inf->notes }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-end flex-shrink-0">
                                        <div class="fw-bold text-success fs-6">+Rp {{ number_format($inf->amount, 0, ',', '.') }}</div>
                                        <span class="badge bg-secondary bg-opacity-25 text-light px-2 py-0.5 rounded-pill" style="font-size: 0.68rem;">
                                            {{ $inf->payment_method_badge['label'] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-2 border-top border-white border-opacity-10 small">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted" style="font-size: 0.72rem;">Dicatat: {{ $inf->recorded_by }}</span>
                                        @if($inf->proof_url)
                                            <button type="button" class="btn btn-xs btn-action-secondary rounded-pill px-2 py-0.5" onclick="openLightbox('{{ $inf->proof_url }}', '{{ $inf->title }}')" style="font-size: 0.7rem;">
                                                <i class="fa-solid fa-image me-1 text-info"></i> Bukti
                                            </button>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="{{ route('admin.kas.inflow.delete', $inf->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pemasukan ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0 p-1" title="Hapus">
                                                <i class="fa-solid fa-trash-can" style="font-size: 0.82rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">
                                <i class="fa-solid fa-hand-holding-dollar fs-2 mb-2 d-block text-secondary"></i>
                                <p class="small mb-0">Belum ada data pemasukan kas.</p>
                            </div>
                        @endforelse
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
                        <div class="small fw-semibold text-uppercase text-muted mb-2" style="letter-spacing: 0.5px; font-size: 0.75rem;">
                            <i class="fa-solid fa-chart-pie text-secondary me-1"></i> Rincian Pengeluaran Duit Berdasarkan Kategori Keperluan:
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($expensesByCategory as $ec)
                                <div class="px-3 py-2 rounded-3 border border-secondary border-opacity-25" style="background: rgba(255, 255, 255, 0.03);">
                                    <span class="text-muted small d-block">{{ $ec->category }}</span>
                                    <strong class="text-light fs-6">Rp {{ number_format($ec->total_amount, 0, ',', '.') }}</strong>
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
                                    <span class="input-group-text border-secondary bg-dark text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="expense_search" class="form-control form-control-sm" placeholder="Cari keperluan belanja..." value="{{ request('expense_search') }}">
                                </div>
                                <select name="expense_cat" class="form-select form-select-sm" style="max-width: 190px;" onchange="this.form.submit()">
                                    <option value="all">Semua Kategori</option>
                                    <option value="Konsumsi" {{ request('expense_cat') == 'Konsumsi' ? 'selected' : '' }}>Konsumsi</option>
                                    <option value="Acara & Revival" {{ request('expense_cat') == 'Acara & Revival' ? 'selected' : '' }}>Acara & Revival</option>
                                    <option value="Logistik & Perlengkapan" {{ request('expense_cat') == 'Logistik & Perlengkapan' ? 'selected' : '' }}>Logistik</option>
                                    <option value="Multimedia & Desain" {{ request('expense_cat') == 'Multimedia & Desain' ? 'selected' : '' }}>Multimedia</option>
                                    <option value="Musik & Sound" {{ request('expense_cat') == 'Musik & Sound' ? 'selected' : '' }}>Musik & Sound</option>
                                    <option value="Modal Dana Usaha" {{ request('expense_cat') == 'Modal Dana Usaha' ? 'selected' : '' }}>Modal Danus</option>
                                    <option value="Transportasi & Operasional" {{ request('expense_cat') == 'Transportasi & Operasional' ? 'selected' : '' }}>Operasional</option>
                                    <option value="Diakonia & Kasih" {{ request('expense_cat') == 'Diakonia & Kasih' ? 'selected' : '' }}>Diakonia</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-action-secondary rounded-pill px-3">Filter</button>
                                @if(request('expense_search') || request('expense_cat'))
                                    <a href="/admin/kas?tab=tab-pengeluaran" class="btn btn-sm btn-action-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-5 text-md-end">
                            <button class="btn btn-sm btn-action-secondary rounded-pill px-3 py-1.5" data-bs-toggle="modal" data-bs-target="#modalExpense">
                                <i class="fa-solid fa-plus-circle me-1"></i> Catat Pengeluaran Baru
                            </button>
                        </div>
                    </div>

                    <!-- TABEL PENGELUARAN (DESKTOP) -->
                    <div class="table-responsive d-none d-md-block">
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
                                            <span class="pill-mini">
                                                <i class="fa-solid {{ $exp->category_info['icon'] }}"></i> {{ $exp->category_info['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-white fs-6">{{ $exp->title }}</div>
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
                                                <button type="submit" class="btn btn-sm btn-action-secondary rounded-circle p-1.5" title="Hapus Data">
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

                    <!-- DAFTAR KARTU PENGELUARAN (MOBILE / ANDROID) -->
                    <div class="d-block d-md-none">
                        @forelse($allExpenses as $exp)
                            <div class="mobile-card-item">
                                <div class="d-flex justify-content-between align-items-center mb-1.5">
                                    <span class="pill-mini">
                                        <i class="fa-solid {{ $exp->category_info['icon'] }}"></i> {{ $exp->category_info['label'] }}
                                    </span>
                                    <span class="text-muted small" style="font-size: 0.72rem;">{{ $exp->expense_date->format('d M Y') }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                    <div>
                                        <div class="fw-bold text-white fs-6">{{ $exp->title }}</div>
                                        @if($exp->notes)
                                            <div class="text-muted small fst-italic mt-1" style="font-size: 0.75rem;">
                                                <i class="fa-regular fa-file-lines me-1"></i> {{ $exp->notes }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-end flex-shrink-0">
                                        <div class="fw-bold text-danger fs-6">-Rp {{ number_format($exp->amount, 0, ',', '.') }}</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-2 border-top border-white border-opacity-10 small">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted" style="font-size: 0.72rem;">Dicatat: {{ $exp->recorded_by }}</span>
                                        @if($exp->receipt_url)
                                            <button type="button" class="btn btn-xs btn-action-secondary rounded-pill px-2 py-0.5" onclick="openLightbox('{{ $exp->receipt_url }}', '{{ $exp->title }}')" style="font-size: 0.7rem;">
                                                <i class="fa-solid fa-receipt me-1 text-warning"></i> Nota
                                            </button>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="{{ route('admin.kas.expense.delete', $exp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengeluaran ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0 p-1" title="Hapus">
                                                <i class="fa-solid fa-trash-can" style="font-size: 0.82rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">
                                <i class="fa-solid fa-receipt fs-2 mb-2 d-block text-secondary"></i>
                                <p class="small mb-0">Belum ada catatan pengeluaran kas.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($allExpenses->hasPages())
                        <div class="mt-4">
                            {{ $allExpenses->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 4: KAS REMAJA & ANAK (RP 5.000 / MINGGU) -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-tunggakan" role="tabpanel">
                <div class="glass-card">
                    <!-- BANNER EDUKASI ATURAN KAS PER ANAK -->
                    <div class="p-3.5 mb-4 rounded-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3" style="background: rgba(37, 99, 235, 0.08); border: 1px solid rgba(59, 130, 246, 0.25);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-20 text-info p-2.5 rounded-3 fs-5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fa-solid fa-child-reaching"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-white fs-6">
                                    Ketentuan Wajib Uang Kas Remaja & Anak — DOT Teens
                                </div>
                                <div class="text-muted small mt-0.5">
                                    Setiap anak wajib bayar uang kas sebesar <strong class="text-info">Rp 5.000 / minggu</strong>. 
                                    Bulan 4 Minggu = <strong class="text-white">Rp 20.000</strong> &bull; Bulan 5 Minggu = <strong class="text-white">Rp 25.000</strong>.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <form action="{{ route('admin.kas.sync_members') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-action-primary rounded-pill px-3 py-1.5 shadow-sm d-flex align-items-center gap-1.5" title="Sinkronkan seluruh anak terdaftar di database jemaat/pastoral">
                                    <i class="fa-solid fa-users"></i> <span>Sinkron Dari Database Jemaat</span>
                                </button>
                            </form>
                            <button class="btn btn-sm btn-action-secondary rounded-pill px-3 py-1.5 shadow-sm d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                <i class="fa-solid fa-user-plus"></i> <span>Tambah Anak Baru</span>
                            </button>
                        </div>
                    </div>

                    <!-- FILTER & PENCARIAN ANAK -->
                    <div class="row g-3 align-items-center justify-content-between mb-4">
                        <div class="col-12 col-md-8">
                            <form action="/admin/kas" method="GET" class="d-flex flex-wrap gap-2">
                                <input type="hidden" name="tab" value="tab-tunggakan">
                                <div class="input-group" style="max-width: 280px;">
                                    <span class="input-group-text border-secondary bg-dark text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama anak atau No. WA..." value="{{ request('search') }}">
                                </div>
                                <select name="status_filter" class="form-select form-select-sm" style="max-width: 170px;" onchange="this.form.submit()">
                                    <option value="">Semua Status Kas</option>
                                    <option value="lunas" {{ request('status_filter') == 'lunas' ? 'selected' : '' }}>Lunas Semua</option>
                                    <option value="sebagian" {{ request('status_filter') == 'sebagian' ? 'selected' : '' }}>Cicil / Sebagian</option>
                                    <option value="nunggak" {{ request('status_filter') == 'nunggak' ? 'selected' : '' }}>Belum Bayar</option>
                                </select>
                                <select name="division" class="form-select form-select-sm" style="max-width: 180px;" onchange="this.form.submit()">
                                    <option value="">Semua Cool / Kelompok</option>
                                    @foreach($divisions as $div)
                                        <option value="{{ $div }}" {{ request('division') == $div ? 'selected' : '' }}>{{ $div }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-action-secondary rounded-pill px-3">Filter</button>
                                @if(request('search') || request('division') || request('status_filter'))
                                    <a href="/admin/kas?tab=tab-tunggakan" class="btn btn-sm btn-action-secondary rounded-pill px-3">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="col-12 col-md-4 text-md-end d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="{{ route('admin.kas.export') }}" class="btn btn-sm btn-action-secondary rounded-pill px-3 d-flex align-items-center gap-1.5">
                                <i class="fa-solid fa-file-csv"></i> Unduh Rekap CSV
                            </a>
                        </div>
                    </div>

                    <!-- TABEL MONITORING KAS PER ANAK (DESKTOP) -->
                    <div class="table-responsive d-none d-md-block">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Anak / Remaja</th>
                                    <th>Cool / Kategori</th>
                                    <th>No. WhatsApp</th>
                                    <th>Status Kas</th>
                                    <th>Rincian Periode (Rp 5rb/Mgg)</th>
                                    <th>Sisa Tunggakan</th>
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
                                        $statusLabel = $item['status_label'];
                                        $periodStatuses = $item['period_statuses'] ?? [];
                                        $isLunas = ($tunggakan == 0);
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2.5">
                                                <div class="bg-secondary bg-opacity-25 text-light rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px; font-size: 0.85rem;">
                                                    {{ strtoupper(substr($v->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div class="fw-semibold text-white fs-6">{{ $v->name }}</div>
                                                    <span class="text-muted small" style="font-size: 0.72rem;">Wajib: Rp 5.000 / minggu</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill px-2.5 py-1 bg-secondary bg-opacity-25 text-light">
                                                {{ $v->division ?: 'Remaja DOT' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $v->phone)) }}" target="_blank" class="text-decoration-none text-light-sub">
                                                <i class="fa-brands fa-whatsapp text-secondary me-1"></i> {{ $v->phone }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($statusLabel === 'LUNAS')
                                                <span class="badge-status badge-lunas">
                                                    <i class="fa-solid fa-circle-check"></i> LUNAS
                                                </span>
                                            @elseif($statusLabel === 'SEBAGIAN')
                                                <span class="badge-status badge-tunggak" style="background: rgba(245, 158, 11, 0.15) !important; color: #FBBF24 !important; border-color: rgba(245, 158, 11, 0.3) !important;">
                                                    <i class="fa-solid fa-clock-rotate-left"></i> SEBAGIAN
                                                </span>
                                            @else
                                                <span class="badge-status badge-tunggak">
                                                    <i class="fa-solid fa-clock"></i> MENUNGGAK
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1" style="max-width: 320px;">
                                                @foreach($allPeriods as $p)
                                                    @php
                                                        $st = $periodStatuses[$p->id] ?? null;
                                                    @endphp
                                                    @if($st && $st->status === 'lunas')
                                                        <span class="badge-period-lunas" title="{{ $p->name }}: Lunas {{ $st->weeks_count }}/{{ $st->weeks_count }} mgg">
                                                            <i class="fa-solid fa-check"></i> {{ $p->name }}: Lunas ({{ $st->weeks_count }} mgg)
                                                        </span>
                                                    @elseif($st && $st->status === 'sebagian')
                                                        <span class="badge-period-sebagian" title="{{ $p->name }}: Terbayar {{ $st->weeks_paid }}/{{ $st->weeks_count }} mgg (Sisa Rp {{ number_format($st->remaining, 0, ',', '.') }})">
                                                            <i class="fa-solid fa-hourglass-half"></i> {{ $p->name }}: {{ $st->weeks_paid }}/{{ $st->weeks_count }} mgg (sisa {{ number_format($st->remaining / 1000, 0) }}rb)
                                                        </span>
                                                    @else
                                                        <span class="badge-period-tunggak" title="{{ $p->name }}: Belum bayar (Tunggakan Rp {{ number_format($p->amount, 0, ',', '.') }})">
                                                            <i class="fa-solid fa-xmark"></i> {{ $p->name }}: 0/{{ $p->weeks_count }} mgg ({{ number_format($p->amount / 1000, 0) }}rb)
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            @if($isLunas)
                                                <span class="text-success small fw-semibold"><i class="fa-solid fa-check"></i> Rp 0</span>
                                            @else
                                                <span class="fw-bold text-danger fs-6">Rp {{ number_format($tunggakan, 0, ',', '.') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-1.5 align-items-center">
                                                @if(!$isLunas)
                                                    <a href="{{ route('admin.kas.send_wa', $v->id) }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-medium d-inline-flex align-items-center gap-1.5" title="Kirim Tagihan WhatsApp">
                                                        <i class="fa-brands fa-whatsapp fs-6"></i> <span>Kirim WA</span>
                                                    </a>
                                                @endif
                                                <button type="button" class="btn btn-sm btn-action-secondary rounded-pill px-2.5 py-1" onclick="quickPayChild({{ $v->id }}, '{{ addslashes($v->name) }}', {{ json_encode($allPeriods->map(function($p) use ($v) { $d = $v->getPeriodDetail($p); return ['id' => $p->id, 'name' => $p->name, 'weeks' => $d->weeks_count, 'rate' => $d->weekly_rate, 'amount' => $d->target_amount, 'paid' => $d->amount_paid, 'remaining' => $d->remaining, 'status' => $d->status]; })) }})" title="Catat Pembayaran Kas">
                                                    <i class="fa-solid fa-plus-circle me-1"></i> Bayar
                                                </button>
                                                <button type="button" class="btn btn-sm btn-action-secondary rounded-circle p-1.5" onclick="editVolunteer({{ json_encode($v) }})" title="Edit Data Anak">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fa-solid fa-child-reaching fs-1 mb-3 d-block text-secondary"></i>
                                                <h5>Belum Ada Data Anak Kas</h5>
                                                <p class="small">Klik tombol <strong>"Sinkron Dari Database Jemaat"</strong> untuk mengimpor seluruh anak secara otomatis.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- DAFTAR KARTU KAS ANAK (MOBILE / ANDROID) -->
                    <div class="d-block d-md-none">
                        @forelse($volunteerSummary as $item)
                            @php
                                $v = $item['model'];
                                $unpaid = $item['unpaid_periods'];
                                $tunggakan = $item['total_tunggakan'];
                                $waLink = $item['wa_link'];
                                $statusLabel = $item['status_label'];
                                $periodStatuses = $item['period_statuses'] ?? [];
                                $isLunas = ($tunggakan == 0);
                            @endphp
                            <div class="mobile-card-item">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-secondary bg-opacity-25 text-light rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; font-size: 0.9rem;">
                                            {{ strtoupper(substr($v->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-white fs-6">{{ $v->name }}</div>
                                            <div class="d-flex align-items-center gap-1.5 flex-wrap">
                                                <span class="badge rounded-pill px-2 py-0.5 bg-secondary bg-opacity-25 text-light" style="font-size: 0.68rem;">
                                                    {{ $v->division ?: 'Remaja DOT' }}
                                                </span>
                                                @if($v->phone)
                                                    <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $v->phone)) }}" target="_blank" class="text-decoration-none text-light-sub small" style="font-size: 0.72rem;">
                                                        <i class="fa-brands fa-whatsapp text-success me-0.5"></i> {{ $v->phone }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        @if($statusLabel === 'LUNAS')
                                            <span class="badge-status badge-lunas"><i class="fa-solid fa-circle-check"></i> LUNAS</span>
                                        @elseif($statusLabel === 'SEBAGIAN')
                                            <span class="badge-status badge-tunggak" style="background: rgba(245, 158, 11, 0.15) !important; color: #FBBF24 !important; border-color: rgba(245, 158, 11, 0.3) !important;">
                                                <i class="fa-solid fa-clock-rotate-left"></i> SEBAGIAN
                                            </span>
                                        @else
                                            <span class="badge-status badge-tunggak"><i class="fa-solid fa-clock"></i> NUNGGAK</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Rincian Periode Mini Badges -->
                                <div class="d-flex flex-wrap gap-1 mb-2.5">
                                    @foreach($allPeriods as $p)
                                        @php $st = $periodStatuses[$p->id] ?? null; @endphp
                                        @if($st && $st->status === 'lunas')
                                            <span class="badge-period-lunas" style="font-size: 0.68rem !important; padding: 2px 7px !important;">
                                                <i class="fa-solid fa-check"></i> {{ $p->name }}: Lunas
                                            </span>
                                        @elseif($st && $st->status === 'sebagian')
                                            <span class="badge-period-sebagian" style="font-size: 0.68rem !important; padding: 2px 7px !important;">
                                                <i class="fa-solid fa-hourglass-half"></i> {{ $p->name }}: {{ $st->weeks_paid }}/{{ $st->weeks_count }}mgg
                                            </span>
                                        @else
                                            <span class="badge-period-tunggak" style="font-size: 0.68rem !important; padding: 2px 7px !important;">
                                                <i class="fa-solid fa-xmark"></i> {{ $p->name }}: 0/{{ $p->weeks_count }}mgg
                                            </span>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Tunggakan & Action Buttons -->
                                <div class="d-flex justify-content-between align-items-center pt-2 border-top border-white border-opacity-10">
                                    <div>
                                        <span class="text-muted small" style="font-size: 0.72rem;">Sisa Tunggakan:</span>
                                        @if($isLunas)
                                            <div class="text-success fw-bold small"><i class="fa-solid fa-check-circle me-1"></i> Rp 0 (Lunas)</div>
                                        @else
                                            <div class="text-danger fw-bold fs-6">Rp {{ number_format($tunggakan, 0, ',', '.') }}</div>
                                        @endif
                                    </div>
                                    <div class="d-flex gap-1.5 align-items-center">
                                        @if(!$isLunas)
                                            <a href="{{ route('admin.kas.send_wa', $v->id) }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-2.5 py-1 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 0.78rem;">
                                                <i class="fa-brands fa-whatsapp fs-6"></i> <span>Kirim WA</span>
                                            </a>
                                        @endif
                                        <button type="button" class="btn btn-sm btn-action-primary rounded-pill px-2.5 py-1 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 0.78rem;" onclick="quickPayChild({{ $v->id }}, '{{ addslashes($v->name) }}', {{ json_encode($allPeriods->map(function($p) use ($v) { $d = $v->getPeriodDetail($p); return ['id' => $p->id, 'name' => $p->name, 'weeks' => $d->weeks_count, 'rate' => $d->weekly_rate, 'amount' => $d->target_amount, 'paid' => $d->amount_paid, 'remaining' => $d->remaining, 'status' => $d->status]; })) }})">
                                            <i class="fa-solid fa-plus-circle"></i> <span>Bayar</span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-action-secondary rounded-circle p-1.5" onclick="editVolunteer({{ json_encode($v) }})" title="Edit">
                                            <i class="fa-solid fa-pen" style="font-size: 0.76rem;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">
                                <i class="fa-solid fa-child-reaching fs-2 mb-2 d-block text-secondary"></i>
                                <p class="small mb-0">Belum ada data anak kas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 5: MASTER DATA ANAK & PERIODE KAS      -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-pengerja" role="tabpanel">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="glass-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-child-reaching text-secondary me-2"></i> Master Data Anak & Remaja ({{ $volunteers->count() }})</h5>
                                <button class="btn btn-sm btn-action-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalVolunteer">
                                    <i class="fa-solid fa-plus me-1"></i> Anak Baru
                            </div>
                            <!-- TABEL MASTER ANAK (DESKTOP) -->
                            <div class="table-responsive d-none d-md-block">
                                <table class="table table-custom align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nama Anak / Remaja</th>
                                            <th>Cool / Divisi</th>
                                            <th>WhatsApp</th>
                                            <th>Wajib Kas</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($volunteers as $v)
                                            <tr>
                                                <td class="fw-bold text-white">{{ $v->name }}</td>
                                                <td><span class="badge bg-secondary bg-opacity-25 text-light">{{ $v->division ?: 'Remaja DOT' }}</span></td>
                                                <td class="text-light-sub">{{ $v->phone }}</td>
                                                <td>Rp 5.000 / mgg</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-action-secondary rounded-circle p-1.5" onclick="editVolunteer({{ json_encode($v) }})">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <form action="{{ route('admin.kas.volunteer.delete', $v->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data anak {{ $v->name }} dari sistem kas?')">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-action-secondary rounded-circle p-1.5">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- MASTER ANAK CARDS (MOBILE / ANDROID) -->
                            <div class="d-block d-md-none">
                                @foreach($volunteers as $v)
                                    <div class="mobile-card-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bold text-white fs-6">{{ $v->name }}</div>
                                                <div class="d-flex align-items-center gap-1.5 flex-wrap mt-0.5">
                                                    <span class="badge rounded-pill px-2 py-0.5 bg-secondary bg-opacity-25 text-light" style="font-size: 0.68rem;">
                                                        {{ $v->division ?: 'Remaja DOT' }}
                                                    </span>
                                                    <span class="text-muted small" style="font-size: 0.72rem;">{{ $v->phone }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-1.5">
                                                <button class="btn btn-sm btn-action-secondary rounded-circle p-1.5" onclick="editVolunteer({{ json_encode($v) }})">
                                                    <i class="fa-solid fa-pencil" style="font-size: 0.76rem;"></i>
                                                </button>
                                                <form action="{{ route('admin.kas.volunteer.delete', $v->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data anak {{ $v->name }} dari sistem kas?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-action-secondary rounded-circle p-1.5">
                                                        <i class="fa-solid fa-trash" style="font-size: 0.76rem;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="glass-card mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-calendar-days text-secondary me-2"></i> Periode Kas</h5>
                                <button class="btn btn-sm btn-action-secondary rounded-pill px-2.5" data-bs-toggle="modal" data-bs-target="#modalPeriod">
                                    <i class="fa-solid fa-plus me-1"></i> Buka Periode
                                </button>
                            </div>
                            <div class="list-group list-group-flush bg-transparent">
                                @forelse($allPeriods as $p)
                                    <div class="list-group-item bg-transparent text-white border-secondary border-opacity-25 px-0 py-2.5 d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-semibold">{{ $p->name }}</div>
                                            <span class="text-muted small">{{ $p->weeks_count ?: 4 }} Minggu (@ Rp 5.000) &bull; {{ $p->due_date ? date('d M Y', strtotime($p->due_date)) : 'Jatuh tempo akhir bulan' }}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-secondary bg-opacity-25 text-light fw-bold">Rp {{ number_format($p->amount, 0, ',', '.') }}</span>
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
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-shield-halved text-secondary me-2"></i> CCTV Audit Log</h5>
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
                                            <span class="badge bg-secondary bg-opacity-25 text-light ms-1">{{ $log->role }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary bg-opacity-25 text-light">{{ $log->action }}</span>
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
                        <i class="fa-solid fa-plus-circle text-secondary me-2"></i> Catat Pemasukan Kas / Cashflow
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
                                    <option value="dana_usaha">Dana Usaha (Danus / Penjualan / Bazaar)</option>
                                    <option value="janji_iman">Janji Iman (Komitmen Iman Pribadi)</option>
                                    <option value="donatur">Dana Donatur / Donasi Sukarela</option>
                                    <option value="lain_lain">Pemasukan Lain-lain</option>
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
                                <input type="text" name="phone" class="form-control" placeholder="08123456789" inputmode="tel">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Nominal Masuk (Rp) *</label>
                                <input type="number" name="amount" class="form-control" placeholder="100000" min="1" inputmode="numeric" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Tanggal Terima *</label>
                                <input type="date" name="received_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label small fw-semibold text-muted">Metode Pembayaran *</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="cash">Tunai / Cash</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Foto Bukti Transfer / Kwitansi / Struk (Bisa langsung foto kamera)</label>
                                <input type="file" name="proof_image" class="form-control" accept="image/*" capture="environment">
                                <span class="text-muted small" style="font-size: 0.72rem;">Format: JPG, PNG, WEBP (Bisa langsung ambil foto dari kamera HP)</span>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Catatan / Peruntukan Khusus (Opsional)</label>
                                <textarea name="notes" class="form-control" rows="2" placeholder="Catatan tambahan, misalnya: titipan untuk sound system / persembahan syukur ulang tahun..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-action-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-action-primary rounded-pill px-4 fw-semibold">
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
                        <i class="fa-solid fa-minus-circle text-secondary me-2"></i> Catat Pengeluaran Kas (Buku Kas Keluar)
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
                                <input type="number" name="amount" class="form-control" placeholder="75000" min="1" inputmode="numeric" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted">Kategori Keperluan *</label>
                                <select name="category" class="form-select" required>
                                    <option value="Konsumsi">Konsumsi (Makan / Minum Pengerja)</option>
                                    <option value="Acara & Revival">Acara, Doorprize & Souvenir</option>
                                    <option value="Logistik & Perlengkapan">Logistik, Kabel & Perlengkapan</option>
                                    <option value="Multimedia & Desain">Multimedia, Desain & Banner</option>
                                    <option value="Musik & Sound">Musik & Sound System</option>
                                    <option value="Modal Dana Usaha">Modal Bahan Dana Usaha</option>
                                    <option value="Transportasi & Operasional">Transportasi & Operasional</option>
                                    <option value="Diakonia & Kasih">Diakonia & Tanda Kasih</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label small fw-semibold text-muted">Tanggal Pengeluaran *</label>
                                <input type="date" name="expense_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Foto Nota / Struk / Kwitansi Fisik (Bisa langsung foto kamera)</label>
                                <input type="file" name="receipt_image" class="form-control" accept="image/*" capture="environment">
                                <span class="text-muted small" style="font-size: 0.72rem;">Unggah atau langsung foto struk/bon belanja dari kamera HP sebagai bukti kas bendahara.</span>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Rincian Barang / Keterangan Belanja</label>
                                <textarea name="notes" class="form-control" rows="2" placeholder="Contoh: 10 porsi nasi uduk @ Rp 15.000 + es teh untuk pengerja ibadah sabtu..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-action-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-action-primary rounded-pill px-4 fw-semibold">
                            <i class="fa-solid fa-check me-1"></i> Simpan Pengeluaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 3. MODAL CATAT PEMBAYARAN KAS ANAK -->
    <div class="modal fade" id="modalPayment" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-wallet text-secondary me-2"></i> Bayar Kas Remaja / Anak</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Pilih Anak -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Pilih Anak / Remaja <span class="text-danger">*</span></label>
                            <select name="cash_volunteer_id" id="pay_volunteer_id" class="form-select" required>
                                <option value="">-- Pilih Nama Anak --</option>
                                @foreach($volunteers as $v)
                                    <option value="{{ $v->id }}">{{ $v->name }} ({{ $v->division ?: 'Remaja DOT' }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Tab Mode: Bayar 1 Periode (Bisa Per Minggu / Lunas) ATAU Multi-Periode Sekaligus -->
                        <div class="mb-3">
                            <div class="d-flex gap-2 p-1 rounded-3 mb-3" style="background: rgba(255, 255, 255, 0.05); border: 1px solid var(--card-border);">
                                <button type="button" class="btn btn-sm flex-fill rounded-2 fw-semibold text-white" id="btnModeSingle" style="background: #2563EB;" onclick="switchPayMode('single')">
                                    <i class="fa-solid fa-calendar-check me-1"></i> Bayar 1 Periode (Cicil/Lunas)
                                </button>
                                <button type="button" class="btn btn-sm flex-fill rounded-2 fw-semibold text-muted" id="btnModeMulti" onclick="switchPayMode('multi')">
                                    <i class="fa-solid fa-list-check me-1"></i> Bayar Banyak Bulan Sekaligus
                                </button>
                            </div>

                            <!-- KONTEN MODE SINGLE PERIODE -->
                            <div id="sectionPaySingle">
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-muted">Pilih Periode Kas <span class="text-danger">*</span></label>
                                    <select name="period_id" id="pay_period_id" class="form-select" onchange="onPeriodSelected()">
                                        @foreach($allPeriods as $p)
                                            <option value="{{ $p->id }}" data-weeks="{{ $p->weeks_count ?: 4 }}" data-amount="{{ $p->amount }}">
                                                {{ $p->name }} ({{ $p->weeks_count ?: 4 }} Minggu — Rp {{ number_format($p->amount, 0, ',', '.') }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-muted">Pilihan Nominal Bayar Kas</label>
                                    <div class="p-3 rounded-3" style="background: rgba(0, 0, 0, 0.25); border: 1px solid rgba(255, 255, 255, 0.08);">
                                        <!-- Opsi Lunas Penuh -->
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="pay_type" id="payTypeFull" value="full" checked onchange="togglePayInputs()">
                                            <label class="form-check-label text-white fw-semibold" for="payTypeFull">
                                                Lunas Penuh Bulan Ini (<span id="labelFullAmount">Rp 20.000</span>)
                                            </label>
                                            <div class="text-muted small ps-1">Membayar lunas seluruh minggu pada periode ini</div>
                                        </div>

                                        <!-- Opsi Bayar Per Minggu (@ 5.000) -->
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="pay_type" id="payTypeWeeks" value="weeks" onchange="togglePayInputs()">
                                            <label class="form-check-label text-white fw-semibold" for="payTypeWeeks">
                                                Bayar Per Minggu (@ Rp 5.000 / minggu)
                                            </label>
                                            <div id="weeksSelectContainer" class="mt-2 ps-1" style="display: none;">
                                                <select name="weeks_count_paid" id="weeks_count_paid" class="form-select form-select-sm">
                                                    <option value="1">1 Minggu — Rp 5.000</option>
                                                    <option value="2">2 Minggu — Rp 10.000</option>
                                                    <option value="3">3 Minggu — Rp 15.000</option>
                                                    <option value="4" selected>4 Minggu — Rp 20.000</option>
                                                    <option value="5">5 Minggu — Rp 25.000</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Opsi Nominal Kustom -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pay_type" id="payTypeCustom" value="custom" onchange="togglePayInputs()">
                                            <label class="form-check-label text-white fw-semibold" for="payTypeCustom">
                                                Nominal Kustom (Rp)
                                            </label>
                                            <div id="customAmountContainer" class="mt-2 ps-1" style="display: none;">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text bg-dark border-secondary text-secondary">Rp</span>
                                                    <input type="number" name="custom_amount" id="custom_amount" class="form-control" placeholder="Contoh: 10000" min="1000" step="1000" inputmode="numeric">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KONTEN MODE MULTI PERIODE -->
                            <div id="sectionPayMulti" style="display: none;">
                                <label class="form-label small fw-semibold text-muted">Centang Periode yang Hendak Dilunasi Sekaligus:</label>
                                <div class="bg-dark bg-opacity-50 p-3 rounded-3 border border-secondary border-opacity-25" style="max-height: 180px; overflow-y: auto;">
                                    @foreach($allPeriods as $p)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input period-checkbox" type="checkbox" name="period_ids[]" value="{{ $p->id }}" id="period_{{ $p->id }}">
                                            <label class="form-check-label text-white d-flex justify-content-between" for="period_{{ $p->id }}">
                                                <span>{{ $p->name }} ({{ $p->weeks_count ?: 4 }} Mgg)</span>
                                                <span class="text-light fw-semibold">Rp {{ number_format($p->amount, 0, ',', '.') }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal & Metode Bayar -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold text-muted">Tanggal Bayar</label>
                                <input type="date" name="paid_at" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold text-muted">Metode Pembayaran</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="cash">Tunai (Cash saat ibadah)</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Bukti Transfer (Bisa langsung foto kamera)</label>
                            <input type="file" name="proof_image" class="form-control" accept="image/*" capture="environment">
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Catatan (Opsional)</label>
                            <input type="text" name="notes" id="pay_notes" class="form-control" placeholder="Contoh: Titip lewat Kak Hizqia">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-action-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-action-primary rounded-pill px-4 fw-semibold">
                            <i class="fa-solid fa-check me-1"></i> Simpan Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 4. MODAL TAMBAH / EDIT ANAK / REMASA -->
    <div class="modal fade" id="modalVolunteer" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-white" id="modalVolunteerTitle"><i class="fa-solid fa-user-plus text-secondary me-2"></i> Tambah Data Anak Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form id="formVolunteer" action="{{ route('admin.kas.volunteer.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nama Lengkap Anak <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="vol_name" class="form-control" placeholder="Contoh: Hizqia Chandra" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nomor WhatsApp (Anak / Ortu) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="fa-brands fa-whatsapp"></i></span>
                                <input type="text" name="phone" id="vol_phone" class="form-control" placeholder="08123456789" inputmode="tel" required>
                            </div>
                            <div class="form-text small text-muted">Digunakan untuk pengiriman reminder & kwitansi kas via WhatsApp.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Komsel / Kelas / Kelompok</label>
                            <input type="text" name="division" id="vol_division" class="form-control" placeholder="Contoh: Teens 1 / Remaja / Kelompok Daud" value="Remaja DOT">
                        </div>

                        <div class="row g-2 mb-2" id="vol_edit_extra" style="display: none;">
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Status Keaktifan</label>
                                <select name="is_active" id="vol_is_active" class="form-select">
                                    <option value="1">Aktif (Wajib Kas)</option>
                                    <option value="0">Non-Aktif (Istirahat/Pindah)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Catatan (Opsional)</label>
                            <input type="text" name="notes" id="vol_notes" class="form-control" placeholder="Catatan khusus...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-action-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-action-primary rounded-pill px-4 fw-semibold">
                            <i class="fa-solid fa-save me-1"></i> Simpan Data Anak
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
                    <h5 class="modal-title fw-bold text-white"><i class="fa-regular fa-calendar-plus text-secondary me-2"></i> Buka Periode Kas Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.kas.period.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nama Periode Kas <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Kas November 2026" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Jumlah Minggu dalam Bulan Tersebut <span class="text-danger">*</span></label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="p-3 rounded-3 border text-center h-100" id="cardWeeks4" style="background: rgba(37,99,235,0.15); border-color: #2563EB !important; cursor: pointer;" onclick="selectPeriodWeeks(4)">
                                        <input type="radio" name="weeks_count" id="radioWeeks4" value="4" checked class="form-check-input mb-2" onchange="updatePeriodAmountPreview()">
                                        <div class="fw-bold text-white fs-6">4 Minggu</div>
                                        <div class="text-info fw-bold small">Rp 20.000</div>
                                        <div class="text-muted" style="font-size: 0.72rem;">(4 x Rp 5.000)</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 rounded-3 border text-center h-100" id="cardWeeks5" style="background: rgba(255,255,255,0.03); border-color: rgba(255,255,255,0.1) !important; cursor: pointer;" onclick="selectPeriodWeeks(5)">
                                        <input type="radio" name="weeks_count" id="radioWeeks5" value="5" class="form-check-input mb-2" onchange="updatePeriodAmountPreview()">
                                        <div class="fw-bold text-white fs-6">5 Minggu</div>
                                        <div class="text-warning fw-bold small">Rp 25.000</div>
                                        <div class="text-muted" style="font-size: 0.72rem;">(5 x Rp 5.000)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Total Kewajiban Kas Periode Ini (Rp)</label>
                            <input type="number" name="amount" id="period_amount_input" class="form-control fw-bold" value="20000" min="1000" readonly style="background: rgba(0,0,0,0.3); color: #fff;">
                            <div class="form-text small text-muted">Dihitung otomatis: tarif wajib Rp 5.000 per minggu.</div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold text-muted">Tanggal Jatuh Tempo (Opsional)</label>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-action-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-action-primary rounded-pill px-4 fw-semibold">
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
                    <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-gear text-secondary me-2"></i> Pengaturan Informasi Rekening</h5>
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
                            <input type="number" name="default_nominal" class="form-control" value="{{ $defaultNominal }}" min="1000" inputmode="numeric">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-action-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-action-primary rounded-pill px-4 fw-semibold">
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
                    <a id="lightboxDownload" href="" target="_blank" class="btn btn-sm btn-action-secondary rounded-pill px-3">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka Ukuran Penuh
                    </a>
                    <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ANDROID / MOBILE STICKY BOTTOM ACTION BAR (THUMB NAVIGATION) -->
    <div class="mobile-bottom-bar d-flex d-md-none">
        <button type="button" class="mobile-bar-btn mobile-bar-btn-inflow" data-bs-toggle="modal" data-bs-target="#modalInflow">
            <i class="fa-solid fa-plus-circle"></i>
            <span>+ Masuk</span>
        </button>
        <button type="button" class="mobile-bar-btn mobile-bar-btn-expense" data-bs-toggle="modal" data-bs-target="#modalExpense">
            <i class="fa-solid fa-minus-circle"></i>
            <span>- Keluar</span>
        </button>
        <button type="button" class="mobile-bar-btn mobile-bar-btn-primary" data-bs-toggle="modal" data-bs-target="#modalPayment">
            <i class="fa-solid fa-wallet"></i>
            <span>Bayar Kas</span>
        </button>
        <div class="dropdown flex-fill">
            <button type="button" class="mobile-bar-btn mobile-bar-btn-menu w-100" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
                <span>Menu</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="background: #111C2E; border: 1px solid rgba(255,255,255,0.12); min-width: 200px;">
                <li><a class="dropdown-item text-white py-2" href="{{ route('admin.kas.export_cashflow') }}"><i class="fa-solid fa-file-invoice-dollar me-2 text-info"></i> Export Buku Kas</a></li>
                <li><a class="dropdown-item text-white py-2" href="{{ route('admin.kas.export') }}"><i class="fa-solid fa-users me-2 text-primary"></i> Export Rekap Anak</a></li>
                <li><hr class="dropdown-divider border-secondary border-opacity-25 my-1"></li>
                <li><a class="dropdown-item text-white py-2" href="#" data-bs-toggle="modal" data-bs-target="#modalVolunteer"><i class="fa-solid fa-user-plus me-2 text-success"></i> Tambah Data Anak</a></li>
                <li><a class="dropdown-item text-white py-2" href="#" data-bs-toggle="modal" data-bs-target="#modalPeriod"><i class="fa-regular fa-calendar-plus me-2 text-warning"></i> Buka Periode Baru</a></li>
                <li><a class="dropdown-item text-white py-2" href="#" data-bs-toggle="modal" data-bs-target="#modalSettings"><i class="fa-solid fa-gear me-2 text-secondary"></i> Info Rekening</a></li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle Intip / Sembunyikan Saldo Kas di HP
        let isSaldoHidden = false;
        function toggleSaldoVisibility() {
            const el = document.getElementById('displaySaldoAmount');
            const icon = document.getElementById('iconEyeSaldo');
            if (!el || !icon) return;

            if (!isSaldoHidden) {
                el.innerText = 'Rp ••••••••';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                isSaldoHidden = true;
            } else {
                const raw = parseInt(el.getAttribute('data-amount')) || 0;
                el.innerText = 'Rp ' + raw.toLocaleString('id-ID');
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                isSaldoHidden = false;
            }
        }

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

        // Mode Pembayaran Kas: Single Periode atau Multi Periode
        function switchPayMode(mode) {
            const btnSingle = document.getElementById('btnModeSingle');
            const btnMulti = document.getElementById('btnModeMulti');
            const secSingle = document.getElementById('sectionPaySingle');
            const secMulti = document.getElementById('sectionPayMulti');

            if (mode === 'single') {
                secSingle.style.display = 'block';
                secMulti.style.display = 'none';
                btnSingle.style.background = '#2563EB';
                btnSingle.className = 'btn btn-sm flex-fill rounded-2 fw-semibold text-white';
                btnMulti.style.background = 'transparent';
                btnMulti.className = 'btn btn-sm flex-fill rounded-2 fw-semibold text-muted';
            } else {
                secSingle.style.display = 'none';
                secMulti.style.display = 'block';
                btnMulti.style.background = '#2563EB';
                btnMulti.className = 'btn btn-sm flex-fill rounded-2 fw-semibold text-white';
                btnSingle.style.background = 'transparent';
                btnSingle.className = 'btn btn-sm flex-fill rounded-2 fw-semibold text-muted';
            }
        }

        // Toggle input nominal pembayaran kas (full / weeks / custom)
        function togglePayInputs() {
            const isWeeks = document.getElementById('payTypeWeeks').checked;
            const isCustom = document.getElementById('payTypeCustom').checked;

            const weeksContainer = document.getElementById('weeksSelectContainer');
            const customContainer = document.getElementById('customAmountContainer');

            if (weeksContainer) weeksContainer.style.display = isWeeks ? 'block' : 'none';
            if (customContainer) customContainer.style.display = isCustom ? 'block' : 'none';
        }

        // Saat dropdown periode di modal payment dipilih
        function onPeriodSelected() {
            const periodSelect = document.getElementById('pay_period_id');
            if (!periodSelect || !periodSelect.selectedOptions[0]) return;

            const opt = periodSelect.selectedOptions[0];
            const weeksCount = parseInt(opt.getAttribute('data-weeks')) || 4;
            const amount = parseInt(opt.getAttribute('data-amount')) || (weeksCount * 5000);

            // Update label Full Amount
            const labelFull = document.getElementById('labelFullAmount');
            if (labelFull) {
                labelFull.innerText = 'Rp ' + amount.toLocaleString('id-ID');
            }

            // Update pilihan minggu di dropdown weeks_count_paid
            const weeksSelect = document.getElementById('weeks_count_paid');
            if (weeksSelect) {
                weeksSelect.innerHTML = '';
                for (let i = 1; i <= weeksCount; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.text = i + ' Minggu — Rp ' + (i * 5000).toLocaleString('id-ID');
                    if (i === weeksCount) option.selected = true;
                    weeksSelect.appendChild(option);
                }
            }
        }

        // Quick Pay Modal untuk Anak Spesifik
        function quickPayChild(volunteerId, volunteerName, periodDetails) {
            // Set ID anak
            const volSelect = document.getElementById('pay_volunteer_id');
            if (volSelect) volSelect.value = volunteerId;

            // Reset ke mode single periode
            switchPayMode('single');

            // Cari periode pertama yang belum lunas
            let unpaidFound = false;
            if (Array.isArray(periodDetails) && periodDetails.length > 0) {
                for (const p of periodDetails) {
                    if (p.status !== 'lunas') {
                        const periodSelect = document.getElementById('pay_period_id');
                        if (periodSelect) {
                            periodSelect.value = p.id;
                            onPeriodSelected();
                        }

                        // Uncheck all period checkboxes lalu centang yang belum lunas
                        document.querySelectorAll('.period-checkbox').forEach(cb => cb.checked = false);
                        const multiCb = document.getElementById('period_' + p.id);
                        if (multiCb) multiCb.checked = true;

                        // Defaultkan ke opsi bayar per minggu sisa atau lunas
                        const sisaMinggu = Math.ceil((p.remaining || 0) / 5000);
                        if (sisaMinggu > 0 && sisaMinggu < (p.weeks || 4)) {
                            const payTypeWeeks = document.getElementById('payTypeWeeks');
                            if (payTypeWeeks) {
                                payTypeWeeks.checked = true;
                                togglePayInputs();
                                const weeksSelect = document.getElementById('weeks_count_paid');
                                if (weeksSelect) weeksSelect.value = sisaMinggu;
                            }
                        } else {
                            const payTypeFull = document.getElementById('payTypeFull');
                            if (payTypeFull) payTypeFull.checked = true;
                            togglePayInputs();
                        }

                        unpaidFound = true;
                        break;
                    }
                }
            }

            if (!unpaidFound) {
                const payTypeFull = document.getElementById('payTypeFull');
                if (payTypeFull) payTypeFull.checked = true;
                togglePayInputs();
                onPeriodSelected();
            }

            const modal = new bootstrap.Modal(document.getElementById('modalPayment'));
            modal.show();
        }

        // Quick Pay Modal umum (backward compatibility)
        function quickPay(volunteerId, volunteerName, unpaidPeriodIds) {
            document.getElementById('pay_volunteer_id').value = volunteerId;
            document.querySelectorAll('.period-checkbox').forEach(cb => cb.checked = false);

            if (unpaidPeriodIds && unpaidPeriodIds.length > 0) {
                unpaidPeriodIds.forEach(id => {
                    const cb = document.getElementById('period_' + id);
                    if (cb) cb.checked = true;
                });
                const firstPeriod = document.getElementById('pay_period_id');
                if (firstPeriod) firstPeriod.value = unpaidPeriodIds[0];
            }

            onPeriodSelected();
            const modal = new bootstrap.Modal(document.getElementById('modalPayment'));
            modal.show();
        }

        // Pilihan Jumlah Minggu di Modal Periode Baru (4 minggu = 20rb, 5 minggu = 25rb)
        function selectPeriodWeeks(weeks) {
            const r4 = document.getElementById('radioWeeks4');
            const r5 = document.getElementById('radioWeeks5');
            const c4 = document.getElementById('cardWeeks4');
            const c5 = document.getElementById('cardWeeks5');
            const amtInput = document.getElementById('period_amount_input');

            if (weeks === 4) {
                r4.checked = true;
                c4.style.background = 'rgba(37,99,235,0.15)';
                c4.style.borderColor = '#2563EB';
                c5.style.background = 'rgba(255,255,255,0.03)';
                c5.style.borderColor = 'rgba(255,255,255,0.1)';
                if (amtInput) amtInput.value = 20000;
            } else {
                r5.checked = true;
                c5.style.background = 'rgba(245,158,11,0.15)';
                c5.style.borderColor = '#F59E0B';
                c4.style.background = 'rgba(255,255,255,0.03)';
                c4.style.borderColor = 'rgba(255,255,255,0.1)';
                if (amtInput) amtInput.value = 25000;
            }
        }

        function updatePeriodAmountPreview() {
            const r5 = document.getElementById('radioWeeks5');
            selectPeriodWeeks(r5 && r5.checked ? 5 : 4);
        }

        // Edit Data Anak
        function editVolunteer(v) {
            document.getElementById('modalVolunteerTitle').innerHTML = '<i class="fa-solid fa-user-pen text-secondary me-2"></i> Edit Data Anak';
            document.getElementById('formVolunteer').action = '/admin/kas/volunteer/update/' + v.id;
            document.getElementById('vol_name').value = v.name;
            document.getElementById('vol_phone').value = v.phone;
            document.getElementById('vol_division').value = v.division || 'Remaja DOT';
            document.getElementById('vol_notes').value = v.notes || '';
            document.getElementById('vol_is_active').value = v.is_active ? '1' : '0';
            document.getElementById('vol_edit_extra').style.display = 'block';

            const modal = new bootstrap.Modal(document.getElementById('modalVolunteer'));
            modal.show();
        }

        // Reset form volunteer
        document.getElementById('modalVolunteer').addEventListener('hidden.bs.modal', function () {
            document.getElementById('modalVolunteerTitle').innerHTML = '<i class="fa-solid fa-user-plus text-secondary me-2"></i> Tambah Data Anak Baru';
            document.getElementById('formVolunteer').action = '{{ route("admin.kas.volunteer.store") }}';
            document.getElementById('vol_name').value = '';
            document.getElementById('vol_phone').value = '';
            document.getElementById('vol_division').value = 'Remaja DOT';
            document.getElementById('vol_notes').value = '';
            document.getElementById('vol_edit_extra').style.display = 'none';
        });

        // Buka tab berdasarkan parameter URL ?tab=... & inisialisasi dropdown periode
        document.addEventListener("DOMContentLoaded", function() {
            onPeriodSelected();
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
