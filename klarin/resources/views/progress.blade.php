<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container py-5">
        <div class="card shadow border-0 rounded-4 bg-body p-4 p-md-5">
            <form action="{{ route('overtimes.updateProgress', $overtime->id) }}" method="POST">
                @csrf
                <h5 class="fw-bold mb-3">Daftar Instruksi Teknis:</h5>
                <div class="list-group mb-4">
                    @foreach($overtime->tasks as $task)
                        <label class="list-group-item d-flex gap-3 bg-body-tertiary border py-3 interactive-card">
                            <input class="form-check-input flex-shrink-0 fs-4 task-item" type="checkbox" name="tasks[]" value="{{ $task->id }}" {{ (isset($submissions[$task->id]) && $submissions[$task->id]) ? 'checked' : '' }}>
                            <span class="pt-1 fw-medium">{{ $task->deskripsi }}</span>
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Progres Sementara</button>
            </form>

            <hr class="my-5">

            <div class="text-center p-4 bg-success-subtle rounded-4 border border-success">
                <h5 class="fw-bold text-success">Serahkan Laporan Akhir?</h5>
                <p class="text-success-emphasis small">Tombol ini hanya aktif jika semua tugas di atas telah dicentang dan disimpan.</p>
                
                <form action="{{ route('overtimes.finish', $overtime->id) }}" method="POST" id="formFinish">
                    @csrf
                    <button type="button" onclick="validateAndSubmit()" class="btn btn-success btn-lg rounded-pill px-5 fw-bold hover-shadow">
                        <i class="bi bi-send-check me-2"></i>Submit Lembur
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateAndSubmit() {
            const totalTasks = document.querySelectorAll('.task-item').length;
            const checkedTasks = document.querySelectorAll('.task-item:checked').length;

            if (checkedTasks < totalTasks) {
                Swal.fire({
                    title: 'Opss!',
                    text: 'Progress belum selesai. Harap kerjakan seluruh activity yang diminta sebelum submit.',
                    icon: 'warning',
                    confirmButtonColor: '#0d6efd',
                    confirmButtonText: 'Siap, saya kerjakan dulu!'
                });
            } else {
                Swal.fire({
                    title: 'Konfirmasi Selesai',
                    text: "Apakah Anda yakin semua tugas sudah benar? Laporan tidak bisa diubah setelah dikirim.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Submit Sekarang!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('formFinish').submit();
                    }
                });
            }
        }

        // Tampilkan error dari session controller jika ada bypass
        @if(session('error_sweet'))
            Swal.fire('Belum Lengkap', "{{ session('error_sweet') }}", 'error');
        @endif
    </script>
</x-app-layout>