<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pengurus - DRP Outstanding Teens</title>
    
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
            --cyan-accent: #38BDF8;
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
            padding: 30px 20px;
            margin: 0;
            position: relative;
        }

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

        .register-card {
            position: relative;
            z-index: 1;
            background: rgba(17, 34, 64, 0.88);
            border: 1px solid var(--navy-border);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 40px 36px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), 0 0 30px rgba(56, 189, 248, 0.08);
            width: 100%;
            max-width: 480px;
        }

        .title-brand {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 22px;
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .title-brand span {
            color: var(--cyan-accent);
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #CBD5E1;
            margin-bottom: 6px;
        }

        .text-muted, .text-secondary {
            color: #94A3B8 !important;
        }

        .form-control, .form-select {
            background-color: var(--navy-input) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            color: #FFFFFF !important;
            font-size: 14px;
            padding: 11px 14px;
            border-radius: 12px;
            transition: all 0.25s ease;
        }

        .form-control:focus, .form-select:focus {
            background-color: #1C3355 !important;
            color: #FFFFFF !important;
            box-shadow: none !important;
            border-color: var(--cyan-accent) !important;
        }

        .form-control::placeholder {
            color: #64748B !important;
        }

        /* Autofill Overrides */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px #172A46 inset !important;
            -webkit-text-fill-color: #FFFFFF !important;
            caret-color: #FFFFFF !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .form-select option {
            background: #0F1E36;
            color: #FFFFFF;
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
            color: #FFFFFF;
        }

        .alert-custom-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #FCA5A5;
            border-radius: 12px;
            font-size: 13px;
            padding: 12px 16px;
        }
    </style>
</head>
<body>

    <div class="ambient-glow glow-top"></div>

    <div class="register-card">
        <div class="text-center mb-4">
            <h1 class="title-brand">Daftar Akun <span>Pengurus</span></h1>
            <p class="text-muted small mb-0">Registrasi akun divisi pelayanan DRP Outstanding Teens.</p>
        </div>
        
        @if($errors->any())
            <div class="alert alert-custom-danger mb-3">
                <i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Contoh: Hizqia Chandra" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email SSO / Akun</label>
                <input type="email" name="email" class="form-control" placeholder="nama@dotsawangan.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password (Minimal 6 Karakter)</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required minlength="6">
            </div>

            <div class="mb-4">
                <label class="form-label">Pilih Jabatan / Divisi Pelayanan</label>
                <select name="role" class="form-select" required>
                    <option value="super_admin">Super Admin (Akses Penuh)</option>
                    <option value="div_cell">Ketua Divisi Cell</option>
                    <option value="div_acara">Ketua Divisi Acara</option>
                    <option value="div_sosmed">Ketua Divisi Sosial Media</option>
                    <option value="div_musik">Ketua Divisi Musik</option>
                    <option value="div_prayer">Ketua Divisi Prayer</option>
                    <option value="div_pastoral">Ketua Divisi Pastoral</option>
                </select>
            </div>

            <button type="submit" class="btn btn-navy-submit mb-3">
                <i class="fa-solid fa-user-plus me-2"></i> Daftarkan Akun Pengurus
            </button>
        </form>

        <div class="text-center pt-2">
            <p class="small text-muted mb-0">
                Sudah memiliki akun? <a href="/login" class="fw-semibold text-decoration-none" style="color: var(--cyan-accent);">Masuk di sini</a>
            </p>
        </div>
    </div>

</body>
</html>