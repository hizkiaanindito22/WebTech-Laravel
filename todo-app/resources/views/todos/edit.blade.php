@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit ToDo</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.update', $todo['id']) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Method spoofing untuk update -->
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul ToDo</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $todo['judul'] }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $todo['keterangan'] }}</textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="selesai" name="selesai" value="1" {{ $todo['selesai'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="selesai">Tandai sudah selesai</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update ToDo</button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Target / Jadwal</label>
                            <input type="date" class="form-control" name="tanggal_target" value="{{ $todo['tanggal_target'] }}" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection