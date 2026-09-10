<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner Kehadiran QR Event | DOT Admin</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 QR Code Scanner Library (Multi-CDN & Local Fallback) -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    <script>
        if (typeof Html5Qrcode === 'undefined') {
            document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"><\/script>');
        }
    </script>
    <script>
        if (typeof Html5Qrcode === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/html5-qrcode@2.3.8/html5-qrcode.min.js"><\/script>');
        }
    </script>
    <script>
        if (typeof Html5Qrcode === 'undefined') {
            document.write('<script src="{{ asset('js/html5-qrcode.min.js') }}"><\/script>');
        }
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            if (typeof window.Html5Qrcode === 'undefined' && typeof window.__Html5QrcodeLibrary__ !== 'undefined') {
                window.Html5Qrcode = window.__Html5QrcodeLibrary__.Html5Qrcode;
                window.Html5QrcodeScanner = window.__Html5QrcodeLibrary__.Html5QrcodeScanner;
            }
        });
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        .scanner-container {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #060D18;
            border: 2px dashed rgba(56, 189, 248, 0.3);
            width: 100%;
            min-height: 280px;
        }

        #qr-reader {
            width: 100% !important;
            max-width: 100% !important;
            border: none !important;
            margin: 0 auto !important;
            padding: 0 !important;
            background: transparent !important;
        }

        #qr-reader video {
            width: 100% !important;
            height: auto !important;
            max-height: 65vh !important;
            border-radius: 14px !important;
            display: block !important;
            margin: 0 auto !important;
        }

        #qr-reader__scan_region {
            width: 100% !important;
            min-height: 260px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #scannerLoading, #scannerPlaceholder {
            min-height: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Modern Custom Viewfinder Overlay */
        .scanner-viewfinder-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .viewfinder-box {
            position: relative;
            width: min(270px, 72vw);
            height: min(270px, 72vw);
            border-radius: 20px;
            box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .pulse-focus {
            animation: pulseFocusBox 0.6s ease-out;
        }

        @keyframes pulseFocusBox {
            0% { transform: scale(1); box-shadow: 0 0 20px #22C55E, 0 0 0 9999px rgba(0, 0, 0, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 0 35px #22C55E, 0 0 0 9999px rgba(0, 0, 0, 0.2); }
            100% { transform: scale(1); box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.3); }
        }

        .vf-corner {
            position: absolute;
            width: 32px;
            height: 32px;
            border: 4px solid #22C55E;
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.7);
        }
        .vf-tl { top: 0; left: 0; border-right: none; border-bottom: none; border-top-left-radius: 14px; }
        .vf-tr { top: 0; right: 0; border-left: none; border-bottom: none; border-top-right-radius: 14px; }
        .vf-bl { bottom: 0; left: 0; border-right: none; border-top: none; border-bottom-left-radius: 14px; }
        .vf-br { bottom: 0; right: 0; border-left: none; border-top: none; border-bottom-right-radius: 14px; }

        .scan-laser-line {
            position: absolute;
            left: 5%;
            width: 90%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #22C55E 50%, transparent);
            box-shadow: 0 0 12px #22C55E;
            border-radius: 50%;
            animation: scanLaserAnim 2.2s ease-in-out infinite alternate;
        }

        @keyframes scanLaserAnim {
            0% { top: 10%; opacity: 0.4; }
            50% { opacity: 1; }
            100% { top: 90%; opacity: 0.4; }
        }

        .tap-focus-hint {
            position: absolute;
            bottom: 12px;
            background: rgba(0, 0, 0, 0.65);
            color: #E2E8F0;
            font-size: 11px;
            padding: 5px 14px;
            border-radius: 20px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.15);
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
            font-size: clamp(20px, 4.5vw, 28px);
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

        .btn-cyan {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            padding: 10px 18px;
            transition: all 0.2s;
        }

        .btn-cyan:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            color: #FFFFFF;
            transform: translateY(-2px);
        }

        .scan-result-card {
            display: none;
            padding: 20px;
            border-radius: 16px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-custom {
            --bs-table-bg: transparent;
            color: #CBD5E1;
            min-width: 360px;
        }
        .table-custom th {
            color: #94A3B8;
            font-weight: 600;
            font-size: 12px;
            border-bottom: 1px solid rgba(56, 189, 248, 0.2);
            text-transform: uppercase;
        }
        .table-custom td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 13px;
        }
        .table-custom tbody tr:hover td {
            background-color: rgba(56, 189, 248, 0.05) !important;
        }
        .live-clock-pill {
            background: rgba(15, 23, 42, 0.75);
            border: 1px solid rgba(56, 189, 248, 0.4);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.15);
        }
        .live-indicator-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #22c55e;
            box-shadow: 0 0 8px #22c55e;
            display: inline-block;
            animation: pulseLive 1.5s infinite;
        }
        @keyframes pulseLive {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.35; transform: scale(0.85); }
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
                <span class="fw-bold text-white fs-6 fs-md-5 text-truncate" style="max-width: 40vw;">
                    <i class="fa-solid fa-qrcode text-info me-1 me-sm-2"></i> <span class="d-none d-sm-inline">Scanner Kehadiran </span>Event
                </span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <!-- JAM PERANGKAT REAL-TIME -->
                <div class="live-clock-pill d-flex align-items-center gap-2 px-2.5 px-sm-3 py-1.5 rounded-pill" title="Jam Real-time Perangkat / Device Anda">
                    <span class="live-indicator-dot"></span>
                    <i class="fa-regular fa-clock text-info" style="font-size: 13px;"></i>
                    <span id="deviceLiveClock" class="fw-bold text-white font-monospace" style="font-size: 13px; letter-spacing: 0.5px;">--:--:--</span>
                    <span class="badge bg-cyan text-white px-1.5 py-0.5 rounded text-uppercase d-none d-sm-inline-block" style="font-size: 9px; font-weight: 700;">WIB</span>
                </div>

                <a href="{{ route('admin.events.participants', $selectedEvent->id) }}" class="btn btn-sm btn-outline-info rounded-pill px-2.5 px-sm-3 fw-semibold">
                    <i class="fa-solid fa-users me-1"></i> <span class="d-none d-md-inline">Data Peserta</span> ({{ $totalRegistered }})
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-3 px-lg-4 mt-4">
        <!-- Event Header & Selector -->
        <div class="glass-card mb-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-7">
                    <span class="badge bg-primary bg-opacity-25 text-info border border-info mb-2 px-3 py-1">
                        <i class="fa-solid fa-calendar-check me-1"></i> Event Aktif
                    </span>
                    <h3 class="fw-bold text-white mb-1">{{ $selectedEvent->title }}</h3>
                    <p class="text-secondary small mb-0">
                        <i class="fa-regular fa-calendar me-1"></i> {{ date('d F Y', strtotime($selectedEvent->event_date)) }} • 
                        <i class="fa-regular fa-clock me-1"></i> {{ $selectedEvent->time_formatted }} WIB • 
                        <i class="fa-solid fa-location-dot me-1"></i> {{ $selectedEvent->location }}
                    </p>
                </div>
                <div class="col-lg-5">
                    <label class="small text-secondary mb-1">Ganti Event:</label>
                    <select class="form-select" onchange="if(this.value) window.location.href='/admin/events/scan/' + this.value">
                        @foreach($events as $ev)
                            <option value="{{ $ev->id }}" {{ $ev->id == $selectedEvent->id ? 'selected' : '' }}>
                                {{ $ev->title }} ({{ date('d M Y', strtotime($ev->event_date)) }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- STATISTIK KEHADIRAN -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="text-secondary small mb-1">Total Pendaftar</div>
                    <div class="stat-val text-white" id="statRegistered">{{ $totalRegistered }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card" style="border-color: rgba(34, 197, 94, 0.3);">
                    <div class="text-success small mb-1"><i class="fa-solid fa-circle-check me-1"></i> Sudah Hadir</div>
                    <div class="stat-val text-success" id="statAttended">{{ $totalAttended }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card" style="border-color: rgba(245, 158, 11, 0.3);">
                    <div class="text-warning small mb-1"><i class="fa-solid fa-hourglass-half me-1"></i> Belum Hadir</div>
                    <div class="stat-val text-warning" id="statPending">{{ $totalPending }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card" style="border-color: rgba(56, 189, 248, 0.3);">
                    <div class="text-info small mb-1">Persentase</div>
                    <div class="stat-val text-info" id="statPercent">
                        {{ $totalRegistered > 0 ? round(($totalAttended / $totalRegistered) * 100) : 0 }}%
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- KOLOM KIRI: SCANNER KAMERA & MANUAL INPUT -->
            <div class="col-lg-6">
                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-white mb-0">
                            <i class="fa-solid fa-camera text-info me-2"></i> Kamera Scan QR
                        </h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <button id="btnStartScan" class="btn btn-sm btn-cyan" onclick="startScanner()">
                                <i class="fa-solid fa-play me-1"></i> Buka Kamera
                            </button>
                            <button id="btnUploadScan" class="btn btn-sm btn-outline-info rounded-pill px-3" onclick="triggerFileInput()" title="Pindai dari screenshot atau file foto QR Code">
                                <i class="fa-solid fa-file-image me-1"></i> Scan dari Foto QR
                            </button>
                            <input type="file" id="qrFileInput" accept="image/*" class="d-none" onchange="handleFileScan(event)">
                            <button id="btnStopScan" class="btn btn-sm btn-outline-danger d-none" onclick="stopScanner()">
                                <i class="fa-solid fa-stop me-1"></i> Tutup Kamera
                            </button>
                        </div>
                    </div>

                    <!-- Peringatan HTTPS / Secure Context untuk Chrome -->
                    <div id="insecureOriginAlert" class="alert alert-warning border-0 rounded-4 p-3 mb-3 d-none" style="background: rgba(245, 158, 11, 0.15); border: 1px solid rgba(245, 158, 11, 0.4) !important;">
                        <div class="d-flex align-items-start gap-3">
                            <i class="fa-solid fa-triangle-exclamation fs-4 text-warning mt-1"></i>
                            <div class="small">
                                <strong class="d-block text-white mb-1">Browser Memblokir Akses Kamera (Status: Not Secure)</strong>
                                <span class="text-light opacity-90">Google Chrome membatasi izin kamera hanya untuk koneksi <strong>HTTPS</strong> atau <strong>localhost</strong>. Karena dibuka via domain lokal HTTP (.test), browser mengunci webcam.</span>
                                <div class="mt-2 d-flex flex-wrap gap-2">
                                    <a href="http://localhost/dot-teens/public/admin/events/scan/{{ $selectedEvent->id }}" class="btn btn-sm btn-success fw-bold text-dark rounded-pill px-3 shadow">
                                        <i class="fa-solid fa-bolt me-1 text-dark"></i> Buka via Localhost (Kamera Aktif)
                                    </a>
                                    <a id="btnSwitchHttps" href="#" class="btn btn-sm btn-light fw-bold text-dark rounded-pill px-3">
                                        <i class="fa-solid fa-lock me-1 text-success"></i> Buka via HTTPS
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown Pemilihan Kamera (Jika Laptop memiliki lebih dari 1 kamera / webcam) -->
                    <div id="cameraSelectWrapper" class="mb-3 d-none">
                        <label class="small text-secondary mb-1 fw-semibold"><i class="fa-solid fa-video me-1"></i> Sumber Kamera:</label>
                        <select id="cameraSelect" class="form-select form-select-sm" onchange="onCameraChange(this.value)"></select>
                    </div>

                    <!-- Area Kamera QR Code -->
                    <div class="scanner-container" id="scannerWrapper">
                        <div id="qr-reader"></div>

                        <!-- Custom Modern Viewfinder Overlay (Green Corners + Laser Scan) -->
                        <div id="scannerOverlay" class="scanner-viewfinder-overlay d-none">
                            <div class="viewfinder-box">
                                <div class="scan-laser-line"></div>
                                <span class="vf-corner vf-tl"></span>
                                <span class="vf-corner vf-tr"></span>
                                <span class="vf-corner vf-bl"></span>
                                <span class="vf-corner vf-br"></span>
                            </div>
                            <div class="tap-focus-hint">
                                <i class="fa-solid fa-hand-pointer me-1"></i> Arahkan QR ke kotak atau ketuk layar untuk fokus
                            </div>
                        </div>

                        <!-- Toast Notifikasi Status Scanner (Feedback Zoom/Fokus) -->
                        <div id="scannerToast" class="badge bg-dark bg-opacity-75 text-info px-3 py-2 rounded-pill d-none shadow" style="position: absolute; top: 14px; left: 50%; transform: translateX(-50%); z-index: 25; border: 1px solid rgba(56, 189, 248, 0.4); font-size: 12px; pointer-events: none; backdrop-filter: blur(8px);"></div>

                        <div id="scannerLoading" class="text-center p-4 d-none">
                            <div class="spinner-border text-info mb-3" style="width: 2.8rem; height: 2.8rem;"></div>
                            <h6 class="text-white fw-bold mb-1">Menghubungkan Kamera...</h6>
                            <p class="text-secondary small mb-0">Jika muncul dialog izin di browser, silakan klik <strong>"Allow / Izinkan"</strong>.</p>
                        </div>
                        <div id="scannerPlaceholder" class="text-center p-4">
                            <i class="fa-solid fa-qrcode fs-1 text-secondary opacity-50 mb-3"></i>
                            <p class="text-secondary small mb-3">Kamera scanner belum aktif atau belum diberikan izin.</p>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <button class="btn btn-sm btn-cyan px-3 py-2 fw-bold shadow" onclick="startScanner()">
                                    <i class="fa-solid fa-camera me-1"></i> Izinkan & Mulai Kamera
                                </button>
                                <button class="btn btn-sm btn-outline-info rounded-pill px-3 py-2" onclick="triggerFileInput()">
                                    <i class="fa-solid fa-file-image me-1"></i> Scan dari Foto / Gambar QR
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- TOOLBAR KONTROL KAMERA (ZOOM, SENTER & FOKUS) -->
                    <div id="cameraControlsBar" class="d-none mt-2 p-2 rounded-3 d-flex justify-content-between align-items-center flex-wrap gap-2" style="background: rgba(15, 23, 42, 0.7); border: 1px solid rgba(56, 189, 248, 0.2);">
                        <div class="d-flex align-items-center gap-1">
                            <span class="small text-secondary me-1 fw-bold"><i class="fa-solid fa-magnifying-glass me-1"></i>Zoom:</span>
                            <button type="button" class="btn btn-sm btn-cyan text-white px-2 py-0.5 rounded-pill btn-zoom" onclick="setCameraZoom(1.0)" id="zoom1x">1x</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary text-light px-2 py-0.5 rounded-pill btn-zoom" onclick="setCameraZoom(1.5)" id="zoom15x">1.5x</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary text-light px-2 py-0.5 rounded-pill btn-zoom" onclick="setCameraZoom(2.0)" id="zoom2x">2x</button>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" id="btnTorchToggle" class="btn btn-sm btn-outline-warning rounded-pill px-2 py-0.5 d-none" onclick="toggleTorch()">
                                <i class="fa-solid fa-bolt me-1"></i> Senter
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-2 py-0.5" onclick="triggerFocus()">
                                <i class="fa-solid fa-crosshairs me-1 text-info"></i> Fokuskan
                            </button>
                        </div>
                    </div>

                    <!-- TIPS SCANNING LAYAR HP -->
                    <div class="small text-secondary mt-2 px-1 d-flex align-items-center gap-2" style="font-size: 12px; line-height: 1.5;">
                        <i class="fa-solid fa-lightbulb text-warning fs-6"></i>
                        <span><strong>Tips Scan:</strong> Jaga jarak sekitar <strong>20 - 30 cm</strong> dari layar HP agar kamera fokus otomatis, atau gunakan tombol <strong>1.5x Zoom</strong>.</span>
                    </div>

                    <!-- Input Manual Alternatif -->
                    <div class="mt-4 pt-3 border-top border-secondary border-opacity-25">
                        <label class="small text-secondary mb-2 fw-semibold">
                            <i class="fa-solid fa-keyboard me-1"></i> Input Kode Tiket Manual (Jika Kamera Gelap/Bermasalah)
                        </label>
                        <form id="manualScanForm" onsubmit="handleManualSubmit(event)" class="d-flex gap-2">
                            <input type="text" id="manualTicketInput" class="form-control" placeholder="Cth: DRN-8K4P2" autocomplete="off">
                            <button type="submit" class="btn btn-cyan px-3">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- CARD FEEDBACK HASIL SCAN REAL-TIME -->
                <div id="scanFeedbackCard" class="scan-result-card"></div>
            </div>

            <!-- KOLOM KANAN: RIWAYAT SCAN TERBARU -->
            <div class="col-lg-6">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-white mb-0">
                            <i class="fa-solid fa-clock-rotate-left text-primary me-2"></i> Kehadiran Terkini
                        </h5>
                        <span class="badge bg-secondary text-light small" id="recentCounter">
                            {{ count($recentAttended) }} Peserta
                        </span>
                    </div>

                    <div class="table-responsive" style="max-height: 480px; overflow-y: auto;">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Peserta</th>
                                    <th>Kategori</th>
                                    <th>Waktu Check-in</th>
                                </tr>
                            </thead>
                            <tbody id="recentAttendeesBody">
                                @forelse($recentAttended as $att)
                                <tr>
                                    <td>
                                        <div class="fw-bold text-white">{{ $att->name }}</div>
                                        <small class="text-info font-monospace">{{ $att->ticket_code }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-50 text-light">{{ $att->category }}</span>
                                    </td>
                                    <td>
                                        <div class="text-success small fw-semibold">
                                            <i class="fa-solid fa-check me-1"></i> {{ $att->attended_at ? $att->attended_at->timezone('Asia/Jakarta')->format('H:i:s') : '-' }} WIB
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr id="noRecentRow">
                                    <td colspan="3" class="text-center py-4 text-secondary">
                                        Belum ada peserta yang check-in.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AUDIO NOTIFICATION EFFECTS (SYNTHESIZED WEB AUDIO API - SAFE LAZY INIT) -->
    <script>
        let audioCtx = null;
        function getAudioContext() {
            if (!audioCtx) {
                try {
                    const AudioClass = window.AudioContext || window.webkitAudioContext;
                    if (AudioClass) audioCtx = new AudioClass();
                } catch (e) {
                    console.warn("AudioContext init skipped", e);
                }
            }
            return audioCtx;
        }

        function playSoundSuccess() {
            try {
                const ctx = getAudioContext();
                if (!ctx) return;
                if (ctx.state === 'suspended') ctx.resume();
                const now = ctx.currentTime;
                // Tone 1
                const osc1 = ctx.createOscillator();
                const gain1 = ctx.createGain();
                osc1.type = 'sine';
                osc1.frequency.setValueAtTime(587.33, now); // D5
                osc1.frequency.exponentialRampToValueAtTime(880, now + 0.15); // A5
                gain1.gain.setValueAtTime(0.3, now);
                gain1.gain.exponentialRampToValueAtTime(0.01, now + 0.3);
                osc1.connect(gain1);
                gain1.connect(ctx.destination);
                osc1.start(now);
                osc1.stop(now + 0.3);
            } catch (e) { console.log(e); }
        }

        function playSoundWarning() {
            try {
                const ctx = getAudioContext();
                if (!ctx) return;
                if (ctx.state === 'suspended') ctx.resume();
                const now = ctx.currentTime;
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = 'triangle';
                osc.frequency.setValueAtTime(220, now);
                osc.frequency.setValueAtTime(180, now + 0.1);
                gain.gain.setValueAtTime(0.4, now);
                gain.gain.exponentialRampToValueAtTime(0.01, now + 0.35);
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start(now);
                osc.stop(now + 0.35);
            } catch (e) { console.log(e); }
        }

        // SCANNER LOGIC - DUAL ENGINE (HARDWARE ML BARCODEDETECTOR + FULL-FRAME HTML5-QRCODE)
        let html5QrCode = null;
        let barcodeDetectorInstance = null;
        let nativeDetectorInterval = null;
        let isProcessing = false;
        let availableCameras = [];
        let currentCameraId = null;
        let currentZoom = 1.0;
        let isTorchActive = false;
        const eventId = {{ $selectedEvent->id }};

        // Inisialisasi Hardware ML BarcodeDetector jika didukung (Chrome Android / Chromium)
        if ('BarcodeDetector' in window) {
            try {
                barcodeDetectorInstance = new BarcodeDetector({ formats: ['qr_code'] });
                console.log("⚡ Hardware ML BarcodeDetector aktif untuk scan QR instan.");
            } catch (e) {
                console.warn("BarcodeDetector init:", e);
                barcodeDetectorInstance = null;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Deteksi Insecure Origin di Chrome/Edge
            if (location.protocol !== 'https:' && location.hostname !== 'localhost' && location.hostname !== '127.0.0.1') {
                const alertEl = document.getElementById('insecureOriginAlert');
                if (alertEl) {
                    alertEl.classList.remove('d-none');
                    const btnHttps = document.getElementById('btnSwitchHttps');
                    if (btnHttps) {
                        btnHttps.href = 'https://' + location.host + location.pathname + location.search;
                    }
                }
            }

            // Ketuk area kamera untuk refokus lensa otomatis
            const scannerWrap = document.getElementById('scannerWrapper');
            if (scannerWrap) {
                scannerWrap.addEventListener('click', function(e) {
                    if (e.target.closest('button') || e.target.closest('#scannerPlaceholder') || e.target.closest('#scannerLoading')) return;
                    if (html5QrCode && html5QrCode.isScanning) {
                        triggerFocus();
                    }
                });
            }
        });

        function triggerFileInput() {
            const fi = document.getElementById('qrFileInput');
            if (fi) fi.click();
        }

        function getQrClass() {
            return window.Html5Qrcode || (typeof Html5Qrcode !== 'undefined' ? Html5Qrcode : null) || (window.__Html5QrcodeLibrary__ ? window.__Html5QrcodeLibrary__.Html5Qrcode : null);
        }

        function ensureQrLibrary() {
            return new Promise((resolve, reject) => {
                const cls = getQrClass();
                if (cls) return resolve(cls);

                const cdnUrls = [
                    'https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js',
                    'https://cdn.jsdelivr.net/npm/html5-qrcode@2.3.8/html5-qrcode.min.js'
                ];

                let idx = 0;
                function loadNext() {
                    if (idx >= cdnUrls.length) {
                        return reject(new Error("Semua CDN library scanner gagal dimuat."));
                    }
                    const s = document.createElement('script');
                    s.src = cdnUrls[idx++];
                    s.onload = () => {
                        const loadedCls = getQrClass();
                        if (loadedCls) {
                            resolve(loadedCls);
                        } else {
                            loadNext();
                        }
                    };
                    s.onerror = () => loadNext();
                    document.head.appendChild(s);
                }
                loadNext();
            });
        }

        async function handleFileScan(event) {
            const file = event.target.files[0];
            if (!file) return;

            let QrClass;
            try {
                QrClass = await ensureQrLibrary();
            } catch (e) {
                alert("Library scanner belum siap. Periksa koneksi internet Anda.");
                return;
            }

            if (!html5QrCode) {
                html5QrCode = new QrClass("qr-reader");
            }

            const feedbackCard = document.getElementById('scanFeedbackCard');
            feedbackCard.style.display = 'block';
            feedbackCard.style.background = 'rgba(56, 189, 248, 0.1)';
            feedbackCard.style.border = '1px solid rgba(56, 189, 248, 0.3)';
            feedbackCard.innerHTML = `<div class="d-flex align-items-center gap-3"><div class="spinner-border text-info spinner-border-sm"></div><div>Menganalisis file QR: <strong>${file.name}</strong>...</div></div>`;

            html5QrCode.scanFile(file, true)
                .then(decodedText => {
                    submitScanCode(decodedText);
                    event.target.value = '';
                })
                .catch(err => {
                    console.error("Scan file error:", err);
                    showErrorFeedback("QR Code tidak terbaca pada file ini. Pastikan gambar jelas dan tidak blur.");
                    event.target.value = '';
                });
        }

        let isStarting = false;

        async function startScanner() {
            if (isStarting) return;
            isStarting = true;

            const btnStart = document.getElementById('btnStartScan');
            const placeholder = document.getElementById('scannerPlaceholder');
            const loading = document.getElementById('scannerLoading');
            const btnStop = document.getElementById('btnStopScan');
            const controlsBar = document.getElementById('cameraControlsBar');

            // Reset UI
            if (placeholder) placeholder.classList.add('d-none');
            if (controlsBar) controlsBar.classList.add('d-none');
            if (loading) loading.classList.remove('d-none');
            if (btnStart) {
                btnStart.disabled = true;
                btnStart.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Menghubungkan Kamera...';
            }

            function resetLoadingUI() {
                isStarting = false;
                if (loading) loading.classList.add('d-none');
                if (btnStart) {
                    btnStart.disabled = false;
                    btnStart.classList.remove('d-none');
                    btnStart.innerHTML = '<i class="fa-solid fa-play me-1"></i> Buka Kamera';
                }
            }

            // Safety timeout 12 detik agar tidak macet di status loading
            const startTimeout = setTimeout(() => {
                if (isStarting) {
                    console.warn("Camera start timeout reached");
                    resetLoadingUI();
                    showCameraError("Kamera membutuhkan waktu terlalu lama untuk merespons. Silakan coba lagi atau gunakan opsi 'Scan dari Foto QR'.");
                }
            }, 12000);

            // Cek protokol HTTPS / secure context
            if (location.protocol !== 'https:' && location.hostname !== 'localhost' && location.hostname !== '127.0.0.1') {
                clearTimeout(startTimeout);
                resetLoadingUI();
                const httpsUrl = 'https://' + location.host + location.pathname + location.search;
                showCameraError(
                    "Browser HP mewajibkan koneksi <strong>HTTPS aman</strong> untuk mengakses kamera.<br><br>" +
                    "Silakan akses halaman ini menggunakan tautan HTTPS berikut:<br>" +
                    "<a href='" + httpsUrl + "' class='text-info fw-bold text-decoration-underline'>Buka via HTTPS Aman</a>"
                );
                return;
            }

            // Cek navigator mediaDevices
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                clearTimeout(startTimeout);
                resetLoadingUI();
                showCameraError(
                    "Browser pada perangkat ini tidak mengizinkan akses kamera langsung.<br><br>" +
                    "Pastikan Anda menggunakan Google Chrome atau Safari versi terbaru dan situs dibuka via <strong>HTTPS</strong>.<br>" +
                    "Anda juga dapat menggunakan tombol <strong>'Scan dari Foto QR'</strong> untuk memilih foto tiket dari galeri."
                );
                return;
            }

            let QrClass;
            try {
                QrClass = await ensureQrLibrary();
            } catch (err) {
                clearTimeout(startTimeout);
                resetLoadingUI();
                console.error("Gagal memuat library:", err);
                showCameraError("Library scanner belum termuat sempurna. Silakan periksa koneksi internet Anda dan tekan 'Coba Lagi'.");
                return;
            }

            // Bersihkan instance lama jika ada
            if (html5QrCode) {
                try {
                    if (html5QrCode.isScanning) {
                        await html5QrCode.stop();
                    }
                    html5QrCode.clear();
                } catch (e) {
                    console.log("Cleanup previous scanner:", e);
                }
                html5QrCode = null;
            }

            // Inisialisasi instance baru yang bersih
            try {
                html5QrCode = new QrClass("qr-reader", { verbose: false });
            } catch (e) {
                clearTimeout(startTimeout);
                resetLoadingUI();
                console.error("Init scanner error:", e);
                showCameraError("Gagal menginisialisasi scanner: " + e.message);
                return;
            }

            // SANGAT PENTING: Tanpa qrbox agar tidak terjadi bug koordinat crop / offset
            // Full-frame scanning membaca frame kamera secara utuh 100% pada resolusi sensor
            const config = { 
                fps: 20
            };

            function fixVideoLayout() {
                const reader = document.getElementById('qr-reader');
                if (reader) {
                    reader.style.width = '100%';
                    reader.style.maxWidth = '100%';
                }
                const scanRegion = document.getElementById('qr-reader__scan_region');
                if (scanRegion) {
                    scanRegion.style.width = '100%';
                    scanRegion.style.display = 'flex';
                    scanRegion.style.alignItems = 'center';
                    scanRegion.style.justifyContent = 'center';
                }
                const videoEl = document.querySelector('#qr-reader video');
                if (videoEl) {
                    videoEl.style.width = '100%';
                    videoEl.style.height = 'auto';
                    videoEl.style.maxHeight = '65vh';
                    videoEl.style.display = 'block';
                    videoEl.style.margin = '0 auto';
                    videoEl.style.borderRadius = '14px';
                    videoEl.style.objectFit = 'cover';
                }
            }

            function onCameraStarted() {
                clearTimeout(startTimeout);
                isStarting = false;

                if (loading) loading.classList.add('d-none');
                const ph = document.getElementById('scannerPlaceholder');
                if (ph) ph.classList.add('d-none');
                if (btnStart) {
                    btnStart.classList.add('d-none');
                    btnStart.disabled = false;
                    btnStart.innerHTML = '<i class="fa-solid fa-play me-1"></i> Buka Kamera';
                }
                if (btnStop) btnStop.classList.remove('d-none');

                // Tampilkan viewfinder overlay visual dan toolbar kontrol
                const overlay = document.getElementById('scannerOverlay');
                if (overlay) overlay.classList.remove('d-none');

                const controlsBar = document.getElementById('cameraControlsBar');
                if (controlsBar) controlsBar.classList.remove('d-none');

                fixVideoLayout();
                setTimeout(fixVideoLayout, 150);
                setTimeout(fixVideoLayout, 400);

                // Jalankan Engine Hardware ML BarcodeDetector secara paralel
                startNativeBarcodeDetectorLoop();

                // Deteksi kapabilitas Torch / Senter
                try {
                    const caps = html5QrCode.getRunningTrackCameraCapabilities();
                    if (caps && caps.torch) {
                        const torchBtn = document.getElementById('btnTorchToggle');
                        if (torchBtn) torchBtn.classList.remove('d-none');
                    }
                } catch (e) {}

                // Terapkan autofocus continuous otomatis pada sensor lensa
                setTimeout(() => {
                    applyOptimalCameraConstraints();
                }, 600);

                // Ambil daftar kamera untuk switcher jika lebih dari 1
                QrClass.getCameras().then(devices => {
                    if (devices && devices.length > 1) {
                        availableCameras = devices;
                        const wrapper = document.getElementById('cameraSelectWrapper');
                        const selectEl = document.getElementById('cameraSelect');
                        if (selectEl) {
                            selectEl.innerHTML = '';
                            devices.forEach((dev, idx) => {
                                const opt = document.createElement('option');
                                opt.value = dev.id;
                                opt.text = dev.label || `Kamera ${idx + 1}`;
                                if (currentCameraId && dev.id === currentCameraId) opt.selected = true;
                                selectEl.appendChild(opt);
                            });
                            if (wrapper) wrapper.classList.remove('d-none');
                        }
                    }
                }).catch(() => {});
            }

            function handleCameraError(err) {
                clearTimeout(startTimeout);
                resetLoadingUI();

                console.error("Gagal start kamera:", err);
                let userMsg = "Tidak dapat mengakses kamera.";
                if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                    userMsg = "<strong>Izin Kamera Ditolak / Belum Diizinkan:</strong><br><br>" +
                        "1. Di <strong>Google Chrome HP</strong>: Ketuk ikon <strong>Gembok / Pengaturan Situs</strong> di sebelah kiri kolom URL (atau titik tiga > Setelan Situs > Kamera), lalu ubah menjadi <strong>'Izinkan' (Allow)</strong>.<br>" +
                        "2. Di <strong>Safari iPhone</strong>: Buka Pengaturan HP > Safari > Kamera > Izinkan.<br>" +
                        "3. Setelah itu, ketuk tombol <strong>'Coba Lagi'</strong> di bawah ini.";
                } else if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                    userMsg = "Kamera tidak terdeteksi pada perangkat ini.";
                } else if (err.name === 'NotReadableError' || err.name === 'TrackStartError') {
                    userMsg = "Kamera sedang digunakan oleh aplikasi lain. Tutup aplikasi kamera lain lalu coba lagi.";
                } else if (err.message) {
                    userMsg += " (" + err.message + ")";
                }
                showCameraError(userMsg);
            }

            const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

            // Jika user memilih kamera manual dari dropdown
            if (currentCameraId) {
                html5QrCode.start(currentCameraId, config, onScanSuccess, () => {})
                    .then(onCameraStarted)
                    .catch(handleCameraError);
                return;
            }

            if (isMobile) {
                // Gunakan standard facingMode environment murni yang 100% didukung library html5-qrcode
                html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess, () => {})
                    .then(onCameraStarted)
                    .catch(errEnv => {
                        console.warn("Gagal kamera environment, coba kamera user...", errEnv);
                        if (errEnv.name === 'NotAllowedError' || errEnv.name === 'PermissionDeniedError') {
                            handleCameraError(errEnv);
                            return;
                        }
                        try { html5QrCode.clear(); } catch(e) {}
                        html5QrCode = new QrClass("qr-reader", { verbose: false });
                        html5QrCode.start({ facingMode: "user" }, config, onScanSuccess, () => {})
                            .then(onCameraStarted)
                            .catch(handleCameraError);
                    });
            } else {
                // Di Laptop / Desktop
                QrClass.getCameras().then(devices => {
                    if (devices && devices.length > 0) {
                        currentCameraId = devices[0].id;
                        html5QrCode.start(currentCameraId, config, onScanSuccess, () => {})
                            .then(onCameraStarted)
                            .catch(handleCameraError);
                    } else {
                        html5QrCode.start({ facingMode: "user" }, config, onScanSuccess, () => {})
                            .then(onCameraStarted)
                            .catch(handleCameraError);
                    }
                }).catch(() => {
                    html5QrCode.start({ facingMode: "user" }, config, onScanSuccess, () => {})
                        .then(onCameraStarted)
                        .catch(handleCameraError);
                });
            }
        }

        // FUNGSI KONTROL KAMERA & ZOOM TINGKAT LANJUT
        function getCameraTrack() {
            try {
                const videoEl = document.querySelector('#qr-reader video');
                if (videoEl && videoEl.srcObject) {
                    const tracks = videoEl.srcObject.getVideoTracks();
                    if (tracks && tracks.length > 0) return tracks[0];
                }
            } catch (e) {}
            return null;
        }

        function applyOptimalCameraConstraints() {
            const track = getCameraTrack();
            if (!track) return;
            try {
                const caps = track.getCapabilities ? track.getCapabilities() : {};
                const advanced = [];

                if (caps.focusMode && Array.isArray(caps.focusMode) && caps.focusMode.includes('continuous')) {
                    advanced.push({ focusMode: 'continuous' });
                }

                if (advanced.length > 0) {
                    track.applyConstraints({ advanced }).catch(() => {});
                }
            } catch (e) {
                console.log("applyOptimalCameraConstraints err:", e);
            }
        }

        function startNativeBarcodeDetectorLoop() {
            if (nativeDetectorInterval) {
                clearInterval(nativeDetectorInterval);
                nativeDetectorInterval = null;
            }
            if (!barcodeDetectorInstance) return;

            // Loop deteksi frame langsung melalui Native Hardware ML Vision
            nativeDetectorInterval = setInterval(async () => {
                if (isProcessing) return;
                const videoEl = document.querySelector('#qr-reader video');
                if (!videoEl || videoEl.readyState < 2) return;

                try {
                    const barcodes = await barcodeDetectorInstance.detect(videoEl);
                    if (barcodes && barcodes.length > 0 && !isProcessing) {
                        const code = barcodes[0].rawValue;
                        if (code) {
                            console.log("⚡ [Native ML Vision] QR Terdeteksi:", code);
                            onScanSuccess(code);
                        }
                    }
                } catch (e) {}
            }, 80);
        }

        let toastTimeout = null;
        function showScannerToast(msg, icon = 'fa-solid fa-circle-info') {
            const toast = document.getElementById('scannerToast');
            if (!toast) return;
            toast.innerHTML = `<i class="${icon} me-1 text-info"></i> ${msg}`;
            toast.classList.remove('d-none');
            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                toast.classList.add('d-none');
            }, 1600);
        }

        async function setCameraZoom(zoomVal) {
            currentZoom = zoomVal;
            document.querySelectorAll('.btn-zoom').forEach(b => {
                b.classList.remove('btn-cyan', 'text-white');
                b.classList.add('btn-outline-secondary', 'text-light');
            });
            const activeBtn = document.getElementById(zoomVal === 1.0 ? 'zoom1x' : (zoomVal === 1.5 ? 'zoom15x' : 'zoom2x'));
            if (activeBtn) {
                activeBtn.classList.add('btn-cyan', 'text-white');
                activeBtn.classList.remove('btn-outline-secondary', 'text-light');
            }

            try { if (navigator.vibrate) navigator.vibrate(25); } catch(e) {}
            showScannerToast(`Zoom: <strong>${zoomVal}x</strong>`, 'fa-solid fa-magnifying-glass');

            let hwZoomApplied = false;
            const track = getCameraTrack();
            if (track) {
                try {
                    const caps = track.getCapabilities ? track.getCapabilities() : {};
                    if (caps.zoom && caps.zoom.max > caps.zoom.min) {
                        const targetZoom = Math.max(caps.zoom.min, Math.min(caps.zoom.max, zoomVal));
                        await track.applyConstraints({ advanced: [{ zoom: targetZoom }] });
                        if (targetZoom >= zoomVal) {
                            hwZoomApplied = true;
                        }
                    }
                } catch (e) {
                    hwZoomApplied = false;
                }
            }

            // Fallback ke CSS digital zoom jika hardware zoom tidak didukung browser
            const videoEl = document.querySelector('#qr-reader video');
            if (videoEl) {
                if (hwZoomApplied) {
                    videoEl.style.transform = 'none';
                } else {
                    videoEl.style.transform = zoomVal > 1.0 ? `scale(${zoomVal})` : 'none';
                    videoEl.style.transformOrigin = 'center center';
                    videoEl.style.transition = 'transform 0.25s ease-out';
                }
            }
        }

        function toggleTorch() {
            if (!html5QrCode || !html5QrCode.isScanning) return;
            isTorchActive = !isTorchActive;
            html5QrCode.applyVideoConstraints({
                advanced: [{ torch: isTorchActive }]
            }).then(() => {
                showScannerToast(isTorchActive ? 'Lampu Senter ON' : 'Lampu Senter OFF', 'fa-solid fa-bolt');
                const btn = document.getElementById('btnTorchToggle');
                if (btn) {
                    if (isTorchActive) {
                        btn.classList.remove('btn-outline-warning');
                        btn.classList.add('btn-warning', 'text-dark', 'fw-bold');
                        btn.innerHTML = '<i class="fa-solid fa-bolt me-1"></i> Senter ON';
                    } else {
                        btn.classList.add('btn-outline-warning');
                        btn.classList.remove('btn-warning', 'text-dark', 'fw-bold');
                        btn.innerHTML = '<i class="fa-solid fa-bolt me-1"></i> Senter';
                    }
                }
            }).catch(err => {
                console.log("Torch error:", err);
                showScannerToast('Senter tidak didukung perangkat', 'fa-solid fa-triangle-exclamation');
            });
        }

        function triggerFocus() {
            try { if (navigator.vibrate) navigator.vibrate(35); } catch(e) {}
            showScannerToast('Refokus Lensa Kamera', 'fa-solid fa-crosshairs');

            // Visual pulse hijau pada viewfinder
            const vf = document.querySelector('.viewfinder-box');
            if (vf) {
                vf.classList.remove('pulse-focus');
                void vf.offsetWidth;
                vf.classList.add('pulse-focus');
                setTimeout(() => vf.classList.remove('pulse-focus'), 650);
            }

            const track = getCameraTrack();
            if (track) {
                try {
                    const caps = track.getCapabilities ? track.getCapabilities() : {};
                    if (caps.focusMode) {
                        // Switch focus mode ke manual sejenak lalu balik ke continuous untuk paksa lensa refocus
                        track.applyConstraints({ advanced: [{ focusMode: 'manual' }] })
                            .then(() => {
                                setTimeout(() => {
                                    track.applyConstraints({ advanced: [{ focusMode: 'continuous' }] }).catch(() => {});
                                }, 120);
                            })
                            .catch(() => {
                                track.applyConstraints({ advanced: [{ focusMode: 'continuous' }] }).catch(() => {});
                            });
                    }
                } catch (e) {}
            } else if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.applyVideoConstraints({
                    focusMode: "continuous",
                    advanced: [{ focusMode: "continuous" }]
                }).catch(() => {});
            }

            const btn = document.querySelector('#cameraControlsBar button[onclick="triggerFocus()"]');
            if (btn) {
                const orig = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check text-success me-1"></i> Terfokus';
                setTimeout(() => { btn.innerHTML = orig; }, 1200);
            }
        }

        function onCameraChange(cameraId) {
            currentCameraId = cameraId;
            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => {
                    startScanner();
                }).catch(() => {
                    startScanner();
                });
            }
        }

        function showCameraError(msg) {
            stopScanner();
            const ph = document.getElementById('scannerPlaceholder');
            const loading = document.getElementById('scannerLoading');
            if (loading) loading.classList.add('d-none');

            let extraButton = '';
            if (location.protocol !== 'https:' && location.hostname !== 'localhost' && location.hostname !== '127.0.0.1') {
                const httpsUrl = 'https://' + location.host + location.pathname + location.search;
                extraButton = `
                    <a href="${httpsUrl}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                        <i class="fa-solid fa-lock me-1"></i> Buka via HTTPS Aman
                    </a>
                `;
            } else if (location.hostname.includes('.test') || location.hostname.includes('192.168.')) {
                const localScanUrl = "{{ route('admin.events.scan', $selectedEvent->id) }}".replace(/https?:\/\/[^\/]+/, 'http://localhost' + (location.port ? ':' + location.port : ''));
                extraButton = `
                    <a href="${localScanUrl}" class="btn btn-sm btn-outline-light rounded-pill px-3">
                        <i class="fa-solid fa-server me-1"></i> Buka via Localhost
                    </a>
                `;
            }

            if (ph) {
                ph.classList.remove('d-none');
                ph.innerHTML = `
                    <div class="text-center p-3">
                        <i class="fa-solid fa-triangle-exclamation fs-1 text-warning mb-3"></i>
                        <h6 class="text-white fw-bold mb-2">Akses Kamera Terhalang</h6>
                        <div class="text-light small opacity-90 mb-3 text-start bg-dark bg-opacity-50 p-3 rounded-3" style="border: 1px solid rgba(245, 158, 11, 0.3); font-size: 13px; line-height: 1.6;">
                            ${msg}
                        </div>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <button class="btn btn-sm btn-cyan px-3 fw-bold shadow" onclick="startScanner()">
                                <i class="fa-solid fa-rotate me-1"></i> Coba Lagi
                            </button>
                            <button class="btn btn-sm btn-outline-info rounded-pill px-3" onclick="triggerFileInput()">
                                <i class="fa-solid fa-file-image me-1"></i> Scan dari Foto QR
                            </button>
                            ${extraButton}
                        </div>
                    </div>
                `;
            }
        }

        async function stopScanner() {
            isStarting = false;
            if (nativeDetectorInterval) {
                clearInterval(nativeDetectorInterval);
                nativeDetectorInterval = null;
            }

            const ph = document.getElementById('scannerPlaceholder');
            const loading = document.getElementById('scannerLoading');
            const btnStart = document.getElementById('btnStartScan');
            const btnStop = document.getElementById('btnStopScan');
            const controlsBar = document.getElementById('cameraControlsBar');
            const overlay = document.getElementById('scannerOverlay');
            const toast = document.getElementById('scannerToast');

            if (loading) loading.classList.add('d-none');
            if (controlsBar) controlsBar.classList.add('d-none');
            if (overlay) overlay.classList.add('d-none');
            if (toast) toast.classList.add('d-none');

            const videoEl = document.querySelector('#qr-reader video');
            if (videoEl) videoEl.style.transform = 'none';

            if (btnStart) {
                btnStart.classList.remove('d-none');
                btnStart.disabled = false;
                btnStart.innerHTML = '<i class="fa-solid fa-play me-1"></i> Buka Kamera';
            }
            if (btnStop) btnStop.classList.add('d-none');

            if (html5QrCode) {
                try {
                    if (html5QrCode.isScanning) {
                        await html5QrCode.stop();
                    }
                    html5QrCode.clear();
                } catch (err) {
                    console.log("Stop scanner error:", err);
                } finally {
                    html5QrCode = null;
                }
            }
            if (ph) ph.classList.remove('d-none');
        }

        function onScanSuccess(decodedText) {
            if (isProcessing) return;
            isProcessing = true;
            submitScanCode(decodedText);
            // Throttle scanner agar tidak memicu scan berkali-kali dalam 2 detik
            setTimeout(() => { isProcessing = false; }, 2000);
        }

        function handleManualSubmit(e) {
            e.preventDefault();
            const input = document.getElementById('manualTicketInput');
            const code = input.value.trim();
            if (!code) return;
            submitScanCode(code);
            input.value = '';
        }

        function getDeviceTimestamp() {
            const now = new Date();
            const pad = n => String(n).padStart(2, '0');
            const Y = now.getFullYear();
            const M = pad(now.getMonth() + 1);
            const D = pad(now.getDate());
            const h = pad(now.getHours());
            const m = pad(now.getMinutes());
            const s = pad(now.getSeconds());
            return `${Y}-${M}-${D} ${h}:${m}:${s}`;
        }

        function updateLiveDeviceClock() {
            const now = new Date();
            const pad = n => String(n).padStart(2, '0');
            const timeStr = `${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
            const el = document.getElementById('deviceLiveClock');
            if (el) el.textContent = timeStr;
        }
        setInterval(updateLiveDeviceClock, 1000);
        updateLiveDeviceClock();

        function submitScanCode(code) {
            const feedbackCard = document.getElementById('scanFeedbackCard');
            feedbackCard.style.display = 'block';
            feedbackCard.style.background = 'rgba(56, 189, 248, 0.1)';
            feedbackCard.style.border = '1px solid rgba(56, 189, 248, 0.3)';
            feedbackCard.innerHTML = `<div class="d-flex align-items-center gap-3"><div class="spinner-border text-info spinner-border-sm"></div><div>Memverifikasi tiket: <strong>${code}</strong>...</div></div>`;

            fetch('{{ route("admin.events.scan.process") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    ticket_code: code,
                    event_id: eventId,
                    device_time: getDeviceTimestamp()
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    playSoundSuccess();
                    showSuccessFeedback(data);
                    updateStats(data.stats);
                    addToRecentList(data.participant);
                } else if (data.status === 'already_attended') {
                    playSoundWarning();
                    showAlreadyAttendedFeedback(data);
                } else {
                    playSoundWarning();
                    showErrorFeedback(data.message);
                }
            })
            .catch(err => {
                playSoundWarning();
                showErrorFeedback('Terjadi kesalahan koneksi server saat memindai.');
            });
        }

        function showSuccessFeedback(data) {
            const p = data.participant;
            const card = document.getElementById('scanFeedbackCard');
            card.style.display = 'block';
            card.style.background = 'rgba(16, 185, 129, 0.15)';
            card.style.border = '2px solid #10B981';
            card.innerHTML = `
                <div class="d-flex align-items-start gap-3">
                    <div class="fs-1 text-success"><i class="fa-solid fa-circle-check"></i></div>
                    <div class="flex-grow-1">
                        <div class="badge bg-success mb-1">CHECK-IN BERHASIL</div>
                        <h4 class="fw-bold text-white mb-1">${p.name}</h4>
                        <div class="small text-light mb-2">
                            <span class="font-monospace text-info me-2">${p.ticket_code}</span> • 
                            <span class="me-2">${p.category}</span> • 
                            <span>${p.origin || 'Umum'}</span>
                        </div>
                        <div class="small text-success fw-bold">
                            <i class="fa-regular fa-clock me-1"></i> Waktu: ${p.attended_at}
                        </div>
                    </div>
                </div>
            `;
        }

        function showAlreadyAttendedFeedback(data) {
            const p = data.participant;
            const card = document.getElementById('scanFeedbackCard');
            card.style.display = 'block';
            card.style.background = 'rgba(245, 158, 11, 0.15)';
            card.style.border = '2px solid #F59E0B';
            card.innerHTML = `
                <div class="d-flex align-items-start gap-3">
                    <div class="fs-1 text-warning"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div class="flex-grow-1">
                        <div class="badge bg-warning text-dark mb-1">SUDAH PERNAH CHECK-IN</div>
                        <h4 class="fw-bold text-white mb-1">${p ? p.name : 'Peserta'}</h4>
                        <p class="small text-light mb-0">${data.message}</p>
                    </div>
                </div>
            `;
        }

        function showErrorFeedback(message) {
            const card = document.getElementById('scanFeedbackCard');
            card.style.display = 'block';
            card.style.background = 'rgba(239, 68, 68, 0.15)';
            card.style.border = '2px solid #EF4444';
            card.innerHTML = `
                <div class="d-flex align-items-center gap-3">
                    <div class="fs-1 text-danger"><i class="fa-solid fa-circle-xmark"></i></div>
                    <div>
                        <div class="badge bg-danger mb-1">TIKET TIDAK VALID</div>
                        <p class="small text-light mb-0">${message}</p>
                    </div>
                </div>
            `;
        }

        function updateStats(stats) {
            if (!stats) return;
            document.getElementById('statRegistered').innerText = stats.total_registered;
            document.getElementById('statAttended').innerText = stats.total_attended;
            document.getElementById('statPending').innerText = stats.total_pending;
            const pct = stats.total_registered > 0 ? Math.round((stats.total_attended / stats.total_registered) * 100) : 0;
            document.getElementById('statPercent').innerText = pct + '%';
        }

        function addToRecentList(p) {
            const tbody = document.getElementById('recentAttendeesBody');
            const noRow = document.getElementById('noRecentRow');
            if (noRow) noRow.remove();

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="fw-bold text-white">${p.name}</div>
                    <small class="text-info font-monospace">${p.ticket_code}</small>
                </td>
                <td>
                    <span class="badge bg-secondary bg-opacity-50 text-light">${p.category}</span>
                </td>
                <td>
                    <div class="text-success small fw-semibold">
                        <i class="fa-solid fa-check me-1"></i> ${p.attended_at}
                    </div>
                </td>
            `;
            tbody.insertBefore(tr, tbody.firstChild);
        }
    </script>
</body>
</html>
