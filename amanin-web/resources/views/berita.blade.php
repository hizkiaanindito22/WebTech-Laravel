@extends('layouts.app')

@section('content')
    <section class="py-5" style="min-height: 70vh;">
        <div class="container-md mt-5">
            <h1 class="font-weight-bold text-primary mb-4"><i class="fas fa-newspaper"></i> Berita Terbaru AMANIN</h1>
            
            <div class="row">
                <!-- Contoh Card Berita Statis 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Tim AMANIN Berhasil Mengamankan Event ATMICUP 2025</h5>
                            <p class="card-text text-muted small"><i class="far fa-calendar-alt"></i> 15 Mei 2026</p>
                            <p class="card-text">Pengamanan ketat dilakukan selama event berlangsung tanpa adanya insiden...</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Contoh Card Berita Statis 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Implementasi AI CCTV Baru di 40 Mall Nasional</h5>
                            <p class="card-text text-muted small"><i class="far fa-calendar-alt"></i> 02 April 2026</p>
                            <p class="card-text">AMANIN memperbarui sistem keamanan di berbagai mall untuk respon yang lebih cepat...</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ url('/') }}" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </section>
@endsection