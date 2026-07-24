@extends('layouts.app')

@section('content')

<style>

:root{
    --primary:#19E6FF;
    --bg:#071011;
    --card:#11191B;
    --border:#263437;
    --text:#F5F5F5;
    --muted:#A8B5B8;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:var(--bg);
    font-family:'Poppins',sans-serif;
    color:white;
    overflow-x:hidden;
}

section{
    width:100%;
}

.container-custom{
    width:88%;
    max-width:1300px;
    margin:auto;
}

/* ================= HERO ================= */

.hero-about{
    position:relative;
    min-height:90vh;
    padding:70px 0;
    display:flex;
    align-items:center;
    overflow:hidden;
}

.hero-about::before{
    content:"";
    position:absolute;
    width:700px;
    height:700px;
    background:#19E6FF;
    opacity:.06;
    filter:blur(170px);
    border-radius:50%;
    top:-250px;
    right:-180px;
}

.hero-about::after{
    content:"";
    position:absolute;
    width:500px;
    height:500px;
    background:#19E6FF;
    opacity:.04;
    filter:blur(160px);
    left:-200px;
    bottom:-200px;
}

.hero-content{
    position:relative;
    z-index:2;
    max-width:620px;
}

.hero-badge{
    display:inline-block;
    color:var(--primary);
    border:1px solid rgba(25,230,255,.35);
    padding:10px 18px;
    letter-spacing:2px;
    font-size:13px;
    margin-bottom:35px;
    font-weight:600;
}

.hero-content h1{
    font-size:36px;
    line-height:1.2;
    font-weight:800;
    margin-bottom:35px;
}

.hero-content h1 span{
    color:var(--primary);
}

.hero-content p{
    color:var(--muted);
    line-height:2;
    font-size:16px;
    width:80%;
    margin-bottom:45px;
}

/* BUTTON */
.hero-btn{
    display:flex;
    gap:18px;
}

.btn-primary-custom{
    background:var(--primary);
    color:black;
    padding:13px 28px;
    font-size: 15px;
    text-decoration:none;
    font-weight:700;
    letter-spacing:1px;
    transition:.35s;
}

.btn-primary-custom:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 40px rgba(25,230,255,.35);
}

.btn-outline-custom{
    border:1px solid var(--primary);
    color:var(--primary);
    padding:17px 42px;
    text-decoration:none;
    transition:.35s;
    font-weight:700;
    letter-spacing:1px;
}

.btn-outline-custom:hover{
    background:var(--primary);
    color:black;
}

/* FLOATING LIGHT */

.floating-circle{
    position:absolute;
    width:14px;
    height:14px;
    border-radius:50%;
    background:var(--primary);
    right:18%;
    top:35%;
    box-shadow:0 0 20px var(--primary);
    animation:float 4s infinite ease-in-out;
}

.floating-circle.two{
    width:8px;
    height:8px;
    right:10%;
    top:65%;
    animation-delay:1s;
}

.floating-circle.three{
    width:18px;
    height:18px;
    top:18%;
    right:32%;
    animation-delay:2s;
}

@keyframes float{

    0%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-18px);
    }

    100%{
        transform:translateY(0);
    }

}

.scroll-down{
    position:absolute;
    bottom:40px;
    left:50%;
    transform:translateX(-50%);
    color:var(--primary);
    animation:bounce 2s infinite;
}

.scroll-down i{
    font-size:30px;
}

@keyframes bounce{

    0%,20%,50%,80%,100%{
        transform:translateY(0);
    }

    40%{
        transform:translateY(-12px);
    }

    60%{
        transform:translateY(-6px);
    }

}

/* RESPONSIVE */

@media(max-width:992px){
    .hero-content h1{
        font-size:52px;
    }

    .hero-content p{
        width:100%;
    }

    .hero-btn{
        flex-direction:column;
    }
}

@media(max-width:600px){
    .hero-content h1{
        font-size:40px;
    }

    .hero-content{
        text-align:center;
    }

    .hero-btn{
        align-items:center;
    }
}

/*==========================
        VISION
==========================*/

.vision-section{
    padding:120px 0;
    position:relative;
}

.section-heading{
    text-align:center;
    margin-bottom:70px;
}

.section-heading span{
    color:var(--primary);
    letter-spacing:4px;
    font-size:13px;
    font-weight:700;
}

.section-heading h2{
    color:white;
    font-size:38px;
    margin-top:12px;
    font-weight:700;
}

.vision-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:35px;
}

.vision-card{
    position:relative;
    background:#11191B;
    border:1px solid #263437;
    padding:28px;
    overflow:hidden;
    transition:.4s;
}

.vision-card::before{
    content:"";
    position:absolute;
    width:260px;
    height:260px;
    background:#19E6FF;
    opacity:.05;
    border-radius:50%;
    filter:blur(90px);
    top:-120px;
    right:-120px;
}

.vision-card:hover{
    transform:translateY(-10px);
    border-color:#19E6FF;
    box-shadow:0 18px 60px rgba(25,230,255,.12);
}

.card-icon{
    width:55px;
    height:55px;
    border-radius:50%;
    background:rgba(25,230,255,.08);
    border:1px solid rgba(25,230,255,.2);
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:28px;
}

.card-icon i{
    color:var(--primary);
    font-size:22px;
}

.vision-card h3{
    font-size:24px;
    color:white;
    margin-bottom:28px;
}

.vision-card p{
    color:var(--muted);
    line-height:2;
    font-size:17px;
}

.vision-card ul{
    margin:0;
    padding-left:22px;
}

.vision-card li{
    color:var(--muted);
    margin-bottom:18px;
    line-height:1.9;
}

.vision-card li::marker{
    color:#19E6FF;
}

.bottom-line{
    width:100%;
    height:4px;
    background:#19E6FF;
    margin-top:40px;
    box-shadow:0 0 15px #19E6FF;
}

/* Responsive */

@media(max-width:900px){
    .vision-grid{
        grid-template-columns:1fr;
    }

    .section-heading h2{
        font-size:40px;
    }

    .vision-card{
        padding:35px;
    }
}

/*==============================
        WORKFLOW
==============================*/

.workflow-section{
    padding:110px 0;
}

.workflow-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:28px;
}

.workflow-card{
    background:#141c1e;
    border:1px solid #2a3639;
    padding:35px;
    transition:.35s;
}

.workflow-card:hover{
    transform:translateY(-8px);
    border-color:#19E6FF;
    box-shadow:0 15px 35px rgba(25,230,255,.12);
}

.number{
    color:#19E6FF;
    font-weight:700;
    letter-spacing:2px;
    margin-bottom:18px;
}

.workflow-card h4{
    color:white;
    font-size:28px;
    margin-bottom:18px;
}

.workflow-card p{
    color:#b8b8b8;
    line-height:1.9;
}

/*==============================
        CTA
==============================*/

.cta-section{
    padding:100px 0 140px;
}

.cta-box{
    background:#18E6FF;
    padding:65px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:50px;
    position:relative;
    overflow:hidden;
}

.cta-box::before{
    content:"";
    position:absolute;
    width:400px;
    height:400px;
    border-radius:50%;
    background:white;
    opacity:.08;
    right:-180px;
    top:-180px;
}

.cta-left{
    width:55%;
}

.cta-left h2{
    font-size:48px;
    color:#051012;
    margin-bottom:20px;
}

.cta-left p{
    color:#072225;
    line-height:1.9;
    font-size:18px;
}

.cta-right{
    display:flex;
    gap:20px;
}

.btn-dark{
    padding:18px 35px;
    background:#081012;
    color:white;
    text-decoration:none;
    font-weight:700;
    transition:.3s;
}

.btn-dark:hover{
    transform:translateY(-5px);
}

.btn-light{
    padding:18px 35px;
    border:2px solid #081012;
    color:#081012;
    text-decoration:none;
    font-weight:700;
    transition:.3s;
}

.btn-light:hover{
    background:#081012;
    color:white;
}

/*==============================
        RESPONSIVE
==============================*/

@media(max-width:992px){
    .workflow-grid{
    grid-template-columns:1fr;
    }

    .cta-box{
        flex-direction:column;
        text-align:center;
    }

    .cta-left{
        width:100%;
    }

    .cta-right{
        justify-content:center;
        flex-wrap:wrap;
    }
}

@media(max-width:600px){
    .cta-left h2{
        font-size:34px;
    }

    .workflow-card h4{
        font-size:24px;
    }
}
</style>

<section class="hero-about">
    <div class="floating-circle"></div>
    <div class="floating-circle two"></div>
    <div class="floating-circle three"></div>

    <div class="container-custom">
        <div class="hero-content">
            <div class="hero-badge">
                PORTOVA
            </div>

            <h1>
                Mendukung Mahasiswa Dalam
                <br>
                Mempublikasikan
                <span>Proyek Inovatif</span>
                dan Membuka
                <br>
                Peluang Dilirik oleh Industri.
            </h1>

            <p>
                Portova adalah platform digital yang membantu mahasiswa
                membangun portofolio, memamerkan proyek terbaik, serta
                membuka peluang kolaborasi dengan dunia industri.
            </p>

            <div class="hero-btn">
                <a href="{{ route('login') }}" class="btn-primary-custom">
                    Masuk
                </a>
                <a href="{{ route('explore') }}" class="btn-outline-custom">
                    Eksplorasi
                </a>
            </div>
        </div>
    </div>

    <div class="scroll-down">
        <i class="bi bi-chevron-double-down"></i>
    </div>
</section>

{{-- =========================================
        VISION & MISSION
========================================= --}}

<section class="vision-section">
    <div class="container-custom">
        <div class="section-heading">
            <span>TENTANG PORTOVA</span>
            <h2>Visi & Misi</h2>
        </div>

        <!-- VISI -->
        <div class="vision-grid">
            <div class="vision-card">
                <div class="card-icon">
                    <i class="bi bi-eye-fill"></i>
                </div>

                <h3>Visi Kami</h3>

                <p>
                    Menjadi platform digital yang menghubungkan mahasiswa,
                    institusi pendidikan, dan dunia industri melalui
                    publikasi karya inovatif sehingga setiap ide memiliki
                    kesempatan untuk berkembang menjadi solusi nyata.
                </p>

                <div class="bottom-line"></div>
            </div>

            <div class="vision-card">
                <div class="card-icon">
                    <i class="bi bi-rocket-takeoff-fill"></i>
                </div>

                <h3>Misi Kami</h3>

                <ul>
                    <li>Menghubungkan talenta muda dengan industri.</li>
                    <li>Memvalidasi inovasi melalui proses profesional.</li>
                    <li>Mendorong kolaborasi antara kampus dan perusahaan.</li>
                    <li>Membangun portofolio digital mahasiswa.</li>
                    <li>Membuka peluang karier melalui proyek nyata.</li>
                </ul>

                <div class="bottom-line"></div>
            </div>
        </div>
    </div>
</section>

{{--=========================================
        ALUR PENGAJUAN
==========================================--}}

<section class="workflow-section">
    <div class="container-custom">
        <div class="section-heading">
            <span>CARA KERJA</span>

            <h2>Alur Pengajuan Proyek</h2>
        </div>

        <div class="workflow-grid">
            <div class="workflow-card">
                <div class="number">
                    01.
                </div>

                <h4>Hubungkan</h4>

                <p>
                    Mahasiswa mengunggah proyek dan membangun portofolio
                    digital yang siap dilihat oleh industri.
                </p>
            </div>

            <div class="workflow-card">
                <div class="number">
                    02.
                </div>

                <h4>Validasi</h4>

                <p>
                    Admin melakukan proses review untuk memastikan kualitas,
                    kelengkapan, dan kesesuaian proyek.
                </p>
            </div>

            <div class="workflow-card">
                <div class="number">
                    03.
                </div>

                <h4>Akselerasi</h4>

                <p>
                    Proyek yang disetujui dapat dieksplorasi perusahaan
                    sehingga membuka peluang kolaborasi maupun karier.
                </p>
            </div>
        </div>
    </div>
</section>

{{--=========================================
        CTA
==========================================--}}

<section class="cta-section">
    <div class="container-custom">
        <div class="cta-box">
            <div class="cta-left">
                <h2>Siap untuk Berinovasi?</h2>

                <p>
                    Bergabunglah bersama Portova dan publikasikan proyek
                    terbaikmu agar dikenal oleh lebih banyak orang dan
                    membuka peluang kolaborasi dengan industri.
                </p>
            </div>

            <div class="cta-right">
                <a href="{{ route('register') }}" class="btn-dark">
                    Daftar Sekarang
                </a>

                <a href="{{ route('explore') }}" class="btn-light">
                    Eksplorasi
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
