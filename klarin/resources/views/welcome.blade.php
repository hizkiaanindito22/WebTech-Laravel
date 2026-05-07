<x-guest-layout>
    <style>
        /* SCROLL SNAPPING GLOBAL */
        html {
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
        }

        body {
            /* Sembunyikan scrollbar agar terlihat lebih bersih (opsional) */
            scrollbar-width: none; 
            -ms-overflow-style: none;
        }
        body::-webkit-scrollbar {
            display: none;
        }

        /* SECTION LAYOUT (Setiap bagian ukurannya persis 1 layar) */
        .fullscreen-section {
            height: 100vh;
            width: 100vw;
            scroll-snap-align: start;
            scroll-snap-stop: always; /* Memaksa berhenti di setiap section */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* BACKGROUND HERO INTERAKTIF */
        .hero-section {
            background: radial-gradient(circle at var(--mouseX, 50%) var(--mouseY, 50%), rgba(13, 110, 253, 0.15) 0%, var(--bs-body-bg) 50%);
            transition: background 0.1s ease;
        }

        /* SHINY TEXT */
        .shiny-text {
            background: linear-gradient(90deg, var(--bs-body-color), #0dcaf0, var(--bs-body-color));
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: shine 3s linear infinite;
        }
        @keyframes shine {
            to { background-position: 200% center; }
        }

        /* FLOATING NAVIGATION DOTS */
        .nav-dots {
            position: fixed;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .nav-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--bs-secondary);
            opacity: 0.5;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .nav-dot:hover, .nav-dot.active {
            opacity: 1;
            transform: scale(1.5);
            background-color: var(--bs-primary);
        }
    </style>

    <div class="nav-dots d-none d-md-flex">
        <a href="#hero" class="nav-dot active" title="Beranda" onclick="setActive(this)"></a>
        <a href="#about" class="nav-dot" title="Tentang Klarin" onclick="setActive(this)"></a>
        <a href="#developer" class="nav-dot" title="Kontak Developer" onclick="setActive(this)"></a>
    </div>

    <section id="hero" class="fullscreen-section hero-section">
        <div class="position-absolute opacity-25" style="top: 15%; left: 10%;"><i class="bi bi-gear-fill fs-1 text-primary" style="animation: spin 10s linear infinite;"></i></div>
        <div class="position-absolute opacity-25" style="bottom: 20%; right: 15%;"><i class="bi bi-cpu fs-1 text-info"></i></div>

        <div class="container relative z-1">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 text-center text-lg-start" data-aos="fade-up">
                    <div class="d-inline-flex align-items-center bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                        <span class="spinner-grow spinner-grow-sm me-2"></span> <span class="fw-bold small">Sistem Aktif & Terhubung</span>
                    </div>
                    <h1 class="display-2 fw-bolder mb-3">
                        <i class="bi bi-stopwatch text-primary"></i> <span class="shiny-text d-inline-block">Klarin Hub</span>
                    </h1>
                    <p class="lead mb-5 text-body-secondary border-start border-primary border-4 ps-4 ms-2 py-2" style="max-width: 600px;">
                        Platform monitoring instruksi lab dan manajemen waktu lembur. Scroll ke bawah untuk mempelajari lebih lanjut, atau langsung masuk ke area kerja Anda.
                    </p>
                    
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start ms-2">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm interactive-card">Buka Panel <i class="bi bi-arrow-right ms-2"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm interactive-card">Masuk Sistem</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-5 rounded-pill interactive-card">Registrasi</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-5 d-none d-lg-block" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card bg-body-tertiary border-0 shadow-lg rounded-4 p-5 text-center interactive-card border-bottom border-5 border-primary">
                        <i class="bi bi-kanban display-1 mb-4 text-primary d-block"></i>
                        <h3 class="fw-bold text-body-emphasis">Real-Time Sync</h3>
                        <p class="text-body-secondary m-0">Eksekusi instruksi dari dosen langsung terekam dengan presisi waktu yang akurat.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="#about" class="position-absolute bottom-0 mb-4 text-primary" style="animation: bounce 2s infinite;">
            <i class="bi bi-chevron-double-down fs-2"></i>
        </a>
    </section>

    <section id="about" class="fullscreen-section bg-body">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-down">
                <span class="text-primary fw-bold tracking-wide text-uppercase small">Tentang Aplikasi</span>
                <h2 class="display-5 fw-bold text-body-emphasis mt-2">Mengapa Menggunakan Klarin?</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 bg-body-tertiary rounded-4 p-4 interactive-card shadow-sm">
                        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <h4 class="fw-bold">Role-Based System</h4>
                        <p class="text-body-secondary small">Pemisahan hak akses yang jelas antara Instruktur (Dosen) yang memberikan tugas dengan Praktikan (Mahasiswa) yang mengeksekusi.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 bg-body-tertiary rounded-4 p-4 interactive-card shadow-sm">
                        <div class="bg-info-subtle text-info rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="bi bi-shield-check fs-3"></i>
                        </div>
                        <h4 class="fw-bold">Validasi Berlapis</h4>
                        <p class="text-body-secondary small">Mahasiswa tidak dapat menyerahkan laporan secara asal. Sistem mengunci konfirmasi hingga seluruh progress instruksi diselesaikan.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 bg-body-tertiary rounded-4 p-4 interactive-card shadow-sm">
                        <div class="bg-warning-subtle text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="bi bi-stopwatch fs-3"></i>
                        </div>
                        <h4 class="fw-bold">Manajemen Kuota & Arsip</h4>
                        <p class="text-body-secondary small">Pembatasan jumlah personel yang dapat lembur. Saat pekerjaan diselesaikan, data tidak hilang, melainkan menjadi arsip permanen dosen.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="developer" class="fullscreen-section bg-body-tertiary">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-body">
                        <div class="row g-0">
                            <div class="col-md-5 bg-primary text-white d-flex flex-column align-items-center justify-content-center p-5 position-relative">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-10"></div>
                                <img src="https://ui-avatars.com/api/?name=Hizkia+Anindito&background=ffffff&color=0d6efd&size=150" class="rounded-circle border border-4 border-white mb-3 shadow z-1" alt="Developer Photo">
                                <h4 class="fw-bold mb-0 z-1">Hizkia Anindito</h4>
                                <span class="badge bg-light text-primary mt-2 z-1">Full-Stack Developer</span>
                            </div>
                            
                            <div class="col-md-7 p-5">
                                <span class="text-primary fw-bold tracking-wide text-uppercase small">Pengembang Sistem</span>
                                <h3 class="fw-bold text-body-emphasis mb-4">Informasi Kontak</h3>
                                
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-3 d-flex align-items-center text-body-secondary">
                                        <i class="bi bi-mortarboard fs-4 me-3 text-primary"></i> 
                                        <div>
                                            <strong class="d-block text-body-emphasis">D4 Teknik Mekatronika</strong>
                                            Politeknik ATMI Surakarta
                                        </div>
                                    </li>
                                    <li class="mb-3 d-flex align-items-center text-body-secondary">
                                        <i class="bi bi-geo-alt fs-4 me-3 text-danger"></i> 
                                        <div>
                                            <strong class="d-block text-body-emphasis">Lokasi</strong>
                                            Surakarta (Solo), Jawa Tengah
                                        </div>
                                    </li>
                                    <li class="mb-3 d-flex align-items-center text-body-secondary">
                                        <i class="bi bi-tools fs-4 me-3 text-warning"></i> 
                                        <div>
                                            <strong class="d-block text-body-emphasis">Tech Stack</strong>
                                            Laravel, Bootstrap 5, MySQL
                                        </div>
                                    </li>
                                </ul>

                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary rounded-pill px-4"><i class="bi bi-linkedin me-2"></i>LinkedIn</button>
                                    <button class="btn btn-dark rounded-pill px-4"><i class="bi bi-github me-2"></i>GitHub</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5" data-aos="fade-up">
                <small class="text-muted">&copy; {{ date('Y') }} Klarin Hub. Seluruh hak cipta dilindungi.</small>
            </div>
        </div>
    </section>

    <script>
        // 1. Mouse Tracking Background (Hanya aktif di Hero Section)
        const heroArea = document.getElementById('hero');
        heroArea.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth) * 100;
            const y = (e.clientY / window.innerHeight) * 100;
            heroArea.style.setProperty('--mouseX', x + '%');
            heroArea.style.setProperty('--mouseY', y + '%');
        });

        // 2. Refresh Animasi AOS saat melakukan scroll (Mendukung Scroll Snapping)
        // Karena kita menggunakan scroll-snap di elemen <html>, AOS perlu di-refresh atau mendengarkan scroll window
        window.addEventListener('scroll', function() {
            // Update Active Dots
            let scrollPosition = window.scrollY;
            let windowHeight = window.innerHeight;
            
            let dots = document.querySelectorAll('.nav-dot');
            if (scrollPosition < windowHeight / 2) {
                setActiveDirect(dots[0]);
            } else if (scrollPosition < windowHeight * 1.5) {
                setActiveDirect(dots[1]);
            } else {
                setActiveDirect(dots[2]);
            }
        });

        // Fungsi manual untuk mengatur dot aktif
        function setActive(element) {
            document.querySelectorAll('.nav-dot').forEach(el => el.classList.remove('active'));
            element.classList.add('active');
        }

        function setActiveDirect(element) {
            document.querySelectorAll('.nav-dot').forEach(el => el.classList.remove('active'));
            if(element) element.classList.add('active');
        }

        // Keyframe CSS animasi pantul panah bawah
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
                40% { transform: translateY(-20px); }
                60% { transform: translateY(-10px); }
            }
            @keyframes spin { 100% { transform: rotate(360deg); } }
        `;
        document.head.appendChild(style);
    </script>
</x-guest-layout>