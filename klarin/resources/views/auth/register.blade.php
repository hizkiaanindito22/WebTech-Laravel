<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5 px-3">
        <div class="card interactive-card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 700px; width: 100%;" data-aos="fade-down">
            <div class="card-header bg-primary text-white text-center p-4 border-0">
                <i class="bi bi-person-lines-fill display-4 mb-2 d-block"></i>
                <h3 class="fw-bold mb-0">Registrasi Klarin</h3>
            </div>
            
            <div class="card-body bg-body p-4 p-md-5">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" required>
                        <label for="name">Nama Lengkap Sesuai ID</label>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="role" class="form-select" id="roleSelect" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="dosen">Instruktur (Dosen)</option>
                                    <option value="mahasiswa">Praktikan (Mahasiswa)</option>
                                </select>
                                <label for="roleSelect">Kategori Hak Akses</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nomor_induk" class="form-control" id="nomorInduk" placeholder="NIP/NIM" required>
                                <label for="nomorInduk" id="labelInduk">NIP / NIM</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3 d-none" id="kodeDosenContainer" style="animation: fadeIn 0.4s ease;">
                        <input type="text" name="kode_dosen" class="form-control border-danger border-2 text-danger fw-bold" id="kodeDosen" placeholder="Kode Unik">
                        <label for="kodeDosen" class="text-danger"><i class="bi bi-key-fill me-2"></i>Kode Verifikasi Instruktur</label>
                        <x-input-error :messages="$errors->get('kode_dosen')" class="mt-2 text-danger small" />
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary small mb-1"><i class="bi bi-camera me-1"></i>Foto Profil (Opsional)</label>
                        <input type="file" name="foto" class="form-control form-control-lg" accept="image/*">
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="pass" placeholder="Password" required>
                                <label for="pass">Kata Sandi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation" class="form-control" id="passConf" placeholder="Konfirmasi" required>
                                <label for="passConf">Konfirmasi Kata Sandi</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold interactive-card">Daftarkan Akun</button>
                    
                    <p class="text-center mt-4 mb-0 text-secondary">
                        Sudah punya akses? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">Login di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('roleSelect').addEventListener('change', function() {
            let kodeContainer = document.getElementById('kodeDosenContainer');
            let kodeInput = document.getElementById('kodeDosen');
            
            document.getElementById('labelInduk').innerText = this.value === 'dosen' ? 'NIP (4 Digit)' : 'NIM (8 Digit)';
            
            // Logika menampilkan input kode rahasia
            if(this.value === 'dosen') {
                kodeContainer.classList.remove('d-none');
                kodeInput.required = true;
            } else {
                kodeContainer.classList.add('d-none');
                kodeInput.required = false;
                kodeInput.value = ''; // Reset nilai
            }
        });
    </script>
</x-guest-layout>