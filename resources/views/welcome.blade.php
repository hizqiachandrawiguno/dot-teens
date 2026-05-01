<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT Teens | GBI ERC Sawangan</title>
    
    <meta name="description" content="Website resmi DOT (Department of Teens) Sawangan. Temukan jadwal ibadah, info komunitas cell, galeri kegiatan, dan mari bertumbuh bersama komunitas youth kami!">
    <meta name="keywords" content="DOT Sawangan, Youth Sawangan, Pemuda Kristen Sawangan, Ibadah Youth Sawangan, Gereja Sawangan, Komunitas Pemuda, Cell DOT">
    <meta name="author" content="DOT Sawangan">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dotsawangan.com/">
    <meta property="og:title" content="DOT Teens | GBI ERC Sawangan">
    <meta property="og:description" content="Temukan jadwal ibadah, info komunitas cell, dan mari bertumbuh bersama komunitas youth DOT Sawangan!">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    
    <meta name="theme-color" content="#121212">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

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
        body {
            background: linear-gradient(-45deg, #0F172A, #1E1B4B, #0F172A, #081229);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #F3F4F6;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* FLOATING ORBS */
        .orb {
            position: absolute; border-radius: 50%; filter: blur(80px); z-index: -1; opacity: 0.5;
            animation: float 10s infinite ease-in-out alternate;
        }
        .orb-1 { width: 300px; height: 300px; background: rgba(139, 92, 246, 0.4); top: 5%; left: -5%; }
        .orb-2 { width: 400px; height: 400px; background: rgba(96, 165, 250, 0.3); top: 40%; right: -10%; animation-delay: -5s; }
        .orb-3 { width: 350px; height: 350px; background: rgba(236, 72, 153, 0.3); bottom: 10%; left: 10%; animation-delay: -2s; }

        @keyframes float {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(-50px) scale(1.2); }
        }

        /* STYLING UTAMA */
        .text-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6, #EC4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 700; }
        .text-gradient-animated {
            background: linear-gradient(270deg, #60A5FA, #8B5CF6, #EC4899, #60A5FA);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 5s ease infinite;
            font-weight: 800;
        }
        .navbar-custom { background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.3s ease; }
        .navbar-nav .nav-link { position: relative; transition: color 0.3s ease; color: #D1D5DB !important; }
        .navbar-nav .nav-link:hover { color: #fff !important; }
        .navbar-nav .nav-link.active { color: #60A5FA !important; font-weight: 700; }
        .navbar-nav .nav-link.active::after { content: ''; position: absolute; bottom: 0px; left: 0; width: 100%; height: 2px; background: linear-gradient(90deg, #60A5FA, #8B5CF6); border-radius: 2px; }
        .glass-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; backdrop-filter: blur(12px); padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); transition: transform 0.3s, border-color 0.3s; }
        .glass-card:hover { transform: translateY(-5px); border-color: rgba(139, 92, 246, 0.4); }
        .btn-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; color: white; font-weight: 600; padding: 12px 30px; transition: all 0.3s ease; }
        .btn-gradient:hover { background: linear-gradient(90deg, #8B5CF6, #EC4899); transform: translateY(-3px); color: white; box-shadow: 0 8px 20px rgba(236, 72, 153, 0.4); }
        .form-control { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 10px; }
        .form-control:focus { background: rgba(255, 255, 255, 0.1); border-color: #8B5CF6; color: #fff; box-shadow: none; }
        .accordion-item { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); margin-bottom: 15px; border-radius: 15px !important; }
        .accordion-button { background: transparent; color: #fff; font-weight: 600; border-radius: 15px !important; box-shadow: none !important; }
        .accordion-button:not(.collapsed) { background: rgba(139, 92, 246, 0.1); color: #8B5CF6; }
        .accordion-button::after { filter: invert(1); }
        .accordion-body { color: #D1D5DB; }
        .floating-wa { position: fixed; bottom: 30px; right: 30px; background-color: #25D366; color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 30px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4); z-index: 1000; transition: all 0.3s ease; }
        .floating-wa:hover { transform: scale(1.1) rotate(10deg); color: white; }
        section { padding: 140px 0; position: relative; z-index: 1; }

        .prayer-board-card:hover { border-color: rgba(139, 92, 246, 0.5) !important; box-shadow: 0 10px 40px rgba(139, 92, 246, 0.2), 0 0 60px rgba(236, 72, 153, 0.1) !important; transform: translateY(-8px) scale(1.01); }
        .btn-kirim-doa:hover { transform: scale(1.05); box-shadow: 0 0 25px rgba(139, 92, 246, 0.4) !important; }
        #modalDoa .form-control { background: rgba(255,255,255,0.03) !important; border: 1px solid rgba(255,255,255,0.08) !important; color: #fff !important; }
        #modalDoa .form-control:focus { background: rgba(255,255,255,0.08) !important; border-color: #8B5CF6 !important; box-shadow: 0 0 15px rgba(139, 92, 246, 0.3) !important; }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarMain" data-bs-offset="150">

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <nav id="navbarMain" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-0">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" style="height: 90px; object-fit: contain;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cells">Cells</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>

                @auth
                    <li class="nav-item">
                        <a class="btn btn-outline-info rounded-pill px-4 ms-lg-2" href="/admin/dashboard">
                            <i class="fa-solid fa-gauge-high me-1"></i> Dashboard Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent text-danger fw-bold" style="cursor: pointer;">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-gradient rounded-pill px-4 ms-lg-2 text-white" href="#join">Join Us</a>
                    </li>
                @endauth
            </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="container" style="padding-top: 180px; padding-bottom: 140px; position: relative; z-index: 1;">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-7 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <span class="badge bg-purple text-uppercase px-3 py-2 rounded-pill mb-3" style="background: rgba(139, 92, 246, 0.2); color: #8B5CF6; border: 1px solid #8B5CF6;">DRP Outstanding Teens</span>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                    Fun Disciples, <br> 
                    <span class="text-gradient">Fun Community</span>
                </h1>
                <p class="fs-5 text-secondary mb-5">
                    Tempat ibadah yang asik, komunitas yang suportif, dan ruang untuk bertumbuh bersama. Kamu tidak sendirian, mari bergabung dengan keluarga DOT!
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start mt-4 px-3 px-sm-0">
                    <a href="#join" class="btn btn-gradient rounded-pill py-3 py-sm-2"><i class="fa-solid fa-user-plus me-2"></i>Daftar Sekarang</a>
                    <a href="/about" class="btn btn-outline-light rounded-pill px-4 py-3 py-sm-2"><i class="fa-solid fa-arrow-right me-2"></i>Kenali Kami</a>
                </div>
            </div>
            
            <div class="col-lg-5 text-center" data-aos="zoom-in" data-aos-duration="1200">
                <div>
                    <img src="{{ asset('images/header.svg') }}" alt="Ilustrasi DOT" style="width: 100%; max-width: 400px; filter: drop-shadow(0 20px 30px rgba(139, 92, 246, 0.4));">
                </div>
            </div>
        </div>
    </header>

    <section id="morning-devotion" class="py-5">
        <div class="container">
            <div class="row align-items-center rounded-4 shadow-lg overflow-hidden border border-secondary" data-aos="fade-up" style="background: rgba(255, 255, 255, 0.03);">
                
                <div class="col-md-5 p-0">
                    <img src="{{ asset('images/md.png') }}" alt="Promo Morning Devotion" class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 300px;">
                </div>

                <div class="col-md-7 p-4 p-md-5">
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm">
                        <i class="fa-solid fa-sun me-1"></i> Awali Harimu Dengan Tuhan
                    </span>
                    <h2 class="fw-bold text-white mb-3">Morning Devotion (MD) </h2>
                    
                    <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                        <a href="https://meet.google.com/zny-jonm-etv" target="_blank" class="btn rounded-pill px-4 py-3 fw-bold text-white shadow" style="background-color: #2563EB; border: none; transition: 0.3s;">
                            <i class="fa-solid fa-video me-2"></i> Join Google Meet
                        </a>
                        <span class="text-secondary fw-bold px-2">
                            <i class="fa-regular fa-clock me-1 text-info"></i> Setiap Hari Senin, Rabu, Jumat | 04.30
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="about-highlight" class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="fw-bold mb-4">Siapa Kami? <br><span class="text-gradient">DOT Teens | GBI ERC Sawangan</span></h2>
                <p class="text-secondary fs-5 mb-4" style="line-height: 1.8;">
                    Lebih dari sekadar tempat ibadah, kami adalah rumah dan keluarga bagi generasi muda untuk bertumbuh, menemukan jati diri, dan berdampak bagi dunia di dalam Kristus.
                </p>
                <a href="/about" class="btn btn-outline-light rounded-pill px-4 py-2">Baca Selengkapnya <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="glass-card p-5 text-center" style="border-color: rgba(96, 165, 250, 0.3);">
                    <i class="fa-solid fa-fire-flame-curved fs-1 text-info mb-3"></i>
                    <h3 class="text-white fw-bold mb-3">Visi Kami</h3>
                    <p class="text-secondary mb-0">Menjadi generasi yang radikal bagi Kristus, berakar kuat dalam kebenaran, dan bersinar di tengah dunia.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cells" class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Komunitas <span class="text-gradient">Sel (Cell)</span></h2>
            <p class="text-secondary">Temukan keluarga rohanimu berdasarkan tahun kelahiran agar kamu bisa seru-seruan bareng teman sebaya.</p>
        </div>
        
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

        <br>
        <div class="text-center" data-aos="fade-up">
            <a href="/cells" class="btn btn-outline-light rounded-pill px-5 py-3">
                <i class="fa-solid fa-layer-group me-2"></i> Lihat Semua & Jadwal Cell
            </a>
        </div>
    </section>

    <section id="events" class="container">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold mb-3">Kegiatan & <span class="text-gradient">Acara Mendatang</span></h2>
        <p class="text-secondary">Jangan sampai ketinggalan event seru DOT bulan ini!</p>
    </div>

    <div class="row justify-content-center g-4">
        @forelse($events as $event)
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="glass-card h-100 p-4 d-flex flex-column" style="border-left: 4px solid #10B981; transition: 0.3s;">
                
                @if($event->image)
                <div class="mb-4">
                    <img src="{{ asset('uploads/events/' . $event->image) }}" alt="Poster" class="img-fluid rounded-3 shadow" style="width: 100%; height: 200px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
                </div>
                @endif

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-success text-white rounded p-3 text-center" style="min-width: 85px;">
                        <span class="d-block fw-bold fs-3" style="line-height: 1;">{{ date('d', strtotime($event->event_date)) }}</span>
                        <span class="d-block small text-uppercase fw-semibold mt-1">{{ date('M Y', strtotime($event->event_date)) }}</span>
                    </div>
                    <div>
                        <h5 class="fw-bold text-white mb-1">{{ $event->title }}</h5>
                        <span class="badge bg-secondary mb-2" style="background-color: rgba(16, 185, 129, 0.2)!important; color: #10B981!important;">Acara Spesial DOT</span>
                    </div>
                </div>
                
                <p class="text-secondary small mb-4 flex-grow-1">{{ Str::limit($event->description, 70) }}</p>

                <div class="mt-auto">
                    <p class="text-secondary small mb-2"><i class="fa-solid fa-clock me-2 text-success"></i> Pukul {{ date('H:i', strtotime($event->event_waktu)) }} WIB</p>
                    <p class="text-secondary small mb-0"><i class="fa-solid fa-location-dot me-2 text-success"></i> {{ $event->location }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center" data-aos="fade-up">
            <div class="glass-card p-5">
                <i class="fa-solid fa-calendar-xmark fs-1 text-secondary mb-3"></i>
                <h5 class="text-white fw-bold">Belum ada acara dalam waktu dekat</h5>
                <p class="text-secondary mb-0">Stay tuned terus di website dan Instagram kita ya untuk info event selanjutnya!</p>
            </div>
        </div>
        @endforelse
    </div>
</section>

    <section id="gallery-highlight" class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3">Our <span class="text-gradient">Memories</span></h2>
            <p class="text-secondary">Intip keseruan ibadah, fellowship, dan event-event spesial kami!</p>
        </div>

        <div class="row g-4 justify-content-center mb-5">
            @forelse($galleries as $index => $gal)
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="glass-card p-2 position-relative group" style="border-radius: 15px; overflow: hidden; transition: 0.3s;">
                    <img src="{{ asset('uploads/gallery/' . $gal->image) }}" alt="{{ $gal->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); border-radius: 0 0 10px 10px;">
                        <h6 class="text-white fw-bold mb-0">{{ $gal->title }}</h6>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4">
                <p class="text-secondary">Foto keseruan DOT akan segera hadir di sini!</p>
            </div>
            @endforelse
        </div>

        <div class="text-center" data-aos="fade-up">
            <a href="/gallery" class="btn btn-gradient rounded-pill px-5 py-3 fs-5">Lihat Semua Foto <i class="fa-solid fa-images ms-2"></i></a>
        </div>
    </section>

    <section id="social-media" class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3">Connect With <span class="text-gradient">DOT Teens</span></h2>
            <p class="text-secondary">Jangan sampai ketinggalan update pelayanan, keseruan ibadah, dan info event terbaru kita!</p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-6" data-aos="fade-right">
                <div class="glass-card h-100 p-4 position-relative" style="border-top: 4px solid #E1306C; transition: 0.3s; overflow: hidden;">
                    <i class="fa-brands fa-instagram position-absolute" style="font-size: 15rem; color: rgba(225, 48, 108, 0.03); right: -20px; bottom: -20px; z-index: 0; pointer-events: none;"></i>
                    
                    <div class="d-flex align-items-center justify-content-between mb-4 position-relative z-1">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-gradient p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);">
                                <img src="{{ asset('images/logo.png') }}" alt="DOT" style="width: 30px; filter: brightness(0) invert(1);">
                            </div>
                            <div>
                                <h5 class="text-white fw-bold mb-0">DOT Instagram</h5>
                                <a href="https://instagram.com/dot_teens" target="_blank" class="text-secondary small text-decoration-none hover-white">@dot_teens</a>
                            </div>
                        </div>
                        <a href="https://instagram.com/dot_teens" target="_blank" class="btn btn-sm rounded-pill px-4 text-white fw-bold" style="background: #E1306C; box-shadow: 0 4px 15px rgba(225, 48, 108, 0.4);">Follow</a>
                    </div>
                    
                    <div class="row g-2 position-relative z-1">
                        <div class="col-4">
                            <a href="https://instagram.com/dot_teens" target="_blank" class="d-block position-relative overflow-hidden rounded" style="aspect-ratio: 1/1;">
                                <img src="images/ibadah.jpeg" class="w-100 h-100 object-fit-cover" alt="DOT Worship" style="transition: 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                <div class="position-absolute bottom-0 start-0 w-100 p-1" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"><span class="badge bg-danger" style="font-size: 0.6rem;">DServices</span></div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://instagram.com/dot_teens" target="_blank" class="d-block position-relative overflow-hidden rounded" style="aspect-ratio: 1/1;">
                                <img src="images/1.jpg" class="w-100 h-100 object-fit-cover" alt="DOT Community" style="transition: 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                <div class="position-absolute bottom-0 start-0 w-100 p-1" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"><span class="badge bg-primary" style="font-size: 0.6rem;">Reels</span></div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://instagram.com/dot_teens" target="_blank" class="d-block position-relative overflow-hidden rounded" style="aspect-ratio: 1/1;">
                                <img src="images/drn.jpeg" class="w-100 h-100 object-fit-cover" alt="DOT Event" style="transition: 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                <div class="position-absolute bottom-0 start-0 w-100 p-1" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);"><span class="badge bg-success" style="font-size: 0.6rem;">Worship</span></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="glass-card h-100 p-4 position-relative" style="border-top: 4px solid #00f2fe; transition: 0.3s; overflow: hidden;">
                    <i class="fa-brands fa-tiktok position-absolute" style="font-size: 15rem; color: rgba(37, 244, 238, 0.03); left: -20px; bottom: -20px; z-index: 0; pointer-events: none;"></i>

                    <div class="d-flex align-items-center justify-content-between mb-4 position-relative z-1">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: #000; border: 1px solid #25F4EE; box-shadow: 2px 2px 0px #FE2C55;">
                                <img src="{{ asset('images/logo.png') }}" alt="DOT" style="width: 30px; filter: brightness(0) invert(1);">
                            </div>
                            <div>
                                <h5 class="text-white fw-bold mb-0">DOT TikTok</h5>
                                <a href="https://tiktok.com/@dot_teens" target="_blank" class="text-secondary small text-decoration-none hover-white">@dot_teens</a>
                            </div>
                        </div>
                        <a href="https://tiktok.com/@dot_teens" target="_blank" class="btn btn-sm rounded-pill px-4 text-dark fw-bold" style="background: #25F4EE; box-shadow: 0 4px 15px rgba(37, 244, 238, 0.4);">Follow</a>
                    </div>

                    <div class="d-flex justify-content-center position-relative z-1">
                        <a href="https://www.tiktok.com/@dot_teens/video/7629225952081480967" target="_blank" class="d-block position-relative" style="width: 100%; max-width: 200px; border-radius: 15px; overflow: hidden; aspect-ratio: 9/16; background: url('https://images.unsplash.com/photo-1510511459019-5efa3702469d?q=80&w=400&auto=format&fit=crop') center/cover; transition: 0.3s; border: 1px solid rgba(255,255,255,0.1);" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            
                            <div class="position-absolute top-0 w-100 p-2 d-flex justify-content-between align-items-center" style="background: linear-gradient(to bottom, rgba(0,0,0,0.6), transparent);">
                                <span class="badge" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(5px);">Reels</span>
                                <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                            </div>

                            <div class="position-absolute top-50 start-50 translate-middle">
                                <i class="fa-solid fa-circle-play text-white" style="font-size: 3.5rem; filter: drop-shadow(0 4px 10px rgba(0,0,0,0.5)); opacity: 0.9;"></i>
                            </div>
                            
                            <div class="position-absolute bottom-0 start-0 p-3 w-100" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                                <p class="text-white small fw-bold mb-1">POV: Kamu Ibadah di DOT! 🙌🔥</p>
                                <p class="text-secondary mb-0" style="font-size: 0.70rem;">#dotteens #gbisawangan #youth</p>
                                <div class="d-flex align-items-center gap-2 mt-2">
                                    <i class="fa-solid fa-music text-white" style="font-size: 0.6rem;"></i>
                                    <marquee scrollamount="3" class="text-white" style="font-size: 0.65rem;">Original Sound - DOT Teens Praise & Worship</marquee>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="faq" class="container">
        <div class="row g-5 align-items-center mb-5 pb-5">
            <div class="col-lg-6" data-aos="fade-up">
                <h3 class="fw-bold mb-4">Waktu & <span class="text-gradient">Lokasi Ibadah</span></h3>
                <div class="glass-card mb-4">
                    <div class="d-flex align-items-center gap-4">
                        <div class="fs-1 text-info"><i class="fa-solid fa-clock"></i></div>
                        <div>
                            <h4 class="fw-bold text-white mb-1">Ibadah Raya Teens</h4>
                            <p class="text-secondary mb-0">Setiap Minggu | DOT Room | Pukul 12.00 WIB</p>
                            <span class="badge bg-success mt-2">Terbuka Untuk Umum</span>
                        </div>
                    </div>
                </div>
                <p class="text-secondary mb-2"><i class="fa-solid fa-building me-2"></i> <strong>GBI ERC Sawangan</strong></p>
                <p class="text-secondary small">Jl. Raya Muchtar, Sawangan Baru, Kec. Sawangan, Kota Depok, Jawa Barat.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="glass-card p-2" style="border-radius: 20px; overflow: hidden;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9078405950004!2d106.74111851139088!3d-6.405873162625553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e895a4248df7%3A0x2c11ce4bbad8f048!2sGbi%20Sawangan!5e0!3m2!1sid!2sid!4v1775558282012!5m2!1sid!2sid"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"   referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-5 pt-3">
            <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right">
                <h2 class="fw-bold mb-3">Pertanyaan <br><span class="text-gradient">Paling Sering</span></h2>
                <p class="text-secondary">Baru pertama kali mau datang? Jangan ragu, ini jawaban untuk beberapa pertanyaanmu.</p>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item"><h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Pakai baju apa kalau ibadah Teens?</button></h2><div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion"><div class="accordion-body small">Bebas, rapi, dan sopan! Kebanyakan dari kami pakai kaos casual, kemeja flannel, atau hoodie dengan celana jeans. Be comfortable!</div></div></div>
                    <div class="accordion-item"><h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Kalau datang sendirian gimana? Canggung nggak?</button></h2><div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body small">Tenang aja! Tim penyambut tamu (Usher) kami akan langsung menemani kamu cari tempat duduk dan mengenalkan ke teman-teman sebaya. Kamu bisa hubungi WA di bawah ini sebelum datang!</div></div></div>
                    <div class="accordion-item"><h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Batas usia Teens di DOT itu berapa?</button></h2><div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body small">Ibadah ini dikhususkan untuk anak usia SMP hingga SMA (sekitar 13 - 18 Tahun). Tapi kita sangat *welcoming*!</div></div></div>
                </div>
            </div>
        </div>
    </section>

    <section id="join" class="py-5 position-relative" style="background: transparent;">
        <div class="container py-5">
            <div class="row justify-content-center">
                
                <div class="col-lg-8 text-center mb-5" data-aos="fade-up">
                    <span class="badge text-uppercase px-3 py-2 rounded-pill mb-2" style="background: rgba(96, 165, 250, 0.1); color: #60A5FA; border: 1px solid rgba(96, 165, 250, 0.5);">Join the Family</span>
                    <h2 class="fw-bold text-white mb-3">Jadilah Bagian dari <span class="text-gradient-animated">Keluarga Kami!</span> 🚀</h2>
                    <p class="text-secondary">Isi form di bawah ini dan mari bertumbuh bersama di DOT Teens.</p>
                    
                    @if(session('join_success'))
                        <div class="alert alert-success d-inline-block rounded-pill px-4 mt-3 border-0 shadow" data-aos="zoom-in" style="background: rgba(16, 185, 129, 0.2)!important; color:#10B981!important;">
                            <i class="fa-solid fa-party-horn me-2"></i>{{ session('join_success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger d-inline-block rounded-pill px-4 mt-3 border-0 shadow" data-aos="zoom-in" style="background: rgba(239, 68, 68, 0.2)!important; color:#EF4444!important;">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    
                    @if($isJoinFormActive == '1')
                        <div class="glass-card p-4 p-md-5 rounded-5 shadow-lg" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); transition: 0.4s;">
                            <form action="{{ route('join.submit') }}" method="POST">
                                @csrf
                                <div class="row g-4 text-start">
                                    <h6 class="text-info fw-bold border-bottom border-secondary pb-2 mb-0">A. Data Pribadi</h6>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Nama Lengkap *</label>
                                        <input type="text" name="name" class="form-control rounded-3 bg-dark text-white border-secondary" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">No. WhatsApp *</label>
                                        <input type="number" name="phone_number" class="form-control rounded-3 bg-dark text-white border-secondary" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Tanggal Lahir *</label>
                                        <input type="date" name="birth_date" class="form-control rounded-3 bg-dark text-white border-secondary" style="color-scheme: dark;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Email</label>
                                        <input type="email" name="email" class="form-control rounded-3 bg-dark text-white border-secondary">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Instagram (@username)</label>
                                        <input type="text" name="instagram" class="form-control rounded-3 bg-dark text-white border-secondary">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Hobi</label>
                                        <input type="text" name="hobby" class="form-control rounded-3 bg-dark text-white border-secondary">
                                    </div>
                                    <div class="col-12">
                                        <label class="text-secondary small fw-bold mb-1">Alamat Lengkap *</label>
                                        <textarea name="address" rows="2" class="form-control rounded-3 bg-dark text-white border-secondary" required></textarea>
                                    </div>

                                    <h6 class="text-warning fw-bold border-bottom border-secondary pb-2 mb-0 mt-4">B. Data Tambahan</h6>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Nama Orang Tua</label>
                                        <input type="text" name="parent_name" class="form-control rounded-3 bg-dark text-white border-secondary">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">No. Telp Orang Tua</label>
                                        <input type="number" name="parent_phone" class="form-control rounded-3 bg-dark text-white border-secondary">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Asal Sekolah</label>
                                        <input type="text" name="school" class="form-control rounded-3 bg-dark text-white border-secondary">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-secondary small fw-bold mb-1">Sudah tergabung di Fire Cell?</label>
                                        <input type="text" name="fire_cell" class="form-control rounded-3 bg-dark text-white border-secondary" placeholder="Kosongkan jika belum ada">
                                    </div>

                                    <div class="col-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-lg w-100 rounded-pill fw-bold py-3 shadow-lg fs-5 text-white btn-kirim-doa" style="background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; transition: 0.3s;">
                                            <i class="fa-solid fa-user-plus me-2"></i> Submit & Join DOT!
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="glass-card text-center p-5 rounded-5 shadow-lg" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(245, 158, 11, 0.3);">
                            <i class="fa-solid fa-lock fs-1 text-warning mb-4" style="filter: drop-shadow(0 0 15px rgba(245,158,11,0.5));"></i>
                            <h3 class="fw-bold text-white mb-2">Pendaftaran Sedang Ditutup</h3>
                            <p class="text-secondary mb-0">Maaf, form pendaftaran DOT Teens saat ini sedang dikunci oleh Admin. Silakan hubungi kami via WhatsApp atau Instagram untuk info lebih lanjut.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <section class="py-5 position-relative overflow-hidden" style="background: transparent;"> 
    <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: rgba(139, 92, 246, 0.1); filter: blur(100px); top: -100px; left: -100px; z-index: 0;"></div>
    
    <div class="container py-5 text-center position-relative" style="z-index: 1;">
        
        @if(session('prayer_success'))
            <div class="alert alert-success d-inline-block rounded-pill px-4 mb-4 border-0 shadow" data-aos="zoom-in" style="background: rgba(16, 185, 129, 0.2)!important; color:#10B981!important;">
                <i class="fa-solid fa-check-circle me-2"></i>{{ session('prayer_success') }}
            </div>
        @endif

        <div class="glass-card prayer-board-card mx-auto p-5 rounded-5 shadow-lg border-secondary" style="max-width: 800px; background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); transition: 0.4s;" data-aos="fade-up">
            
            <h2 class="fw-bold text-white mb-3">Butuh <span class="text-gradient-animated">Dukungan Doa?</span> 🙏</h2>
            <p class="text-secondary mb-4 mx-auto" style="max-width: 600px; line-height: 1.7;">
                Kami percaya ada kuasa di dalam doa yang dinaikkan bersama. Jangan menanggung bebanmu sendirian, biarkan kami berdiri bersamamu dalam doa.
            </p>
            
            <div data-aos="zoom-in" data-aos-delay="200">
                <button class="btn btn-lg rounded-pill px-5 fw-bold text-white shadow-lg btn-kirim-doa" 
                        style="background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; transition: 0.3s;"
                        data-bs-toggle="modal" data-bs-target="#modalDoa">
                    <i class="fa-solid fa-paper-plane me-2"></i>Kirim Pokok Doa
                </button>
            </div>
        </div>
    </div>
    </section>

    <div class="modal fade" id="modalDoa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-secondary rounded-5 shadow-lg" style="background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title text-white fw-bold"><i class="fa-solid fa-hands-praying me-2 text-warning"></i>Kirim Pergumulan Anda</h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('prayer.submit') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-4">
                        <div class="mb-3 p-3 rounded-4" style="background: rgba(96, 165, 250, 0.05); border-left: 3px solid #60A5FA;">
                            <p class="text-secondary small mb-0" style="line-height: 1.6;"><i class="fa-solid fa-info-circle me-1 text-info"></i> Pokok doa Anda akan dijaga kerahasiaannya dan hanya dilihat oleh Tim Prayer DOT.</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-secondary small fw-bold mb-1">Nama (Opsional / Kosongkan jika ingin Anonim)</label>
                            <input type="text" name="name" class="form-control rounded-3 bg-dark text-white border-secondary" placeholder="Nama Anda...">
                        </div>
                        <div class="mb-3">
                            <label class="text-secondary small fw-bold mb-1">Pokok Doa / Pergumulan</label>
                            <textarea name="topic" rows="4" class="form-control rounded-3 bg-dark text-white border-secondary" placeholder="Ceritakan apa yang ingin didoakan..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 pb-4 px-4">
                        <button type="submit" class="btn btn-gradient w-100 rounded-pill fw-bold py-2 shadow"><i class="fa-solid fa-check me-2"></i>Kirim ke Tim Doa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="https://wa.me/6285173280626?text=Halo%20kak,%20aku%20jemaat%20baru%20mau%20tanya%20jadwal%20ibadah%20Teens%20DOT!" target="_blank" class="floating-wa">        
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <a href="/admin" style="position: fixed; bottom: 0; right: 0; width: 40px; height: 40px; opacity: 0; z-index: 9999;">Admin</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, offset: 100 });

        // --- SCRIPT SCROLLSPY ---
        document.addEventListener("DOMContentLoaded", function() {
            const sections = document.querySelectorAll("header, section");
            const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

            window.addEventListener("scroll", () => {
                let current = "";
                sections.forEach((section) => {
                    const sectionTop = section.offsetTop;
                    if (section.getAttribute("id") && pageYOffset >= (sectionTop - 300)) {
                        current = section.getAttribute("id");
                    }
                });

                navLinks.forEach((link) => {
                    link.classList.remove("active");
                    const href = link.getAttribute("href");
                    if (href.startsWith("#") && href === "#" + current) {
                        link.classList.add("active");
                    }
                });
            });
        });
    </script>

    <footer class="text-center py-4 mt-5" style="border-top: 1px solid rgba(255,255,255,0.05);">
        <p class="small mb-0">
            <a href="/login" class="text-secondary" style="text-decoration: none; cursor: default;">
                © 2026 Department Teens GBI Sawangan.
            </a>
        </p>
    </footer>
</body>
</html>