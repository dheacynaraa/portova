@extends('layouts.app')

@section('content')

<section style="background:#0B1112;min-height:100vh;position:relative;overflow:hidden;padding:24px 0;">
        {{-- Glow --}}
        <div class="absolute left-1/2 -translate-x-1/2 top-24
                    w-[700px] h-[350px]
                    rounded-full
                    bg-[#00F0FF]/[0.03]
                    blur-[180px]">
        </div>

        {{-- Grid --}}
        

        <div class="relative z-10 max-w-[1280px] mx-auto px-4">

        {{-- Judul --}}
        <div class="text-center mt-4">

            <h1 style="color:#7DF4FF; font-size:52px; font-weight:700;">
                Eksplorasi Proyek Mahasiswa
            </h1>

            <p
style="
margin-top:16px;
color:#B9CACB;
font-size:15px;
line-height:28px;
">
                Arsip digital inovasi teknologi, desain, dan riset dari talenta terbaik ekosistem Portova.
            </p>

            <div class="mt-5 border-b border-[#3B494B]"></div>

        </div>

        
{{-- Search --}}
<div
style="
display:flex;
justify-content:center;
margin:48px 0 60px;
">

<form
action="{{ route('project.index') }}"
method="GET"
style="
width:650px;
display:flex;
margin:auto;">

    <div
    style="
    flex:1;
    display:flex;
    align-items:center;
    background:#1A2224;
    border:1px solid #364345;
    border-right:none;
    border-radius:14px 0 0 14px;
    padding:0 22px;
    height:66px;
    ">

        <i class="fa-solid fa-magnifying-glass"
        style="
        color:#8C9DA0;
        font-size:20px;
        margin-right:16px;
        "></i>

        <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari project..."
        style="
        width:100%;
        border:none;
        outline:none;
        background:transparent;
        color:white;
        font-size:18px;
        ">

    </div>

    <button
    type="submit"
    style="
    width:160px;
    height:66px;
    border:none;
    background:#22D3EE;
    color:#081011;
    font-weight:700;
    font-size:18px;
    border-radius:0 14px 14px 0;
    ">
        CARI
    </button>

</form>

</div>

        </div>

        {{-- Project Grid --}}
        <div
        style="
        max-width:1280px;
        margin:0 auto;
        padding:0 24px;

        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:32px;
        ">
        @foreach($projects as $project)

        @php

        $tech = strtoupper($project->tech_stacks ?? '');

        $badge = match($tech){

            'AI' => [
                'bg' => '#00363A',
                'text' => '#00F0FF'
            ],

            'WEB' => [
                'bg' => '#0B3A22',
                'text' => '#4ADE80'
            ],

            'MOBILE' => [
                'bg' => '#2D1A54',
                'text' => '#C084FC'
            ],

            'UI/UX' => [
                'bg' => '#4A3A00',
                'text' => '#FACC15'
            ],

            'ROBOTICS' => [
                'bg' => '#4A1616',
                'text' => '#FB7185'
            ],

            default => [
                'bg' => '#192122',
                'text' => '#DBFCFF'
            ]

        };

        @endphp

        <div
            class="project-card"
            style="
            background:#121A1B;
            border:1px solid #273233;
            border-radius:16px;
            overflow:hidden;
            transition:.35s;
            cursor:pointer;
            width:100%;
            max-width:380px;
            justify-self:center;
            ">


            <div class="relative">

                <!-- image -->
                <img

                src="{{ $project->project_image }}"

                style="
                width:100%;
                height:230px;
                object-fit:cover;
                display:block;
                ">

        
                <!-- badge -->
                <span style="position:absolute;top:16px;
                            left:16px;
                            padding:7px 14px;
                            border-radius:999px;
                            background:{{ $badge['bg'] }};
                            color:{{ $badge['text'] }};
                            font-size:11px;
                            font-weight:700;
                            letter-spacing:.8px;
                            text-transform:uppercase;
                            ">
                    TECH • {{ $tech }}

                </span>

            </div>

            <!-- isi card -->
            <div style="padding:24px;">

                <!-- Ttle -->
                <h3

                style="
                color:#DBFCFF;
                font-size:26px;
                margin-top:2px;
                font-weight:700;
                line-height:30px;
                margin-top:2px;
                ">

                    {{ $project->title }}
                
                </h3>

                <!-- desc -->
                <p
                    style="
                    margin-top:16px;
                    color:#B9CACB;
                    font-size:15px;
                    line-height:24px;
                    ">

                    {{ Str::limit($project->desc,110) }}

                </p>
                <div class="mt-5 border-b border-[#3B494B]"></div>

                <!-- footer -->
                <div class="flex justify-between items-center mt-6">

                    <div class="flex items-center gap-2">

                        <div

                        style="
                        width:10px;
                        height:10px;
                        background:#7DF4FF;
                        border-radius:999px;
                        ">

                        </div>

                        <span
                            style="
                            color:#DBFCFF;
                            font-size:13px;
                            font-weight:500;
                            ">
                            {{ $project->user->name }}
                        </span>

                    </div>

                    <div
style="
display:flex;
gap:16px;
color:#849495;
font-size:14px;
">

                        <span><i class="fa-regular fa-eye"></i> 1.2k</span>

                        <span><i class="fa-regular fa-heart"></i> 243</span>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

        </div>

        {{-- Tombol Muat --}}
@if($projects->hasMorePages())

<div class="flex justify-center mt-16">
    <a href="{{ $projects->nextPageUrl() }}"
       class="load-btn"
       style="
            display:inline-block;
            padding:18px 55px;
            border:1px solid #00F0FF;
            border-radius:14px;
            color:#7DF4FF;
            text-decoration:none;
            font-weight:700;
            font-size:18px;
            transition:.3s;
       ">
        MUAT LEBIH BANYAK
    </a>
</div>

@endif
        </div>
        
</section>

<style>

    .load-btn:hover{

    background:#00F0FF;

    color:#081011;

    box-shadow:0 0 25px rgba(0,240,255,.35);

    transform:translateY(-2px);

    }

    main{
        background:#0B1112;
    }
    </style>    

        <style>


        .project-card{

        transition:.35s ease;

        }

        .project-card:hover{

        transform:translateY(-8px);

        border-color:#00F0FF;

        box-shadow:
        0 12px 40px rgba(0,240,255,.15);

        }

        .project-card img{

        transition:.35s;

        }

        .project-card:hover img{

        transform:scale(1.05);

        }

        button{

transition:.3s;

}

        button:hover{

        background:#00F0FF;

        color:#071112;

        transform:translateY(-3px);

        box-shadow:

        0 0 22px rgba(0,240,255,.35);

        }
        </style>

@endsection
