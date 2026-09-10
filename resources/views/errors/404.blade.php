<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tersesat! | DOT Teens</title>
    
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
            --navy-border: rgba(56, 189, 248, 0.25);
            --cyan-electric: #38BDF8;
            --blue-royal: #2563EB;
            --amber-gold: #FBBF24;
            --text-ice: #E2E8F0;
            --text-muted: #94A3B8;
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

        .ambient-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            pointer-events: none;
            opacity: 0.5;
        }

        .glow-1 { width: 350px; height: 350px; background: rgba(56, 189, 248, 0.2); top: 10%; left: 15%; animation: floatGlow 8s ease-in-out infinite alternate; }
        .glow-2 { width: 400px; height: 400px; background: rgba(251, 191, 36, 0.15); bottom: 10%; right: 15%; animation: floatGlow 10s ease-in-out infinite alternate-reverse; }

        @keyframes floatGlow { 0% { transform: translateY(0); } 100% { transform: translateY(-30px); } }

        .error-card {
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
            max-width: 500px;
            text-align: center;
        }

        /* CUTE LOST MASCOT */
        .mascot-stage {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mascot-body {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #FBBF24 0%, #F59E0B 50%, #D97706 100%);
            border-radius: 50%;
            position: relative;
            box-shadow: 0 12px 30px rgba(245, 158, 11, 0.45);
            animation: bounce 3s ease-in-out infinite alternate;
        }

        @keyframes bounce {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(6deg); }
            100% { transform: translateY(0) rotate(-4deg); }
        }

        .mascot-eye-left, .mascot-eye-right {
            position: absolute;
            top: 36px;
            width: 12px;
            height: 12px;
            background: #0A1628;
            border-radius: 50%;
        }
        .mascot-eye-left { left: 26px; }
        .mascot-eye-right { right: 26px; }

        .mascot-blush-left, .mascot-blush-right {
            position: absolute;
            top: 48px;
            width: 14px;
            height: 8px;
            background: rgba(239, 68, 68, 0.4);
            border-radius: 50%;
        }
        .mascot-blush-left { left: 16px; }
        .mascot-blush-right { right: 16px; }

        .mascot-mouth {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            width: 14px;
            height: 14px;
            background: #0A1628;
            border-radius: 50%;
        }

        .code-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(245, 158, 11, 0.15);
            border: 1px solid rgba(245, 158, 11, 0.35);
            color: var(--amber-gold);
            padding: 6px 18px;
            border-radius: 9999px;
            font-size: 0.82rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .title-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.85rem;
            font-weight: 800;
            color: #FFFFFF;
            margin-bottom: 12px;
        }

        .desc-text {
            color: #94A3B8;
            font-size: 0.96rem;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .btn-cute-primary {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF !important;
            font-weight: 700;
            font-size: 1rem;
            padding: 13px 28px;
            border-radius: 9999px;
            border: none;
            box-shadow: 0 10px 25px rgba(2, 132, 199, 0.4);
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            text-decoration: none;
        }

        .btn-cute-primary:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            transform: translateY(-2px);
            color: #FFFFFF !important;
        }
    </style>
</head>
<body>
    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>

    <div class="error-card">
        <div class="mascot-stage">
            <div class="mascot-body">
                <div class="mascot-eye-left"></div>
                <div class="mascot-eye-right"></div>
                <div class="mascot-blush-left"></div>
                <div class="mascot-blush-right"></div>
                <div class="mascot-mouth"></div>
            </div>
        </div>

        <div class="code-pill">
            <i class="fa-solid fa-compass"></i> ERROR 404 &bull; PAGE NOT FOUND
        </div>

        <h1 class="title-text">
            Yah, Halamannya <span style="color: var(--amber-gold);">Tersesat!</span> 🧭🥺
        </h1>

        <p class="desc-text">
            Halaman yang kamu cari sepertinya sudah pindah atau tautannya salah ketik. Yuk kembali ke jalan yang benar bareng DOT Teens!
        </p>

        <a href="/" class="btn-cute-primary">
            <i class="fa-solid fa-house"></i> Kembali ke Beranda DOT
        </a>
    </div>
</body>
</html>
