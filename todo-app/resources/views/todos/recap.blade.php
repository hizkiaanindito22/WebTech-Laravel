@extends('layout')

@section('content')
    <div class="row">
        <!-- Panel Samping: Statistik Cepat -->
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white text-center p-4 mb-3 shadow">
                <h1 class="display-4 fw-bold">{{ $progress['persentase'] }}%</h1>
                <p class="mb-0">Tingkat Penyelesaian</p>
            </div>
            <div class="card text-center p-3 mb-3 shadow-sm border-success border-2">
                <h3 class="text-success fw-bold">{{ $progress['selesai'] }}</h3>
                <small class="text-muted">Tugas Selesai</small>
            </div>
            <div class="card text-center p-3 shadow-sm border-warning border-2">
                <h3 class="text-warning fw-bold">{{ $progress['total'] - $progress['selesai'] }}</h3>
                <small class="text-muted">Tugas Tertunda</small>
            </div>
        </div>

        <!-- Panel Kalender -->
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="fw-bold mb-4">📅 Kalender Jadwal ToDo</h4>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Inisialisasi FullCalendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: [
                    @foreach($todos as $todo)
                    {
                        title: '{{ $todo["judul"] }}',
                        // FIX: Gunakan ?? untuk memberikan default tanggal hari ini jika kosong
                        start: '{{ $todo["tanggal_target"] ?? date("Y-m-d") }}',
                        color: '{{ $todo["selesai"] ? "#198754" : "#fd7e14" }}',
                        allDay: true
                    },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
@endsection