<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overtime;
use App\Models\Task;
use App\Models\TaskSubmission;
use Illuminate\Support\Facades\Auth;

class OvertimeController extends Controller
{
    // DOSEN: Simpan Jadwal & Kuota
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'tanggal' => 'required|date',
            'kuota' => 'required|integer|min:1', // Validasi Kuota
            'tasks' => 'required|array|min:1'
        ]);

        $overtime = Overtime::create([
            'dosen_id' => Auth::id(),
            'judul_kegiatan' => $request->judul,
            'tanggal' => $request->tanggal,
            'kuota' => $request->kuota,
        ]);

        foreach ($request->tasks as $taskDesc) {
            Task::create([
                'overtime_id' => $overtime->id,
                'deskripsi' => $taskDesc,
            ]);
        }

        return back()->with('success', 'Jadwal lembur berhasil dirilis dengan kuota ' . $request->kuota . ' orang!');
    }

    // MAHASISWA: Mendaftar Lembur
    public function register($id)
    {
        $overtime = Overtime::withCount('mahasiswas')->findOrFail($id);
        
        if ($overtime->mahasiswas_count >= $overtime->kuota) {
            return back()->with('error', 'Kuota lembur sudah penuh!');
        }

        // Daftarkan mahasiswa ke tabel pivot
        $overtime->mahasiswas()->attach(Auth::id(), ['status' => 'progress']);

        return back()->with('success', 'Berhasil mendaftar! Silakan buka halaman Progress.');
    }

    // MAHASISWA: Tampilan Halaman Progress (Centang Tugas)
    public function progress($id)
    {
        $overtime = Overtime::with('tasks', 'dosen')->findOrFail($id);
        
        // Ambil status checklist mahasiswa ini
        $submissions = TaskSubmission::where('mahasiswa_id', Auth::id())->pluck('is_completed', 'task_id')->toArray();

        return view('progress', compact('overtime', 'submissions'));
    }

    // MAHASISWA: Simpan Progress Checklist
    public function updateProgress(Request $request, $id)
    {
        $tasksCompleted = $request->input('tasks', []); // Array ID task yang dicentang

        $overtime = Overtime::with('tasks')->findOrFail($id);

        foreach ($overtime->tasks as $task) {
            $isDone = in_array($task->id, $tasksCompleted);
            
            TaskSubmission::updateOrCreate(
                ['task_id' => $task->id, 'mahasiswa_id' => Auth::id()],
                ['is_completed' => $isDone]
            );
        }

        return back()->with('success', 'Progress pekerjaan berhasil disimpan!');
    }

    // MAHASISWA: Konfirmasi Selesai 100%
    public function finish($id)
    {
        $overtime = Overtime::with('tasks')->findOrFail($id);
        $mahasiswaId = auth()->id();

        // 1. Hitung total tugas yang ada di lembur ini
        $totalTasks = $overtime->tasks->count();

        // 2. Hitung berapa tugas yang sudah dicentang (is_completed = true) oleh mahasiswa ini
        $completedTasksCount = \App\Models\TaskSubmission::whereIn('task_id', $overtime->tasks->pluck('id'))
            ->where('mahasiswa_id', $mahasiswaId)
            ->where('is_completed', true)
            ->count();

        // 3. Validasi: Jika jumlah centang belum sama dengan total tugas
        if ($completedTasksCount < $totalTasks) {
            return back()->with('error_sweet', 'Progress Anda belum selesai! Pastikan semua instruksi telah dikerjakan dan disimpan.');
        }

        // 4. Jika valid, update status menjadi selesai
        $overtime->mahasiswas()->updateExistingPivot($mahasiswaId, [
            'status' => 'selesai',
            'updated_at' => now() // Mencatat waktu selesai
        ]);

        return redirect()->route('dashboard')->with('success_finish', 'Laporan lembur berhasil diserahkan.');
    }
}