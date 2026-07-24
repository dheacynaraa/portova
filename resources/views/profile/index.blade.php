@extends('layouts.app')

@section('content')

<section
style="
max-width:1280px;
margin:auto;
padding:60px 24px 100px;
">
<!-- HEADER PROFILE -->

<div
style="
background:#11191C;
border:1px solid #273233;
border-radius:5px;
padding:36px;
margin-bottom:32px;
">

    <div
    style="
    display:flex;
    gap:32px;
    align-items:flex-start;
    ">

        <!-- FOTO -->

        <img
        src="{{ $user->image_profile
            ? asset('img/profile/'.$user->image_profile)
            : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0B1112&color=7DF4FF&size=256'
        }}"
        style="
        width:130px;
        height:130px;
        border-radius:50%;
        object-fit:cover;
        border:3px solid #00F0FF;
        ">

        <!-- KANAN -->

        <div
        style="
        flex:1;
        ">

            <!-- BARIS ATAS -->

            <div
            style="
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            ">

                <!-- IDENTITAS -->

                <div>

                    <h1
                    style="
                    margin:0;
                    color:#DBFCFF;
                    font-size:34px;
                    ">
                        {{ $user->name }}
                    </h1>

                    <p
                    style="
                    margin-top:6px;
                    color:#8FA7AA;
                    font-size:17px;
                    ">
                        {{ $user->university ?: 'Belum menambahkan universitas' }}
                    </p>

                </div>

                <!-- BUTTON -->

                <div
                style="
                display:flex;
                gap:14px;
                ">

                    <button
                    style="
                    background:transparent;
                    color:#19E5F7;
                    border:1px solid #19E5F7;
                    padding:12px 22px;
                    border-radius:10px;
                    cursor:pointer;
                    font-weight:bold;
                    ">

                        Edit Profil

                    </button>

                    <button
                    type="button"
                    id="openUploadModal"
                    class="btn-upload-project"
                    >
                        + Unggah Proyek
                    </button>

                </div>

            </div>

            <!-- SOSIAL -->

            <div
            style="
            display:flex;
            gap:22px;
            margin-top:8px;
            ">

                <a
                href="{{ $user->link_github }}"
                style="
                color:#19E5F7;
                text-decoration:none;
                ">

                    <i class="fa-brands fa-github"></i>
                    Github

                </a>

                <a
                href="{{ $user->link_instagram }}"
                style="
                color:#19E5F7;
                text-decoration:none;
                ">

                    <i class="fa-brands fa-instagram"></i>
                    Instagram

                </a>

            </div>

            <!-- BIO -->

            <p
            style="
            margin-top:22px;
            color:#B9CACB;
            line-height:28px;
            max-width:760px;
            ">

                {{ $user->bio ?? 'Belum menambahkan bio.' }}

            </p>

        </div>

    </div>

</div>

        <div
style="
display:grid;
grid-template-columns:repeat(2,1fr);
gap:24px;
margin:32px 0 48px;
">

    <!-- Total Project -->
    <div
    style="
    background:#111C20;
    border:1px solid #22353A;
    border-radius:14px;
    padding:22px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    ">

        <div>
            <div
            style="
            color:#7F979A;
            font-size:14px;
            ">
                Total Proyek
            </div>

            <div
            style="
            margin-top:8px;
            color:#19E5F7;
            font-size:34px;
            font-weight:700;
            ">
                {{ $totalProjects }}
            </div>
        </div>

        <div
        style="
        width:54px;
        height:54px;
        border-radius:12px;
        background:#15272C;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:24px;
        ">
            📁
        </div>

    </div>

    <!-- Total Like -->
    <div
    style="
    background:#111C20;
    border:1px solid #22353A;
    border-radius:14px;
    padding:22px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    ">

        <div>
            <div
            style="
            color:#7F979A;
            font-size:14px;
            ">
                Total Suka
            </div>

            <div
            style="
            margin-top:8px;
            color:#19E5F7;
            font-size:34px;
            font-weight:700;
            ">
                {{ $totalLikes }}
            </div>
        </div>

        <div
        style="
        width:54px;
        height:54px;
        border-radius:12px;
        background:#15272C;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:24px;
        ">
            🤍
        </div>

    </div>

</div>


<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">

@forelse($projects as $project)

<div
style="
background:#121A1B;
border:1px solid #1F2A2D;
border-radius:16px;
overflow:hidden;
">

    <!-- gambar -->
    <img
        src="{{ $project->project_image }}"
        style="
        width:100%;
        height:190px;
        object-fit:cover;
        ">
    
    <div style="padding:20px;">

        <h3
        style="
        color:#DBFCFF;
        font-size:20px;
        font-weight:700;
        ">
            {{ $project->title }}
        </h3>

        <p
        style="
        color:#B9CACB;
        margin-top:12px;
        line-height:26px;
        ">
            {{ Str::limit($project->desc,80) }}
        </p>

    </div>
</div>

@empty

<p
style="
color:#B9CACB;
text-align:center;
padding:40px;
grid-column:1/4;
">
    Kamu belum mengunggah proyek.
</p>

@endforelse

</div>
</section>


{{-- Upload Project Modal --}}

<div
id="uploadModal"
class="upload-modal-overlay"
style="display:none;"
>

    <div class="upload-modal">

        <div class="modal-header">

            <div>

                <h2>Tambah Proyek Baru</h2>

                <p>Bagikan inovasi terbaikmu kepada dunia.</p>

            </div>

            <button
            id="closeUploadModal"
            class="close-modal">

                <i class="bi bi-x-lg"></i>

            </button>

        </div>

        <hr>

        <div style="padding:40px;text-align:center;color:#9FB2B7;">

            Form upload akan kita buat pada langkah berikutnya.

        </div>

    </div>

</div>

<script>

const uploadModal =
document.getElementById('uploadModal');

document
.getElementById('openUploadModal')
.onclick=function(){

    uploadModal.style.display="flex";

}

document
.getElementById('closeUploadModal')
.onclick=function(){

    uploadModal.style.display="none";

}

window.onclick=function(e){

    if(e.target==uploadModal){

        uploadModal.style.display="none";

    }

}

</script>

@endsection