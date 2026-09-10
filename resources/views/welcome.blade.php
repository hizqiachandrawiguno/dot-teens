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
    
    <meta name="theme-color" content="#090D16">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Outfit for youthful high-energy vibe -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap & FontAwesome & AOS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #090D16;
            --bg-card: rgba(255, 255, 255, 0.035);
            --border-card: rgba(255, 255, 255, 0.08);
            --neon-blue: #38BDF8;
            --neon-purple: #8B5CF6;
            --neon-pink: #EC4899;
            --neon-amber: #F59E0B;
            --neon-emerald: #10B981;
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
            background-color: var(--bg-dark);
            color: #F1F5F9;
            font-family: var(--font-body);
        }

        /* Prevent Bootstrap horizontal row margin leak */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: var(--font-heading);
            letter-spacing: -0.02em;
        }

        /* ANIMATED VIBRANT GRADIENT BACKGROUND */
        .bg-glow-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.35;
            will-change: transform;
            animation: pulseOrb 12s ease-in-out infinite alternate;
        }

        .glow-orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #8B5CF6 0%, rgba(139, 92, 246, 0) 70%);
            top: -10%;
            left: -10%;
        }

        .glow-orb-2 {
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, #EC4899 0%, rgba(236, 72, 153, 0) 70%);
            top: 40%;
            right: -15%;
            animation-delay: -4s;
        }

        .glow-orb-3 {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, #38BDF8 0%, rgba(56, 189, 248, 0) 70%);
            bottom: 5%;
            left: 15%;
            animation-delay: -8s;
        }

        @keyframes pulseOrb {
            0% { transform: translate3d(0, 0, 0) scale(1); }
            50% { transform: translate3d(40px, -30px, 0) scale(1.12); }
            100% { transform: translate3d(-30px, 40px, 0) scale(0.95); }
        }

        /* VIBRANT GRADIENT TEXTS */
        .text-gradient {
            background: linear-gradient(135deg, #38BDF8 0%, #8B5CF6 50%, #EC4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-sun {
            background: linear-gradient(135deg, #F59E0B 0%, #EF4444 60%, #EC4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-animated {
            background: linear-gradient(270deg, #38BDF8, #8B5CF6, #EC4899, #F59E0B, #38BDF8);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* GLASS CARD STYLING */
        .glass-card {
            background: var(--bg-card);
            border: 1px solid var(--border-card);
            border-radius: 24px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 30px;
            box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.35);
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), border-color 0.35s, box-shadow 0.35s;
            position: relative;
            z-index: 1;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 20px 45px -5px rgba(139, 92, 246, 0.25);
        }

        /* PILL BADGES FOR YOUTH VIBES */
        .badge-pill-neon {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 9999px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .badge-pill-neon:hover {
            transform: translateY(-2px) scale(1.03);
        }

        .pill-purple {
            background: rgba(139, 92, 246, 0.15);
            color: #C4B5FD;
            border-color: rgba(139, 92, 246, 0.4);
        }

        .pill-pink {
            background: rgba(236, 72, 153, 0.15);
            color: #F472B6;
            border-color: rgba(236, 72, 153, 0.4);
        }

        .pill-blue {
            background: rgba(56, 189, 248, 0.15);
            color: #7DD3FC;
            border-color: rgba(56, 189, 248, 0.4);
        }

        .pill-emerald {
            background: rgba(16, 185, 129, 0.15);
            color: #6EE7B7;
            border-color: rgba(16, 185, 129, 0.4);
        }

        .pill-amber {
            background: rgba(245, 158, 11, 0.15);
            color: #FCD34D;
            border-color: rgba(245, 158, 11, 0.4);
        }

        /* BUTTONS */
        .btn-gradient {
            background: linear-gradient(135deg, #38BDF8 0%, #8B5CF6 50%, #EC4899 100%);
            background-size: 200% 200%;
            border: none;
            color: #fff !important;
            font-weight: 700;
            padding: 13px 32px;
            border-radius: 9999px;
            box-shadow: 0 6px 25px rgba(139, 92, 246, 0.4);
            transition: all 0.35s cubic-bezier(0.2, 0.8, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-gradient:hover {
            background-position: right center;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 30px rgba(236, 72, 153, 0.55);
        }

        .btn-outline-glass {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #F1F5F9 !important;
            font-weight: 700;
            padding: 13px 28px;
            border-radius: 9999px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-outline-glass:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.35);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.1);
        }

        /* ONE-PAGE NAVBAR */
        .navbar-custom {
            background: rgba(9, 13, 22, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
            z-index: 1050;
        }

        .navbar-logo {
            height: 65px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .navbar-logo:hover {
            transform: scale(1.05) rotate(-2deg);
        }

        .navbar-nav .nav-link {
            color: #CBD5E1 !important;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 8px 14px !important;
            border-radius: 9999px;
            transition: all 0.25s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.06);
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            color: #38BDF8 !important;
            background: rgba(56, 189, 248, 0.12);
            font-weight: 700;
        }

        /* SECTIONS PADDING & OFFSET FOR ONE-PAGE SCROLL */
        section {
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        /* Floating interactive badges on Hero */
        .hero-sticker {
            position: absolute;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 10px 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            z-index: 2;
            animation: stickerFloat 4s ease-in-out infinite alternate;
        }

        .hero-sticker-1 {
            top: 8%;
            left: -5%;
            border-color: rgba(56, 189, 248, 0.4);
            color: #7DD3FC;
        }

        .hero-sticker-2 {
            bottom: 12%;
            right: -5%;
            border-color: rgba(236, 72, 153, 0.4);
            color: #F472B6;
            animation-delay: -2s;
        }

        .hero-sticker-3 {
            bottom: 0%;
            left: 5%;
            border-color: rgba(245, 158, 11, 0.4);
            color: #FCD34D;
            animation-delay: -3s;
        }

        @keyframes stickerFloat {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        /* HERO IMAGE GLOW CONTAINER */
        .hero-art-wrapper {
            position: relative;
            display: inline-block;
            max-width: 440px;
            width: 100%;
        }

        .hero-art-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 90%;
            height: 90%;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(139, 92, 246, 0.45) 0%, rgba(236, 72, 153, 0.25) 50%, transparent 75%);
            filter: blur(50px);
            z-index: 0;
            border-radius: 50%;
            animation: pulseOrb 6s ease-in-out infinite alternate;
        }

        .hero-art-img {
            position: relative;
            z-index: 1;
            width: 100%;
            height: auto;
            max-width: 390px;
            filter: drop-shadow(0 20px 30px rgba(0,0,0,0.5));
            transition: transform 0.4s ease;
        }

        .hero-art-img:hover {
            transform: scale(1.04) rotate(1deg);
        }

        /* STATS COUNTER BAR */
        .stat-item {
            text-align: center;
            padding: 15px;
        }

        .stat-number {
            font-family: var(--font-heading);
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 6px;
        }

        /* AVATAR RING FOR DREAM TEAM */
        .team-avatar-box {
            width: 120px;
            height: 120px;
            margin: 0 auto 16px;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(135deg, #38BDF8, #8B5CF6, #EC4899);
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.35);
            transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .glass-card:hover .team-avatar-box {
            transform: scale(1.08) rotate(4deg);
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.55);
        }

        .team-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #090D16;
        }

        /* GALLERY HOVER LIGHTBOX CARD */
        .gallery-card {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            aspect-ratio: 4 / 3;
            cursor: pointer;
            border: 1px solid var(--border-card);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: all 0.35s ease;
        }

        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(9, 13, 22, 0.95) 0%, rgba(9, 13, 22, 0.3) 50%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* CELL SCHEDULE CARD */
        .cell-schedule-card {
            background: rgba(255, 255, 255, 0.025);
            border-left: 5px solid #8B5CF6;
            border-radius: 16px;
            padding: 18px 24px;
            margin-bottom: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .cell-schedule-card:hover {
            background: rgba(139, 92, 246, 0.08);
            transform: translateX(8px);
        }

        /* CELL GROUP BADGE CHIP */
        .cell-group-chip {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 20px;
            padding: 18px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
        }

        .cell-group-chip:hover {
            transform: translateY(-5px) scale(1.03);
            border-color: #EC4899;
            background: rgba(236, 72, 153, 0.06);
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.15);
        }

        /* ACCORDION FAQ */
        .accordion-item {
            background: rgba(255, 255, 255, 0.035) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            margin-bottom: 14px;
            border-radius: 18px !important;
            overflow: hidden;
        }

        .accordion-button {
            background: transparent !important;
            color: #F8FAFC !important;
            font-weight: 700;
            font-family: var(--font-heading);
            padding: 20px 24px;
            box-shadow: none !important;
            font-size: 1.05rem;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(56, 189, 248, 0.08) !important;
            color: #38BDF8 !important;
        }

        .accordion-button::after {
            filter: invert(1);
            transition: transform 0.3s ease;
        }

        .accordion-body {
            color: #CBD5E1;
            font-size: 0.95rem;
            line-height: 1.7;
            padding: 0 24px 22px;
        }

        /* FLOATING WHATSAPP & BACK TO TOP */
        .floating-wa {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.45);
            z-index: 999;
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            text-decoration: none;
        }

        .floating-wa:hover {
            transform: scale(1.12) rotate(8deg);
            color: white;
            box-shadow: 0 10px 30px rgba(37, 211, 102, 0.6);
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: #CBD5E1;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            z-index: 998;
            transition: all 0.3s ease;
            opacity: 0;
            pointer-events: none;
            text-decoration: none;
        }

        .back-to-top.show {
            opacity: 1;
            pointer-events: auto;
        }

        .back-to-top:hover {
            background: var(--neon-purple);
            color: white;
            transform: translateY(-4px);
        }

        /* FORM INPUT STYLING */
        .form-control-youth {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            color: #F8FAFC !important;
            border-radius: 14px !important;
            padding: 12px 18px !important;
            font-size: 0.95rem;
            transition: all 0.25s ease;
        }

        .form-control-youth:focus {
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: #8B5CF6 !important;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.35) !important;
            color: #fff !important;
        }

        .form-control-youth::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        /* RESPONSIVENESS */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(9, 13, 22, 0.98);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 20px;
                padding: 20px;
                margin-top: 15px;
                box-shadow: 0 15px 35px rgba(0,0,0,0.5);
            }
            .hero-sticker {
                display: none;
            }
        }

        @media (max-width: 768px) {
            section {
                padding: 70px 0;
            }
            .navbar-logo {
                height: 50px;
            }
            .stat-number {
                font-size: 1.8rem;
            }
            .floating-wa {
                bottom: 20px;
                right: 20px;
                width: 52px;
                height: 52px;
                font-size: 24px;
            }
            .back-to-top {
                bottom: 20px;
                left: 20px;
                width: 42px;
                height: 42px;
            }
        }
    </style>
</head>
<body>

    <!-- VIBRANT AMBIENT GLOW MESH LAYER -->
    <div class="bg-glow-layer">
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
    </div>

    <!-- ONE-PAGE FIXED NAVBAR -->
    <nav id="navbarMain" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-2">
        <div class="container px-3 px-md-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#home">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" class="navbar-logo">
            </a>

            <!-- Mobile Hamburger Button -->
            <button class="navbar-toggler border-0 shadow-none px-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars-staggered fs-2 text-white"></i>
            </button>

            <!-- Navbar Links: All One-Page Targets -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-1 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#devotion">Devotion</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cells">Cell Groups</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#prayer">Doa</a></li>

                    @auth
                        <li class="nav-item mt-2 mt-lg-0 ms-lg-2">
                            <a class="btn btn-outline-glass btn-sm rounded-pill px-3" href="/admin/dashboard">
                                <i class="fa-solid fa-gauge-high text-info me-1"></i> Dashboard
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
                            <a class="btn btn-gradient rounded-pill px-4 py-2" href="#join">
                                <i class="fa-solid fa-rocket me-1"></i> Join Us
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECTION 1: HERO (#home) -->
    <section id="home" style="padding-top: 150px; padding-bottom: 80px;">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left: Headline & Cheerfull Copy -->
                <div class="col-lg-7 text-center text-lg-start" data-aos="fade-right" data-aos-duration="900">
                    <div class="d-inline-flex align-items-center gap-2 badge-pill-neon pill-purple mb-4">
                        <i class="fa-solid fa-sparkles"></i>
                        <span>GBI ERC SAWANGAN • DEPARTMENT OF TEENS</span>
                    </div>

                    <h1 class="display-4 fw-black text-white mb-4" style="line-height: 1.15; font-weight: 800;">
                        Tempat Nongkrong & Bertumbuh <br class="d-none d-md-block">
                        <span class="text-gradient-animated">Paling Asik Buat Kamu! 🔥</span>
                    </h1>

                    <p class="lead text-secondary mb-4 mx-auto mx-lg-0" style="max-width: 580px; line-height: 1.75; font-size: 1.15rem;">
                        Komunitas anak muda SMP - SMA yang seru, hangat, no toxic, dan selalu siap nemenin kamu kenal kasih Tuhan secara nyata. <span class="text-white fw-bold">Come as you are, you belong here!</span>
                    </p>

                    <!-- CTAs -->
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start pt-2">
                        <a href="#join" class="btn btn-gradient py-3 px-4 fs-6">
                            <i class="fa-solid fa-user-plus"></i> Gabung DOT Sekarang
                        </a>
                        <a href="#about" class="btn btn-outline-glass py-3 px-4 fs-6">
                            <i class="fa-solid fa-heart"></i> Kenalan Dulu Yuk
                        </a>
                        <a href="#cells" class="btn btn-outline-glass py-3 px-3 fs-6 d-none d-xl-inline-flex">
                            <i class="fa-solid fa-users text-info"></i> Cek Cell Sebaya
                        </a>
                    </div>

                    <!-- Quick highlights tags -->
                    <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start mt-4 pt-3">
                        <span class="badge-pill-neon pill-blue"><i class="fa-solid fa-church"></i> Ibadah Tiap Minggu 12.00 WIB</span>
                        <span class="badge-pill-neon pill-pink"><i class="fa-solid fa-user-group"></i> 9 Cool Sebaya</span>
                        <span class="badge-pill-neon pill-amber"><i class="fa-solid fa-guitar"></i> Praise, Worship & Fun</span>
                    </div>
                </div>

                <!-- Right: Hero Illustration with Playful Floating Stickers -->
                <div class="col-lg-5 text-center" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="hero-art-wrapper mx-auto">
                        <div class="hero-art-glow"></div>

                        <!-- Floating Sticker 1 -->
                        <div class="hero-sticker hero-sticker-1">
                            <i class="fa-solid fa-fire text-danger fs-5"></i>
                            <span>Fun Community!</span>
                        </div>

                        <!-- Floating Sticker 2 -->
                        <div class="hero-sticker hero-sticker-2">
                            <i class="fa-solid fa-bolt text-warning fs-5"></i>
                            <span>100% Support & Kasih</span>
                        </div>

                        <!-- Floating Sticker 3 -->
                        <div class="hero-sticker hero-sticker-3">
                            <i class="fa-solid fa-music text-info fs-5"></i>
                            <span>Worship & Chill 🎧</span>
                        </div>

                        <!-- Hero Picture (Optimized WebP with fallback) -->
                        <picture>
                            <source srcset="{{ asset('images/header.webp') }}" type="image/webp">
                            <img src="{{ asset('images/header.png') }}" alt="DOT Teens Illustration" class="hero-art-img" width="390" height="320">
                        </picture>
                    </div>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="row g-3 justify-content-center mt-5 pt-3" data-aos="fade-up" data-aos-delay="200">
                <div class="col-6 col-md-3">
                    <div class="glass-card stat-item h-100">
                        <div class="stat-number text-gradient">4+ Thn</div>
                        <div class="small text-secondary fw-semibold">Melayani Generasi Muda</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="glass-card stat-item h-100">
                        <div class="stat-number text-gradient-sun">9 Cool</div>
                        <div class="small text-secondary fw-semibold">Komunitas Sel Sebaya</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="glass-card stat-item h-100">
                        <div class="stat-number text-gradient">100+</div>
                        <div class="small text-secondary fw-semibold">Teens Bertumbuh</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="glass-card stat-item h-100">
                        <div class="stat-number text-gradient-sun">1 Family</div>
                        <div class="small text-secondary fw-semibold">Bersatu dalam Kristus</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: ABOUT US (#about) -->
    <section id="about">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-pill-neon pill-blue mb-3">✨ Who We Are</span>
                <h2 class="display-5 fw-bold text-white mb-3">
                    Bukan Sekadar Ibadah, <br>
                    <span class="text-gradient">Ini Rumah Kedua Kamu! 🏠</span>
                </h2>
                <p class="text-secondary mx-auto fs-5" style="max-width: 650px;">
                    Kenalan lebih dekat dengan keluarga besar Department of Teens (DOT) GBI ERC Sawangan.
                </p>
            </div>

            <!-- 3 Core Pillars -->
            <div class="row g-4 mb-5">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card h-100 text-center p-4">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(56, 189, 248, 0.15); color: #38BDF8;">
                            <i class="fa-solid fa-hands-holding-heart fs-2"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-2">1. Faith (Iman Kuat)</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            Mengenal kasih Tuhan Yesus secara personal lewat firman yang relevan, aplikatif, dan nggak ngebosenin buat kehidupan sekolahmu.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card h-100 text-center p-4">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(139, 92, 246, 0.15); color: #8B5CF6;">
                            <i class="fa-solid fa-people-roof fs-2"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-2">2. Fellowship (Sahabat Sejati)</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            Tempat kamu nemuin sahabat yang saling menguatkan, bebas dari pergaulan toxic, dan siap nemenin di saat susah maupun senang.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card h-100 text-center p-4">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(236, 72, 153, 0.15); color: #EC4899;">
                            <i class="fa-solid fa-rocket fs-2"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-2">3. Fun & Impact</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            Salurkan bakatmu di musik, multimedia, event organizer, atau dance. Bareng-bareng bikin dampak positif bagi gereja dan dunia!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Visi & Misi Box -->
            <div class="row g-4 mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="glass-card h-100 p-4 p-md-5" style="border-left: 5px solid #38BDF8;">
                        <span class="badge-pill-neon pill-blue mb-3"><i class="fa-solid fa-eye"></i> Visi Kami</span>
                        <h3 class="fw-bold text-white mb-3">Generasi Radikal Bagi Kristus</h3>
                        <p class="text-secondary fs-6 mb-0" style="line-height: 1.8;">
                            "Menjadi generasi muda yang radikal bagi Kristus, berakar kuat dalam kebenaran firman, hidup berkemenangan, dan bersinar terang di tengah lingkungan keluarga, sekolah, serta masyarakat."
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card h-100 p-4 p-md-5" style="border-left: 5px solid #EC4899;">
                        <span class="badge-pill-neon pill-pink mb-3"><i class="fa-solid fa-bullseye"></i> Misi Kami</span>
                        <ul class="list-unstyled text-secondary mb-0" style="line-height: 2;">
                            <li><i class="fa-solid fa-circle-check text-success me-2"></i> Membangun gaya hidup doa, pujian, dan penyembahan yang intim.</li>
                            <li><i class="fa-solid fa-circle-check text-success me-2"></i> Memuridkan generasi muda melalui komunitas sel (Cool) yang suportif.</li>
                            <li><i class="fa-solid fa-circle-check text-success me-2"></i> Menggali dan melatih talenta kepemimpinan anak muda masa kini.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- The Dream Team (Leadership) -->
            <div class="text-center pt-4 mb-4" data-aos="fade-up">
                <span class="badge-pill-neon pill-purple mb-2">👑 The Dream Team</span>
                <h3 class="fw-bold text-white mb-2">DOT <span class="text-gradient-animated">Leadership Team</span></h3>
                <p class="text-secondary">Kakak-kakak pembina & pengurus yang siap melayani dengan hati dan kasih!</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Ka Hizqia -->
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box">
                            <img src="{{ file_exists(public_path('images/hizqia.jpg')) ? asset('images/hizqia.jpg') : 'https://ui-avatars.com/api/?name=Hizqia&background=1E1B4B&color=38BDF8&size=200&bold=true' }}" alt="Ka Hizqia" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold text-white mb-1">Ka Hizqia</h5>
                        <p class="small fw-bold text-info mb-0"><i class="fa-solid fa-crown me-1"></i> Ketua Dept</p>
                    </div>
                </div>

                <!-- Ka Dyto -->
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box">
                            <img src="{{ file_exists(public_path('images/dyto.jpeg')) ? asset('images/dyto.jpeg') : 'https://ui-avatars.com/api/?name=Dyto&background=1E1B4B&color=8B5CF6&size=200&bold=true' }}" alt="Ka Dyto" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold text-white mb-1">Ka Dyto</h5>
                        <p class="small fw-bold mb-0" style="color: #A78BFA;"><i class="fa-solid fa-star me-1"></i> Wakil Ketua</p>
                    </div>
                </div>

                <!-- Ka Veli -->
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box">
                            <img src="{{ file_exists(public_path('images/veli.jpg')) ? asset('images/veli.jpg') : 'https://ui-avatars.com/api/?name=Veli&background=1E1B4B&color=EC4899&size=200&bold=true' }}" alt="Ka Veli" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold text-white mb-1">Ka Veli</h5>
                        <p class="small fw-bold mb-0" style="color: #F472B6;"><i class="fa-solid fa-pen-nib me-1"></i> Sekretaris</p>
                    </div>
                </div>

                <!-- Ka Kezia -->
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="glass-card text-center h-100 p-3 p-md-4">
                        <div class="team-avatar-box">
                            <img src="https://ui-avatars.com/api/?name=Kezia&background=1E1B4B&color=F59E0B&size=200&bold=true" alt="Ka Kezia" class="team-avatar-img" loading="lazy">
                        </div>
                        <h5 class="fw-bold text-white mb-1">Ka Kezia</h5>
                        <p class="small fw-bold text-warning mb-0"><i class="fa-solid fa-coins me-1"></i> Bendahara</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: MORNING DEVOTION (#devotion) -->
    <section id="devotion" style="background: rgba(255, 255, 255, 0.015);">
        <div class="container">
            <div class="glass-card p-4 p-md-5 overflow-hidden" data-aos="fade-up" style="border-left: 6px solid #F59E0B;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5 text-center text-lg-start">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('images/md.png') }}" alt="Morning Devotion DOT" class="img-fluid rounded-4 shadow-lg" style="max-height: 280px; object-fit: cover;" loading="lazy">
                            <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger shadow px-3 py-2">
                                <i class="fa-solid fa-satellite-dish me-1"></i> LIVE G-MEET
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <span class="badge-pill-neon pill-amber mb-3">
                            <i class="fa-solid fa-sun text-warning"></i> AWALI PAGIMU BERSAMA TUHAN
                        </span>
                        <h2 class="fw-bold text-white mb-3">Morning Devotion (MD) 🌅</h2>
                        <p class="text-secondary fs-6 mb-4" style="line-height: 1.7;">
                            Bangun pagi, kuatkan iman, dan dapatkan inspirasi sebelum berangkat sekolah! Doa bersama dan renungan firman santai bareng keluarga DOT via Google Meet.
                        </p>

                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <a href="https://meet.google.com/zny-jonm-etv" target="_blank" class="btn btn-gradient py-3 px-4 fw-bold">
                                <i class="fa-solid fa-video me-1"></i> Masuk Google Meet Sekarang
                            </a>
                            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-dark border border-secondary text-secondary small fw-semibold">
                                <i class="fa-regular fa-clock text-info"></i> Senin, Rabu, Jumat | 04.30 - 05.15 WIB
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: EVENTS (#events) -->
    <section id="events">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-pill-neon pill-emerald mb-3">🗓️ Don't Miss It</span>
                <h2 class="display-5 fw-bold text-white mb-3">
                    Kegiatan & <span class="text-gradient">Acara Mendatang 🎪</span>
                </h2>
                <p class="text-secondary mx-auto fs-5" style="max-width: 600px;">
                    Event seru, ibadah bertema, fellowship, dan kegiatan seru lainnya bulan ini!
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($events as $event)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="glass-card h-100 p-4 d-flex flex-column" style="border-top: 4px solid #10B981;">
                            @if($event->image)
                                <div class="mb-3 overflow-hidden rounded-4" style="aspect-ratio: 16/9;">
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}" class="w-100 h-100 object-fit-cover" loading="lazy">
                                </div>
                            @endif

                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-4 p-2 text-center text-white" style="background: linear-gradient(135deg, #10B981, #059669); min-width: 70px;">
                                    <span class="d-block fw-bold fs-3" style="line-height: 1;">{{ date('d', strtotime($event->event_date)) }}</span>
                                    <span class="d-block small text-uppercase fw-bold" style="font-size: 0.75rem;">{{ date('M Y', strtotime($event->event_date)) }}</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-white mb-1">{{ $event->title }}</h5>
                                    <span class="badge bg-success bg-opacity-25 text-success small border border-success border-opacity-50 rounded-pill px-2 py-1">
                                        DOT Special Event
                                    </span>
                                </div>
                            </div>

                            <p class="text-secondary small mb-4 flex-grow-1" style="line-height: 1.6;">
                                {{ Str::limit($event->description, 90) }}
                            </p>

                            <div class="border-top border-secondary border-opacity-25 pt-3 mt-auto">
                                <div class="small text-secondary mb-1">
                                    <i class="fa-solid fa-clock text-success me-2"></i> Pukul {{ date('H:i', strtotime($event->event_waktu)) }} WIB
                                </div>
                                <div class="small text-secondary">
                                    <i class="fa-solid fa-location-dot text-danger me-2"></i> {{ $event->location }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-8 text-center" data-aos="fade-up">
                        <div class="glass-card p-5">
                            <i class="fa-solid fa-calendar-check fs-1 text-info mb-3"></i>
                            <h4 class="fw-bold text-white mb-2">Event Baru Sedang Dipersiapkan! 🎉</h4>
                            <p class="text-secondary mb-3">
                                Pantau terus website dan Instagram kami di <a href="https://instagram.com/dot_teens" target="_blank" class="text-info fw-bold">@dot_teens</a> supaya nggak ketinggalan info event seru selanjutnya!
                            </p>
                            <a href="#join" class="btn btn-outline-glass rounded-pill px-4">Daftar Komunitas Sekarang</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION 5: CELL GROUPS (#cells) -->
    <section id="cells" style="background: rgba(255, 255, 255, 0.015);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-pill-neon pill-pink mb-3">👥 Spiritual Family</span>
                <h2 class="display-5 fw-bold text-white mb-3">
                    Komunitas Sel <span class="text-gradient">(Cool & Cell) ⚡</span>
                </h2>
                <p class="text-secondary mx-auto fs-5" style="max-width: 650px;">
                    Di DOT, Cool dibagi berdasarkan tahun kelahiran supaya kamu bisa curhat dan seru-seruan bareng teman sebaya seumuranmu!
                </p>
            </div>

            <!-- Active Cell Schedules from Database -->
            @if(isset($cellSchedules) && count($cellSchedules) > 0)
                <div class="glass-card p-4 mb-5" data-aos="fade-up">
                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                        <div>
                            <h4 class="fw-bold text-white mb-1"><i class="fa-solid fa-calendar-days text-info me-2"></i> Jadwal Pertemuan Minggu Ini</h4>
                            <p class="text-secondary small mb-0">Yuk datang dan rasakan kehangatan keluarga kecilmu!</p>
                        </div>
                        <a href="#join" class="btn btn-outline-glass btn-sm rounded-pill">Belum Punya Cell? Gabung Di Sini</a>
                    </div>

                    @foreach($cellSchedules as $index => $schedule)
                        @php
                            $colors = ['#38BDF8', '#EC4899', '#10B981', '#8B5CF6', '#F59E0B'];
                            $color = $colors[$index % count($colors)];
                            $hariEng = date('l', strtotime($schedule->meeting_date));
                            $namaHari = ['Sunday'=>'MINGGU', 'Monday'=>'SENIN', 'Tuesday'=>'SELASA', 'Wednesday'=>'RABU', 'Thursday'=>'KAMIS', 'Friday'=>'JUMAT', 'Saturday'=>'SABTU'];
                            $hariFix = $namaHari[$hariEng] ?? 'HARI INI';
                        @endphp
                        <div class="cell-schedule-card d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3" style="border-left-color: {{ $color }};">
                            <div class="d-flex align-items-center gap-3">
                                <div class="text-center px-3 py-2 rounded-3" style="background: rgba(255,255,255,0.05); min-width: 90px;">
                                    <span class="fw-bold d-block" style="color: {{ $color }}; font-size: 0.9rem;">{{ $hariFix }}</span>
                                    <span class="small text-secondary">{{ date('d M Y', strtotime($schedule->meeting_date)) }}</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-white mb-1">{{ $schedule->cell_group_name }}</h5>
                                    <div class="small text-secondary">
                                        <i class="fa-solid fa-clock me-1 text-info"></i> {{ date('H:i', strtotime($schedule->meeting_time)) }} WIB &bull; 
                                        <i class="fa-solid fa-location-dot ms-2 me-1 text-danger"></i> {{ $schedule->location }}
                                    </div>
                                </div>
                            </div>
                            @if(!empty($schedule->leader_phone))
                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', $schedule->leader_phone) }}?text=Halo%20kak,%20aku%20mau%20tanya%20jadwal%20Cool%20{{ urlencode($schedule->cell_group_name) }}" target="_blank" class="btn btn-sm rounded-pill px-4 text-white" style="background: rgba(255,255,255,0.08); border: 1px solid {{ $color }};">
                                    <i class="fa-brands fa-whatsapp text-success me-1"></i> Tanya Kakak Cell
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- 9 Cell Groups Grid -->
            <div class="text-center mb-4 pt-3" data-aos="fade-up">
                <h4 class="fw-bold text-white mb-1">Daftar 9 Cool Group DOT</h4>
                <p class="text-secondary small">Cari grup sesuai tahun kelahiranmu:</p>
            </div>

            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-info fs-3 mb-2"></i>
                        <h5 class="fw-bold text-white mb-1">Jireh</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2007</span>
                        <p class="small text-info fw-bold mb-0">Ketua: Ka Keren</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-purple fs-3 mb-2" style="color: #8B5CF6;"></i>
                        <h5 class="fw-bold text-white mb-1">Growing Generation</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2008</span>
                        <p class="small text-gradient fw-bold mb-0">Ketua: Ka Kayla</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-pink fs-3 mb-2" style="color: #EC4899;"></i>
                        <h5 class="fw-bold text-white mb-1">The Lions</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2009</span>
                        <p class="small text-pink fw-bold mb-0" style="color: #EC4899;">Ketua: Ka Jayden</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-info fs-3 mb-2"></i>
                        <h5 class="fw-bold text-white mb-1">Posteros Shine (Gen 1)</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</span>
                        <p class="small text-info fw-bold mb-0">Ketua: Ka Melfi</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-purple fs-3 mb-2" style="color: #8B5CF6;"></i>
                        <h5 class="fw-bold text-white mb-1">Awesome (Gen 2)</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</span>
                        <p class="small text-gradient fw-bold mb-0">Ketua: Ka Valen</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-pink fs-3 mb-2" style="color: #EC4899;"></i>
                        <h5 class="fw-bold text-white mb-1">The Miracle (Gen 3)</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</span>
                        <p class="small text-pink fw-bold mb-0" style="color: #EC4899;">Ketua: Ka Matias</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-info fs-3 mb-2"></i>
                        <h5 class="fw-bold text-white mb-1">Everlasting Joy (Gen 4)</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2010 - 2011</span>
                        <p class="small text-info fw-bold mb-0">Ketua: Ka Esther</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-purple fs-3 mb-2" style="color: #8B5CF6;"></i>
                        <h5 class="fw-bold text-white mb-1">Hoshiah Zion</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2012</span>
                        <p class="small text-gradient fw-bold mb-0">Ketua: Ka Dyto</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="450">
                    <div class="cell-group-chip">
                        <i class="fa-solid fa-users text-pink fs-3 mb-2" style="color: #EC4899;"></i>
                        <h5 class="fw-bold text-white mb-1">Salvation</h5>
                        <span class="badge bg-secondary mb-2">Kelahiran 2012 - 2013</span>
                        <p class="small text-pink fw-bold mb-0" style="color: #EC4899;">Ketua: Ka Maureen</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="#join" class="btn btn-gradient py-3 px-5 fs-6">
                    <i class="fa-solid fa-user-plus me-1"></i> Daftarkan Diriku ke Cell Group
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 6: GALLERY (#gallery) -->
    <section id="gallery">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-pill-neon pill-blue mb-3">📸 Our Memories</span>
                <h2 class="display-5 fw-bold text-white mb-3">
                    Keseruan Ibadah & <span class="text-gradient">Fellowship 🎉</span>
                </h2>
                <p class="text-secondary mx-auto fs-5" style="max-width: 600px;">
                    Momen-momen indah kebersamaan kami di DOT. Klik foto untuk melihat lebih jelas!
                </p>
            </div>

            <div class="row g-4 justify-content-center mb-4">
                @forelse($galleries as $index => $gal)
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 70 }}">
                        <div class="gallery-card" onclick="openLightbox('{{ asset('uploads/gallery/' . $gal->image) }}', '{{ addslashes($gal->title) }}')">
                            <img src="{{ asset('uploads/gallery/' . $gal->image) }}" alt="{{ $gal->title }}" loading="lazy">
                            <div class="gallery-overlay">
                                <span class="badge bg-primary bg-opacity-75 rounded-pill px-3 py-1 mb-2 align-self-start" style="font-size: 0.75rem;">
                                    <i class="fa-solid fa-camera me-1"></i> Klik untuk Perbesar
                                </span>
                                <h5 class="text-white fw-bold mb-0">{{ $gal->title }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-secondary fs-5">Foto keseruan DOT akan segera diupload di sini!</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4" data-aos="fade-up">
                <a href="/gallery" class="btn btn-outline-glass rounded-pill px-5 py-3 fs-6">
                    <i class="fa-solid fa-images me-2 text-info"></i> Buka Galeri Lengkap DOT
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 7: SOCIAL MEDIA & COMMUNITY (#social) -->
    <section id="social" style="background: rgba(255, 255, 255, 0.015);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-pill-neon pill-pink mb-3">📱 Stay Connected</span>
                <h2 class="display-5 fw-bold text-white mb-3">
                    Connect With <span class="text-gradient">DOT Teens 🔥</span>
                </h2>
                <p class="text-secondary mx-auto fs-5" style="max-width: 600px;">
                    Jangan sampai ketinggalan update reels, video ibadah, dan keseruan lainnya di media sosial kita!
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Instagram Card -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="glass-card h-100 p-4" style="border-top: 4px solid #E1306C;">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 55px; height: 55px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">
                                    <i class="fa-brands fa-instagram text-white fs-2"></i>
                                </div>
                                <div>
                                    <h5 class="text-white fw-bold mb-0">Instagram DOT</h5>
                                    <a href="https://instagram.com/dot_teens" target="_blank" class="text-secondary small text-decoration-none">@dot_teens</a>
                                </div>
                            </div>
                            <a href="https://instagram.com/dot_teens" target="_blank" class="btn btn-sm rounded-pill px-4 text-white fw-bold" style="background: #E1306C; box-shadow: 0 4px 15px rgba(225, 48, 108, 0.4);">
                                Follow
                            </a>
                        </div>

                        <div class="row g-2">
                            <div class="col-4">
                                <a href="https://instagram.com/dot_teens" target="_blank" class="d-block overflow-hidden rounded-3 position-relative" style="aspect-ratio: 1/1;">
                                    <img src="{{ asset('images/ibadah.jpeg') }}" class="w-100 h-100 object-fit-cover" alt="DOT Worship" loading="lazy" style="transition: 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="https://instagram.com/dot_teens" target="_blank" class="d-block overflow-hidden rounded-3 position-relative" style="aspect-ratio: 1/1;">
                                    <img src="{{ asset('images/1.jpg') }}" class="w-100 h-100 object-fit-cover" alt="DOT Community" loading="lazy" style="transition: 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="https://instagram.com/dot_teens" target="_blank" class="d-block overflow-hidden rounded-3 position-relative" style="aspect-ratio: 1/1;">
                                    <img src="{{ asset('images/drn.jpeg') }}" class="w-100 h-100 object-fit-cover" alt="DOT Event" loading="lazy" style="transition: 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TikTok Card -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card h-100 p-4" style="border-top: 4px solid #00f2fe;">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 55px; height: 55px; background: #000; border: 1px solid #00f2fe; box-shadow: 2px 2px 0px #FE2C55;">
                                    <i class="fa-brands fa-tiktok text-white fs-2"></i>
                                </div>
                                <div>
                                    <h5 class="text-white fw-bold mb-0">TikTok DOT</h5>
                                    <a href="https://tiktok.com/@dot_teens" target="_blank" class="text-secondary small text-decoration-none">@dot_teens</a>
                                </div>
                            </div>
                            <a href="https://tiktok.com/@dot_teens" target="_blank" class="btn btn-sm rounded-pill px-4 text-dark fw-bold" style="background: #00f2fe; box-shadow: 0 4px 15px rgba(0, 242, 254, 0.4);">
                                Follow
                            </a>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="https://www.tiktok.com/@dot_teens" target="_blank" class="d-block position-relative rounded-4 overflow-hidden shadow-lg" style="width: 100%; max-width: 220px; aspect-ratio: 9/16; background: url('{{ asset('images/ibadah.jpeg') }}') center/cover; transition: 0.3s;" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                                <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                                    <i class="fa-solid fa-circle-play fs-1 text-white shadow" style="opacity: 0.9;"></i>
                                    <div class="fw-bold small mt-2">Tonton Keseruan Kita!</div>
                                </div>
                                <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                                    <p class="text-white small fw-bold mb-1">POV: Kamu Ibadah di DOT! 🙌🔥</p>
                                    <p class="text-secondary mb-0" style="font-size: 0.7rem;">#dotteens #gbisawangan #youth</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: FAQ & SERVICE LOCATION (#faq) -->
    <section id="faq">
        <div class="container">
            <div class="row g-5 align-items-center mb-5 pb-3">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge-pill-neon pill-blue mb-3">📍 Lokasi & Jadwal</span>
                    <h3 class="display-6 fw-bold text-white mb-4">
                        Waktu & Lokasi <span class="text-gradient">Ibadah Raya</span>
                    </h3>

                    <div class="glass-card mb-4 p-4" style="border-left: 5px solid #38BDF8;">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <i class="fa-solid fa-clock fs-2 text-info"></i>
                            <div>
                                <h4 class="fw-bold text-white mb-0">Ibadah Raya Teens</h4>
                                <span class="text-secondary">Setiap Hari Minggu | Pukul 12.00 WIB</span>
                            </div>
                        </div>
                        <p class="small text-secondary mb-0 mt-2">
                            Bertempat di <strong>DOT Room</strong> (Lantai 2), GBI ERC Sawangan. Ruangan ber-AC, nyaman, dan ramah untuk jemaat baru!
                        </p>
                    </div>

                    <div class="d-flex align-items-start gap-3 text-secondary mb-3">
                        <i class="fa-solid fa-location-dot text-danger fs-4 mt-1"></i>
                        <div>
                            <strong class="text-white d-block">GBI ERC Sawangan</strong>
                            Jl. Raya Muchtar, Sawangan Baru, Kec. Sawangan, Kota Depok, Jawa Barat.
                        </div>
                    </div>

                    <a href="https://maps.app.goo.gl/QpW5g" target="_blank" class="btn btn-outline-glass btn-sm rounded-pill px-4 mt-2">
                        <i class="fa-solid fa-map-location-dot me-1 text-info"></i> Buka di Google Maps
                    </a>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card p-2 rounded-5 overflow-hidden shadow-lg">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9078405950004!2d106.74111851139088!3d-6.405873162625553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e895a4248df7%3A0x2c11ce4bbad8f048!2sGbi%20Sawangan!5e0!3m2!1sid!2sid!4v1775558282012!5m2!1sid!2sid"
                            width="100%" 
                            height="380" 
                            style="border:0; border-radius: 20px;" 
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
                    <span class="badge-pill-neon pill-amber mb-3">❓ Tanya Jawab</span>
                    <h2 class="display-6 fw-bold text-white mb-3">
                        Pertanyaan <br><span class="text-gradient-animated">Paling Sering</span>
                    </h2>
                    <p class="text-secondary fs-6" style="line-height: 1.8;">
                        Baru pertama kali mau gabung atau datang ibadah? Jangan ragu ya, berikut jawaban beberapa pertanyaan umum yang sering ditanyain teman-teman baru.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                                    <i class="fa-solid fa-shirt text-info me-3"></i> Pakai baju apa kalau ibadah Teens?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Bebas, rapi, dan sopan! Kebanyakan dari kita pakai kaos santai, flannel, hoodie, atau kemeja kasual dengan celana panjang dan sneakers. Yang penting kamu nyaman dan siap memuji Tuhan!
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                                    <i class="fa-solid fa-user-plus text-purple me-3" style="color: #8B5CF6;"></i> Kalau datang sendirian canggung nggak ya?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Dijamin 100% no awkward vibes! Tim usher dan kakak-kakak pengurus kita bakal langsung menyambut kamu dengan ramah di pintu masuk, nyariin tempat duduk, dan ngenalin ke teman-teman seumuranmu.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                                    <i class="fa-solid fa-id-card text-pink me-3" style="color: #EC4899;"></i> Batas usia Teens di DOT itu berapa tahun?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Komunitas kami dikhususkan untuk anak usia SMP hingga SMA (sekitar 12 - 18 Tahun). Buat kamu yang sudah kuliah atau lulus SMA, nanti bisa lanjut ke Youth Dewasa Muda!
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                                    <i class="fa-solid fa-users-rays text-warning me-3"></i> Apa bedanya Ibadah Raya dan Cell Group?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ibadah Raya adalah perayaan bersama seluruh jemaat Teens setiap hari Minggu jam 12.00. Sedangkan Cell Group (Cool) adalah persekutuan kelompok kecil 5-10 orang teman sebaya yang kumpul mingguan buat sharing santai, makan bareng, dan saling mendoakan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 9: PRAYER REQUEST (#prayer) -->
    <section id="prayer" style="background: rgba(255, 255, 255, 0.015);">
        <div class="container">
            @if(session('prayer_success'))
                <div class="text-center mb-4" data-aos="zoom-in">
                    <div class="alert alert-success d-inline-block rounded-pill px-4 border-0 shadow" style="background: rgba(16, 185, 129, 0.2)!important; color:#10B981!important;">
                        <i class="fa-solid fa-check-circle me-2"></i>{{ session('prayer_success') }}
                    </div>
                </div>
            @endif

            <div class="glass-card mx-auto p-5 text-center" style="max-width: 820px; border-left: 6px solid #8B5CF6;" data-aos="fade-up">
                <span class="badge-pill-neon pill-purple mb-3">🙏 We Are Here For You</span>
                <h2 class="display-6 fw-bold text-white mb-3">
                    Butuh Teman Curhat atau <span class="text-gradient-animated">Dukungan Doa?</span>
                </h2>
                <p class="text-secondary mx-auto fs-6 mb-4" style="max-width: 620px; line-height: 1.8;">
                    Apapun pergumulanmu tentang sekolah, keluarga, pertemanan, kesehatan, atau masa depan—kamu tidak sendirian. Tim doa DOT siap berdiri bersamamu dan mendoakanmu secara rahasia.
                </p>
                <div>
                    <button class="btn btn-gradient py-3 px-5 fs-6" data-bs-toggle="modal" data-bs-target="#modalDoa">
                        <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pokok Doa Rahasia
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 10: JOIN US (#join) -->
    <section id="join">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5" data-aos="fade-up">
                    <span class="badge-pill-neon pill-blue mb-3">🚀 Welcome to the Family</span>
                    <h2 class="display-5 fw-bold text-white mb-3">
                        Jadilah Bagian dari <span class="text-gradient-animated">Keluarga DOT!</span>
                    </h2>
                    <p class="text-secondary fs-5">
                        Isi form pendaftaran singkat di bawah ini. Kami nggak sabar kenalan sama kamu!
                    </p>

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
                        <div class="glass-card p-4 p-md-5">
                            <form action="{{ route('join.submit') }}" method="POST">
                                @csrf
                                <div class="row g-4 text-start">
                                    <div class="col-12">
                                        <h5 class="text-info fw-bold mb-0 border-bottom border-secondary border-opacity-25 pb-2">
                                            <i class="fa-solid fa-user me-2"></i> A. Data Pribadi
                                        </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Nama Lengkap *</label>
                                        <input type="text" name="name" class="form-control form-control-youth" placeholder="Contoh: Hizqia Chandra" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">No. WhatsApp Aktif *</label>
                                        <input type="tel" inputmode="numeric" name="phone_number" class="form-control form-control-youth" placeholder="08xxxxxxxxxx" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Tanggal Lahir *</label>
                                        <input type="date" name="birth_date" class="form-control form-control-youth" style="color-scheme: dark;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Email</label>
                                        <input type="email" name="email" class="form-control form-control-youth" placeholder="nama@email.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Instagram (@username)</label>
                                        <input type="text" name="instagram" class="form-control form-control-youth" placeholder="@username">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Hobi / Minat</label>
                                        <input type="text" name="hobby" class="form-control form-control-youth" placeholder="Musik, gambar, basket, dll">
                                    </div>
                                    <div class="col-12">
                                        <label class="text-light small fw-bold mb-1">Alamat Lengkap *</label>
                                        <textarea name="address" rows="2" class="form-control form-control-youth" placeholder="Alamat rumah / domisili kamu saat ini..." required></textarea>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <h5 class="text-warning fw-bold mb-0 border-bottom border-secondary border-opacity-25 pb-2">
                                            <i class="fa-solid fa-circle-info me-2"></i> B. Data Tambahan
                                        </h5>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Nama Orang Tua</label>
                                        <input type="text" name="parent_name" class="form-control form-control-youth" placeholder="Nama ayah / ibu">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">No. Telp Orang Tua</label>
                                        <input type="tel" inputmode="numeric" name="parent_phone" class="form-control form-control-youth" placeholder="08xxxxxxxxxx">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Asal Sekolah</label>
                                        <input type="text" name="school" class="form-control form-control-youth" placeholder="SMP / SMA mana?">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-light small fw-bold mb-1">Sudah Gabung Cell/Cool?</label>
                                        <input type="text" name="fire_cell" class="form-control form-control-youth" placeholder="Kosongkan jika belum ada">
                                    </div>

                                    <div class="col-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-gradient w-100 py-3 fs-5">
                                            <i class="fa-solid fa-rocket me-2"></i> Kirim & Gabung Sekarang!
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="glass-card text-center p-5">
                            <i class="fa-solid fa-lock fs-1 text-warning mb-3"></i>
                            <h3 class="fw-bold text-white mb-2">Form Pendaftaran Sedang Ditutup Sementara</h3>
                            <p class="text-secondary mb-4">
                                Silakan hubungi admin kami via WhatsApp untuk pendaftaran langsung atau info ibadah terdekat.
                            </p>
                            <a href="https://wa.me/6285173280626?text=Halo%20kak,%20aku%20mau%20gabung%20DOT%20Teens" target="_blank" class="btn btn-gradient rounded-pill px-4">
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
            <div class="modal-content rounded-4 shadow-lg border-0" style="background: rgba(15, 23, 42, 0.96); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.12);">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title text-white fw-bold">
                        <i class="fa-solid fa-hands-praying me-2 text-warning"></i> Kirim Pokok Doa
                    </h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('prayer.submit') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-4">
                        <div class="p-3 rounded-3 mb-3" style="background: rgba(56, 189, 248, 0.08); border-left: 3px solid #38BDF8;">
                            <p class="text-secondary small mb-0" style="line-height: 1.6;">
                                <i class="fa-solid fa-shield-halved text-info me-1"></i> Pokok doa Anda akan dijaga kerahasiaannya dan hanya didoakan oleh Tim Prayer DOT.
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="text-light small fw-bold mb-1">Nama (Opsional / Kosongkan jika Anonim)</label>
                            <input type="text" name="name" class="form-control form-control-youth" placeholder="Nama Anda...">
                        </div>
                        <div class="mb-3">
                            <label class="text-light small fw-bold mb-1">Pokok Doa / Pergumulan *</label>
                            <textarea name="topic" rows="4" class="form-control form-control-youth" placeholder="Ceritakan apa yang ingin didoakan..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 pb-4 px-4">
                        <button type="submit" class="btn btn-gradient w-100 py-2">
                            <i class="fa-solid fa-check me-1"></i> Kirim ke Tim Doa
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
                    <img id="lightboxImg" src="" alt="Preview" class="img-fluid rounded-4 shadow-lg border border-secondary border-opacity-25" style="max-height: 80vh; object-fit: contain;">
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

    <!-- FOOTER -->
    <footer class="py-4 text-center border-top border-secondary border-opacity-10 position-relative" style="z-index: 1;">
        <div class="container">
            <p class="small text-secondary mb-0">
                &copy; {{ date('Y') }} <strong>Department of Teens (DOT)</strong> &bull; GBI ERC Sawangan. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Init AOS Animations
        AOS.init({
            once: true,
            offset: 80,
            duration: 800,
            easing: 'ease-out-cubic'
        });

        // Auto collapse mobile navbar when any nav-link is clicked (One Page smoothness)
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('#navbarMain .nav-link, #navbarMain .btn');
            const navbarCollapse = document.getElementById('navbarNav');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    // If target is internal hash anchor
                    if (href && href.startsWith('#')) {
                        const targetElement = document.querySelector(href);
                        if (targetElement) {
                            e.preventDefault();
                            const navHeight = document.getElementById('navbarMain').offsetHeight || 80;
                            const targetPosition = targetElement.offsetTop - navHeight + 10;
                            window.scrollTo({
                                top: targetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }

                    // Collapse mobile menu if open
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                });
            });

            // Back to top visibility & Scrollspy highlight
            const backToTopBtn = document.getElementById('backToTop');
            const sections = document.querySelectorAll('section[id], header[id]');
            const links = document.querySelectorAll('#navbarMain .nav-link');

            window.addEventListener('scroll', function() {
                // Back to top button
                if (window.scrollY > 400) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }

                // Dynamic scrollspy active link
                let currentSection = '';
                const scrollPos = window.scrollY + 160;

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

        // Lightbox Modal trigger
        function openLightbox(src, title) {
            document.getElementById('lightboxImg').src = src;
            document.getElementById('lightboxCaption').textContent = title || '';
            const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
            modal.show();
        }
    </script>
</body>
</html>