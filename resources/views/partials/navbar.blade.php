<nav
style="
background:#0B1112;
border-bottom:1px solid #233637;
height:72px;
">

<div
style="
max-width:1280px;
height:72px;
margin:auto;
padding:0 24px;
display:flex;
align-items:center;
justify-content:space-between;
">

    {{-- Logo --}}
    <a
    href="{{ route('project.index') }}"
    style="
    color:#DBFCFF;
    text-decoration:none;
    font-size:32px;
    font-weight:700;
    ">
        Portova
    </a>


    {{-- Menu --}}
    <div
    style="
    display:flex;
    gap:40px;
    align-items:center;
    ">

        <a
        href="{{ route('project.index') }}"
        class="nav-link {{ request()->routeIs('project.*') ? 'active-nav' : '' }}">
            Eksplorasi
        </a>

        <a href="#" class="nav-link">
            Tentang
        </a>

        <a href="#" class="nav-link">
            Kontak
        </a>

    </div>


    {{-- Bagian Kanan --}}
    <div
    style="
    display:flex;
    align-items:center;
    gap:18px;
    ">

        @guest

            <a
            href="{{ route('login') }}"
            class="login-btn">
                MASUK
            </a>

        @endguest


        @auth

            {{-- Bookmark hanya muncul di halaman Profile --}}
            @if(request()->routeIs('profile.*'))

                <a
                href="{{ route('save.index') }}"
                style="
                color:#DBFCFF;
                font-size:22px;
                ">
                    <i class="fa-regular fa-bookmark"></i>
                </a>

            @endif


            {{-- Avatar --}}
            <a href="{{ route('profile.index') }}">

                <div
                    style="
                    width:42px;
                    height:42px;
                    border-radius:50%;
                    background:#00B8C8;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    color:white;
                    font-weight:bold;
                    font-size:18px;
                    ">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                    </div>

            </a>

        @endauth

    </div>

</div>

</nav>

<style>

.nav-link{

color:#B9CACB;
text-decoration:none;
font-weight:500;
transition:.3s;

}

.nav-link:hover{

color:#7DF4FF;

}

.active-nav{

color:#7DF4FF;
border-bottom:2px solid #7DF4FF;
padding-bottom:5px;

}

.login-btn{

background:#006970;
color:white;
padding:10px 24px;
border-radius:10px;
text-decoration:none;
font-weight:700;
transition:.3s;

}

.login-btn:hover{

background:#00F0FF;
color:#081314;

}

</style>