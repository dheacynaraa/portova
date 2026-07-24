@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PORTOVA - Galeri Proyek Mahasiswa</title>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        html,
        body{
            width:100%;
            height:100%;
            overflow:hidden;
            background:#091010;
        }

        /* ===========================
                LANDING
        =========================== */

        .landing-page{
            width:100%;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            position:relative;
            overflow:hidden;
        }

        .hero-content{
            text-align:center;
            z-index:5;
            animation:fadeUp 1.3s ease;
        }

        /* ===========================
                TITLE
        =========================== */

        .hero-title{
            font-size:clamp(70px,11vw,180px);
            font-weight:800;
            letter-spacing:-5px;
            color:#DDFEFF;
            text-shadow:
                0 0 8px rgba(38,234,255,.6),
                0 0 20px rgba(38,234,255,.45),
                0 0 45px rgba(38,234,255,.25);
            animation:glow 3s ease-in-out infinite;
        }

        /* ===========================
                SUBTITLE
        =========================== */

        .hero-subtitle{
            margin-top:10px;
            margin-bottom:45px;
            font-size:12px;
            letter-spacing:8px;
            font-weight:600;
            color:#11D7F4;
        }

        /* ===========================
                BUTTON
        =========================== */

        .btn-masuk{
            width:165px;
            height:58px;
            display:inline-flex;
            justify-content:center;
            align-items:center;
            text-decoration:none;
            font-weight:700;
            font-size:14px;
            color:#031111;
            background:#16D8F4;
            border-radius:2px;
            transition:.10s;
            animation:floating 3s ease-in-out infinite;
        }

        .btn-masuk:hover{
            transform:scale(1.07);
            color:#091010;
            background:#6EEFFF;
            box-shadow:
                0 0 20px rgba(22,216,244,.45),
                0 0 40px rgba(22,216,244,.25);
        }

        /* ===========================
                EXPLORE
        =========================== */

        .explore{
            margin-top:35px;
        }
    
        .explore a{
            text-decoration:none;
            color:#9C9C9C;
            font-size:18px;
            font-weight:400;
            transition:.2s;
        }

        .explore a:hover{
            color:white;
        }

        .explore i{
            margin-left:6px;
            transition:.2s;
        }

        .explore a:hover i{
            transform:translateX(8px);
        }

        /* ===========================
                BACKGROUND GLOW
        =========================== */

        .bg-glow{
            position:absolute;
            border-radius:50%;
            filter:blur(120px);
            opacity:.18;
            animation:moveGlow 8s ease-in-out infinite alternate;
        }

        .glow-1{
            width:450px;
            height:450px;
            background:#00E5FF;
            top:-180px;
            left:-180px;
        }

        .glow-2{
            width:350px;
            height:350px;
            background:#00CFFF;
            right:-120px;
            bottom:-120px;
            animation-delay:2s;
        }

        /* ===========================
                ANIMATION
        =========================== */

        @keyframes fadeUp{
            from{
                opacity:0;
                transform:translateY(50px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        @keyframes glow{

            0%{
                text-shadow:
                0 0 10px rgba(22,216,244,.45),
                0 0 25px rgba(22,216,244,.25);
            }

            50%{
                text-shadow:
                0 0 15px rgba(22,216,244,.85),
                0 0 35px rgba(22,216,244,.55),
                0 0 70px rgba(22,216,244,.25);
            }

            100%{
                text-shadow:
                0 0 10px rgba(22,216,244,.45),
                0 0 25px rgba(22,216,244,.25);
            }

        }

        @keyframes floating{
            0%{

                transform:translateY(0px);
            }

            50%{
                transform:translateY(-10px);
            }

            100%{
                transform:translateY(0px);
            }
        }

        @keyframes moveGlow{

            from{
                transform:translate(0,0);
            }

            to{
                transform:translate(40px,-35px);
            }

        }

        /* ===========================
                RESPONSIVE
        =========================== */

        @media(max-width:992px){
            .hero-title{
                letter-spacing:-2px;
            }

            .hero-subtitle{
                font-size:10px;
                letter-spacing:5px;
            }

            .btn-masuk{
                width:145px;
                height:52px;
            }

            .explore a{
                font-size:20px;
            }
        }

        @media(max-width:576px){
            .hero-title{
                font-size:60px;
            }

            .hero-subtitle{
                font-size:9px;
                letter-spacing:3px;
                margin-bottom:35px;
            }

            .btn-masuk{
                width:130px;
                height:48px;
                font-size:13px;
            }

            .explore a{
                font-size:18px;
            }
        }

        body{
            opacity:0;
            transition:1s;
        }

        .clicked{
            transform:scale(.9);
            filter:brightness(1.4);
            transition:.4s;
        }
    </style>
</head>
<body>
    <!-- Background Glow -->
    <div class="bg-glow glow-1"></div>
    <div class="bg-glow glow-2"></div>

    <section class="landing-page">
        <div class="container">
            <div class="hero-content">

                <!-- Logo -->
                <h1 class="hero-title">
                    PORTOVA
                </h1>

                <p class="hero-subtitle">
                    GALERI PROYEK INOVASI MAHASISWA
                </p>

                <!-- Tombol -->
                <div class="hero-button">
                    <a href="{{ route('login') }}" class="btn-masuk">
                        MASUK
                    </a>
                </div>

                <!-- Eksplorasi -->
                <div class="explore">
                    <a href="{{ route('project.index') }}">
                        Eksplorasi
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
<script>

// ==========================
// Fade ketika halaman dibuka
// ==========================

window.addEventListener('load', () => {
    document.body.style.opacity = "1";
});

// ==========================
// Efek klik tombol MASUK
// ==========================

const masukButton = document.querySelector('.btn-masuk');
masukButton.addEventListener('click', function(e){
    e.preventDefault();
    this.classList.add('clicked');
    setTimeout(()=>{
        window.location.href = this.href;
    },500);
});

// ==========================
// Fade ketika klik Eksplorasi
// ==========================

const explore = document.querySelector('.explore a');
explore.addEventListener('click',function(e){
    e.preventDefault();
    document.body.style.opacity="0";
    setTimeout(()=>{
        window.location.href=this.href;
    },500);
});

// ==========================
// Efek mengetik pada subtitle
// ==========================

const subtitle = document.querySelector('.hero-subtitle');
const originalText = subtitle.innerHTML;
subtitle.innerHTML="";

let i=0;

function typeText(){
    if(i<originalText.length){
        subtitle.innerHTML+=originalText.charAt(i);
        i++;
        setTimeout(typeText,45);
    }
}

setTimeout(typeText,700);

// ==========================
// Glow berubah warna perlahan
// ==========================

const hero=document.querySelector('.hero-title');
setInterval(()=>{
    hero.style.filter=
    `drop-shadow(0 0 ${
        Math.random()*18+15
    }px rgba(0,255,255,.8))`;
},1200);
</script>
</body>
</html>