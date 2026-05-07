<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center px-3 py-5 bg-body-tertiary">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 500px; width: 100%;" data-aos="fade-up">
            <div class="p-5 bg-body">
                <div class="text-center mb-4">
                    <div class="bg-success-subtle text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-key display-5"></i>
                    </div>
                    <h4 class="fw-bold text-body-emphasis">Buat Kata Sandi Baru</h4>
                    <p class="text-secondary small">Identitas berhasil diverifikasi. Silakan masukkan password baru Anda.</p>
                </div>

                <form method="POST" action="{{ route('password.store.custom') }}">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" id="password" placeholder="Password Baru" required autofocus>
                        <label for="password"><i class="bi bi-lock me-2"></i>Password Baru</label>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" class="form-control rounded-3" id="password_confirmation" placeholder="Konfirmasi Password" required>
                        <label for="password_confirmation"><i class="bi bi-lock-fill me-2"></i>Ulangi Password Baru</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100 rounded-pill py-3 fw-bold interactive-card">
                        Simpan Password Baru <i class="bi bi-check-circle ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>