<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OvertimeController;
use App\Models\Overtime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomResetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if ($user->role === 'dosen') {
        $overtimes = Overtime::with(['tasks', 'mahasiswas'])
            ->withCount('mahasiswas')
            ->where('dosen_id', $user->id)
            ->latest()
            ->get();
            
        return view('dashboard', compact('overtimes'));
    } else {
        $availableOvertimes = Overtime::with(['dosen'])
            ->withCount('mahasiswas')
            ->latest()
            ->get()
            ->filter(function($ot) use($user) {
                return $ot->mahasiswas_count < $ot->kuota && !$ot->mahasiswas->contains('id', $user->id);
            });

        // HANYA tarik data yang 'progress' ATAU 'selesai' kurang dari 1 menit yang lalu
        $myOvertimes = $user->mahasiswas()
            ->where(function ($query) {
                $query->where('overtime_mahasiswa.status', 'progress')
                      ->orWhere(function ($q) {
                          $q->where('overtime_mahasiswa.status', 'selesai')
                            ->where('overtime_mahasiswa.updated_at', '>=', now()->subMinute());
                      });
            })
            ->withPivot(['status', 'updated_at'])
            ->latest()
            ->get();

        return view('dashboard', compact('availableOvertimes', 'myOvertimes'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rute bawaan Breeze untuk Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Klarin (Dosen & Mahasiswa)
    Route::post('/overtimes', [OvertimeController::class, 'store'])->name('overtimes.store'); // Dosen: Buat Lembur
    Route::post('/overtimes/{id}/register', [OvertimeController::class, 'register'])->name('overtimes.register'); // Mhs: Daftar Lembur
    Route::get('/overtimes/{id}/progress', [OvertimeController::class, 'progress'])->name('overtimes.progress'); // Mhs: Buka Halaman Progress
    Route::post('/overtimes/{id}/progress', [OvertimeController::class, 'updateProgress'])->name('overtimes.updateProgress'); // Mhs: Simpan Checklist
    Route::post('/overtimes/{id}/finish', [OvertimeController::class, 'finish'])->name('overtimes.finish'); // Mhs: Konfirmasi Selesai
});

// Rute Lupa Password Custom (NIP/NIM + Captcha)
Route::middleware('guest')->group(function () {
    Route::get('/lupa-password', [CustomResetController::class, 'requestForm'])->name('password.request');
    Route::post('/lupa-password', [CustomResetController::class, 'processRequest'])->name('password.email');
    
    Route::get('/reset-password-baru', [CustomResetController::class, 'resetForm'])->name('password.reset.custom');
    Route::post('/reset-password-baru', [CustomResetController::class, 'updatePassword'])->name('password.store.custom');
});

require __DIR__.'/auth.php';