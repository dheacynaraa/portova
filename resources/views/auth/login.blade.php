<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Portova</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .card {
            background-color: #0F172A;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.5);
        }

        .input {
            background-color: #1E2937;
            transition: all 0.3s ease;
            color: #94A3B8;
        }

        .input:focus {
            background-color: #F1F5F9;
            color: #0F172A;
            border-color: #22D3EE;
        }

        .input::placeholder {
            color: #64748B;
            opacity: 1;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #64748B;
            font-size: 1rem;
            pointer-events: none;
        }

        .input-icon-left {
            left: 1.25rem;
        }

        .input-icon-right {
            right: 1.25rem;
        }
    </style>
</head>
<body class="min-h-screen bg-[#0A0F1C] flex flex-col relative">

    <!-- Background Glow -->
    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-transparent to-transparent pointer-events-none"></div>

    <div class="flex-1 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-white tracking-tight">Portova</h1>
            </div>

            <!-- Card -->
            <div class="card rounded-3xl p-8 md:p-10 border border-slate-700/30">

                <!-- Icon -->
                <div class="flex justify-center mb-6">
                    <div class="w-12 h-12 bg-cyan-500/10 rounded-2xl flex items-center justify-center">
                        <i class="fa-solid fa-bolt text-4xl text-cyan-400"></i>
                    </div>
                </div>

                <!-- Title -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-white">Selamat Datang Kembali</h2>
                    <p class="text-slate-400 text-sm mt-2">
                        Masuk untuk melihat karya proyek terbaik
                    </p>
                </div>

                <!-- Flash Message Success -->
                @if(session('success'))
                    <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if($errors->any())
                    <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label class="block text-xs font-medium text-cyan-400 mb-2 tracking-wider">EMAIL</label>
                        <div class="relative">
                            <i class="fa-solid fa-envelope input-icon input-icon-left"></i>
                            <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            placeholder="nama@email.com"
                            required
                            class="input w-full pl-12 pr-5 py-4 rounded-2xl border border-slate-600 focus:outline-none"/>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label class="block text-xs font-medium text-cyan-400 tracking-wider">PASSWORD</label>
                            <a href="#" class="text-slate-400 hover:text-slate-300 text-xs font-medium transition-colors">Lupa Password?</a>
                        </div>
                        <div class="relative">
                            <i class="fa-solid fa-lock input-icon input-icon-left"></i>
                            <input
                            type="password"
                            id="password"
                            name="password"
                            autocomplete="current-password"
                            placeholder="•••••••••••"
                            required
                            class="input w-full pl-12 pr-12 py-4 rounded-2xl border border-slate-600 focus:outline-none"
                            />
                            <button type="button" id="togglePassword"
                            class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-300 transition-colors">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Button -->
                <button type="submit"
                class="w-full bg-cyan-500 hover:bg-cyan-400 active:scale-[0.97] transition-all text-slate-950 font-semibold py-4 rounded-2xl text-lg flex items-center justify-center gap-2 shadow-lg shadow-cyan-500/30">
                Masuk
                <i class="bi bi-box-arrow-in-right text-xl"></i>
            </button>
        </form>

        <!-- Register -->
        <div class="text-center mt-8">
            <p class="text-slate-400 text-sm">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="bg-[#0A0F1C] border-t border-slate-700/60 py-5 px-6 md:px-12">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="flex flex-col items-center sm:items-start">
            <span class="text-cyan-400 font-semibold text-base tracking-tight">Portova</span>
            <span class="text-slate-400 text-xs sm:text-sm">
                © 2026 Portova Student Ecosystem. Built for Innovation.
            </span>
        </div>
        <div class="flex items-center gap-6 text-slate-400 text-sm">
            <a href="#" class="hover:text-slate-200 transition-colors">Terms</a>
            <a href="#" class="hover:text-slate-200 transition-colors">Privacy</a>
            <a href="#" class="hover:text-slate-200 transition-colors">Support</a>
        </div>
    </div>
</footer>

<script>
    tailwind.config = { content: [], theme: { extend: {} } };

    // Toggle Password
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    toggleBtn.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
</script>
</body>
</html>