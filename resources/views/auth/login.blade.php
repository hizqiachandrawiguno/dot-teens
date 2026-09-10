<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Panel - DRP Outstanding Teens</title>
    
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --navy-dark: #0A1628;
            --navy-card: #112240;
            --navy-input: #172A46;
            --navy-border: rgba(56, 189, 248, 0.2);
            --navy-hover: #1E3A5F;
            --cyan-accent: #38BDF8;
            --blue-accent: #2563EB;
            --text-light: #F8FAFC;
            --text-muted: #94A3B8;
        }

        body {
            background: radial-gradient(circle at 50% 20%, #152C4F 0%, #0A1628 70%, #060D18 100%);
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient Glow Circles */
        .ambient-glow {
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.12) 0%, rgba(37, 99, 235, 0.05) 50%, transparent 70%);
            filter: blur(50px);
            z-index: 0;
            pointer-events: none;
        }
        .glow-top { top: -100px; left: 50%; transform: translateX(-50%); }
        .glow-bottom { bottom: -150px; right: -100px; }

        .login-card {
            position: relative;
            z-index: 1;
            background: rgba(17, 34, 64, 0.85);
            border: 1px solid var(--navy-border);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 44px 38px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), 0 0 30px rgba(56, 189, 248, 0.08);
            width: 100%;
            max-width: 440px;
            transition: transform 0.3s ease;
        }

        .brand-badge {
            width: 76px;
            height: 76px;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.15), rgba(37, 99, 235, 0.25));
            border: 1px solid rgba(56, 189, 248, 0.35);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 8px 24px rgba(56, 189, 248, 0.2);
        }

        .brand-badge img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .title-brand {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 24px;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }

        .title-brand span {
            color: var(--cyan-accent);
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #CBD5E1;
            margin-bottom: 8px;
            letter-spacing: 0.2px;
        }

        .text-muted, .text-secondary {
            color: #94A3B8 !important;
        }

        .subtitle-text {
            color: #94A3B8;
            font-size: 13px;
            line-height: 1.5;
        }

        .input-group-text {
            background-color: var(--navy-input) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            border-right: none !important;
            color: var(--cyan-accent) !important;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            padding-left: 16px;
            padding-right: 14px;
        }

        .form-control {
            background-color: var(--navy-input) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            border-left: none !important;
            color: #FFFFFF !important;
            font-size: 14px;
            padding: 12px 16px 12px 0;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            background-color: #1C3355 !important;
            color: #FFFFFF !important;
            box-shadow: none !important;
            border-color: var(--cyan-accent) !important;
        }

        .form-control::placeholder {
            color: #64748B !important;
        }

        /* Autofill Overrides untuk Browser Chromium/Safari/Firefox */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px #172A46 inset !important;
            -webkit-text-fill-color: #FFFFFF !important;
            caret-color: #FFFFFF !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .password-toggle-btn {
            background-color: var(--navy-input) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            border-left: none !important;
            color: #94A3B8 !important;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            padding-right: 16px;
            cursor: pointer;
            transition: color 0.2s;
        }

        .password-toggle-btn:hover {
            color: var(--cyan-accent) !important;
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .password-toggle-btn {
            border-color: var(--cyan-accent) !important;
            background-color: #1C3355 !important;
        }

        .btn-navy-submit {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF;
            border: none;
            font-weight: 700;
            font-size: 15px;
            border-radius: 12px;
            padding: 13px 20px;
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.35);
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-navy-submit:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(56, 189, 248, 0.45);
            color: #FFFFFF;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #94A3B8;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: color 0.2s;
            margin-top: 24px;
        }

        .back-link:hover {
            color: var(--cyan-accent);
        }

        .alert-custom-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #FCA5A5;
            border-radius: 12px;
            font-size: 13px;
            padding: 12px 16px;
        }

        .alert-custom-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6EE7B7;
            border-radius: 12px;
            font-size: 13px;
            padding: 12px 16px;
        }
    </style>
</head>
<body>

    <div class="ambient-glow glow-top"></div>
    <div class="ambient-glow glow-bottom"></div>

    <div class="login-card">
        <!-- Logo & Branding -->
        <div class="text-center">
            <div class="brand-badge">
                <img src="{{ asset('images/logo.png') }}" alt="DOT Teens Logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/48/38bdf8/ffffff?text=DOT';">
            </div>
            <h1 class="title-brand">DOT <span>Admin</span></h1>
            <p class="subtitle-text mb-4">Masuk untuk mengelola data komunitas DRP Outstanding Teens Sawangan.</p>
        </div>
        
        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-custom-success mb-3 d-flex align-items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-custom-danger mb-3 d-flex align-items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form action="/login" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" for="loginEmail">Email SSO / Akun Admin</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" id="loginEmail" name="email" class="form-control" placeholder="admin@dotsawangan.com" value="{{ old('email') }}" required autofocus autocomplete="email">
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label class="form-label mb-0" for="loginPassword">Password</label>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="loginPassword" name="password" class="form-control" style="border-radius: 0;" placeholder="••••••••" required autocomplete="current-password">
                    <span class="password-toggle-btn d-flex align-items-center" onclick="togglePasswordVisibility()" title="Lihat/Sembunyikan Password">
                        <i class="fa-solid fa-eye" id="togglePasswordIcon"></i>
                    </span>
                </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" checked style="background-color: var(--navy-input); border-color: rgba(56, 189, 248, 0.35); cursor: pointer;">
                    <label class="form-check-label small text-muted" for="rememberMe" style="cursor: pointer; user-select: none;">
                        Ingat saya di HP / perangkat ini
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-navy-submit mb-3">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk ke Panel
            </button>
        </form>

        <div class="text-center pt-2">
            <p class="small text-muted mb-2">
                Belum punya akun pengurus? <a href="/register" class="fw-semibold text-decoration-none" style="color: var(--cyan-accent);">Daftar Divisi</a>
            </p>
            <div>
                <a href="/" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Website Utama
                </a>
            </div>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePasswordVisibility() {
            const pwdInput = document.getElementById('loginPassword');
            const icon = document.getElementById('togglePasswordIcon');
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pwdInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Menjaga token sesi tetap aktif saat tab dibuka lama di HP
        setInterval(function() {
            fetch('/up', { method: 'GET' }).catch(() => {});
        }, 10 * 60 * 1000);
    </script>
</body>
</html>