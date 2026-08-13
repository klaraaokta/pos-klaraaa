<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- memanggil link bootstrap -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        .alert-success {
            background-color: #eef2ff;
            color: #4338ca;
            border: 1px solid #c7d2fe;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.85rem 1.25rem;
            margin: 1rem auto 0;
            max-width: 480px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Isi content yang kita kirimkan dari views lain-->
        @yield('content')
    </div>

    <script>
        // Auto-hilang setelah 4 detik
        const successAlert = document.getElementById('successAlert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.transition = 'opacity 0.4s ease';
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 400);
            }, 4000);
        }
    </script>

</body>

</html>
