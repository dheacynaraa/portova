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
               style="
                    color:#B9CACB;
                    text-decoration:none;
               ">
                Tentang
            </a>

            <a href="#"
               style="
                    color:#B9CACB;
                    text-decoration:none;
               ">
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
               style="
                    background:#006970;
                    color:#DBFCFF;
                    text-decoration:none;
                    padding:8px 20px;
                    border-radius:6px;
                    border:1px solid rgba(125,244,255,.3);
                    font-size:14px;
                    font-weight:600;
               ">

                MASUK

            </a>

        </div>

    </div>

</nav>