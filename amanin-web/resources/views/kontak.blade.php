@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
    <div class="container my-4">
        <div class="row align-items-stretch bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
            
            <!-- Kolom Info Kiri -->
            <div class="col-lg-5 p-5 text-white d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, #007bff, #2a4db3);">
                <h2 class="h2 font-weight-bold mb-4">Hubungi AMANIN</h2>
                <p class="mb-5" style="opacity: 0.9; line-height: 1.8;">
                    Konsultasikan kebutuhan keamanan Anda hari ini. Tim spesialis kami siap memberikan asesmen keamanan untuk aset Anda.
                </p>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="fas fa-map-marker-alt fa-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h6 class="mb-0 font-weight-bold">Kantor Pusat</h6>
                        <small style="opacity: 0.8;">Menara Keamanan Barat - Jl. Sakti, Surakarta</small>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="fas fa-envelope fa-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h6 class="mb-0 font-weight-bold">Email</h6>
                        <small style="opacity: 0.8;">halo@amanin.co.id</small>
                    </div>
                </div>
            </div>

            <!-- Kolom Form Kanan -->
            <div class="col-lg-7 p-4 p-md-5">
                <h3 class="h4 font-weight-bold mb-4 text-dark">Kirim Pesan</h3>
                <form action="#" method="GET"> 
                    <div class="row">
                        <div class="col-md-6 mb-4"> 
                            <label class="font-weight-bold text-secondary small mb-2">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control bg-light border-0 py-4 px-3" placeholder="Nama Anda" required> 
                        </div>
                        <div class="col-md-6 mb-4"> 
                            <label class="font-weight-bold text-secondary small mb-2">Alamat Email</label>
                            <input type="email" name="alamatEmail" class="form-control bg-light border-0 py-4 px-3" placeholder="email@domain.com" required> 
                        </div>
                    </div>
                    <div class="form-group mb-4"> 
                        <label class="font-weight-bold text-secondary small mb-2">Detail Pesan / Kebutuhan</label>
                        <textarea name="detailPesan" class="form-control bg-light border-0 p-3" placeholder="Jelaskan kebutuhan perlindungan Anda..." rows="5" required></textarea> 
                    </div>
                    
                    <button type="button" onclick="alert('Formulir berhasil diisi! (Ini adalah mode statis Laravel)')" class="btn btn-primary btn-block py-3 font-weight-bold rounded shadow-sm">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection