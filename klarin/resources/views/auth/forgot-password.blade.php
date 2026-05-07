<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center px-3 py-5 bg-body-tertiary">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 500px; width: 100%;" data-aos="zoom-in">
            <div class="p-5 bg-body">
                <div class="text-center mb-4">
                    <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-shield-lock display-5"></i>
                    </div>
                    <h4 class="fw-bold text-body-emphasis">Pemulihan Akun</h4>
                    <p class="text-secondary small">Masukkan NIP/NIM Anda dan selesaikan verifikasi Captcha keamanan.</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="nomor_induk" class="form-control rounded-3" id="nomor_induk" placeholder="NIP / NIM" value="{{ old('nomor_induk') }}" required autofocus>
                        <label for="nomor_induk"><i class="bi bi-person-badge me-2"></i>NIP / NIM Terdaftar</label>
                        <x-input-error :messages="$errors->get('nomor_induk')" class="mt-2 text-danger small" />
                    </div>

                    <div class="mb-4 bg-body-tertiary p-4 rounded-4 border text-center">
                        <label class="form-label fw-bold text-secondary mb-3"><i class="bi bi-robot me-2"></i>Verifikasi Captcha</label>
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <h2 class="fw-bolder m-0 text-primary">{{ $num1 }} + {{ $num2 }} = </h2>
                            <input type="number" name="captcha" class="form-control form-control-lg w-50 text-center fw-bold shadow-sm" placeholder="?" required>
                        </div>
                        <x-input-error :messages="$errors->get('captcha')" class="mt-2 text-danger small fw-bold" />
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold mb-3 interactive-card">
                        Verifikasi Identitas <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                    <p class="text-center text-secondary small mb-0">
                        <a href="{{ route('login') }}" class="text-decoration-none text-muted fw-bold"><i class="bi bi-arrow-left me-1"></i> Kembali ke Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>