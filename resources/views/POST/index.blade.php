    @extends('Admin.main')


    @section('content')
    <div class="container" style="margin-top: 70px">
        <h1>Social Feed</h1>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" style="padding: 30px; border: 1px solid #e1e8ed; border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
            @csrf
            <div class="form-group">
                <textarea name="tweet" style="width: 100%; height: 100px; padding: 15px; border: 1px solid #e1e8ed; border-radius: 10px; resize: none; font-size: 16px; color: #14171A; font-family: Arial, sans-serif; transition: border-color 0.3s;" placeholder="What's happening?" required></textarea>
            </div>
        
            <div class="form-group" style="margin-bottom: 20px;">
                <!-- Hidden file input -->
                <input type="file" name="image" id="imageUpload" class="d-none" >
                
                <!-- Label that acts as a button -->
                <label for="imageUpload" style="display: inline-flex; align-items: center; padding: 10px 15px; border: 1px solid #e1e8ed; border-radius: 10px; background-color: #f5f8fa; cursor: pointer; transition: background-color 0.3s;">
                    <i class="bi bi-images" style="font-size: 24px; color: #5D87FF; margin-right: 8px;"></i>
                    <span style="font-si\ze: 16px; color: #14171A;"></span>
                </label>
            </div>
        
            <button type="submit" style="background-color: #1DA1F2; color: white; border: none; border-radius: 50px; padding: 12px 20px; font-size: 16px; cursor: pointer; transition: background-color 0.3s; width: 100%;">
                Post
            </button>
        </form>
        
        
        

        {{-- Loop through all posts --}}
        @foreach ($posts as $post)
        <div class="post" style="padding: 15px; border: 1px solid #e1e8ed; border-radius: 10px; background-color: #ffffff; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h3 style="color: #1DA1F2; font-size: 18px; margin-bottom: 5px;">{{ $post->user->name }}</h3>
            <h1 style="font-size: 50px; color: #14171A;">{{ $post->tweet }}</h1>
            @if ($post->image)
                <img src="{{ asset('/storage/products/'.$post->image) }}" alt="Post Image" style="max-width: 30%; border-radius: 8px; margin-top: 10px;">
            @endif
            <br>
            <small style="color: #657786; font-size: 12px;">Posted on: {{ $post->created_at }}</small>
           

            <!-- Display like count -->
            <p style="color: #657786; font-size: 14px; margin: 5px 0;">
                {{ $post->likesCount() }} {{ Str::plural('like', $post->likesCount()) }}
            </p>

            {{-- Like/Unlike --}}
            <form action="{{ $post->likes->contains('user_id', Auth::id()) ? route('posts.unlike', $post) : route('posts.like', $post) }}" method="POST" style="margin-top: 10px;">
                @csrf
                <button type="submit" style="background-color: transparent; border: none; color: #1DA1F2; cursor: pointer; font-size: 14px;">
                    {{ $post->likes->contains('user_id', Auth::id()) ? 'Unlike' : 'Like' }}
                </button>
            </form>

            {{-- Comment form --}}
            <form action="{{ route('comments.store', $post) }}" method="POST" enctype="multipart/form-data" style="margin-top: 15px;">
                @csrf
                <textarea name="comment_text" placeholder="Add a comment" style="width: 100%; height: 60px; padding: 10px; border: 1px solid #e1e8ed; border-radius: 5px; resize: none; font-size: 14px; color: #14171A;"></textarea>
                <input type="file" name="comment_image" accept="image/*" style="margin-top: 5px;">
                
                <button type="submit" style="background-color: #1DA1F2; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer; font-size: 14px; margin-top: 5px;">
                    Comment
                </button>
            </form>

            {{-- List of comments --}}
            {{-- @foreach ($post->comments as $comment)
                <div class="comment" style="padding: 10px; border: 1px solid #e1e8ed; border-radius: 5px; background-color: #f5f8fa; margin-top: 10px;">
                    <h4 style="color: #1DA1F2; font-size: 16px;">{{ $comment->user->name }}</h4>
                    <p style="font-size: 14px; color: #14171A;">{{ $comment->comment_text }}</p>
                    @if ($comment->comment_image)
                    <img src="{{ asset('/storage/products/'.$post->comment_image) }}" alt="Post Image" style="max-width: 20%; border-radius: 8px; margin-top: 10px;">
                    @endif
                    <br>
                    <small style="color: #657786; font-size: 12px;">Commented on: {{ $comment->created_at }}</small>
                </div>
            @endforeach --}}
            @foreach ($post->comments as $comment)
    <div class="comment" style="padding: 10px; border: 1px solid #e1e8ed; border-radius: 5px; background-color: #f5f8fa; margin-top: 10px;">
        <h4 style="color: #1DA1F2; font-size: 16px;">{{ $comment->user->name }}</h4>
        <p style="font-size: 14px; color: #14171A;">{{ $comment->comment_text }}</p>
        @if ($comment->comment_image)
            <img src="{{ asset('storage/'.$comment->comment_image) }}" alt="Comment Image" style="max-width: 20%; border-radius: 8px; margin-top: 10px;">
        @endif
        <br>
        <small style="color: #657786; font-size: 12px;">Commented on: {{ $comment->created_at }}</small>
    </div>
@endforeach

        </div>
    @endforeach

    </div>
    @endsection
