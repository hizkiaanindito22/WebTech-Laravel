@extends('layouts.app')

@section('content')
    <!-- HERO SECTION DENGAN CAROUSEL (Slide 2 Detik) -->
    <section id="home" class="hero">
        <div id="heroCarousel" class="carousel slide" data-ride="carousel" data-interval="2000"> 
            
            <!-- Indikator Slide -->
            <ol class="carousel-indicators">
                <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#heroCarousel" data-slide-to="1"></li>
                <li data-target="#heroCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" style="height: 100vh;">
                <!-- Slide 1 -->
                <div class="carousel-item active h-100">
                    <img src="{{ asset('img/perumahan.png') }}" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Patroli Perumahan">
                    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);"></div> 
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 pb-5"> 
                        <h1 class="display-4 font-weight-bold mb-3 text-white">MENCIPTAKAN LINGKUNGAN YANG AMAN.</h1>
                        <p class="lead text-white mb-4">Solusi Keamanan Terpadu untuk Ketenangan Pikiran Anda.</p>
                        <a href="{{ url('/layanan') }}" class="btn btn-primary px-5 py-2 font-weight-bold shadow-lg rounded-pill">Jelajahi Solusi</a>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item h-100">
                    <img src="{{ asset('img/control room.png') }}" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Control Room">
                    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 pb-5">
                        <h1 class="display-4 font-weight-bold mb-3 text-white">PEMANTAUAN DENGAN AI.</h1>
                        <p class="lead text-white mb-4">Perlindungan Maksimal Dibantu Kecerdasan Buatan.</p>
                        <a href="{{ url('/layanan') }}" class="btn btn-primary px-5 py-2 font-weight-bold shadow-lg rounded-pill">Lihat Detail</a>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item h-100">
                    <img src="{{ asset('img/pengawalan.png') }}" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Pengawalan">
                    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 pb-5">
                        <h1 class="display-4 font-weight-bold mb-3 text-white">PENGAWALAN DI LAPANGAN.</h1>
                        <p class="lead text-white mb-4">Respon Cepat untuk Menghargai Waktu Anda.</p>
                        <a href="{{ url('/tentang-kami') }}" class="btn btn-primary px-5 py-2 font-weight-bold shadow-lg rounded-pill">Tentang Kami</a>
                    </div>
                </div>
            </div>
            
            <!-- Tombol Navigasi Kiri & Kanan -->
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    
    <!-- HIGHLIGHT LAYANAN -->
    <!-- HIGHLIGHT LAYANAN DENGAN BACKGROUND GIF -->
    <section class="py-5 position-relative" style="background: url('{{ asset('img/ai_cctv.gif') }}') center center/cover no-repeat fixed;">
        
        <!-- Overlay Gelap: Agar teks & card tetap terbaca di atas GIF yang bergerak -->
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(15, 32, 60, 0.85);"></div>
        
        <!-- z-index: 2 agar konten berada di atas overlay -->
        <div class="container text-center py-5 position-relative" style="z-index: 2;"> 
            <h2 class="font-weight-bold mb-5 text-white">Layanan Unggulan Kami</h2>
            
            <!-- DIV BUNGKUSAN INI PENTING UNTUK EFEK BLUR (service-container) -->
            <div class="row service-container"> 
                
                <div class="col-md-4 mb-4"> 
                    <div class="card h-100 border-0 shadow-sm rounded-lg p-4 service-card bg-white"> 
                        <div class="card-body">
                            <i class="fas fa-eye fa-3x mb-4 text-primary"></i>
                            <h5 class="font-weight-bold text-dark">Pemantauan AI</h5>
                            <p class="text-secondary mt-3">Sistem pengawasan terintegrasi dengan kecerdasan buatan.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4"> 
                    <div class="card h-100 border-0 shadow-sm rounded-lg p-4 service-card bg-white" style="border-bottom: 4px solid #007bff !important;"> 
                        <div class="card-body">
                            <i class="fas fa-shield-alt fa-3x mb-4 text-primary"></i>
                            <h5 class="font-weight-bold text-dark">Pengawalan Profesional</h5>
                            <p class="text-secondary mt-3">Tim terlatih untuk perlindungan fisik dan patroli area.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4"> 
                    <div class="card h-100 border-0 shadow-sm rounded-lg p-4 service-card bg-white"> 
                        <div class="card-body">
                            <i class="fas fa-satellite-dish fa-3x mb-4 text-primary"></i>
                            <h5 class="font-weight-bold text-dark">Sistem Terpadu</h5>
                            <p class="text-secondary mt-3">Pemasangan sensor keamanan canggih di titik vital.</p>
                        </div>
                    </div>
                </div>

            </div>
            <a href="{{ url('/layanan') }}" class="btn btn-outline-light mt-4 rounded-pill px-4 font-weight-bold">Lihat Semua Layanan</a>
        </div>
    </section>

    <!-- ABOUT & VIDEO SECTION -->
    <section class="py-5">
        <!-- ... [Bagian video dan deskripsi profil sama seperti sebelumnya] ... -->
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="font-weight-bold text-dark mb-4">Mengenal AMANIN Lebih Dekat</h2>
                    <p class="text-secondary mb-4" style="line-height: 1.8;">
                        Kami adalah mitra terpercaya Anda dalam menjaga keamanan, didukung oleh integritas, teknologi terkini, dan keandalan tinggi. Dengan pengalaman bertahun-tahun, kami siap memberikan perlindungan maksimal 24/7.
                    </p>
                    <ul class="list-unstyled text-secondary mb-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Personel Tersertifikasi</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Teknologi AI Surveillance</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Respon Cepat & Tanggap</li>
                    </ul>
                    <a href="{{ url('/tentang-kami') }}" class="btn btn-primary rounded-pill px-4">Pelajari Profil Kami</a>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative rounded-lg shadow-lg overflow-hidden border border-light">
                        <video class="w-100 d-block" autoplay muted loop playsinline style="object-fit: cover; border-radius: 8px;">
                            <source src="{{ asset('vid/ComPro.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RUNNING LOGO SLIDER (SEBELUM KONTAK) -->
    <section class="border-top border-bottom" style="background-color: var(--bg-card);">
        <div class="container text-center pt-4">
            <h6 class="font-weight-bold text-muted text-uppercase tracking-wider" style="letter-spacing: 2px;">
                Dipercaya oleh Ratusan Fasilitas Publik & Perusahaan
            </h6>
        </div>
        <div class="logo-slider-container">
            <!-- Track berisi 2 Set Logo (Set asli + Set duplikat agar looping tidak putus) -->
            <div class="logo-slider-track">
                
                <!-- SET 1 -->
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    <span class="ml-2 font-weight-bold text-secondary">PT BINTANG</span>
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    <span class="ml-2 font-weight-bold text-secondary">TAMAN KOTA</span>
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    <span class="ml-2 font-weight-bold text-secondary">RS PUSAT</span>
                </div>

                <!-- SET 2 (DUPLIKAT SET 1 AGAR LOOPING MULUS) -->
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    <span class="ml-2 font-weight-bold text-secondary">PT BINTANG</span>
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    <span class="ml-2 font-weight-bold text-secondary">TAMAN KOTA</span>
                </div>
                <div class="logo-item">
                    <!img src="{{ asset('img/Gemini_Generated_Image_6vpono6vpono6vpo.png') }}" alt="Logo Client">
                    <span class="ml-2 font-weight-bold text-secondary">RS PUSAT</span>
                </div>

            </div>
        </div>
    </section>

    <!-- FORM KONTAK (DITAMBAHKAN KEMBALI KE HOME) -->
    <section id="contact" class="py-5" style="background-color: #f8f9fa;"> 
        <div class="container-md my-4"> 
            <div class="row align-items-stretch bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <!-- Kolom Info Kiri -->
                <div class="col-lg-5 p-5 text-white d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, var(--primary, #007bff), #2a4db3);">
                    <h2 class="h2 font-weight-bold mb-4">Mari Berdiskusi</h2>
                    <p class="mb-5" style="opacity: 0.9; line-height: 1.8;">
                        Ceritakan kebutuhan keamanan Anda, dan tim ahli kami akan menghubungi Anda dengan solusi perlindungan terbaik.
                    </p>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; min-width: 50px;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                        <div class="ml-3">
                            <h6 class="mb-0 font-weight-bold">Kantor Pusat</h6>
                            <small style="opacity: 0.8;">Menara Keamanan Barat - Jl. Sakti</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; min-width: 50px;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <div class="ml-3">
                            <h6 class="mb-0 font-weight-bold">Email</h6>
                            <small style="opacity: 0.8;">halo@amanin.co.id</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; min-width: 50px;">
                            <i class="fas fa-phone-alt fa-lg"></i>
                        </div>
                        <div class="ml-3">
                            <h6 class="mb-0 font-weight-bold">Layanan 24/7</h6>
                            <small style="opacity: 0.8;">+62 811-XXXX-XXXX</small>
                        </div>
                    </div>
                </div>

                <!-- Kolom Form Kanan -->
                <div class="col-lg-7 p-4 p-md-5">
                    <h3 class="h4 font-weight-bold mb-4 text-dark">Kirim Pesan Anda</h3>
                    
                    <form action="#" method="GET"> 
                        <div class="row">
                            <div class="col-md-6 mb-4"> 
                                <label class="font-weight-bold text-secondary small mb-2">Nama Lengkap</label>
                                <input type="text" name="namaLengkap" class="form-control bg-light border-0 py-4 px-3" placeholder="Cth: Nama Anda" required> 
                            </div>
                            <div class="col-md-6 mb-4"> 
                                <label class="font-weight-bold text-secondary small mb-2">Alamat Email</label>
                                <input type="email" name="alamatEmail" class="form-control bg-light border-0 py-4 px-3" placeholder="email@domain.com" required> 
                            </div>
                        </div>
                        <div class="form-group mb-4"> 
                            <label class="font-weight-bold text-secondary small mb-2">Detail Proyek / Pesan</label>
                            <textarea name="detailPesan" class="form-control bg-light border-0 p-3" placeholder="Jelaskan secara singkat kebutuhan perlindungan Anda..." rows="5" required></textarea> 
                        </div>
                        
                        <button type="button" onclick="alert('Ini adalah versi statis. Form belum tersambung ke database.')" class="btn btn-primary btn-block py-3 font-weight-bold rounded shadow-sm">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection