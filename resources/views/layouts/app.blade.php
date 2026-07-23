<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Hapus Vite (jika tidak digunakan) --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <title>Portova</title>

    <style>
        /* ===== RESET & SMOOTH SCROLL ===== */
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background: #0B1112;
            font-family: 'Space Grotesk', sans-serif;
            color: #E5E7EB;
            -webkit-font-smoothing: antialiased;
        }

        /* ===== KUSTOMISASI WARNA ===== */
        .text-accent {
            color: #00F0FF;
        }
        .bg-accent {
            background-color: #00F0FF;
        }
        .border-accent {
            border-color: #00F0FF;
        }
        .hover\:bg-accent:hover {
            background-color: #00E0EE;
        }
        .hover\:text-accent:hover {
            color: #00F0FF;
        }

        /* Scrollbar kustom (opsional) */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #111111;
        }
        ::-webkit-scrollbar-thumb {
            background: #00F0FF;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00E0EE;
        }
    </style>
</head>

<body>

    {{-- ===== NAVBAR ===== --}}
    @include('partials.navbar')

    {{-- ===== MAIN CONTENT ===== --}}
    <main style="background:#0B1112; min-height:100vh;">
        @yield('content')
    </main>

    {{-- ===== FOOTER (dengan ID) ===== --}}
    @include('partials.footer')

</body>
</html>