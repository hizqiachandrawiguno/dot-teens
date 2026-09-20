<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>DOT Camera & Twibbon — DRP Outstanding Teens</title>

    <meta name="description" content="Ambil foto langsung dengan frame resmi DOT Teens & Disciples Revival Night dan bagikan ke WhatsApp.">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * { box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #090E1A, #111B30, #0B1325);
            color: #F3F4F6;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            padding-bottom: 60px;
        }

        .navbar-custom {
            background: rgba(11, 19, 37, 0.95);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(56, 189, 248, 0.15);
        }

        .text-gradient {
            background: linear-gradient(90deg, #38BDF8, #818CF8, #C084FC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .glass-card {
            background: rgba(17, 27, 48, 0.88);
            border: 1px solid rgba(56, 189, 248, 0.2);
            border-radius: 24px;
            backdrop-filter: blur(12px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.45);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #0284C7, #2563EB);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #38BDF8, #1D4ED8);
            transform: translateY(-2px);
            color: #fff;
            box-shadow: 0 8px 25px rgba(56, 189, 248, 0.35);
        }

        .btn-wa {
            background: #22C55E;
            color: #FFFFFF;
            font-weight: 700;
            border: none;
            transition: all 0.25s ease;
        }
        .btn-wa:hover {
            background: #16A34A;
            color: #FFFFFF;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
        }

        /* Viewport Container (Phone Aspect Ratio 9:16) */
        .stage-wrapper {
            position: relative;
            width: 320px;
            height: 568px;
            max-width: 100%;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            background: #030712;
            border: 2px solid rgba(56, 189, 248, 0.35);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
            touch-action: none;
        }

        /* Video element for live camera feed */
        #cameraVideo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            z-index: 1;
        }

        /* Final / Working Canvas */
        #photoCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 2;
            cursor: grab;
        }

        /* Active Frame Image Overlay */
        #frameOverlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
            z-index: 5;
        }

        /* Range Slider */
        .range-slider {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #1E293B;
            outline: none;
        }
        .range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #38BDF8;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.7);
        }

        .pulse-camera {
            animation: pulseRecord 1.8s infinite;
        }
        @keyframes pulseRecord {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.6); }
            70% { box-shadow: 0 0 0 14px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
    </style>
</head>
<body>

    @php
        $hasCustomFrame = file_exists(public_path('uploads/twibbon/active_frame.png'));
        $activeFrameUrl = $hasCustomFrame ? asset('uploads/twibbon/active_frame.png') . '?v=' . filemtime(public_path('uploads/twibbon/active_frame.png')) : null;
    @endphp

    <!-- HEADER / TOPBAR -->
    <nav class="navbar navbar-dark navbar-custom py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" style="height: 44px; object-fit: contain;">
                <span class="fw-bold fs-5">DOT <span class="text-gradient">STUDIO</span></span>
            </a>
            <a href="/" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Web
            </a>
        </div>
    </nav>

    <!-- MAIN APP -->
    <div class="container py-4">

        <div class="text-center mb-3">
            <span class="badge rounded-pill px-3 py-2 mb-2" style="background: rgba(56, 189, 248, 0.15); color: #38BDF8; border: 1px solid rgba(56, 189, 248, 0.3);">
                <i class="fa-solid fa-camera-retro me-1"></i> Official DOT Photo Studio
            </span>
            <h1 class="display-6 fw-bold text-white mb-1">Ambil Foto <span class="text-gradient">Twibbon Resmi</span></h1>
            <p class="text-secondary small mx-auto mb-0" style="max-width: 520px;">
                Buka kamera langsung di web atau pilih foto dari galerimu, paskan di frame resmi DOT, lalu bagikan langsung ke WhatsApp!
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <!-- STAGE VIEWPORT (CANVAS + CAMERA + FRAME) -->
            <div class="col-lg-5 col-md-7 text-center">
                <div class="glass-card p-3 mb-3">
                    
                    <!-- Live Camera Status Indicator -->
                    <div id="cameraStatusIndicator" class="badge bg-danger rounded-pill px-3 py-1 mb-2 pulse-camera" style="display: none;">
                        <i class="fa-solid fa-circle me-1"></i> Kamera Sedang Aktif
                    </div>

                    <!-- The 9:16 Screen Stage -->
                    <div class="stage-wrapper" id="stageWrapper">
                        <!-- 1. Live video stream (hidden when photo is snapped) -->
                        <video id="cameraVideo" autoplay playsinline muted></video>

                        <!-- 2. Interactive canvas where photo renders -->
                        <canvas id="photoCanvas" width="1080" height="1920"></canvas>

                        <!-- 3. Active Frame Overlay (PNG from Social Media team or generated) -->
                        @if($activeFrameUrl)
                            <img id="frameOverlay" src="{{ $activeFrameUrl }}" alt="Official Frame">
                        @else
                            <img id="frameOverlay" src="" alt="Official Frame" style="display:none;">
                        @endif

                        <!-- 4. Guide placeholder when empty -->
                        <div id="emptyGuide" class="position-absolute top-50 start-50 translate-middle text-center p-3" style="z-index: 3; pointer-events: none;">
                            <div class="rounded-circle p-3 mb-2 mx-auto" style="width: 70px; height: 70px; background: rgba(56, 189, 248, 0.15); border: 1px solid #38BDF8; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid fa-camera fs-2 text-info"></i>
                            </div>
                            <h6 class="fw-bold text-white mb-1">Siap Berfoto?</h6>
                            <p class="text-secondary small mb-0">Klik tombol <strong>'Buka Kamera'</strong> atau pilih dari galeri.</p>
                        </div>
                    </div>

                    <div class="text-secondary small mt-2">
                        <i class="fa-solid fa-hand-pointer text-info me-1"></i> Sentuh & geser foto di layar untuk menyesuaikan posisi
                    </div>

                    <!-- ADJUSTMENT CONTROLS -->
                    <div class="mt-3 p-3 rounded-3" style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.06);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-secondary small fw-semibold"><i class="fa-solid fa-magnifying-glass me-1"></i> Zoom Foto</span>
                            <span id="zoomLabel" class="small text-info fw-bold">100%</span>
                        </div>
                        <input type="range" class="range-slider mb-3" id="zoomRange" min="30" max="300" value="100">

                        <div class="d-flex justify-content-between gap-2">
                            <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3" id="btnRotate">
                                <i class="fa-solid fa-rotate-right me-1"></i> Putar
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3" id="btnFlip">
                                <i class="fa-solid fa-arrows-left-right me-1"></i> Mirror
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" id="btnReset">
                                <i class="fa-solid fa-arrows-rotate me-1"></i> Reset
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ACTION BUTTONS & SHARING -->
            <div class="col-lg-5 col-md-7">
                <div class="glass-card p-4">

                    <!-- STEP 1: CAMERA & UPLOAD BUTTONS -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-bold mb-2">
                            <span class="badge bg-info text-dark me-2">1</span>Ambil / Pilih Foto
                        </label>

                        <!-- Button Group: Camera or Gallery -->
                        <div class="d-grid gap-2">
                            <!-- Button Buka Kamera Live -->
                            <button type="button" id="btnToggleCamera" class="btn btn-gradient rounded-pill py-3 fw-bold fs-6">
                                <i class="fa-solid fa-video me-2"></i> Buka Kamera Langsung
                            </button>

                            <!-- Camera Switch & Snap Row (Muncul saat kamera aktif) -->
                            <div id="cameraControlsRow" class="d-flex gap-2" style="display: none !important;">
                                <button type="button" id="btnSnap" class="btn btn-danger flex-grow-1 rounded-pill py-3 fw-bold fs-5 shadow">
                                    <i class="fa-solid fa-camera me-2"></i> Jepret Foto Ini!
                                </button>
                                <button type="button" id="btnSwitchCamera" class="btn btn-outline-light rounded-circle" style="width: 54px; height: 54px;" title="Ganti Kamera Depan/Belakang">
                                    <i class="fa-solid fa-camera-rotate fs-5"></i>
                                </button>
                            </div>

                            <!-- Opsi Upload dari Galeri -->
                            <div class="text-center my-1 text-secondary small">&mdash; ATAU &mdash;</div>
                            
                            <input type="file" id="fileUploadInput" accept="image/*" class="d-none">
                            <button type="button" class="btn btn-outline-light rounded-pill py-2" onclick="document.getElementById('fileUploadInput').click()">
                                <i class="fa-solid fa-images me-2 text-info"></i> Pilih Foto dari Galeri HP
                            </button>
                        </div>
                    </div>

                    <!-- STEP 2: SHARE LANGSUNG KE WHATSAPP -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-bold mb-2">
                            <span class="badge bg-success me-2">2</span>Bagikan Foto
                        </label>

                        <div class="d-grid gap-2">
                            <!-- TOMBOL UTAMA: SHARE WHATSAPP -->
                            <button type="button" id="btnShareWa" class="btn btn-wa rounded-pill py-3 fw-bold fs-5 shadow">
                                <i class="fa-brands fa-whatsapp me-2 fs-4"></i> Bagikan Langsung ke WhatsApp
                            </button>

                            <!-- TOMBOL SIMPAN KE GALERI -->
                            <button type="button" id="btnDownloadImg" class="btn btn-outline-info rounded-pill py-2 text-white">
                                <i class="fa-solid fa-download me-2"></i> Simpan ke Galeri (HD)
                            </button>
                        </div>
                    </div>

                    <!-- TIPS PENGGUNAAN -->
                    <div class="p-3 rounded-4" style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.08);">
                        <h6 class="fw-bold text-white small mb-2"><i class="fa-brands fa-whatsapp text-success me-1"></i> Cara Share ke WhatsApp:</h6>
                        <ol class="text-secondary small mb-0 ps-3">
                            <li>Klik tombol hijau <strong>'Bagikan Langsung ke WhatsApp'</strong>.</li>
                            <li>Pilih <strong>Status Saya</strong> atau kirim ke grup/teman DOT.</li>
                            <li>Foto sudah terbingkai rapi tanpa perlu edit lagi!</li>
                        </ol>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <script>
        const hasCustomFrame = {{ $hasCustomFrame ? 'true' : 'false' }};
        const activeFrameUrl = "{{ $activeFrameUrl }}";

        const stageWrapper = document.getElementById('stageWrapper');
        const cameraVideo = document.getElementById('cameraVideo');
        const photoCanvas = document.getElementById('photoCanvas');
        const ctx = photoCanvas.getContext('2d');
        const frameOverlay = document.getElementById('frameOverlay');
        const emptyGuide = document.getElementById('emptyGuide');
        const cameraStatusIndicator = document.getElementById('cameraStatusIndicator');

        const btnToggleCamera = document.getElementById('btnToggleCamera');
        const cameraControlsRow = document.getElementById('cameraControlsRow');
        const btnSnap = document.getElementById('btnSnap');
        const btnSwitchCamera = document.getElementById('btnSwitchCamera');

        let cameraStream = null;
        let isCameraActive = false;
        let facingMode = 'user'; // 'user' (selfie) or 'environment' (back camera)

        let loadedImage = null;
        let imgX = 0;
        let imgY = 0;
        let imgScale = 1;
        let imgRotation = 0;
        let isFlipped = false;

        let isDragging = false;
        let dragStartX = 0;
        let dragStartY = 0;

        // ==========================================
        // DEFAULT FRAME PROCEDURAL (JIKA ADMIN BELUM UPLOAD PNG)
        // ==========================================
        function drawDefaultFrameOverlay() {
            const w = photoCanvas.width;
            const h = photoCanvas.height;

            // Gradient Top
            const topGrad = ctx.createLinearGradient(0, 0, 0, h * 0.22);
            topGrad.addColorStop(0, 'rgba(6, 11, 25, 0.95)');
            topGrad.addColorStop(1, 'rgba(6, 11, 25, 0)');
            ctx.fillStyle = topGrad;
            ctx.fillRect(0, 0, w, h * 0.22);

            // Gradient Bottom
            const botGrad = ctx.createLinearGradient(0, h * 0.72, 0, h);
            botGrad.addColorStop(0, 'rgba(6, 11, 25, 0)');
            botGrad.addColorStop(0.3, 'rgba(6, 11, 25, 0.88)');
            botGrad.addColorStop(1, 'rgba(3, 7, 18, 0.98)');
            ctx.fillStyle = botGrad;
            ctx.fillRect(0, h * 0.72, w, h * 0.28);

            // Cyber Neon Borders
            ctx.lineWidth = 14;
            ctx.strokeStyle = '#38BDF8';
            ctx.strokeRect(40, 40, w - 80, h - 80);

            ctx.lineWidth = 4;
            ctx.strokeStyle = '#F59E0B';
            ctx.strokeRect(52, 52, w - 104, h - 104);

            // Top Badge
            ctx.save();
            ctx.fillStyle = '#EF4444';
            ctx.beginPath();
            ctx.roundRect(w/2 - 280, 70, 560, 64, 32);
            ctx.fill();
            ctx.fillStyle = '#FFFFFF';
            ctx.font = 'bold 28px "Space Grotesk", sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('🔥 DISCIPLES REVIVAL NIGHT 🔥', w/2, 114);
            ctx.restore();

            // Bottom Texts
            ctx.save();
            ctx.textAlign = 'center';
            ctx.fillStyle = '#F59E0B';
            ctx.font = 'bold 30px "Space Grotesk", sans-serif';
            ctx.fillText('10 OKTOBER 2026 • 17:30 WIB', w/2, h - 230);

            ctx.fillStyle = '#FFFFFF';
            ctx.font = 'bold 54px "Poppins", sans-serif';
            ctx.fillText("I'M READY TO BE REVIVED!", w/2, h - 165);

            ctx.fillStyle = '#38BDF8';
            ctx.font = '500 28px "Poppins", sans-serif';
            ctx.fillText('Main Sanctuary GBI ERC Sawangan', w/2, h - 115);

            ctx.fillStyle = 'rgba(255, 255, 255, 0.45)';
            ctx.font = '600 22px "Poppins", sans-serif';
            ctx.fillText('DRP OUTSTANDING TEENS • @DOT_SAWANGAN', w/2, h - 75);
            ctx.restore();
        }

        // ==========================================
        // RENDER CANVAS UTAMA
        // ==========================================
        function renderCanvas() {
            ctx.clearRect(0, 0, photoCanvas.width, photoCanvas.height);

            // Background fill
            ctx.fillStyle = '#0F172A';
            ctx.fillRect(0, 0, photoCanvas.width, photoCanvas.height);

            // Render photo
            if (loadedImage) {
                emptyGuide.style.display = 'none';

                ctx.save();
                ctx.translate(photoCanvas.width / 2 + imgX, photoCanvas.height / 2 + imgY);
                ctx.rotate((imgRotation * Math.PI) / 180);
                if (isFlipped) {
                    ctx.scale(-1, 1);
                }

                const scaledW = loadedImage.width * imgScale;
                const scaledH = loadedImage.height * imgScale;

                ctx.drawImage(loadedImage, -scaledW / 2, -scaledH / 2, scaledW, scaledH);
                ctx.restore();
            } else {
                if (!isCameraActive) {
                    emptyGuide.style.display = 'block';
                }
            }

            // If using procedural default frame, draw it on canvas
            if (!hasCustomFrame) {
                drawDefaultFrameOverlay();
            }
        }

        // ==========================================
        // LIVE CAMERA MECHANISM (getUserMedia)
        // ==========================================
        async function startCamera() {
            stopCamera(); // Pastikan stream lama berhenti
            try {
                const constraints = {
                    video: {
                        facingMode: facingMode,
                        width: { ideal: 1920 },
                        height: { ideal: 1080 }
                    },
                    audio: false
                };

                cameraStream = await navigator.mediaDevices.getUserMedia(constraints);
                cameraVideo.srcObject = cameraStream;
                cameraVideo.style.display = 'block';
                await cameraVideo.play();

                isCameraActive = true;
                emptyGuide.style.display = 'none';
                cameraStatusIndicator.style.display = 'inline-block';
                cameraControlsRow.style.setProperty('display', 'flex', 'important');
                btnToggleCamera.innerHTML = '<i class="fa-solid fa-stop me-2"></i> Matikan Kamera';
                btnToggleCamera.classList.remove('btn-gradient');
                btnToggleCamera.classList.add('btn-outline-danger');

            } catch (err) {
                console.error("Camera access error:", err);
                alert("Tidak dapat mengakses kamera. Pastikan izin kamera telah diaktifkan di browsermu atau gunakan opsi 'Pilih Foto dari Galeri'.");
                stopCamera();
            }
        }

        function stopCamera() {
            if (cameraStream) {
                cameraStream.getTracks().forEach(track => track.stop());
                cameraStream = null;
            }
            cameraVideo.style.display = 'none';
            isCameraActive = false;
            cameraStatusIndicator.style.display = 'none';
            cameraControlsRow.style.setProperty('display', 'none', 'important');
            btnToggleCamera.innerHTML = '<i class="fa-solid fa-video me-2"></i> Buka Kamera Langsung';
            btnToggleCamera.classList.remove('btn-outline-danger');
            btnToggleCamera.classList.add('btn-gradient');

            if (!loadedImage) {
                emptyGuide.style.display = 'block';
            }
        }

        btnToggleCamera.addEventListener('click', function() {
            if (isCameraActive) {
                stopCamera();
            } else {
                startCamera();
            }
        });

        btnSwitchCamera.addEventListener('click', function() {
            facingMode = (facingMode === 'user') ? 'environment' : 'user';
            startCamera();
        });

        // ==========================================
        // JEPRET FOTO DARI KAMERA LIVE
        // ==========================================
        btnSnap.addEventListener('click', function() {
            if (!cameraVideo || !isCameraActive) return;

            // Capture frame from video onto a temporary canvas
            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = cameraVideo.videoWidth || 1080;
            tempCanvas.height = cameraVideo.videoHeight || 1920;
            const tempCtx = tempCanvas.getContext('2d');

            // If front selfie camera, flip naturally
            if (facingMode === 'user') {
                tempCtx.translate(tempCanvas.width, 0);
                tempCtx.scale(-1, 1);
            }
            tempCtx.drawImage(cameraVideo, 0, 0, tempCanvas.width, tempCanvas.height);

            // Convert to image object
            const snappedImg = new Image();
            snappedImg.onload = function() {
                loadedImage = snappedImg;
                imgX = 0;
                imgY = 0;
                imgRotation = 0;
                isFlipped = false;

                const scaleX = photoCanvas.width / loadedImage.width;
                const scaleY = photoCanvas.height / loadedImage.height;
                imgScale = Math.max(scaleX, scaleY);

                document.getElementById('zoomRange').value = 100;
                document.getElementById('zoomLabel').innerText = '100%';

                // Matikan kamera setelah jepret agar user bisa atur & share
                stopCamera();
                renderCanvas();
            };
            snappedImg.src = tempCanvas.toDataURL('image/jpeg', 0.95);
        });

        // ==========================================
        // UPLOAD DARI FILE GALERI HP
        // ==========================================
        document.getElementById('fileUploadInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            stopCamera();

            const reader = new FileReader();
            reader.onload = function(evt) {
                const img = new Image();
                img.onload = function() {
                    loadedImage = img;
                    imgX = 0;
                    imgY = 0;
                    imgRotation = 0;
                    isFlipped = false;

                    const scaleX = photoCanvas.width / loadedImage.width;
                    const scaleY = photoCanvas.height / loadedImage.height;
                    imgScale = Math.max(scaleX, scaleY);

                    document.getElementById('zoomRange').value = 100;
                    document.getElementById('zoomLabel').innerText = '100%';

                    renderCanvas();
                };
                img.src = evt.target.result;
            };
            reader.readAsDataURL(file);
        });

        // ==========================================
        // TOUCH & MOUSE GESTURES (DRAG POSISI FOTO)
        // ==========================================
        function getPos(e) {
            const rect = photoCanvas.getBoundingClientRect();
            const clientX = e.touches ? e.touches[0].clientX : e.clientX;
            const clientY = e.touches ? e.touches[0].clientY : e.clientY;
            return {
                x: (clientX - rect.left) * (photoCanvas.width / rect.width),
                y: (clientY - rect.top) * (photoCanvas.height / rect.height)
            };
        }

        photoCanvas.addEventListener('mousedown', function(e) {
            if (!loadedImage) return;
            isDragging = true;
            const p = getPos(e);
            dragStartX = p.x - imgX;
            dragStartY = p.y - imgY;
            photoCanvas.style.cursor = 'grabbing';
        });

        window.addEventListener('mousemove', function(e) {
            if (!isDragging || !loadedImage) return;
            const p = getPos(e);
            imgX = p.x - dragStartX;
            imgY = p.y - dragStartY;
            renderCanvas();
        });

        window.addEventListener('mouseup', function() {
            isDragging = false;
            photoCanvas.style.cursor = 'grab';
        });

        photoCanvas.addEventListener('touchstart', function(e) {
            if (!loadedImage) return;
            isDragging = true;
            const p = getPos(e);
            dragStartX = p.x - imgX;
            dragStartY = p.y - imgY;
        }, { passive: false });

        window.addEventListener('touchmove', function(e) {
            if (!isDragging || !loadedImage) return;
            e.preventDefault();
            const p = getPos(e);
            imgX = p.x - dragStartX;
            imgY = p.y - dragStartY;
            renderCanvas();
        }, { passive: false });

        window.addEventListener('touchend', function() {
            isDragging = false;
        });

        // ==========================================
        // ZOOM, ROTATE, MIRROR, RESET
        // ==========================================
        document.getElementById('zoomRange').addEventListener('input', function() {
            const zoomPercent = parseInt(this.value);
            document.getElementById('zoomLabel').innerText = zoomPercent + '%';
            if (loadedImage) {
                const coverScale = Math.max(photoCanvas.width / loadedImage.width, photoCanvas.height / loadedImage.height);
                imgScale = coverScale * (zoomPercent / 100);
                renderCanvas();
            }
        });

        document.getElementById('btnRotate').addEventListener('click', function() {
            imgRotation = (imgRotation + 90) % 360;
            renderCanvas();
        });

        document.getElementById('btnFlip').addEventListener('click', function() {
            isFlipped = !isFlipped;
            renderCanvas();
        });

        document.getElementById('btnReset').addEventListener('click', function() {
            if (!loadedImage) return;
            imgX = 0;
            imgY = 0;
            imgRotation = 0;
            isFlipped = false;
            document.getElementById('zoomRange').value = 100;
            document.getElementById('zoomLabel').innerText = '100%';
            imgScale = Math.max(photoCanvas.width / loadedImage.width, photoCanvas.height / loadedImage.height);
            renderCanvas();
        });

        // ==========================================
        // GENERATE FINAL COMPOSITE IMAGE (PHOTO + OVERLAY)
        // ==========================================
        async function getFinalCompositeBlob() {
            // Render everything to canvas first
            renderCanvas();

            // Create export canvas of exactly 1080x1920
            const exportCanvas = document.createElement('canvas');
            exportCanvas.width = photoCanvas.width;
            exportCanvas.height = photoCanvas.height;
            const exportCtx = exportCanvas.getContext('2d');

            // 1. Draw photo layer
            exportCtx.drawImage(photoCanvas, 0, 0);

            // 2. Draw custom frame overlay on top if exists
            if (hasCustomFrame && frameOverlay && frameOverlay.complete && frameOverlay.naturalWidth > 0) {
                exportCtx.drawImage(frameOverlay, 0, 0, exportCanvas.width, exportCanvas.height);
            }

            return new Promise((resolve) => {
                exportCanvas.toBlob((blob) => {
                    resolve(blob);
                }, 'image/png', 1.0);
            });
        }

        // ==========================================
        // SHARE LANGSUNG KE WHATSAPP (WEB SHARE API)
        // ==========================================
        document.getElementById('btnShareWa').addEventListener('click', async function() {
            if (!loadedImage) {
                alert('Ambil foto atau pilih dari galeri terlebih dahulu!');
                return;
            }

            const blob = await getFinalCompositeBlob();
            if (!blob) return;

            const file = new File([blob], 'DOT_Teens_Story.png', { type: 'image/png' });
            const shareText = "Halo! Ini twibbon DOT Teens aku 🔥 Ayo ikutan juga di https://dotsawangan.com/twibbon";

            // Cek apakah browser mendukung Web Share API dengan attachment file (Android/iOS Chrome/Safari)
            if (navigator.canShare && navigator.canShare({ files: [file] })) {
                try {
                    await navigator.share({
                        files: [file],
                        title: 'Twibbon DOT Teens',
                        text: shareText
                    });
                } catch (err) {
                    if (err.name !== 'AbortError') {
                        fallbackDownloadAndWa(blob, shareText);
                    }
                }
            } else {
                // Fallback untuk desktop atau browser yang tidak mendukung file sharing
                fallbackDownloadAndWa(blob, shareText);
            }
        });

        function fallbackDownloadAndWa(blob, text) {
            // 1. Download file otomatis
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `DOT_Teens_${Date.now()}.png`;
            a.click();

            // 2. Buka WhatsApp
            setTimeout(() => {
                window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
            }, 800);
        }

        // ==========================================
        // DOWNLOAD MANUAL KE GALERI
        // ==========================================
        document.getElementById('btnDownloadImg').addEventListener('click', async function() {
            if (!loadedImage) {
                alert('Ambil foto atau pilih dari galeri terlebih dahulu!');
                return;
            }

            const blob = await getFinalCompositeBlob();
            if (!blob) return;

            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `DOT_Teens_${Date.now()}.png`;
            a.click();
            URL.revokeObjectURL(url);
        });

        // Render initial blank canvas
        renderCanvas();
    </script>

</body>
</html>
