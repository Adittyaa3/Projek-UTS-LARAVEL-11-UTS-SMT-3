@extends('Admin.main')

@section('content')
<div class="container">

    
    <h1>Create New Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="message_text">What's on your mind?</label>
            <textarea name="message_text" id="message_text" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="message_image">Upload an image (optional)</label>
            <input type="file" name="message_image" id="message_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Post</button>
    </form>
    
</div>
@endsection
