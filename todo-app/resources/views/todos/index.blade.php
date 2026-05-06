@extends('layout')

@section('content')
    <!-- Progress Bar Milestone -->
    <div class="card mb-4 bg-white">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Rekap Milestone: {{ $progress['selesai'] }} dari {{ $progress['total'] }} Selesai</h5>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $progress['persentase'] == 100 ? 'success' : 'primary' }}" 
                     role="progressbar" 
                     style="width: {{ $progress['persentase'] }}%;">
                    {{ $progress['persentase'] }}% {{ $progress['persentase'] == 100 ? ' - Sempurna!' : '' }}
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-dark">Daftar ToDo</h3>
        <a href="{{ route('todos.create') }}" class="btn btn-primary rounded-pill shadow-sm px-4">
            + Tambah ToDo
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Judul</th>
                            <th>Jadwal / Target</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($todos as $todo)
                            <tr>
                                <td class="ps-4">
                                    <strong class="{{ $todo['selesai'] ? 'text-decoration-line-through text-muted' : '' }}">
                                        {{ $todo['judul'] }}
                                    </strong><br>
                                    <small class="text-muted">{{ $todo['keterangan'] }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ $todo['tanggal_target'] ?? '-' }}</span>
                                </td>
                                <td>
                                    @if($todo['selesai'])
                                        <span class="badge bg-success rounded-pill px-3">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark rounded-pill px-3">Pending</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    
                                    <!-- Tombol Toggle Selesai -->
                                    <form action="{{ route('todos.toggle', $todo['id']) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $todo['selesai'] ? 'btn-outline-secondary' : 'btn-success shadow-sm' }} rounded-circle" title="Tandai Selesai">
                                            {!! $todo['selesai'] ? 'Batal' : 'Selesai' !!}
                                        </button>
                                    </form>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('todos.edit', $todo['id']) }}" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('todos.destroy', $todo['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus tugas ini?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada tugas, ayo buat satu!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection