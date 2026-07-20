@extends('layouts.app')

@section('content')

<section class="relative bg-[#080D0E] min-h-screen py-6 overflow-hidden">
        {{-- Glow --}}
        <div class="absolute left-1/2 -translate-x-1/2 top-24
                    w-[700px] h-[350px]
                    rounded-full
                    bg-[#00F0FF]/5
                    blur-[180px]">
        </div>

        {{-- Grid --}}
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image:linear-gradient(rgba(255,255,255,.12) 1px,
                    transparent 1px),
                    linear-gradient(90deg,rgba(255,255,255,.12) 1px,transparent 1px);
                    background-size:40px 40px;">
        </div>

        <div class="relative z-10 max-w-[1280px] mx-auto px-4">

        {{-- Judul --}}
        <div class="text-center mt-4">

            <h1 style="color:#7DF4FF; font-size:52px; font-weight:700;">
                Eksplorasi Proyek Mahasiswa
            </h1>

            <p class="mt-4 text-[#B9CACB] text-[15px] leading-8">
                Arsip digital inovasi teknologi, desain, dan riset dari talenta terbaik ekosistem Portova.
            </p>

            <div class="mt-5 border-b border-[#3B494B]"></div>

        </div>

        {{-- Search --}}
        <div class="flex justify-center mt-10">

            <div class="flex w-[820px] h-[52px]">

                {{-- Search Box --}}
                <div class="flex-1 flex items-center bg-[#192122] border border-[#3B494B] rounded-l-md px-4">

                    <i class="fa-solid fa-magnifying-glass text-[#849495] mr-3"></i>

                    <input
                        type="text"
                        placeholder="Cari proyek atau kreator..."
                        class="w-full bg-transparent outline-none text-[#DBFCFF] placeholder:text-[#849495]">

                </div>

                {{-- Button --}}
                <button
                    class="w-[90px] bg-[#00F0FF] text-[#0D1515] font-bold rounded-r-md hover:bg-[#7DF4FF] transition">

                    CARI

                </button>

            </div>

        </div>

        {{-- Project Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mt-14">

        @foreach($projects as $project)

        @php
        $badgeColor = match($project->tech_stacks){
            'AI' => 'bg-cyan-900 text-cyan-300',
            'UI/UX' => 'bg-yellow-900 text-yellow-300',
            'Robotics' => 'bg-red-900 text-red-300',
            'Web' => 'bg-green-900 text-green-300',
            'Mobile' => 'bg-purple-900 text-purple-300',
            default => 'bg-[#00363A] text-[#00F0FF]'
        };
        @endphp

        <div class="bg-[#121A1B] border border-[#273233] rounded-lg overflow-hidden transition duration-300 hover:border-[#00F0FF] hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(0,240,255,.15)]">

            <div class="relative">

                <!-- image -->
                <img src="{{ $project->project_image }}"
                    class="w-full h-[230px] object-cover">

                <!-- badge -->
                <span class="absolute top-3 left-3 px-3 py-1 rounded text-[11px] font-bold uppercase {{ $badgeColor }}">
                    TECH • {{ $project->tech_stacks }}
                </span>

            </div>

            <!-- isi card -->
            <div class="px-6 py-5">

                <!-- Ttle -->
                <h3 style="color:#DBFCFF;font-size:28px;font-weight:700;line-height:1.2;">
                    {{ $project->title }}
                </style=>
                </h3>

                <!-- desc -->
                <p class="mt-4 text-[#B9CACB] text-[15px] leading-7">

                    {{ $project->desc }}

                </p>
                <div class="mt-5 border-b border-[#3B494B]"></div>

                <!-- footer -->
                <div class="flex justify-between items-center mt-6">

                    <div class="flex items-center gap-2">

                        <div class="w-3 h-3 rounded-full bg-[#7DF4FF]"></div>

                        <span class="text-[#DBFCFF] text-sm">
                            {{ $project->user->name }}
                        </span>

                    </div>

                    <div class="flex gap-4 text-[#849495] text-sm">

                        <span><i class="fa-regular fa-eye"></i> 1.2k</span>

                        <span><i class="fa-regular fa-heart"></i> 243</span>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

        </div>

        {{-- Tombol --}}
        <div class="text-center mt-12">

            <button
                class="border border-[#00F0FF]
                text-[#7DF4FF]
                px-10
                py-3
                hover:bg-[#00F0FF]
                hover:text-[#0D1515]
                transition">

                MUAT LEBIH BANYAK

            </button>

        </div>

        
</section>

@endsection
