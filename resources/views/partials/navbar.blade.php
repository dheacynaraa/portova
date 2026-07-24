<nav
style="
background:#0B1112;
border-bottom:1px solid #1E2A2E;
height:72px;
position:sticky;
top:0;
z-index:999;
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
    href="{{ auth()->check() ? route('explore') : route('landing') }}"
    style="
    color:#F3FEFF;
    text-decoration:none;
    font-size:30px;
    font-weight:700;
    ">
        Portova
    </a>

    {{-- MENU --}}
    @if(!auth()->check() || auth()->user()->role != 'admin')

    <div
    style="
    display:flex;
    gap:42px;
    ">

        <a
        href="{{ route('explore') }}"
        class="nav-link {{ request()->routeIs('project.*') ? 'active-nav' : '' }}">
            Eksplorasi
        </a>

        <a href="{{ route('about') }}" class="nav-link">
            Tentang
        </a>

        <a href="{{ route('contact') }}" class="nav-link">
            Kontak
        </a>

    </div>

    @else

    <div></div>

    @endif

    {{-- RIGHT SIDE --}}
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

            <a
            href="{{ route('register') }}"
            class="register-btn">
                DAFTAR
            </a>

        @else

            @if(auth()->user()->role=='admin')

                <a
                href="{{ route('admin.dashboard') }}"
                class="nav-link active-nav">
                    Dashboard
                </a>

            @else

                {{-- Bookmark --}}
                <a
                href="{{ route('save.index') }}"
                class="bookmark-btn">

                    <i class="fa-regular fa-bookmark"></i>

                </a>

                {{-- Avatar --}}
                <a
                href="{{ route('profile.index') }}">

                    <img
                    src="{{ auth()->user()->image_profile
                        ? asset('img/profile/'.auth()->user()->image_profile)
                        : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=0B1112&color=7DF4FF'
                    }}"
                    style="
                    width:40px;
                    height:40px;
                    border-radius:50%;
                    object-fit:cover;
                    border:2px solid #19E5F7;
                    transition:.25s;
                    ">

                </a>

            @endif

        @endguest

    </div>

</div>

</nav>

<style>
    .login-btn{

    background:#00D9F5;
    color:#081112;
    padding:10px 22px;
    border-radius:10px;
    font-weight:700;
    text-decoration:none;
    transition:.25s;

    }

    .login-btn:hover{

    background:#5CF4FF;

    }

    .register-btn{

    padding:10px 22px;
    border-radius:10px;
    border:1px solid #2A3D41;
    color:#C7D7D9;
    text-decoration:none;
    font-weight:700;
    transition:.25s;

    }

    .register-btn:hover{

    border-color:#00D9F5;
    color:#00D9F5;

    }

    .nav-link{

    color:#A6B8BB;
    text-decoration:none;
    font-size:15px;
    transition:.25s;
    padding-bottom:5px;

    }

    .nav-link:hover{

    color:#00D9F5;

    }

    .active-nav{

    color:#00D9F5;
    border-bottom:2px solid #00D9F5;

    }

    .bookmark-btn{

    color:#D9F7FA;
    font-size:18px;
    transition:.25s;

    }

    .bookmark-btn:hover{

    color:#00D9F5;

    }
</style>