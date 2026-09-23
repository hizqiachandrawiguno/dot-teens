<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $scopeTitle }} - {{ $event->title }}</title>
    <style>
        @page {
            margin: 28px 32px 35px 32px;
            size: a4 landscape;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10px;
            color: #1e293b;
            line-height: 1.35;
            margin: 0;
            padding: 0;
        }

        /* HEADER & KOP */
        .kop-table {
            width: 100%;
            border-bottom: 2.5px solid #0284c7;
            padding-bottom: 10px;
            margin-bottom: 12px;
        }

        .kop-table td {
            vertical-align: middle;
        }

        .brand-title {
            font-size: 17px;
            font-weight: bold;
            color: #0369a1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .brand-subtitle {
            font-size: 10.5px;
            color: #475569;
            margin-top: 2px;
            margin-bottom: 0;
        }

        .report-badge {
            display: inline-block;
            background-color: #e0f2fe;
            color: #0284c7;
            padding: 4px 10px;
            font-weight: bold;
            font-size: 10px;
            border-radius: 4px;
            border: 1px solid #bae6fd;
            text-transform: uppercase;
        }

        .meta-right {
            text-align: right;
            font-size: 9px;
            color: #64748b;
        }

        /* EVENT INFO BOX */
        .event-info-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 12px;
        }

        .event-title {
            font-size: 14px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .event-meta-grid {
            width: 100%;
        }

        .event-meta-grid td {
            font-size: 9.5px;
            color: #334155;
            padding: 2px 0;
        }

        /* SUMMARY METRICS CARDS */
        .summary-table {
            width: 100%;
            margin-bottom: 14px;
            border-collapse: separate;
            border-spacing: 8px 0;
        }

        .summary-card {
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            padding: 8px 10px;
            text-align: center;
            background-color: #ffffff;
        }

        .summary-card-title {
            font-size: 8.5px;
            text-transform: uppercase;
            font-weight: bold;
            color: #64748b;
            margin-bottom: 2px;
        }

        .summary-card-val {
            font-size: 16px;
            font-weight: bold;
            color: #0f172a;
        }

        .card-green {
            border-color: #86efac;
            background-color: #f0fdf4;
        }
        .card-green .summary-card-val { color: #16a34a; }

        .card-amber {
            border-color: #fde68a;
            background-color: #fffbeb;
        }
        .card-amber .summary-card-val { color: #d97706; }

        .card-cyan {
            border-color: #7dd3fc;
            background-color: #f0f9ff;
        }
        .card-cyan .summary-card-val { color: #0284c7; }

        /* DATA TABLE */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
            margin-bottom: 15px;
        }

        .data-table th {
            background-color: #0f172a;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 7px 6px;
            border: 1px solid #0f172a;
            font-size: 8.5px;
            letter-spacing: 0.3px;
        }

        .data-table td {
            padding: 6px 6px;
            border: 1px solid #cbd5e1;
            vertical-align: middle;
        }

        .data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-mono { font-family: monospace, Courier, sans-serif; font-weight: bold; }

        .status-badge-attended {
            background-color: #dcfce7;
            color: #15803d;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 3px;
            border: 1px solid #bbf7d0;
            display: inline-block;
            font-size: 8px;
        }

        .status-badge-pending {
            background-color: #fef3c7;
            color: #b45309;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 3px;
            border: 1px solid #fde68a;
            display: inline-block;
            font-size: 8px;
        }

        .category-badge {
            background-color: #f1f5f9;
            color: #334155;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: 600;
            border: 1px solid #e2e8f0;
            font-size: 8px;
        }

        /* SIGNATURE & FOOTER */
        .footer-table {
            width: 100%;
            margin-top: 18px;
            page-break-inside: avoid;
        }

        .footer-table td {
            vertical-align: top;
            font-size: 9px;
        }

        .signature-box {
            text-align: center;
            width: 200px;
        }

        .signature-space {
            height: 48px;
        }

        .signature-line {
            border-bottom: 1px solid #475569;
            margin-top: 4px;
            margin-bottom: 3px;
        }

        .watermark-note {
            font-size: 8px;
            color: #94a3b8;
            font-style: italic;
        }
    </style>
</head>
<body>

    <!-- KOP LAPORAN -->
    <table class="kop-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 60%;">
                <div class="brand-title">GBI SAWANGAN • DOT TEENS</div>
                <div class="brand-subtitle">Disciples of Outstanding Teens — Laporan Kehadiran Peserta Event Resmi</div>
            </td>
            <td style="width: 40%;" class="meta-right">
                <span class="report-badge">{{ $scopeTitle }}</span>
                <div style="margin-top: 5px;">
                    Dicetak pada: <strong>{{ now('Asia/Jakarta')->translatedFormat('d F Y • H:i:s') }} WIB</strong><br>
                    Oleh: <strong>{{ auth()->user()->name ?? 'Panitia / Volunteer DOT' }}</strong> ({{ strtoupper(str_replace('_', ' ', auth()->user()->role ?? 'panitia')) }})
                </div>
            </td>
        </tr>
    </table>

    <!-- DETAIL EVENT -->
    <div class="event-info-box">
        <table class="event-meta-grid" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width: 65%;">
                    <div class="event-title">{{ $event->title }}</div>
                    <div>
                        <strong>Tanggal Acara:</strong> {{ date('d F Y', strtotime($event->event_date)) }} &nbsp;|&nbsp;
                        <strong>Waktu:</strong> {{ $event->time_formatted ?? ($event->event_waktu ?? '17:30') }} WIB &nbsp;|&nbsp;
                        <strong>Lokasi:</strong> {{ $event->location }}
                    </div>
                </td>
                <td style="width: 35%; text-align: right;">
                    <div><strong>Cakupan Data:</strong> {{ $scopeTitle }}</div>
                    <div style="color: #0284c7; font-weight: bold; margin-top: 2px;">
                        Jumlah Data Tampil: {{ $printedCount }} Peserta
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- METRIK STATISTIK CEPAT -->
    <table class="summary-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 20%;">
                <div class="summary-card">
                    <div class="summary-card-title">Total Pendaftar</div>
                    <div class="summary-card-val">{{ $totalAll }}</div>
                </div>
            </td>
            <td style="width: 20%;">
                <div class="summary-card card-green">
                    <div class="summary-card-title">Sudah Hadir</div>
                    <div class="summary-card-val">{{ $totalAttended }}</div>
                </div>
            </td>
            <td style="width: 20%;">
                <div class="summary-card card-amber">
                    <div class="summary-card-title">Belum Hadir</div>
                    <div class="summary-card-val">{{ $totalPending }}</div>
                </div>
            </td>
            <td style="width: 20%;">
                <div class="summary-card card-cyan">
                    <div class="summary-card-title">Persentase Kehadiran</div>
                    <div class="summary-card-val">{{ $totalAll > 0 ? round(($totalAttended / $totalAll) * 100) : 0 }}%</div>
                </div>
            </td>
            <td style="width: 20%;">
                <div class="summary-card" style="border-color: #cbd5e1; background-color: #f8fafc;">
                    <div class="summary-card-title">Di Laporan Ini</div>
                    <div class="summary-card-val" style="color: #4338ca;">{{ $printedCount }}</div>
                </div>
            </td>
        </tr>
    </table>

    <!-- TABEL DATA PESERTA -->
    <table class="data-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 28px;" class="text-center">No</th>
                <th style="width: 80px;" class="text-center">Kode Tiket</th>
                <th style="width: 140px;">Nama Lengkap Peserta</th>
                <th style="width: 85px;">WhatsApp</th>
                <th style="width: 75px;" class="text-center">Kategori</th>
                <th>Asal Sekolah / COOL</th>
                <th style="width: 85px;" class="text-center">Status</th>
                <th style="width: 100px;">Waktu Check-in</th>
                <th style="width: 85px;">Petugas Scan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($participants as $idx => $p)
            <tr>
                <td class="text-center">{{ $idx + 1 }}</td>
                <td class="text-center font-mono" style="color: #0369a1;">{{ $p->ticket_code }}</td>
                <td>
                    <strong>{{ $p->name }}</strong>
                    @if($p->email)
                        <br><span style="color: #64748b; font-size: 8px;">{{ $p->email }}</span>
                    @endif
                </td>
                <td class="font-mono">{{ $p->phone }}</td>
                <td class="text-center">
                    <span class="category-badge">{{ $p->category }}</span>
                </td>
                <td>{{ $p->origin ?? '-' }}</td>
                <td class="text-center">
                    @if($p->status === 'attended')
                        <span class="status-badge-attended">✓ HADIR</span>
                    @else
                        <span class="status-badge-pending">⏳ BELUM HADIR</span>
                    @endif
                </td>
                <td>
                    @if($p->attended_at)
                        {{ $p->attended_at->timezone('Asia/Jakarta')->translatedFormat('d M, H:i:s') }} WIB
                    @else
                        <span style="color: #94a3b8;">-</span>
                    @endif
                </td>
                <td>
                    @if($p->scanned_by)
                        <span style="color: #334155;">{{ $p->scanned_by }}</span>
                    @else
                        <span style="color: #94a3b8;">-</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center" style="padding: 20px; color: #64748b;">
                    <em>Tidak ada data peserta yang sesuai dengan filter ini.</em>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- TANDA TANGAN & LEGALITAS -->
    <table class="footer-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 55%;">
                <div class="watermark-note">
                    * Dokumen rekapitulasi kehadiran ini sah dan dihasilkan secara otomatis oleh Sistem Manajemen Event & Scanner Kehadiran GBI Sawangan DOT Teens.<br>
                    * Total data tercetak: <strong>{{ $printedCount }} peserta</strong> dari keseluruhan {{ $totalAll }} pendaftar.
                </div>
            </td>
            <td style="width: 45%; text-align: right;">
                <div style="display: inline-block;" class="signature-box">
                    <div>Sawangan, {{ now('Asia/Jakarta')->translatedFormat('d F Y') }}</div>
                    <div style="font-weight: bold; margin-top: 3px;">Petugas Scanner / Divisi Acara</div>
                    <div class="signature-space"></div>
                    <div class="signature-line"></div>
                    <div style="font-weight: bold; color: #0f172a;">{{ auth()->user()->name ?? 'Panitia / Usher' }}</div>
                    <div style="font-size: 8px; color: #64748b;">{{ strtoupper(str_replace('_', ' ', auth()->user()->role ?? 'Volunteer')) }}</div>
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
