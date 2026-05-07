<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center px-3">
        <div class="card interactive-card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 900px; width: 100%;" data-aos="zoom-in-up">
            <div class="row g-0">
                <div class="col-md-6 bg-primary text-white d-flex flex-column justify-content-center align-items-center p-5 position-relative overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>
                    <i class="bi bi-cpu display-1 mb-4 position-relative z-1" data-aos="flip-left" data-aos-delay="300"></i>
                    <h2 class="fw-bold position-relative z-1" data-aos="fade-up" data-aos-delay="400">Sistem Klarin</h2>
                    <p class="text-center position-relative z-1" data-aos="fade-up" data-aos-delay="500">Monitor dan kelola jam lembur secara presisi dan *real-time*.</p>
                </div>
                
                <div class="col-md-6 p-5 bg-body">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-body-emphasis">Akses Masuk</h4>
                        <p class="text-secondary small">Masukkan identitas Anda</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-4" data-aos="fade-left" data-aos-delay="200">
                            <input type="text" name="nomor_induk" class="form-control rounded-3" id="floatingInduk" placeholder="NIP / NIM" required>
                            <label for="floatingInduk"><i class="bi bi-person-badge me-2"></i>NIP / NIM</label>
                        </div>

                        <div class="form-floating mb-4" data-aos="fade-left" data-aos-delay="300">
                            <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword"><i class="bi bi-key me-2"></i>Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold mb-3" data-aos="fade-up" data-aos-delay="400">
                            Autentikasi <i class="bi bi-box-arrow-in-right ms-2"></i>
                        </button>
                        
                        <p class="text-center text-secondary small" data-aos="fade-up" data-aos-delay="500">Belum terdaftar? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">Registrasi Akses</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>