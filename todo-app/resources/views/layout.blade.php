<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FullCalendar CSS/JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .progress { height: 25px; border-radius: 15px; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('todos.index') }}">✨ ToDo Ku</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link {{ request()->routeIs('todos.index') ? 'active' : '' }}" href="{{ route('todos.index') }}">Daftar Tugas</a>
                <a class="nav-link {{ request()->routeIs('todos.recap') ? 'active' : '' }}" href="{{ route('todos.recap') }}">📅 Kalender Rekap</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <!-- Script Notifikasi SweetAlert -->
    @if(session('yay_success'))
        <script>
            Swal.fire({
                title: 'Yay sudah selesai! 🎉',
                text: 'Kerja bagus! Terus pertahankan produktivitasmu.',
                icon: 'success',
                confirmButtonColor: '#198754',
                backdrop: `rgba(25, 135, 84, 0.2)` // Background agak hijau
            });
        </script>
    @endif

    @if(session('success') && !session('yay_success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
        </script>
    @endif
</body>
</html>