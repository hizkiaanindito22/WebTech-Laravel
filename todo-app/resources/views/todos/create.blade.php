@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Buat ToDo Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul ToDo</label>
                            <input type="text" class="form-control" id="judul" name="judul" required placeholder="Contoh: Mengerjakan latihan">
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Detail tugas..."></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="selesai" name="selesai" value="1">
                            <label class="form-check-label" for="selesai">Tandai sudah selesai</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan ToDo</button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Target / Jadwal</label>
                            <input type="date" class="form-control" name="tanggal_target" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection