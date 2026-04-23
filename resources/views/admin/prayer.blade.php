<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prayer Dashboard - DOT Teens</title>
    
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #0F172A; color: #F3F4F6; font-family: 'Poppins', sans-serif; }
        .navbar-custom { background: rgba(15, 23, 42, 0.95); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        .text-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .prayer-column { background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 15px; padding: 20px; min-height: 500px; }
        .prayer-card { background: rgba(255, 255, 255, 0.05); border-left: 4px solid #60A5FA; border-radius: 10px; padding: 15px; margin-bottom: 15px; transition: 0.3s; }
        .prayer-card:hover { transform: translateY(-3px); background: rgba(255, 255, 255, 0.08); }
        .prayer-card.didoakan { border-left-color: #F59E0B; }
        .prayer-card.terjawab { border-left-color: #10B981; opacity: 0.7; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="/"><i class="fa-solid fa-arrow-left me-2 text-secondary"></i>Kembali ke Web</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">Halo, <strong class="text-white">{{ $user->name }}</strong> (Tim Doa)</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Prayer <span class="text-gradient">Board</span></h2>
            <p class="text-secondary mb-0"><i class="fa-solid fa-hands-praying me-2 text-warning"></i>"Doa orang yang benar, bila dengan yakin didoakan, sangat besar kuasanya."</p>
        </div>

        <div class="glass-card mb-4 p-3 border-secondary">
            <form action="/admin/prayer" method="GET" class="row g-3 align-items-center">
                <div class="col-md-auto text-white fw-bold"><i class="fa-solid fa-filter text-info me-2"></i>Filter Tanggal:</div>
                <div class="col-md-2">
                    <input type="date" name="start_date" class="form-control form-control-sm bg-dark text-white border-secondary" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-auto text-secondary small">s/d</div>
                <div class="col-md-2">
                    <input type="date" name="end_date" class="form-control form-control-sm bg-dark text-white border-secondary" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-sm btn-info rounded-pill px-3">Cari</button>
                    @if(request('start_date'))
                        <a href="/admin/prayer" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Clear</a>
                    @endif
                </div>
                
                <div class="col-md text-md-end mt-3 mt-md-0 d-flex justify-content-md-end gap-2">
                    <a href="/admin/prayer/download?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" class="btn btn-sm btn-success rounded-pill px-3">
                        <i class="fa-solid fa-download me-1"></i> Download CSV
                    </a>
                    <button type="button" class="btn btn-sm btn-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#resetModal">
                        <i class="fa-solid fa-rotate-left me-1"></i> Reset Doa (Mulai Nol)
                    </button>
                </div>
            </form>
        </div>

        <div class="modal fade" id="resetModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white border-secondary">
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title text-danger fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i>Peringatan Bahaya</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin mereset dan <strong>menghapus SEMUA data doa</strong> di sistem ini?</p>
                        <p class="text-warning small mb-0"><i class="fa-solid fa-lightbulb me-1"></i> Tips: Pastikan Anda sudah mengklik tombol <strong>Download CSV</strong> terlebih dahulu untuk mem-backup data bulan lalu sebelum melakukan reset.</p>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-light rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <form action="/admin/prayer/reset" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger rounded-pill px-4">Ya, Bersihkan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row g-4">
            <div class="col-md-4">
                <div class="prayer-column">
                    <h5 class="text-white fw-bold mb-3 border-bottom border-secondary pb-2"><i class="fa-solid fa-inbox me-2 text-info"></i>Pokok Doa Masuk</h5>
                    
                    @forelse($pendingPrayers as $prayer)
                    <div class="prayer-card">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold text-white">{{ $prayer->name ?? 'Anonim / Hamba Tuhan' }}</span>
                            <small class="text-secondary">{{ $prayer->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mt-2 mb-3 text-light small">{{ $prayer->topic }}</p>
                        <a href="/admin/prayer/status/{{ $prayer->id }}/didoakan" class="btn btn-sm btn-outline-warning w-100 rounded-pill"><i class="fa-solid fa-hand-holding-heart me-1"></i> Mulai Doakan</a>
                    </div>
                    @empty
                    <p class="text-center text-secondary mt-5">Belum ada pokok doa baru.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-md-4">
                <div class="prayer-column">
                    <h5 class="text-white fw-bold mb-3 border-bottom border-secondary pb-2"><i class="fa-solid fa-fire me-2 text-warning"></i>Sedang Didoakan</h5>
                    
                    @forelse($prayingPrayers as $prayer)
                    <div class="prayer-card didoakan">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold text-white">{{ $prayer->name ?? 'Anonim' }}</span>
                            <small class="text-secondary">{{ date('d M', strtotime($prayer->created_at)) }}</small>
                        </div>
                        <p class="mt-2 mb-3 text-light small">{{ $prayer->topic }}</p>
                        <a href="/admin/prayer/status/{{ $prayer->id }}/terjawab" class="btn btn-sm btn-success w-100 rounded-pill"><i class="fa-solid fa-check-double me-1"></i> Tandai Terjawab!</a>
                    </div>
                    @empty
                    <p class="text-center text-secondary mt-5">Belum ada doa di antrean ini.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-md-4">
                <div class="prayer-column">
                    <h5 class="text-white fw-bold mb-3 border-bottom border-secondary pb-2"><i class="fa-solid fa-star me-2 text-success"></i>Doa Terjawab (Kesaksian)</h5>
                    
                    @forelse($answeredPrayers as $prayer)
                    <div class="prayer-card terjawab">
                        <span class="fw-bold text-white d-block mb-1">{{ $prayer->name ?? 'Anonim' }}</span>
                        <p class="mb-0 text-secondary small"><s>{{ Str::limit($prayer->topic, 60) }}</s></p>
                    </div>
                    @empty
                    <p class="text-center text-secondary mt-5">Belum ada doa yang ditandai terjawab.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>