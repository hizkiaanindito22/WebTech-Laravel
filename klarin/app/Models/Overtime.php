<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'dosen_id', 
        'judul_kegiatan', 
        'tanggal', 
        'kuota'
    ];

    /**
     * Relasi ke model Task (1 Lembur memiliki banyak Tugas/Instruksi)
     */
    public function tasks() 
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Relasi ke model User sebagai Dosen pembuat (1 Lembur dibuat oleh 1 Dosen)
     */
    public function dosen() 
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    /**
     * Relasi ke model User sebagai Mahasiswa pendaftar (Many-to-Many via tabel pivot overtime_mahasiswa)
     */
    public function mahasiswas() 
    {
        return $this->belongsToMany(User::class, 'overtime_mahasiswa', 'overtime_id', 'mahasiswa_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}