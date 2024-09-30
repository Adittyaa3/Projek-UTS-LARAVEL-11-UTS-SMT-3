<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store comment
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment_text' => 'required',
            'comment_image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('comment_image') ? $request->file('comment_image')->store('public/products') : null;

        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'comment_text' => $request->comment_text,
            'comment_image' => $imagePath,
        ]);

        return redirect()->back();
    }
}
