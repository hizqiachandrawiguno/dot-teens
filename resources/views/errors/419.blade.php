<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Sesi Kamu Tertidur Pulas! | DOT Teens</title>
    
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --navy-deep: #0A1628;
            --navy-card: #12233F;
            --navy-border: rgba(56, 189, 248, 0.25);
            --cyan-electric: #38BDF8;
            --blue-royal: #2563EB;
            --pink-accent: #F472B6;
            --amber-gold: #FBBF24;
            --text-ice: #E2E8F0;
            --text-muted: #94A3B8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--navy-deep);
            background: radial-gradient(circle at 50% 25%, #152C4F 0%, #0A1628 65%, #050B14 100%);
            color: var(--text-ice);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            overflow-x: hidden;
            position: relative;
        }

        /* FLOATING STARS & GLOWS */
        .ambient-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            pointer-events: none;
            opacity: 0.5;
        }

        .glow-1 {
            width: 350px;
            height: 350px;
            background: rgba(56, 189, 248, 0.2);
            top: 10%;
            left: 15%;
            animation: floatGlow 8s ease-in-out infinite alternate;
        }

        .glow-2 {
            width: 400px;
            height: 400px;
            background: rgba(244, 114, 182, 0.15);
            bottom: 10%;
            right: 15%;
            animation: floatGlow 10s ease-in-out infinite alternate-reverse;
        }

        @keyframes floatGlow {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(-40px) scale(1.15); }
        }

        /* CARD CONTAINER */
        .expired-card {
            position: relative;
            z-index: 1;
            background: rgba(18, 35, 63, 0.85);
            border: 1px solid var(--navy-border);
            border-radius: 32px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 46px 36px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.7), 0 0 40px rgba(56, 189, 248, 0.15);
            width: 100%;
            max-width: 520px;
            text-align: center;
            animation: popIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.85) translateY(20px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* CUTE SLEEPY MASCOT */
        .mascot-stage {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mascot-body {
            width: 110px;
            height: 110px;
            background: linear-gradient(135deg, #38BDF8 0%, #2563EB 50%, #818CF8 100%);
            border-radius: 50% 50% 45% 45%;
            position: relative;
            box-shadow: 0 12px 35px rgba(56, 189, 248, 0.45);
            animation: breathe 3.5s ease-in-out infinite alternate;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .mascot-body:hover {
            transform: scale(1.08) rotate(5deg);
        }

        @keyframes breathe {
            0% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-10px) scale(1.03, 0.98); }
            100% { transform: translateY(0) scale(1); }
        }

        /* CUTE FACE ELEMENTS */
        .mascot-eye-left, .mascot-eye-right {
            position: absolute;
            top: 42px;
            width: 18px;
            height: 6px;
            border-bottom: 4px solid #0A1628;
            border-radius: 0 0 10px 10px;
        }

        .mascot-eye-left { left: 24px; }
        .mascot-eye-right { right: 24px; }

        .mascot-blush-left, .mascot-blush-right {
            position: absolute;
            top: 52px;
            width: 14px;
            height: 8px;
            background: rgba(244, 114, 182, 0.7);
            border-radius: 50%;
        }

        .mascot-blush-left { left: 16px; }
        .mascot-blush-right { right: 16px; }

        .mascot-mouth {
            position: absolute;
            top: 54px;
            left: 50%;
            transform: translateX(-50%);
            width: 10px;
            height: 6px;
            border-bottom: 3px solid #0A1628;
            border-radius: 0 0 8px 8px;
        }

        /* SLEEPING NIGHTCAP */
        .nightcap {
            position: absolute;
            top: -24px;
            right: 8px;
            width: 44px;
            height: 48px;
            background: linear-gradient(135deg, #F472B6, #EC4899);
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            transform: rotate(25deg);
            filter: drop-shadow(0 4px 10px rgba(244, 114, 182, 0.5));
            animation: waggle 3.5s ease-in-out infinite alternate;
        }

        .nightcap-pom {
            position: absolute;
            top: -30px;
            right: 2px;
            width: 16px;
            height: 16px;
            background: #FFFFFF;
            border-radius: 50%;
            box-shadow: 0 0 10px #FFFFFF;
        }

        @keyframes waggle {
            0% { transform: rotate(20deg); }
            100% { transform: rotate(32deg); }
        }

        /* ANIMATED ZZZ FLOATING PARTICLES */
        .zzz-container {
            position: absolute;
            top: 0;
            right: 0;
            pointer-events: none;
        }

        .z-particle {
            position: absolute;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            color: var(--cyan-electric);
            opacity: 0;
            animation: floatZ 3s ease-out infinite;
        }

        .z-1 { font-size: 14px; top: -10px; right: 10px; animation-delay: 0s; }
        .z-2 { font-size: 20px; top: -30px; right: -5px; animation-delay: 1s; color: var(--pink-accent); }
        .z-3 { font-size: 26px; top: -55px; right: -22px; animation-delay: 2s; color: var(--amber-gold); }

        @keyframes floatZ {
            0% { opacity: 0; transform: translate(0, 0) scale(0.6); }
            40% { opacity: 1; }
            100% { opacity: 0; transform: translate(25px, -45px) scale(1.2); }
        }

        /* BADGE CODE */
        .code-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: var(--cyan-electric);
            padding: 6px 18px;
            border-radius: 9999px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .title-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.85rem;
            font-weight: 800;
            color: #FFFFFF;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .desc-text {
            color: #94A3B8;
            font-size: 0.96rem;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* BUTTONS */
        .btn-cute-primary {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            font-size: 1rem;
            padding: 14px 28px;
            border-radius: 9999px;
            border: none;
            box-shadow: 0 10px 25px rgba(2, 132, 199, 0.4);
            transition: all 0.25s cubic-bezier(0.2, 0.8, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-cute-primary:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            transform: translateY(-3px);
            box-shadow: 0 14px 35px rgba(56, 189, 248, 0.5);
            color: #FFFFFF !important;
        }

        .btn-cute-secondary {
            background: rgba(18, 35, 63, 0.7);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: #FFFFFF !important;
            font-weight: 600;
            font-size: 0.94rem;
            padding: 12px 24px;
            border-radius: 9999px;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            text-decoration: none;
        }

        .btn-cute-secondary:hover {
            background: rgba(30, 58, 95, 0.9);
            border-color: var(--cyan-electric);
            transform: translateY(-2px);
            color: #FFFFFF !important;
        }

        .btn-cute-glass {
            color: #94A3B8 !important;
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 14px;
        }

        .btn-cute-glass:hover {
            color: var(--cyan-electric) !important;
        }
    </style>
</head>
<body>

    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>

    <div class="expired-card">
        <!-- CUTE ANIMATED MASCOT -->
        <div class="mascot-stage">
            <div class="nightcap"></div>
            <div class="nightcap-pom"></div>
            
            <div class="mascot-body" title="Sentuh aku untuk bangun!">
                <div class="mascot-eye-left"></div>
                <div class="mascot-eye-right"></div>
                <div class="mascot-blush-left"></div>
                <div class="mascot-blush-right"></div>
                <div class="mascot-mouth"></div>
            </div>

            <div class="zzz-container">
                <span class="z-particle z-1">z</span>
                <span class="z-particle z-2">z</span>
                <span class="z-particle z-3">Z</span>
            </div>
        </div>

        <!-- BADGE & TEXT -->
        <div class="code-pill">
            <i class="fa-solid fa-clock-rotate-left"></i> ERROR 419 &bull; PAGE EXPIRED
        </div>

        <h1 class="title-text">
            Sesi Kamu Sedang <br><span style="color: var(--cyan-electric);">Tertidur Pulas!</span> ☕😴
        </h1>

        <p class="desc-text">
            Halaman ini ditinggal terlalu lama nih, jadi sistem menguncinya demi keamanan akun dan datamu. Tenang, cukup klik tombol di bawah untuk bangunkan sesinya lagi!
        </p>

        <!-- ACTION BUTTONS -->
        <div class="d-flex flex-column gap-2">
            <button type="button" class="btn-cute-primary" onclick="wakeUpAndReload()">
                <i class="fa-solid fa-wand-magic-sparkles"></i> Bangunkan Sesi & Muat Ulang
            </button>

            <a href="/login" class="btn-cute-secondary">
                <i class="fa-solid fa-lock-open"></i> Masuk ke Panel Admin
            </a>

            <div>
                <a href="/" class="btn-cute-glass">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda DOT
                </a>
            </div>
        </div>
    </div>

    <script>
        function wakeUpAndReload() {
            const btn = document.querySelector('.btn-cute-primary');
            if (btn) {
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Membangunkan sesi...';
                btn.disabled = true;
            }

            // Bersihkan history agar browser me-reload halaman dari server dengan token baru
            setTimeout(() => {
                if (window.history.length > 1) {
                    window.history.back();
                } else {
                    window.location.href = '/login';
                }
            }, 400);
        }
    </script>
</body>
</html>
