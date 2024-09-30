@extends('Admin.main')

@section('content')
<div class="container" style="margin-top: 50px;">
    <h1 style="font-size: 36px; color: #020202;">Manajemen Post oleh : {{ Auth::user()->name }}</h1>

    <!-- Pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan semua post milik user -->
    @if ($posts->isEmpty())
        <div class="alert alert-info" role="alert">
            Kamu belum membuat postingan apapun.
        </div>
    @else
        @foreach ($posts as $post)
            <div class="post card mt-4" style="border: 1px solid #e1e8ed; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body">
                    <h2 style="font-size: 24px; color: #14171A;">{{ $post->tweet }}</h2>
                    @if ($post->image)
                    <img src="{{ asset('/storage/products/'.$post->image) }}" alt="Post Image" style="max-width: 30%; border-radius: 8px; margin-top: 10px;">
                    @endif

                    <!-- Tombol Edit dan Delete -->
                    <div class="d-flex justify-content-end mt-3">
                        <!-- Tombol Edit -->
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning me-2" style="background-color: #1DA1F2; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer; font-size: 14px; margin-top: 5px;">
                            <i class="bi bi-pencil" style="color: #1DA1F2"></i> Edit
                        </a>

                        <!-- Tombol Delete -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="background-color: #ff0000; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer; font-size: 14px; margin-top: 5px">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>

                    <!-- Menampilkan jumlah likes dan komentar -->
                    <div class="mt-3 text-muted" style="font-size: 14px;">
                        <p>{{ $post->likes->count() }} Likes | {{ $post->comments->count() }} Comments</p>
                    </div>

                    <!-- Tampilkan komentar -->
                    @foreach ($post->comments as $comment)
                        <div class="comment card mt-2" style="border: 1px solid #e1e8ed; border-radius: 5px;">
                            <div class="card-body">
                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment_text }}</p>
                                @if ($comment->comment_image)
                                    <img src="{{ asset('storage/' . $comment->comment_image) }}" class="img-fluid rounded" alt="Comment Image">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
