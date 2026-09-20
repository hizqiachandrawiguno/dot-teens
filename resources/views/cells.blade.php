<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT GBI Sawangan - DRP Outstanding Teens</title>

    <meta name="description" content="Website resmi DOT (DRP Outstanding Teens) Sawangan. Temukan jadwal ibadah, info komunitas cell, galeri kegiatan, dan mari bertumbuh bersama komunitas youth kami!">
    <meta name="keywords" content="DOT Sawangan, Youth Sawangan, Pemuda Kristen Sawangan, Ibadah Youth Sawangan, Gereja Sawangan, Komunitas Pemuda, Cell DOT">
    <meta name="author" content="DOT Sawangan">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dotsawangan.com/">
    <meta property="og:title" content="DOT Sawangan - Teens & Youth Community">
    <meta property="og:description" content="Website resmi DOT Sawangan. Temukan jadwal ibadah dan bergabunglah dengan komunitas kami!">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* KUNCI MUTLAK AGAR LAYAR TIDAK MELAR KE SAMPING */
        html, body {
            max-width: 100vw;
            width: 100%;
            overflow-x: hidden !important;
            margin: 0;
            padding: 0;
            position: relative;
        }
        
        /* Memastikan baris (row) bootstrap tidak menarik layar */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* DYNAMIC BACKGROUND */
        body { background: linear-gradient(-45deg, #0F172A, #1E1B4B, #0F172A, #172554); background-size: 400% 400%; animation: gradientBG 15s ease infinite; color: #F3F4F6; font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

        /* FLOATING ORBS */
        .orb { position: absolute; border-radius: 50%; filter: blur(80px); z-index: -1; animation: float 10s infinite ease-in-out alternate; }
        .orb-1 { width: 300px; height: 300px; background: rgba(139, 92, 246, 0.3); top: 10%; left: -10%; }
        .orb-2 { width: 400px; height: 400px; background: rgba(96, 165, 250, 0.2); top: 50%; right: -15%; animation-delay: -5s; }
        @keyframes float { 0% { transform: translateY(0) scale(1); } 100% { transform: translateY(-50px) scale(1.1); } }

        /* STYLING UTAMA */
        .text-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6, #EC4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 700; }
        .navbar-custom { background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }

        /* --- HIGHLIGHT NAVIGASI AKTIF --- */
        .navbar-nav .nav-link { position: relative; transition: color 0.3s ease; color: #D1D5DB !important; }
        .navbar-nav .nav-link:hover { color: #fff !important; }
        .navbar-nav .nav-link.active { color: #60A5FA !important; font-weight: 700; }
        .navbar-nav .nav-link.active::after { content: ''; position: absolute; bottom: 0px; left: 0; width: 100%; height: 2px; background: linear-gradient(90deg, #60A5FA, #8B5CF6); border-radius: 2px; }

        .glass-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; backdrop-filter: blur(12px); padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); transition: transform 0.3s, border-color 0.3s; }
        .glass-card:hover { transform: translateY(-5px); border-color: rgba(139, 92, 246, 0.4); }

        .btn-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; color: white; font-weight: 600; padding: 12px 30px; transition: all 0.3s ease; }
        .btn-gradient:hover { background: linear-gradient(90deg, #8B5CF6, #EC4899); transform: translateY(-3px); color: white; box-shadow: 0 8px 20px rgba(236, 72, 153, 0.4); }

        .form-control { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 10px; }
        .form-control:focus { background: rgba(255, 255, 255, 0.1); border-color: #8B5CF6; color: #fff; }
        .form-control::placeholder { color: rgba(255, 255, 255, 0.4); }

        /* EVENT CALENDAR CARD STYLING */
        .event-card { background: rgba(0,0,0,0.2); border-left: 4px solid #8B5CF6; border-radius: 10px; padding: 20px; margin-bottom: 15px; transition: 0.3s; }
        .event-card:hover { background: rgba(139, 92, 246, 0.1); transform: translateX(10px); }
        .event-day { font-size: 1.5rem; font-weight: 700; color: #60A5FA; }

        .floating-wa { position: fixed; bottom: 30px; right: 30px; background-color: #25D366; color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 30px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4); z-index: 1000; transition: all 0.3s ease; }
        .floating-wa:hover { transform: scale(1.1) rotate(10deg); color: white; }

        section { padding: 100px 0; position: relative; z-index: 1; }
        .text-secondary, .text-muted { color: #94A3B8 !important; }
    </style>
</head>
<body>

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" style="height: 60px; object-fit: contain;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/cells">Cells</a></li>
                    <li class="nav-item"><a class="nav-link" href="/twibbon"><i class="fa-solid fa-camera-retro me-1 text-info"></i>Twibbon</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#faq">FAQ</a></li>
                    <li class="nav-item"><a class="btn btn-gradient rounded-pill px-4 ms-lg-2 text-white" style="color: white !important;" href="#join-cell">Join Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="container text-center" style="margin-top: 160px; margin-bottom: 50px;">
        <div data-aos="zoom-in" data-aos-duration="1000">
            <span class="badge bg-primary text-uppercase px-3 py-2 rounded-pill mb-3" style="background-color: rgba(96, 165, 250, 0.2) !important; color: #60A5FA !important; border: 1px solid #60A5FA;">Spiritual Family</span>
            <h1 class="display-3 fw-bold mb-4">Temukan Keluarga <br><span class="text-gradient">Rohanimu</span></h1>
            <p class="fs-5 text-secondary mx-auto" style="max-width: 700px;">
                Penempatan Cell di DOT disesuaikan dengan tahun kelahiran agar kamu bisa seru-seruan bareng teman sebaya. Cek jadwal dan gabung sekarang!
            </p>
        </div>
    </header>

    <!-- SECTION INOVASI: FIND MY CELL INTERACTIVE WIZARD -->
    <section class="container pt-0 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="zoom-in">
                <div class="glass-card p-4 p-md-5" style="border: 2px solid rgba(96, 165, 250, 0.3); background: linear-gradient(135deg, rgba(30, 27, 75, 0.7), rgba(15, 23, 42, 0.9)); position: relative; overflow: hidden;">
                    <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: rgba(139, 92, 246, 0.25); border-radius: 50%; filter: blur(50px); pointer-events: none;"></div>
                    
                    <div class="text-center mb-4">
                        <span class="badge rounded-pill px-3 py-2 mb-2" style="background: rgba(139, 92, 246, 0.25); color: #C084FC; border: 1px solid rgba(139, 92, 246, 0.4);">
                            <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Interactive Community Matcher
                        </span>
                        <h2 class="display-6 fw-bold text-white mb-2">Find My <span class="text-gradient">Fire Cell</span></h2>
                        <p class="text-secondary mx-auto" style="max-width: 600px;">
                            Bingung masuk kelompok mana? Jawab 3 preferensi di bawah dan sistem kami akan langsung mencarikan kelompok sel dan teman sebaya yang paling klik denganmu!
                        </p>
                    </div>

                    <!-- STEP 1: TAHUN KELAHIRAN -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-semibold small mb-2">
                            <span class="badge bg-primary me-2">1</span>Tahun Berapa Kamu Lahir?
                        </label>
                        <div class="d-flex flex-wrap gap-2" id="birthYearOptions">
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-step active" data-year="2007">2007 (SMA 3)</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-step" data-year="2008">2008 (SMA 2)</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-step" data-year="2009">2009 (SMA 1)</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-step" data-year="2010">2010 - 2011 (SMP 2-3)</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-step" data-year="2012">2012 (SMP 1)</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-step" data-year="2013">2013+ (Junior Teens)</button>
                        </div>
                    </div>

                    <!-- STEP 2: MINAT & HOBI -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-semibold small mb-2">
                            <span class="badge bg-info text-dark me-2">2</span>Apa Hal yang Paling Kamu Sukai di Komunitas?
                        </label>
                        <div class="d-flex flex-wrap gap-2" id="hobbyOptions">
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-hobby active" data-hobby="music"><i class="fa-solid fa-guitar me-1"></i> Musik & Worship</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-hobby" data-hobby="creative"><i class="fa-solid fa-palette me-1"></i> Desain & Media Kreatif</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-hobby" data-hobby="game"><i class="fa-solid fa-gamepad me-1"></i> Olahraga & Main Game Bareng</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-hobby" data-hobby="chat"><i class="fa-solid fa-mug-hot me-1"></i> Ngobrol Santai & Sharing Curhat</button>
                        </div>
                    </div>

                    <!-- STEP 3: LOKASI DOMISILI -->
                    <div class="mb-4">
                        <label class="form-label text-white fw-semibold small mb-2">
                            <span class="badge bg-warning text-dark me-2">3</span>Di Mana Daerah Tempat Tinggalmu?
                        </label>
                        <div class="d-flex flex-wrap gap-2" id="domicileOptions">
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-domicile active" data-loc="sawangan"><i class="fa-solid fa-location-dot me-1"></i> Sawangan & Sekitarnya</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-domicile" data-loc="bedahan"><i class="fa-solid fa-location-dot me-1"></i> Bedahan / Pengasinan</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-domicile" data-loc="depok"><i class="fa-solid fa-location-dot me-1"></i> Cinere / Depok Kota</button>
                            <button type="button" class="btn btn-outline-light rounded-pill px-3 py-2 btn-domicile" data-loc="lainnya"><i class="fa-solid fa-location-dot me-1"></i> Luar Wilayah / Lainnya</button>
                        </div>
                    </div>

                    <!-- ACTION BUTTON -->
                    <div class="text-center mt-4">
                        <button type="button" id="btnMatchCell" class="btn btn-gradient rounded-pill px-5 py-3 fs-5 shadow fw-bold">
                            <i class="fa-solid fa-sparkles me-2"></i> Cocokkan Cell Saya Sekarang!
                        </button>
                    </div>

                    <!-- HASIL PENCARIAN (DYNAMIC RESULT) -->
                    <div id="cellResultWrapper" class="mt-4" style="display: none;">
                        <div class="p-4 rounded-4" style="background: rgba(0, 0, 0, 0.4); border: 2px solid #8B5CF6; box-shadow: 0 0 25px rgba(139, 92, 246, 0.3);">
                            <div class="row align-items-center g-3">
                                <div class="col-md-8 text-center text-md-start">
                                    <span class="badge bg-success rounded-pill px-3 py-1 mb-2">
                                        <i class="fa-solid fa-check-circle me-1"></i> 100% Cocok Buatmu!
                                    </span>
                                    <h3 class="fw-bold text-white mb-1" id="resCellName">Growing Generation</h3>
                                    <p class="text-info fw-semibold mb-1" id="resCellLeader"><i class="fa-solid fa-user-shield me-1"></i> Ketua: Kak Kayla</p>
                                    <p class="text-secondary small mb-0" id="resCellDesc">Komunitas seru buat anak-anak SMA yang aktif, hangat, dan siap bertumbuh bersama dalam firman Tuhan.</p>
                                </div>
                                <div class="col-md-4 text-center text-md-end">
                                    <a href="#" id="resCellWa" target="_blank" class="btn btn-success rounded-pill px-4 py-2 mb-2 d-block w-100 fw-bold">
                                        <i class="fa-brands fa-whatsapp me-2 fs-5"></i> Chat Kak Leader
                                    </a>
                                    <a href="#join-cell" id="resJoinBtn" class="btn btn-outline-info rounded-pill px-4 py-2 d-block w-100 text-white">
                                        <i class="fa-solid fa-file-pen me-1"></i> Daftar di Cell Ini
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="container pt-0">
        <div class="row align-items-center mb-5" data-aos="fade-up">
            <div class="col-md-8">
                <h3 class="fw-bold mb-1">Jadwal <span class="text-gradient">Pertemuan Terdekat</span></h3>
                <p class="text-secondary mb-0">Jangan sampai terlewat keseruan minggu ini!</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-12" data-aos="fade-up">
                <div class="glass-card p-4">
                    @forelse($cellSchedules as $index => $schedule)
                        @php
                            // Array warna agar border kiri tetap warna-warni dinamis
                            $colors = ['#60A5FA', '#EC4899', '#10B981', '#8B5CF6', '#F59E0B'];
                            $color = $colors[$index % count($colors)];
                            
                            // Konversi nama hari ke Bahasa Indonesia
                            $hariEng = date('l', strtotime($schedule->meeting_date));
                            $namaHari = ['Sunday'=>'MINGGU', 'Monday'=>'SENIN', 'Tuesday'=>'SELASA', 'Wednesday'=>'RABU', 'Thursday'=>'KAMIS', 'Friday'=>'JUMAT', 'Saturday'=>'SABTU'];
                            $hariFix = $namaHari[$hariEng];
                        @endphp

                        <div class="event-card d-flex flex-column flex-md-row align-items-md-center justify-content-between" style="border-left-color: {{ $color }};">
                            <div class="d-flex align-items-center gap-4 mb-3 mb-md-0">
                                <div class="text-center" style="min-width: 100px; border-right: 1px solid rgba(255,255,255,0.1);">
                                    <span class="event-day d-block" style="color: {{ $color }};">{{ $hariFix }}</span>
                                    <span class="fw-bold" style="color: {{ $color }};">{{ date('d M', strtotime($schedule->meeting_date)) }}</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-white mb-1">{{ $schedule->cell_group_name }}</h5>
                                    <p class="text-secondary small mb-0">
                                        <i class="fa-solid fa-clock me-1" style="color: {{ $color }};"></i> {{ date('H.i', strtotime($schedule->meeting_time)) }} WIB | 
                                        <i class="fa-solid fa-location-dot ms-2 me-1" style="color: {{ $color }};"></i> {{ $schedule->location }}
                                    </p>
                                </div>
                            </div>
                            <a href="https://wa.me/{{ $schedule->leader_phone }}?text=Halo%20kak,%20aku%20mau%20tanya%20jadwal%20{{ urlencode($schedule->cell_group_name) }}" 
                                target="_blank" 
                                class="btn btn-sm rounded-pill px-4 text-white" 
                                style="border: 1px solid {{ $color }}; color: {{ $color }} !important;">
                                Tanya Detail
                            </a>                       
                        </div>

                    @empty
                        <div class="text-center py-5">
                            <i class="fa-solid fa-calendar-xmark fs-1 text-secondary mb-3"></i>
                            <h5 class="text-white fw-bold">Jadwal Belum Diperbarui</h5>
                            <p class="text-secondary mb-0">Ketua Cell sedang menyusun jadwal minggu ini. Cek lagi nanti ya!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="container pt-0">
        <h3 class="fw-bold text-center mb-5" data-aos="fade-up">Daftar <span class="text-gradient">9 Cell DOT</span></h3>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100"><div class="glass-card text-center h-100"><div class="fs-2 text-info mb-2"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Jireh</h5><p class="badge bg-secondary mb-2">Kelahiran 2007</p><p class="text-gradient small mb-0 fw-bold">Ketua: Keren</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150"><div class="glass-card text-center h-100"><div class="fs-2 text-purple mb-2" style="color:#8B5CF6;"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Growing Generation</h5><p class="badge bg-secondary mb-2">Kelahiran 2008</p><p class="text-gradient small mb-0 fw-bold">Ketua: Kayla</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200"><div class="glass-card text-center h-100"><div class="fs-2 text-pink mb-2" style="color:#EC4899;"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">The Lions</h5><p class="badge bg-secondary mb-2">Kelahiran 2009</p><p class="text-gradient small mb-0 fw-bold">Ketua: Jayden</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250"><div class="glass-card text-center h-100"><div class="fs-2 text-info mb-2"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Posteros Shine (Gen 1)</h5><p class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</p><p class="text-gradient small mb-0 fw-bold">Ketua: Melfi</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300"><div class="glass-card text-center h-100"><div class="fs-2 text-purple mb-2" style="color:#8B5CF6;"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Awesome (Gen 2)</h5><p class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</p><p class="text-gradient small mb-0 fw-bold">Ketua: Valen</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350"><div class="glass-card text-center h-100"><div class="fs-2 text-pink mb-2" style="color:#EC4899;"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">The Miracle (Gen 3)</h5><p class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</p><p class="text-gradient small mb-0 fw-bold">Ketua: Matias</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400"><div class="glass-card text-center h-100"><div class="fs-2 text-info mb-2"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Everlasting Joy (Gen 4)</h5><p class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</p><p class="text-gradient small mb-0 fw-bold">Ketua: Esther</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="450"><div class="glass-card text-center h-100"><div class="fs-2 text-purple mb-2" style="color:#8B5CF6;"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Hoshiah Zion</h5><p class="badge bg-secondary mb-2">Kelahiran 2012</p><p class="text-gradient small mb-0 fw-bold">Ketua: Dyto</p></div></div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500"><div class="glass-card text-center h-100"><div class="fs-2 text-pink mb-2" style="color:#EC4899;"><i class="fa-solid fa-users"></i></div><h5 class="text-white fw-bold mb-1">Salvation</h5><p class="badge bg-secondary mb-2">Kelahiran 2012 - 2013</p><p class="text-gradient small mb-0 fw-bold">Ketua: Maureen</p></div></div>
        </div>
    </section>

    <section id="join-cell" style="background: rgba(0,0,0,0.2); padding-top: 100px; padding-bottom: 100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #fff;">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="background: rgba(239, 68, 68, 0.2); border: 1px solid #EF4444; color: #fff;">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="glass-card">
                        <div class="text-center mb-4">
                            <span class="badge bg-warning text-dark mb-2"><i class="fa-solid fa-triangle-exclamation me-1"></i> Belum Gabung Cell?</span>
                            <h3 class="mb-2 fw-bold text-white">Daftar Sekarang</h3>
                            <p class="text-secondary small">Isi datamu di bawah ini. Sistem kami akan otomatis mencarikan Cell yang sesuai dengan tahun kelahiranmu.</p>
                        </div>
                        
                        <form action="{{ route('join.submit') }}" method="POST" id="joinCellForm">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-light small fw-semibold">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control p-3" placeholder="Siapa namamu?" required>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-light small fw-semibold">No. WhatsApp Aktif</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 fw-bold" style="background: rgba(56, 189, 248, 0.15); color: #22C55E; border-top-left-radius: 12px; border-bottom-left-radius: 12px; font-size: 14px;">
                                            <i class="fa-brands fa-whatsapp me-1"></i> +62
                                        </span>
                                        <input type="tel" name="phone_number" class="form-control p-3 phone-next-input" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none !important;" placeholder="81234567890" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <label class="form-label text-light small fw-semibold">Tanggal Lahir</label>
                                    <input type="date" name="birth_date" id="formBirthDate" class="form-control p-3 text-light" style="color-scheme: dark;" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-light small fw-semibold">Rekomendasi / Pilihan Fire Cell</label>
                                <select name="fire_cell" id="formCellSelect" class="form-select p-3" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 10px;">
                                    <option value="" class="bg-dark text-white">-- Pilihkan Otomatis Berdasarkan Usia --</option>
                                    <option value="Jireh" class="bg-dark text-white">Jireh (Kelahiran 2007)</option>
                                    <option value="Growing Generation" class="bg-dark text-white">Growing Generation (Kelahiran 2008)</option>
                                    <option value="The Lions" class="bg-dark text-white">The Lions (Kelahiran 2009)</option>
                                    <option value="Posteros Shine" class="bg-dark text-white">Posteros Shine - Gen 1 (Kelahiran 2010-2011)</option>
                                    <option value="Awesome" class="bg-dark text-white">Awesome - Gen 2 (Kelahiran 2010-2011)</option>
                                    <option value="The Miracle" class="bg-dark text-white">The Miracle - Gen 3 (Kelahiran 2010-2011)</option>
                                    <option value="Everlasting Joy" class="bg-dark text-white">Everlasting Joy - Gen 4 (Kelahiran 2010-2011)</option>
                                    <option value="Hoshiah Zion" class="bg-dark text-white">Hoshiah Zion (Kelahiran 2012)</option>
                                    <option value="Salvation" class="bg-dark text-white">Salvation (Kelahiran 2012-2013)</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-light small fw-semibold">Alamat / Domisili</label>
                                <textarea name="address" id="formAddress" class="form-control" rows="2" placeholder="Tinggal di daerah mana? (contoh: Sawangan Permai)"></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient w-100 rounded-pill p-3 fs-5"><i class="fa-solid fa-paper-plane me-2"></i> Ajukan Pendaftaran Cell</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="https://wa.me/6285173280626?text=Halo%20kak,%20aku%20jemaat%20baru%20mau%20tanya%20jadwal%20Cell%20Teens%20DOT!" target="_blank" class="floating-wa">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, offset: 100 });

        // Formatting input HP Indonesia
        document.querySelectorAll('.phone-next-input').forEach(input => {
            input.addEventListener('input', function() {
                let val = this.value.replace(/[^0-9]/g, '');
                if (val.startsWith('0')) {
                    val = val.substring(1);
                } else if (val.startsWith('62')) {
                    val = val.substring(2);
                }
                this.value = val;
            });
        });

        // ==========================================
        // SCRIPT INTERAKTIF: FIND MY CELL
        // ==========================================
        let selectedYear = '2007';
        let selectedHobby = 'music';
        let selectedLoc = 'sawangan';

        // Toggle tombol Step 1 (Tahun)
        document.querySelectorAll('#birthYearOptions .btn-step').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('#birthYearOptions .btn-step').forEach(b => {
                    b.classList.remove('active', 'btn-primary');
                    b.classList.add('btn-outline-light');
                });
                this.classList.remove('btn-outline-light');
                this.classList.add('active', 'btn-primary');
                selectedYear = this.getAttribute('data-year');
            });
        });

        // Toggle tombol Step 2 (Hobi)
        document.querySelectorAll('#hobbyOptions .btn-hobby').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('#hobbyOptions .btn-hobby').forEach(b => {
                    b.classList.remove('active', 'btn-info', 'text-dark');
                    b.classList.add('btn-outline-light');
                });
                this.classList.remove('btn-outline-light');
                this.classList.add('active', 'btn-info', 'text-dark');
                selectedHobby = this.getAttribute('data-hobby');
            });
        });

        // Toggle tombol Step 3 (Lokasi)
        document.querySelectorAll('#domicileOptions .btn-domicile').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('#domicileOptions .btn-domicile').forEach(b => {
                    b.classList.remove('active', 'btn-warning', 'text-dark');
                    b.classList.add('btn-outline-light');
                });
                this.classList.remove('btn-outline-light');
                this.classList.add('active', 'btn-warning', 'text-dark');
                selectedLoc = this.getAttribute('data-loc');
            });
        });

        // Database Karakter 9 Cell DOT
        const cellData = {
            '2007': {
                name: 'Jireh',
                value: 'Jireh',
                leader: 'Kak Keren',
                phone: '6285173280626',
                desc: 'Komunitas seru buat kamu kelahiran 2007 (SMA 3 / Freshers). Berbagi visi masa depan, karir, dan berakar kuat di dalam Kristus!'
            },
            '2008': {
                name: 'Growing Generation',
                value: 'Growing Generation',
                leader: 'Kak Kayla',
                phone: '6285173280626',
                desc: 'Komunitas remaja kelahiran 2008 (SMA 2) yang aktif, saling dukung di masa sekolah, dan bertumbuh bareng teman seiman!'
            },
            '2009': {
                name: 'The Lions',
                value: 'The Lions',
                leader: 'Kak Jayden',
                phone: '6285173280626',
                desc: 'Generasi singa yang berani (Kelahiran 2009 / SMA 1). Kompak, setia kawan, dan siap jadi teladan di sekolah dan pergaulan!'
            },
            '2010': {
                phone: '6285173280626',
                hobbyMap: {
                    'music': { name: 'Awesome (Gen 2)', value: 'Awesome', leader: 'Kak Valen', desc: 'Pecinta musik & worship! Tempat bertumbuh buat kamu yang ekspresif dan suka memuji Tuhan bareng.' },
                    'creative': { name: 'Posteros Shine (Gen 1)', value: 'Posteros Shine', leader: 'Kak Melfi', desc: 'Kreatif, suka visual, media sosial & bersinar terang jadi garam dan terang dunia!' },
                    'game': { name: 'The Miracle (Gen 3)', value: 'The Miracle', leader: 'Kak Matias', desc: 'Enerjik, suka olahraga, game & aktivitas seru bareng teman-teman seiman!' },
                    'chat': { name: 'Everlasting Joy (Gen 4)', value: 'Everlasting Joy', leader: 'Kak Esther', desc: 'Penuh sukacita abadi! Suasana hangat yang nyaman buat curhat, sharing, dan saling menguatkan.' }
                }
            },
            '2012': {
                name: 'Hoshiah Zion',
                value: 'Hoshiah Zion',
                leader: 'Kak Dyto',
                phone: '6285173280626',
                desc: 'Grup sel kelahiran 2012 (SMP 1). Penuh energi, seru-seruan bareng teman baru, dan belajar firman dengan asik!'
            },
            '2013': {
                name: 'Salvation',
                value: 'Salvation',
                leader: 'Kak Maureen',
                phone: '6285173280626',
                desc: 'Komunitas penuh kasih buat adik-adik junior teens (Kelahiran 2012 - 2013+). Dibimbing dengan telaten oleh kakak rohani!'
            }
        };

        // Tombol Cocokkan Cell
        document.getElementById('btnMatchCell').addEventListener('click', function() {
            let result = null;
            if (selectedYear === '2010') {
                const map = cellData['2010'].hobbyMap;
                result = map[selectedHobby] || map['music'];
                result.phone = cellData['2010'].phone;
            } else {
                result = cellData[selectedYear] || cellData['2007'];
            }

            // Tampilkan hasil di card
            document.getElementById('resCellName').innerText = result.name;
            document.getElementById('resCellLeader').innerHTML = `<i class="fa-solid fa-user-shield me-1"></i> Ketua: ${result.leader}`;
            document.getElementById('resCellDesc').innerText = result.desc;

            // Buat tautan WhatsApp otomatis
            const waText = encodeURIComponent(`Halo ${result.leader}! Aku baru coba fitur "Find My Cell" di website DOT Teens dan hasilnya cocok di Cell *${result.name}*. Boleh kenalan dan info jadwal kumpul berikutnya? 🔥`);
            document.getElementById('resCellWa').href = `https://wa.me/${result.phone}?text=${waText}`;

            // Munculkan card dengan smooth scroll
            const resultWrap = document.getElementById('cellResultWrapper');
            resultWrap.style.display = 'block';
            resultWrap.scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Otomatis set dropdown pendaftaran
            const cellSelect = document.getElementById('formCellSelect');
            if (cellSelect) {
                cellSelect.value = result.value;
            }
        });

        // Tombol Daftar di Cell Ini
        document.getElementById('resJoinBtn').addEventListener('click', function() {
            const joinSec = document.getElementById('join-cell');
            if (joinSec) {
                joinSec.scrollIntoView({ behavior: 'smooth', block: 'start' });
                // Fokus ke input nama
                setTimeout(() => {
                    const nameInput = document.querySelector('#joinCellForm input[name="name"]');
                    if (nameInput) nameInput.focus();
                }, 600);
            }
        });
    </script>

    <footer class="text-center py-4 mt-5" style="border-top: 1px solid rgba(255,255,255,0.05);">
    <p class="small mb-0">
        <a href="/login" class="text-secondary" style="text-decoration: none; cursor: default;">
            &copy; 2026 DRP Outstanding Teens GBI Sawangan.
        </a>
    </p>
</footer>

</body>
</html>