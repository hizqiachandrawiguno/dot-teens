<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DOT GBI Sawangan</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* KUNCI MUTLAK AGAR LAYAR TIDAK MELAR KE SAMPING */
        html, body {
            max-width: 100vw;
            width: 100%;
            overflow-x: hidden !important;
            margin: 0;
            padding: 0;
            position: relative;
        }
        
        /* Memastikan baris (row) bootstrap tidak menarik layar */
        .row { margin-left: 0 !important; margin-right: 0 !important; }

        /* DYNAMIC BACKGROUND DENGAN PATTERN */
        body { 
            background: linear-gradient(-45deg, #0F172A, #1E1B4B, #0F172A, #172554); 
            background-size: 400% 400%; 
            animation: gradientBG 15s ease infinite; 
            color: #F3F4F6; 
            font-family: 'Poppins', sans-serif;
            /* Kode background-image yang bikin putih sudah saya hapus di sini */
        }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

        /* FLOATING ORBS */
        .orb { position: absolute; border-radius: 50%; filter: blur(80px); z-index: -1; animation: float 10s infinite ease-in-out alternate; }
        .orb-1 { width: 300px; height: 300px; background: rgba(139, 92, 246, 0.3); top: 5%; left: -10%; }
        .orb-2 { width: 400px; height: 400px; background: rgba(236, 72, 153, 0.2); top: 40%; right: -15%; animation-delay: -5s; }
        .orb-3 { width: 250px; height: 250px; background: rgba(96, 165, 250, 0.2); bottom: 10%; left: 20%; animation-delay: -2s; }
        @keyframes float { 0% { transform: translateY(0) scale(1); } 100% { transform: translateY(-40px) scale(1.1); } }

        /* TEKS ANIMASI GRADASI */
        .text-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6, #EC4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; }
        .text-gradient-animated {
            background: linear-gradient(270deg, #60A5FA, #8B5CF6, #EC4899, #60A5FA);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 5s ease infinite;
            font-weight: 800;
        }
        @keyframes gradientMove { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

        /* NAVBAR KEKINIAN */
        .navbar-custom { background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.3s ease; }
        .navbar-nav .nav-link { position: relative; transition: color 0.3s ease; color: #9CA3AF !important; font-weight: 600; }
        .navbar-nav .nav-link:hover { color: #fff !important; transform: translateY(-2px); }
        .navbar-nav .nav-link.active { color: #8B5CF6 !important; font-weight: 700; }
        .navbar-nav .nav-link.active::after { content: ''; position: absolute; bottom: -5px; left: 50%; transform: translateX(-50%); width: 20px; height: 3px; background: #8B5CF6; border-radius: 5px; }

        /* GLASS CARD DENGAN EFEK BOUNCY */
        .glass-card { 
            background: rgba(255, 255, 255, 0.03); 
            border: 1px solid rgba(255, 255, 255, 0.08); 
            border-radius: 24px; 
            backdrop-filter: blur(12px); 
            padding: 30px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); 
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        }
        .glass-card:hover { transform: translateY(-8px) scale(1.02); border-color: rgba(139, 92, 246, 0.5); box-shadow: 0 15px 35px rgba(139, 92, 246, 0.2); }

        /* TOMBOL KEKINIAN */
        .btn-gradient { background: linear-gradient(90deg, #60A5FA, #8B5CF6); border: none; color: white; font-weight: 700; padding: 12px 30px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3); }
        .btn-gradient:hover { background: linear-gradient(90deg, #8B5CF6, #EC4899); transform: translateY(-3px) scale(1.05); color: white; box-shadow: 0 10px 25px rgba(236, 72, 153, 0.5); }

        /* GLOWING AVATAR TIM */
        .profile-img-container { 
            width: 160px; height: 160px; margin: 0 auto 20px; border-radius: 50%; padding: 5px; 
            background: linear-gradient(135deg, #60A5FA, #8B5CF6, #EC4899); 
            transition: all 0.4s ease;
        }
        .glass-card:hover .profile-img-container { transform: rotate(5deg) scale(1.05); box-shadow: 0 0 25px rgba(236, 72, 153, 0.6); }
        .profile-img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; border: 4px solid #0F172A; }

        /* CUSTOM BULLET POINTS UNTUK MISI */
        .mission-list { list-style: none; padding-left: 0; }
        .mission-list li { position: relative; padding-left: 35px; margin-bottom: 15px; color: #D1D5DB; }
        .mission-list li::before { 
            content: '\f00c'; font-family: 'Font Awesome 6 Free'; font-weight: 900; 
            position: absolute; left: 0; top: 2px; color: #EC4899; 
            background: rgba(236, 72, 153, 0.1); width: 24px; height: 24px; 
            border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;
        }

        .icon-float { animation: floatingIcon 3s ease-in-out infinite; }
        @keyframes floatingIcon { 0% { transform: translateY(0px); } 50% { transform: translateY(-6px); } 100% { transform: translateY(0px); } }

        section { padding: 80px 0; position: relative; z-index: 1; }
    </style>
</head>
<body>

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <nav id="navbarMain" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-2" data-aos="fade-down">
        <div class="container px-3 px-md-4">
            <a class="navbar-brand logo-hover" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo DOT" style="height: 70px; object-fit: contain; transition: 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fa-solid fa-bars-staggered fs-3 text-white"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center mt-3 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#cells">Cells</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#faq">FAQ</a></li>
                    <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-gradient rounded-pill px-4 ms-lg-2" href="/#join">Join Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="container text-center" style="margin-top: 180px; margin-bottom: 60px;">
        <div data-aos="zoom-in" data-aos-duration="1000">
            <div class="d-inline-block p-1 rounded-pill mb-3" style="background: linear-gradient(90deg, #60A5FA, #8B5CF6); padding: 2px;">
                <span class="badge text-uppercase px-4 py-2 rounded-pill" style="background-color: #0F172A; font-weight: 600; letter-spacing: 1px;">
                    ✨ Who We Are
                </span>
            </div>
            <h1 class="display-3 fw-bold mb-4">Kenali Kami <br><span class="text-gradient-animated">Lebih Dekat</span> 👋</h1>
            <p class="fs-5 text-secondary mx-auto" style="max-width: 750px; line-height: 1.8;">
                Department Teens (DOT) GBI Sawangan bukan sekadar tempat ibadah. Kami adalah <span class="text-white fw-bold">rumah, keluarga, dan wadah</span> bagi generasi muda untuk menemukan tujuan hidup super keren di dalam Kristus!
            </p>
        </div>
    </header>

    <section class="container pt-0">
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex align-items-center mb-4">
                    <i class="fa-solid fa-book-open-reader fs-3 me-3 icon-float text-info"></i>
                    <h3 class="fw-bold mb-0">Our <span class="text-gradient">Story</span></h3>
                </div>
                <div class="glass-card h-100 position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 p-4 z-0" style="opacity: 0.05;"><i class="fa-solid fa-quote-right" style="font-size: 5rem;"></i></div>
                    
                    <div class="position-relative z-1">
                        <p class="text-light mb-4" style="line-height: 1.8; text-align: justify; font-size: 1.05rem;">
                            Perjalanan seru <strong>Department Teens (DOT)</strong> GBI Sawangan dimulai sejak tahun <span class="badge bg-primary rounded-pill px-3 fs-6 mx-1 shadow-sm" style="background: rgba(96, 165, 250, 0.2)!important; color:#60A5FA!important; border: 1px solid #60A5FA;">2021</span>. Berawal dari kerinduan untuk menyediakan tempat ibadah dan *hangout* yang relevan, komunitas ini terus *grow up* dari tahun ke tahun.
                        </p>
                        <p class="text-secondary mb-0" style="line-height: 1.8; text-align: justify;">
                            Melalui berbagai generasi pengurus, DOT telah melahirkan banyak pemimpin muda yang berdampak. Fokus kami cuma satu: membawa jiwa-jiwa muda untuk mengenal kasih Tuhan dan menghidupinya dengan cara yang *fun* dan dinamis! 🔥
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                
                <div class="d-flex align-items-center mb-4 mt-5 mt-lg-0">
                    <i class="fa-solid fa-rocket fs-3 me-3 icon-float" style="color: #EC4899;"></i>
                    <h3 class="fw-bold mb-0">Vision & <span class="text-gradient">Mission</span></h3>
                </div>
                <div class="glass-card h-100">
                    <div class="mb-4 p-3 rounded-4" style="background: rgba(96, 165, 250, 0.05); border-left: 4px solid #60A5FA;">
                        <h5 class="fw-bold text-info mb-2"><i class="fa-solid fa-eye me-2"></i> Visi</h5>
                        <p class="text-light mb-0 small" style="line-height: 1.7;">"Menjadi generasi yang radikal bagi Kristus, berakar kuat dalam kebenaran, dan bersinar di tengah dunia."</p>
                    </div>
                    
                    <h5 class="fw-bold mb-3" style="color: #EC4899;"><i class="fa-solid fa-bullseye me-2"></i> Misi</h5>
                    <ul class="mission-list small mb-0" style="line-height: 1.8;">
                        <li>Membangun gaya hidup doa, pujian, dan penyembahan yang intim dengan Tuhan.</li>
                        <li>Memuridkan generasi muda melalui komunitas sel rohani (Cool) yang suportif dan asik.</li>
                        <li>Menggali dan memaksimalkan potensi / talenta anak muda untuk melayani dengan cara masa kini.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container text-center pt-5 mt-5"> <div data-aos="fade-up">
            <span class="badge text-uppercase px-3 py-2 rounded-pill mb-2" style="background: rgba(236, 72, 153, 0.1); color: #EC4899; border: 1px solid rgba(236, 72, 153, 0.5);">The Dream Team</span>
            <h2 class="fw-bold mb-2">DOT <span class="text-gradient-animated">Leadership Team</span> 👑</h2>
            <p class="text-secondary mb-5">Kenalan yuk sama kakak-kakak pengurus yang siap melayani dengan hati!</p>
        </div>
        
        <div class="row justify-content-center g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="glass-card text-center h-100 p-4">
                    <div class="profile-img-container"><img src="images/hizqia.jpg" alt="Hizqia" class="profile-img"></div>
                    <h4 class="fw-bold text-white mb-1">Ka Hizqia</h4>
                    <p class="small text-info mb-0 fw-bold"><i class="fa-solid fa-crown me-1"></i> Ketua Dept</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="glass-card text-center h-100 p-4">
                    <div class="profile-img-container"><img src="https://ui-avatars.com/api/?name=Dyto&background=111827&color=8B5CF6&size=200&bold=true" alt="Dyto" class="profile-img"></div>
                    <h4 class="fw-bold text-white mb-1">Ka Dyto</h4>
                    <p class="small mb-0 fw-bold" style="color: #8B5CF6;"><i class="fa-solid fa-star me-1"></i> Wakil Ketua</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="glass-card text-center h-100 p-4">
                    <div class="profile-img-container"><img src="https://ui-avatars.com/api/?name=Veli&background=111827&color=EC4899&size=200&bold=true" alt="Veli" class="profile-img"></div>
                    <h4 class="fw-bold text-white mb-1">Ka Veli</h4>
                    <p class="small mb-0 fw-bold" style="color: #EC4899;"><i class="fa-solid fa-pen-nib me-1"></i> Sekretaris</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="glass-card text-center h-100 p-4">
                    <div class="profile-img-container"><img src="https://ui-avatars.com/api/?name=Kezia&background=111827&color=F59E0B&size=200&bold=true" alt="Kezia" class="profile-img"></div>
                    <h4 class="fw-bold text-white mb-1">Ka Kezia</h4>
                    <p class="small text-warning mb-0 fw-bold"><i class="fa-solid fa-coins me-1"></i> Bendahara</p>
                </div>
            </div>
        </div>
        
        <div class="mt-5 pt-5 pb-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="glass-card d-inline-block px-4 px-md-5 py-5 text-center mx-auto" style="border-color: rgba(96, 165, 250, 0.3); background: rgba(96, 165, 250, 0.02);">
                <h3 class="text-white fw-bold mb-3">Siap bertumbuh & seru-seruan bareng kita? 🎉</h3>
                <p class="text-secondary mb-4 mx-auto" style="max-width: 500px;">Jangan cuma jadi penonton, yuk gabung dan temukan keluarga rohanimu di sini!</p>
                <a href="/#join" class="btn btn-gradient rounded-pill px-5 py-3 fs-5 fw-bold">Daftar Sekarang <i class="fa-solid fa-rocket ms-2"></i></a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ 
            duration: 800, 
            once: true, 
            offset: 50 
        });
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