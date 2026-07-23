<div id="uploadModal"
style="
position:fixed;
inset:0;
background:rgba(0,0,0,.65);
backdrop-filter:blur(8px);
display:none;
justify-content:center;
align-items:center;
z-index:9999;
">

    <div
    style="
    width:560px;
    background:#131B1E;
    border:1px solid #26373C;
    border-radius:14px;
    padding:28px;
    ">

        {{-- Header --}}
        <div
        style="
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        ">

            <div>

                <h2
                style="
                color:white;
                font-size:24px;
                margin:0;
                ">
                    Tambah Proyek Baru
                </h2>

                <p
                style="
                color:#8CA5A8;
                margin-top:6px;
                ">
                    Bagikan inovasi terbaikmu kepada dunia.
                </p>

            </div>

            <button
            id="closeUploadModal"
            style="
            background:none;
            border:none;
            color:#BFCFD2;
            font-size:22px;
            cursor:pointer;
            ">
                ✕
            </button>

        </div>

        <hr style="border-color:#24373B;margin:24px 0;">

        {{-- nanti form disini --}}

        <div style="text-align:center;color:#8CA5A8;padding:50px 0;">

            Form upload akan kita buat pada step berikutnya.

        </div>

        <div
        style="
        display:flex;
        justify-content:flex-end;
        gap:16px;
        ">

            <button
            id="cancelUploadModal"
            style="
            width:140px;
            height:46px;
            background:none;
            border:1px solid #2E4045;
            color:white;
            border-radius:8px;
            cursor:pointer;
            ">
                Batal
            </button>

            <button
            style="
            width:180px;
            height:46px;
            background:#19E5F7;
            color:#081112;
            border:none;
            border-radius:8px;
            font-weight:bold;
            ">
                Unggah Karya
            </button>

        </div>

    </div>

</div>