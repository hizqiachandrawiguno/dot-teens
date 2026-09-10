<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket: {{ $registration->name }} | {{ $registration->event->title }}</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- QR Code Generator Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        :root {
            --navy-dark: #0A1628;
            --navy-card: #112240;
            --cyan-accent: #38BDF8;
            --blue-glow: #2563EB;
        }

        body {
            background: radial-gradient(circle at 50% 15%, #152C4F 0%, #0A1628 75%, #050B14 100%);
            color: #F8FAFC;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            padding: 30px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ticket-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
        }

        .ticket-card {
            background: #112240;
            border: 1px solid rgba(56, 189, 248, 0.25);
            border-radius: 28px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7), 0 0 30px rgba(56, 189, 248, 0.15);
            overflow: hidden;
            position: relative;
        }

        .ticket-header {
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.3) 0%, rgba(37, 99, 235, 0.2) 100%);
            border-bottom: 1px dashed rgba(56, 189, 248, 0.3);
            padding: 28px 24px 22px;
            text-align: center;
            position: relative;
        }

        .badge-event {
            background: rgba(56, 189, 248, 0.15);
            color: var(--cyan-accent);
            border: 1px solid rgba(56, 189, 248, 0.4);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 12px;
        }

        .event-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 22px;
            line-height: 1.3;
            margin-bottom: 6px;
            background: linear-gradient(135deg, #FFFFFF 40%, var(--cyan-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .ticket-cutout-left, .ticket-cutout-right {
            position: absolute;
            width: 28px;
            height: 28px;
            background: #0A1628;
            border-radius: 50%;
            top: -14px;
            z-index: 5;
        }
        .ticket-cutout-left { left: -14px; border-right: 1px solid rgba(56, 189, 248, 0.25); }
        .ticket-cutout-right { right: -14px; border-left: 1px solid rgba(56, 189, 248, 0.25); }

        .ticket-body {
            padding: 24px;
        }

        .qr-box {
            background: #FFFFFF;
            padding: 16px;
            border-radius: 20px;
            display: inline-block;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            margin: 0 auto;
        }

        .ticket-code-pill {
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 12px;
            padding: 8px 16px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 2px;
            color: var(--cyan-accent);
            display: inline-block;
            margin-top: 14px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 16px;
            margin-top: 20px;
            text-align: left;
        }

        .info-label {
            font-size: 11px;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 700;
            color: #F8FAFC;
        }

        @media (max-width: 380px) {
            .info-grid {
                grid-template-columns: 1fr !important;
                gap: 10px;
                padding: 12px;
            }
            .info-grid > div[style*="grid-column"] {
                grid-column: span 1 !important;
            }
            .ticket-card {
                border-radius: 20px;
            }
            .ticket-header {
                padding: 20px 16px 18px;
            }
            .ticket-body {
                padding: 18px 14px;
            }
        }

        .btn-print {
            background: linear-gradient(135deg, #0284C7 0%, #2563EB 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 14px;
            padding: 13px;
            width: 100%;
            transition: 0.25s ease;
        }

        .btn-print:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #1D4ED8 100%);
            color: #FFFFFF;
            transform: translateY(-2px);
        }

        .btn-wa {
            background: rgba(34, 197, 94, 0.15);
            color: #4ADE80;
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 14px;
            font-weight: 600;
            font-size: 14px;
            padding: 11px;
            width: 100%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.25s ease;
        }

        .btn-wa:hover {
            background: rgba(34, 197, 94, 0.25);
            color: #86EFAC;
        }

        @media print {
            body { background: #FFFFFF !important; color: #000000 !important; }
            .ticket-card { border: 2px solid #000 !important; box-shadow: none !important; background: #fff !important; }
            .event-title { -webkit-text-fill-color: #000 !important; color: #000 !important; }
            .no-print { display: none !important; }
            .info-grid { background: #f1f5f9 !important; border: 1px solid #cbd5e1 !important; color: #000 !important; }
            .info-value { color: #000 !important; }
            .ticket-code-pill { color: #000 !important; border-color: #000 !important; }
        }
    </style>
</head>
<body>

    <div class="ticket-wrapper">
        <div class="text-center mb-3 no-print">
            <a href="/" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Website DOT
            </a>
        </div>

        <div class="ticket-card" id="ticketCard">
            <!-- Header Tiket -->
            <div class="ticket-header">
                <div class="badge-event">
                    <i class="fa-solid fa-fire me-1"></i> Official E-Ticket
                </div>
                <h1 class="event-title">{{ $registration->event->title }}</h1>
                <p class="small text-secondary mb-0">DRP Outstanding Teens (DOT) • GBI Sawangan</p>
            </div>

            <div style="position: relative;">
                <div class="ticket-cutout-left"></div>
                <div class="ticket-cutout-right"></div>
            </div>

            <!-- Body Tiket -->
            <div class="ticket-body text-center">
                <!-- Status Badge -->
                <div class="mb-3">
                    @if($registration->status === 'attended')
                        <span class="badge rounded-pill bg-success bg-opacity-25 text-success border border-success px-3 py-2">
                            <i class="fa-solid fa-circle-check me-1"></i> SUDAH CHECK-IN ({{ $registration->attended_at ? $registration->attended_at->format('H:i') : '' }} WIB)
                        </span>
                    @else
                        <span class="badge rounded-pill bg-info bg-opacity-15 text-info border border-info px-3 py-2">
                            <i class="fa-solid fa-ticket me-1"></i> TIKET TERDAFTAR (SIAP SCAN)
                        </span>
                    @endif
                </div>

                <!-- QR Code Box -->
                <div class="qr-box">
                    <div id="qrcode"></div>
                </div>

                <div>
                    <div class="ticket-code-pill">
                        {{ $registration->ticket_code }}
                    </div>
                </div>
                <small class="text-muted d-block mt-1">Tunjukkan QR code ini ke usher saat memasuki ruangan</small>

                <!-- Grid Informasi Peserta & Acara -->
                <div class="info-grid">
                    <div>
                        <div class="info-label">Nama Peserta</div>
                        <div class="info-value text-truncate">{{ $registration->name }}</div>
                    </div>
                    <div>
                        <div class="info-label">Kategori / Umur</div>
                        <div class="info-value">{{ $registration->category }}</div>
                    </div>
                    <div>
                        <div class="info-label">Tanggal & Waktu</div>
                        <div class="info-value">
                            {{ date('d M Y', strtotime($registration->event->event_date)) }}<br>
                            <small class="text-info">{{ $registration->event->time_formatted }} WIB</small>
                        </div>
                    </div>
                    <div>
                        <div class="info-label">Lokasi Acara</div>
                        <div class="info-value text-truncate" title="{{ $registration->event->location }}">
                            {{ $registration->event->location }}
                        </div>
                    </div>
                    <div style="grid-column: span 2;">
                        <div class="info-label">Asal Komunitas / Sekolah</div>
                        <div class="info-value">{{ $registration->origin ?? 'Umum' }}</div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-4 d-flex flex-column gap-2 no-print">
                    <button type="button" class="btn btn-print" onclick="window.print()">
                        <i class="fa-solid fa-download me-2"></i> Unduh / Cetak Tiket
                    </button>
                    @php
                        $waText = urlencode("Halo! Saya {$registration->name} sudah terdaftar untuk Event {$registration->event->title} di DOT Teens Sawangan. Ini kode tiket saya: {$registration->ticket_code}\n" . url()->current());
                    @endphp
                    <a href="https://wa.me/?text={{ $waText }}" target="_blank" class="btn btn-wa">
                        <i class="fa-brands fa-whatsapp fs-5"></i> Bagikan Tiket ke WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-3 no-print">
            <p class="small text-muted mb-0">
                &copy; {{ date('Y') }} DRP Outstanding Teens (DOT) • GBI Sawangan
            </p>
        </div>
    </div>

    <!-- Generate QR Code Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Isi QR Code dengan Kode Tiket (atau URL tiket)
            const ticketCode = "{{ $registration->ticket_code }}";
            new QRCode(document.getElementById("qrcode"), {
                text: ticketCode,
                width: 170,
                height: 170,
                colorDark : "#0A1628",
                colorLight : "#FFFFFF",
                correctLevel : QRCode.CorrectLevel.H
            });
        });
    </script>
</body>
</html>
