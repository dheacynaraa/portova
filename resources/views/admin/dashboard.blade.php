<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Portova Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        * { font-family: 'Inter', -apple-system, sans-serif; }
        body { background-color: #0A0A0A; color: #E5E7EB; }
        .sidebar { background-color: #111111; border-right: 1px solid #1F1F1F; }
        .card-stats { background-color: #141414; border: 1px solid #1F1F1F; transition: all 0.2s ease; }
        .card-stats:hover { transform: translateY(-2px); border-color: rgba(0,240,255,0.35); }
        .nav-link { transition: all .15s ease; }
        .table-card { background-color: #141414; border: 1px solid #1F1F1F; }
        .table-card thead { background-color: #1A1A1A; }
        .table-card tbody tr { border-bottom: 1px solid #1F1F1F; }
        .table-card tbody tr:hover { background-color: #1A1A1A; }
        .pagination .page-item.active .page-link {
            background-color: #00F0FF;
            color: #000;
            border-color: #00F0FF;
        }
        .pagination .page-link {
            background: transparent;
            border: 1px solid #2A2A2A;
            color: #9CA3AF;
            border-radius: 8px;
            margin: 0 2px;
        }
        .pagination .page-link:hover {
            background: #1F1F1F;
            color: #F3F4F6;
        }
    </style>
</head>
<body>
<div class="flex h-screen overflow-hidden">
    <aside class="sidebar w-64 flex-shrink-0 px-6 py-7 flex flex-col h-full">
        <div class="mb-10 px-2">
            <h1 class="text-2xl font-extrabold text-[#00F0FF] tracking-tight">Portova Admin</h1>
            <p class="text-[10px] text-gray-500 tracking-[0.2em] uppercase mt-1 font-semibold">Konsol Manajemen</p>
        </div>
        <nav class="flex-1 space-y-1.5">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold
                      {{ request()->routeIs('admin.dashboard') ? 'bg-[#00F0FF]/10 text-[#00F0FF]' : 'text-gray-400 hover:bg-gray-800/40 hover:text-gray-200' }}">
                <i class="bi bi-columns-gap"></i> Dashboard
            </a>
            <a href="{{ route('admin.antrean') }}"
               class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-semibold
                      {{ request()->routeIs('admin.antrean') ? 'bg-[#00F0FF]/10 text-[#00F0FF]' : 'text-gray-400 hover:bg-gray-800/40 hover:text-gray-200' }}">
                <i class="bi bi-clipboard2-fill"></i> Antrean Review
            </a>
        </nav>
        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-[#00F0FF] text-black text-sm font-bold hover:bg-[#00E0EE] transition-colors">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
    </aside>

    <main class="flex-1 overflow-y-auto p-8 bg-[#0A0A0A]">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-white tracking-tight">Selamat Datang, Admin</h2>
            <div class="flex items-center gap-3">
                <div class="text-right leading-tight">
                    <p class="text-sm font-semibold text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-[10px] text-gray-500 tracking-wider uppercase font-semibold">{{ auth()->user()->role ?? 'Super Admin' }}</p>
                </div>
                <img src="{{ auth()->user()->avatar_url ?? asset('images/default-avatar.png') }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-gray-700" />
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
            <div class="card-stats p-6 rounded-2xl">
                <span class="text-sm text-gray-400">Total Antrean</span>
                <p class="text-4xl font-extrabold text-[#00F0FF] mt-2">{{ $totalPending }}</p>
            </div>
            <div class="card-stats p-6 rounded-2xl">
                <span class="text-sm text-gray-400">Total Disetujui</span>
                <p class="text-4xl font-extrabold text-amber-400 mt-2">{{ $totalApproved }}</p>
            </div>
            <div class="card-stats p-6 rounded-2xl">
                <span class="text-sm text-gray-400">Total Ditolak</span>
                <p class="text-4xl font-extrabold text-red-400 mt-2">{{ $totalRejected }}</p>
            </div>
        </div>

        <!-- Table -->
        <div class="table-card rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-[#1F1F1F] flex items-center justify-between">
                <h3 class="text-base font-bold text-white">Kiriman Proyek Terbaru</h3>
                <a href="{{ route('admin.antrean') }}" class="text-xs font-semibold text-[#00F0FF] hover:text-[#00E0EE]">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-500 uppercase text-[11px] tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left font-bold">Judul Proyek</th>
                            <th class="px-6 py-3 text-left font-bold">Nama</th>
                            <th class="px-6 py-3 text-left font-bold">Tanggal Kirim</th>
                            <th class="px-6 py-3 text-left font-bold">Status</th>
                            <th class="px-6 py-3 text-left font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#1F1F1F]">
                        @forelse ($recentProjects as $project)
                        <tr class="hover:bg-[#1A1A1A] transition-colors">
                            <td class="px-6 py-4 font-semibold text-white">{{ $project->title }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $project->user->name ?? 'Tidak diketahui' }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $project->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusMap = [
                                        'menunggu'  => ['bg-amber-500/20 text-amber-400', 'bg-amber-400', 'Menunggu'],
                                        'disetujui' => ['bg-green-500/20 text-green-400', 'bg-green-400', 'Disetujui'],
                                        'ditolak'   => ['bg-red-500/20 text-red-400', 'bg-red-400', 'Ditolak'],
                                    ];
                                    [$badgeClass, $dotClass, $label] = $statusMap[$project->status] ?? $statusMap['menunggu'];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                    {{ $label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.project.show', $project) }}"
                                   class="inline-flex items-center px-4 py-1.5 rounded-lg bg-[#00F0FF] text-black text-xs font-bold hover:bg-[#00E0EE] transition-colors">
                                    DETAIL
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="px-6 py-10 text-center text-gray-500"><i class="bi bi-inbox text-2xl block mb-2"></i>Belum ada kiriman proyek.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Footer -->
            @if($recentProjects->hasPages())
            <div class="px-6 py-3.5 border-t border-[#1F1F1F] flex items-center justify-between text-xs text-gray-500">
                <span class="font-medium">Menampilkan {{ $recentProjects->count() }} dari {{ $recentProjects->total() }} kiriman terbaru</span>
                <div class="flex items-center gap-3">
                    <span class="text-gray-300 font-bold">{{ $recentProjects->currentPage() }} / {{ $recentProjects->lastPage() }}</span>
                    <div class="flex gap-1">
                        @if($recentProjects->onFirstPage())
                            <span class="w-7 h-7 rounded-md flex items-center justify-center text-gray-600 cursor-not-allowed"><i class="bi bi-chevron-left text-xs"></i></span>
                        @else
                            <a href="{{ $recentProjects->previousPageUrl() }}" class="w-7 h-7 rounded-md hover:bg-[#1F1F1F] flex items-center justify-center"><i class="bi bi-chevron-left text-xs"></i></a>
                        @endif
                        @if($recentProjects->hasMorePages())
                            <a href="{{ $recentProjects->nextPageUrl() }}" class="w-7 h-7 rounded-md hover:bg-[#1F1F1F] flex items-center justify-center"><i class="bi bi-chevron-right text-xs"></i></a>
                        @else
                            <span class="w-7 h-7 rounded-md flex items-center justify-center text-gray-600 cursor-not-allowed"><i class="bi bi-chevron-right text-xs"></i></span>
                        @endif
                    </div>
                </div>
            </div>
            @else
            <div class="px-6 py-3.5 border-t border-[#1F1F1F] text-xs text-gray-500">
                <span class="font-medium">Menampilkan {{ $recentProjects->count() }} dari {{ $totalPending }} kiriman terbaru</span>
            </div>
            @endif
        </div>
    </main>
</div>
</body>
</html>