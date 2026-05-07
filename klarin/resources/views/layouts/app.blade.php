<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klarin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            transition: background-color 0.4s ease, color 0.4s ease;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }
        .interactive-card {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(128, 128, 128, 0.2);
        }
        .interactive-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-color: var(--bs-primary);
        }
        /* Tombol Dark Mode */
        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .theme-toggle:hover {
            transform: rotate(30deg) scale(1.1);
        }
        /* Efek Coret untuk Task Selesai */
        .task-checkbox:checked + label {
            text-decoration: line-through;
            color: #6c757d;
            transition: 0.3s;
        }

        /* Efek Fade In-Out Pindah Halaman */
        #page-transition {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: var(--bs-body-bg); /* Mengikuti dark/light mode */
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.4s ease-in-out;
            pointer-events: none;
        }
        .page-loaded #page-transition {
            opacity: 0;
        }
    </style>
</head>
<body class="bg-body-tertiary">

    <div id="page-transition"></div>

    <button class="btn btn-primary theme-toggle d-flex align-items-center justify-content-center" id="btnSwitchTheme">
        <i class="bi bi-moon-stars-fill fs-5" id="themeIcon"></i>
    </button>

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // Dark Mode Logic (Sama seperti guest)
        const htmlElement = document.documentElement;
        const themeBtn = document.getElementById('btnSwitchTheme');
        const themeIcon = document.getElementById('themeIcon');
        
        const currentTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-bs-theme', currentTheme);
        updateIcon(currentTheme);

        themeBtn.addEventListener('click', () => {
            const newTheme = htmlElement.getAttribute('data-bs-theme') === 'light' ? 'dark' : 'light';
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        function updateIcon(theme) {
            if(theme === 'dark') {
                themeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
                themeBtn.classList.replace('btn-primary', 'btn-warning');
            } else {
                themeIcon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
                themeBtn.classList.replace('btn-warning', 'btn-primary');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('page-loaded');
        });

        document.querySelectorAll('a:not([target="_blank"])').forEach(link => {
            link.addEventListener('click', function(e) {
                // Jangan transisi jika href-nya "#"
                if(this.getAttribute('href') === '#' || this.getAttribute('href').startsWith('javascript')) return;
                
                e.preventDefault();
                const destination = this.href;
                
                document.body.classList.remove('page-loaded');
                
                setTimeout(() => {
                    window.location.href = destination;
                }, 400); // Tunggu 400ms (sesuai durasi transisi CSS)
            });
        });
    </script>
</body>
</html>