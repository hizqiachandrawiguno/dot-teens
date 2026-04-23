<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kehadiran - DOT Teens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #121212; color: #fff; }
        .glass-card { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 1rem; padding: 1.5rem; }
        .text-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .table { color: white; }
        .table th { background-color: rgba(255,255,255,0.05); color: #60A5FA; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .table td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="background: rgba(0,0,0,0.2);">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="/admin/pastoral"><i class="fa-solid fa-arrow-left me-2 text-info"></i>Kembali ke Pastoral</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Rekap <span class="text-gradient">Kehadiran Ibadah</span></h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card" style="border-top: 4px solid #8B5CF6;">
                    <h5 class="text-white mb-3"><i class="fa-regular fa-calendar-days me-2 text-info"></i>Pilih Tanggal</h5>
                    
                    @if($dates->count() > 0)
                        <form action="/admin/pastoral/recap" method="GET">
                            <div class="list-group list-group-flush rounded bg-transparent">
                                @foreach($dates as $date)
                                    <button type="submit" name="filter_date" value="{{ $date }}" class="list-group-item list-group-item-action text-white {{ $selectedDate == $date ? 'bg-primary' : 'bg-transparent' }} border-secondary" style="transition: 0.3s;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>{{ date('d F Y', strtotime($date)) }}</span>
                                            @if($selectedDate == $date) <i class="fa-solid fa-check"></i> @endif
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </form>
                    @else
                        <p class="text-secondary small">Belum ada data absensi yang tersimpan.</p>
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-start mb-3 border-bottom border-secondary pb-3">
                        <h5 class="text-white mb-0 mt-2">Jemaat Hadir pada: <br><span class="text-info">{{ date('d F Y', strtotime($selectedDate)) }}</span></h5>
                        
                        <div class="text-end">
                            <form action="/admin/pastoral/recap/reset" method="POST" class="mb-2" onsubmit="return confirm('Yakin ingin menghapus SEMUA data kehadiran di tanggal ini?');">
                                @csrf
                                <input type="hidden" name="reset_date" value="{{ $selectedDate }}">
                                <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3 shadow">
                                    <i class="fa-solid fa-trash-can me-1"></i> Reset Data Tanggal Ini
                                </button>
                            </form>

                            <span class="badge bg-success fs-6 px-3 py-2 rounded-pill shadow">Total: {{ $attendees->count() }} Orang</span>
                        </div>
                    </div>

                    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-hover table-light rounded overflow-hidden">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jemaat</th>
                                    <th>No. Handphone</th>
                                    <th>Fire Cell</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attendees as $index => $attendee)
                                <tr>
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td class="fw-bold text-dark">{{ $attendee->name }}</td>
                                    <td>
                                        @if($attendee->phone_number)
                                            <span class="badge bg-dark fw-normal px-3 py-2 rounded-pill shadow-sm" style="color: #ffffff !important; letter-spacing: 1px;">
                                                <i class="fa-solid fa-phone fa-xs me-2" style="color: #9ca3af;"></i>{{ $attendee->phone_number }}
                                            </span>
                                        @else
                                            <span class="text-secondary fw-bold">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($attendee->fire_cell)
                                            <span class="badge bg-warning text-dark">{{ $attendee->fire_cell }}</span>
                                        @else
                                            <span class="badge bg-secondary text-white">Belum Join</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-dark fst-italic">Tidak ada data kehadiran di tanggal ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>