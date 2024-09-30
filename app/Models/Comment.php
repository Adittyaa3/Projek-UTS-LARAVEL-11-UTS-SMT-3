<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class PostComment extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'post_id', 'user_id', 'comment_text', 'comment_image'
//     ];

//     public function post()
//     {
//         return $this->belongsTo(Post::class, );
//     }

//     // Relationship to user
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'comment_text', 'comment_image'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

