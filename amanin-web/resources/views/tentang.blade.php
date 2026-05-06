@extends('layouts.app')

@section('content')
<div class="container py-5 my-4">
    
    <!-- HEADER & VIDEO COMPRO -->
    <div class="row align-items-center mb-5 pb-4 border-bottom">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="font-weight-bold text-primary mb-3">Sejarah AMANIN</h1>
            <p class="lead text-secondary" style="line-height: 1.8;">
                Berawal dari komitmen kecil, kini menjadi tameng perlindungan terpercaya di Indonesia. Tonton sekilas perjalanan dan dedikasi kami di lapangan.
            </p>
        </div>
        <div class="col-lg-6">
            <div class="position-relative rounded-lg shadow-lg overflow-hidden border border-light">
                <!-- Video ComPro dimuat di sini -->
                <video class="w-100 d-block" autoplay muted loop playsinline style="object-fit: cover; border-radius: 8px;">
                    <source src="{{ asset('vid/ComPro.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
    </div>

    <div class="row justify-content-center text-center mb-5 mt-5">
        <div class="col-lg-8">
            <h3 class="font-weight-bold text-dark">Jejak Langkah Kami</h3>
        </div>
    </div>

    <!-- TIMELINE CONTAINER -->
    <div class="row justify-content-center" id="timeline-wrapper">
        <div class="col-md-10">
            <div class="border-left border-primary pl-4 ml-3" style="border-width: 3px !important;">
                
                <!-- Item Timeline 1 -->
                <div class="mb-5 position-relative timeline-box">
                    <i class="fas fa-circle text-primary position-absolute bg-white" style="left: -32px; top: 5px; font-size: 20px; border-radius: 50%;"></i>
                    <h4 class="font-weight-bold">2010 - Pendirian Awal</h4>
                    <p class="text-secondary">AMANIN didirikan dengan visi menciptakan lingkungan perumahan yang aman dan kondusif.</p>
                </div>
                
                <!-- Item Timeline 2 -->
                <div class="mb-5 position-relative timeline-box">
                    <i class="fas fa-circle text-primary position-absolute bg-white" style="left: -32px; top: 5px; font-size: 20px; border-radius: 50%;"></i>
                    <h4 class="font-weight-bold">2014 - Pengakuan Nasional</h4>
                    <p class="text-secondary">Diakui dan disertifikasi oleh otoritas keamanan terkait dengan standar operasional tinggi.</p>
                </div>
                
                <!-- Item Timeline 3 -->
                <div class="mb-5 position-relative timeline-box">
                    <i class="fas fa-circle text-primary position-absolute bg-white" style="left: -32px; top: 5px; font-size: 20px; border-radius: 50%;"></i>
                    <h4 class="font-weight-bold">2020 - Pembangunan Markas Baru</h4>
                    <p class="text-secondary">Mendirikan pusat kendali teknologi dan menara keamanan barat untuk respons cepat.</p>
                </div>
                
                <!-- Item Timeline 4 -->
                <div class="position-relative timeline-box">
                    <i class="fas fa-circle text-primary position-absolute bg-white" style="left: -32px; top: 5px; font-size: 20px; border-radius: 50%;"></i>
                    <h4 class="font-weight-bold">2026 - Ekspansi AI Terpadu</h4>
                    <p class="text-secondary">Memperbarui seluruh armada dan sistem dengan integrasi kecerdasan buatan secara penuh.</p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

<!-- SCRIPT HARUS DIBUNGKUS DENGAN @push('scripts') -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const timelineItems = document.querySelectorAll('.timeline-box');
        
        // Buat observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    timelineItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('show-timeline');
                        }, index * 300); // Muncul bertahap tiap 300ms
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 }); // Threshold 0.1 berarti saat 10% elemen terlihat, animasi jalan

        const wrapper = document.getElementById('timeline-wrapper');
        if (wrapper) {
            observer.observe(wrapper);
        } else {
            // Fallback jika observer gagal membaca layout
            timelineItems.forEach((item, index) => {
                setTimeout(() => item.classList.add('show-timeline'), index * 300);
            });
        }
    });
</script>
@endpush