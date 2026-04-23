<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel - Department Teens</title>
    
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background: linear-gradient(-45deg, #0F172A, #1E1B4B, #0F172A); background-size: 400% 400%; animation: gradientBG 15s ease infinite; color: #F3F4F6; font-family: 'Poppins', sans-serif; height: 100vh; display: flex; align-items: center; justify-content: center; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .glass-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; backdrop-filter: blur(12px); padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); width: 100%; max-width: 400px; }
        .form-control { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; }
        .form-control:focus { background: rgba(255,255,255,0.1); color: #fff; box-shadow: none; border-color: #8B5CF6; }
        .btn-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); color: white; border: none; font-weight: bold; transition: 0.3s; }
        .btn-gradient:hover { background: linear-gradient(90deg, #8B5CF6, #EC4899); transform: translateY(-3px); }
    </style>
</head>
<body>
    <div class="glass-card">
        <div class="text-center mb-4">
            <h3 class="fw-bold mb-0">DOT <span style="color:#60A5FA">Admin</span></h3>
            <p class="text-secondary small">Silakan login untuk mengakses panel divisi.</p>
        </div>
        
        @if(session('success')) <div class="alert alert-success small p-2">{{ session('success') }}</div> @endif
        @if($errors->any()) <div class="alert alert-danger small p-2">{{ $errors->first() }}</div> @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small text-secondary">Email SSO</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="form-label small text-secondary">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-gradient w-100 rounded-pill py-2">Masuk Panel</button>
        </form>
        <p class="text-center small mt-4 text-secondary">Belum punya akses? <a href="/register" class="text-info">Daftar Divisi</a></p>
    </div>
</body>
</html>