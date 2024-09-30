<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($postId)
    {
        Like::firstOrCreate([
            'user_id' => Auth::id(),
            'post_id' => $postId,
        ]);

        return redirect()->back();
    }

    public function unlike($postId)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $postId)->first();
        if ($like) {
            $like->delete();    
        }

        return redirect()->back();
    }
}
