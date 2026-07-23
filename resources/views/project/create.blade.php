@extends('layouts.app')

@section('content')

<div style="max-width:900px;margin:60px auto;color:white;">

    <h1>Upload Proyek Baru</h1>

    <form action="{{ route('project.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <p>Judul</p>
        <input type="text" name="title" style="width:100%;padding:10px;">

        <br><br>

        <p>Deskripsi</p>
        <textarea name="desc" rows="5" style="width:100%;padding:10px;"></textarea>

        <br><br>

        <p>Tech Stack</p>
        <input type="text" name="tech_stacks" style="width:100%;padding:10px;">

        <br><br>

        <p>Repository</p>
        <input type="url" name="link_repo" style="width:100%;padding:10px;">

        <br><br>

        <p>Demo</p>
        <input type="url" name="link_demo" style="width:100%;padding:10px;">

        <br><br>

        <p>Gambar</p>
        <input type="file" name="project_image">

        <br><br>

        <button type="submit">
            Upload Project
        </button>

    </form>

</div>

@endsection