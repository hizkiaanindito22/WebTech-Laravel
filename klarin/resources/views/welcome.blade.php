<x-guest-layout>
    <style>
        /* Mengunci scroll bar bawaan */
        body, html {
            margin: 0; padding: 0;
            width: 100vw; height: 100vh;
            overflow: hidden; /* Sembunyikan scrollbar */
            background-color: var(--bs-body-bg);
        }

        /* Mode Slide Presentasi */
        .slide-container {
            position: relative;
            width: 100%; height: 100%;
        }
        
        .section-slide {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.8s cubic-bezier(0.25, 0.8, 0.25, 1), visibility 0.8s;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        /* Saat slide aktif */
        .section-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 10;
        }

        /* Background Hero */
        #slide-0 {
            background: radial-gradient(circle at 50% 50%, rgba(13, 110, 253, 0.15) 0%, var(--bs-body-bg) 70%);
        }

        /* Shiny Text */
        .shiny-text {
            background: linear-gradient(90deg, var(--bs-body-color), #0dcaf0, var(--bs-body-color));
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: shine 3s linear infinite;
        }
        @keyframes shine { to { background-position: 200% center; } }

        /* Floating Nav Dots */
        .nav-dots {
            position: fixed;
            right: 40px; top: 50%;
            transform: translateY(-50%);
            z-index: 9999;
            display: flex; flex-direction: column; gap: 20px;
        }
        .nav-dot {
            width: 12px; height: 12px;
            border-radius: 50%;
            background-color: var(--bs-secondary);
            opacity: 0.3;
            cursor: pointer;
            transition: all 0.4s ease;
        }
        .nav-dot:hover { opacity: 0.8; transform: scale(1.3); }
        .nav-dot.active {
            background-color: var(--bs-primary);
            opacity: 1; transform: scale(1.5);
            box-shadow: 0 0 10px var(--bs-primary);
        }
    </style>

    <div class="nav-dots d-none d-md-flex">
        <div class="nav-dot active" onclick="goToSlide(0)"></div>
        <div class="nav-dot" onclick="goToSlide(1)"></div>
        <div class="nav-dot" onclick="goToSlide(2)"></div>
    </div>

    <div class="slide-container">
        
        <section class="section-slide active" id="slide-0">
            <div class="position-absolute opacity-25" style="top: 15%; left: 10%;"><i class="bi bi-gear-fill fs-1 text-primary"></i></div>
            
            <div class="container text-center text-lg-start">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7">
                        <div class="d-inline-flex align-items-center bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                            <span class="spinner-grow spinner-grow-sm me-2"></span> <span class="fw-bold small">Sistem Aktif</span>
                        </div>
                        <h1 class="display-2 fw-bolder mb-3">
                            <i class="bi bi-stopwatch text-primary"></i> <span class="shiny-text d-inline-block">Klarin Hub</span>
                        </h1>
                        <p class="lead mb-5 text-body-secondary border-start border-primary border-4 ps-4 py-2" style="max-width: 600px;">
                            Platform monitoring instruksi lab dan manajemen waktu lembur. 
                        <div class="d-flex gap-3 justify-content-center justify-content-lg-start ms-2">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow">Masuk Panel</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Login Sistem</a>
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-5 rounded-pill">Registrasi</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block text-center">
                        <i class="bi bi-pc-display-horizontal display-1 text-primary" style="font-size: 15rem; opacity:0.8;"></i>
                    </div>
                </div>
            </div>
            <div class="position-absolute bottom-0 mb-4 text-primary text-center w-100" style="animation: bounce 2s infinite;">
                <small class="d-block fw-bold mb-1">Scroll</small>
                <i class="bi bi-chevron-double-down fs-4"></i>
            </div>
        </section>

        <section class="section-slide bg-body-tertiary" id="slide-1">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="text-primary fw-bold tracking-wide text-uppercase small">Fitur Utama</span>
                    <h2 class="display-5 fw-bold text-body-emphasis mt-2">Mengapa Klarin?</h2>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body rounded-4 p-4 shadow-sm border-bottom border-4 border-primary">
                            <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                                <i class="bi bi-shield-lock-fill fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Role-Based Access</h5>
                            <p class="text-body-secondary small">Instruktur dilengkapi kode keamanan unik, mencegah pihak tidak berwenang mendaftar sebagai pengatur lembur.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body rounded-4 p-4 shadow-sm border-bottom border-4 border-info">
                            <div class="bg-info-subtle text-info rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                                <i class="bi bi-check2-all fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Validasi Ketat</h5>
                            <p class="text-body-secondary small">Mahasiswa diwajibkan menyelesaikan 100% instruksi dari Dosen sebelum diperbolehkan mengirimkan laporan akhir.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body rounded-4 p-4 shadow-sm border-bottom border-4 border-warning">
                            <div class="bg-warning-subtle text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                                <i class="bi bi-clock-history fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Laporan Real-Time</h5>
                            <p class="text-body-secondary small">Setiap laporan yang terkirim mencatat jejak waktu presisi dan menjadi arsip permanen untuk Dosen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-slide bg-body" id="slide-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-body-tertiary">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5 bg-primary text-white text-center p-5">
                                    <img src="https://ui-avatars.com/api/?name=Hizkia+Anindito&background=ffffff&color=0d6efd&size=150" class="rounded-circle border border-4 border-white mb-3 shadow" alt="Dev">
                                    <h5 class="fw-bold mb-0">Hizkia Anindito</h5>
                                    <span class="badge bg-light text-primary mt-2">D4 Mekatronika</span>
                                </div>
                                <div class="col-md-7 p-5">
                                    <span class="text-primary fw-bold text-uppercase small">Pengembang Sistem</span>
                                    <h3 class="fw-bold text-body-emphasis mb-4">Politeknik ATMI</h3>
                                    <ul class="list-unstyled mb-4 small">
                                        <li class="mb-3"><i class="bi bi-geo-alt fs-5 me-2 text-danger"></i> Surakarta (Solo), Jawa Tengah</li>
                                        <li class="mb-3"><i class="bi bi-tools fs-5 me-2 text-warning"></i> Laravel 11, Bootstrap 5.3</li>
                                        <li><i class="bi bi-envelope fs-5 me-2 text-info"></i> Admin Hubungi via Lab</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <small class="text-muted">&copy; {{ date('Y') }} Klarin Hub System. All rights reserved.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        // JS LOGIC UNTUK 1 SLIDE PRESENTASI
        let currentSlide = 0;
        const slides = document.querySelectorAll('.section-slide');
        const dots = document.querySelectorAll('.nav-dot');
        let isAnimating = false;

        function goToSlide(index) {
            if (isAnimating || index < 0 || index >= slides.length) return;
            
            isAnimating = true;
            
            // Hapus class active dari semua
            slides.forEach(s => s.classList.remove('active'));
            dots.forEach(d => d.classList.remove('active'));
            
            // Tambahkan class active ke target
            slides[index].classList.add('active');
            dots[index].classList.add('active');
            
            currentSlide = index;
            
            // Kunci animasi agar tidak double-scroll
            setTimeout(() => {
                isAnimating = false;
            }, 1000); 
        }

        // Tangkap event scroll mouse
        window.addEventListener('wheel', (e) => {
            if(e.deltaY > 0) {
                // Scroll bawah
                goToSlide(currentSlide + 1);
            } else {
                // Scroll atas
                goToSlide(currentSlide - 1);
            }
        });

        // Tangkap event panah keyboard (Opsional, lebih aksesibel)
        window.addEventListener('keydown', (e) => {
            if(e.key === 'ArrowDown') goToSlide(currentSlide + 1);
            if(e.key === 'ArrowUp') goToSlide(currentSlide - 1);
        });

        const style = document.createElement('style');
        style.innerHTML = `@keyframes bounce { 0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 40% { transform: translateY(-15px); } 60% { transform: translateY(-7px); } }`;
        document.head.appendChild(style);
    </script>
</x-guest-layout>