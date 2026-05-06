<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            
            // --- FIX ERROR: Auto-Reset jika mendeteksi format data lama ---
            $todos = session('todos', []);
            if (!empty($todos)) {
                $sample = array_values($todos)[0]; // Ambil data pertama
                if (!array_key_exists('tanggal_target', $sample)) {
                    session()->forget('todos'); // Hapus data lama yang error
                }
            }
            // --------------------------------------------------------------

            // Load data dummy baru dengan format yang benar
            if (!session()->has('todos')) {
                session(['todos' => [
                    [
                        'id' => 1,
                        'judul' => 'Mengerjakan latihan 1',
                        'keterangan' => 'Menyelesaikan modul HTML dan CSS',
                        'selesai' => true,
                        'tanggal_target' => date('Y-m-d'),
                        'tanggal_penyelesaian' => date('Y-m-d')
                    ],
                    [
                        'id' => 2,
                        'judul' => 'Membuat laporan',
                        'keterangan' => 'Menyusun laporan praktikum',
                        'selesai' => false,
                        'tanggal_target' => date('Y-m-d', strtotime('+1 day')),
                        'tanggal_penyelesaian' => null
                    ]
                ]]);
            }
            return $next($request);
        });
    }

    // Fungsi bantuan untuk menghitung progress
    private function getProgress()
    {
        $todos = session('todos', []);
        $total = count($todos);
        $selesai = count(array_filter($todos, fn($t) => $t['selesai']));
        $persentase = $total > 0 ? round(($selesai / $total) * 100) : 0;
        
        return compact('total', 'selesai', 'persentase');
    }

    public function index()
    {
        $todos = session('todos', []);
        $progress = $this->getProgress();
        return view('todos.index', compact('todos', 'progress'));
    }

    public function recap()
    {
        $todos = session('todos', []);
        $progress = $this->getProgress();
        return view('todos.recap', compact('todos', 'progress'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $todos = session('todos', []);
        $newId = count($todos) > 0 ? max(array_column($todos, 'id')) + 1 : 1;
        $isSelesai = $request->has('selesai');

        $todos[] = [
            'id' => $newId,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'selesai' => $isSelesai,
            'tanggal_target' => $request->tanggal_target,
            'tanggal_penyelesaian' => $isSelesai ? date('Y-m-d') : null
        ];

        session(['todos' => $todos]);
        return redirect()->route('todos.index')->with('success', 'ToDo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $todos = session('todos', []);
        $todo = collect($todos)->firstWhere('id', (int)$id);
        if (!$todo) return redirect()->route('todos.index');

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $todos = session('todos', []);
        $isSelesai = $request->has('selesai');

        foreach ($todos as $key => $todo) {
            if ($todo['id'] == $id) {
                $todos[$key]['judul'] = $request->judul;
                $todos[$key]['keterangan'] = $request->keterangan;
                $todos[$key]['tanggal_target'] = $request->tanggal_target;
                $todos[$key]['selesai'] = $isSelesai;
                $todos[$key]['tanggal_penyelesaian'] = $isSelesai ? ($todo['tanggal_penyelesaian'] ?: date('Y-m-d')) : null;
                break;
            }
        }

        session(['todos' => $todos]);
        return redirect()->route('todos.index')->with('success', 'ToDo berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $todos = session('todos', []);
        $todos = array_filter($todos, fn($todo) => $todo['id'] != $id);
        session(['todos' => array_values($todos)]);
        return redirect()->route('todos.index')->with('success', 'ToDo dihapus!');
    }

    public function toggleComplete($id)
    {
        $todos = session('todos', []);
        $isSelesaiSekarang = false;

        foreach ($todos as $key => $todo) {
            if ($todo['id'] == $id) {
                $statusBaru = !$todo['selesai'];
                $todos[$key]['selesai'] = $statusBaru;
                $todos[$key]['tanggal_penyelesaian'] = $statusBaru ? date('Y-m-d') : null;
                $isSelesaiSekarang = $statusBaru;
                break;
            }
        }

        session(['todos' => $todos]);

        // Jika statusnya menjadi SELESAI, kirim flash session khusus untuk SweetAlert
        if ($isSelesaiSekarang) {
            return redirect()->route('todos.index')->with('yay_success', 'Tugas diselesaikan!');
        }

        return redirect()->route('todos.index')->with('success', 'Status ToDo diubah!');
    }
}