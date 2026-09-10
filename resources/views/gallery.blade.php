<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto & Dokumentasi - DOT Teens GBI ERC Sawangan</title>
    
    <meta name="description" content="Kumpulan dokumentasi keseruan ibadah, persekutuan, fellowship, dan momen berharga anak muda DRP Outstanding Teens (DOT) GBI ERC Sawangan.">
    <meta name="keywords" content="Galeri DOT Sawangan, Foto DOT Sawangan, Youth Sawangan, Pemuda Kristen Sawangan, Ibadah Youth Sawangan, GBI ERC Sawangan, Cool Teens">
    <meta name="author" content="DOT Teens Sawangan">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dotsawangan.com/gallery">
    <meta property="og:title" content="Galeri Foto & Dokumentasi - DOT Teens GBI ERC Sawangan">
    <meta property="og:description" content="Kumpulan dokumentasi keseruan ibadah, persekutuan, fellowship, dan momen berharga keluarga besar DOT Sawangan.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    
    <meta name="theme-color" content="#0A1628">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap & FontAwesome & AOS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --navy-deep: #0A1628;
            --navy-surface: #0E1E36;
            --navy-card: #12233F;
            --navy-card-hover: #172D50;
            --navy-input: #0B182B;
            --navy-border: rgba(56, 189, 248, 0.18);
            --navy-border-hover: rgba(56, 189, 248, 0.5);
            --cyan-electric: #38BDF8;
            --cyan-glow: rgba(56, 189, 248, 0.25);
            --blue-royal: #2563EB;
            --blue-light: #60A5FA;
            --amber-gold: #F59E0B;
            --emerald-vibrant: #10B981;
            --text-white: #FFFFFF;
            --text-ice: #E2E8F0;
            --text-muted: #94A3B8;
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        html, body {
            max-width: 100vw;
            width: 100%;
            overflow-x: hidden !important;
            margin: 0;
            padding: 0;
            position: relative;
            background-color: var(--navy-deep);
            color: var(--text-ice);
            font-family: var(--font-body);
        }

        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: var(--font-heading);
            color: var(--text-white);
            letter-spacing: -0.02em;
        }

        p {
            color: #CBD5E1;
        }

        .text-muted, .text-secondary {
            color: #94A3B8 !important;
        }
        .text-white {
            color: #FFFFFF !important;
        }
        .text-ice {
            color: #E2E8F0 !important;
        }

        /* VIBRANT GRADIENT TEXTS */
        .text-gradient-cyan {
            background: linear-gradient(135deg, #38BDF8 0%, #60A5FA 50%, #93C5FD 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* BACKGROUND GLOW ACCENTS */
        .ambient-bg {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .ambient-glow-1 {
            position: absolute;
            top: -100px;
            left: 20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.12) 0%, transparent 70%);
            filter: blur(80px);
        }

        .ambient-glow-2 {
            position: absolute;
            top: 40%;
            right: -100px;
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.12) 0%, transparent 70%);
            filter: blur(90px);
        }

        /* NAVBAR (FROSTED NAVY GLASS) */
        .navbar-custom {
            background: rgba(10, 22, 40, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--navy-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
            z-index: 1050;
        }

        .navbar-logo {
            height: 56px;
            object-fit: contain;
            transition: transform 0.25s ease;
        }

        .navbar-logo:hover {
            transform: scale(1.05);
        }

        .navbar-nav .nav-link {
            color: #E2E8F0 !important;
            font-weight: 600;
            font-size: 0.94rem;
            padding: 8px 16px !important;
            border-radius: 9999px;
            transition: all 0.2s ease;
            opacity: 0.9;
        }

        .navbar-nav .nav-link:hover {
            opacity: 1;
            color: var(--cyan-electric) !important;
            background: rgba(56, 189, 248, 0.10);
        }

        .navbar-nav .nav-link.active {
            opacity: 1;
            color: #FFFFFF !important;
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.4), rgba(37, 99, 235, 0.5));
            border: 1px solid rgba(56, 189, 248, 0.3);
            font-weight: 700;
            box-shadow: 0 2px 10px rgba(56, 189, 248, 0.15);
        }

        /* BUTTONS */
        .btn-cyan-pill {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            padding: 11px 28px;
            border-radius: 9999px;
            border: none;
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.35);
            transition: all 0.25s cubic-bezier(0.2, 0.8, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-cyan-pill:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(56, 189, 248, 0.45);
            color: #FFFFFF !important;
        }

        .btn-outline-cyan {
            background: rgba(18, 35, 63, 0.5);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: var(--cyan-electric) !important;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 9999px;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-outline-cyan:hover {
            background: rgba(56, 189, 248, 0.15);
            border-color: var(--cyan-electric);
            color: #FFFFFF !important;
            transform: translateY(-2px);
        }

        .btn-glass-pill {
            background: rgba(18, 35, 63, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: #FFFFFF !important;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 9999px;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-glass-pill:hover {
            background: rgba(30, 58, 95, 0.9);
            border-color: var(--cyan-electric);
            transform: translateY(-2px);
            color: #FFFFFF !important;
        }

        /* PILL BADGES */
        .pill-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 9999px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .pill-badge-cyan {
            background: rgba(56, 189, 248, 0.12);
            color: var(--cyan-electric);
            border: 1px solid rgba(56, 189, 248, 0.3);
        }

        /* HERO HEADER SECTION */
        .gallery-hero {
            padding-top: 155px;
            padding-bottom: 50px;
            position: relative;
            z-index: 1;
        }

        /* SEARCH & FILTER BAR */
        .gallery-toolbar {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 20px;
            padding: 16px 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-bottom: 45px;
        }

        .search-input-wrapper {
            position: relative;
            width: 100%;
        }

        .search-input-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--cyan-electric);
            font-size: 1rem;
        }

        .gallery-search-input {
            width: 100%;
            background: var(--navy-input);
            border: 1px solid var(--navy-border);
            border-radius: 9999px;
            padding: 11px 20px 11px 46px;
            color: #FFFFFF;
            font-size: 0.95rem;
            transition: all 0.25s ease;
        }

        .gallery-search-input:focus {
            outline: none;
            border-color: var(--cyan-electric);
            box-shadow: 0 0 0 3px var(--cyan-glow);
            background: #10213B;
            color: #FFFFFF;
        }

        .gallery-search-input::placeholder {
            color: #64748B;
        }

        /* MODERN GALLERY CARD */
        .gallery-card-modern {
            position: relative;
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.35s, border-color 0.35s;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .gallery-card-modern:hover {
            transform: translateY(-6px);
            border-color: var(--cyan-electric);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5), 0 0 25px rgba(56, 189, 248, 0.2);
        }

        .gallery-img-container {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
            background: #091322;
        }

        .gallery-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card-modern:hover .gallery-img-container img {
            transform: scale(1.07);
        }

        /* HOVER OVERLAY */
        .gallery-overlay-badge {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 22, 40, 0.95) 0%, rgba(10, 22, 40, 0.3) 50%, transparent 100%);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }

        .gallery-card-modern:hover .gallery-overlay-badge {
            opacity: 1;
        }

        .expand-circle-btn {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(56, 189, 248, 0.25);
            backdrop-filter: blur(8px);
            border: 1px solid var(--cyan-electric);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 1.2rem;
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.4);
            transform: scale(0.85);
            transition: transform 0.3s ease;
        }

        .gallery-card-modern:hover .expand-circle-btn {
            transform: scale(1);
        }

        /* CARD CONTENT FOOTER */
        .gallery-card-info {
            padding: 20px 22px;
            background: var(--navy-card);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .gallery-card-title {
            font-size: 1.12rem;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .gallery-card-meta {
            font-size: 0.84rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 6px;
        }

        /* FLOATING BADGES OVER PHOTO */
        .photo-date-chip {
            position: absolute;
            bottom: 12px;
            right: 12px;
            background: rgba(10, 22, 40, 0.85);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #E2E8F0;
            font-size: 0.76rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 9999px;
            z-index: 2;
        }

        .photo-drive-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(2, 132, 199, 0.85);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(56, 189, 248, 0.4);
            color: #FFFFFF;
            font-size: 0.74rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 9999px;
            z-index: 2;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* LIGHTBOX MODAL */
        .modal-lightbox-content {
            background: #0A1628;
            border: 1px solid var(--navy-border-hover);
            border-radius: 28px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.9), 0 0 50px rgba(56, 189, 248, 0.18);
            overflow: hidden;
        }

        .lightbox-img-wrapper {
            position: relative;
            background: #060D18;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 280px;
            max-height: 72vh;
        }

        .lightbox-img-wrapper img {
            max-width: 100%;
            max-height: 72vh;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: opacity 0.25s ease;
        }

        /* NAV ARROWS IN LIGHTBOX */
        .lightbox-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(14, 30, 54, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid var(--navy-border);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.25s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        .lightbox-nav-btn:hover {
            background: var(--cyan-electric);
            color: #0A1628;
            border-color: var(--cyan-electric);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.6);
            transform: translateY(-50%) scale(1.1);
        }

        .lightbox-nav-btn.prev {
            left: 14px;
        }

        .lightbox-nav-btn.next {
            right: 14px;
        }

        /* FOOTER */
        footer {
            background: #070F1C;
            border-top: 1px solid var(--navy-border);
            padding: 80px 0 35px 0;
            position: relative;
            z-index: 1;
            margin-top: 80px;
        }

        .footer-heading {
            color: var(--text-white);
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 0.02em;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.92rem;
            transition: color 0.2s ease, padding-left 0.2s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--cyan-electric);
            padding-left: 5px;
        }

        /* FLOATING ACTION BUTTONS */
        .floating-wa {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            z-index: 999;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .floating-wa:hover {
            transform: scale(1.1) translateY(-3px);
            color: white;
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
        }

        .back-to-top {
            position: fixed;
            bottom: 100px;
            right: 34px;
            background: rgba(14, 30, 54, 0.9);
            border: 1px solid var(--navy-border);
            color: var(--cyan-electric);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--cyan-electric);
            color: #0A1628;
            transform: translateY(-4px);
        }
    </style>
</head>
<body>

    <!-- AMBIENT BACKGROUND GLOW -->
    <div class="ambient-bg">
        <div class="ambient-glow-1"></div>
        <div class="ambient-glow-2"></div>
    </div>

    <!-- NAVBAR (FROSTED NAVY GLASS) -->
    <nav id="navbarMain" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-3">
        <div class="container px-3 px-md-4">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="DOT Teens" class="navbar-logo">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 shadow-none px-2 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-2 text-white"></i>
            </button>

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-1 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#devotion">Devotion</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#events">Acara</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#cells">Cell Group</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/gallery">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#prayer">Doa</a></li>

                    @auth
                        <li class="nav-item mt-2 mt-lg-0 ms-lg-2">
                            <a class="btn btn-cyan-pill btn-sm rounded-pill px-3" href="/admin/dashboard">
                                <i class="fa-solid fa-gauge-high me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mt-2 mt-lg-0">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Logout">
                                    <i class="fa-solid fa-power-off"></i>
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item mt-3 mt-lg-0 ms-lg-2">
                            <a class="btn btn-cyan-pill rounded-pill px-4 py-2" href="/#join">
                                Gabung Sekarang
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECTION: HERO HEADER -->
    <section class="gallery-hero">
        <div class="container text-center">
            <div data-aos="fade-down">
                <span class="pill-badge pill-badge-cyan mb-3">
                    <i class="fa-solid fa-camera-retro me-1"></i> DOKUMENTASI & MEMORIES &bull; DOT TEENS
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    Galeri Foto & <span class="text-gradient-cyan">Momen Berharga</span>
                </h1>

                <p class="lead text-ice mx-auto mb-4" style="max-width: 680px; font-size: 1.05rem; line-height: 1.8;">
                    Setiap senyuman, persekutuan, pujian penyembahan, dan keseruan generasi muda DOT Sawangan terekam di sini. Temukan momen serumu dan mari bertumbuh bersama!
                </p>
            </div>

            <!-- SEARCH & TOOLBAR -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-toolbar d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                        <div class="search-input-wrapper flex-grow-1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="gallerySearch" class="gallery-search-input" placeholder="Cari foto berdasarkan nama kegiatan / momen..." autocomplete="off">
                        </div>

                        <div class="d-flex align-items-center gap-2 text-nowrap">
                            <span class="badge rounded-pill px-3 py-2" style="background: rgba(56, 189, 248, 0.12); color: var(--cyan-electric); border: 1px solid rgba(56, 189, 248, 0.25); font-size: 0.85rem;">
                                <i class="fa-solid fa-images me-1"></i>
                                <span id="galleryCountDisplay">{{ count($galleries) }}</span> Foto
                            </span>
                            <a href="/#home" class="btn btn-sm btn-outline-cyan rounded-pill px-3 py-2">
                                <i class="fa-solid fa-arrow-left me-1"></i> Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: GALLERY GRID -->
    <main class="container pb-5" style="position: relative; z-index: 1;">
        <div class="row g-4" id="galleryGrid">
            @forelse($galleries as $index => $gal)
                @php
                    $imageSource = \Illuminate\Support\Str::startsWith($gal->image, ['http://', 'https://']) 
                                    ? $gal->image 
                                    : asset('uploads/gallery/' . $gal->image);
                    $dateFormatted = date('d M Y', strtotime($gal->created_at));
                @endphp

                <div class="col-sm-6 col-lg-4 gallery-col-item" 
                     data-title="{{ strtolower($gal->title) }}" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ min(($index % 6) * 80, 400) }}">
                    
                    <div class="gallery-card-modern" 
                         onclick="openGalleryLightbox({{ $index }})"
                         role="button"
                         tabindex="0"
                         aria-label="Lihat foto {{ $gal->title }}">
                        
                        <div class="gallery-img-container">
                            <img src="{{ $imageSource }}" alt="{{ $gal->title }}" loading="lazy">
                            
                            @if(!empty($gal->drive_link))
                                <div class="photo-drive-badge">
                                    <i class="fa-brands fa-google-drive me-1"></i> Full Album
                                </div>
                            @endif

                            <div class="photo-date-chip">
                                <i class="fa-regular fa-calendar me-1"></i> {{ $dateFormatted }}
                            </div>

                            <div class="gallery-overlay-badge">
                                <div class="expand-circle-btn">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                </div>
                            </div>
                        </div>

                        <div class="gallery-card-info">
                            <h5 class="gallery-card-title text-truncate">{{ $gal->title }}</h5>
                            <div class="gallery-card-meta">
                                <span class="small" style="color: var(--cyan-electric);">
                                    <i class="fa-regular fa-eye me-1"></i> Klik untuk melihat
                                </span>
                                @if(!empty($gal->drive_link))
                                    <span class="badge bg-primary bg-opacity-25 text-info border border-info border-opacity-25 rounded-pill px-2.5 py-1" style="font-size: 11px;">
                                        Google Drive
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="p-5 rounded-4 mx-auto" style="background: var(--navy-card); border: 1px dashed var(--navy-border); max-width: 550px;">
                        <i class="fa-solid fa-camera-retro fs-1 mb-3" style="color: var(--cyan-electric);"></i>
                        <h4 class="fw-bold text-white mb-2">Belum Ada Foto</h4>
                        <p class="text-muted mb-4">Dokumentasi keseruan acara DOT akan segera diunggah oleh pengurus. Pantau terus ya!</p>
                        <a href="/#home" class="btn btn-cyan-pill px-4">
                            <i class="fa-solid fa-house me-1"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- NOT FOUND SEARCH STATE -->
        <div id="noMatchAlert" class="text-center py-5 d-none">
            <div class="p-5 rounded-4 mx-auto" style="background: var(--navy-card); border: 1px solid var(--navy-border); max-width: 480px;">
                <i class="fa-solid fa-magnifying-glass fs-2 text-muted mb-3"></i>
                <h5 class="fw-bold text-white mb-1">Foto Tidak Ditemukan</h5>
                <p class="text-muted small mb-3">Tidak ada foto kegiatan yang cocok dengan kata kunci yang kamu cari.</p>
                <button type="button" class="btn btn-outline-cyan btn-sm rounded-pill px-3" onclick="resetGallerySearch()">
                    Reset Pencarian
                </button>
            </div>
        </div>
    </main>

    <!-- MODERN INTERACTIVE LIGHTBOX MODAL -->
    <div class="modal fade" id="galleryLightboxModal" tabindex="-1" aria-hidden="true" style="z-index: 1070;">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content modal-lightbox-content border-0">
                
                <!-- LIGHTBOX HEADER -->
                <div class="modal-header border-0 pb-0 pt-3 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="badge rounded-pill px-3 py-1.5" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric); border: 1px solid rgba(56, 189, 248, 0.3); font-size: 12px;">
                            <i class="fa-regular fa-image me-1"></i> <span id="lbCounter">Foto 1 dari 1</span>
                        </span>
                        <span id="lbDate" class="small text-muted"></span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a id="lbRawLink" href="#" target="_blank" class="btn btn-sm btn-outline-secondary text-light rounded-pill px-3 py-1" title="Buka Gambar Asli">
                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Ukuran Penuh
                        </a>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <!-- LIGHTBOX BODY WITH ARROWS -->
                <div class="modal-body p-3 p-md-4 position-relative">
                    <button type="button" class="lightbox-nav-btn prev" onclick="prevPhoto()" aria-label="Foto Sebelumnya">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <div class="lightbox-img-wrapper">
                        <img id="lbImage" src="" alt="Galeri DOT" class="img-fluid">
                    </div>

                    <button type="button" class="lightbox-nav-btn next" onclick="nextPhoto()" aria-label="Foto Selanjutnya">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

                <!-- LIGHTBOX FOOTER -->
                <div class="modal-footer border-0 pt-0 pb-4 px-4 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                    <div class="text-center text-sm-start flex-grow-1">
                        <h4 id="lbTitle" class="fw-bold text-white mb-1"></h4>
                        <p class="small text-muted mb-0">DRP Outstanding Teens (DOT) GBI ERC Sawangan</p>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a id="lbDriveBtn" href="#" target="_blank" class="btn btn-cyan-pill rounded-pill px-4 py-2 small d-none">
                            <i class="fa-brands fa-google-drive me-1"></i> Buka Full Album Drive
                        </a>
                        <button type="button" class="btn btn-outline-secondary text-light rounded-pill px-4 py-2 small" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FOOTER LENGKAP KONSISTEN DENGAN WEBSITE UTAMA -->
    <footer>
        <div class="container">
            <div class="row g-5 pb-5">
                <div class="col-lg-4 col-md-6">
                    <img src="{{ asset('images/logo.png') }}" alt="DOT Teens" class="mb-3" style="height: 65px; object-fit: contain;">
                    <p class="text-muted small mb-4" style="line-height: 1.8;">
                        <strong class="text-white">DRP Outstanding Teens (DOT) GBI ERC Sawangan</strong> adalah wadah ibadah, komunitas sel, dan keluarga rohani bagi anak-anak usia SMP hingga SMA untuk bertumbuh dan bersinar bagi Kristus.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="https://instagram.com/dot_teens" target="_blank" class="btn btn-sm btn-outline-cyan rounded-circle" style="width: 38px; height: 38px; padding: 0;" title="Instagram">
                            <i class="fa-brands fa-instagram text-danger"></i>
                        </a>
                        <a href="https://tiktok.com/@dot_teens" target="_blank" class="btn btn-sm btn-outline-cyan rounded-circle" style="width: 38px; height: 38px; padding: 0;" title="TikTok">
                            <i class="fa-brands fa-tiktok text-light"></i>
                        </a>
                        <a href="https://wa.me/6285173280626" target="_blank" class="btn btn-sm btn-outline-cyan rounded-circle" style="width: 38px; height: 38px; padding: 0;" title="WhatsApp">
                            <i class="fa-brands fa-whatsapp text-success"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="footer-heading">Navigasi</h6>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/#about">Tentang DOT</a></li>
                        <li><a href="/#devotion">Morning Devotion</a></li>
                        <li><a href="/#events">Kegiatan</a></li>
                        <li><a href="/#cells">Cell Group</a></li>
                        <li><a href="/gallery">Galeri Foto</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <h6 class="footer-heading">Jadwal Ibadah</h6>
                    <ul class="footer-links">
                        <li>
                            <strong class="text-white d-block">Ibadah Raya Teens</strong>
                            <span class="small text-muted">Setiap Minggu | 12.00 WIB</span>
                        </li>
                        <li class="mt-2">
                            <strong class="text-white d-block">Morning Devotion</strong>
                            <span class="small text-muted">Senin, Rabu, Jumat | 04.30 WIB</span>
                        </li>
                        <li class="mt-2">
                            <strong class="text-white d-block">Lokasi</strong>
                            <span class="small text-muted">GBI Sawangan, Jl. Raya Muchtar</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-heading">Akses Pengurus</h6>
                    <p class="text-muted small mb-3">
                        Halaman khusus untuk pengurus dan tim pelayan DOT Sawangan.
                    </p>
                    
                    @auth
                        <a href="/admin/dashboard" class="btn btn-cyan-pill rounded-pill px-4 py-2 small fw-bold">
                            <i class="fa-solid fa-gauge-high me-1"></i> Buka Dashboard
                        </a>
                    @else
                        <a href="/login" class="btn btn-outline-cyan rounded-pill px-4 py-2 small fw-bold">
                            <i class="fa-solid fa-lock me-2"></i> Login Admin
                        </a>
                    @endauth
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-4 gap-2 border-top border-secondary border-opacity-10">
                <p class="small text-muted mb-0">
                    &copy; {{ date('Y') }} <strong class="text-white">DRP Outstanding Teens (DOT)</strong> &bull; GBI ERC Sawangan. All rights reserved.
                </p>
                <div class="small text-muted">
                    Fun Disciples, Fun Community ✨
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP -->
    <a href="https://wa.me/6285173280626?text=Halo%20Kak%20pengurus%20DOT,%20saya%20mau%20tanya%20seputar%20kegiatan%20DOT" target="_blank" class="floating-wa" title="Hubungi Admin di WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- BACK TO TOP BUTTON -->
    <a href="#" class="back-to-top" id="backToTop" title="Kembali ke atas">
        <i class="fa-solid fa-chevron-up"></i>
    </a>

    <!-- BOOTSTRAP & AOS SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            once: true,
            offset: 60,
            duration: 700,
            easing: 'ease-out-cubic'
        });

        // DATA GALERI UNTUK LIGHTBOX DINAMIS
        const galleryItems = [
            @foreach($galleries as $gal)
                @php
                    $imgSrc = \Illuminate\Support\Str::startsWith($gal->image, ['http://', 'https://']) 
                                ? $gal->image 
                                : asset('uploads/gallery/' . $gal->image);
                @endphp
                {
                    id: {{ $gal->id }},
                    title: {!! json_encode($gal->title) !!},
                    src: {!! json_encode($imgSrc) !!},
                    date: {!! json_encode(date('d F Y', strtotime($gal->created_at))) !!},
                    drive: {!! json_encode($gal->drive_link) !!}
                },
            @endforeach
        ];

        let currentPhotoIndex = 0;
        let lightboxModalInstance = null;

        document.addEventListener('DOMContentLoaded', function() {
            const modalEl = document.getElementById('galleryLightboxModal');
            if (modalEl) {
                lightboxModalInstance = new bootstrap.Modal(modalEl);
            }

            // Keyboard navigation di Lightbox
            document.addEventListener('keydown', function(e) {
                const modal = document.getElementById('galleryLightboxModal');
                if (modal && modal.classList.contains('show')) {
                    if (e.key === 'ArrowLeft') {
                        prevPhoto();
                    } else if (e.key === 'ArrowRight') {
                        nextPhoto();
                    }
                }
            });

            // Back to Top button listener
            const backToTopBtn = document.getElementById('backToTop');
            window.addEventListener('scroll', function() {
                if (backToTopBtn) {
                    if (window.scrollY > 300) {
                        backToTopBtn.classList.add('show');
                    } else {
                        backToTopBtn.classList.remove('show');
                    }
                }
            });

            // Live Search Filter
            const searchInput = document.getElementById('gallerySearch');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.trim().toLowerCase();
                    const items = document.querySelectorAll('.gallery-col-item');
                    let visibleCount = 0;

                    items.forEach(item => {
                        const title = item.getAttribute('data-title') || '';
                        if (title.includes(query)) {
                            item.style.display = '';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    const counterEl = document.getElementById('galleryCountDisplay');
                    if (counterEl) counterEl.textContent = visibleCount;

                    const noMatchAlert = document.getElementById('noMatchAlert');
                    if (noMatchAlert) {
                        if (visibleCount === 0 && items.length > 0) {
                            noMatchAlert.classList.remove('d-none');
                        } else {
                            noMatchAlert.classList.add('d-none');
                        }
                    }
                });
            }
        });

        function openGalleryLightbox(index) {
            if (!galleryItems || galleryItems.length === 0) return;
            currentPhotoIndex = (index >= 0 && index < galleryItems.length) ? index : 0;
            renderLightboxPhoto();
            if (lightboxModalInstance) {
                lightboxModalInstance.show();
            }
        }

        function renderLightboxPhoto() {
            if (!galleryItems || galleryItems.length === 0) return;
            const photo = galleryItems[currentPhotoIndex];
            
            const imgEl = document.getElementById('lbImage');
            const titleEl = document.getElementById('lbTitle');
            const dateEl = document.getElementById('lbDate');
            const counterEl = document.getElementById('lbCounter');
            const rawLinkEl = document.getElementById('lbRawLink');
            const driveBtn = document.getElementById('lbDriveBtn');

            if (imgEl) {
                imgEl.style.opacity = '0.3';
                imgEl.src = photo.src;
                imgEl.onload = () => { imgEl.style.opacity = '1'; };
            }

            if (titleEl) titleEl.textContent = photo.title;
            if (dateEl) dateEl.innerHTML = '<i class="fa-regular fa-calendar me-1"></i> ' + photo.date;
            if (counterEl) counterEl.textContent = `Foto ${currentPhotoIndex + 1} dari ${galleryItems.length}`;
            if (rawLinkEl) rawLinkEl.href = photo.src;

            if (driveBtn) {
                if (photo.drive && photo.drive.trim().length > 0) {
                    driveBtn.href = photo.drive;
                    driveBtn.classList.remove('d-none');
                } else {
                    driveBtn.classList.add('d-none');
                    driveBtn.href = '#';
                }
            }
        }

        function prevPhoto() {
            if (galleryItems.length <= 1) return;
            currentPhotoIndex = (currentPhotoIndex - 1 + galleryItems.length) % galleryItems.length;
            renderLightboxPhoto();
        }

        function nextPhoto() {
            if (galleryItems.length <= 1) return;
            currentPhotoIndex = (currentPhotoIndex + 1) % galleryItems.length;
            renderLightboxPhoto();
        }

        function resetGallerySearch() {
            const searchInput = document.getElementById('gallerySearch');
            if (searchInput) {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
                searchInput.focus();
            }
        }
    </script>
</body>
</html>