@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5 text-center">
    <div class="container mt-4">
        <h1 class="display-4 font-weight-bold">Layanan Kami</h1>
        <p class="lead">Solusi keamanan menyeluruh untuk berbagai kebutuhan Anda.</p>
    </div>
</div>

<div class="container py-5 my-4">
    <div class="row">
        <!-- Item Layanan 1 -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-start p-4 bg-light rounded shadow-sm h-100">
                <i class="fas fa-video fa-3x text-primary mr-4 mt-2"></i>
                <div>
                    <h4 class="font-weight-bold">Monitoring Control Room</h4>
                    <p class="text-secondary">Pusat kendali 24 jam dengan tim ahli yang memantau setiap sudut area Anda melalui CCTV terintegrasi AI, siap mendeteksi anomali sekecil apapun.</p>
                </div>
            </div>
        </div>
        <!-- Item Layanan 2 -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-start p-4 bg-light rounded shadow-sm h-100">
                <i class="fas fa-user-shield fa-3x text-primary mr-4 mt-2"></i>
                <div>
                    <h4 class="font-weight-bold">Security Guard & Patrol</h4>
                    <p class="text-secondary">Penempatan personel keamanan terlatih secara fisik dan mental untuk menjaga area perumahan, perkantoran, dan fasilitas umum.</p>
                </div>
            </div>
        </div>
        <!-- Item Layanan 3 -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-start p-4 bg-light rounded shadow-sm h-100">
                <i class="fas fa-user-secret fa-3x text-primary mr-4 mt-2"></i>
                <div>
                    <h4 class="font-weight-bold">VIP Escort / Pengawalan</h4>
                    <p class="text-secondary">Layanan pengawalan khusus (VVIP) untuk memastikan keselamatan klien dari titik awal hingga tujuan akhir dengan protokol ketat.</p>
                </div>
            </div>
        </div>
        <!-- Item Layanan 4 -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-start p-4 bg-light rounded shadow-sm h-100">
                <i class="fas fa-building fa-3x text-primary mr-4 mt-2"></i>
                <div>
                    <h4 class="font-weight-bold">Manajemen Keamanan Gedung</h4>
                    <p class="text-secondary">Konsultasi dan implementasi standar operasional prosedur (SOP) keamanan untuk skala gedung bertingkat dan pusat perbelanjaan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection