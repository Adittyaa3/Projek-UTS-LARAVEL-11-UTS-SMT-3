@extends('Admin.main')


@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <h1>Update Post</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" style="padding: 30px; border: 1px solid #e1e8ed; border-radius: 15px; background-color: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <textarea name="tweet" style="width: 100%; height: 100px; padding: 15px; border: 1px solid #e1e8ed; border-radius: 10px; resize: none; font-size: 16px; color: #14171A; font-family: Arial, sans-serif; transition: border-color 0.3s;" placeholder="What's happening?" required>{{ $post->tweet }}</textarea>
        </div>
    
        <div class="form-group" style="margin-bottom: 20px;">
            <!-- Hidden file input -->
            <input type="file" name="image" id="imageUpload" class="d-none" accept="image/*">
            
            <!-- Label that acts as a button -->
            <label for="imageUpload" style="display: inline-flex; align-items: center; padding: 10px 15px; border: 1px solid #e1e8ed; border-radius: 10px; background-color: #f5f8fa; cursor: pointer; transition: background-color 0.3s;">
                <i class="bi bi-images" style="font-size: 24px; color: #5D87FF; margin-right: 8px;"></i>
                <span style="font-size: 16px; color: #14171A;">Upload Image</span>
            </label>
        </div>
    
        @if ($post->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" style="max-width: 100%; border-radius: 8px; margin-top: 10px;">
            </div>
        @endif
    
        <button type="submit" style="background-color: #1DA1F2; color: white; border: none; border-radius: 50px; padding: 12px 20px; font-size: 16px; cursor: pointer; transition: background-color 0.3s; width: 100%;">
            Update Post
        </button>
    </form>
    
    <a href="{{ route('user.posts') }}" style="background-color: #1DA1F2; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer; font-size: 14px; margin-top: 5px">Back</a>
    
@endsection
