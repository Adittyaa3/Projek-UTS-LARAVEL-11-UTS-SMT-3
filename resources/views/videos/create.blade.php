@extends('Admin.main')

@section('content')
<h1>Upload Video</h1>
<form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Judul:</label>
    <input type="text" name="title" required>
    <label for="description">Deskripsi:</label>
    <textarea name="description"></textarea>
    <label for="video">Pilih Video:</label>
    <input type="file" name="video" required>
    <button type="submit">Upload</button>
</form>
@endsection
