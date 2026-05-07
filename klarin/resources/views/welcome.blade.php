<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-body text-body">
        <div class="container text-center text-md-start">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <div class="d-inline-flex align-items-center bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                        <i class="bi bi-cpu-fill me-2"></i> <span class="fw-bold small">Sistem Monitoring Terpadu</span>
                    </div>
                    <h1 class="display-3 fw-bolder mb-4">
                        Klarin <span class="text-primary">Hub</span>
                    </h1>
                    <p class="lead text-secondary mb-4" style="max-width: 500px;">
                        Manajemen tugas laboratorium dan jadwal lembur praktikum yang presisi. Pantau instruksi dan progres secara real-time.
                    </p>
                    
                    <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">Buka Panel <i class="bi bi-arrow-right ms-2"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">Masuk Sistem</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">Registrasi</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-5 text-center" data-aos="fade-left" data-aos-duration="1200">
                    <div class="position-relative d-inline-block">
                        <div class="position-absolute top-50 start-50 translate-middle bg-primary rounded-circle opacity-10" style="width: 300px; height: 300px; filter: blur(40px);"></div>
                        <i class="bi bi-kanban display-1 text-body-emphasis position-relative z-1" style="font-size: 8rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>