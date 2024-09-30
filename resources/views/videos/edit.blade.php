@extends('Admin.main')

@section('content')
<h1>Edit Video</h1>
<form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Judul:</label>
    <input type="text" name="title" value="{{ $video->title }}" required>
    <label for="description">Deskripsi:</label>
    <textarea name="description">{{ $video->description }}</textarea>
    <label for="video">Ganti Video (kosongkan jika tidak diganti):</label>
    <input type="file" name="video">
    <button type="submit">Simpan</button>
</form>
@endsection
