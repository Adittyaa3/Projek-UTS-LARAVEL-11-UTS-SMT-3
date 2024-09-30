@extends('Admin.main')

@section('content')
<div class="container">
    <h1>{{ Auth::user()->name }}'s Posts</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($posts->isEmpty())
        <p>You haven't created any posts yet.</p>
    @else
        @foreach ($posts as $post)
            <div class="post card mt-4">
                <div class="card-body">
                    <p><strong>{{ $post->user->name }}</strong> <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span></p>
                    <p>{{ $post->message_text }}</p>

                    @if ($post->message_image)
                        <img src="{{ asset('storage/' . $post->message_image) }}" alt="Post Image" class="img-fluid rounded">
                    @endif

                    <div class="mt-2">
                        <a href="{{ route('posts.like', $post->post_id) }}" class="btn btn-sm btn-primary">
                            {{ $post->likes->where('user_id', Auth::id())->count() ? 'Unlike' : 'Like' }}
                        </a>
                        <a href="{{ route('posts.edit', $post->post_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.delete', $post->post_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </div>

                    <p class="mt-3">{{ $post->likes->count() }} Likes | {{ $post->comments->count() }} Comments</p>

                    <!-- Comments Section -->
                    <h5 class="mt-4">Comments</h5>
                    @foreach ($post->comments as $comment)
                        <div class="comment card mt-2">
                            <div class="card-body">
                                <p><strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span></p>
                                <p>{{ $comment->comment_text }}</p>

                                @if ($comment->comment_image)
                                    <img src="{{ asset('storage/' . $comment->comment_image) }}" alt="Comment Image" class="img-fluid rounded">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
