<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webnya-AMANIN</title>
    
    <link rel="icon" type="image/png" href="{{ asset('img/processed_image2.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customstyle.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/customstyle.css') }}">
</head>

<body>
    <!-- WRAPPER HALAMAN -->
    <div id="main-wrapper" style="opacity: 1; transform: scale(1);"> 
        
        <!-- HEADER & NAVBAR -->
        <header class="header shadow-sm sticky-top" style="background-color: var(--bg-card);">
            <nav class="navbar navbar-expand-lg navbar-light p-0" id="mainNav">
                <div class="container-md"> 
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="rounded-circle border border-secondary" style="width: 40px; height: 40px; overflow: hidden;">
                            <img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo" class="w-100 h-100" style="object-fit: cover;">
                        </div>
                        <span class="ml-2 h5 font-weight-bold mb-0 text-primary">AMANIN</span>
                    </a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> 
                        <ul class="navbar-nav text-base font-weight-medium align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link text-secondary {{ Request::is('/') ? 'active font-weight-bold text-primary' : '' }}" href="{{ url('/') }}">Beranda</a>
                            </li>
                            
                            <!-- MENU LAYANAN DENGAN DROPDOWN -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-secondary {{ Request::is('layanan') || Request::is('mitra') ? 'active font-weight-bold text-primary' : '' }}" href="{{ url('/layanan') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Layanan
                                </a>
                                <div class="dropdown-menu shadow border-0 mt-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/layanan') }}">Lihat Semua Layanan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('/layanan') }}">Sistem Pemantauan AI</a>
                                    <a class="dropdown-item" href="{{ url('/layanan') }}">Pengawalan Profesional</a>
                                    <a class="dropdown-item" href="{{ url('/layanan') }}">Keamanan Terpadu</a>
                                    
                                    <!-- LINK BARU MENUJU HALAMAN KLIEN/MITRA -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-primary font-weight-bold" href="{{ url('/mitra') }}">
                                        <i class="fas fa-handshake mr-2"></i>Klien & Mitra Kami
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-secondary {{ Request::is('tentang-kami') ? 'active font-weight-bold text-primary' : '' }}" href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary {{ Request::is('kontak') ? 'active font-weight-bold text-primary' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary {{ Request::is('berita') ? 'active font-weight-bold text-primary' : '' }}" href="{{ url('/berita') }}">Berita</a>
                            </li>

                            <li class="nav-item ml-lg-3 mt-2 mt-lg-0 pb-2 pb-lg-0">
                                <button id="darkModeToggle" class="btn btn-sm btn-outline-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
                                    <i class="fas fa-moon"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- BAGIAN KONTEN DINAMIS (Akan diisi oleh file lain) -->
        <main>
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer class="bg-light py-4 border-top">
            <div class="container-md"> 
                <p class="text-muted small text-center mb-0">&copy; 2026 PT Selalu Dibuat Aman.</p>
                <p class="text-muted small text-center mb-0">Surakarta, Indonesia</p>
            </div>
        </footer>

    </div>

    <!-- SCRIPT BAWAAN BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Tempat untuk script tambahan jika dibutuhkan per halaman -->
    @stack('scripts')
</body>
</html>