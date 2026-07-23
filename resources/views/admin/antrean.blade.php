<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Antrean Review - Portova</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        * { font-family: 'Inter', -apple-system, sans-serif; }
        body { background-color: #0A0A0A; color: #E5E7EB; -webkit-font-smoothing: antialiased; }
        .sidebar { background-color: #111111; border-right: 1px solid #1F1F1F; }
        .nav-link { transition: all .15s ease; }
        .table-card { background-color: #141414; border: 1px solid #1F1F1F; }
        .table-card thead { background-color: #1A1A1A; }
        .table-card tbody tr { border-bottom: 1px solid #1F1F1F; }
        .table-card tbody tr:hover { background-color: #1A1A1A; }
        .status-dot { animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
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
        .search-input { background-color: #141414; border: 1px solid #2A2A2A; }
        .search-input:focus { border-color: #00F0FF; }
        .filter-tabs { background-color: #141414; }
        .filter-tabs a.active {
            background-color: #00F0FF;
            color: #000;
        }
        .filter-tabs a:not(.active) { color: #9CA3AF; }
        .filter-tabs a:not(.active):hover { color: #F3F4F6; }
    </style>
</head>
<body>
<div class="flex h-screen overflow-hidden">
    <!-- SIDEBAR -->
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

    <!-- MAIN -->
    <main class="flex-1 overflow-y-auto p-8 bg-[#0A0A0A]">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-white tracking-tight">Antrean Review Proyek</h2>
            <div class="flex items-center gap-3">
                <div class="text-right leading-tight">
                    <p class="text-sm font-semibold text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-[10px] text-gray-500 tracking-wider uppercase font-semibold">{{ auth()->user()->role ?? 'Super Admin' }}</p>
                </div>
                <img src="{{ auth()->user()->avatar_url ?? asset('images/default-avatar.png') }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-gray-700" />
            </div>
        </div>

        <!-- Search & Filter -->
        <form method="GET" action="{{ route('admin.antrean') }}" class="flex flex-wrap items-center gap-4 mb-6">
            <div class="relative flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari log sistem..."
                       class="search-input w-full rounded-lg py-2.5 px-4 pl-10 text-sm outline-none text-gray-200" />
                <i class="bi bi-search absolute left-3 top-3 text-gray-500"></i>
            </div>
            <button type="submit"
                    class="bg-[#00F0FF] hover:bg-[#00E0EE] text-black px-5 py-2.5 rounded-lg text-sm font-bold transition-colors flex items-center gap-2">
                <i class="bi bi-funnel"></i> FILTER
            </button>
            <div class="filter-tabs flex rounded-lg p-1 ml-auto">
                <a href="{{ route('admin.antrean', ['status' => '']) }}"
                   class="px-4 py-1.5 rounded-md text-sm font-semibold transition-colors {{ !request('status') ? 'active' : '' }}">Semua</a>
                <a href="{{ route('admin.antrean', ['status' => 'menunggu']) }}"
                   class="px-4 py-1.5 rounded-md text-sm font-semibold transition-colors {{ request('status') == 'menunggu' ? 'active' : '' }}">Menunggu</a>
                <a href="{{ route('admin.antrean', ['status' => 'disetujui']) }}"
                   class="px-4 py-1.5 rounded-md text-sm font-semibold transition-colors {{ request('status') == 'disetujui' ? 'active' : '' }}">Disetujui</a>
                <a href="{{ route('admin.antrean', ['status' => 'ditolak']) }}"
                   class="px-4 py-1.5 rounded-md text-sm font-semibold transition-colors {{ request('status') == 'ditolak' ? 'active' : '' }}">Ditolak</a>
            </div>
        </form>

        <!-- Table -->
        <div class="table-card rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-500 uppercase text-[11px] tracking-wider">
                        <tr>
                            <th class="px-8 py-4 text-left font-bold">Judul Proyek</th>
                            <th class="px-8 py-4 text-left font-bold">Nama</th>
                            <th class="px-8 py-4 text-left font-bold">Tanggal Kirim</th>
                            <th class="px-8 py-4 text-left font-bold">Status</th>
                            <th class="px-8 py-4 text-right font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#1F1F1F]">
                        @forelse ($projects as $project)
                        <tr class="hover:bg-[#1A1A1A] transition-colors">
                            <td class="px-8 py-5 font-semibold text-white">{{ $project->title }}</td>
                            <td class="px-8 py-5 text-gray-300">{{ $project->user->name ?? 'Tidak diketahui' }}</td>
                            <td class="px-8 py-5 text-gray-400">{{ $project->created_at->format('d M Y') }}</td>
                            <td class="px-8 py-5">
                                @php
                                    $statusMap = [
                                        'menunggu'  => ['bg-amber-500/20 text-amber-400', 'bg-amber-400', 'Menunggu'],
                                        'disetujui' => ['bg-green-500/20 text-green-400', 'bg-green-400', 'Disetujui'],
                                        'ditolak'   => ['bg-red-500/20 text-red-400', 'bg-red-400', 'Ditolak'],
                                    ];
                                    [$badgeClass, $dotClass, $label] = $statusMap[$project->status] ?? $statusMap['menunggu'];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }} status-dot"></span>
                                    {{ $label }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    @if(auth()->user()->role === 'admin' && $project->status == 'menunggu')
                                    <form action="{{ route('admin.project.approve', $project) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-green-500/10 hover:bg-green-500/20 text-green-400 transition-colors">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.project.reject', $project) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 transition-colors">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <a href="{{ route('admin.project.show', $project) }}"
                                       class="flex-shrink-0 inline-flex items-center px-4 py-1.5 rounded-lg bg-[#00F0FF] text-black text-xs font-bold hover:bg-[#00E0EE] transition-colors">
                                        DETAIL
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="px-8 py-10 text-center text-gray-500"><i class="bi bi-inbox text-2xl block mb-2"></i>Belum ada kiriman proyek.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-8 py-3.5 border-t border-[#1F1F1F] flex flex-wrap items-center justify-between text-xs text-gray-500">
                <span class="font-medium">Menampilkan {{ $projects->firstItem() ?? 0 }} - {{ $projects->lastItem() ?? 0 }} dari {{ $projects->total() }} antrean terbaru</span>
                <div class="flex items-center gap-3">
                    <span class="text-gray-300 font-bold">{{ $projects->currentPage() }} / {{ $projects->lastPage() }}</span>
                    <div class="flex gap-1">
                        @if($projects->onFirstPage())
                            <span class="w-7 h-7 rounded-md flex items-center justify-center text-gray-600 cursor-not-allowed"><i class="bi bi-chevron-left"></i></span>
                        @else
                            <a href="{{ $projects->previousPageUrl() }}" class="w-7 h-7 rounded-md hover:bg-[#1F1F1F] flex items-center justify-center"><i class="bi bi-chevron-left"></i></a>
                        @endif
                        @if($projects->hasMorePages())
                            <a href="{{ $projects->nextPageUrl() }}" class="w-7 h-7 rounded-md hover:bg-[#1F1F1F] flex items-center justify-center"><i class="bi bi-chevron-right"></i></a>
                        @else
                            <span class="w-7 h-7 rounded-md flex items-center justify-center text-gray-600 cursor-not-allowed"><i class="bi bi-chevron-right"></i></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>