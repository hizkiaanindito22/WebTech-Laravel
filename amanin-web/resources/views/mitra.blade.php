@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5 text-center">
    <div class="container mt-4">
        <h1 class="display-4 font-weight-bold">Mitra & Klien Kami</h1>
        <p class="lead">Perusahaan dan fasilitas publik yang mempercayakan keamanannya kepada AMANIN.</p>
    </div>
</div>

<div class="container py-5 my-4">
    <div class="row">
        
        <!-- CARD LOKASI 1: MALL -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden h-100 card-hover-shadow">
                <!-- Ganti dengan foto mall asli Anda -->
                <img src="{{ asset('img/mall12.png') }}" class="card-img-top" alt="Pusat Perbelanjaan" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center bg-white">
                    <i class="fas fa-shopping-bag fa-2x text-primary mb-2"></i>
                    <h5 class="font-weight-bold text-dark mb-1">Solo Grand Mall</h5>
                    <p class="text-secondary small mb-0">Pusat Perbelanjaan</p>
                </div>
            </div>
        </div>

        <!-- CARD LOKASI 2: PERKANTORAN -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden h-100 card-hover-shadow">
                <!-- Ganti dengan foto office asli Anda -->
                <img src="{{ asset('img/kantor1.png') }}" class="card-img-top" alt="Gedung Perkantoran" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center bg-white">
                    <i class="fas fa-building fa-2x text-primary mb-2"></i>
                    <h5 class="font-weight-bold text-dark mb-1">Tower Mandi Ra Bank</h5>
                    <p class="text-secondary small mb-0">Kawasan Perkantoran Terpadu</p>
                </div>
            </div>
        </div>

        <!-- CARD LOKASI 3: PERUMAHAN -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden h-100 card-hover-shadow">
                <img src="{{ asset('img/perumahan20.png') }}" class="card-img-top" alt="Perumahan Elit" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center bg-white">
                    <i class="fas fa-home fa-2x text-primary mb-2"></i>
                    <h5 class="font-weight-bold text-dark mb-1">Grand Estate</h5>
                    <p class="text-secondary small mb-0">Perumahan Eksklusif</p>
                </div>
            </div>
        </div>

        <!-- CARD LOKASI 4: TAMAN/PUBLIK -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden h-100 card-hover-shadow">
                <img src="{{ asset('img/hutan1.png') }}" class="card-img-top" alt="Taman Kota" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center bg-white">
                    <i class="fas fa-tree fa-2x text-primary mb-2"></i>
                    <h5 class="font-weight-bold text-dark mb-1">Taman Balekambang</h5>
                    <p class="text-secondary small mb-0">Fasilitas Rekreasi Publik</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection