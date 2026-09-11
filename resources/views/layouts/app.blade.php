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

    <style>
        .swal-compact-popup {
            width: 320px !important;
            padding: 1.5rem 1.4rem 1.4rem !important;
            border-radius: 12px !important;
        }

        .swal-compact-icon {
            width: 3rem !important;
            height: 3rem !important;
            margin: 0 auto 0.75rem !important;
        }

        .swal-compact-title {
            font-size: 1rem !important;
            font-weight: 700 !important;
            color: #0f172a !important;
            padding: 0 !important;
            margin-bottom: 0.3rem !important;
        }

        .swal-compact-text {
            font-size: 0.82rem !important;
            color: #64748b !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .swal-compact-actions {
            margin-top: 1.1rem !important;
            gap: 0.5rem !important;
        }

        .swal-compact-confirm,
        .swal-compact-cancel {
            font-size: 0.82rem !important;
            font-weight: 600 !important;
            padding: 0.5rem 1.1rem !important;
            border-radius: 8px !important;
            box-shadow: none !important;
        }

        /* Perubahan warna teks tombol Batal agar lebih jelas */
        .swal-compact-cancel {
            color: #475569 !important;
            border: 1px solid #cbd5e1 !important;
            /* Memberikan border tipis agar tombol tegas */
        }

        .swal-compact-cancel:hover {
            background-color: #cbd5e1 !important;
            color: #1e293b !important;
        }
    </style>

    <script>
        document.querySelectorAll('form[data-confirm]').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Membaca warna kustom dari atribut data-confirm-color, jika tidak ada default ke ungu (#4f46e5)
                const confirmColor = form.dataset.confirmColor || '#4f46e5';

                Swal.fire({
                    title: form.dataset.confirm,
                    text: form.dataset.confirmText ||
                        'Data yang sudah diproses tidak bisa dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: confirmColor,
                    cancelButtonColor: '#e2e8f0', // Diubah ke abu-abu yang lebih solid kontrasnya
                    confirmButtonText: form.dataset.confirmButton || 'Ya, lanjutkan',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    buttonsStyling: true,
                    customClass: {
                        popup: 'swal-compact-popup',
                        icon: 'swal-compact-icon',
                        title: 'swal-compact-title',
                        htmlContainer: 'swal-compact-text',
                        actions: 'swal-compact-actions',
                        confirmButton: 'swal-compact-confirm',
                        cancelButton: 'swal-compact-cancel'
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    @stack('scripts')

</body>

</html>
