<nav style="background:#0B1112;height:58px;border-bottom:1px solid #233637;">

    <div style="max-width:1280px;
                height:58px;
                margin:auto;
                padding:0 16px;
                display:flex;
                align-items:center;
    ">

        {{-- Logo --}}
        <div style="width:25%;">

            <a href="{{ route('project.index') }}"
               style="
                    color:#DBFCFF;
                    font-size:32px;
                    font-weight:700;
                    text-decoration:none;
                    transition:.3s;
               ">
                Portova
            </a>

        </div>

        {{-- Menu --}}
        <div style="
            width:50%;
            display:flex;
            justify-content:center;
            gap:36px;
            font-size:15px;
        ">

            <a href="{{ route('project.index') }}"
               style="
                    color:#7DF4FF;
                    text-decoration:none;
                    border-bottom:2px solid #7DF4FF;
                    padding-bottom:5px;
               ">
                Eksplorasi
            </a>

            <a href="#"
            class="nav-link">
                Tentang
            </a>

            <a href="#"
            class="nav-link">
                Kontak
            </a>

        </div>

        {{-- Login --}}
        <div style="
            width:25%;
            display:flex;
            justify-content:flex-end;
        ">

            <a href="{{ route('login') }}"
            class="login-btn"
            style="
            background:#006970;
            color:#DBFCFF;
            text-decoration:none;
            padding:10px 22px;
            border-radius:8px;
            border:1px solid rgba(125,244,255,.3);
            font-size:14px;
            font-weight:700;
            transition:.3s;
            ">

                MASUK

            </a>

        </div>

    </div>

</nav>

<style>
.login-btn:hover{

background:#00F0FF !important;

color:#0D1515 !important;

box-shadow:0 0 18px rgba(0,240,255,.4);

transform:translateY(-2px);

}
</style>

<style>

.nav-link{
    color:#B9CACB;
    text-decoration:none;
    transition:.3s;
    padding-bottom:5px;
    border-bottom:2px solid transparent;
}

.nav-link:hover{
    color:#7DF4FF;
    border-bottom:2px solid #7DF4FF;
}

</style>