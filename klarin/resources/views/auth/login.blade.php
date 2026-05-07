<x-guest-layout>
    <style>
        body, html {
            margin: 0; padding: 0;
            width: 100vw; height: 100vh;
            background: radial-gradient(circle at top left, rgba(13, 110, 253, 0.08), transparent 40%),
                        radial-gradient(circle at bottom right, rgba(13, 202, 240, 0.05), transparent 40%);
            background-color: var(--bs-body-bg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .card-login {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            overflow: hidden;
            background: var(--bs-body);
        }
    </style>

    <div class="login-container">
        <div class="text-center mb-4" data-aos="fade-down">
            <a href="{{ url('/') }}" class="text-decoration-none text-secondary small">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="card card-login" data-aos="zoom-in">
            <div class="bg-primary p-4 text-center text-white position-relative">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-10"></div>
                <i class="bi bi-fingerprint display-4 mb-2 d-block"></i>
                <h4 class="fw-bold m-0 position-relative z-1">Autentikasi Klarin</h4>
            </div>

            <div class="card-body p-4 p-md-5">
                <x-auth-session-status class="mb-4 text-success fw-bold text-center small bg-success-subtle p-2 rounded-3" :status="session('status')" />
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-floating mb-4">
                        <input type="text" name="nomor_induk" class="form-control bg-body-tertiary border-0" id="floatingInduk" placeholder="NIP / NIM" required autofocus>
                        <label for="floatingInduk" class="text-secondary">NIP / NIM</label>
                        <x-input-error :messages="$errors->get('nomor_induk')" class="mt-2 text-danger small" />
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control bg-body-tertiary border-0" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword" class="text-secondary">Kata Sandi</label>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4 px-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-secondary small" for="remember">Ingat Saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-primary text-decoration-none small fw-bold">Lupa Sandi?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold mb-4 shadow-sm interactive-card">
                        Masuk Panel <i class="bi bi-box-arrow-in-right ms-2"></i>
                    </button>
                    
                    <p class="text-center text-secondary small mb-0">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">Daftar Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>