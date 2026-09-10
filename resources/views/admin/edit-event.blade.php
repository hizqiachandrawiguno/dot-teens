<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara - DRP Outstanding Teens</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body { background-color: #0F172A; color: #F3F4F6; font-family: 'Poppins', sans-serif; }
        .navbar-custom { background: rgba(15, 23, 42, 0.95); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .glass-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 30px; }
        .form-control { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 10px; }
        .form-control:focus { background: rgba(255,255,255,0.1); color: #fff; box-shadow: none; border-color: #10B981; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="/admin/dashboard">DOT <span style="color:#60A5FA">Workspace</span></a>
            <a href="/admin/dashboard" class="btn btn-outline-light btn-sm rounded-pill px-3"><i class="fa-solid fa-arrow-left me-2"></i> Kembali</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h4 class="fw-bold text-info mb-4"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Detail Acara</h4>
                <div class="glass-card">
                    <form action="/admin/event/update/{{ $event->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="small text-secondary mb-1">Nama Acara</label>
                            <input type="text" name="title" class="form-control p-2" value="{{ $event->title }}" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="small text-secondary mb-1">Tanggal</label>
                                <input type="date" name="event_date" class="form-control p-2" style="color-scheme: dark;" value="{{ $event->event_date }}" required>
                            </div>
                            <div class="col-6">
                                <label class="small text-secondary mb-1">Jam (WIB)</label>
                                <input type="time" name="event_time" class="form-control p-2" style="color-scheme: dark;" value="{{ date('H:i', strtotime($event->event_time)) }}" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="small text-secondary mb-1">Lokasi</label>
                            <input type="text" name="location" class="form-control p-2" value="{{ $event->location }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="small text-secondary">Nomor WA Ketua Cell</label>
                            <input type="number" name="leader_phone" class="form-control" value="{{ $schedule->leader_phone }}" required>
                        </div>
                        <button type="submit" class="btn btn-info w-100 rounded-pill fw-bold text-dark">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>