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

        {{-- Right Side: Auth Links --}}
        <div style="
            width:25%;
            display:flex;
            justify-content:flex-end;
            align-items:center;
            gap:16px;
        ">

            @guest
                {{-- Belum login --}}
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

                <a href="{{ route('register') }}"
                class="login-btn"
                style="
                    background:transparent;
                    color:#B9CACB;
                    text-decoration:none;
                    padding:10px 22px;
                    border-radius:8px;
                    border:1px solid #233637;
                    font-size:14px;
                    font-weight:700;
                    transition:.3s;
                ">
                    DAFTAR
                </a>

            @else
                {{-- Sudah login --}}

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                    class="nav-link"
                    style="color:#7DF4FF; border-bottom:2px solid #7DF4FF; padding-bottom:5px; text-decoration:none;">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('profile.index') }}"
                    class="nav-link"
                    style="color:#B9CACB; border-bottom:2px solid transparent; padding-bottom:5px; text-decoration:none;">
                        Profil
                    </a>
                    <a href="#"
                    class="nav-link"
                    style="color:#B9CACB; border-bottom:2px solid transparent; padding-bottom:5px; text-decoration:none;">
                        Proyek Saya
                    </a>
                @endif

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}" style="display:inline; margin:0;">
                    @csrf
                    <button type="submit"
                    style="
                        background:transparent;
                        color:#B9CACB;
                        border:none;
                        padding:10px 16px;
                        border-radius:8px;
                        font-size:14px;
                        font-weight:700;
                        cursor:pointer;
                        transition:.3s;
                    "
                    onmouseover="this.style.color='#7DF4FF'"
                    onmouseout="this.style.color='#B9CACB'">
                        LOGOUT
                    </button>
                </form>

            @endguest

    </div>

</div>

</nav>

{{-- CSS untuk hover effects --}}
<style>
.login-btn:hover{
    background:#00F0FF !important;
    color:#0D1515 !important;
    box-shadow:0 0 18px rgba(0,240,255,.4);
    transform:translateY(-2px);
}

.nav-link{

color:#B9CACB;
text-decoration:none;
font-weight:500;
transition:.3s;

}

.nav-link:hover{
    color:#7DF4FF;
    border-bottom:2px solid #7DF4FF;
}
</style>