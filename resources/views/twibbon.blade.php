<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>DOT Twibbon & Story Frame Generator — DRP Outstanding Teens</title>

    <meta name="description" content="Buat Twibbon & Frame Instagram Story resmi DOT Teens dan Disciples Revival Night secara gratis, instan, dan bebas watermark.">
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
            padding-bottom: 50px;
        }

        .navbar-custom {
            background: rgba(11, 19, 37, 0.9);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(56, 189, 248, 0.15);
        }

        .text-gradient {
            background: linear-gradient(90deg, #38BDF8, #818CF8, #C084FC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .text-neon {
            color: #38BDF8;
            text-shadow: 0 0 15px rgba(56, 189, 248, 0.5);
        }

        .glass-card {
            background: rgba(17, 27, 48, 0.85);
            border: 1px solid rgba(56, 189, 248, 0.2);
            border-radius: 20px;
            backdrop-filter: blur(12px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #0284C7, #6366F1);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #38BDF8, #818CF8);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(56, 189, 248, 0.4);
            color: #fff;
        }

        /* Canvas Preview Container */
        .canvas-container-box {
            position: relative;
            background: #050912;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            border: 2px dashed rgba(56, 189, 248, 0.3);
            margin: 0 auto;
            touch-action: none;
            user-select: none;
        }

        /* Preset Frame Selection Button */
        .frame-thumb-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            padding: 12px;
            cursor: pointer;
            transition: all 0.25s ease;
            text-align: left;
            width: 100%;
        }
        .frame-thumb-btn:hover {
            border-color: #38BDF8;
            background: rgba(56, 189, 248, 0.1);
        }
        .frame-thumb-btn.active {
            border-color: #38BDF8;
            background: rgba(56, 189, 248, 0.2);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.4);
        }

        /* Format aspect ratio switch */
        .format-btn {
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(0, 0, 0, 0.25);
            color: #94A3B8;
            border-radius: 50px;
            padding: 8px 18px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .format-btn.active {
            background: #38BDF8;
            color: #0F172A;
            border-color: #38BDF8;
        }

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
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" style="height: 48px; object-fit: contain;">
                <span class="fw-bold tracking-wider fs-5">DOT <span class="text-gradient">STUDIO</span></span>
            </a>
            <div class="d-flex align-items-center gap-2">
                <a href="/cells" class="btn btn-sm btn-outline-light rounded-pill px-3">
                    <i class="fa-solid fa-users me-1"></i> Cells
                </a>
                <a href="/" class="btn btn-sm btn-outline-info rounded-pill px-3">
                    <i class="fa-solid fa-house me-1"></i> Home
                </a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTAINER -->
    <div class="container py-4">
        
        <div class="text-center mb-4">
            <span class="badge rounded-pill px-3 py-2 mb-2" style="background: rgba(56, 189, 248, 0.15); color: #38BDF8; border: 1px solid rgba(56, 189, 248, 0.3);">
                <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Official Twibbon & Story Creator
            </span>
            <h1 class="display-5 fw-bold text-white mb-2">DOT <span class="text-gradient">Story Generator</span></h1>
            <p class="text-secondary mx-auto mb-0" style="max-width: 600px; font-size: 15px;">
                Upload foto terkerenmu, posisikan di frame resmi DOT & Disciples Revival Night, lalu download dalam kualitas HD siap posting ke Instagram Story!
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <!-- LEFT: CANVAS PREVIEW & GESTURE CONTROLS -->
            <div class="col-lg-6 col-md-8 text-center">
                <div class="glass-card p-3 p-md-4 mb-3">
                    
                    <!-- FORMAT SELECTOR -->
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <button type="button" class="format-btn active" id="btnFormatStory" data-ratio="story">
                            <i class="fa-brands fa-instagram me-1"></i> IG Story (9:16)
                        </button>
                        <button type="button" class="format-btn" id="btnFormatSquare" data-ratio="square">
                            <i class="fa-solid fa-square me-1"></i> Feed Persegi (1:1)
                        </button>
                    </div>

                    <!-- PREVIEW CANVAS BOX -->
                    <div class="canvas-container-box" id="canvasBox" style="width: 315px; height: 560px;">
                        <canvas id="photoCanvas" width="1080" height="1920" style="width: 100%; height: 100%; object-fit: contain; cursor: grab;"></canvas>
                        
                        <!-- Empty placeholder overlay when no image uploaded yet -->
                        <div id="emptyPlaceholder" class="position-absolute d-flex flex-column align-items-center justify-content-center p-3 text-center" style="pointer-events: none;">
                            <div class="rounded-circle p-3 mb-2" style="background: rgba(56, 189, 248, 0.1); border: 1px solid #38BDF8;">
                                <i class="fa-solid fa-cloud-arrow-up fs-2 text-info"></i>
                            </div>
                            <h6 class="fw-bold text-white mb-1">Pilih Foto Kamu</h6>
                            <small class="text-secondary">Klik tombol 'Upload Foto' di bawah untuk mulai berkreasi</small>
                        </div>
                    </div>

                    <div class="mt-2 text-secondary small">
                        <i class="fa-solid fa-hand-pointer me-1 text-info"></i> Geser foto di layar untuk menyesuaikan posisi
                    </div>

                    <!-- ZOOM & ROTATE SLIDERS -->
                    <div class="mt-3 p-3 rounded-3" style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.06);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="text-secondary small fw-semibold mb-0"><i class="fa-solid fa-magnifying-glass me-1"></i> Zoom Foto</label>
                            <span id="zoomValue" class="small text-info fw-bold">100%</span>
                        </div>
                        <input type="range" class="range-slider mb-3" id="zoomSlider" min="20" max="300" value="100">

                        <div class="d-flex justify-content-between gap-2">
                            <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3" id="btnRotate">
                                <i class="fa-solid fa-rotate-right me-1"></i> Putar 90°
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3" id="btnFlip">
                                <i class="fa-solid fa-arrows-left-right me-1"></i> Balik Horizontal
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" id="btnReset">
                                <i class="fa-solid fa-arrows-rotate me-1"></i> Reset
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT: CONTROLS & FRAME OPTIONS -->
            <div class="col-lg-6 col-md-8">
                <div class="glass-card p-4">

                    <!-- UPLOAD SECTION -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-bold mb-2">
                            <span class="badge bg-info text-dark me-2">1</span>Unggah Foto Kamu
                        </label>
                        <div class="d-flex gap-2">
                            <input type="file" id="fileInput" accept="image/*" class="d-none">
                            <button type="button" class="btn btn-gradient rounded-pill px-4 py-3 w-100 fw-bold" onclick="document.getElementById('fileInput').click()">
                                <i class="fa-solid fa-image me-2"></i> Pilih Foto dari Galeri / Kamera
                            </button>
                        </div>
                    </div>

                    <!-- TEMPLATE CHOICES -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-bold mb-2">
                            <span class="badge bg-primary me-2">2</span>Pilih Desain Frame
                        </label>

                        <div class="row g-2">
                            <!-- FRAME 1: REVIVAL NIGHT -->
                            <div class="col-12">
                                <div class="frame-thumb-btn active d-flex align-items-center gap-3" data-frame="revival">
                                    <div class="fs-2 text-warning p-2 rounded-3" style="background: rgba(245, 158, 11, 0.15);">
                                        🔥
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="fw-bold text-white mb-0">Disciples Revival Night</h6>
                                            <span class="badge bg-danger rounded-pill">10 Okt 2026</span>
                                        </div>
                                        <small class="text-secondary d-block">Dark Cyber Flame • Tagline: Ready To Be Revived</small>
                                    </div>
                                </div>
                            </div>

                            <!-- FRAME 2: DOT OFFICIAL -->
                            <div class="col-12">
                                <div class="frame-thumb-btn d-flex align-items-center gap-3" data-frame="official">
                                    <div class="fs-2 text-info p-2 rounded-3" style="background: rgba(56, 189, 248, 0.15);">
                                        ⚡
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="fw-bold text-white mb-0">I Am DOT Teens (Official)</h6>
                                            <span class="badge bg-primary rounded-pill">Youth Pride</span>
                                        </div>
                                        <small class="text-secondary d-block">Neon Glow • Tagline: Rising Outstanding Generation</small>
                                    </div>
                                </div>
                            </div>

                            <!-- FRAME 3: FIRE CELL -->
                            <div class="col-12">
                                <div class="frame-thumb-btn d-flex align-items-center gap-3" data-frame="cell">
                                    <div class="fs-2 text-purple p-2 rounded-3" style="background: rgba(168, 85, 247, 0.15); color: #C084FC;">
                                        🤝
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="fw-bold text-white mb-0">Fire Cell Spiritual Family</h6>
                                            <span class="badge bg-info text-dark rounded-pill">Fellowship</span>
                                        </div>
                                        <small class="text-secondary d-block">Warm & United • Tagline: Stronger Together in Christ</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DOWNLOAD ACTION -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-bold mb-2">
                            <span class="badge bg-success me-2">3</span>Simpan & Bagikan
                        </label>
                        <button type="button" id="btnDownload" class="btn btn-success w-100 rounded-pill py-3 fw-bold fs-5 shadow">
                            <i class="fa-solid fa-download me-2"></i> Download Foto HD (Bebas Watermark)
                        </button>
                    </div>

                    <!-- INSTAGRAM STORY QUICK GUIDE -->
                    <div class="p-3 rounded-4" style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.08);">
                        <h6 class="fw-bold text-white small mb-2"><i class="fa-brands fa-instagram text-danger me-1"></i> Cara Post ke Instagram Story:</h6>
                        <ol class="text-secondary small mb-0 ps-3">
                            <li>Klik tombol <strong>Download Foto HD</strong> di atas.</li>
                            <li>Buka aplikasi Instagram di HP kamu.</li>
                            <li>Pilih foto yang baru di-download, tag akun <strong>@dot_sawangan</strong>.</li>
                            <li>Gunakan hashtag <strong>#DOTSawangan #DisciplesRevivalNight</strong> agar di-repost oleh admin!</li>
                        </ol>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <script>
        // ==========================================
        // STATE & CANVAS INITIALIZATION
        // ==========================================
        const canvas = document.getElementById('photoCanvas');
        const ctx = canvas.getContext('2d');
        const canvasBox = document.getElementById('canvasBox');
        const emptyPlaceholder = document.getElementById('emptyPlaceholder');

        let currentRatio = 'story'; // 'story' (9:16) or 'square' (1:1)
        let currentFrame = 'revival'; // 'revival', 'official', 'cell'

        let userImage = null;
        let imgX = 0;
        let imgY = 0;
        let imgScale = 1;
        let imgRotation = 0; // in degrees
        let isFlipped = false;

        let isDragging = false;
        let startX = 0;
        let startY = 0;

        // Load Default Canvas
        function setCanvasDimensions() {
            if (currentRatio === 'story') {
                canvas.width = 1080;
                canvas.height = 1920;
                canvasBox.style.width = '315px';
                canvasBox.style.height = '560px';
            } else {
                canvas.width = 1080;
                canvas.height = 1080;
                canvasBox.style.width = '360px';
                canvasBox.style.height = '360px';
            }
            renderCanvas();
        }

        // ==========================================
        // FRAME RENDERING PROCEDURAL GRAPHICS
        // ==========================================
        function drawFrame() {
            const w = canvas.width;
            const h = canvas.height;

            if (currentFrame === 'revival') {
                // DISCIPLES REVIVAL NIGHT THEME
                // Outer subtle vignette
                const grad = ctx.createRadialGradient(w/2, h/2, w*0.4, w/2, h/2, w*0.9);
                grad.addColorStop(0, 'rgba(0,0,0,0)');
                grad.addColorStop(1, 'rgba(0, 0, 0, 0.65)');
                ctx.fillStyle = grad;
                ctx.fillRect(0, 0, w, h);

                // Top Header Banner
                const topGrad = ctx.createLinearGradient(0, 0, 0, h * 0.22);
                topGrad.addColorStop(0, 'rgba(5, 10, 24, 0.95)');
                topGrad.addColorStop(1, 'rgba(5, 10, 24, 0)');
                ctx.fillStyle = topGrad;
                ctx.fillRect(0, 0, w, h * 0.22);

                // Bottom Footer Banner
                const botGrad = ctx.createLinearGradient(0, h * 0.72, 0, h);
                botGrad.addColorStop(0, 'rgba(5, 10, 24, 0)');
                botGrad.addColorStop(0.3, 'rgba(7, 13, 31, 0.85)');
                botGrad.addColorStop(1, 'rgba(3, 7, 18, 0.98)');
                ctx.fillStyle = botGrad;
                ctx.fillRect(0, h * 0.72, w, h * 0.28);

                // Neon Borders & Accents
                ctx.lineWidth = 14;
                ctx.strokeStyle = '#38BDF8';
                ctx.strokeRect(40, 40, w - 80, h - 80);

                ctx.lineWidth = 4;
                ctx.strokeStyle = '#F59E0B';
                ctx.strokeRect(52, 52, w - 104, h - 104);

                // Top Event Badge
                ctx.save();
                ctx.fillStyle = '#EF4444';
                ctx.beginPath();
                ctx.roundRect(w/2 - 260, 70, 520, 60, 30);
                ctx.fill();
                ctx.fillStyle = '#FFFFFF';
                ctx.font = 'bold 28px "Space Grotesk", sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText('🔥 DISCIPLES REVIVAL NIGHT 🔥', w/2, 112);
                ctx.restore();

                // Bottom Content
                ctx.save();
                ctx.textAlign = 'center';

                // Subtitle
                ctx.fillStyle = '#F59E0B';
                ctx.font = 'bold 30px "Space Grotesk", sans-serif';
                ctx.fillText('10 OKTOBER 2026 • 17:30 WIB', w/2, h - 230);

                // Title
                ctx.fillStyle = '#FFFFFF';
                ctx.font = 'bold 54px "Poppins", sans-serif';
                ctx.fillText('I\'M READY TO BE REVIVED!', w/2, h - 165);

                // Venue
                ctx.fillStyle = '#38BDF8';
                ctx.font = '500 28px "Poppins", sans-serif';
                ctx.fillText('Main Sanctuary GBI ERC Sawangan', w/2, h - 115);

                // DOT Badge
                ctx.fillStyle = 'rgba(255, 255, 255, 0.4)';
                ctx.font = '600 22px "Poppins", sans-serif';
                ctx.fillText('DRP OUTSTANDING TEENS • @DOT_SAWANGAN', w/2, h - 75);
                ctx.restore();

            } else if (currentFrame === 'official') {
                // I AM DOT TEENS OFFICIAL YOUTH THEME
                const topGrad = ctx.createLinearGradient(0, 0, 0, h * 0.2);
                topGrad.addColorStop(0, 'rgba(15, 23, 42, 0.95)');
                topGrad.addColorStop(1, 'rgba(15, 23, 42, 0)');
                ctx.fillStyle = topGrad;
                ctx.fillRect(0, 0, w, h * 0.2);

                const botGrad = ctx.createLinearGradient(0, h * 0.7, 0, h);
                botGrad.addColorStop(0, 'rgba(15, 23, 42, 0)');
                botGrad.addColorStop(0.3, 'rgba(15, 23, 42, 0.9)');
                botGrad.addColorStop(1, 'rgba(10, 15, 30, 0.98)');
                ctx.fillStyle = botGrad;
                ctx.fillRect(0, h * 0.7, w, h * 0.3);

                // Cyber Glowing Border
                ctx.lineWidth = 12;
                ctx.strokeStyle = '#8B5CF6';
                ctx.strokeRect(35, 35, w - 70, h - 70);

                // Corner Decorators
                ctx.fillStyle = '#38BDF8';
                ctx.fillRect(30, 30, 40, 12);
                ctx.fillRect(30, 30, 12, 40);
                ctx.fillRect(w - 70, 30, 40, 12);
                ctx.fillRect(w - 42, 30, 12, 40);

                // Header Texts
                ctx.save();
                ctx.textAlign = 'center';
                ctx.fillStyle = '#38BDF8';
                ctx.font = 'bold 32px "Space Grotesk", sans-serif';
                ctx.fillText('DRP OUTSTANDING TEENS', w/2, 95);

                ctx.fillStyle = '#E2E8F0';
                ctx.font = '500 24px "Poppins", sans-serif';
                ctx.fillText('GBI ERC SAWANGAN', w/2, 135);
                ctx.restore();

                // Bottom Content
                ctx.save();
                ctx.textAlign = 'center';
                
                // Pill
                ctx.fillStyle = '#8B5CF6';
                ctx.beginPath();
                ctx.roundRect(w/2 - 220, h - 230, 440, 52, 26);
                ctx.fill();
                ctx.fillStyle = '#FFFFFF';
                ctx.font = 'bold 24px "Space Grotesk", sans-serif';
                ctx.fillText('PROUD TO BE DOT TEENS ⚡', w/2, h - 195);

                // Big Text
                ctx.fillStyle = '#FFFFFF';
                ctx.font = 'bold 48px "Poppins", sans-serif';
                ctx.fillText('RISING OUTSTANDING', w/2, h - 130);

                ctx.fillStyle = '#38BDF8';
                ctx.font = 'bold 36px "Poppins", sans-serif';
                ctx.fillText('GENERATION IN CHRIST', w/2, h - 85);
                ctx.restore();

            } else if (currentFrame === 'cell') {
                // FIRE CELL FELLOWSHIP THEME
                const botGrad = ctx.createLinearGradient(0, h * 0.72, 0, h);
                botGrad.addColorStop(0, 'rgba(17, 24, 39, 0)');
                botGrad.addColorStop(0.3, 'rgba(17, 24, 39, 0.9)');
                botGrad.addColorStop(1, 'rgba(15, 23, 42, 0.98)');
                ctx.fillStyle = botGrad;
                ctx.fillRect(0, h * 0.72, w, h * 0.28);

                ctx.lineWidth = 14;
                ctx.strokeStyle = '#EC4899';
                ctx.strokeRect(40, 40, w - 80, h - 80);

                // Top Badge
                ctx.save();
                ctx.fillStyle = '#EC4899';
                ctx.beginPath();
                ctx.roundRect(w/2 - 200, 70, 400, 56, 28);
                ctx.fill();
                ctx.fillStyle = '#FFFFFF';
                ctx.font = 'bold 26px "Space Grotesk", sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText('🔥 DOT FIRE CELL 🤝', w/2, 108);
                ctx.restore();

                // Bottom Content
                ctx.save();
                ctx.textAlign = 'center';

                ctx.fillStyle = '#F472B6';
                ctx.font = 'bold 30px "Space Grotesk", sans-serif';
                ctx.fillText('MY SPIRITUAL FAMILY', w/2, h - 180);

                ctx.fillStyle = '#FFFFFF';
                ctx.font = 'bold 46px "Poppins", sans-serif';
                ctx.fillText('STRONGER TOGETHER', w/2, h - 125);

                ctx.fillStyle = '#94A3B8';
                ctx.font = '500 24px "Poppins", sans-serif';
                ctx.fillText('Bertumbuh • Berakar • Berbuah', w/2, h - 80);
                ctx.restore();
            }
        }

        // ==========================================
        // MAIN CANVAS RENDER FUNCTION
        // ==========================================
        function renderCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // 1. Draw Background
            ctx.fillStyle = '#0F172A';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // 2. Draw User Photo if loaded
            if (userImage) {
                emptyPlaceholder.style.display = 'none';

                ctx.save();
                // Move context to photo center
                ctx.translate(canvas.width / 2 + imgX, canvas.height / 2 + imgY);
                ctx.rotate((imgRotation * Math.PI) / 180);
                if (isFlipped) {
                    ctx.scale(-1, 1);
                }

                const scaledW = userImage.width * imgScale;
                const scaledH = userImage.height * imgScale;

                ctx.drawImage(userImage, -scaledW / 2, -scaledH / 2, scaledW, scaledH);
                ctx.restore();
            } else {
                emptyPlaceholder.style.display = 'flex';
            }

            // 3. Draw Overlay Frame
            drawFrame();
        }

        // ==========================================
        // IMAGE UPLOAD & SIZING
        // ==========================================
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(evt) {
                const img = new Image();
                img.onload = function() {
                    userImage = img;
                    // Reset transform parameters
                    imgX = 0;
                    imgY = 0;
                    imgRotation = 0;
                    isFlipped = false;

                    // Initial scale to cover canvas
                    const scaleX = canvas.width / img.width;
                    const scaleY = canvas.height / img.height;
                    imgScale = Math.max(scaleX, scaleY);

                    document.getElementById('zoomSlider').value = 100;
                    document.getElementById('zoomValue').innerText = '100%';

                    renderCanvas();
                };
                img.src = evt.target.result;
            };
            reader.readAsDataURL(file);
        });

        // ==========================================
        // TOUCH & MOUSE PANNING (DRAG IMAGE)
        // ==========================================
        function getCoords(e) {
            const rect = canvas.getBoundingClientRect();
            const clientX = e.touches ? e.touches[0].clientX : e.clientX;
            const clientY = e.touches ? e.touches[0].clientY : e.clientY;
            return {
                x: (clientX - rect.left) * (canvas.width / rect.width),
                y: (clientY - rect.top) * (canvas.height / rect.height)
            };
        }

        canvas.addEventListener('mousedown', function(e) {
            if (!userImage) return;
            isDragging = true;
            const c = getCoords(e);
            startX = c.x - imgX;
            startY = c.y - imgY;
            canvas.style.cursor = 'grabbing';
        });

        window.addEventListener('mousemove', function(e) {
            if (!isDragging || !userImage) return;
            const c = getCoords(e);
            imgX = c.x - startX;
            imgY = c.y - startY;
            renderCanvas();
        });

        window.addEventListener('mouseup', function() {
            isDragging = false;
            canvas.style.cursor = 'grab';
        });

        // Touch support for Mobile
        canvas.addEventListener('touchstart', function(e) {
            if (!userImage) return;
            isDragging = true;
            const c = getCoords(e);
            startX = c.x - imgX;
            startY = c.y - imgY;
        }, { passive: false });

        window.addEventListener('touchmove', function(e) {
            if (!isDragging || !userImage) return;
            e.preventDefault();
            const c = getCoords(e);
            imgX = c.x - startX;
            imgY = c.y - startY;
            renderCanvas();
        }, { passive: false });

        window.addEventListener('touchend', function() {
            isDragging = false;
        });

        // ==========================================
        // CONTROLS (ZOOM, ROTATE, FLIP, RESET)
        // ==========================================
        let baseScale = 1;
        document.getElementById('zoomSlider').addEventListener('input', function() {
            const zoomPercent = parseInt(this.value);
            document.getElementById('zoomValue').innerText = zoomPercent + '%';
            if (userImage) {
                const coverScale = Math.max(canvas.width / userImage.width, canvas.height / userImage.height);
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
            imgX = 0;
            imgY = 0;
            imgRotation = 0;
            isFlipped = false;
            document.getElementById('zoomSlider').value = 100;
            document.getElementById('zoomValue').innerText = '100%';
            if (userImage) {
                imgScale = Math.max(canvas.width / userImage.width, canvas.height / userImage.height);
            }
            renderCanvas();
        });

        // ==========================================
        // FORMAT TOGGLE (9:16 vs 1:1)
        // ==========================================
        document.getElementById('btnFormatStory').addEventListener('click', function() {
            this.classList.add('active');
            document.getElementById('btnFormatSquare').classList.remove('active');
            currentRatio = 'story';
            setCanvasDimensions();
        });

        document.getElementById('btnFormatSquare').addEventListener('click', function() {
            this.classList.add('active');
            document.getElementById('btnFormatStory').classList.remove('active');
            currentRatio = 'square';
            setCanvasDimensions();
        });

        // ==========================================
        // FRAME PRESET SELECTOR
        // ==========================================
        document.querySelectorAll('.frame-thumb-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.frame-thumb-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentFrame = this.getAttribute('data-frame');
                renderCanvas();
            });
        });

        // ==========================================
        // DOWNLOAD IMAGE
        // ==========================================
        document.getElementById('btnDownload').addEventListener('click', function() {
            if (!userImage) {
                alert('Silakan upload foto terlebih dahulu sebelum mendownload!');
                return;
            }

            // Generate high-quality PNG
            const link = document.createElement('a');
            const filename = `DOT_${currentFrame}_${Date.now()}.png`;
            link.download = filename;
            link.href = canvas.toDataURL('image/png', 1.0);
            link.click();
        });

        // Initial setup
        setCanvasDimensions();
    </script>

</body>
</html>
