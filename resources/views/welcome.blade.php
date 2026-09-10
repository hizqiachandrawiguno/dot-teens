<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT Teens | GBI ERC Sawangan - Fun Disciples, Fun Community</title>
    
    <meta name="description" content="Komunitas anak muda Department of Teens (DOT) GBI ERC Sawangan. Ibadah seru, 9 Cool group sebaya, teman suportif, dan ruang bertumbuh bareng Kristus!">
    <meta name="keywords" content="DOT Sawangan, Youth Sawangan, Pemuda Kristen Sawangan, Ibadah Youth Sawangan, GBI ERC Sawangan, Komunitas Pemuda, Cell DOT, Cool Teens">
    <meta name="author" content="DOT Teens Sawangan">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dotsawangan.com/">
    <meta property="og:title" content="DOT Teens | GBI ERC Sawangan - Fun Disciples, Fun Community">
    <meta property="og:description" content="Tempat nongkrong & bertumbuh paling asik buat anak muda SMP-SMA. Come as you are, you belong here!">
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

        /* GLOBAL TEXT CONTRAST & READABILITY */
        .text-muted, .text-secondary {
            color: #94A3B8 !important;
        }
        .text-dark {
            color: #FFFFFF !important;
        }
        .text-white {
            color: #FFFFFF !important;
        }
        .text-ice {
            color: #E2E8F0 !important;
        }
        .text-light {
            color: #F8FAFC !important;
        }
        label {
            color: #CBD5E1 !important;
        }
        select option {
            background-color: #0B182B !important;
            color: #FFFFFF !important;
        }

        /* VIBRANT GRADIENT TEXTS */
        .text-gradient-cyan {
            background: linear-gradient(135deg, #38BDF8 0%, #60A5FA 50%, #93C5FD 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-gold {
            background: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ONE-PAGE NAVBAR (FROSTED NAVY GLASS) */
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

        /* HERO SECTION (#home) */
        #home {
            background: radial-gradient(circle at 50% 25%, #13284A 0%, #0A1628 70%, #060D18 100%);
            padding-top: 175px;
            padding-bottom: 110px;
            position: relative;
            overflow: hidden;
        }

        #home::before {
            content: '';
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.08) 0%, rgba(37, 99, 235, 0.04) 50%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .hero-title {
            color: var(--text-white);
            font-weight: 800;
            line-height: 1.16;
            letter-spacing: -0.025em;
        }

        .hero-lead {
            color: var(--text-ice);
            font-size: 1.15rem;
            line-height: 1.8;
            max-width: 600px;
        }

        /* BUTTONS */
        .btn-cyan-pill {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            padding: 13px 32px;
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

        .btn-glass-pill {
            background: rgba(18, 35, 63, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: #FFFFFF !important;
            font-weight: 600;
            padding: 13px 28px;
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

        .btn-outline-cyan {
            background: rgba(18, 35, 63, 0.5);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: var(--cyan-electric) !important;
            font-weight: 600;
            padding: 12px 28px;
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

        .pill-badge-hero {
            background: rgba(56, 189, 248, 0.12);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: var(--cyan-electric);
        }

        .pill-badge-cyan {
            background: rgba(56, 189, 248, 0.12);
            color: var(--cyan-electric);
            border: 1px solid rgba(56, 189, 248, 0.3);
        }

        .pill-badge-gold {
            background: rgba(245, 158, 11, 0.12);
            color: #FBBF24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        /* SECTIONS SPACING & NAVY CARDS */
        section {
            padding: 130px 0;
            position: relative;
            z-index: 1;
        }

        .section-header {
            margin-bottom: 70px;
        }

        .navy-card {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.25);
            transition: transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.3s, border-color 0.3s;
            position: relative;
            z-index: 1;
        }

        .navy-card:hover {
            transform: translateY(-4px);
            border-color: var(--navy-border-hover);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.4), 0 0 25px rgba(56, 189, 248, 0.12);
        }

        /* HERO IMAGE */
        .hero-art-wrapper {
            position: relative;
            display: inline-block;
            max-width: 440px;
            width: 100%;
        }

        .hero-art-img {
            position: relative;
            z-index: 1;
            width: 100%;
            height: auto;
            max-width: 390px;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.6));
            transition: transform 0.3s ease;
        }

        .hero-art-img:hover {
            transform: scale(1.03);
        }

        /* STAT BAR */
        .stat-item {
            text-align: center;
            padding: 24px 16px;
        }

        .stat-number {
            font-family: var(--font-heading);
            font-size: 2.3rem;
            font-weight: 800;
            line-height: 1;
            color: var(--cyan-electric);
            margin-bottom: 6px;
        }

        /* TEAM AVATAR */
        .team-avatar-box {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(135deg, #0284C7, #38BDF8);
            margin: 0 auto 16px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.3);
        }

        .team-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            background: #0A1628;
        }

        /* CELL SCHEDULE CARD */
        .cell-schedule-card {
            background: rgba(14, 30, 54, 0.7);
            border: 1px solid var(--navy-border);
            border-left: 5px solid var(--cyan-electric);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 16px;
            transition: all 0.25s ease;
        }

        .cell-schedule-card:hover {
            background: rgba(18, 38, 68, 0.9);
            border-color: var(--cyan-electric);
            transform: translateX(4px);
        }

        /* CELL GROUP CHIP */
        .cell-group-chip {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 18px;
            padding: 20px;
            text-align: center;
            transition: all 0.25s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .cell-group-chip:hover {
            border-color: var(--cyan-electric);
            transform: translateY(-3px);
            background: var(--navy-card-hover);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* GALLERY CARDS */
        .gallery-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            aspect-ratio: 4/3;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            border: 1px solid var(--navy-border);
            cursor: pointer;
        }

        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.06);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 22, 40, 0.92) 0%, rgba(10, 22, 40, 0.3) 50%, transparent 100%);
            opacity: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 24px;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* ACCORDION (FAQ) */
        .accordion-item {
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            border-radius: 16px !important;
            margin-bottom: 14px;
            overflow: hidden;
        }

        .accordion-button {
            background: var(--navy-card);
            color: var(--text-white);
            font-weight: 700;
            font-size: 1.05rem;
            padding: 20px 24px;
            box-shadow: none !important;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(56, 189, 248, 0.08);
            color: var(--cyan-electric);
            border-bottom: 1px solid var(--navy-border);
        }

        .accordion-button::after {
            filter: invert(1) brightness(2);
        }

        .accordion-body {
            background: var(--navy-card);
            color: var(--text-muted);
            font-size: 0.96rem;
            line-height: 1.8;
            padding: 24px;
        }

        /* FORMS */
        .form-control-youth {
            background: var(--navy-input);
            border: 1px solid var(--navy-border);
            border-radius: 12px;
            padding: 12px 16px;
            color: #FFFFFF;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control-youth:focus {
            background: #122542;
            border-color: var(--cyan-electric);
            box-shadow: 0 0 0 3px var(--cyan-glow);
            color: #FFFFFF;
        }

        .form-control-youth::placeholder {
            color: #64748B;
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
            transform: scale(1.10);
            color: white;
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: var(--navy-card);
            border: 1px solid var(--navy-border);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            color: var(--cyan-electric);
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            z-index: 998;
            transition: all 0.25s ease;
            opacity: 0;
            pointer-events: none;
            text-decoration: none;
        }

        .back-to-top.show {
            opacity: 1;
            pointer-events: auto;
        }

        .back-to-top:hover {
            background: var(--cyan-electric);
            color: #0A1628;
            transform: translateY(-3px);
        }

        /* FOOTER */
        .site-footer {
            background: #060D18;
            border-top: 1px solid var(--navy-border);
            padding-top: 85px;
            padding-bottom: 35px;
            position: relative;
            z-index: 1;
        }

        .footer-heading {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-white);
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.2s ease, transform 0.2s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--cyan-electric);
            transform: translateX(4px);
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                background: #0D1C33;
                border: 1px solid var(--navy-border);
                border-radius: 20px;
                padding: 20px;
                margin-top: 15px;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            }
        }

        @media (max-width: 768px) {
            section {
                padding: 85px 0;
            }
            .section-header {
                margin-bottom: 45px;
            }
            .navy-card {
                padding: 24px;
            }
            .navbar-logo {
                height: 48px;
            }
            .stat-number {
                font-size: 1.8rem;
            }
            .floating-wa {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
            .back-to-top {
                bottom: 20px;
                left: 20px;
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>

    <!-- ONE-PAGE FIXED NAVBAR (NAVY GLASS) -->
    <nav id="navbarMain" class="navbar navbar-expand-lg navbar-custom fixed-top py-2">
        <div class="container px-3 px-md-4">
            <a class="navbar-brand d-flex align-items-center" href="#home">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" class="navbar-logo">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 shadow-none px-2 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-2 text-white"></i>
            </button>

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-1 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#devotion">Devotion</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events">Acara</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cells">Cell Group</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#prayer">Doa</a></li>

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
                            <a class="btn btn-cyan-pill rounded-pill px-4 py-2" href="#join">
                                Gabung Sekarang
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECTION 1: HERO (#home) (RICH NAVY WITH AMBIENT GLOW) -->
    <section id="home">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start" data-aos="fade-right" data-aos-duration="800">
                    <span class="pill-badge pill-badge-hero mb-3">
                        <i class="fa-solid fa-cross me-1"></i> GBI ERC SAWANGAN &bull; DEPARTMENT OF TEENS
                    </span>

                    <h1 class="display-4 hero-title mb-4">
                        Tempat Nongkrong & Bertumbuh <br class="d-none d-md-block">
                        <span class="text-gradient-cyan">Paling Asik Buat Kamu!</span>
                    </h1>

                    <p class="lead hero-lead mb-4 mx-auto mx-lg-0">
                        Komunitas anak muda SMP - SMA yang seru, positif, bebas dari pergaulan toxic, dan siap nemenin perjalanan imanmu bareng Kristus. Kamu tidak sendiri, mari bertumbuh bersama!
                    </p>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start pt-2">
                        <a href="#join" class="btn btn-cyan-pill py-3 px-4 fs-6">
                            <i class="fa-solid fa-user-plus me-1"></i> Daftar Anggota Baru
                        </a>
                        <a href="#about" class="btn btn-glass-pill py-3 px-4 fs-6">
                            Kenalan Dulu Yuk <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 text-center" data-aos="zoom-in" data-aos-duration="900">
                    <div class="hero-art-wrapper mx-auto">
                        <picture>
                            <source srcset="{{ asset('images/header.webp') }}" type="image/webp">
                            <img src="{{ asset('images/header.png') }}" alt="DOT Teens Illustration" class="hero-art-img" width="390" height="320">
                        </picture>
                    </div>
                </div>
            </div>

            <!-- Stats Bar (Navy Cards) -->
            <div class="row g-4 justify-content-center mt-5 pt-3" data-aos="fade-up" data-aos-delay="150">
                <div class="col-6 col-md-3">
                    <div class="navy-card stat-item h-100">
                        <div class="stat-number">4+ Thn</div>
                        <div class="small text-muted fw-semibold">Melayani Generasi Muda</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="navy-card stat-item h-100">
                        <div class="stat-number" style="color: #38BDF8;">9 Cool</div>
                        <div class="small text-muted fw-semibold">Komunitas Sel Sebaya</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="navy-card stat-item h-100">
                        <div class="stat-number">100+</div>
                        <div class="small text-muted fw-semibold">Teens Terhubung</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="navy-card stat-item h-100">
                        <div class="stat-number" style="color: #F59E0B;">1 Family</div>
                        <div class="small text-muted fw-semibold">Bersatu dalam Kristus</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: ABOUT US (#about) -->
    <section id="about" style="background: var(--navy-surface);">
        <div class="container">
            <div class="text-center section-header" data-aos="fade-up">
                <span class="pill-badge pill-badge-cyan">Tentang Kami</span>
                <h2 class="display-5 fw-bold mb-3">
                    Bukan Sekadar Ibadah, <br>
                    <span class="text-gradient-cyan">Ini Rumah Kedua Kamu!</span>
                </h2>
                <p class="text-muted mx-auto fs-5" style="max-width: 650px;">
                    Department of Teens (DOT) GBI ERC Sawangan adalah wadah keluarga bagi generasi muda untuk menemukan tujuan hidup di dalam Kristus.
                </p>
            </div>

            <!-- 3 Core Pillars -->
            <div class="row g-4 mb-5">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="navy-card h-100 text-center p-4">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(56, 189, 248, 0.12); color: var(--cyan-electric);">
                            <i class="fa-solid fa-heart-pulse fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">1. Faith (Iman Kuat)</h4>
                        <p class="text-muted small mb-0" style="line-height: 1.75;">
                            Mengenal kasih Tuhan Yesus secara nyata lewat firman yang relevan, aplikatif, dan tidak membosankan untuk kehidupan sekolahmu.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="navy-card h-100 text-center p-4">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(37, 99, 235, 0.15); color: var(--blue-light);">
                            <i class="fa-solid fa-users fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">2. Fellowship (Sahabat Sejati)</h4>
                        <p class="text-muted small mb-0" style="line-height: 1.75;">
                            Tempat kamu menemukan teman sebaya yang saling menguatkan, bebas dari pergaulan negatif, dan saling mendoakan.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="navy-card h-100 text-center p-4">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(245, 158, 11, 0.12); color: var(--amber-gold);">
                            <i class="fa-solid fa-rocket fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">3. Fun & Impact</h4>
                        <p class="text-muted small mb-0" style="line-height: 1.75;">
                            Kembangkan talenta musik, multimedia, event, dan kepemimpinan untuk memberkati sesama serta berdampak bagi gereja dan bangsa.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Visi & Misi Box -->
            <div class="row g-4 mb-5 pt-2">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="navy-card h-100 p-4 p-md-5" style="border-left: 5px solid #38BDF8;">
                        <h4 class="fw-bold mb-3" style="color: #38BDF8;">Visi Kami</h4>
                        <p class="text-muted fs-6 mb-0" style="line-height: 1.8;">
                            "Menjadi generasi muda yang radikal bagi Kristus, berakar kuat dalam kebenaran firman, hidup berkemenangan, dan bersinar terang di tengah lingkungan keluarga, sekolah, serta pergaulan sehari-hari."
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="navy-card h-100 p-4 p-md-5" style="border-left: 5px solid #F59E0B;">
                        <h4 class="fw-bold mb-3" style="color: #F59E0B;">Misi Kami</h4>
                        <ul class="list-unstyled text-muted mb-0" style="line-height: 2;">
                            <li><i class="fa-solid fa-check text-success me-2"></i> Membangun gaya hidup doa, pujian, dan penyembahan yang intim.</li>
                            <li><i class="fa-solid fa-check text-success me-2"></i> Memuridkan generasi muda melalui komunitas sel (Cool) yang hangat.</li>
                            <li><i class="fa-solid fa-check text-success me-2"></i> Melatih talenta dan kepemimpinan anak muda masa kini.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- The Dream Team -->
            <div class="text-center pt-5 mb-4" data-aos="fade-up">
                <span class="pill-badge pill-badge-cyan">Kepengurusan</span>
                <h3 class="fw-bold mb-2">DOT Leadership Team</h3>
                <p class="text-muted">Kakak-kakak pembina & pengurus yang siap melayani dengan kasih:</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="navy-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box">
                            <img src="{{ file_exists(public_path('images/hizqia.jpg')) ? asset('images/hizqia.jpg') : 'https://ui-avatars.com/api/?name=Hizqia&background=0284C7&color=ffffff&size=200&bold=true' }}" alt="Ka Hizqia" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold mb-1">Ka Hizqia</h5>
                        <p class="small fw-semibold mb-0" style="color: var(--cyan-electric);">Ketua Dept</p>
                    </div>
                </div>

                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="navy-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box">
                            <img src="{{ file_exists(public_path('images/dyto.jpeg')) ? asset('images/dyto.jpeg') : 'https://ui-avatars.com/api/?name=Dyto&background=0284C7&color=ffffff&size=200&bold=true' }}" alt="Ka Dyto" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold mb-1">Ka Dyto</h5>
                        <p class="small fw-semibold mb-0" style="color: var(--cyan-electric);">Wakil Ketua</p>
                    </div>
                </div>

                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="navy-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box" style="background: linear-gradient(135deg, #0284C7, #38BDF8);">
                            <img src="{{ file_exists(public_path('images/veli.jpg')) ? asset('images/veli.jpg') : 'https://ui-avatars.com/api/?name=Veli&background=0284C7&color=ffffff&size=200&bold=true' }}" alt="Ka Veli" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold mb-1">Ka Veli</h5>
                        <p class="small fw-semibold mb-0" style="color: var(--cyan-electric);">Sekretaris</p>
                    </div>
                </div>

                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="navy-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box" style="background: linear-gradient(135deg, #EA580C, #F59E0B);">
                            <img src="https://ui-avatars.com/api/?name=Kezia&background=F59E0B&color=ffffff&size=200&bold=true" alt="Ka Kezia" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold mb-1">Ka Kezia</h5>
                        <p class="small fw-semibold text-warning mb-0">Bendahara</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: MORNING DEVOTION (#devotion) -->
    <section id="devotion">
        <div class="container">
            <div class="navy-card p-4 p-md-5" data-aos="fade-up" style="border-left: 6px solid #38BDF8;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5 text-center text-lg-start">
                        <img src="{{ asset('images/md.png') }}" alt="Morning Devotion DOT" class="img-fluid rounded-4 shadow" style="max-height: 270px; object-fit: cover;" loading="lazy">
                    </div>

                    <div class="col-lg-7">
                        <span class="pill-badge pill-badge-cyan mb-3">
                            <i class="fa-solid fa-sun me-1 text-warning"></i> Doa & Renungan Pagi
                        </span>
                        <h2 class="fw-bold mb-3">Morning Devotion (MD)</h2>
                        <p class="text-muted fs-6 mb-4" style="line-height: 1.8;">
                            Awali harimu dengan bersaat teduh dan berdoa bersama sebelum berangkat sekolah. Diadakan secara online via Google Meet setiap Senin, Rabu, dan Jumat pukul 04.30 - 05.15 WIB.
                        </p>

                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <a href="https://meet.google.com/zny-jonm-etv" target="_blank" class="btn btn-cyan-pill py-3 px-4 fw-bold">
                                <i class="fa-solid fa-video me-1"></i> Buka Google Meet
                            </a>
                            <span class="text-muted small fw-semibold">
                                <i class="fa-regular fa-clock text-info me-1"></i> Senin, Rabu, Jumat &bull; 04.30 WIB
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: EVENTS (#events) -->
    <section id="events" style="background: var(--navy-surface);">
        <div class="container">
            <div class="text-center section-header" data-aos="fade-up">
                <span class="pill-badge pill-badge-cyan">Jadwal Acara</span>
                <h2 class="display-5 fw-bold mb-3">
                    Kegiatan & <span class="text-gradient-cyan">Acara Mendatang</span>
                </h2>
                <p class="text-muted mx-auto fs-5" style="max-width: 600px;">
                    Jangan lewatkan momen persekutuan seru dan acara spesial DOT!
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($events as $event)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="navy-card h-100 p-4 d-flex flex-column" style="border-top: 4px solid var(--cyan-electric);">
                            @if($event->image)
                                <div class="mb-3 overflow-hidden rounded-4" style="aspect-ratio: 16/9;">
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}" class="w-100 h-100 object-fit-cover" loading="lazy">
                                </div>
                            @endif

                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-3 p-2 text-center text-white" style="background: linear-gradient(135deg, #0284C7, #2563EB); min-width: 65px;">
                                    <span class="d-block fw-bold fs-4" style="line-height: 1;">{{ date('d', strtotime($event->event_date)) }}</span>
                                    <span class="d-block small text-uppercase fw-bold" style="font-size: 0.70rem;">{{ date('M Y', strtotime($event->event_date)) }}</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $event->title }}</h5>
                                    <span class="badge rounded-pill px-2 py-1" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric); border: 1px solid rgba(56, 189, 248, 0.3);">
                                        DOT Event
                                    </span>
                                </div>
                            </div>

                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.7;">
                                {{ Str::limit($event->description, 95) }}
                            </p>

                            <div class="border-top border-secondary border-opacity-25 pt-3 mt-auto">
                                <div class="small text-muted mb-1">
                                    <i class="fa-solid fa-clock text-info me-2"></i> Pukul {{ date('H:i', strtotime($event->event_waktu)) }} WIB
                                </div>
                                <div class="small text-muted">
                                    <i class="fa-solid fa-location-dot text-danger me-2"></i> {{ $event->location }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-8 text-center" data-aos="fade-up">
                        <div class="navy-card p-5">
                            <h4 class="fw-bold mb-2">Event Baru Sedang Dipersiapkan</h4>
                            <p class="text-muted mb-4">
                                Pantau terus website atau follow Instagram kami di <a href="https://instagram.com/dot_teens" target="_blank" class="fw-bold text-decoration-none" style="color: var(--cyan-electric);">@dot_teens</a> untuk pengumuman kegiatan selanjutnya.
                            </p>
                            <a href="#join" class="btn btn-outline-cyan rounded-pill px-4">Daftar Komunitas Sekarang</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION 5: CELL GROUPS (#cells) -->
    <section id="cells">
        <div class="container">
            <div class="text-center section-header" data-aos="fade-up">
                <span class="pill-badge pill-badge-cyan">Kelompok Sel</span>
                <h2 class="display-5 fw-bold mb-3">
                    Komunitas Sel <span class="text-gradient-cyan">(Cool & Cell)</span>
                </h2>
                <p class="text-muted mx-auto fs-5" style="max-width: 650px;">
                    Penempatan Cell dibagi berdasarkan tahun kelahiran agar kamu bisa ngobrol dan bergaul dengan teman sebaya seumuranmu.
                </p>
            </div>

            <!-- Active Cell Schedules -->
            @if(isset($cellSchedules) && count($cellSchedules) > 0)
                <div class="navy-card p-4 mb-5" data-aos="fade-up">
                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                        <div>
                            <h4 class="fw-bold mb-1">Jadwal Pertemuan Terdekat</h4>
                            <p class="text-muted small mb-0">Yuk kumpul dan sharing santai bareng teman-teman!</p>
                        </div>
                        <a href="#join" class="btn btn-outline-cyan btn-sm rounded-pill">Belum Tergabung Cell? Klik Di Sini</a>
                    </div>

                    @foreach($cellSchedules as $index => $schedule)
                        @php
                            $colors = ['#38BDF8', '#60A5FA', '#818CF8', '#38BDF8', '#F59E0B'];
                            $color = $colors[$index % count($colors)];
                            $hariEng = date('l', strtotime($schedule->meeting_date));
                            $namaHari = ['Sunday'=>'MINGGU', 'Monday'=>'SENIN', 'Tuesday'=>'SELASA', 'Wednesday'=>'RABU', 'Thursday'=>'KAMIS', 'Friday'=>'JUMAT', 'Saturday'=>'SABTU'];
                            $hariFix = $namaHari[$hariEng] ?? 'HARI INI';
                        @endphp
                        <div class="cell-schedule-card d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3" style="border-left-color: {{ $color }};">
                            <div class="d-flex align-items-center gap-3">
                                <div class="text-center px-3 py-2 rounded-3" style="background: rgba(56, 189, 248, 0.12); min-width: 90px;">
                                    <span class="fw-bold d-block" style="color: {{ $color }}; font-size: 0.9rem;">{{ $hariFix }}</span>
                                    <span class="small text-muted">{{ date('d M Y', strtotime($schedule->meeting_date)) }}</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $schedule->cell_group_name }}</h5>
                                    <div class="small text-muted">
                                        <i class="fa-solid fa-clock me-1 text-info"></i> {{ date('H:i', strtotime($schedule->meeting_time)) }} WIB &bull; 
                                        <i class="fa-solid fa-location-dot ms-2 me-1 text-danger"></i> {{ $schedule->location }}
                                    </div>
                                </div>
                            </div>
                            @if(!empty($schedule->leader_phone))
                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', $schedule->leader_phone) }}?text=Halo%20kak,%20aku%20mau%20tanya%20jadwal%20Cool%20{{ urlencode($schedule->cell_group_name) }}" target="_blank" class="btn btn-sm btn-outline-cyan rounded-pill px-4">
                                    <i class="fa-brands fa-whatsapp text-success me-1"></i> Tanya Kakak Cell
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- 9 Cell Groups Grid -->
            <div class="text-center mb-4 pt-3" data-aos="fade-up">
                <h4 class="fw-bold mb-1">Daftar 9 Cool Group DOT</h4>
                <p class="text-muted small">Cari grup sesuai tahun kelahiranmu:</p>
            </div>

            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Jireh</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2007</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Keren</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Growing Generation</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2008</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Kayla</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">The Lions</h5>
                        <span class="badge mb-2" style="background: rgba(245, 158, 11, 0.15); color: var(--amber-gold);">Kelahiran 2009</span>
                        <p class="small fw-bold mb-0" style="color: var(--amber-gold);">Ketua: Ka Jayden</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Posteros Shine (Gen 1)</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Melfi</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Awesome (Gen 2)</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Valen</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">The Miracle (Gen 3)</h5>
                        <span class="badge mb-2" style="background: rgba(245, 158, 11, 0.15); color: var(--amber-gold);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--amber-gold);">Ketua: Ka Matias</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Everlasting Joy (Gen 4)</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Esther</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Hoshiah Zion</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2012</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Dyto</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="450">
                    <div class="cell-group-chip">
                        <h5 class="fw-bold mb-1">Salvation</h5>
                        <span class="badge mb-2" style="background: rgba(245, 158, 11, 0.15); color: var(--amber-gold);">Kelahiran 2012 - 2013</span>
                        <p class="small fw-bold mb-0" style="color: var(--amber-gold);">Ketua: Ka Maureen</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="#join" class="btn btn-cyan-pill py-3 px-5 fs-6">
                    <i class="fa-solid fa-users-viewfinder me-2"></i> Daftar Masuk Cell Group
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 6: GALLERY (#gallery) -->
    <section id="gallery" style="background: var(--navy-surface);">
        <div class="container">
            <div class="text-center section-header" data-aos="fade-up">
                <span class="pill-badge pill-badge-cyan">Dokumentasi</span>
                <h2 class="display-5 fw-bold mb-3">
                    Keseruan Ibadah & <span class="text-gradient-cyan">Fellowship</span>
                </h2>
                <p class="text-muted mx-auto fs-5" style="max-width: 600px;">
                    Momen-momen indah kebersamaan kami di DOT. Klik foto untuk melihat lebih jelas!
                </p>
            </div>

            <div class="row g-4 justify-content-center mb-4">
                @forelse($galleries as $index => $gal)
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 70 }}">
                        <div class="gallery-card" onclick="openLightbox('{{ asset('uploads/gallery/' . $gal->image) }}', '{{ addslashes($gal->title) }}')">
                            <img src="{{ asset('uploads/gallery/' . $gal->image) }}" alt="{{ $gal->title }}" loading="lazy">
                            <div class="gallery-overlay">
                                <h5 class="text-white fw-bold mb-1">{{ $gal->title }}</h5>
                                <span class="small opacity-75" style="color: var(--cyan-electric);">Klik untuk perbesar</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">Foto kegiatan DOT akan segera ditampilkan di sini.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4" data-aos="fade-up">
                <a href="/gallery" class="btn btn-outline-cyan rounded-pill px-5 py-3 fs-6">
                    Buka Halaman Galeri Lengkap <i class="fa-solid fa-images ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 7: FAQ & SERVICE LOCATION (#faq) -->
    <section id="faq">
        <div class="container">
            <div class="row g-5 align-items-center mb-5 pb-3">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="pill-badge pill-badge-cyan mb-3">Waktu & Tempat</span>
                    <h3 class="display-6 fw-bold mb-4">
                        Jadwal & Lokasi <span class="text-gradient-cyan">Ibadah Raya</span>
                    </h3>

                    <div class="navy-card mb-4 p-4" style="border-left: 5px solid #38BDF8;">
                        <h4 class="fw-bold mb-1">Ibadah Raya Teens</h4>
                        <p class="fw-semibold mb-2" style="color: var(--cyan-electric);">Setiap Hari Minggu &bull; Pukul 12.00 WIB</p>
                        <p class="small text-muted mb-0">
                            Bertempat di <strong>DOT Room</strong> (Lantai 2), Gedung GBI ERC Sawangan. Ruangan ber-AC dan nyaman untuk jemaat baru.
                        </p>
                    </div>

                    <div class="d-flex align-items-start gap-3 text-muted mb-3">
                        <i class="fa-solid fa-location-dot text-danger fs-5 mt-1"></i>
                        <div>
                            <strong class="text-white d-block">GBI ERC Sawangan</strong>
                            Jl. Raya Muchtar, Sawangan Baru, Kec. Sawangan, Kota Depok, Jawa Barat.
                        </div>
                    </div>

                    <a href="https://maps.app.goo.gl/QpW5g" target="_blank" class="btn btn-outline-cyan btn-sm rounded-pill px-4 mt-2">
                        <i class="fa-solid fa-map-location-dot me-1"></i> Buka di Google Maps
                    </a>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="navy-card p-2 rounded-4 overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9078405950004!2d106.74111851139088!3d-6.405873162625553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e895a4248df7%3A0x2c11ce4bbad8f048!2sGbi%20Sawangan!5e0!3m2!1sid!2sid!4v1775558282012!5m2!1sid!2sid"
                            width="100%" 
                            height="360" 
                            style="border:0; border-radius: 16px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="row g-5 align-items-start pt-4">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="pill-badge pill-badge-gold mb-3">Tanya Jawab</span>
                    <h2 class="display-6 fw-bold mb-3">
                        Pertanyaan yang Sering Diajukan
                    </h2>
                    <p class="text-muted fs-6" style="line-height: 1.8;">
                        Baru pertama kali mau berkunjung? Berikut adalah beberapa jawaban atas pertanyaan yang paling sering ditanyakan oleh teman-teman baru.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                                    Pakai pakaian apa untuk ibadah Teens?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Bebas, rapi, dan sopan. Kebanyakan dari kami memakai kaos santai, flannel, hoodie, atau kemeja kasual dengan celana panjang dan sneakers. Yang terpenting kamu merasa nyaman!
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                                    Kalau datang sendirian canggung nggak ya?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sama sekali tidak! Tim penyambut tamu (usher) kami akan langsung menyambutmu di pintu, membantu mencarikan tempat duduk, dan mengenalkan ke teman-teman seumuranmu.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                                    Batas usia Teens di DOT berapa tahun?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ibadah ini dikhususkan untuk anak usia SMP hingga SMA (rentang 12 sampai 18 tahun).
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                                    Apa bedanya Ibadah Raya dan Cell Group?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ibadah Raya adalah perayaan ibadah bersama seluruh jemaat Teens di hari Minggu. Sedangkan Cell Group adalah kelompok kecil sebaya yang bertemu mingguan untuk diskusi santai, makan bersama, dan saling mendoakan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: PRAYER REQUEST (#prayer) -->
    <section id="prayer" style="background: var(--navy-surface);">
        <div class="container">
            @if(session('prayer_success'))
                <div class="text-center mb-4" data-aos="zoom-in">
                    <div class="alert alert-success d-inline-block rounded-pill px-4 border-0 shadow">
                        <i class="fa-solid fa-circle-check me-2"></i>{{ session('prayer_success') }}
                    </div>
                </div>
            @endif

            <div class="navy-card mx-auto p-5 text-center" style="max-width: 820px; border-left: 6px solid #38BDF8;" data-aos="fade-up">
                <span class="pill-badge pill-badge-cyan mb-3">
                    <i class="fa-solid fa-hands-praying me-1"></i> Dukungan Doa
                </span>
                <h2 class="display-6 fw-bold mb-3">
                    Butuh Teman Curhat atau <span class="text-gradient-cyan">Dukungan Doa?</span>
                </h2>
                <p class="text-muted mx-auto fs-6 mb-4" style="max-width: 620px; line-height: 1.8;">
                    Apapun yang sedang kamu hadapi—tentang studi, keluarga, pertemanan, atau masa depan—kamu tidak sendirian. Tim doa DOT siap berdiri bersamamu dan mendoakan secara rahasia.
                </p>
                <div>
                    <button class="btn btn-cyan-pill py-3 px-5 fs-6" data-bs-toggle="modal" data-bs-target="#modalDoa">
                        <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pokok Doa Rahasia
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 9: JOIN US (#join) -->
    <section id="join">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center section-header" data-aos="fade-up">
                    <span class="pill-badge pill-badge-gold mb-3">Pendaftaran Anggota Baru</span>
                    <h2 class="display-5 fw-bold mb-3">
                        Jadilah Bagian dari <span class="text-gradient-cyan">Keluarga DOT!</span>
                    </h2>
                    <p class="text-muted fs-5">
                        Isi form singkat di bawah ini. Kami sangat menantikan kehadiranmu!
                    </p>

                    @if(session('join_success'))
                        <div class="alert alert-success d-inline-block rounded-pill px-4 mt-3 border-0 shadow" data-aos="zoom-in">
                            <i class="fa-solid fa-circle-check me-2"></i>{{ session('join_success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger d-inline-block rounded-pill px-4 mt-3 border-0 shadow" data-aos="zoom-in">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    @if($isJoinFormActive == '1')
                        <div class="navy-card p-4 p-md-5">
                            <form action="{{ route('join.submit') }}" method="POST">
                                @csrf
                                <div class="row g-4 text-start">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-0 border-bottom border-secondary border-opacity-25 pb-2" style="color: var(--cyan-electric);">
                                            A. Data Pribadi
                                        </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Nama Lengkap *</label>
                                        <input type="text" name="name" class="form-control form-control-youth" placeholder="Contoh: Hizqia Chandra" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">No. WhatsApp Aktif *</label>
                                        <input type="tel" inputmode="numeric" name="phone_number" class="form-control form-control-youth" placeholder="08xxxxxxxxxx" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Tanggal Lahir *</label>
                                        <input type="date" name="birth_date" class="form-control form-control-youth" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Email</label>
                                        <input type="email" name="email" class="form-control form-control-youth" placeholder="nama@email.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Instagram (@username)</label>
                                        <input type="text" name="instagram" class="form-control form-control-youth" placeholder="@username">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Hobi / Minat</label>
                                        <input type="text" name="hobby" class="form-control form-control-youth" placeholder="Musik, desain, basket, dll">
                                    </div>
                                    <div class="col-12">
                                        <label class="text-ice small fw-bold mb-1">Alamat Lengkap *</label>
                                        <textarea name="address" rows="2" class="form-control form-control-youth" placeholder="Alamat tempat tinggal saat ini..." required></textarea>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <h5 class="text-warning fw-bold mb-0 border-bottom border-secondary border-opacity-25 pb-2">
                                            B. Data Tambahan
                                        </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Nama Orang Tua</label>
                                        <input type="text" name="parent_name" class="form-control form-control-youth" placeholder="Nama ayah / ibu">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">No. Telp Orang Tua</label>
                                        <input type="tel" inputmode="numeric" name="parent_phone" class="form-control form-control-youth" placeholder="08xxxxxxxxxx">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Asal Sekolah</label>
                                        <input type="text" name="school" class="form-control form-control-youth" placeholder="Asal SMP / SMA">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-ice small fw-bold mb-1">Sudah Gabung Cell/Cool?</label>
                                        <input type="text" name="fire_cell" class="form-control form-control-youth" placeholder="Kosongkan jika belum ada">
                                    </div>

                                    <div class="col-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-cyan-pill w-100 py-3 fs-5">
                                            <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pendaftaran
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="navy-card text-center p-5">
                            <h3 class="fw-bold mb-2">Form Pendaftaran Sedang Ditutup</h3>
                            <p class="text-muted mb-4">
                                Silakan hubungi pengurus kami via WhatsApp untuk pertanyaan seputar ibadah atau pendaftaran manual.
                            </p>
                            <a href="https://wa.me/6285173280626?text=Halo%20kak,%20aku%20mau%20tanya%20gabung%20DOT%20Teens" target="_blank" class="btn btn-cyan-pill rounded-pill px-4">
                                <i class="fa-brands fa-whatsapp me-2"></i> Hubungi via WhatsApp
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL PRAYER REQUEST -->
    <div class="modal fade" id="modalDoa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow border" style="background: var(--navy-card); border-color: var(--navy-border) !important;">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold text-white">
                        <i class="fa-solid fa-hands-praying me-2 text-info"></i> Kirim Pokok Doa
                    </h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('prayer.submit') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-3">
                        <div class="p-3 rounded-3 mb-3" style="background: rgba(56, 189, 248, 0.12); border-left: 3px solid var(--cyan-electric);">
                            <p class="small mb-0" style="color: var(--text-ice); line-height: 1.6;">
                                Pokok doa Anda akan dijaga kerahasiaannya dan hanya didoakan oleh Tim Prayer DOT.
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="text-ice small fw-bold mb-1">Nama (Opsional / Kosongkan jika Anonim)</label>
                            <input type="text" name="name" class="form-control form-control-youth" placeholder="Nama Anda...">
                        </div>
                        <div class="mb-3">
                            <label class="text-ice small fw-bold mb-1">Pokok Doa / Pergumulan *</label>
                            <textarea name="topic" rows="4" class="form-control form-control-youth" placeholder="Ceritakan apa yang ingin didoakan..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 pb-4 px-4">
                        <button type="submit" class="btn btn-cyan-pill w-100 py-2">
                            Kirim ke Tim Doa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL LIGHTBOX FOR GALLERY -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0 text-center">
                <div class="position-relative d-inline-block mx-auto">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow" data-bs-dismiss="modal" style="z-index: 10;"></button>
                    <img id="lightboxImg" src="" alt="Preview" class="img-fluid rounded-4 shadow-lg border border-secondary" style="max-height: 80vh; object-fit: contain;">
                    <div id="lightboxCaption" class="mt-3 text-white fw-bold fs-5"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6285173280626?text=Halo%20kak,%20aku%20mau%20tanya%20info%20ibadah%20DOT%20Teens%20dong!" target="_blank" class="floating-wa" title="Tanya Kami di WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- BACK TO TOP BUTTON -->
    <a href="#home" id="backToTop" class="back-to-top" title="Kembali ke atas">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- COMPREHENSIVE FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-5 pb-5 border-bottom border-secondary border-opacity-25">
                <div class="col-lg-4 col-md-6">
                    <img src="{{ asset('images/logo.png') }}" alt="DOT Teens" class="mb-3" style="height: 65px; object-fit: contain;">
                    <p class="text-muted small mb-4" style="line-height: 1.8;">
                        <strong class="text-white">Department of Teens (DOT) GBI ERC Sawangan</strong> adalah wadah ibadah, komunitas sel, dan keluarga rohani bagi anak-anak usia SMP hingga SMA untuk bertumbuh dan bersinar bagi Kristus.
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
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">Tentang DOT</a></li>
                        <li><a href="#devotion">Morning Devotion</a></li>
                        <li><a href="#events">Kegiatan</a></li>
                        <li><a href="#cells">Cell Group</a></li>
                        <li><a href="#gallery">Galeri</a></li>
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

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-4 gap-2">
                <p class="small text-muted mb-0">
                    &copy; {{ date('Y') }} <strong class="text-white">Department of Teens (DOT)</strong> &bull; GBI ERC Sawangan. All rights reserved.
                </p>
                <div class="small text-muted">
                    Fun Disciples, Fun Community ✨
                </div>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 60,
            duration: 700,
            easing: 'ease-out-cubic'
        });

        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('#navbarMain .nav-link, #navbarMain .btn, .footer-links a');
            const navbarCollapse = document.getElementById('navbarNav');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        const targetElement = document.querySelector(href);
                        if (targetElement) {
                            e.preventDefault();
                            const navHeight = document.getElementById('navbarMain').offsetHeight || 75;
                            const targetPosition = targetElement.offsetTop - navHeight + 5;
                            window.scrollTo({
                                top: targetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }

                    if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                });
            });

            const backToTopBtn = document.getElementById('backToTop');
            const sections = document.querySelectorAll('section[id]');
            const links = document.querySelectorAll('#navbarMain .nav-link');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 350) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }

                let currentSection = '';
                const scrollPos = window.scrollY + 140;

                sections.forEach(sec => {
                    const top = sec.offsetTop;
                    const height = sec.offsetHeight;
                    if (scrollPos >= top && scrollPos < top + height) {
                        currentSection = sec.getAttribute('id');
                    }
                });

                if (currentSection) {
                    links.forEach(l => {
                        l.classList.remove('active');
                        if (l.getAttribute('href') === '#' + currentSection) {
                            l.classList.add('active');
                        }
                    });
                }
            });
        });

        function openLightbox(src, title) {
            document.getElementById('lightboxImg').src = src;
            document.getElementById('lightboxCaption').textContent = title || '';
            const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
            modal.show();
        }
    </script>
</body>
</html>