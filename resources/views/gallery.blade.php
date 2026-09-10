<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOT GBI Sawangan - Department Teens</title>

    <meta name="description" content="Website resmi DOT (Department of Teens) Sawangan. Temukan jadwal ibadah, info komunitas cell, galeri kegiatan, dan mari bertumbuh bersama komunitas youth kami!">
    <meta name="keywords" content="DOT Sawangan, Youth Sawangan, Pemuda Kristen Sawangan, Ibadah Youth Sawangan, Gereja Sawangan, Komunitas Pemuda, Cell DOT">
    <meta name="author" content="DOT Sawangan">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dotsawangan.com/">
    <meta property="og:title" content="DOT Sawangan - Teens & Youth Community">
    <meta property="og:description" content="Website resmi DOT Sawangan. Temukan jadwal ibadah dan bergabunglah dengan komunitas kami!">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* KUNCI MUTLAK AGAR LAYAR TIDAK MELAR KE SAMPING PADA HP */
        html, body {
            max-width: 100vw;
            width: 100%;
            overflow-x: hidden !important;
            margin: 0;
            padding: 0;
            position: relative;
        }
        
        /* Memastikan baris (row) bootstrap tidak menarik layar */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* DYNAMIC BACKGROUND - Bergerak seperti ombak warna gelap */
        body {
            background: linear-gradient(-45deg, #0F172A, #1E1B4B, #0F172A, #081229);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #F3F4F6;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* FLOATING ORBS - Bola cahaya samar yang melayang pelan */
        .orb {
            position: absolute; 
            border-radius: 50%; 
            filter: blur(80px); 
            z-index: -1;
            opacity: 0.5;
            animation: float 10s infinite ease-in-out alternate;
        }
        
        .orb-1 { width: 300px; height: 300px; background: rgba(139, 92, 246, 0.4); top: 5%; left: -5%; }
        .orb-2 { width: 400px; height: 400px; background: rgba(96, 165, 250, 0.3); top: 40%; right: -10%; animation-delay: -5s; }
        .orb-3 { width: 350px; height: 350px; background: rgba(236, 72, 153, 0.3); bottom: 10%; left: 10%; animation-delay: -2s; }

        @keyframes float {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(-50px) scale(1.2); }
        }

        /* STYLING UTAMA */
        .text-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6, #EC4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 700; }
        .navbar-custom { background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.3s ease; }

        /* --- HIGHLIGHT NAVIGASI AKTIF --- */
        .navbar-nav .nav-link { position: relative; transition: color 0.3s ease; color: #D1D5DB !important; }
        .navbar-nav .nav-link:hover { color: #fff !important; }
        .navbar-nav .nav-link.active { color: #60A5FA !important; font-weight: 700; }
        .navbar-nav .nav-link.active::after { content: ''; position: absolute; bottom: 0px; left: 0; width: 100%; height: 2px; background: linear-gradient(90deg, #60A5FA, #8B5CF6); border-radius: 2px; }

        .btn-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; color: white; font-weight: 600; padding: 12px 30px; transition: all 0.3s ease; }
        .btn-gradient:hover { background: linear-gradient(90deg, #8B5CF6, #EC4899); transform: translateY(-3px); color: white; box-shadow: 0 8px 20px rgba(236, 72, 153, 0.4); }

        /* MASONRY GALLERY CSS */
        .gallery-container { columns: 3 300px; column-gap: 20px; padding-bottom: 40px; }
        .gallery-item { break-inside: avoid; margin-bottom: 20px; border-radius: 15px; overflow: hidden; position: relative; cursor: pointer; box-shadow: 0 5px 15px rgba(0,0,0,0.3); background: rgba(255,255,255,0.05); }
        .gallery-item img { width: 100%; display: block; transition: transform 0.6s ease, filter 0.6s ease; }
        .gallery-item:hover img { transform: scale(1.1); filter: brightness(0.6) blur(2px); }
        .overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; background: rgba(139, 92, 246, 0.4); opacity: 0; transition: opacity 0.4s ease; }
        .gallery-item:hover .overlay { opacity: 1; }
        .overlay h4 { color: white; font-weight: 700; transform: translateY(20px); transition: transform 0.4s ease; text-shadow: 0 2px 10px rgba(0,0,0,0.5);}
        .gallery-item:hover .overlay h4 { transform: translateY(0); }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarMain" data-bs-offset="150">

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <nav id="navbarMain" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-0">
        <div class="container px-3 px-md-4">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" style="height: 90px; object-fit: contain;">
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#cells">Cells</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#faq">FAQ</a></li>
                    <li class="nav-item"><a class="btn btn-gradient rounded-pill px-4 ms-lg-2 text-white" style="color: white !important;" href="/#join">Join Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 160px;">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Our <span class="text-gradient">Memories</span></h1>
            <p class="text-secondary">Setiap momen kebersamaan di DOT terekam di sini.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($galleries as $gal)
            
            @php
                $imageSource = Str::startsWith($gal->image, ['http://', 'https://']) 
                                ? $gal->image 
                                : asset('uploads/gallery/' . $gal->image);
            @endphp

            <div class="col-md-4 col-sm-6" data-aos="fade-up">
                <div class="glass-card p-2 position-relative" style="border-radius: 15px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#previewModal{{ $gal->id }}">
                    
                    <img src="{{ $imageSource }}" alt="{{ $gal->title }}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" loading="lazy">
                    
                    <div class="position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 50%, transparent 100%); border-radius: 0 0 10px 10px;">
                        <h5 class="text-white fw-bold mb-1">{{ $gal->title }}</h5>
                        <p class="text-secondary small mb-0"><i class="fa-solid fa-calendar-days me-2"></i>{{ date('d M Y', strtotime($gal->created_at)) }}</p>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="previewModal{{ $gal->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl"> 
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-header border-0 pb-0 justify-content-end">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="filter: drop-shadow(0 0 5px rgba(0,0,0,0.8));"></button>
                        </div>
                        <div class="modal-body text-center p-0">
                            <img src="{{ $imageSource }}" class="img-fluid rounded" alt="{{ $gal->title }}" style="max-height: 85vh; object-fit: contain; box-shadow: 0 10px 40px rgba(0,0,0,0.5);" loading="lazy">
                            
                            <h4 class="text-white mt-4 fw-bold mb-1">{{ $gal->title }}</h4>
                            <p class="text-secondary mb-3">{{ date('d F Y', strtotime($gal->created_at)) }}</p>

                            @if(!empty($gal->drive_link))
                                <a href="{{ $gal->drive_link }}" target="_blank" class="btn btn-outline-info rounded-pill px-4 py-2 mb-4">
                                    <i class="fa-brands fa-google-drive me-2"></i> Lihat & Download Full Album
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @empty
            
            <div class="col-12 text-center py-5">
                <div class="glass-card p-5 mx-auto" style="max-width: 500px;">
                    <i class="fa-solid fa-images fs-1 text-secondary mb-3"></i>
                    <h4 class="text-white fw-bold">Album Masih Kosong</h4>
                    <p class="text-secondary mb-0">Foto-foto keseruan pelayanan DOT akan segera hadir di sini. Pantau terus ya!</p>
                </div>
            </div>
            
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, offset: 100 });
</script>

<footer class="text-center py-4 mt-5" style="border-top: 1px solid rgba(255,255,255,0.05);">
    <p class="small mb-0">
        <a href="/login" class="text-secondary" style="text-decoration: none; cursor: default;">
            &copy; 2026 Department Teens GBI Sawangan.
        </a>
    </p>
</footer>
</body>
</html>