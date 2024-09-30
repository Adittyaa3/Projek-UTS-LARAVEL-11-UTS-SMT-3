@extends('Admin.main')

@section('content')
<h1>Daftar Video</h1>
    <a href="{{ route('videos.create') }}">Upload Video Baru</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($videos as $video)
            <tr>
                <td>{{ $video->title }}</td>
                <td>{{ $video->description }}</td>
                <td>
                    <a href="{{ route('videos.edit', $video->id) }}">Edit</a>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
