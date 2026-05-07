<x-app-layout>
    <style>
        /* Efek Dusty Fade: Tahan 5 detik, memudar, lalu hilangkan ruangannya */
        @keyframes dustAway {
            0% { opacity: 1; filter: grayscale(80%) blur(0px); max-height: 500px; transform: scale(1) translateY(0); }
            30% { opacity: 0; filter: grayscale(100%) blur(8px); transform: scale(0.95) translateY(-20px); max-height: 500px; padding: calc(var(--bs-gutter-x) * .5); margin-bottom: var(--bs-gutter-y); }
            100% { opacity: 0; max-height: 0; margin: 0; padding: 0; border: 0; overflow: hidden; display: none; }
        }

        .dusty-fade {
            animation: dustAway 3s cubic-bezier(0.25, 0.8, 0.25, 1) forwards;
            animation-delay: 5s; /* Beri waktu 5 detik agar mahasiswa bisa membaca jam laporan */
            transform-origin: top center;
            pointer-events: none;
        }

        .interactive-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .interactive-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <nav class="navbar navbar-expand-lg bg-body shadow-sm sticky-top" data-aos="fade-down">
        <div class="container-fluid px-4 py-2">
            <a class="navbar-brand fw-bolder text-primary fs-4" href="#"><i class="bi bi-terminal-dash me-2"></i>Klarin Panel</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-body-secondary d-none d-md-block border-end pe-3">ID: <strong class="text-body-emphasis">{{ Auth::user()->nomor_induk }}</strong></span>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-bold" type="submit"><i class="bi bi-power me-1"></i>Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-5">
        <div class="row g-4">
            
            <div class="col-lg-3" data-aos="fade-right">
                <div class="card interactive-card shadow-sm border-0 rounded-4 text-center p-4 bg-body sticky-top" style="top: 100px;">
                    <div class="position-relative d-inline-block mx-auto mb-3">
                        @if(Auth::user()->foto)
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle shadow border border-4 border-primary" width="140" height="140" style="object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto shadow border border-4 border-primary" style="width: 140px; height: 140px; font-size: 3rem;">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    
                    <h5 class="fw-bold text-body-emphasis mb-1">{{ Auth::user()->name }}</h5>
                    <p class="badge {{ Auth::user()->role == 'dosen' ? 'bg-danger' : 'bg-primary' }} px-3 py-2 rounded-pill mb-3">
                        {{ strtoupper(Auth::user()->role) }}
                    </p>
                    
                    <div class="bg-body-tertiary p-3 rounded-3 text-start border">
                        <small class="text-muted d-block mb-1">Status Sistem</small>
                        <div class="d-flex align-items-center">
                            <span class="spinner-grow spinner-grow-sm text-success me-2" role="status"></span>
                            <span class="fw-bold text-success small">Online & Synchronized</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show rounded-4" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('success_finish'))
                    <script>
                        Swal.fire({
                            title: 'Laporan Diterima!',
                            text: "{{ session('success_finish') }}",
                            icon: 'success',
                            confirmButtonColor: '#198754'
                        });
                    </script>
                @endif

                @if(Auth::user()->role == 'dosen')
                    <div class="card shadow-sm border-0 rounded-4 bg-body overflow-hidden mb-5" data-aos="fade-up">
                        <div class="card-header bg-primary text-white p-4 border-0">
                            <h4 class="fw-bold m-0"><i class="bi bi-clipboard-plus me-2"></i>Rilis Penugasan Lembur</h4>
                        </div>
                        
                        <div class="card-body p-4 p-md-5">
                            <form action="{{ route('overtimes.store') }}" method="POST">
                                @csrf
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-secondary">JUDUL KEGIATAN</label>
                                        <input type="text" name="judul" class="form-control form-control-lg bg-body-tertiary border-0" placeholder="Misal: Troubleshooting PLC Lab 2" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold small text-secondary">TANGGAL</label>
                                        <input type="date" name="tanggal" class="form-control form-control-lg bg-body-tertiary border-0" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold small text-secondary">KUOTA PERSONEL</label>
                                        <input type="number" name="kuota" class="form-control form-control-lg bg-body-tertiary border-0" min="1" value="1" required>
                                    </div>
                                </div>
                                
                                <label class="form-label fw-bold text-secondary small mb-3">INSTRUKSI KERJA (ACTIVITY)</label>
                                <div id="task-container">
                                    <div class="input-group mb-3 shadow-sm rounded-3 overflow-hidden">
                                        <span class="input-group-text bg-primary-subtle text-primary border-0"><i class="bi bi-chevron-right"></i></span>
                                        <input type="text" name="tasks[]" class="form-control border-0" placeholder="Ketik rincian tugas..." required>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill mt-2 mb-4 fw-bold" onclick="addTask()">
                                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Instruksi
                                </button>
                                
                                <div class="d-grid mt-2">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold hover-shadow">Publikasikan Jadwal <i class="bi bi-send ms-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div data-aos="fade-up">
                        <h5 class="fw-bold text-body-emphasis mb-4"><i class="bi bi-clock-history me-2 text-primary"></i>Arsip Riwayat Penugasan</h5>
                        @if($overtimes->isEmpty())
                            <div class="text-center p-5 bg-body-tertiary rounded-4 border border-dashed">
                                <p class="text-muted m-0 italic">Belum ada catatan riwayat penugasan.</p>
                            </div>
                        @else
                            <div class="row g-3">
                                @foreach($overtimes as $ot)
                                <div class="col-md-6">
                                    <div class="card shadow-sm border-0 bg-body rounded-4 h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="fw-bold m-0 text-primary">{{ $ot->judul_kegiatan }}</h6>
                                                <span class="badge bg-secondary-subtle text-secondary">{{ \Carbon\Carbon::parse($ot->tanggal)->format('d M') }}</span>
                                            </div>
                                            <p class="small text-muted mb-3">Partisipasi: <strong>{{ $ot->mahasiswas_count }} / {{ $ot->kuota }}</strong> Mahasiswa</p>
                                            <ul class="list-unstyled small mb-0">
                                                @foreach($ot->tasks as $task)
                                                    <li class="mb-1 text-truncate"><i class="bi bi-check2-circle text-success me-2"></i>{{ $task->deskripsi }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <script>
                        function addTask() {
                            const container = document.getElementById('task-container');
                            const div = document.createElement('div');
                            div.className = 'input-group mb-3 shadow-sm rounded-3 overflow-hidden';
                            div.innerHTML = `
                                <span class="input-group-text bg-primary-subtle text-primary border-0"><i class="bi bi-chevron-right"></i></span>
                                <input type="text" name="tasks[]" class="form-control border-0" placeholder="Ketik rincian tugas..." required>
                                <button class="btn btn-danger border-0 px-4" type="button" onclick="this.parentElement.remove()"><i class="bi bi-trash-fill"></i></button>
                            `;
                            container.appendChild(div);
                        }
                    </script>

                @else
                    <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                        <h4 class="fw-bold text-body-emphasis m-0"><i class="bi bi-activity me-2 text-primary"></i>Pekerjaan Lembur Saya</h4>
                    </div>
                    
                    <div class="row g-4 mb-5" data-aos="fade-up">
                        @forelse($myOvertimes as $myOt)
                            <div class="col-md-6 {{ $myOt->pivot->status == 'selesai' ? 'dusty-fade' : '' }}">
                                <div class="card border-0 shadow-sm rounded-4 bg-body border-start border-5 
                                    {{ $myOt->pivot->status == 'selesai' ? 'border-success' : 'border-warning shadow-lg' }}">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="fw-bold m-0">{{ $myOt->judul_kegiatan }}</h5>
                                            <span class="badge {{ $myOt->pivot->status == 'selesai' ? 'bg-success' : 'bg-warning text-dark' }} px-3 rounded-pill">
                                                {{ strtoupper($myOt->pivot->status) }}
                                            </span>
                                        </div>

                                        @if($myOt->pivot->status == 'selesai')
                                            <div class="mt-4 pt-3 border-top border-success-subtle">
                                                <div class="d-flex align-items-center text-success">
                                                    <i class="bi bi-calendar-check-fill fs-4 me-3"></i>
                                                    <div>
                                                        <small class="d-block fw-bold opacity-75">SELESAI PADA:</small>
                                                        <span class="fw-bold">{{ \Carbon\Carbon::parse($myOt->pivot->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y') }}</span>
                                                        <small class="d-block text-muted">Pukul {{ \Carbon\Carbon::parse($myOt->pivot->updated_at)->timezone('Asia/Jakarta')->format('H:i') }} WIB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 bg-body-tertiary p-2 rounded-3 text-center border">
                                                <small class="text-muted"><i class="bi bi-stars text-warning me-1"></i>Laporan diserahkan. Laman akan dibersihkan...</small>
                                            </div>
                                        @else
                                            <p class="text-muted small mt-2">Segera selesaikan seluruh instruksi praktikum.</p>
                                            <a href="{{ route('overtimes.progress', $myOt->id) }}" class="btn btn-primary w-100 rounded-pill fw-bold mt-2 shadow-sm">
                                                Lanjutkan Progress <i class="bi bi-arrow-right ms-2"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="p-5 bg-body-tertiary rounded-4 text-center border border-dashed">
                                    <i class="bi bi-inbox text-secondary display-4 d-block mb-3"></i>
                                    <p class="text-muted m-0">Tidak ada penugasan yang sedang berjalan.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <h5 class="fw-bold mb-4 text-body-emphasis"><i class="bi bi-search me-2 text-primary"></i>Penugasan Tersedia</h5>
                    <div class="row g-3" data-aos="fade-up" data-aos-delay="100">
                        @forelse($availableOvertimes as $ot)
                            <div class="col-12">
                                <div class="card border-0 shadow-sm rounded-4 bg-body d-flex flex-row align-items-center justify-content-between p-4 interactive-card">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-subtle text-primary p-3 rounded-3 me-4 d-none d-md-block">
                                            <i class="bi bi-briefcase fs-3"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold m-0 fs-5">{{ $ot->judul_kegiatan }}</h6>
                                            <small class="text-muted">
                                                <i class="bi bi-person me-1"></i>Instruktur: {{ $ot->dosen->name ?? 'Dosen' }} 
                                                <span class="mx-2">|</span>
                                                <i class="bi bi-people me-1"></i>Sisa Kuota: {{ $ot->kuota - $ot->mahasiswas_count }} dari {{ $ot->kuota }}
                                            </small>
                                        </div>
                                    </div>
                                    <form action="{{ route('overtimes.register', $ot->id) }}" method="POST" class="m-0 ms-3">
                                        @csrf
                                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm hover-shadow">Daftar</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="p-4 bg-body-tertiary rounded-4 text-center border">
                                    <p class="text-muted m-0 small italic">Semua kuota penugasan sudah terpenuhi / tidak ada jadwal lembur.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>