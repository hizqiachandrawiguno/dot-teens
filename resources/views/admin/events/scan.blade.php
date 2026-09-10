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

    <!-- HTML5 QR Code Scanner Library (Local with CDN Fallback) -->
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script>
        if (typeof Html5Qrcode === 'undefined') {
            document.write('<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"><\/script>');
        }
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
            min-height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #qr-reader {
            width: 100% !important;
            border: none !important;
        }

        #qr-reader__scan_region video {
            border-radius: 14px;
            object-fit: cover;
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
            font-size: 28px;
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
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark navbar-custom py-3 sticky-top">
        <div class="container-fluid px-3 px-lg-4">
            <div class="d-flex align-items-center gap-3">
                <a class="btn btn-sm btn-outline-secondary text-light rounded-pill px-3" href="/admin/dashboard">
                    <i class="fa-solid fa-arrow-left me-1"></i> Dashboard
                </a>
                <span class="fw-bold text-white fs-5">
                    <i class="fa-solid fa-qrcode text-info me-2"></i> Scanner Kehadiran Event
                </span>
            </div>
            <div>
                <a href="{{ route('admin.events.participants', $selectedEvent->id) }}" class="btn btn-sm btn-outline-info rounded-pill px-3">
                    <i class="fa-solid fa-users me-1"></i> Data Peserta ({{ $totalRegistered }})
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
                                            <i class="fa-solid fa-check me-1"></i> {{ $att->attended_at ? $att->attended_at->format('H:i:s') : '-' }} WIB
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

        // SCANNER LOGIC
        let html5QrCode = null;
        let isProcessing = false;
        let availableCameras = [];
        let currentCameraId = null;
        const eventId = {{ $selectedEvent->id }};

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
        });

        function triggerFileInput() {
            const fi = document.getElementById('qrFileInput');
            if (fi) fi.click();
        }

        function handleFileScan(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (typeof Html5Qrcode === 'undefined') {
                alert("Library scanner belum siap. Silakan refresh halaman.");
                return;
            }

            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("qr-reader");
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

        function startScanner() {
            if (typeof Html5Qrcode === 'undefined') {
                showCameraError("Library scanner belum termuat sempurna. Silakan periksa koneksi internet dan refresh halaman.");
                return;
            }

            const btnStart = document.getElementById('btnStartScan');
            const placeholder = document.getElementById('scannerPlaceholder');
            const loading = document.getElementById('scannerLoading');
            const btnStop = document.getElementById('btnStopScan');

            // Cek navigator mediaDevices (Chrome mematikan API ini di non-secure HTTP seperti dot-teens.test)
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                showCameraError(
                    "Google Chrome mengunci webcam pada alamat HTTP biasa (" + location.hostname + ").<br><br>" +
                    "<strong>Cara Mudah Mengaktifkan:</strong><br>" +
                    "1. <a href='http://localhost/dot-teens/public/admin/events/scan/" + eventId + "' class='text-info fw-bold text-decoration-underline'>Klik di sini untuk Buka via Localhost</a> (Chrome mengizinkan webcam di localhost)<br>" +
                    "2. Atau gunakan tombol <strong>'Scan dari Foto QR'</strong> di atas untuk memindai tiket dari file gambar."
                );
                return;
            }

            // Tampilkan status loading
            if (placeholder) placeholder.classList.add('d-none');
            if (loading) loading.classList.remove('d-none');
            if (btnStart) {
                btnStart.disabled = true;
                btnStart.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Menghubungkan...';
            }

            if (!html5QrCode) {
                try {
                    html5QrCode = new Html5Qrcode("qr-reader");
                } catch (e) {
                    console.error("Init scanner error:", e);
                    showCameraError("Gagal memulai scanner: " + e.message);
                    return;
                }
            }

            const config = { 
                fps: 15, 
                qrbox: (viewfinderWidth, viewfinderHeight) => {
                    const minEdge = Math.min(viewfinderWidth, viewfinderHeight);
                    const qrboxSize = Math.floor(minEdge * 0.75);
                    return { width: qrboxSize, height: qrboxSize };
                }
            };

            Html5Qrcode.getCameras().then(devices => {
                if (devices && devices.length) {
                    availableCameras = devices;
                    const wrapper = document.getElementById('cameraSelectWrapper');
                    const selectEl = document.getElementById('cameraSelect');
                    if (selectEl) {
                        selectEl.innerHTML = '';
                        devices.forEach((dev, idx) => {
                            const opt = document.createElement('option');
                            opt.value = dev.id;
                            opt.text = dev.label || `Kamera ${idx + 1}`;
                            selectEl.appendChild(opt);
                        });
                        if (devices.length > 1 && wrapper) {
                            wrapper.classList.remove('d-none');
                        }
                    }

                    currentCameraId = currentCameraId || devices[0].id;
                    if (selectEl) selectEl.value = currentCameraId;

                    return html5QrCode.start(
                        currentCameraId,
                        config,
                        onScanSuccess,
                        (errorMessage) => { /* frame */ }
                    );
                } else {
                    return fallbackStartFacingMode(config);
                }
            }).then(() => {
                // Kamera aktif!
                if (loading) loading.classList.add('d-none');
                if (btnStart) {
                    btnStart.classList.add('d-none');
                    btnStart.disabled = false;
                    btnStart.innerHTML = '<i class="fa-solid fa-play me-1"></i> Buka Kamera';
                }
                if (btnStop) btnStop.classList.remove('d-none');
            }).catch(err => {
                console.warn("Mencoba fallback mode:", err);
                fallbackStartFacingMode(config).then(() => {
                    if (loading) loading.classList.add('d-none');
                    if (btnStart) {
                        btnStart.classList.add('d-none');
                        btnStart.disabled = false;
                        btnStart.innerHTML = '<i class="fa-solid fa-play me-1"></i> Buka Kamera';
                    }
                    if (btnStop) btnStop.classList.remove('d-none');
                }).catch(fallbackErr => {
                    console.error("Gagal start webcam:", fallbackErr);
                    let userMsg = "Tidak dapat mengakses kamera webcam.";
                    if (fallbackErr.name === 'NotAllowedError' || fallbackErr.name === 'PermissionDeniedError') {
                        userMsg = "Izin webcam ditolak oleh browser. Silakan klik ikon gembok / kamera di sebelah kiri kolom URL browser, ubah menjadi <strong>'Allow'</strong>, lalu refresh halaman.";
                    } else if (fallbackErr.name === 'NotFoundError' || fallbackErr.name === 'DevicesNotFoundError') {
                        userMsg = "Perangkat kamera tidak ditemukan di laptop ini. Pastikan webcam terpasang.";
                    } else if (fallbackErr.name === 'NotReadableError' || fallbackErr.name === 'TrackStartError') {
                        userMsg = "Kamera sedang dipakai aplikasi lain (Zoom, Google Meet, Teams, atau Kamera Windows). Silakan tutup aplikasi tersebut.";
                    } else if (fallbackErr.message) {
                        userMsg += " (" + fallbackErr.message + ")";
                    }
                    showCameraError(userMsg);
                });
            });
        }

        function fallbackStartFacingMode(config) {
            config = config || { fps: 15, qrbox: { width: 250, height: 250 } };
            return html5QrCode.start(
                { facingMode: "user" },
                config,
                onScanSuccess,
                (errorMessage) => { /* frame */ }
            ).catch(() => {
                return html5QrCode.start(
                    { facingMode: "environment" },
                    config,
                    onScanSuccess,
                    (errorMessage) => { /* frame */ }
                );
            });
        }

        function onCameraChange(cameraId) {
            currentCameraId = cameraId;
            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => {
                    startScanner();
                });
            }
        }

        function showCameraError(msg) {
            stopScanner();
            const ph = document.getElementById('scannerPlaceholder');
            const loading = document.getElementById('scannerLoading');
            if (loading) loading.classList.add('d-none');
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
                            <button class="btn btn-sm btn-cyan px-3" onclick="startScanner()">
                                <i class="fa-solid fa-rotate me-1"></i> Coba Lagi
                            </button>
                            <button class="btn btn-sm btn-outline-info rounded-pill px-3" onclick="triggerFileInput()">
                                <i class="fa-solid fa-file-image me-1"></i> Scan dari Foto QR
                            </button>
                            <a href="http://localhost/dot-teens/public/admin/events/scan/${eventId}" class="btn btn-sm btn-outline-light rounded-pill px-3">
                                <i class="fa-solid fa-server me-1"></i> Buka via Localhost
                            </a>
                        </div>
                    </div>
                `;
            }
        }

        function stopScanner() {
            const ph = document.getElementById('scannerPlaceholder');
            const loading = document.getElementById('scannerLoading');
            const btnStart = document.getElementById('btnStartScan');
            const btnStop = document.getElementById('btnStopScan');

            if (loading) loading.classList.add('d-none');
            if (btnStart) {
                btnStart.classList.remove('d-none');
                btnStart.disabled = false;
                btnStart.innerHTML = '<i class="fa-solid fa-play me-1"></i> Buka Kamera';
            }
            if (btnStop) btnStop.classList.add('d-none');

            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => {
                    html5QrCode.clear();
                    if (ph) ph.classList.remove('d-none');
                }).catch(err => {
                    console.log(err);
                    if (ph) ph.classList.remove('d-none');
                });
            } else {
                if (ph) ph.classList.remove('d-none');
            }
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
                    event_id: eventId
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
