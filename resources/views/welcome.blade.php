<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT Teens | GBI ERC Sawangan - Fun Disciples, Fun Community</title>
    
    <meta name="description" content="Komunitas anak muda DRP Outstanding Teens (DOT) GBI ERC Sawangan. Ibadah seru, 9 Cool group sebaya, teman suportif, dan ruang bertumbuh bareng Kristus!">
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
    
    <!-- QR Code Generator Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
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
            padding: 20px 16px;
            text-align: center;
            transition: all 0.28s cubic-bezier(0.2, 0.8, 0.2, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            cursor: pointer;
            position: relative;
            user-select: none;
        }

        .cell-group-chip:hover {
            border-color: var(--cyan-electric);
            transform: translateY(-4px);
            background: var(--navy-card-hover);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.4), 0 0 20px rgba(56, 189, 248, 0.25);
        }

        .cell-group-chip .chip-click-hint {
            opacity: 0.8;
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .cell-group-chip:hover .chip-click-hint {
            opacity: 1;
            transform: scale(1.04);
        }

        /* COOL MODAL STYLES */
        .cool-gallery-thumb {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 14px;
            border: 1px solid var(--navy-border);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            background: #060D18;
        }

        .cool-gallery-thumb:hover {
            transform: scale(1.05);
            border-color: var(--cyan-electric);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5), 0 0 15px rgba(56, 189, 248, 0.3);
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

        /* ==========================================================
           EVENT REGISTRATION & POPUP MODAL PREMIUM STYLING
           ========================================================== */
        .event-modal-card {
            background: #0D192E !important;
            background: linear-gradient(180deg, #0F1F38 0%, #0B1629 100%) !important;
            border: 1px solid rgba(56, 189, 248, 0.35) !important;
            border-radius: 28px !important;
            box-shadow: 0 30px 80px -15px rgba(0, 0, 0, 0.9), 0 0 30px rgba(56, 189, 248, 0.15) !important;
            overflow: hidden;
            color: #F8FAFC !important;
        }

        .event-modal-header {
            padding: 30px 36px 18px 36px !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        .event-modal-body {
            padding: 24px 36px 36px 36px !important;
        }

        @media (max-width: 576px) {
            .event-modal-header {
                padding: 22px 20px 14px 20px !important;
            }
            .event-modal-body {
                padding: 18px 20px 28px 20px !important;
            }
        }

        .event-form-label {
            font-size: 13.5px !important;
            font-weight: 600 !important;
            color: #94A3B8 !important;
            margin-bottom: 7px !important;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .event-form-label .text-req {
            color: #F87171 !important;
            font-weight: bold;
        }

        .event-form-control, .event-form-select {
            background-color: #172D4D !important;
            border: 1.5px solid rgba(56, 189, 248, 0.3) !important;
            color: #FFFFFF !important;
            font-size: 14.5px !important;
            padding: 12px 16px !important;
            border-radius: 14px !important;
            transition: all 0.25s ease !important;
            line-height: 1.5 !important;
        }

        .event-form-control:focus, .event-form-select:focus {
            background-color: #1D3A63 !important;
            border-color: #38BDF8 !important;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.25) !important;
            color: #FFFFFF !important;
            outline: none !important;
        }

        .event-form-control::placeholder,
        .event-form-control::-webkit-input-placeholder,
        .event-form-control::-moz-placeholder,
        .event-form-control:-ms-input-placeholder {
            color: #94A3B8 !important;
            opacity: 1 !important;
        }

        .event-input-group {
            display: flex;
            width: 100%;
        }

        .event-input-group .input-group-text {
            background-color: #1E3B66 !important;
            border: 1.5px solid rgba(56, 189, 248, 0.3) !important;
            border-right: none !important;
            border-top-left-radius: 14px !important;
            border-bottom-left-radius: 14px !important;
            padding: 12px 16px !important;
            color: #38BDF8 !important;
            font-size: 15px !important;
            transition: all 0.25s ease !important;
        }

        .event-input-group .event-form-control {
            border-left: none !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 14px !important;
            border-bottom-right-radius: 14px !important;
        }

        .event-input-group:focus-within .input-group-text {
            border-color: #38BDF8 !important;
            background-color: #24497E !important;
            color: #7DD3FC !important;
        }

        .event-form-select option {
            background-color: #0D1A30 !important;
            color: #FFFFFF !important;
            padding: 10px !important;
        }

        .event-helper-text {
            color: #94A3B8 !important;
            font-size: 12px !important;
            margin-top: 6px !important;
            line-height: 1.4 !important;
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
                        GBI ERC SAWANGAN &bull; DRP OUTSTANDING TEENS
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
                    DRP Outstanding Teens (DOT) GBI ERC Sawangan adalah wadah keluarga bagi generasi muda untuk menemukan tujuan hidup di dalam Kristus.
                </p>
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
                            @php
                                $eventImg = null;
                                if($event->image) {
                                    if(file_exists(public_path('uploads/events/' . $event->image))) {
                                        $eventImg = asset('uploads/events/' . $event->image);
                                    } elseif(file_exists(public_path('images/' . $event->image))) {
                                        $eventImg = asset('images/' . $event->image);
                                    }
                                }
                                if(!$eventImg && stripos($event->title, 'Revival') !== false && file_exists(public_path('images/drn.jpeg'))) {
                                    $eventImg = asset('images/drn.jpeg');
                                }
                            @endphp
                            @if($eventImg)
                                <div class="mb-3 overflow-hidden rounded-4" style="aspect-ratio: 16/9;">
                                    <img src="{{ $eventImg }}" alt="{{ $event->title }}" class="w-100 h-100 object-fit-cover" loading="lazy">
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
                                    <i class="fa-solid fa-clock text-info me-2"></i> Pukul {{ $event->time_formatted }} WIB
                                </div>
                                <div class="small text-muted mb-3">
                                    <i class="fa-solid fa-location-dot text-danger me-2"></i> {{ $event->location }}
                                </div>
                                <button type="button" class="btn btn-sm btn-cyan-pill w-100 fw-bold" onclick="openEventRegistration({{ $event->id }}, '{{ addslashes($event->title) }}', '{{ date('d M Y', strtotime($event->event_date)) }}', '{{ $event->time_formatted }} WIB', '{{ addslashes($event->location) }}')">
                                    <i class="fa-solid fa-ticket me-1"></i> Daftar & Dapatkan E-Tiket
                                </button>
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
                <p class="text-muted small">Cari grup sesuai tahun kelahiranmu (klik salah satu untuk melihat info & galeri kegiatan):</p>
            </div>

            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                    <div class="cell-group-chip" onclick="openCoolModal('jireh')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Jireh">
                        <h5 class="fw-bold mb-1">Jireh</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2007</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Keren</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--cyan-electric); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="cell-group-chip" onclick="openCoolModal('growing-generation')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Growing Generation">
                        <h5 class="fw-bold mb-1">Growing Generation</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2008</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Kayla</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--cyan-electric); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="cell-group-chip" onclick="openCoolModal('the-lions')" role="button" tabindex="0" title="Klik untuk info & galeri Cool The Lions">
                        <h5 class="fw-bold mb-1">The Lions</h5>
                        <span class="badge mb-2" style="background: rgba(245, 158, 11, 0.15); color: var(--amber-gold);">Kelahiran 2009</span>
                        <p class="small fw-bold mb-0" style="color: var(--amber-gold);">Ketua: Ka Jayden</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--amber-gold); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="cell-group-chip" onclick="openCoolModal('posteros-shine')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Posteros Shine (Gen 1)">
                        <h5 class="fw-bold mb-1">Posteros Shine (Gen 1)</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Melfi</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--cyan-electric); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="cell-group-chip" onclick="openCoolModal('awesome')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Awesome (Gen 2)">
                        <h5 class="fw-bold mb-1">Awesome (Gen 2)</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Valen</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--cyan-electric); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="cell-group-chip" onclick="openCoolModal('the-miracle')" role="button" tabindex="0" title="Klik untuk info & galeri Cool The Miracle (Gen 3)">
                        <h5 class="fw-bold mb-1">The Miracle (Gen 3)</h5>
                        <span class="badge mb-2" style="background: rgba(245, 158, 11, 0.15); color: var(--amber-gold);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--amber-gold);">Ketua: Ka Matias</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--amber-gold); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                    <div class="cell-group-chip" onclick="openCoolModal('everlasting-joy')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Everlasting Joy (Gen 4)">
                        <h5 class="fw-bold mb-1">Everlasting Joy (Gen 4)</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2010 - 2011</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Esther</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--cyan-electric); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="cell-group-chip" onclick="openCoolModal('hoshiah-zion')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Hoshiah Zion">
                        <h5 class="fw-bold mb-1">Hoshiah Zion</h5>
                        <span class="badge mb-2" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric);">Kelahiran 2012</span>
                        <p class="small fw-bold mb-0" style="color: var(--cyan-electric);">Ketua: Ka Dyto</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--cyan-electric); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="450">
                    <div class="cell-group-chip" onclick="openCoolModal('salvation')" role="button" tabindex="0" title="Klik untuk info & galeri Cool Salvation">
                        <h5 class="fw-bold mb-1">Salvation</h5>
                        <span class="badge mb-2" style="background: rgba(245, 158, 11, 0.15); color: var(--amber-gold);">Kelahiran 2012 - 2013</span>
                        <p class="small fw-bold mb-0" style="color: var(--amber-gold);">Ketua: Ka Maureen</p>
                        <div class="chip-click-hint mt-2 pt-2 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-center gap-1 small" style="color: var(--amber-gold); font-size: 11px;">
                            <i class="fa-solid fa-images"></i> Info & Galeri <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                        </div>
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
                            Bertempat di <strong>DOT Room</strong>Gedung GBI ERC Sawangan. Ruangan ber-AC dan nyaman untuk jemaat baru.
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
                                        <div class="input-group">
                                            <span class="input-group-text border-0 fw-bold" style="background: rgba(56, 189, 248, 0.15); color: #22C55E; border-top-left-radius: 12px; border-bottom-left-radius: 12px; font-size: 14px;">
                                                <i class="fa-brands fa-whatsapp me-1"></i> +62
                                            </span>
                                            <input type="tel" inputmode="numeric" name="phone_number" class="form-control form-control-youth phone-next-input" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none !important;" placeholder="81234567890" required>
                                        </div>
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
                                        <label class="text-ice small fw-bold mb-1">No. Telp / WhatsApp Orang Tua</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-0 fw-bold" style="background: rgba(56, 189, 248, 0.15); color: #22C55E; border-top-left-radius: 12px; border-bottom-left-radius: 12px; font-size: 14px;">
                                                <i class="fa-brands fa-whatsapp me-1"></i> +62
                                            </span>
                                            <input type="tel" inputmode="numeric" name="parent_phone" class="form-control form-control-youth phone-next-input" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none !important;" placeholder="81234567890">
                                        </div>
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
                    &copy; {{ date('Y') }} <strong class="text-white">DRP Outstanding Teens (DOT)</strong> &bull; GBI ERC Sawangan. All rights reserved.
                </p>
                <div class="small text-muted">
                    Fun Disciples, Fun Community ✨
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING PILL EVENT MENDATANG -->
    @if(isset($featuredEvent) && $featuredEvent)
        @php
            $bannerImage = null;
            if (!empty($featuredEvent->image)) {
                if (file_exists(public_path('uploads/events/' . $featuredEvent->image))) {
                    $bannerImage = asset('uploads/events/' . $featuredEvent->image);
                } elseif (file_exists(public_path('images/' . $featuredEvent->image))) {
                    $bannerImage = asset('images/' . $featuredEvent->image);
                }
            }
            if (!$bannerImage && stripos($featuredEvent->title, 'Revival') !== false && file_exists(public_path('images/drn.jpeg'))) {
                $bannerImage = asset('images/drn.jpeg');
            }
        @endphp

        <div id="floatingEventPill" class="position-fixed bottom-0 start-0 m-3 z-3" style="cursor: pointer; max-width: calc(100vw - 30px);" onclick="openUpcomingPopup()">
            <div class="badge rounded-pill p-2 pe-3 d-flex align-items-center gap-2 shadow-lg" style="background: rgba(17, 34, 64, 0.95); border: 1px solid var(--cyan-electric); backdrop-filter: blur(10px); max-width: 100%;">
                @if($bannerImage)
                    <img src="{{ $bannerImage }}" alt="Banner" class="rounded-circle flex-shrink-0" style="width: 32px; height: 32px; object-fit: cover; border: 2px solid var(--cyan-electric);">
                @else
                    <span class="badge bg-danger rounded-circle p-2 flex-shrink-0" style="box-shadow: 0 0 10px rgba(239, 68, 68, 0.7);"><i class="fa-solid fa-fire text-white"></i></span>
                @endif
                <div class="text-start text-truncate" style="max-width: 240px;">
                    <div class="text-white fw-bold text-truncate" style="font-size: 12px;">{{ $featuredEvent->title }}</div>
                    <div class="small text-info text-truncate" style="font-size: 10px;"><i class="fa-regular fa-calendar me-1"></i>{{ date('d M Y', strtotime($featuredEvent->event_date)) }} &bull; Klik untuk Info & Tiket</div>
                </div>
            </div>
        </div>

        <!-- MODAL POP UP BANNER EVENT MENDATANG -->
        <div class="modal fade" id="upcomingEventPopupModal" tabindex="-1" aria-labelledby="upcomingEventLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
                <div class="modal-content text-start" style="background: #112240; border: 1px solid rgba(56, 189, 248, 0.35); border-radius: 28px; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.8), 0 0 40px rgba(56, 189, 248, 0.2); overflow: hidden;">
                    
                    <!-- BANNER POSTER EVENT RESMI -->
                    @if($bannerImage)
                        <div class="position-relative overflow-hidden text-center" style="background: #060D18;">
                            <img src="{{ $bannerImage }}" alt="{{ $featuredEvent->title }} Banner" class="w-100" style="max-height: clamp(200px, 35vh, 320px); object-fit: cover; object-position: center 15%; display: block; cursor: pointer;" onclick="openLightbox('{{ $bannerImage }}', 'Poster Resmi {{ addslashes($featuredEvent->title) }}', true)" title="Klik untuk melihat poster penuh">
                            
                            <!-- Gradient Fade Overlay -->
                            <div class="position-absolute start-0 end-0 bottom-0" style="height: 100px; background: linear-gradient(to top, #112240 15%, rgba(17, 34, 64, 0.7) 60%, transparent 100%); pointer-events: none;"></div>
                            
                            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow" data-bs-dismiss="modal" aria-label="Close" style="background-color: rgba(10, 22, 40, 0.75); border: 1px solid rgba(255,255,255,0.25); padding: 8px; border-radius: 50%; z-index: 10;"></button>

                            <div class="position-absolute bottom-0 start-0 m-3 z-1">
                                <span class="badge rounded-pill px-3 py-1 fw-bold text-uppercase" style="background: linear-gradient(135deg, #F59E0B, #EF4444); color: #FFFFFF; font-size: 11px; letter-spacing: 1px; box-shadow: 0 4px 15px rgba(245, 158, 11, 0.5);">
                                    <i class="fa-solid fa-fire me-1 text-white"></i> Special Upcoming Event
                                </span>
                            </div>

                            <button type="button" class="btn btn-sm position-absolute bottom-0 end-0 m-3 rounded-pill px-3 text-white z-1" style="background: rgba(10,22,40,0.85); border: 1px solid rgba(56,189,248,0.4); font-size: 11px; backdrop-filter: blur(8px);" onclick="openLightbox('{{ $bannerImage }}', 'Poster Resmi {{ addslashes($featuredEvent->title) }}', true)">
                                <i class="fa-solid fa-expand me-1 text-info"></i> Perbesar Poster
                            </button>
                        </div>
                    @endif

                    <!-- Content Details -->
                    <div class="position-relative text-center px-4 pt-{{ $bannerImage ? '2' : '5' }} pb-4">
                        @if(!$bannerImage)
                            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                            <span class="badge rounded-pill px-3 py-2 fw-bold text-uppercase mb-3" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.25), rgba(239, 68, 68, 0.25)); color: #FBBF24; border: 1px solid rgba(245, 158, 11, 0.5); font-size: 11px; letter-spacing: 1px;">
                                <i class="fa-solid fa-fire text-warning me-1"></i> Special Upcoming Event
                            </span>
                        @endif

                        <h2 class="fw-bold text-white mb-1" style="font-family: 'Outfit', sans-serif; font-size: clamp(20px, 5vw, 26px); line-height: 1.2;">
                            {{ $featuredEvent->title }}
                        </h2>
                        
                        <p class="small mb-3" style="color: #94A3B8;">
                            DRP Outstanding Teens (DOT) &bull; GBI Sawangan
                        </p>

                        <!-- Highlight Box -->
                        <div class="rounded-4 p-3 mb-3 text-start mx-auto" style="background: rgba(10, 22, 40, 0.75); border: 1px solid rgba(56, 189, 248, 0.2); max-width: 440px;">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <div class="rounded-3 p-2 text-center" style="background: rgba(56, 189, 248, 0.15); color: #38BDF8; min-width: 45px;">
                                    <i class="fa-regular fa-calendar-check fs-5"></i>
                                </div>
                                <div>
                                    <div class="small text-muted" style="font-size: 11px;">TANGGAL & WAKTU</div>
                                    <div class="fw-bold text-white" style="font-size: 14px;">
                                        {{ date('l, d F Y', strtotime($featuredEvent->event_date)) }} &bull; {{ $featuredEvent->time_formatted }} WIB
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 p-2 text-center" style="background: rgba(239, 68, 68, 0.15); color: #F87171; min-width: 45px;">
                                    <i class="fa-solid fa-location-dot fs-5"></i>
                                </div>
                                <div>
                                    <div class="small text-muted" style="font-size: 11px;">LOKASI</div>
                                    <div class="fw-bold text-white" style="font-size: 14px;">
                                        {{ $featuredEvent->location }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="small text-light mb-4 px-2" style="line-height: 1.6; color: #CBD5E1;">
                            {{ Str::limit($featuredEvent->description, 160) }}
                        </p>

                        <!-- Tombol CTA -->
                        <div class="d-flex flex-column gap-2">
                            <button type="button" class="btn py-3 fw-bold rounded-pill text-white shadow-lg" style="background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%); font-size: 15px;" onclick="openEventRegistration({{ $featuredEvent->id }}, '{{ addslashes($featuredEvent->title) }}', '{{ date('d M Y', strtotime($featuredEvent->event_date)) }}', '{{ $featuredEvent->time_formatted }} WIB', '{{ addslashes($featuredEvent->location) }}')">
                                <i class="fa-solid fa-ticket me-2"></i> Daftar Sekarang (Dapatkan E-Tiket & QR)
                            </button>
                            <button type="button" class="btn btn-link text-secondary text-decoration-none small" data-bs-dismiss="modal">
                                Nanti Saja
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- MODAL REGISTRASI EVENT -->
    <div class="modal fade" id="eventRegisterModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 540px;">
            <div class="modal-content text-start event-modal-card">
                <div class="modal-header event-modal-header border-0 pb-2">
                    <div>
                        <span class="badge bg-info bg-opacity-25 text-info border border-info border-opacity-50 px-3 py-1 mb-2 rounded-pill" style="font-size: 11.5px; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-ticket me-1"></i> Registrasi Peserta
                        </span>
                        <h4 class="modal-title fw-bold text-white mb-1" id="regModalTitle">Daftar Event DOT</h4>
                        <p class="small mb-0" id="regModalSubtitle" style="color: #94A3B8; font-size: 13px; line-height: 1.5;">Isi data dirimu untuk mendapatkan E-Tiket & QR Code kehadiran.</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body event-modal-body pt-2">
                    <div id="regErrorAlert" class="alert d-none p-3 rounded-4 mb-3 shadow" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.4); font-size: 13px;"></div>

                    <form id="eventRegisterForm" onsubmit="submitEventRegistration(event)">
                        @csrf
                        <input type="hidden" name="event_id" id="formEventId" value="{{ isset($featuredEvent) && $featuredEvent ? $featuredEvent->id : '' }}">

                        <div class="mb-3">
                            <label class="event-form-label">Nama Lengkap <span class="text-req">*</span></label>
                            <div class="input-group event-input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="name" id="regName" class="form-control event-form-control" placeholder="Nama lengkap kamu..." required oninput="checkNameAvailability(this.value)">
                            </div>
                            <div id="nameCheckFeedback" class="small mt-1.5 d-none" style="font-size: 12px; line-height: 1.4;"></div>
                        </div>

                        <div class="mb-3">
                            <label class="event-form-label">Nomor WhatsApp / HP <span class="text-req">*</span></label>
                            <div class="input-group event-input-group">
                                <span class="input-group-text fw-bold" style="color: #22C55E; font-size: 14px;">
                                    <i class="fa-brands fa-whatsapp me-1.5"></i> +62
                                </span>
                                <input type="tel" name="phone" id="regPhone" class="form-control event-form-control phone-next-input" placeholder="81234567890" required>
                            </div>
                            <div class="event-helper-text">
                                <i class="fa-solid fa-circle-info me-1"></i> E-Tiket dan QR Code akan terhubung dengan nomor WhatsApp ini.
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="event-form-label">Kategori / Umur <span class="text-req">*</span></label>
                                <select name="category" id="regCategory" class="form-select event-form-control event-form-select" required>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Kuliah / Pemuda">Kuliah / Pemuda</option>
                                    <option value="Pelayan / Mentor">Pelayan / Mentor</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="event-form-label">Email (Opsional)</label>
                                <input type="email" name="email" id="regEmail" class="form-control event-form-control" placeholder="kamu@gmail.com">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="event-form-label">Asal Sekolah / Cool / Gereja</label>
                            <input type="text" name="origin" id="regOrigin" class="form-control event-form-control" placeholder="cth: SMPN 1 Sawangan / Cool 2009">
                        </div>

                        <button type="submit" id="btnSubmitReg" class="btn w-100 py-3 fw-bold rounded-pill text-white shadow-lg" style="background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%); font-size: 15.5px; border: none;">
                            <span id="btnRegSpinner" class="spinner-border spinner-border-sm me-2 d-none"></span>
                            <i class="fa-solid fa-qrcode me-2" id="btnRegIcon"></i> Dapatkan E-Tiket & QR Code Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL HASIL E-TIKET SETELAH MENDAFTAR -->
    <div class="modal fade" id="eventTicketModal" tabindex="-1" aria-hidden="true" style="z-index: 1080;">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px; z-index: 1081; position: relative;">
            <div class="modal-content text-center p-4 position-relative" style="background: #112240; border: 1px solid rgba(56, 189, 248, 0.35); border-radius: 28px; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.8); z-index: 1082;">
                
                <div class="d-inline-flex p-3 rounded-circle mx-auto mb-2" style="background: rgba(16, 185, 129, 0.15); color: #10B981;">
                    <i class="fa-solid fa-circle-check fs-2"></i>
                </div>
                
                <h4 class="fw-bold text-white mb-1">Pendaftaran Berhasil! 🎉</h4>
                <p class="text-secondary small mb-3">Simpan E-Tiket ini dan tunjukkan QR Code ke panitia saat tiba di gate masuk.</p>

                <!-- Card Tiket Mini -->
                <div class="rounded-4 p-3 mb-3 text-center" style="background: #0D1C33; border: 1px dashed rgba(56, 189, 248, 0.3);">
                    <div class="badge bg-primary bg-opacity-25 text-info mb-2 px-3 py-1 font-monospace fw-bold" id="ticketCodeDisplay" style="font-size: 16px; letter-spacing: 2px;">
                        DRN-XXXXX
                    </div>
                    
                    <h5 class="fw-bold text-white mb-1" id="ticketNameDisplay">Nama Peserta</h5>
                    <div class="small text-secondary mb-3" id="ticketDetailDisplay">10 Oktober 2026 &bull; 17:30 WIB</div>

                    <!-- QR Code Box -->
                    <div class="bg-white p-3 rounded-4 d-inline-block shadow-sm mb-2">
                        <div id="modalQrCode"></div>
                    </div>
                    
                    <small class="text-secondary d-block" style="font-size: 11px;">Scan QR ini saat check-in di gate masuk</small>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex flex-column gap-2 mt-2" style="position: relative; z-index: 1085;">
                    <a id="btnViewFullTicket" href="#" target="_blank" class="btn py-2 fw-bold text-white rounded-pill shadow-sm" style="background: linear-gradient(135deg, #0284C7, #2563EB); pointer-events: auto; cursor: pointer; text-decoration: none;" onclick="handleOpenTicketUrl(event, this)">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka Halaman Tiket Lengkap & Simpan
                    </a>
                    <button type="button" class="btn btn-outline-secondary text-light rounded-pill py-2" onclick="closeTicketModal()" style="pointer-events: auto; cursor: pointer;">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL LIGHTBOX POSTER RESMI -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true" style="z-index: 1065;">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 580px;">
            <div class="modal-content border-0 text-center" style="background: #0B1629; border: 1px solid rgba(56, 189, 248, 0.35) !important; border-radius: 28px; box-shadow: 0 30px 80px rgba(0, 0, 0, 0.95), 0 0 40px rgba(56, 189, 248, 0.2); overflow: hidden;">
                
                <div class="modal-header border-0 pb-0 pt-3 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-info bg-opacity-25 text-info border border-info border-opacity-50 px-2.5 py-1 rounded-pill" style="font-size: 11px;">
                            <i class="fa-regular fa-image me-1"></i> Poster Resmi
                        </span>
                        <span id="lightboxCaption" class="text-white small fw-bold text-truncate" style="max-width: 260px;"></span>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-3 text-center">
                    <img id="lightboxImg" src="" alt="Poster" class="img-fluid rounded-4 shadow-lg" style="max-height: 72vh; width: auto; object-fit: contain; border: 1px solid rgba(255, 255, 255, 0.12);">
                </div>

                <div class="modal-footer border-0 pt-0 pb-3 px-4 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-outline-secondary text-light btn-sm rounded-pill px-3" data-bs-dismiss="modal">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Event
                    </button>
                    @if(isset($featuredEvent) && $featuredEvent)
                        <button type="button" id="btnLightboxRegister" class="btn btn-sm rounded-pill px-4 fw-bold text-white shadow d-none" style="background: linear-gradient(135deg, #0284C7, #2563EB); border: none;" onclick="lightboxToRegistration()">
                            <i class="fa-solid fa-ticket me-1"></i> Daftar Sekarang
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DETAIL COOL GROUP (#coolDetailModal) -->
    <div class="modal fade" id="coolDetailModal" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0" style="background: #0B1629; border: 1px solid rgba(56, 189, 248, 0.35) !important; border-radius: 28px; box-shadow: 0 30px 80px rgba(0, 0, 0, 0.95), 0 0 40px rgba(56, 189, 248, 0.2); overflow: hidden;">
                
                <!-- MODAL HEADER -->
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span id="coolModalBadge" class="badge rounded-pill px-3 py-1.5" style="background: rgba(56, 189, 248, 0.15); color: var(--cyan-electric); border: 1px solid rgba(56, 189, 248, 0.3); font-size: 12px;">
                            Kelahiran 2007
                        </span>
                        <span class="badge bg-primary bg-opacity-25 text-info border border-info border-opacity-25 px-2.5 py-1 rounded-pill" style="font-size: 11px;">
                            <i class="fa-solid fa-users me-1"></i> Komunitas Sel DOT
                        </span>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- MODAL BODY -->
                <div class="modal-body p-4">
                    <!-- COOL TITLE & MOTTO -->
                    <div class="mb-4 text-center text-sm-start">
                        <h2 id="coolModalTitle" class="display-6 fw-bold text-white mb-2">Nama Cool</h2>
                        <p id="coolModalMotto" class="text-ice mb-0" style="font-size: 0.98rem; line-height: 1.6;"></p>
                    </div>

                    <!-- LEADER PROFILE CARD -->
                    <div class="rounded-4 p-3 p-md-4 mb-4" style="background: rgba(18, 35, 63, 0.7); border: 1px solid var(--navy-border);">
                        <div class="d-flex flex-column flex-sm-row align-items-center gap-3 text-center text-sm-start">
                            <div class="position-relative">
                                <img id="coolModalLeaderAvatar" src="" alt="Ketua Cool" class="rounded-circle shadow" style="width: 76px; height: 76px; object-fit: cover; border: 3px solid var(--cyan-electric); background: #0A1628;">
                                <span class="position-absolute bottom-0 end-0 bg-success border border-dark rounded-circle" title="Aktif melayani" style="width: 16px; height: 16px;"></span>
                            </div>
                            <div class="flex-grow-1">
                                <span class="badge mb-1 px-2.5 py-0.5 rounded-pill" style="background: rgba(245, 158, 11, 0.15); color: #FBBF24; border: 1px solid rgba(245, 158, 11, 0.3); font-size: 11px;">
                                    <i class="fa-solid fa-crown me-1"></i> KETUA COOL
                                </span>
                                <h4 id="coolModalLeaderName" class="fw-bold text-white mb-1">Nama Ketua</h4>
                                <p id="coolModalLeaderDesc" class="small text-muted mb-0">Siap mendampingi dan menyambut kamu bertumbuh bersama di Cool ini!</p>
                            </div>
                            <div>
                                <a id="coolModalLeaderWa" href="#" target="_blank" class="btn btn-sm btn-outline-cyan rounded-pill px-3 py-2 text-nowrap">
                                    <i class="fa-brands fa-whatsapp text-success me-1"></i> Chat WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- COOL ACTIVITY GALLERY -->
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="fw-bold text-white mb-0">
                                <i class="fa-solid fa-camera-retro text-info me-2"></i> Galeri Kegiatan Cool
                            </h5>
                            <span class="small text-muted">Klik foto untuk perbesar</span>
                        </div>

                        <div class="row g-3" id="coolModalGalleryGrid">
                            <!-- Injected dynamically via JS -->
                        </div>
                    </div>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer border-0 pt-0 pb-4 px-4 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                    <div class="small text-muted text-center text-sm-start">
                        <i class="fa-solid fa-location-dot me-1 text-danger"></i> GBI ERC Sawangan &bull; DOT Room Lantai 2
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-outline-secondary text-light btn-sm rounded-pill px-3" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="button" class="btn btn-cyan-pill btn-sm rounded-pill px-4" onclick="joinThisCool()">
                            <i class="fa-solid fa-user-plus me-1"></i> Gabung Cool Ini
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

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

        let upcomingModalInstance = null;
        let regModalInstance = null;
        let ticketModalInstance = null;
        let lightboxModalInstance = null;
        let coolModalInstance = null;
        let openedFromUpcomingModal = false;
        let openedFromCoolModal = false;
        let isNavigatingToRegister = false;
        let currentActiveCoolName = '';

        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Modal
            const upModalEl = document.getElementById('upcomingEventPopupModal');
            if (upModalEl) upcomingModalInstance = new bootstrap.Modal(upModalEl);

            const regModalEl = document.getElementById('eventRegisterModal');
            if (regModalEl) regModalInstance = new bootstrap.Modal(regModalEl);

            const tickModalEl = document.getElementById('eventTicketModal');
            if (tickModalEl) ticketModalInstance = new bootstrap.Modal(tickModalEl);

            const coolModalEl = document.getElementById('coolDetailModal');
            if (coolModalEl) coolModalInstance = new bootstrap.Modal(coolModalEl);

            const lbModalEl = document.getElementById('lightboxModal');
            if (lbModalEl) {
                lightboxModalInstance = new bootstrap.Modal(lbModalEl);
                lbModalEl.addEventListener('hidden.bs.modal', function() {
                    if (openedFromUpcomingModal && !isNavigatingToRegister) {
                        openedFromUpcomingModal = false;
                        if (upcomingModalInstance) {
                            upcomingModalInstance.show();
                        }
                    } else if (openedFromCoolModal) {
                        openedFromCoolModal = false;
                        if (coolModalInstance) {
                            coolModalInstance.show();
                        }
                    }
                });
            }

            // Tampilkan pop-up event otomatis saat pertama kali dibuka di sesi ini
            @if(isset($featuredEvent) && $featuredEvent)
                const popupSeen = sessionStorage.getItem('dot_event_popup_seen');
                if (!popupSeen && upcomingModalInstance) {
                    setTimeout(() => {
                        upcomingModalInstance.show();
                        sessionStorage.setItem('dot_event_popup_seen', 'true');
                    }, 800);
                }
            @endif

            // Auto-format input nomor WA agar jemaat yang mengetik 08 atau 628 otomatis bersih
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
                if (backToTopBtn) {
                    if (window.scrollY > 350) {
                        backToTopBtn.classList.add('show');
                    } else {
                        backToTopBtn.classList.remove('show');
                    }
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

        function openUpcomingPopup() {
            if (upcomingModalInstance) {
                upcomingModalInstance.show();
            }
        }

        let nameCheckTimer = null;
        function checkNameAvailability(nameVal) {
            clearTimeout(nameCheckTimer);
            const feedback = document.getElementById('nameCheckFeedback');
            const input = document.getElementById('regName');
            const eventId = document.getElementById('formEventId') ? document.getElementById('formEventId').value : '';

            if (!nameVal || nameVal.trim().length < 2 || !eventId) {
                if (feedback) {
                    feedback.classList.add('d-none');
                    feedback.innerHTML = '';
                }
                if (input) input.style.borderColor = '';
                return;
            }

            nameCheckTimer = setTimeout(() => {
                fetch('{{ route("event.check-name") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').getAttribute('content') : ''
                    },
                    body: JSON.stringify({
                        event_id: eventId,
                        name: nameVal.trim()
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.exists) {
                        if (feedback) {
                            feedback.classList.remove('d-none');
                            feedback.innerHTML = `<span class="text-danger fw-bold"><i class="fa-solid fa-triangle-exclamation me-1"></i> Nama sudah terdaftar</span>`;
                        }
                        if (input) input.style.borderColor = '#EF4444';
                    } else {
                        if (feedback) {
                            feedback.classList.remove('d-none');
                            feedback.innerHTML = `<span class="text-success small"><i class="fa-solid fa-circle-check me-1"></i> Nama tersedia</span>`;
                        }
                        if (input) input.style.borderColor = '#22C55E';
                    }
                })
                .catch(() => {});
            }, 350);
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function openEventRegistration(eventId, title, date, time, location) {
            if (upcomingModalInstance) upcomingModalInstance.hide();

            document.getElementById('formEventId').value = eventId;
            document.getElementById('regModalTitle').innerText = 'Daftar: ' + title;
            document.getElementById('regModalSubtitle').innerText = date + ' • ' + time + ' • ' + location;
            
            const alertBox = document.getElementById('regErrorAlert');
            if (alertBox) {
                alertBox.classList.add('d-none');
                alertBox.innerHTML = '';
            }
            const feedback = document.getElementById('nameCheckFeedback');
            if (feedback) {
                feedback.classList.add('d-none');
                feedback.innerHTML = '';
            }
            const nameInp = document.getElementById('regName');
            if (nameInp) nameInp.style.borderColor = '';
            
            if (regModalInstance) {
                regModalInstance.show();
            }
        }

        function submitEventRegistration(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitReg');
            const spinner = document.getElementById('btnRegSpinner');
            const icon = document.getElementById('btnRegIcon');
            const alertBox = document.getElementById('regErrorAlert');
            const feedback = document.getElementById('nameCheckFeedback');

            btn.disabled = true;
            spinner.classList.remove('d-none');
            icon.classList.add('d-none');
            alertBox.classList.add('d-none');
            alertBox.innerHTML = '';

            const form = document.getElementById('eventRegisterForm');
            const formData = new FormData(form);

            fetch('{{ route("event.register") }}', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(async res => {
                const data = await res.json();
                return { status: res.status, ok: res.ok, data };
            })
            .then(({ status, ok, data }) => {
                btn.disabled = false;
                spinner.classList.add('d-none');
                icon.classList.remove('d-none');

                if (ok && data.success && data.ticket) {
                    // BERHASIL: Tutup modal form dan tampilkan modal tiket
                    if (regModalInstance) regModalInstance.hide();
                    form.reset();
                    if (feedback) feedback.classList.add('d-none');
                    const nameInp = document.getElementById('regName');
                    if (nameInp) nameInp.style.borderColor = '';

                    // Tampilkan data tiket di modal tiket
                    document.getElementById('ticketCodeDisplay').innerText = data.ticket.ticket_code;
                    document.getElementById('ticketNameDisplay').innerText = data.ticket.name;
                    document.getElementById('ticketDetailDisplay').innerText = data.ticket.event_date + ' • ' + data.ticket.event_time;
                    
                    const btnFull = document.getElementById('btnViewFullTicket');
                    if (btnFull) {
                        btnFull.href = data.ticket.ticket_url;
                        btnFull.setAttribute('data-ticket-url', data.ticket.ticket_url);
                    }

                    // Render QR Code
                    const qrContainer = document.getElementById('modalQrCode');
                    qrContainer.innerHTML = '';
                    new QRCode(qrContainer, {
                        text: data.ticket.ticket_code,
                        width: 210,
                        height: 210,
                        colorDark : "#0A1628",
                        colorLight : "#FFFFFF",
                        correctLevel : QRCode.CorrectLevel.M
                    });

                    // Tampilkan ticket modal dengan aman setelah modal pendaftaran tertutup tuntas
                    setTimeout(() => {
                        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                        if (ticketModalInstance) {
                            ticketModalInstance.show();
                        }
                    }, 350);
                } else {
                    // GAGAL: Berikan peringatan gagal "Nama sudah terdaftar" tanpa tautan tiket
                    const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('<br>') : 'Pendaftaran Gagal. Silakan periksa kembali data Anda.');

                    alertBox.innerHTML = `
                        <div class="d-flex align-items-center gap-2.5">
                            <i class="fa-solid fa-triangle-exclamation fs-4 text-danger"></i>
                            <div class="flex-grow-1 text-start">
                                <strong class="text-danger d-block mb-0.5" style="font-size: 14px;">Pendaftaran Gagal!</strong>
                                <div class="text-light opacity-90">${errorMsg}</div>
                            </div>
                        </div>
                    `;
                    alertBox.classList.remove('d-none');
                    alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

                    if (data.field === 'name') {
                        const nameInp = document.getElementById('regName');
                        if (nameInp) {
                            nameInp.style.borderColor = '#EF4444';
                            nameInp.focus();
                        }
                    } else if (data.field === 'phone') {
                        const phoneInp = document.getElementById('regPhone');
                        if (phoneInp) {
                            phoneInp.style.borderColor = '#EF4444';
                            phoneInp.focus();
                        }
                    }
                }
            })
            .catch(err => {
                btn.disabled = false;
                spinner.classList.add('d-none');
                icon.classList.remove('d-none');
                alertBox.innerHTML = `
                    <div class="d-flex align-items-start gap-2.5">
                        <i class="fa-solid fa-circle-xmark fs-4 text-danger mt-0.5"></i>
                        <div class="flex-grow-1 text-start">
                            <strong class="text-danger d-block mb-1" style="font-size: 14px;">Pendaftaran Gagal!</strong>
                            <div class="text-light opacity-90">Terjadi kesalahan koneksi server saat memproses pendaftaran. Silakan coba lagi.</div>
                        </div>
                    </div>
                `;
                alertBox.classList.remove('d-none');
            });
        }

        function handleOpenTicketUrl(e, el) {
            e.preventDefault();
            const url = el.getAttribute('data-ticket-url') || el.getAttribute('href');
            if (url && url !== '#' && url !== '') {
                window.open(url, '_blank');
            }
        }

        function closeTicketModal() {
            if (ticketModalInstance) {
                try { ticketModalInstance.hide(); } catch(e) {}
            }
            const modalEl = document.getElementById('eventTicketModal');
            if (modalEl) {
                modalEl.classList.remove('show');
                modalEl.style.display = 'none';
                modalEl.setAttribute('aria-hidden', 'true');
            }
            // Bersihkan backdrop secara tuntas
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            document.body.classList.remove('modal-open');
            document.body.style.removeProperty('overflow');
            document.body.style.removeProperty('padding-right');
        }

        function openLightbox(src, title, fromUpcoming = false) {
            const lbImg = document.getElementById('lightboxImg');
            const lbCap = document.getElementById('lightboxCaption');
            if (lbImg) lbImg.src = src;
            if (lbCap) lbCap.textContent = title || '';

            const btnRegister = document.getElementById('btnLightboxRegister');
            if (btnRegister) {
                if (fromUpcoming) {
                    btnRegister.classList.remove('d-none');
                } else {
                    btnRegister.classList.add('d-none');
                }
            }

            if (fromUpcoming) {
                openedFromUpcomingModal = true;
                if (upcomingModalInstance) {
                    upcomingModalInstance.hide();
                }
            } else {
                openedFromUpcomingModal = false;
            }

            setTimeout(() => {
                if (lightboxModalInstance) {
                    lightboxModalInstance.show();
                } else {
                    const modalEl = document.getElementById('lightboxModal');
                    if (modalEl) {
                        lightboxModalInstance = new bootstrap.Modal(modalEl);
                        lightboxModalInstance.show();
                    }
                }
            }, fromUpcoming ? 200 : 0);
        }

        function lightboxToRegistration() {
            isNavigatingToRegister = true;
            if (lightboxModalInstance) {
                lightboxModalInstance.hide();
            }
            setTimeout(() => {
                isNavigatingToRegister = false;
                openedFromUpcomingModal = false;
                @if(isset($featuredEvent) && $featuredEvent)
                    openEventRegistration({{ $featuredEvent->id }}, '{{ addslashes($featuredEvent->title) }}', '{{ date('d M Y', strtotime($featuredEvent->event_date)) }}', '{{ $featuredEvent->time_formatted }} WIB', '{{ addslashes($featuredEvent->location) }}');
                @endif
            }, 300);
        }

        // DATA 9 COOL GROUP DOT (Profil, Ketua, Motto & Galeri Kegiatan)
        const coolGroupsData = {
            'jireh': {
                name: 'Jireh',
                birth: 'Kelahiran 2007',
                leader: 'Ka Keren',
                avatar: 'https://ui-avatars.com/api/?name=Keren&background=0284C7&color=ffffff&size=200&bold=true',
                desc: 'Kakak pembimbing yang hangat dan siap menemani langkahmu bertumbuh serta berakar kuat di dalam Tuhan.',
                motto: '“Jehovah Jireh - Tuhan yang selalu mencukupi dan menyediakan yang terbaik dalam setiap musim hidup kita.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Keren,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Jireh%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776736617.jpg") }}', caption: 'Sharing Firman & Diskusi Santai Cool Jireh' },
                    { src: '{{ asset("uploads/gallery/1776846904.jpg") }}', caption: 'Makan Bareng & Fellowship Penuh Sukacita' },
                    { src: '{{ asset("uploads/gallery/1776846921.jpg") }}', caption: 'Kebersamaan & Foto Seru Bareng Cool Jireh' },
                    { src: '{{ asset("images/ibadah.jpeg") }}', caption: 'Ibadah & Praise Worship Bersama' }
                ]
            },
            'growing-generation': {
                name: 'Growing Generation',
                birth: 'Kelahiran 2008',
                leader: 'Ka Kayla',
                avatar: 'https://ui-avatars.com/api/?name=Kayla&background=38BDF8&color=0A1628&size=200&bold=true',
                desc: 'Hangat, suportif, dan selalu terbuka menyambut teman-teman baru yang rindu bertumbuh dan berbuah lebat.',
                motto: '“Generasi muda yang bertumbuh dalam karakter Kristus dan siap menjadi teladan bagi sesama.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Kayla,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Growing%20Generation%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776736607.jpg") }}', caption: 'Ice Breaking & Games Seru di Cool Growing Generation' },
                    { src: '{{ asset("uploads/gallery/1776846879.jpg") }}', caption: 'Saat Teduh & Saling Mendoakan Bareng' },
                    { src: '{{ asset("uploads/gallery/1776736574.jpg") }}', caption: 'Ibadah Raya & Kebersamaan DOT Teens' },
                    { src: '{{ asset("images/1.jpg") }}', caption: 'Hangout Asik Setelah Cool' }
                ]
            },
            'the-lions': {
                name: 'The Lions',
                birth: 'Kelahiran 2009',
                leader: 'Ka Jayden',
                avatar: 'https://ui-avatars.com/api/?name=Jayden&background=F59E0B&color=ffffff&size=200&bold=true',
                desc: 'Penuh energi, solid, dan selalu siap membakar semangat iman teman-teman sebayanya.',
                motto: '“Berani dan teguh seperti singa Yehezkiel, tidak mudah goyah di tengah arus pergaulan zaman now.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Jayden,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20The%20Lions%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776846921.jpg") }}', caption: 'Momen Solidaritas & Kompaknya The Lions' },
                    { src: '{{ asset("uploads/gallery/1776736617.jpg") }}', caption: 'Diskusi Firman Tuhan yang Relevan Buat Anak Muda' },
                    { src: '{{ asset("uploads/gallery/1776846904.jpg") }}', caption: 'Keseruan Sesi Santai & Ngemil Bareng' },
                    { src: '{{ asset("images/drn.jpeg") }}', caption: 'Antusiasme Menghadiri Acara Revival Night' }
                ]
            },
            'posteros-shine': {
                name: 'Posteros Shine (Gen 1)',
                birth: 'Kelahiran 2010 - 2011',
                leader: 'Ka Melfi',
                avatar: 'https://ui-avatars.com/api/?name=Melfi&background=0284C7&color=ffffff&size=200&bold=true',
                desc: 'Penuh perhatian dan kehangatan, tempat sharing cerita yang aman dan saling menguatkan.',
                motto: '“Generasi penerus yang bersinar terang memancarkan kasih Kristus di sekolah dan lingkungan keluarga.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Melfi,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Posteros%20Shine%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776736574.jpg") }}', caption: 'Semangat Pujian & Penyembahan Posteros Shine' },
                    { src: '{{ asset("uploads/gallery/1776736607.jpg") }}', caption: 'Games Kebersamaan & Tertawa Lepas' },
                    { src: '{{ asset("uploads/gallery/1776846879.jpg") }}', caption: 'Doa Bersama Menguatkan Satu Sama Lain' },
                    { src: '{{ asset("images/ibadah.jpeg") }}', caption: 'Ibadah Raya Mingguan DOT Room' }
                ]
            },
            'awesome': {
                name: 'Awesome (Gen 2)',
                birth: 'Kelahiran 2010 - 2011',
                leader: 'Ka Valen',
                avatar: 'https://ui-avatars.com/api/?name=Valen&background=8B5CF6&color=ffffff&size=200&bold=true',
                desc: 'Seru, kreatif, dan asik banget buat kamu yang suka sharing santai dan belajar firman Tuhan dengan cara seru.',
                motto: '“Awesome in God! Menjalani masa remaja yang luar biasa bersama sahabat sejati di dalam Tuhan.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Valen,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Awesome%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776846904.jpg") }}', caption: 'Keseruan Hangout & Sharing Cool Awesome' },
                    { src: '{{ asset("uploads/gallery/1776846921.jpg") }}', caption: 'Pose Kompak Sahabat Sejati Cool Awesome' },
                    { src: '{{ asset("uploads/gallery/1776736617.jpg") }}', caption: 'Belajar Firman Tuhan dengan Cara Menyenangkan' },
                    { src: '{{ asset("images/1.jpg") }}', caption: 'Momen Komunitas yang Hangat' }
                ]
            },
            'the-miracle': {
                name: 'The Miracle (Gen 3)',
                birth: 'Kelahiran 2010 - 2011',
                leader: 'Ka Matias',
                avatar: 'https://ui-avatars.com/api/?name=Matias&background=F59E0B&color=ffffff&size=200&bold=true',
                desc: 'Teman bertumbuh yang suportif, selalu siap mendengarkan dan saling mendoakan kebutuhan teman-teman.',
                motto: '“Setiap hari adalah mukjizat, dan kita dipanggil untuk menjadi berkat nyata bagi sesama.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Matias,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20The%20Miracle%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776846879.jpg") }}', caption: 'Waktu Bersaat Teduh & Berdoa Khusyuk' },
                    { src: '{{ asset("uploads/gallery/1776736574.jpg") }}', caption: 'Ibadah Gabungan di Main Sanctuary' },
                    { src: '{{ asset("uploads/gallery/1776736607.jpg") }}', caption: 'Games Tantangan & Kekompakan Tim' },
                    { src: '{{ asset("images/drn.jpeg") }}', caption: 'Semangat Revival Generasi Muda' }
                ]
            },
            'everlasting-joy': {
                name: 'Everlasting Joy (Gen 4)',
                birth: 'Kelahiran 2010 - 2011',
                leader: 'Ka Esther',
                avatar: 'https://ui-avatars.com/api/?name=Esther&background=EC4899&color=ffffff&size=200&bold=true',
                desc: 'Ceria, hangat, dan selalu penuh senyuman yang menyegarkan suasana kumpul persekutuan.',
                motto: '“Sukacita dari Tuhan adalah kekuatan kita yang tak pernah pudar oleh situasi apa pun.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Esther,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Everlasting%20Joy%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776736617.jpg") }}', caption: 'Lingkaran Kasih & Saling Menguatkan' },
                    { src: '{{ asset("uploads/gallery/1776846904.jpg") }}', caption: 'Momen Manis Kebersamaan & Makan Sore' },
                    { src: '{{ asset("uploads/gallery/1776846921.jpg") }}', caption: 'Senyum Ceria Anggota Cool Everlasting Joy' },
                    { src: '{{ asset("images/ibadah.jpeg") }}', caption: 'Menyembah Bersama di Hadirat-Nya' }
                ]
            },
            'hoshiah-zion': {
                name: 'Hoshiah Zion',
                birth: 'Kelahiran 2012',
                leader: 'Ka Dyto',
                avatar: '{{ asset("images/dyto.jpeg") }}',
                desc: 'Aktif, bersemangat tinggi, dan selalu mengajak adik-adik jemaat baru untuk merasa seperti di rumah sendiri.',
                motto: '“Hosana! Keselamatan dan kemuliaan bagi Tuhan, generasi muda pembawa pujian sejati.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Dyto,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Hoshiah%20Zion%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776736607.jpg") }}', caption: 'Keseruan Aktivitas & Games Hoshiah Zion' },
                    { src: '{{ asset("uploads/gallery/1776846879.jpg") }}', caption: 'Saling Menopang dalam Pokok Doa' },
                    { src: '{{ asset("uploads/gallery/1776736574.jpg") }}', caption: 'Kompak Ibadah Bareng Teman Sebaya' },
                    { src: '{{ asset("images/1.jpg") }}', caption: 'Kebersamaan Santai Penuh Tawa' }
                ]
            },
            'salvation': {
                name: 'Salvation',
                birth: 'Kelahiran 2012 - 2013',
                leader: 'Ka Maureen',
                avatar: 'https://ui-avatars.com/api/?name=Maureen&background=F59E0B&color=ffffff&size=200&bold=true',
                desc: 'Penuh perhatian dan keibuan bagi adik-adik awal SMP agar merasa nyaman, terlindungi, dan bergaul positif.',
                motto: '“Teguh dalam keselamatan Kristus, melangkah dengan percaya diri menyongsong masa depan.”',
                wa: 'https://wa.me/6285173280626?text=Halo%20Ka%20Maureen,%20aku%20mau%20tanya%20info%20dan%20jadwal%20kumpul%20Cool%20Salvation%20dong!',
                photos: [
                    { src: '{{ asset("uploads/gallery/1776846921.jpg") }}', caption: 'Keluarga Baru Adik-adik Cool Salvation' },
                    { src: '{{ asset("uploads/gallery/1776736617.jpg") }}', caption: 'Mendengarkan Firman dengan Rasa Ingin Tahu' },
                    { src: '{{ asset("uploads/gallery/1776846904.jpg") }}', caption: 'Sesi Fellowship & Snack Time yang Seru' },
                    { src: '{{ asset("images/drn.jpeg") }}', caption: 'Menghadiri Acara Spesial DOT' }
                ]
            }
        };

        function openCoolModal(coolKey) {
            const cool = coolGroupsData[coolKey];
            if (!cool) return;

            currentActiveCoolName = cool.name;

            const badgeEl = document.getElementById('coolModalBadge');
            const titleEl = document.getElementById('coolModalTitle');
            const mottoEl = document.getElementById('coolModalMotto');
            const leaderNameEl = document.getElementById('coolModalLeaderName');
            const leaderAvatarEl = document.getElementById('coolModalLeaderAvatar');
            const leaderDescEl = document.getElementById('coolModalLeaderDesc');
            const leaderWaEl = document.getElementById('coolModalLeaderWa');

            if (badgeEl) badgeEl.textContent = cool.birth;
            if (titleEl) titleEl.textContent = cool.name;
            if (mottoEl) mottoEl.textContent = cool.motto;
            if (leaderNameEl) leaderNameEl.textContent = cool.leader;
            if (leaderAvatarEl) leaderAvatarEl.src = cool.avatar;
            if (leaderDescEl) leaderDescEl.textContent = cool.desc;
            if (leaderWaEl) leaderWaEl.href = cool.wa;

            const grid = document.getElementById('coolModalGalleryGrid');
            if (grid) {
                grid.innerHTML = '';
                cool.photos.forEach(photo => {
                    const col = document.createElement('div');
                    col.className = 'col-6 col-md-3';
                    col.innerHTML = `
                        <div class="position-relative" onclick="openCoolGalleryPhoto('${photo.src}', '${photo.caption.replace(/'/g, "\\'")}')" role="button" title="${photo.caption}">
                            <img src="${photo.src}" alt="${photo.caption}" class="cool-gallery-thumb" loading="lazy">
                            <div class="small text-truncate mt-1 text-muted" style="font-size: 11px;">
                                ${photo.caption}
                            </div>
                        </div>
                    `;
                    grid.appendChild(col);
                });
            }

            if (coolModalInstance) {
                coolModalInstance.show();
            }
        }

        function openCoolGalleryPhoto(src, caption) {
            openedFromCoolModal = true;
            if (coolModalInstance) {
                coolModalInstance.hide();
            }
            setTimeout(() => {
                openLightbox(src, caption);
            }, 250);
        }

        function joinThisCool() {
            if (coolModalInstance) {
                coolModalInstance.hide();
            }

            setTimeout(() => {
                const joinSection = document.getElementById('join');
                if (joinSection) {
                    const navHeight = document.getElementById('navbarMain') ? document.getElementById('navbarMain').offsetHeight : 75;
                    window.scrollTo({
                        top: joinSection.offsetTop - navHeight + 5,
                        behavior: 'smooth'
                    });
                }

                const fireCellInput = document.querySelector('input[name="fire_cell"]');
                if (fireCellInput) {
                    fireCellInput.value = currentActiveCoolName;
                    fireCellInput.focus();
                    fireCellInput.style.borderColor = 'var(--cyan-electric)';
                    fireCellInput.style.boxShadow = '0 0 15px rgba(56, 189, 248, 0.4)';
                }
            }, 300);
        }
    </script>
</body>
</html>