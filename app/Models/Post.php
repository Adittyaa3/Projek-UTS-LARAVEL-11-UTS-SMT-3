<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'user_id', 'message_text', 'message_image'
//     ];

//  public function user()
//     {
//         return $this->belongsTo(User::class);
//     }

//     // Relationship to likes
//     public function likes()
//     {
//         return $this->hasMany(PostLike::class);
//     }

//     // Relationship to comments
//     public function comments()
//     {
//         return $this->hasMany(PostComment::class );
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['tweet', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function likesCount()
{
    return $this->likes()->count();
}

}

